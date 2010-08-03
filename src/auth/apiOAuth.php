<?php
/*
 * Copyright 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

require_once "OAuth.php";

/**
 * Authentication class that deals with 3-Legged OAuth 1.0a authentication
 *
 * This class uses the OAuth 1.0a spec which has a slightly different work flow in
 * how callback urls, request & access tokens are dealt with to prevent a possible
 * man in the middle attack.
 *
 */
class apiOAuth {

  public $localUserId;
  public $storageKey;
  protected $consumerToken;
  protected $accessToken;
  protected $privateKeyFile;
  private $storage;

  /**
   * Instantiates the class, but does not initiate the login flow, leaving it
   * to the discretion of the caller.
   *
   * @param string $consumerKey
   * @param string $consumerSecret
   * @param apiStorage $storage storage class to use (file,apc,memcache,mysql)
   * @param any $localUser the *local* user ID (this is not the user's ID on the social network site, but the user id on YOUR site, this is used to link the oauth access token to a local login)
   */
  public function __construct(apiStorage $storage, $localUserId) {
    global $apiConfig;
    $apiConfig['authorization_token_url'] = str_replace('www.example.org', OAuthUtil::urlencodeRFC3986($apiConfig['site_name']), $apiConfig['authorization_token_url']);
    $this->localUserId = $localUserId;
    $this->consumerToken = new OAuthConsumer($apiConfig['oauth_consumer_key'], $apiConfig['oauth_consumer_secret'], NULL);
    $this->signatureMethod = new OAuthSignatureMethod_HMAC_SHA1();
    $this->storage = $storage;
    $this->storageKey = 'OAuth:' . $apiConfig['oauth_consumer_key'] . ':' . $localUserId; // Scope data to the local user as well, or else multiple local users will share the same OAuth credentials.
    if (($token = $storage->get($this->storageKey)) !== false) {
      $this->accessToken = $token;
    }
  }

  /**
   * The 3 legged oauth class needs a way to store the access key and token
   * it uses the apiStorage class to do so.
   *
   * Constructing this class will initiate the 3 legged oauth work flow, including redirecting
   * to the OAuth provider's site if required(!)
   *
   * @param string $consumerKey
   * @param string $consumerSecret
   * @param apiStorage $storage storage class to use (file,apc,memcache,mysql)
   * @param any $localUser the *local* user ID (this is not the user's ID on the social network site, but the user id on YOUR site, this is used to link the oauth access token to a local login)
   * @return apiOAuth3Legged the logged-in provider instance
   */
  public static function performOAuthLogin(apiStorage $storage, $localUserId = null) {
    global $apiConfig;
    $auth = new apiOAuth($storage, $localUserId);
    if (($token = $storage->get($auth->storageKey)) !== false) {
      $auth->accessToken = $token;
    } else {
      if (isset($_GET['oauth_verifier']) && isset($_GET['oauth_token'])  && isset($_GET['uid'])) {
        $uid = $_GET['uid'];
        $secret = $auth->storage->get($auth->storageKey.":nonce" . $uid);
        $auth->storage->delete($auth->storageKey.":nonce" . $uid);
        $token = $auth->upgradeRequestToken($_GET['oauth_token'], $secret, $_GET['oauth_verifier']);
        $auth->redirectToOriginal();
      } else {
        // Initialize the OAuth dance, first request a request token, then kick the client to the authorize URL
        // First we store the current URL in our storage, so that when the oauth dance is completed we can return there
        $callbackUrl = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $uid = uniqid();
        $token = $auth->obtainRequestToken($callbackUrl, $uid);
        $auth->storage->set($auth->storageKey.":nonce" . $uid,  $token->secret);
        $auth->redirectToAuthorization($token);
      }
    }
    return $auth;
  }

  /**
   * Upgrades an existing request token to an access token.
   *
   * @param apiStorage $storage storage class to use (file,apc,memcache,mysql)
   * @param oauthVerifier
   */
  public function upgradeRequestToken($requestToken, $requestTokenSecret, $oauthVerifier) {
    $ret = $this->requestAccessToken($requestToken, $requestTokenSecret, $oauthVerifier);
    if ($ret['http_code'] == '200') {
      $matches = array();
      @parse_str($ret['data'], $matches);
      if (!isset($matches['oauth_token']) || !isset($matches['oauth_token_secret'])) {
        throw new apiAuthException("Error authorizing access key (result was: {$ret['data']})");
      }
      // The token was upgraded to an access token, we can now continue to use it.
      $this->accessToken = new OAuthConsumer(OAuthUtil::urldecodeRFC3986($matches['oauth_token']), OAuthUtil::urldecodeRFC3986($matches['oauth_token_secret']));
      $this->storage->set($this->storageKey, $this->accessToken);
      return $this->accessToken;
    } else {
      throw new apiAuthException("Error requesting oauth access token, code " . $ret['http_code'] . ", message: " . $ret['data']);
    }
  }

  /**
   * Sends the actual request to exchange an existing request token for an access token.
   *
   * @param string $requestToken the existing request token
   * @param string $requestTokenSecret the request token secret
   * @return array('http_code' => HTTP response code (200, 404, 401, etc), 'data' => the html document)
   */
  protected function requestAccessToken($requestToken, $requestTokenSecret, $oauthVerifier) {
    global $apiConfig;
    $accessToken = new OAuthConsumer($requestToken, $requestTokenSecret);
    $accessRequest = OAuthRequest::from_consumer_and_token($this->consumerToken, $accessToken, "GET", $apiConfig['access_token_url'], array('oauth_verifier' => $oauthVerifier));
    $accessRequest->sign_request($this->signatureMethod, $this->consumerToken, $accessToken);
    return apiIO::send($accessRequest, 'GET');
  }

  /**
   * Redirects the page to the original url, prior to OAuth initialization. This removes the extraneous
   * parameters from the URL, adding latency, but increasing user-friendliness.
   *
   * @param apiStorage $storage storage class to use (file,apc,memcache,mysql)
   */
  public function redirectToOriginal() {
    $originalUrl = $this->storage->get($this->storageKey.":originalUrl");
    if ($originalUrl && !empty($originalUrl)) {
      // The url was retrieve successfully, remove the temporary original url from storage, and redirect
      $this->storage->delete($this->storageKey.":originalUrl");
      header("Location: $originalUrl");
    }
  }

  /**
   * Obtains a request token from the specified provider.
   *
   * @param apiStorage $storage storage class to use (file,apc,memcache,mysql)
   */
  public function obtainRequestToken($callbackUrl, $uid) {
    $this->storage->set($this->storageKey.":originalUrl", $callbackUrl);
    $callbackParams = (strpos($_SERVER['REQUEST_URI'], '?') !== false ? '&' : '?') . 'uid=' . urlencode($uid);
    $ret = $this->requestRequestToken($callbackUrl . $callbackParams);
    if ($ret['http_code'] == '200') {
      $matches = array();
      preg_match('/oauth_token=(.*)&oauth_token_secret=(.*)&oauth_callback_confirmed=(.*)/', $ret['data'], $matches);
      if (!is_array($matches) || count($matches) != 4) {
        throw new apiAuthException("Error retrieving request key ({$ret['data']})");
      }
      return new OAuthToken(OAuthUtil::urldecodeRFC3986($matches[1]), OAuthUtil::urldecodeRFC3986($matches[2]));
    } else {
      throw new apiAuthException("Error requesting oauth request token, code " . $ret['http_code'] . ", message: " . $ret['data']);
    }
  }

  /**
   * Sends the actual request to obtain a request token.
   *
   * @return array('http_code' => HTTP response code (200, 404, 401, etc), 'data' => the html document)
   */
  protected function requestRequestToken($callbackUrl) {
    global $apiConfig;
    $requestTokenRequest = OAuthRequest::from_consumer_and_token($this->consumerToken, NULL, "GET", $apiConfig['request_token_url'], array());
    $requestTokenRequest->set_parameter('scope', $apiConfig['oauth_scope']);
    $requestTokenRequest->set_parameter('oauth_callback', $callbackUrl);
    $requestTokenRequest->sign_request($this->signatureMethod, $this->consumerToken, NULL);
    return apiIO::send($requestTokenRequest, 'GET');
  }

  /**
   * Redirect the uset to the (provider's) authorize page, if approved it should kick the user back to the call back URL
   * which hopefully means we'll end up in the constructor of this class again, but with oauth_continue=1 set
   *
   * @param OAuthToken $token the request token
   * @param string $callbackUrl the URL to return to post-authorization (passed to login site)
   */
  public function redirectToAuthorization($token) {
    global $apiConfig;
    $authorizeRedirect = $apiConfig['authorization_token_url']. $token->key;
    header("Location: $authorizeRedirect");
  }

  /**
   * Returns the user ID on behalf of which this auth is making requests.
   * @return String The user ID specified in the constructor.
   */
  public function getUserId() {
    return $this->userId;
  }

  /**
   * Sets the user ID on behalf of which this auth is making requests.
   * @param String $userId A user ID.
   */
  public function setUserId($userId) {
    $this->userId = $userId;
  }

  /**
   * Sign the request using OAuth. This uses the consumer token and key
   * but 2 legged oauth doesn't require an access token and key. In situations where you want to
   * do a 'reverse phone home' (aka: gadget does a makeRequest to your server
   * and your server wants to retrieve more social information) this is the prefered
   * method.
   *
   * @param string $method the method (get/put/delete/post)
   * @param string $url the url to sign (http://site/social/rest/people/1/@me)
   * @param array $params the params that should be appended to the url (count=20 fields=foo, etc)
   * @param string $postBody for POST/PUT requests, the postBody is included in the signature
   * @return string the signed url
   */
  public function sign($method, $url, $params = array(), $postBody = false, &$headers = array()) {
    $oauthRequest = OAuthRequest::from_request($method, $url, $params);
    $params = $this->mergeParameters($params);
    foreach ($params as $key => $val) {
      if (is_array($val)) {
        $val = implode(',', $val);
      }
      $oauthRequest->set_parameter($key, $val);
    }
    $oauthRequest->sign_request($this->signatureMethod, $this->consumerToken, $this->accessToken);
    $signedUrl = $oauthRequest->to_url();
    return $signedUrl;
  }

  /**
   * Merges the supplied parameters with reasonable defaults for 2 legged oauth. User-supplied parameters
   * will have precedent over the defaults.
   *
   * @param array $params the user-supplied params that will be appended to the url
   * @return array the combined parameters
   */
  protected function mergeParameters($params) {
    $defaults = array(
      'oauth_nonce' => md5(microtime() . mt_rand()),
      'oauth_version' => OAuthRequest::$version, 'oauth_timestamp' => time(),
      'oauth_consumer_key' => $this->consumerToken->key
    );
    if ($this->accessToken != null) {
      $params['oauth_token'] = $this->accessToken->key;
    }
    return array_merge($defaults, $params);
  }
}

<?php
/*
 * Copyright 2008 Google Inc.
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
namespace GoogleApi\Auth;

use GoogleApi\Client;
use GoogleApi\Io\HttpRequest;
use GoogleApi\Service\Utils;
use GoogleApi\Config;

/**
 * Authentication class that deals with the OAuth 2 web-server authentication flow
 *
 * @author Chris Chabot <chabotc@google.com>
 * @author Chirag Shah <chirags@google.com>
 *
 */
class OAuth2 extends Auth {
  public $clientId;
  public $clientSecret;
  public $developerKey;
  public $accessToken;
  public $redirectUri;
  public $state;
  public $accessType = 'offline';
  public $approvalPrompt = 'force';

  /** @var AssertionCredentials $assertionCredentials */
  public $assertionCredentials;

  const OAUTH2_REVOKE_URI = 'https://accounts.google.com/o/oauth2/revoke';
  const OAUTH2_TOKEN_URI = 'https://accounts.google.com/o/oauth2/token';
  const OAUTH2_AUTH_URL = 'https://accounts.google.com/o/oauth2/auth';
  const OAUTH2_FEDERATED_SIGNON_CERTS_URL = 'https://www.googleapis.com/oauth2/v1/certs';
  const CLOCK_SKEW_SECS = 300; // five minutes in seconds
  const AUTH_TOKEN_LIFETIME_SECS = 300; // five minutes in seconds
  const MAX_TOKEN_LIFETIME_SECS = 86400; // one day in seconds

  /**
   * Instantiates the class, but does not initiate the login flow, leaving it
   * to the discretion of the caller (which is done by calling authenticate()).
   */
  public function __construct() {
    $apiConfig = Config::getAll();
    
    if (! empty($apiConfig['developer_key'])) {
      $this->developerKey = $apiConfig['developer_key'];
    }

    if (! empty($apiConfig['oauth2_client_id'])) {
      $this->clientId = $apiConfig['oauth2_client_id'];
    }

    if (! empty($apiConfig['oauth2_client_secret'])) {
      $this->clientSecret = $apiConfig['oauth2_client_secret'];
    }

    if (! empty($apiConfig['oauth2_redirect_uri'])) {
      $this->redirectUri = $apiConfig['oauth2_redirect_uri'];
    }
    
    if (! empty($apiConfig['oauth2_access_type'])) {
      $this->accessType = $apiConfig['oauth2_access_type'];
    }

    if (! empty($apiConfig['oauth2_approval_prompt'])) {
      $this->approvalPrompt = $apiConfig['oauth2_approval_prompt'];
    }
  }

  /**
   * @param $service
   * @return string
   * @throws Exception
   */
  public function authenticate($service) {
    if (isset($_GET['code'])) {
      // We got here from the redirect from a successful authorization grant, fetch the access token
      $request = Client::$io->makeRequest(new HttpRequest(self::OAUTH2_TOKEN_URI, 'POST', array(), array(
          'code' => $_GET['code'],
          'grant_type' => 'authorization_code',
          'redirect_uri' => $this->redirectUri,
          'client_id' => $this->clientId,
          'client_secret' => $this->clientSecret
      )));

      if ($request->getResponseHttpCode() == 200) {
        $this->setAccessToken($request->getResponseBody());
        $this->accessToken['created'] = time();
        return $this->getAccessToken();
      } else {
        $response = $request->getResponseBody();
        $decodedResponse = json_decode($response, true);
        if ($decodedResponse != $response && $decodedResponse != null && $decodedResponse['error']) {
          $response = $decodedResponse['error'];
        }
        throw new Exception("Error fetching OAuth2 access token, message: '$response'", $request->getResponseHttpCode());
      }
    }

    $authUrl = $this->createAuthUrl($service['scope']);
    header('Location: ' . $authUrl);
  } 

  /**
   * Create a URL to obtain user authorization.
   * The authorization endpoint allows the user to first
   * authenticate, and then grant/deny the access request.
   * @param string $scope The scope is expressed as a list of space-delimited strings.
   * @return string
   */
  public function createAuthUrl($scope) {
    $params = array(
        'response_type=code',
        'redirect_uri=' . urlencode($this->redirectUri),
        'client_id=' . urlencode($this->clientId),
        'scope=' . urlencode($scope),
        'access_type=' . urlencode($this->accessType),
        'approval_prompt=' . urlencode($this->approvalPrompt)
    );

    if (isset($this->state)) {
      $params[] = 'state=' . urlencode($this->state);
    }
    $params = implode('&', $params);
    return self::OAUTH2_AUTH_URL . "?$params";
  }

  /**
   * @param $accessToken
   * @throws Exception Thrown when $accessToken is invalid.
   */
  public function setAccessToken($accessToken) {
    $accessToken = json_decode($accessToken, true);
    if ($accessToken == null) {
      throw new Exception('Could not json decode the access token');
    }
    if (! isset($accessToken['access_token'])) {
      throw new Exception("Invalid token format");
    }
    $this->accessToken = $accessToken;
  }

  public function getAccessToken() {
    return json_encode($this->accessToken);
  }

  public function setDeveloperKey($developerKey) {
    $this->developerKey = $developerKey;
  }

  public function setState($state) {
    $this->state = $state;
  }

  public function setAccessType($accessType) {
    $this->accessType = $accessType;
  }

  public function setApprovalPrompt($approvalPrompt) {
    $this->approvalPrompt = $approvalPrompt;
  }

  public function setAssertionCredentials(AssertionCredentials $creds) {
    $this->assertionCredentials = $creds;
  }

  /**
   * Include an accessToken in a given HttpRequest.
   * @param HttpRequest $request
   * @return HttpRequest
   * @throws Exception
   */
  public function sign(HttpRequest $request) {
    // add the developer key to the request before signing it
    if ($this->developerKey) {
      $requestUrl = $request->getUrl();
      $requestUrl .= (strpos($request->getUrl(), '?') === false) ? '?' : '&';
      $requestUrl .=  'key=' . urlencode($this->developerKey);
      $request->setUrl($requestUrl);
    }

    // Cannot sign the request without an OAuth access token.
    if (null == $this->accessToken && null == $this->assertionCredentials) {
      return $request;
    }

    // If the token is set to expire in the next 30 seconds (or has already
    // expired), refresh it and set the new token.
    $expired = (null == $this->accessToken) ||
        ($this->accessToken['created'] + ($this->accessToken['expires_in'] - 30)) < time();

    if ($expired) {
      if ($this->assertionCredentials) {
        $this->refreshTokenWithAssertion();
      } else {
        if (! array_key_exists('refresh_token', $this->accessToken)) {
            throw new Exception("The OAuth 2.0 access token has expired, "
                . "and a refresh token is not available. Refresh tokens are not "
                . "returned for responses that were auto-approved.");
        }
        $this->refreshToken($this->accessToken['refresh_token']);
      }
    }

    // Add the OAuth2 header to the request
    $request->setRequestHeaders(
        array('Authorization' => 'Bearer ' . $this->accessToken['access_token'])
    );

    return $request;
  }

  /**
   * Fetches a fresh access token with the given refresh token.
   * @param string $refreshToken
   * @return void
   */
  public function refreshToken($refreshToken) {
    $this->refreshTokenRequest(array(
        'client_id' => $this->clientId,
        'client_secret' => $this->clientSecret,
        'refresh_token' => $refreshToken,
        'grant_type' => 'refresh_token'
    ));
  }

  /**
   * Fetches a fresh access token with a given assertion token.
   * @param AssertionCredentials $assertionCredentials optional.
   * @return void
   */
  public function refreshTokenWithAssertion($assertionCredentials = null) {
    if (!$assertionCredentials) {
      $assertionCredentials = $this->assertionCredentials;
    }

    $this->refreshTokenRequest(array(
        'grant_type' => 'assertion',
        'assertion_type' => $assertionCredentials->assertionType,
        'assertion' => $assertionCredentials->generateAssertion(),
    ));
  }

  private function refreshTokenRequest($params) {
    $http = new HttpRequest(self::OAUTH2_TOKEN_URI, 'POST', array(), $params);
    $request = Client::$io->makeRequest($http);

    $code = $request->getResponseHttpCode();
    $body = $request->getResponseBody();
    if (200 == $code) {
      $token = json_decode($body, true);
      if ($token == null) {
        throw new Exception("Could not json decode the access token");
      }

      if (! isset($token['access_token']) || ! isset($token['expires_in'])) {
        throw new Exception("Invalid token format");
      }

      $this->accessToken['access_token'] = $token['access_token'];
      $this->accessToken['expires_in'] = $token['expires_in'];
      $this->accessToken['created'] = time();
    } else {
      throw new Exception("Error refreshing the OAuth2 token, message: '$body'", $code);
    }
  }

    /**
     * Revoke an OAuth2 access token or refresh token. This method will revoke the current access
     * token, if a token isn't provided.
     * @throws Exception
     * @param string|null $token The token (access token or a refresh token) that should be revoked.
     * @return boolean Returns True if the revocation was successful, otherwise False.
     */
  public function revokeToken($token = null) {
    if (!$token) {
      $token = $this->accessToken['access_token'];
    }
    $request = new HttpRequest(self::OAUTH2_REVOKE_URI, 'POST', array(), "token=$token");
    $response = Client::$io->makeRequest($request);
    $code = $response->getResponseHttpCode();
    if ($code == 200) {
      $this->accessToken = null;
      return true;
    }

    return false;
  }

  // Gets federated sign-on certificates to use for verifying identity tokens.
  // Returns certs as array structure, where keys are key ids, and values
  // are PEM encoded certificates.
  private function getFederatedSignOnCerts() {
    // This relies on makeRequest caching certificate responses.
    $request = Client::$io->makeRequest(new HttpRequest(
        self::OAUTH2_FEDERATED_SIGNON_CERTS_URL));
    if ($request->getResponseHttpCode() == 200) {
      $certs = json_decode($request->getResponseBody(), true);
      if ($certs) {
        return $certs;
      }
    }
    throw new Exception(
        "Failed to retrieve verification certificates: '" .
            $request->getResponseBody() . "'.",
        $request->getResponseHttpCode());
  }

  /**
   * Verifies an id token and returns the authenticated LoginTicket.
   * Throws an exception if the id token is not valid.
   * The audience parameter can be used to control which id tokens are
   * accepted.  By default, the id token must have been issued to this OAuth2 client.
   *
   * @param $id_token
   * @param $audience
   * @return LoginTicket
   */
  public function verifyIdToken($id_token = null, $audience = null) {
    if (!$id_token) {
      $id_token = $this->accessToken['id_token'];
    }

    $certs = $this->getFederatedSignonCerts();
    if (!$audience) {
      $audience = $this->clientId;
    }
    return $this->verifySignedJwtWithCerts($id_token, $certs, $audience);
  }

  // Verifies the id token, returns the verified token contents.
  // Visible for testing.
  function verifySignedJwtWithCerts($jwt, $certs, $required_audience) {
    $segments = explode(".", $jwt);
    if (count($segments) != 3) {
      throw new Exception("Wrong number of segments in token: $jwt");
    }
    $signed = $segments[0] . "." . $segments[1];
    $signature = Utils::urlSafeB64Decode($segments[2]);

    // Parse envelope.
    $envelope = json_decode(Utils::urlSafeB64Decode($segments[0]), true);
    if (!$envelope) {
      throw new Exception("Can't parse token envelope: " . $segments[0]);
    }

    // Parse token
    $json_body = Utils::urlSafeB64Decode($segments[1]);
    $payload = json_decode($json_body, true);
    if (!$payload) {
      throw new Exception("Can't parse token payload: " . $segments[1]);
    }

    // Check signature
    $verified = false;
    foreach ($certs as $keyName => $pem) {
      $public_key = new PemVerifier($pem);
      if ($public_key->verify($signed, $signature)) {
        $verified = true;
        break;
      }
    }

    if (!$verified) {
      throw new Exception("Invalid token signature: $jwt");
    }

    // Check issued-at timestamp
    $iat = 0;
    if (array_key_exists("iat", $payload)) {
      $iat = $payload["iat"];
    }
    if (!$iat) {
      throw new Exception("No issue time in token: $json_body");
    }
    $earliest = $iat - self::CLOCK_SKEW_SECS;

    // Check expiration timestamp
    $now = time();
    $exp = 0;
    if (array_key_exists("exp", $payload)) {
      $exp = $payload["exp"];
    }
    if (!$exp) {
      throw new Exception("No expiration time in token: $json_body");
    }
    if ($exp >= $now + self::MAX_TOKEN_LIFETIME_SECS) {
      throw new Exception(
          "Expiration time too far in future: $json_body");
    }

    $latest = $exp + self::CLOCK_SKEW_SECS;
    if ($now < $earliest) {
      throw new Exception(
          "Token used too early, $now < $earliest: $json_body");
    }
    if ($now > $latest) {
      throw new Exception(
          "Token used too late, $now > $latest: $json_body");
    }

    // TODO(beaton): check issuer field?

    // Check audience
    $aud = $payload["aud"];
    if ($aud != $required_audience) {
      throw new Exception("Wrong recipient, $aud != $required_audience: $json_body");
    }

    // All good.
    return new LoginTicket($envelope, $payload);
  }
}

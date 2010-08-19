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

// hack around with the include paths a bit so the library 'just works'
$cwd = dirname(__FILE__);
set_include_path("$cwd" . PATH_SEPARATOR . ":" . get_include_path());

require_once "config.php";
if (file_exists($cwd . 'local_config.php')) {
  require_once ($cwd . 'local_config.php');
}
require_once "auth/apiAuth.php";
require_once "cache/apiCache.php";
require_once "io/apiIO.php";
require_once "service/apiService.php";

class apiException extends Exception {}
class apiAuthException extends apiException {}
class apiCacheException extends apiException {}
class apiIOException extends apiException {}

/**
 * The Google API Client class
 * @author chabotc
 */
class apiClient {

  // worker classes
  protected $auth;
  protected $io;
  protected $cache;

  // definitions of services that are discover()'rd
  protected $services = array();

  // Used to track authenticated state, can't discover services after doing authenticate()
  private $authenticated = false;

  private $defaultService = array(
      'authorization_token_url' => 'https://www.google.com/accounts/OAuthAuthorizeToken',
      'request_token_url' => 'https://www.google.com/accounts/OAuthGetRequestToken',
      'access_token_url' => 'https://www.google.com/accounts/OAuthGetAccessToken');

  public function __construct() {
    global $apiConfig;
    // Create our worker classes
    $this->cache = new $apiConfig['cacheClass']();
    $this->auth = new $apiConfig['authClass']();
    $this->io = new $apiConfig['ioClass']($this->cache, $this->auth);
  }

  public function discover($service, $version = 'v1.0') {
    global $apiConfig;
    if ($this->authenticated) {
      // Adding services after being authenticated, since the oauth scope is already set (so you wouldn't have access to that data)
      throw new apiException("Can't add services after having authenticated");
    }
    if (! isset($apiConfig['services'][$service])) {
      throw new apiException("Invalid or unknown service name");
    }
    // Merge the service descriptor with the default values
    $this->services[$service] = array_merge($this->defaultService, $apiConfig['services'][$service]);
    $this->services[$service]['discoveryURI'] = 'http://www.googleapis.com/discovery/0.1/describe?api=' . $service . '&apiVersion=' . $version;
    $this->$service = $this->discoverService($service, $this->services[$service]['discoveryURI']);
    return $this->$service;
  }

  public function authenticate() {
    $this->authenticated = true;
    $service = $this->defaultService;
    $scopes = array();
    foreach ($this->services as $key => $val) {
      if (isset($val['scope'])) {
        $scopes[] = $val['scope'];
      } else {
        $scopes[] = 'https://www.googleapis.com/auth/' . $key;
      }
      unset($val['discoveryURI']);
      unset($val['scope']);
      $service = array_merge($service, $val);
    }
    $service['scope'] = implode(' ', $scopes);
    $this->auth->authenticate($this->cache, $this->io, $service);
  }

  public function setAccessToken($accessToken) {
    $this->auth->setAccessToken($accessToken);
  }

  private function discoverService($serviceName, $serviceURI) {
    $discoveryResponse = $this->io->makeRequest($serviceURI, 'GET');
    if ($discoveryResponse['http_code'] != '200') {
      throw new apiException("Could not fetch discovery document for $service, http code: {$discoveryResponse['http_code']}, response: {$discoveryResponse['data']}");
    }
    // Work around a bug that's going to be fixed real-soon-now
    if (strpos($discoveryResponse['data'], 'data":{{"') !== false) {
      $discoveryResponse['data'] = str_replace('"data":{{"', '"data":{"', $discoveryResponse['data']);
      $discoveryResponse['data'] = substr($discoveryResponse['data'], 0, strlen($discoveryResponse['data']) - 1);
    }
    $discoveryDocument = json_decode($discoveryResponse['data'], true);
    if ($discoveryDocument == NULL) {
      throw new apiException("Invalid json returned for $service");
    }
    return new apiService($serviceName, $discoveryDocument);
  }


}

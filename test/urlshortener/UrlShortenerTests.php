<?php
/*
 * Copyright 2011 Google Inc.
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

require_once '../src/apiClient.php';
require_once '../src/contrib/apiUrlshortenerService.php';

// These variables are shared between all the tasks
// test cases as performance optimization.
$apiClient = null;
$tasks = null;

class UrlShortenerTests extends PHPUnit_Framework_TestCase {
  public $apiClient;
  public $oauthToken;
  public $service;
  private $origConfig = false;

  public function __construct() {
    global $apiConfig, $apiClient, $service;
    parent::__construct();

    if (! $apiClient || ! $service) {
      $this->origConfig = $apiConfig;
      // Set up a predictable, default environment so the test results are predictable
      //$apiConfig['oauth2_client_id'] = 'INSERT_CLIENT_ID';
      //$apiConfig['oauth2_client_secret'] = 'INSERT_CLIENT_SECRET';
      $apiConfig['authClass'] = 'apiOAuth2';
      $apiConfig['ioClass'] = 'apiCurlIO';
      $apiConfig['cacheClass'] = 'apiFileCache';
      $apiConfig['ioFileCache_directory'] = '/tmp/googleApiTests';

      $apiClient = new apiClient();
      $service = new apiUrlshortenerService($apiClient);
      $apiClient->setAccessToken($apiConfig['oauth_test_token']);
    }
    $this->apiClient = $apiClient;
    $this->service = $service;
  }

  public function __destruct() {
    global $apiConfig;
    $this->service = null;
    $this->apiClient = null;
    if ($this->origConfig) {
      $apiConfig = $this->origConfig;
    }
  }

  public function testUrlShort() {
    $urlApi = $this->service->url;
    $url = new Url();
    $url->longUrl = "http://google.com";

    $shortUrl = $urlApi->insert($url);

    $this->assertEquals('urlshortener#url', $shortUrl['kind']);
    $this->assertEquals('http://google.com/', $shortUrl['longUrl']);
  }
}

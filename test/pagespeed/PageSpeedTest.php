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
require_once '../src/contrib/apiPagespeedonlineService.php';

// These variables are shared between all the tasks
// test cases as performance optimization.
$apiClient = null;
$tasks = null;

class PageSpeedTest extends PHPUnit_Framework_TestCase {
  public $apiClient;
  public $oauthToken;
  public $pageSpeedService;
  private $origConfig = false;

  public function __construct() {
    global $apiConfig, $apiClient, $pageSpeedService;
    parent::__construct();

    if (! $apiClient || ! $pageSpeedService) {
      $this->origConfig = $apiConfig;
      // Set up a predictable, default environment so the test results are predictable
      //$apiConfig['oauth2_client_id'] = 'INSERT_CLIENT_ID';
      //$apiConfig['oauth2_client_secret'] = 'INSERT_CLIENT_SECRET';
      $apiConfig['authClass'] = 'apiOAuth2';
      $apiConfig['ioClass'] = 'apiCurlIO';
      $apiConfig['cacheClass'] = 'apiFileCache';
      $apiConfig['ioFileCache_directory'] = '/tmp/googleApiTests';

      $apiClient = new apiClient();
      $pageSpeedService = new apiPagespeedonlineService($apiClient);
      if (!$apiClient->getAccessToken()) {
        $apiClient->setAccessToken($apiConfig['oauth_test_token']);
      }
    }
    $this->apiClient = $apiClient;
    $this->pageSpeedService = $pageSpeedService;
  }

  public function __destruct() {
    global $apiConfig;
    $this->pageSpeedService = null;
    $this->apiClient = null;
    if ($this->origConfig) {
      $apiConfig = $this->origConfig;
    }
  }

  public function testPageSpeed() {
    $psapi = $this->pageSpeedService->pagespeedapi;
    $result = $psapi->runpagespeed('http://code.google.com');
    $this->assertArrayHasKey('kind', $result);
    $this->assertArrayHasKey('id', $result);
    $this->assertArrayHasKey('responseCode', $result);
    $this->assertArrayHasKey('title', $result);
    $this->assertArrayHasKey('score', $result);
    $this->assertArrayHasKey('pageStats', $result);
    $this->assertArrayHasKey('version', $result);
  }
}

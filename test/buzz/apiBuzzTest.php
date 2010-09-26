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

require_once "../src/apiClient.php";
require_once "../src/contrib/apiBuzzService.php";

// These variables are shared between all the buzz test cases as performance optimization
$apiBuzzTest_apiClient = null;
$apiBuzzTest_buzz = null;

class apiBuzzTest extends PHPUnit_Framework_TestCase {

  public $apiClient;
  public $oauthToken;
  public $buzz;

  private $origConfig = false;

  public function __construct() {
    global $apiConfig, $apiBuzzTest_apiClient, $apiBuzzTest_buzz;
    parent::__construct();

    if (! $apiBuzzTest_apiClient || ! $apiBuzzTest_buzz) {

      $this->origConfig = $apiConfig;
      // Set up a predictable, default envirioment so the test results are predictable
      $apiConfig['authClass'] = 'apiOAuth';
      $apiConfig['ioClass'] = 'apiCurlIO';
      $apiConfig['cacheClass'] = 'apiFileCache';
      $apiConfig['ioFileCache_directory'] = '/tmp/googleApiTests';

      // create the global api and buzz clients (which are shared between the various buzz test suites for performance reasons)
      $apiBuzzTest_apiClient = new apiClient();
      $apiBuzzTest_buzz = new apiBuzzService($apiBuzzTest_apiClient);
      $apiBuzzTest_apiClient->setAccessToken($apiConfig['oauth_test_token']);
    }
    $this->apiClient = $apiBuzzTest_apiClient;
    $this->buzz = $apiBuzzTest_buzz;
  }

  public function __destruct() {
    global $apiConfig;
    $this->buzz = null;
    $this->apiClient = null;
    if ($this->origConfig) {
      $apiConfig = $this->origConfig;
    }
  }

}

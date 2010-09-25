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

class apiBuzzTest extends PHPUnit_Framework_TestCase {

  public $apiClient;
  public $oauthToken;
  public $buzz;

  private $origConfig;

  public function __construct() {
    global $apiConfig;
    parent::setUp();
    $this->origConfig = $apiConfig;

    // Set up a predictable, default envirioment so the test results are predictable
    $apiConfig['authClass'] ='apiOAuth';
    $apiConfig['ioClass'] = 'apiCurlIO';
	$apiConfig['cacheClass'] = 'apiFileCache';
    $apiConfig['ioFileCache_directory'] = '/tmp/googleApiTests';

    $this->apiClient = new apiClient();
    $this->buzz = new apiBuzzService($this->apiClient);
    $this->apiClient->setAccessToken($apiConfig['oauth_test_token']);
  }

  public function __destruct() {
    global $apiConfig;
    $this->buzz = null;
    $this->apiClient = null;
    $apiConfig = $this->origConfig;
    parent::tearDown();
  }

}



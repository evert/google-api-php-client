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

class UrlShortenerTests extends BaseTest {
  public $service;

  public function __construct() {
    parent::__construct();
    $this->service = new apiUrlshortenerService(BaseTest::$client);
  }

  public function testUrlShort() {
    $url = new Url();
    $url->longUrl = "http://google.com";

    $shortUrl = $this->service->url->insert($url);
    $this->assertEquals('urlshortener#url', $shortUrl['kind']);
    $this->assertEquals('http://google.com/', $shortUrl['longUrl']);
  }
}

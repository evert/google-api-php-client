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

require_once "service/apiServiceResource.php";
require_once "service/apiServiceRequest.php";
require_once "service/apiBatch.php";
require_once "service/apiModel.php";

class apiService {

  protected $io;
  protected $version = null;
  protected $baseUrl;

  public function __construct($serviceName, $discoveryDocument, apiIO $io) {
    $this->io = $io;
    $discoveryDocument = $discoveryDocument['data'][$serviceName];
    foreach ($discoveryDocument as $version => $service) {
      if ($this->version !== null) {
        throw new apiException("Multiple service versions returned in the discovery document, giving up");
      }
      $this->version = $version;
      $this->baseUrl = $service['baseUrl'];
      foreach ($service['resources'] as $resourceName => $resourceTypes) {
        $this->$resourceName = new apiServiceResource($this, $serviceName, $resourceName, $resourceTypes);
      }
    }
  }

  /**
   * @return the $io
   */
  public function getIo() {
    return $this->io;
  }

  /**
   * @param $io the $io to set
   */
  public function setIo($io) {
    $this->io = $io;
  }

  /**
   * @return the $version
   */
  public function getVersion() {
    return $this->version;
  }

  /**
   * @return the $baseUrl
   */
  public function getBaseUrl() {
    return $this->baseUrl;
  }

  /**
   * @param $version the $version to set
   */
  public function setVersion($version) {
    $this->version = $version;
  }

  /**
   * @param $baseUrl the $baseUrl to set
   */
  public function setBaseUrl($baseUrl) {
    $this->baseUrl = $baseUrl;
  }
}

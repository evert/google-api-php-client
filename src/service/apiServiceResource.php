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

class apiServiceResource {

  private $service;
  private $serviceName;
  private $resourceName;
  private $methods;

  public function __construct($service, $serviceName, $resourceName, $resource) {
    $this->service = $service;
    $this->serviceName = $serviceName;
    $this->resourceName = $resourceName;
    $this->methods = $resource['methods'];
  }

  public function __call($name, $arguments) {
    if (count($arguments) != 1) {
      throw new apiException("apiClient method calls expect one parameter (for example: \$apiClient->buzz->activities->list( array('userId' => '@me'))");
    }
    if (! is_array($arguments[0])) {
      throw new apiException("apiClient method parameter should me an array (for example: \$apiClient->buzz->activities->list( array('userId' => '@me'))");
    }
    if (!isset($this->methods[$name])) {
      throw new apiException("Unknown function: {$this->serviceName}->{$this->resourceName}->{$name}()");
    }
    $method = $this->methods[$name];
    $parameters = $arguments[0];

    foreach ($parameters as $key => $val) {
      if (!isset($method['parameters'][$key])) {
        throw new apiException("($name) unknown parameter: '$key'");
      }
    }

    foreach ($method['parameters'] as $paramName => $paramSpec) {
      if ($paramSpec['required'] && !isset($parameters[$paramName])) {
        throw new apiException("($name) missing required param: '$paramName'");
      }
      if (isset($parameters[$paramName])) {
        $value = $parameters[$paramName];
        $parameters[$paramName] = $paramSpec;
        $parameters[$paramName]['value'] = $value;
      } else {
        unset($parameters[$paramName]);
      }
    }
    $request = new apiServiceRequest($method['pathUrl'], $method['rpcName'], $method['httpMethod'], $parameters);
    echo "<pre>Request:\n" . print_r($request, true) . "</pre>";
  }

}
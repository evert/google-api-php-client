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

/**
 * Implements the actual methods/resources of the discovered Google API using magic function
 * calling overloading (__call()), which on call will see if the method name (buzz.activities.list)
 * is available in this service, and if so construct an apiServiceRequest representing it.
 *
 * @author Chris Chabot <chabotc@google.com>
 *
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
    if (count($arguments) != 1 && count($arguments) != 2) {
      throw new apiException("apiClient method calls expect one or two parameter (for example: \$apiClient->buzz->activities->list( array('userId' => '@me')) or when executing a batch request: \$apiClient->buzz->activities->list( array('userId' => '@me'), 'batchKey')");
    }
    if (! is_array($arguments[0])) {
      throw new apiException("apiClient method parameter should me an array (for example: \$apiClient->buzz->activities->list( array('userId' => '@me'))");
    }
    $batchKey = false;
    if (isset($arguments[1])) {
      if (! is_string($arguments[1])) {
        throw new apiException("The batch key parameter should be a string, for example: \$apiClient->buzz->activities->list( array('userId' => '@me'), 'batchKey')");
      }
      $batchKey = $arguments[1];
    }
    if (! isset($this->methods[$name])) {
      throw new apiException("Unknown function: {$this->serviceName}->{$this->resourceName}->{$name}()");
    }
    $method = $this->methods[$name];
    $parameters = $arguments[0];
    // postBody is a special case since it's not defined in the discovery document as parameter, but we abuse the param entry for storing it
    $postBody = null;
    if (isset($parameters['postBody'])) {
      // If the postBody is not a raw json string, json encode it for transport
      $postBody = is_array($parameters['postBody']) || is_object($parameters['postBody']) ? json_encode($parameters['postBody']) : $parameters['postBody'];
      // remove from the parameter list so not to trip up the param entry checking & make sure it doesn't end up on the query
      unset($parameters['postBody']);
      //FIXME Should really add the magic array('data' => ..real stuff ..) wrapper around the request as to not bother developers with it
    }
    foreach ($parameters as $key => $val) {
      if ($key != 'postBody' && ! isset($method['parameters'][$key])) {
        throw new apiException("($name) unknown parameter: '$key'");
      }
    }
    if (isset($method['parameters'])) {
      foreach ($method['parameters'] as $paramName => $paramSpec) {
        if ($paramSpec['required'] && ! isset($parameters[$paramName])) {
          throw new apiException("($name) missing required param: '$paramName'");
        }
        if (isset($parameters[$paramName])) {
          $value = $parameters[$paramName];
          // check to see if the param value matches the required pattern
          if (isset($parameters[$paramName]['pattern']) && ! empty($parameters[$paramName]['pattern'])) {
            if (preg_match('|' . $parameters[$paramName]['pattern'] . '|', $value) == 0) {
              throw new apiException("($name) invalid parameter format for $paramName: $value doesn't match \"{$parameters[$paramName]['pattern']}\"");
            }
          }
          $parameters[$paramName] = $paramSpec;
          $parameters[$paramName]['value'] = $value;
          // remove all the bits that were already validated in this function & are no longer relevant within the execution chain
          unset($parameters[$paramName]['pattern']);
          unset($parameters[$paramName]['required']);
        } else {
          unset($parameters[$paramName]);
        }
      }
    }
    $request = new apiServiceRequest($this->service->getIo(), $this->service->getRestBasePath(), $this->service->getRpcPath(), $method['restPath'], $method['rpcMethod'], $method['httpMethod'], $parameters, $postBody);
    if ($batchKey) {
      $request->setBatchKey($batchKey);
      return $request;
    } else {
      return apiREST::execute($request);
    }
  }
}

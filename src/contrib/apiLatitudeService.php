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


require_once 'service/apiServiceRequest.php';


  /**
   * The "currentLocation" collection of methods.
   * Typical usage is:
   *  <code>
   *   $latitudeService = new apiLatitudeService(...);
   *   $currentLocation = $latitudeService->currentLocation;
   *  </code>
   */
  class CurrentLocationServiceResource extends apiServiceResource {


    /**
     * Updates or creates the user's current location. (currentLocation.insert)
     *
     * @param $postBody the {@link LatitudeCurrentlocationResourceJson}
     */
    public function insert(LatitudeCurrentlocationResourceJson $postBody) {
      return $this->__call('insert', array(array('postBody' => $postBody)));
    }
    /**
     * Returns the authenticated user's current location. (currentLocation.get)
     *
     * @param  $granularity Granularity of the requested location.
     */
    public function get($granularity = null) {
      return $this->__call('get', array(array('granularity' => $granularity)));
    }
    /**
     * Deletes the authenticated user's current location. (currentLocation.delete)
     *
     */
    public function delete() {
      return $this->__call('delete', array(array()));
    }
  }

  /**
   * The "location" collection of methods.
   * Typical usage is:
   *  <code>
   *   $latitudeService = new apiLatitudeService(...);
   *   $location = $latitudeService->location;
   *  </code>
   */
  class LocationServiceResource extends apiServiceResource {


    /**
     * Inserts or updates a location in the user's location history. (location.insert)
     *
     * @param $postBody the {@link Location}
     */
    public function insert(Location $postBody) {
      return $this->__call('insert', array(array('postBody' => $postBody)));
    }
    /**
     * Reads a location from the user's location history. (location.get)
     *
     * @param  $granularity Granularity of the location to return.
     * @param  $locationId Timestamp of the location to read (ms since epoch).
     */
    public function get($locationId, $granularity = null) {
      return $this->__call('get', array(array('granularity' => $granularity, 'locationId' => $locationId)));
    }
    /**
     * Lists the user's location history. (location.list)
     *
     * @param  $max_results Maximum number of locations to return.
     * @param  $max_time Maximum timestamp of locations to return (ms since epoch).
     * @param  $min_time Minimum timestamp of locations to return (ms since epoch).
     * @param  $granularity Granularity of the requested locations.
     */
    public function listLocation($granularity = null, $max_results = null, $max_time = null, $min_time = null) {
      return $this->__call('list', array(array('max-results' => $max_results, 'max-time' => $max_time, 'min-time' => $min_time, 'granularity' => $granularity)));
    }
    /**
     * Deletes a location from the user's location history. (location.delete)
     *
     * @param  $locationId Timestamp of the location to delete (ms since epoch).
     */
    public function delete($locationId) {
      return $this->__call('delete', array(array('locationId' => $locationId)));
    }
  }



/**
 * Service definition for Latitude (v1).
 *
 * <p>
 * Lets you read and update your current location and work with your location history
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class apiLatitudeService {

  // Variables that the apiServiceResource implementation depends on.
  private $serviceName = 'latitude';
  private $version = 'v1';
  private $restBasePath = '/latitude/v1/';
  private $rpcPath = '/rpc';
  private $io;
  // apiServiceResource's that are used internally
  public $currentLocation;
  public $location;
  /**
   * Constructs the internal representation of the Latitude service.
   *
   * @param apiClient apiClient
   */
  public function __construct(apiClient $apiClient) {
     $apiClient->addService($this->serviceName, $this->version);
     $this->io = $apiClient->getIo();
     $this->currentLocation = new CurrentLocationServiceResource($this, $this->serviceName, 'currentLocation', json_decode('{"methods": {"insert": {"scopes": ["https://www.googleapis.com/auth/latitude"], "request": {"$ref": "LatitudeCurrentlocationResourceJson"}, "rpcMethod": "latitude.currentLocation.insert", "httpMethod": "POST", "response": {"$ref": "LatitudeCurrentlocationResourceJson"}, "restPath": "currentLocation"}, "delete": {"restPath": "currentLocation", "httpMethod": "DELETE", "rpcMethod": "latitude.currentLocation.delete", "scopes": ["https://www.googleapis.com/auth/latitude"]}, "get": {"scopes": ["https://www.googleapis.com/auth/latitude"], "parameters": {"granularity": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "latitude.currentLocation.get", "httpMethod": "GET", "response": {"$ref": "LatitudeCurrentlocationResourceJson"}, "restPath": "currentLocation"}}}', true));
     $this->location = new LocationServiceResource($this, $this->serviceName, 'location', json_decode('{"methods": {"insert": {"scopes": ["https://www.googleapis.com/auth/latitude"], "request": {"$ref": "Location"}, "rpcMethod": "latitude.location.insert", "httpMethod": "POST", "response": {"$ref": "Location"}, "restPath": "location"}, "delete": {"scopes": ["https://www.googleapis.com/auth/latitude"], "parameters": {"locationId": {"restParameterType": "path", "required": true, "type": "string"}}, "rpcMethod": "latitude.location.delete", "httpMethod": "DELETE", "restPath": "location/{locationId}"}, "list": {"scopes": ["https://www.googleapis.com/auth/latitude"], "parameters": {"max-results": {"restParameterType": "query", "type": "string"}, "max-time": {"restParameterType": "query", "type": "string"}, "min-time": {"restParameterType": "query", "type": "string"}, "granularity": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "latitude.location.list", "httpMethod": "GET", "response": {"$ref": "LocationFeed"}, "restPath": "location"}, "get": {"scopes": ["https://www.googleapis.com/auth/latitude"], "parameters": {"locationId": {"restParameterType": "path", "required": true, "type": "string"}, "granularity": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "latitude.location.get", "httpMethod": "GET", "response": {"$ref": "Location"}, "restPath": "location/{locationId}"}}}', true));
  }

  /**
   * @return $io
   */
  public function getIo() {
    return $this->io;
  }
  /**
   * @return $version
   */
  public function getVersion() {
    return $this->version;
  }

  /**
   * @return $restBasePath
   */
  public function getRestBasePath() {
    return $this->restBasePath;
  }

  /**
   * @return $rpcPath
   */
  public function getRpcPath() {
    return $this->rpcPath;
  }
}

class LatitudeCurrentlocationResourceJson {


}


class Location {

  public $kind;
  public $altitude;
  public $placeid;
  public $longitude;
  public $activityId;
  public $latitude;
  public $altitudeAccuracy;
  public $timestampMs;
  public $speed;
  public $heading;
  public $accuracy;

  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setAltitude($altitude) {
    $this->altitude = $altitude;
  }

  public function getAltitude() {
    return $this->altitude;
  }
  
  public function setPlaceid($placeid) {
    $this->placeid = $placeid;
  }

  public function getPlaceid() {
    return $this->placeid;
  }
  
  public function setLongitude($longitude) {
    $this->longitude = $longitude;
  }

  public function getLongitude() {
    return $this->longitude;
  }
  
  public function setActivityId($activityId) {
    $this->activityId = $activityId;
  }

  public function getActivityId() {
    return $this->activityId;
  }
  
  public function setLatitude($latitude) {
    $this->latitude = $latitude;
  }

  public function getLatitude() {
    return $this->latitude;
  }
  
  public function setAltitudeAccuracy($altitudeAccuracy) {
    $this->altitudeAccuracy = $altitudeAccuracy;
  }

  public function getAltitudeAccuracy() {
    return $this->altitudeAccuracy;
  }
  
  public function setTimestampMs($timestampMs) {
    $this->timestampMs = $timestampMs;
  }

  public function getTimestampMs() {
    return $this->timestampMs;
  }
  
  public function setSpeed($speed) {
    $this->speed = $speed;
  }

  public function getSpeed() {
    return $this->speed;
  }
  
  public function setHeading($heading) {
    $this->heading = $heading;
  }

  public function getHeading() {
    return $this->heading;
  }
  
  public function setAccuracy($accuracy) {
    $this->accuracy = $accuracy;
  }

  public function getAccuracy() {
    return $this->accuracy;
  }
  
}


class LocationFeed {

  public $items;
  public $kind;

  public function setItems( Location $items) {
    $this->items = $items;
  }

  public function getItems() {
    return $this->items;
  }
  
  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
}


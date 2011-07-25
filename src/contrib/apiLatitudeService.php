<?php
/*
 * Copyright (c) 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

require_once 'service/apiModel.php';
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
      $params = array('postBody' => $postBody);
      return $this->__call('insert', array($params));
    }
    /**
     * Returns the authenticated user's current location. (currentLocation.get)
     *
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string $granularity Granularity of the requested location.
     */
    public function get($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      return $this->__call('get', array($params));
    }
    /**
     * Deletes the authenticated user's current location. (currentLocation.delete)
     *
     */
    public function delete() {
      $params = array();
      return $this->__call('delete', array($params));
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
      $params = array('postBody' => $postBody);
      return $this->__call('insert', array($params));
    }
    /**
     * Reads a location from the user's location history. (location.get)
     *
     * @param string $locationId Timestamp of the location to read (ms since epoch).
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string $granularity Granularity of the location to return.
     */
    public function get($locationId, $optParams = array()) {
      $params = array('locationId' => $locationId);
      $params = array_merge($params, $optParams);
      return $this->__call('get', array($params));
    }
    /**
     * Lists the user's location history. (location.list)
     *
     * @param array $optParams Optional parameters. Valid optional parameters are listed below.
     *
     * @opt_param string $max-results Maximum number of locations to return.
     * @opt_param string $max-time Maximum timestamp of locations to return (ms since epoch).
     * @opt_param string $min-time Minimum timestamp of locations to return (ms since epoch).
     * @opt_param string $granularity Granularity of the requested locations.
     */
    public function listLocation($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      return $this->__call('list', array($params));
    }
    /**
     * Deletes a location from the user's location history. (location.delete)
     *
     * @param string $locationId Timestamp of the location to delete (ms since epoch).
     */
    public function delete($locationId) {
      $params = array('locationId' => $locationId);
      return $this->__call('delete', array($params));
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
 * <a href="http://code.google.com/apis/latitude/v1/using_rest.html" target="_blank">API Documentation</a>
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
     $this->currentLocation = new CurrentLocationServiceResource($this, $this->serviceName, 'currentLocation', json_decode('{"methods": {"insert": {"request": {"$ref": "LatitudeCurrentlocationResourceJson"}, "id": "latitude.currentLocation.insert", "httpMethod": "POST", "path": "currentLocation", "response": {"$ref": "LatitudeCurrentlocationResourceJson"}}, "delete": {"path": "currentLocation", "httpMethod": "DELETE", "id": "latitude.currentLocation.delete"}, "get": {"parameters": {"granularity": {"type": "string", "location": "query"}}, "id": "latitude.currentLocation.get", "httpMethod": "GET", "path": "currentLocation", "response": {"$ref": "LatitudeCurrentlocationResourceJson"}}}}', true));
     $this->location = new LocationServiceResource($this, $this->serviceName, 'location', json_decode('{"methods": {"insert": {"request": {"$ref": "Location"}, "id": "latitude.location.insert", "httpMethod": "POST", "path": "location", "response": {"$ref": "Location"}}, "delete": {"parameters": {"locationId": {"required": true, "type": "string", "location": "path"}}, "httpMethod": "DELETE", "path": "location/{locationId}", "id": "latitude.location.delete"}, "list": {"parameters": {"max-results": {"type": "string", "location": "query"}, "max-time": {"type": "string", "location": "query"}, "min-time": {"type": "string", "location": "query"}, "granularity": {"type": "string", "location": "query"}}, "id": "latitude.location.list", "httpMethod": "GET", "path": "location", "response": {"$ref": "LocationFeed"}}, "get": {"parameters": {"locationId": {"required": true, "type": "string", "location": "path"}, "granularity": {"type": "string", "location": "query"}}, "id": "latitude.location.get", "httpMethod": "GET", "path": "location/{locationId}", "response": {"$ref": "Location"}}}}', true));
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

class LatitudeCurrentlocationResourceJson extends apiModel {


}


class Location extends apiModel {

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


class LocationFeed extends apiModel {

  public $items;
  public $kind;

  public function setItems(Location $items) {
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


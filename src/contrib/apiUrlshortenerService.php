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
   * The "url" collection of methods.
   * Typical usage is:
   *  <code>
   *   $urlshortenerService = new apiUrlshortenerService(...);
   *   $url = $urlshortenerService->url;
   *  </code>
   */
  class UrlServiceResource extends apiServiceResource {


    /**
     * Creates a new short URL. (url.insert)
     *
     * @param $postBody the {@link Url}
     */
    public function insert(Url $postBody) {
      return $this->__call('insert', array(array('postBody' => $postBody)));
    }
    /**
     * Retrieves a list of URLs shortened by a user. (url.list)
     *
     * @param  $start_token Token for requesting successive pages of results.
     * @param  $projection Additional information to return.
     */
    public function listUrl($projection = null, $start_token = null) {
      return $this->__call('list', array(array('start-token' => $start_token, 'projection' => $projection)));
    }
    /**
     * Expands a short URL or gets creation time and analytics. (url.get)
     *
     * @param  $shortUrl The short URL, including the protocol.
     * @param  $projection Additional information to return.
     */
    public function get($shortUrl, $projection = null) {
      return $this->__call('get', array(array('shortUrl' => $shortUrl, 'projection' => $projection)));
    }
  }



/**
 * Service definition for Urlshortener (v1).
 *
 * <p>
 * Lets you create, inspect, and manage goo.gl short URLs
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class apiUrlshortenerService {

  // Variables that the apiServiceResource implementation depends on.
  private $serviceName = 'urlshortener';
  private $version = 'v1';
  private $restBasePath = '/urlshortener/v1/';
  private $rpcPath = '/rpc';
  private $io;
  // apiServiceResource's that are used internally
  public $url;
  /**
   * Constructs the internal representation of the Urlshortener service.
   *
   * @param apiClient apiClient
   */
  public function __construct(apiClient $apiClient) {
     $apiClient->addService($this->serviceName, $this->version);
     $this->io = $apiClient->getIo();
     $this->url = new UrlServiceResource($this, $this->serviceName, 'url', json_decode('{"methods": {"insert": {"scopes": ["https://www.googleapis.com/auth/urlshortener"], "request": {"$ref": "Url"}, "rpcMethod": "urlshortener.url.insert", "httpMethod": "POST", "response": {"$ref": "Url"}, "restPath": "url"}, "list": {"scopes": ["https://www.googleapis.com/auth/urlshortener"], "parameters": {"start-token": {"restParameterType": "query", "type": "string"}, "projection": {"restParameterType": "query", "enum": ["ANALYTICS_CLICKS", "FULL"], "type": "string"}}, "rpcMethod": "urlshortener.url.list", "httpMethod": "GET", "response": {"$ref": "UrlHistory"}, "restPath": "url/history"}, "get": {"parameters": {"shortUrl": {"restParameterType": "query", "required": true, "type": "string"}, "projection": {"restParameterType": "query", "enum": ["ANALYTICS_CLICKS", "ANALYTICS_TOP_STRINGS", "FULL"], "type": "string"}}, "rpcMethod": "urlshortener.url.get", "httpMethod": "GET", "response": {"$ref": "Url"}, "restPath": "url"}}}', true));
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

class AnalyticsSummary {

  public $week;
  public $allTime;
  public $twoHours;
  public $day;
  public $month;

  public function setWeek( AnalyticsSnapshot $week) {
    $this->week = $week;
  }

  public function getWeek() {
    return $this->week;
  }
  
  public function setAllTime( AnalyticsSnapshot $allTime) {
    $this->allTime = $allTime;
  }

  public function getAllTime() {
    return $this->allTime;
  }
  
  public function setTwoHours( AnalyticsSnapshot $twoHours) {
    $this->twoHours = $twoHours;
  }

  public function getTwoHours() {
    return $this->twoHours;
  }
  
  public function setDay( AnalyticsSnapshot $day) {
    $this->day = $day;
  }

  public function getDay() {
    return $this->day;
  }
  
  public function setMonth( AnalyticsSnapshot $month) {
    $this->month = $month;
  }

  public function getMonth() {
    return $this->month;
  }
  
}


class Url {

  public $status;
  public $kind;
  public $created;
  public $analytics;
  public $longUrl;
  public $id;

  public function setStatus($status) {
    $this->status = $status;
  }

  public function getStatus() {
    return $this->status;
  }
  
  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setCreated($created) {
    $this->created = $created;
  }

  public function getCreated() {
    return $this->created;
  }
  
  public function setAnalytics( AnalyticsSummary $analytics) {
    $this->analytics = $analytics;
  }

  public function getAnalytics() {
    return $this->analytics;
  }
  
  public function setLongUrl($longUrl) {
    $this->longUrl = $longUrl;
  }

  public function getLongUrl() {
    return $this->longUrl;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
}


class UrlHistory {

  public $nextPageToken;
  public $items;
  public $kind;
  public $itemsPerPage;
  public $totalItems;

  public function setNextPageToken($nextPageToken) {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken() {
    return $this->nextPageToken;
  }
  
  public function setItems( Url $items) {
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
  
  public function setItemsPerPage($itemsPerPage) {
    $this->itemsPerPage = $itemsPerPage;
  }

  public function getItemsPerPage() {
    return $this->itemsPerPage;
  }
  
  public function setTotalItems($totalItems) {
    $this->totalItems = $totalItems;
  }

  public function getTotalItems() {
    return $this->totalItems;
  }
  
}


class AnalyticsSnapshot {

  public $shortUrlClicks;
  public $countries;
  public $platforms;
  public $browsers;
  public $referrers;
  public $longUrlClicks;

  public function setShortUrlClicks($shortUrlClicks) {
    $this->shortUrlClicks = $shortUrlClicks;
  }

  public function getShortUrlClicks() {
    return $this->shortUrlClicks;
  }
  
  public function setCountries( StringCount $countries) {
    $this->countries = $countries;
  }

  public function getCountries() {
    return $this->countries;
  }
  
  public function setPlatforms( StringCount $platforms) {
    $this->platforms = $platforms;
  }

  public function getPlatforms() {
    return $this->platforms;
  }
  
  public function setBrowsers( StringCount $browsers) {
    $this->browsers = $browsers;
  }

  public function getBrowsers() {
    return $this->browsers;
  }
  
  public function setReferrers( StringCount $referrers) {
    $this->referrers = $referrers;
  }

  public function getReferrers() {
    return $this->referrers;
  }
  
  public function setLongUrlClicks($longUrlClicks) {
    $this->longUrlClicks = $longUrlClicks;
  }

  public function getLongUrlClicks() {
    return $this->longUrlClicks;
  }
  
}


class StringCount {

  public $count;
  public $id;

  public function setCount($count) {
    $this->count = $count;
  }

  public function getCount() {
    return $this->count;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
}


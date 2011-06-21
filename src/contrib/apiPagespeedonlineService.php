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
   * The "pagespeedapi" collection of methods.
   * Typical usage is:
   *  <code>
   *   $pagespeedonlineService = new apiPagespeedonlineService(...);
   *   $pagespeedapi = $pagespeedonlineService->pagespeedapi;
   *  </code>
   */
  class PagespeedapiServiceResource extends apiServiceResource {


    /**
     * Runs Page Speed analysis on the page at the specified URL, and returns a Page Speed score, a list
     * of suggestions to make that page faster, and other information. (pagespeedapi.runpagespeed)
     *
     * @param  $locale The locale used to localize formatted results
     * @param  $url The URL to fetch and analyze
     * @param  $rule A Page Speed rule to run; if none are given, all rules are run
     * @param  $strategy The analysis strategy to use
     */
    public function runpagespeed($url, $locale = null, $rule = null, $strategy = null) {
      return $this->__call('runpagespeed', array(array('locale' => $locale, 'url' => $url, 'rule' => $rule, 'strategy' => $strategy)));
    }
  }



/**
 * Service definition for Pagespeedonline (v1).
 *
 * <p>
 * Lets you analyze the performance of a web page and get tailored suggestions to make that page faster.
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class apiPagespeedonlineService {

  // Variables that the apiServiceResource implementation depends on.
  private $serviceName = 'pagespeedonline';
  private $version = 'v1';
  private $restBasePath = '/pagespeedonline/v1/';
  private $rpcPath = '/rpc';
  private $io;
  // apiServiceResource's that are used internally
  public $pagespeedapi;
  /**
   * Constructs the internal representation of the Pagespeedonline service.
   *
   * @param apiClient apiClient
   */
  public function __construct(apiClient $apiClient) {
     $apiClient->addService($this->serviceName, $this->version);
     $this->io = $apiClient->getIo();
     $this->pagespeedapi = new PagespeedapiServiceResource($this, $this->serviceName, 'pagespeedapi', json_decode('{"methods": {"runpagespeed": {"parameters": {"locale": {"pattern": "[a-zA-Z]+(_[a-zA-Z]+)?", "restParameterType": "query", "type": "string"}, "url": {"pattern": "http(s)?://.*", "restParameterType": "query", "required": true, "type": "string"}, "rule": {"pattern": "[a-zA-Z]+", "restParameterType": "query", "type": "string", "repeated": true}, "strategy": {"restParameterType": "query", "enum": ["desktop", "mobile"], "type": "string"}}, "rpcMethod": "pagespeedonline.pagespeedapi.runpagespeed", "httpMethod": "GET", "response": {"$ref": "Result"}, "restPath": "runPagespeed"}}}', true));
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

class ResultVersion {

  public $major;
  public $minor;

  public function setMajor($major) {
    $this->major = $major;
  }

  public function getMajor() {
    return $this->major;
  }
  
  public function setMinor($minor) {
    $this->minor = $minor;
  }

  public function getMinor() {
    return $this->minor;
  }
  
}


class ResultFormattedResultsRuleResults {


}


class ResultPageStats {

  public $otherResponseBytes;
  public $flashResponseBytes;
  public $totalRequestBytes;
  public $numberCssResources;
  public $numberResources;
  public $cssResponseBytes;
  public $javascriptResponseBytes;
  public $imageResponseBytes;
  public $numberHosts;
  public $numberStaticResources;
  public $htmlResponseBytes;
  public $numberJsResources;
  public $textResponseBytes;

  public function setOtherResponseBytes($otherResponseBytes) {
    $this->otherResponseBytes = $otherResponseBytes;
  }

  public function getOtherResponseBytes() {
    return $this->otherResponseBytes;
  }
  
  public function setFlashResponseBytes($flashResponseBytes) {
    $this->flashResponseBytes = $flashResponseBytes;
  }

  public function getFlashResponseBytes() {
    return $this->flashResponseBytes;
  }
  
  public function setTotalRequestBytes($totalRequestBytes) {
    $this->totalRequestBytes = $totalRequestBytes;
  }

  public function getTotalRequestBytes() {
    return $this->totalRequestBytes;
  }
  
  public function setNumberCssResources($numberCssResources) {
    $this->numberCssResources = $numberCssResources;
  }

  public function getNumberCssResources() {
    return $this->numberCssResources;
  }
  
  public function setNumberResources($numberResources) {
    $this->numberResources = $numberResources;
  }

  public function getNumberResources() {
    return $this->numberResources;
  }
  
  public function setCssResponseBytes($cssResponseBytes) {
    $this->cssResponseBytes = $cssResponseBytes;
  }

  public function getCssResponseBytes() {
    return $this->cssResponseBytes;
  }
  
  public function setJavascriptResponseBytes($javascriptResponseBytes) {
    $this->javascriptResponseBytes = $javascriptResponseBytes;
  }

  public function getJavascriptResponseBytes() {
    return $this->javascriptResponseBytes;
  }
  
  public function setImageResponseBytes($imageResponseBytes) {
    $this->imageResponseBytes = $imageResponseBytes;
  }

  public function getImageResponseBytes() {
    return $this->imageResponseBytes;
  }
  
  public function setNumberHosts($numberHosts) {
    $this->numberHosts = $numberHosts;
  }

  public function getNumberHosts() {
    return $this->numberHosts;
  }
  
  public function setNumberStaticResources($numberStaticResources) {
    $this->numberStaticResources = $numberStaticResources;
  }

  public function getNumberStaticResources() {
    return $this->numberStaticResources;
  }
  
  public function setHtmlResponseBytes($htmlResponseBytes) {
    $this->htmlResponseBytes = $htmlResponseBytes;
  }

  public function getHtmlResponseBytes() {
    return $this->htmlResponseBytes;
  }
  
  public function setNumberJsResources($numberJsResources) {
    $this->numberJsResources = $numberJsResources;
  }

  public function getNumberJsResources() {
    return $this->numberJsResources;
  }
  
  public function setTextResponseBytes($textResponseBytes) {
    $this->textResponseBytes = $textResponseBytes;
  }

  public function getTextResponseBytes() {
    return $this->textResponseBytes;
  }
  
}


class Result {

  public $kind;
  public $formattedResults;
  public $title;
  public $version;
  public $score;
  public $responseCode;
  public $invalidRules;
  public $pageStats;
  public $id;

  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setFormattedResults( ResultFormattedResults $formattedResults) {
    $this->formattedResults = $formattedResults;
  }

  public function getFormattedResults() {
    return $this->formattedResults;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
  public function setVersion( ResultVersion $version) {
    $this->version = $version;
  }

  public function getVersion() {
    return $this->version;
  }
  
  public function setScore($score) {
    $this->score = $score;
  }

  public function getScore() {
    return $this->score;
  }
  
  public function setResponseCode($responseCode) {
    $this->responseCode = $responseCode;
  }

  public function getResponseCode() {
    return $this->responseCode;
  }
  
  public function setInvalidRules($invalidRules) {
    $this->invalidRules = $invalidRules;
  }

  public function getInvalidRules() {
    return $this->invalidRules;
  }
  
  public function setPageStats( ResultPageStats $pageStats) {
    $this->pageStats = $pageStats;
  }

  public function getPageStats() {
    return $this->pageStats;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
}


class ResultFormattedResults {

  public $locale;
  public $ruleResults;

  public function setLocale($locale) {
    $this->locale = $locale;
  }

  public function getLocale() {
    return $this->locale;
  }
  
  public function setRuleResults( ResultFormattedResultsRuleResults $ruleResults) {
    $this->ruleResults = $ruleResults;
  }

  public function getRuleResults() {
    return $this->ruleResults;
  }
  
}


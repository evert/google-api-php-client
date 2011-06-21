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
   * The "cse" collection of methods.
   * Typical usage is:
   *  <code>
   *   $customsearchService = new apiCustomsearchService(...);
   *   $cse = $customsearchService->cse;
   *  </code>
   */
  class CseServiceResource extends apiServiceResource {


    /**
     * Returns metadata about the search performed, metadata about the custom search engine used for the
     * search, and the search results. (cse.list)
     *
     * @param  $sort The sort expression to apply to the results
     * @param  $cx The custom search engine ID to scope this search query
     * @param  $safe Search safety level
     * @param  $q Query
     * @param  $start The index of the first result to return
     * @param  $num Number of search results to return
     * @param  $lr The language restriction for the search results
     * @param  $cref The URL of a linked custom search engine
     */
    public function listCse($q, $cref = null, $cx = null, $lr = null, $num = null, $safe = null, $sort = null, $start = null) {
      return $this->__call('list', array(array('sort' => $sort, 'cx' => $cx, 'safe' => $safe, 'q' => $q, 'start' => $start, 'num' => $num, 'lr' => $lr, 'cref' => $cref)));
    }
  }



/**
 * Service definition for Customsearch (v1).
 *
 * <p>
 * Lets you search over a website or collection of websites
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class apiCustomsearchService {

  // Variables that the apiServiceResource implementation depends on.
  private $serviceName = 'customsearch';
  private $version = 'v1';
  private $restBasePath = '/customsearch/';
  private $rpcPath = '/rpc';
  private $io;
  // apiServiceResource's that are used internally
  public $cse;
  /**
   * Constructs the internal representation of the Customsearch service.
   *
   * @param apiClient apiClient
   */
  public function __construct(apiClient $apiClient) {
     $apiClient->addService($this->serviceName, $this->version);
     $this->io = $apiClient->getIo();
     $this->cse = new CseServiceResource($this, $this->serviceName, 'cse', json_decode('{"methods": {"list": {"parameters": {"sort": {"restParameterType": "query", "type": "string"}, "num": {"default": "10", "restParameterType": "query", "type": "string"}, "safe": {"default": "off", "enum": ["high", "medium", "off"], "restParameterType": "query", "type": "string"}, "q": {"restParameterType": "query", "required": true, "type": "string"}, "start": {"restParameterType": "query", "type": "string"}, "cx": {"restParameterType": "query", "type": "string"}, "lr": {"restParameterType": "query", "enum": ["lang_ar", "lang_bg", "lang_ca", "lang_cs", "lang_da", "lang_de", "lang_el", "lang_en", "lang_es", "lang_et", "lang_fi", "lang_fr", "lang_hr", "lang_hu", "lang_id", "lang_is", "lang_it", "lang_iw", "lang_ja", "lang_ko", "lang_lt", "lang_lv", "lang_nl", "lang_no", "lang_pl", "lang_pt", "lang_ro", "lang_ru", "lang_sk", "lang_sl", "lang_sr", "lang_sv", "lang_tr", "lang_zh-CN", "lang_zh-TW"], "type": "string"}, "cref": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "search.cse.list", "httpMethod": "GET", "response": {"$ref": "Search"}, "restPath": "v1"}}}', true));
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

class Search {

  public $promotions;
  public $kind;
  public $url;
  public $items;
  public $context;
  public $queries;

  public function setPromotions( Promotion $promotions) {
    $this->promotions = $promotions;
  }

  public function getPromotions() {
    return $this->promotions;
  }
  
  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setUrl( SearchUrl $url) {
    $this->url = $url;
  }

  public function getUrl() {
    return $this->url;
  }
  
  public function setItems( Result $items) {
    $this->items = $items;
  }

  public function getItems() {
    return $this->items;
  }
  
  public function setContext( Context $context) {
    $this->context = $context;
  }

  public function getContext() {
    return $this->context;
  }
  
  public function setQueries( SearchQueries $queries) {
    $this->queries = $queries;
  }

  public function getQueries() {
    return $this->queries;
  }
  
}


class PromotionImage {

  public $source;
  public $width;
  public $height;

  public function setSource($source) {
    $this->source = $source;
  }

  public function getSource() {
    return $this->source;
  }
  
  public function setWidth($width) {
    $this->width = $width;
  }

  public function getWidth() {
    return $this->width;
  }
  
  public function setHeight($height) {
    $this->height = $height;
  }

  public function getHeight() {
    return $this->height;
  }
  
}


class ContextFacetsItems {

  public $anchor;
  public $label;

  public function setAnchor($anchor) {
    $this->anchor = $anchor;
  }

  public function getAnchor() {
    return $this->anchor;
  }
  
  public function setLabel($label) {
    $this->label = $label;
  }

  public function getLabel() {
    return $this->label;
  }
  
}


class SearchUrl {

  public $type;
  public $template;

  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }
  
  public function setTemplate($template) {
    $this->template = $template;
  }

  public function getTemplate() {
    return $this->template;
  }
  
}


class ResultPagemap {


}


class PromotionBodyLines {

  public $url;
  public $link;
  public $title;

  public function setUrl($url) {
    $this->url = $url;
  }

  public function getUrl() {
    return $this->url;
  }
  
  public function setLink($link) {
    $this->link = $link;
  }

  public function getLink() {
    return $this->link;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
}


class Result {

  public $kind;
  public $title;
  public $displayLink;
  public $cacheId;
  public $pagemap;
  public $snippet;
  public $htmlSnippet;
  public $link;
  public $htmlTitle;

  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
  public function setDisplayLink($displayLink) {
    $this->displayLink = $displayLink;
  }

  public function getDisplayLink() {
    return $this->displayLink;
  }
  
  public function setCacheId($cacheId) {
    $this->cacheId = $cacheId;
  }

  public function getCacheId() {
    return $this->cacheId;
  }
  
  public function setPagemap( ResultPagemap $pagemap) {
    $this->pagemap = $pagemap;
  }

  public function getPagemap() {
    return $this->pagemap;
  }
  
  public function setSnippet($snippet) {
    $this->snippet = $snippet;
  }

  public function getSnippet() {
    return $this->snippet;
  }
  
  public function setHtmlSnippet($htmlSnippet) {
    $this->htmlSnippet = $htmlSnippet;
  }

  public function getHtmlSnippet() {
    return $this->htmlSnippet;
  }
  
  public function setLink($link) {
    $this->link = $link;
  }

  public function getLink() {
    return $this->link;
  }
  
  public function setHtmlTitle($htmlTitle) {
    $this->htmlTitle = $htmlTitle;
  }

  public function getHtmlTitle() {
    return $this->htmlTitle;
  }
  
}


class Context {

  public $facets;
  public $title;

  public function setFacets( ContextFacetsItems $facets) {
    $this->facets = $facets;
  }

  public function getFacets() {
    return $this->facets;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
}


class SearchQueries {


}


class ContextFacets {

  public $items;

  public function setItems( $items) {
    $this->items = $items;
  }


}


class Query {

  public $count;
  public $sort;
  public $outputEncoding;
  public $language;
  public $title;
  public $safe;
  public $searchTerms;
  public $startIndex;
  public $cx;
  public $startPage;
  public $inputEncoding;
  public $totalResults;
  public $cref;

  public function setCount($count) {
    $this->count = $count;
  }

  public function getCount() {
    return $this->count;
  }
  
  public function setSort($sort) {
    $this->sort = $sort;
  }

  public function getSort() {
    return $this->sort;
  }
  
  public function setOutputEncoding($outputEncoding) {
    $this->outputEncoding = $outputEncoding;
  }

  public function getOutputEncoding() {
    return $this->outputEncoding;
  }
  
  public function setLanguage($language) {
    $this->language = $language;
  }

  public function getLanguage() {
    return $this->language;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
  public function setSafe($safe) {
    $this->safe = $safe;
  }

  public function getSafe() {
    return $this->safe;
  }
  
  public function setSearchTerms($searchTerms) {
    $this->searchTerms = $searchTerms;
  }

  public function getSearchTerms() {
    return $this->searchTerms;
  }
  
  public function setStartIndex($startIndex) {
    $this->startIndex = $startIndex;
  }

  public function getStartIndex() {
    return $this->startIndex;
  }
  
  public function setCx($cx) {
    $this->cx = $cx;
  }

  public function getCx() {
    return $this->cx;
  }
  
  public function setStartPage($startPage) {
    $this->startPage = $startPage;
  }

  public function getStartPage() {
    return $this->startPage;
  }
  
  public function setInputEncoding($inputEncoding) {
    $this->inputEncoding = $inputEncoding;
  }

  public function getInputEncoding() {
    return $this->inputEncoding;
  }
  
  public function setTotalResults($totalResults) {
    $this->totalResults = $totalResults;
  }

  public function getTotalResults() {
    return $this->totalResults;
  }
  
  public function setCref($cref) {
    $this->cref = $cref;
  }

  public function getCref() {
    return $this->cref;
  }
  
}


class Promotion {

  public $link;
  public $displayLink;
  public $image;
  public $bodyLines;
  public $title;

  public function setLink($link) {
    $this->link = $link;
  }

  public function getLink() {
    return $this->link;
  }
  
  public function setDisplayLink($displayLink) {
    $this->displayLink = $displayLink;
  }

  public function getDisplayLink() {
    return $this->displayLink;
  }
  
  public function setImage( PromotionImage $image) {
    $this->image = $image;
  }

  public function getImage() {
    return $this->image;
  }
  
  public function setBodyLines( PromotionBodyLines $bodyLines) {
    $this->bodyLines = $bodyLines;
  }

  public function getBodyLines() {
    return $this->bodyLines;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
}


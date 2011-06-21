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
   * The "products" collection of methods.
   * Typical usage is:
   *  <code>
   *   $shoppingService = new apiShoppingService(...);
   *   $products = $shoppingService->products;
   *  </code>
   */
  class ProductsServiceResource extends apiServiceResource {


    /**
     * Returns a list of products and content modules (products.list)
     *
     * @param  $sayt_useGcsConfig Google Internal
     * @param  $rankBy Ranking specification
     * @param  $debug_enableLogging Google Internal
     * @param  $facets_enabled Whether to return facet information
     * @param  $relatedQueries_useGcsConfig This parameter is currently ignored
     * @param  $promotions_enabled Whether to return promotion information
     * @param  $debug_enabled Google Internal
     * @param  $facets_include Facets to include (applies when useGcsConfig == false)
     * @param  $productFields Google Internal
     * @param  $channels Channels specification
     * @param  $currency Currency restriction (ISO 4217)
     * @param  $startIndex Index (1-based) of first product to return
     * @param  $facets_discover Facets to discover
     * @param  $debug_searchResponse Google Internal
     * @param  $crowdBy Crowding specification
     * @param  $spelling_enabled Whether to return spelling suggestions
     * @param  $debug_geocodeRequest Google Internal
     * @param  $spelling_useGcsConfig This parameter is currently ignored
     * @param  $shelfSpaceAds_useGcsConfig This parameter is currently ignored
     * @param  $shelfSpaceAds_enabled Whether to return shelf space ads
     * @param  $useCase One of CommerceSearchUseCase, ShoppingApiUseCase
     * @param  $taxonomy Taxonomy name
     * @param  $debug_rdcRequest Google Internal
     * @param  $categories_include Category specification
     * @param  $boostBy Boosting specification
     * @param  $redirects_useGcsConfig Whether to return redirect information as configured in the GCS account
     * @param  $safe Whether safe search is enabled. Default: true
     * @param  $categories_useGcsConfig This parameter is currently ignored
     * @param  $maxResults Maximum number of results to return
     * @param  $facets_useGcsConfig Whether to return facet information as configured in the GCS account
     * @param  $categories_enabled Whether to return category information
     * @param  $attributeFilter Comma separated list of attributes to return
     * @param  $sayt_enabled Google Internal
     * @param  $thumbnails Image thumbnails specification
     * @param  $language Language restriction (BCP 47)
     * @param  $country Country restriction (ISO 3166)
     * @param  $debug_geocodeResponse Google Internal
     * @param  $restrictBy Restriction specification
     * @param  $debug_rdcResponse Google Internal
     * @param  $q Search query
     * @param  $shelfSpaceAds_maxResults The maximum number of shelf space ads to return
     * @param  $redirects_enabled Whether to return redirect information
     * @param  $debug_searchRequest Google Internal
     * @param  $relatedQueries_enabled Whether to return related queries
     * @param  $minAvailability
     * @param  $promotions_useGcsConfig Whether to return promotion information as configured in the GCS account
     * @param  $source Query source
     */
    public function listProducts($source, $attributeFilter = null, $boostBy = null, $categories_enabled = null, $categories_include = null, $categories_useGcsConfig = null, $channels = null, $country = null, $crowdBy = null, $currency = null, $debug_enableLogging = null, $debug_enabled = null, $debug_geocodeRequest = null, $debug_geocodeResponse = null, $debug_rdcRequest = null, $debug_rdcResponse = null, $debug_searchRequest = null, $debug_searchResponse = null, $facets_discover = null, $facets_enabled = null, $facets_include = null, $facets_useGcsConfig = null, $language = null, $maxResults = null, $minAvailability = null, $productFields = null, $promotions_enabled = null, $promotions_useGcsConfig = null, $q = null, $rankBy = null, $redirects_enabled = null, $redirects_useGcsConfig = null, $relatedQueries_enabled = null, $relatedQueries_useGcsConfig = null, $restrictBy = null, $safe = null, $sayt_enabled = null, $sayt_useGcsConfig = null, $shelfSpaceAds_enabled = null, $shelfSpaceAds_maxResults = null, $shelfSpaceAds_useGcsConfig = null, $spelling_enabled = null, $spelling_useGcsConfig = null, $startIndex = null, $taxonomy = null, $thumbnails = null, $useCase = null) {
      return $this->__call('list', array(array('sayt.useGcsConfig' => $sayt_useGcsConfig, 'rankBy' => $rankBy, 'debug.enableLogging' => $debug_enableLogging, 'facets.enabled' => $facets_enabled, 'relatedQueries.useGcsConfig' => $relatedQueries_useGcsConfig, 'promotions.enabled' => $promotions_enabled, 'debug.enabled' => $debug_enabled, 'facets.include' => $facets_include, 'productFields' => $productFields, 'channels' => $channels, 'currency' => $currency, 'startIndex' => $startIndex, 'facets.discover' => $facets_discover, 'debug.searchResponse' => $debug_searchResponse, 'crowdBy' => $crowdBy, 'spelling.enabled' => $spelling_enabled, 'debug.geocodeRequest' => $debug_geocodeRequest, 'spelling.useGcsConfig' => $spelling_useGcsConfig, 'shelfSpaceAds.useGcsConfig' => $shelfSpaceAds_useGcsConfig, 'shelfSpaceAds.enabled' => $shelfSpaceAds_enabled, 'useCase' => $useCase, 'taxonomy' => $taxonomy, 'debug.rdcRequest' => $debug_rdcRequest, 'categories.include' => $categories_include, 'boostBy' => $boostBy, 'redirects.useGcsConfig' => $redirects_useGcsConfig, 'safe' => $safe, 'categories.useGcsConfig' => $categories_useGcsConfig, 'maxResults' => $maxResults, 'facets.useGcsConfig' => $facets_useGcsConfig, 'categories.enabled' => $categories_enabled, 'attributeFilter' => $attributeFilter, 'sayt.enabled' => $sayt_enabled, 'thumbnails' => $thumbnails, 'language' => $language, 'country' => $country, 'debug.geocodeResponse' => $debug_geocodeResponse, 'restrictBy' => $restrictBy, 'debug.rdcResponse' => $debug_rdcResponse, 'q' => $q, 'shelfSpaceAds.maxResults' => $shelfSpaceAds_maxResults, 'redirects.enabled' => $redirects_enabled, 'debug.searchRequest' => $debug_searchRequest, 'relatedQueries.enabled' => $relatedQueries_enabled, 'minAvailability' => $minAvailability, 'promotions.useGcsConfig' => $promotions_useGcsConfig, 'source' => $source)));
    }
    /**
     * Returns a single product (products.get)
     *
     * @param  $categories_include Category specification
     * @param  $recommendations_enabled Whether to return recommendation information
     * @param  $debug_enableLogging Google Internal
     * @param  $taxonomy Merchant taxonomy
     * @param  $categories_useGcsConfig This parameter is currently ignored
     * @param  $debug_searchResponse Google Internal
     * @param  $debug_enabled Google Internal
     * @param  $recommendations_include Recommendation specification
     * @param  $categories_enabled Whether to return category information
     * @param  $debug_searchRequest Google Internal
     * @param  $attributeFilter Comma separated list of attributes to return
     * @param  $recommendations_useGcsConfig This parameter is currently ignored
     * @param  $productFields Google Internal
     * @param  $thumbnails Thumbnail specification
     * @param  $source Query source
     * @param  $accountId Merchant center account id
     * @param  $productIdType Type of productId
     * @param  $productId Id of product
     */
    public function get($accountId, $productId, $productIdType, $source, $attributeFilter = null, $categories_enabled = null, $categories_include = null, $categories_useGcsConfig = null, $debug_enableLogging = null, $debug_enabled = null, $debug_searchRequest = null, $debug_searchResponse = null, $productFields = null, $recommendations_enabled = null, $recommendations_include = null, $recommendations_useGcsConfig = null, $taxonomy = null, $thumbnails = null) {
      return $this->__call('get', array(array('categories.include' => $categories_include, 'recommendations.enabled' => $recommendations_enabled, 'debug.enableLogging' => $debug_enableLogging, 'taxonomy' => $taxonomy, 'categories.useGcsConfig' => $categories_useGcsConfig, 'debug.searchResponse' => $debug_searchResponse, 'debug.enabled' => $debug_enabled, 'recommendations.include' => $recommendations_include, 'categories.enabled' => $categories_enabled, 'debug.searchRequest' => $debug_searchRequest, 'attributeFilter' => $attributeFilter, 'recommendations.useGcsConfig' => $recommendations_useGcsConfig, 'productFields' => $productFields, 'thumbnails' => $thumbnails, 'source' => $source, 'accountId' => $accountId, 'productIdType' => $productIdType, 'productId' => $productId)));
    }
  }



/**
 * Service definition for Shopping (v1).
 *
 * <p>
 * Lets you search over product data
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class apiShoppingService {

  // Variables that the apiServiceResource implementation depends on.
  private $serviceName = 'shopping';
  private $version = 'v1';
  private $restBasePath = '/shopping/search/v1/';
  private $rpcPath = '/rpc';
  private $io;
  // apiServiceResource's that are used internally
  public $products;
  /**
   * Constructs the internal representation of the Shopping service.
   *
   * @param apiClient apiClient
   */
  public function __construct(apiClient $apiClient) {
     $apiClient->addService($this->serviceName, $this->version);
     $this->io = $apiClient->getIo();
     $this->products = new ProductsServiceResource($this, $this->serviceName, 'products', json_decode('{"methods": {"list": {"parameters": {"sayt.useGcsConfig": {"restParameterType": "query", "type": "boolean"}, "debug.geocodeResponse": {"restParameterType": "query", "type": "boolean"}, "debug.enableLogging": {"restParameterType": "query", "type": "boolean"}, "facets.enabled": {"restParameterType": "query", "type": "boolean"}, "relatedQueries.useGcsConfig": {"restParameterType": "query", "type": "boolean"}, "promotions.enabled": {"restParameterType": "query", "type": "boolean"}, "debug.enabled": {"restParameterType": "query", "type": "boolean"}, "facets.include": {"restParameterType": "query", "type": "string"}, "productFields": {"restParameterType": "query", "type": "string"}, "channels": {"restParameterType": "query", "type": "string"}, "currency": {"restParameterType": "query", "type": "string"}, "startIndex": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}, "facets.discover": {"restParameterType": "query", "type": "string"}, "debug.searchResponse": {"restParameterType": "query", "type": "boolean"}, "crowdBy": {"restParameterType": "query", "type": "string"}, "spelling.enabled": {"restParameterType": "query", "type": "boolean"}, "debug.geocodeRequest": {"restParameterType": "query", "type": "boolean"}, "source": {"restParameterType": "path", "required": true, "type": "string"}, "shelfSpaceAds.useGcsConfig": {"restParameterType": "query", "type": "boolean"}, "shelfSpaceAds.enabled": {"restParameterType": "query", "type": "boolean"}, "spelling.useGcsConfig": {"restParameterType": "query", "type": "boolean"}, "useCase": {"restParameterType": "query", "type": "string"}, "taxonomy": {"restParameterType": "query", "type": "string"}, "debug.rdcRequest": {"restParameterType": "query", "type": "boolean"}, "categories.include": {"restParameterType": "query", "type": "string"}, "debug.searchRequest": {"restParameterType": "query", "type": "boolean"}, "boostBy": {"restParameterType": "query", "type": "string"}, "safe": {"restParameterType": "query", "type": "boolean"}, "categories.useGcsConfig": {"restParameterType": "query", "type": "boolean"}, "maxResults": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}, "facets.useGcsConfig": {"restParameterType": "query", "type": "boolean"}, "categories.enabled": {"restParameterType": "query", "type": "boolean"}, "attributeFilter": {"restParameterType": "query", "type": "string"}, "sayt.enabled": {"restParameterType": "query", "type": "boolean"}, "thumbnails": {"restParameterType": "query", "type": "string"}, "language": {"restParameterType": "query", "type": "string"}, "redirects.useGcsConfig": {"restParameterType": "query", "type": "boolean"}, "rankBy": {"restParameterType": "query", "type": "string"}, "restrictBy": {"restParameterType": "query", "type": "string"}, "debug.rdcResponse": {"restParameterType": "query", "type": "boolean"}, "q": {"restParameterType": "query", "type": "string"}, "shelfSpaceAds.maxResults": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}, "redirects.enabled": {"restParameterType": "query", "type": "boolean"}, "country": {"restParameterType": "query", "type": "string"}, "relatedQueries.enabled": {"restParameterType": "query", "type": "boolean"}, "minAvailability": {"restParameterType": "query", "enum": ["inStock", "limited", "outOfStock", "unknown"], "type": "string"}, "promotions.useGcsConfig": {"restParameterType": "query", "type": "boolean"}}, "rpcMethod": "shopping.products.list", "httpMethod": "GET", "response": {"$ref": "Products"}, "restPath": "{source}/products"}, "get": {"parameters": {"categories.include": {"restParameterType": "query", "type": "string"}, "recommendations.enabled": {"restParameterType": "query", "type": "boolean"}, "debug.enableLogging": {"restParameterType": "query", "type": "boolean"}, "thumbnails": {"restParameterType": "query", "type": "string"}, "recommendations.include": {"restParameterType": "query", "type": "string"}, "taxonomy": {"restParameterType": "query", "type": "string"}, "productIdType": {"restParameterType": "path", "required": true, "type": "string"}, "categories.useGcsConfig": {"restParameterType": "query", "type": "boolean"}, "attributeFilter": {"restParameterType": "query", "type": "string"}, "debug.enabled": {"restParameterType": "query", "type": "boolean"}, "source": {"restParameterType": "path", "required": true, "type": "string"}, "categories.enabled": {"restParameterType": "query", "type": "boolean"}, "debug.searchRequest": {"restParameterType": "query", "type": "boolean"}, "debug.searchResponse": {"restParameterType": "query", "type": "boolean"}, "recommendations.useGcsConfig": {"restParameterType": "query", "type": "boolean"}, "productFields": {"restParameterType": "query", "type": "string"}, "accountId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "productId": {"restParameterType": "path", "required": true, "type": "string"}}, "rpcMethod": "shopping.products.get", "httpMethod": "GET", "response": {"$ref": "Product"}, "restPath": "{source}/products/{accountId}/{productIdType}/{productId}"}}}', true));
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

class ShoppingModelProductJsonV1Inventories {

  public $distance;
  public $price;
  public $storeId;
  public $currency;
  public $distanceUnit;
  public $availability;
  public $channel;

  public function setDistance($distance) {
    $this->distance = $distance;
  }

  public function getDistance() {
    return $this->distance;
  }
  
  public function setPrice($price) {
    $this->price = $price;
  }

  public function getPrice() {
    return $this->price;
  }
  
  public function setStoreId($storeId) {
    $this->storeId = $storeId;
  }

  public function getStoreId() {
    return $this->storeId;
  }
  
  public function setCurrency($currency) {
    $this->currency = $currency;
  }

  public function getCurrency() {
    return $this->currency;
  }
  
  public function setDistanceUnit($distanceUnit) {
    $this->distanceUnit = $distanceUnit;
  }

  public function getDistanceUnit() {
    return $this->distanceUnit;
  }
  
  public function setAvailability($availability) {
    $this->availability = $availability;
  }

  public function getAvailability() {
    return $this->availability;
  }
  
  public function setChannel($channel) {
    $this->channel = $channel;
  }

  public function getChannel() {
    return $this->channel;
  }
  
}


class ProductsStores {

  public $storeCode;
  public $name;
  public $storeId;
  public $telephone;
  public $location;
  public $address;

  public function setStoreCode($storeCode) {
    $this->storeCode = $storeCode;
  }

  public function getStoreCode() {
    return $this->storeCode;
  }
  
  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }
  
  public function setStoreId($storeId) {
    $this->storeId = $storeId;
  }

  public function getStoreId() {
    return $this->storeId;
  }
  
  public function setTelephone($telephone) {
    $this->telephone = $telephone;
  }

  public function getTelephone() {
    return $this->telephone;
  }
  
  public function setLocation($location) {
    $this->location = $location;
  }

  public function getLocation() {
    return $this->location;
  }
  
  public function setAddress($address) {
    $this->address = $address;
  }

  public function getAddress() {
    return $this->address;
  }
  
}


class ShoppingModelCategoryJsonV1 {

  public $url;
  public $shortName;
  public $parents;
  public $id;

  public function setUrl($url) {
    $this->url = $url;
  }

  public function getUrl() {
    return $this->url;
  }
  
  public function setShortName($shortName) {
    $this->shortName = $shortName;
  }

  public function getShortName() {
    return $this->shortName;
  }
  
  public function setParents($parents) {
    $this->parents = $parents;
  }

  public function getParents() {
    return $this->parents;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
}


class ShoppingModelProductJsonV1Images {

  public $link;
  public $thumbnails;

  public function setLink($link) {
    $this->link = $link;
  }

  public function getLink() {
    return $this->link;
  }
  
  public function setThumbnails( ShoppingModelProductJsonV1ImagesThumbnails $thumbnails) {
    $this->thumbnails = $thumbnails;
  }

  public function getThumbnails() {
    return $this->thumbnails;
  }
  
}


class ShoppingModelDebugJsonV1 {

  public $searchRequest;
  public $searchResponse;
  public $rdcResponse;

  public function setSearchRequest($searchRequest) {
    $this->searchRequest = $searchRequest;
  }

  public function getSearchRequest() {
    return $this->searchRequest;
  }
  
  public function setSearchResponse($searchResponse) {
    $this->searchResponse = $searchResponse;
  }

  public function getSearchResponse() {
    return $this->searchResponse;
  }
  
  public function setRdcResponse($rdcResponse) {
    $this->rdcResponse = $rdcResponse;
  }

  public function getRdcResponse() {
    return $this->rdcResponse;
  }
  
}


class ProductsFacetsBuckets {

  public $count;
  public $minExclusive;
  public $min;
  public $max;
  public $value;
  public $maxExclusive;

  public function setCount($count) {
    $this->count = $count;
  }

  public function getCount() {
    return $this->count;
  }
  
  public function setMinExclusive($minExclusive) {
    $this->minExclusive = $minExclusive;
  }

  public function getMinExclusive() {
    return $this->minExclusive;
  }
  
  public function setMin($min) {
    $this->min = $min;
  }

  public function getMin() {
    return $this->min;
  }
  
  public function setMax($max) {
    $this->max = $max;
  }

  public function getMax() {
    return $this->max;
  }
  
  public function setValue($value) {
    $this->value = $value;
  }

  public function getValue() {
    return $this->value;
  }
  
  public function setMaxExclusive($maxExclusive) {
    $this->maxExclusive = $maxExclusive;
  }

  public function getMaxExclusive() {
    return $this->maxExclusive;
  }
  
}


class Product {

  public $kind;
  public $product;
  public $selfLink;
  public $recommendations;
  public $debug;
  public $id;
  public $categories;

  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setProduct( ShoppingModelProductJsonV1 $product) {
    $this->product = $product;
  }

  public function getProduct() {
    return $this->product;
  }
  
  public function setSelfLink($selfLink) {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink() {
    return $this->selfLink;
  }
  
  public function setRecommendations( ProductRecommendations $recommendations) {
    $this->recommendations = $recommendations;
  }

  public function getRecommendations() {
    return $this->recommendations;
  }
  
  public function setDebug( ShoppingModelDebugJsonV1 $debug) {
    $this->debug = $debug;
  }

  public function getDebug() {
    return $this->debug;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setCategories( ShoppingModelCategoryJsonV1 $categories) {
    $this->categories = $categories;
  }

  public function getCategories() {
    return $this->categories;
  }
  
}


class ProductsFacets {

  public $count;
  public $displayName;
  public $name;
  public $buckets;
  public $property;
  public $type;
  public $unit;

  public function setCount($count) {
    $this->count = $count;
  }

  public function getCount() {
    return $this->count;
  }
  
  public function setDisplayName($displayName) {
    $this->displayName = $displayName;
  }

  public function getDisplayName() {
    return $this->displayName;
  }
  
  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }
  
  public function setBuckets( ProductsFacetsBuckets $buckets) {
    $this->buckets = $buckets;
  }

  public function getBuckets() {
    return $this->buckets;
  }
  
  public function setProperty($property) {
    $this->property = $property;
  }

  public function getProperty() {
    return $this->property;
  }
  
  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }
  
  public function setUnit($unit) {
    $this->unit = $unit;
  }

  public function getUnit() {
    return $this->unit;
  }
  
}


class ProductsShelfSpaceAds {

  public $product;

  public function setProduct( ShoppingModelProductJsonV1 $product) {
    $this->product = $product;
  }

  public function getProduct() {
    return $this->product;
  }
  
}


class ProductRecommendations {

  public $recommendationList;
  public $type;

  public function setRecommendationList( ProductRecommendationsRecommendationList $recommendationList) {
    $this->recommendationList = $recommendationList;
  }

  public function getRecommendationList() {
    return $this->recommendationList;
  }
  
  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }
  
}


class ProductsSpelling {

  public $suggestion;

  public function setSuggestion($suggestion) {
    $this->suggestion = $suggestion;
  }

  public function getSuggestion() {
    return $this->suggestion;
  }
  
}


class ProductRecommendationsRecommendationList {

  public $product;

  public function setProduct( ShoppingModelProductJsonV1 $product) {
    $this->product = $product;
  }

  public function getProduct() {
    return $this->product;
  }
  
}


class Products {

  public $promotions;
  public $kind;
  public $stores;
  public $currentItemCount;
  public $items;
  public $facets;
  public $itemsPerPage;
  public $redirects;
  public $nextLink;
  public $shelfSpaceAds;
  public $startIndex;
  public $etag;
  public $selfLink;
  public $relatedQueries;
  public $debug;
  public $spelling;
  public $previousLink;
  public $totalItems;
  public $id;
  public $categories;

  public function setPromotions( ProductsPromotions $promotions) {
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
  
  public function setStores( ProductsStores $stores) {
    $this->stores = $stores;
  }

  public function getStores() {
    return $this->stores;
  }
  
  public function setCurrentItemCount($currentItemCount) {
    $this->currentItemCount = $currentItemCount;
  }

  public function getCurrentItemCount() {
    return $this->currentItemCount;
  }
  
  public function setItems( Product $items) {
    $this->items = $items;
  }

  public function getItems() {
    return $this->items;
  }
  
  public function setFacets( ProductsFacets $facets) {
    $this->facets = $facets;
  }

  public function getFacets() {
    return $this->facets;
  }
  
  public function setItemsPerPage($itemsPerPage) {
    $this->itemsPerPage = $itemsPerPage;
  }

  public function getItemsPerPage() {
    return $this->itemsPerPage;
  }
  
  public function setRedirects($redirects) {
    $this->redirects = $redirects;
  }

  public function getRedirects() {
    return $this->redirects;
  }
  
  public function setNextLink($nextLink) {
    $this->nextLink = $nextLink;
  }

  public function getNextLink() {
    return $this->nextLink;
  }
  
  public function setShelfSpaceAds( ProductsShelfSpaceAds $shelfSpaceAds) {
    $this->shelfSpaceAds = $shelfSpaceAds;
  }

  public function getShelfSpaceAds() {
    return $this->shelfSpaceAds;
  }
  
  public function setStartIndex($startIndex) {
    $this->startIndex = $startIndex;
  }

  public function getStartIndex() {
    return $this->startIndex;
  }
  
  public function setEtag($etag) {
    $this->etag = $etag;
  }

  public function getEtag() {
    return $this->etag;
  }
  
  public function setSelfLink($selfLink) {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink() {
    return $this->selfLink;
  }
  
  public function setRelatedQueries($relatedQueries) {
    $this->relatedQueries = $relatedQueries;
  }

  public function getRelatedQueries() {
    return $this->relatedQueries;
  }
  
  public function setDebug( ShoppingModelDebugJsonV1 $debug) {
    $this->debug = $debug;
  }

  public function getDebug() {
    return $this->debug;
  }
  
  public function setSpelling( ProductsSpelling $spelling) {
    $this->spelling = $spelling;
  }

  public function getSpelling() {
    return $this->spelling;
  }
  
  public function setPreviousLink($previousLink) {
    $this->previousLink = $previousLink;
  }

  public function getPreviousLink() {
    return $this->previousLink;
  }
  
  public function setTotalItems($totalItems) {
    $this->totalItems = $totalItems;
  }

  public function getTotalItems() {
    return $this->totalItems;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setCategories( ShoppingModelCategoryJsonV1 $categories) {
    $this->categories = $categories;
  }

  public function getCategories() {
    return $this->categories;
  }
  
}


class ShoppingModelProductJsonV1 {

  public $description;
  public $language;
  public $author;
  public $googleId;
  public $country;
  public $brand;
  public $title;
  public $creationTime;
  public $modificationTime;
  public $providedId;
  public $gtin;
  public $categories;
  public $images;
  public $attributes;
  public $inventories;
  public $link;
  public $condition;

  public function setDescription($description) {
    $this->description = $description;
  }

  public function getDescription() {
    return $this->description;
  }
  
  public function setLanguage($language) {
    $this->language = $language;
  }

  public function getLanguage() {
    return $this->language;
  }
  
  public function setAuthor( ShoppingModelProductJsonV1Author $author) {
    $this->author = $author;
  }

  public function getAuthor() {
    return $this->author;
  }
  
  public function setGoogleId($googleId) {
    $this->googleId = $googleId;
  }

  public function getGoogleId() {
    return $this->googleId;
  }
  
  public function setCountry($country) {
    $this->country = $country;
  }

  public function getCountry() {
    return $this->country;
  }
  
  public function setBrand($brand) {
    $this->brand = $brand;
  }

  public function getBrand() {
    return $this->brand;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
  public function setCreationTime($creationTime) {
    $this->creationTime = $creationTime;
  }

  public function getCreationTime() {
    return $this->creationTime;
  }
  
  public function setModificationTime($modificationTime) {
    $this->modificationTime = $modificationTime;
  }

  public function getModificationTime() {
    return $this->modificationTime;
  }
  
  public function setProvidedId($providedId) {
    $this->providedId = $providedId;
  }

  public function getProvidedId() {
    return $this->providedId;
  }
  
  public function setGtin($gtin) {
    $this->gtin = $gtin;
  }

  public function getGtin() {
    return $this->gtin;
  }
  
  public function setCategories($categories) {
    $this->categories = $categories;
  }

  public function getCategories() {
    return $this->categories;
  }
  
  public function setImages( ShoppingModelProductJsonV1Images $images) {
    $this->images = $images;
  }

  public function getImages() {
    return $this->images;
  }
  
  public function setAttributes( ShoppingModelProductJsonV1Attributes $attributes) {
    $this->attributes = $attributes;
  }

  public function getAttributes() {
    return $this->attributes;
  }
  
  public function setInventories( ShoppingModelProductJsonV1Inventories $inventories) {
    $this->inventories = $inventories;
  }

  public function getInventories() {
    return $this->inventories;
  }
  
  public function setLink($link) {
    $this->link = $link;
  }

  public function getLink() {
    return $this->link;
  }
  
  public function setCondition($condition) {
    $this->condition = $condition;
  }

  public function getCondition() {
    return $this->condition;
  }
  
}


class ProductsPromotions {

  public $product;
  public $description;
  public $imageLink;
  public $destLink;
  public $customHtml;
  public $link;
  public $customFields;
  public $type;
  public $name;

  public function setProduct( ShoppingModelProductJsonV1 $product) {
    $this->product = $product;
  }

  public function getProduct() {
    return $this->product;
  }
  
  public function setDescription($description) {
    $this->description = $description;
  }

  public function getDescription() {
    return $this->description;
  }
  
  public function setImageLink($imageLink) {
    $this->imageLink = $imageLink;
  }

  public function getImageLink() {
    return $this->imageLink;
  }
  
  public function setDestLink($destLink) {
    $this->destLink = $destLink;
  }

  public function getDestLink() {
    return $this->destLink;
  }
  
  public function setCustomHtml($customHtml) {
    $this->customHtml = $customHtml;
  }

  public function getCustomHtml() {
    return $this->customHtml;
  }
  
  public function setLink($link) {
    $this->link = $link;
  }

  public function getLink() {
    return $this->link;
  }
  
  public function setCustomFields( ProductsPromotionsCustomFields $customFields) {
    $this->customFields = $customFields;
  }

  public function getCustomFields() {
    return $this->customFields;
  }
  
  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }
  
  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }
  
}


class ShoppingModelProductJsonV1ImagesThumbnails {

  public $content;
  public $width;
  public $link;
  public $height;

  public function setContent($content) {
    $this->content = $content;
  }

  public function getContent() {
    return $this->content;
  }
  
  public function setWidth($width) {
    $this->width = $width;
  }

  public function getWidth() {
    return $this->width;
  }
  
  public function setLink($link) {
    $this->link = $link;
  }

  public function getLink() {
    return $this->link;
  }
  
  public function setHeight($height) {
    $this->height = $height;
  }

  public function getHeight() {
    return $this->height;
  }
  
}


class ProductsPromotionsCustomFields {

  public $name;
  public $value;

  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }
  
  public function setValue($value) {
    $this->value = $value;
  }

  public function getValue() {
    return $this->value;
  }
  
}


class ShoppingModelProductJsonV1Author {

  public $aggregatorId;
  public $uri;
  public $email;
  public $name;
  public $accountId;

  public function setAggregatorId($aggregatorId) {
    $this->aggregatorId = $aggregatorId;
  }

  public function getAggregatorId() {
    return $this->aggregatorId;
  }
  
  public function setUri($uri) {
    $this->uri = $uri;
  }

  public function getUri() {
    return $this->uri;
  }
  
  public function setEmail($email) {
    $this->email = $email;
  }

  public function getEmail() {
    return $this->email;
  }
  
  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }
  
  public function setAccountId($accountId) {
    $this->accountId = $accountId;
  }

  public function getAccountId() {
    return $this->accountId;
  }
  
}


class ShoppingModelProductJsonV1Attributes {

  public $type;
  public $value;
  public $displayName;
  public $name;
  public $unit;

  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }
  
  public function setValue($value) {
    $this->value = $value;
  }

  public function getValue() {
    return $this->value;
  }
  
  public function setDisplayName($displayName) {
    $this->displayName = $displayName;
  }

  public function getDisplayName() {
    return $this->displayName;
  }
  
  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }
  
  public function setUnit($unit) {
    $this->unit = $unit;
  }

  public function getUnit() {
    return $this->unit;
  }
  
}


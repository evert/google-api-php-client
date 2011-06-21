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
   * The "bookshelves" collection of methods.
   * Typical usage is:
   *  <code>
   *   $booksService = new apiBooksService(...);
   *   $bookshelves = $booksService->bookshelves;
   *  </code>
   */
  class BookshelvesServiceResource extends apiServiceResource {


    /**
     * Retrieves a list of public bookshelves for the specified user. (bookshelves.list)
     *
     * @param  $source String to identify the originator of this request.
     * @param  $userId Id of user for whom to retrieve bookshelves.
     */
    public function listBookshelves($userId, $source = null) {
      return $this->__call('list', array(array('source' => $source, 'userId' => $userId)));
    }
    /**
     * Retrieves a specific bookshelf for the specified user. (bookshelves.get)
     *
     * @param  $source String to identify the originator of this request.
     * @param  $userId Id of user for whom to retrieve bookshelves.
     * @param  $shelf Id of bookshelf to retrieve.
     */
    public function get($shelf, $userId, $source = null) {
      return $this->__call('get', array(array('source' => $source, 'userId' => $userId, 'shelf' => $shelf)));
    }
  }


  /**
   * The "volumes" collection of methods.
   * Typical usage is:
   *  <code>
   *   $booksService = new apiBooksService(...);
   *   $volumes = $booksService->volumes;
   *  </code>
   */
  class BookshelvesVolumesServiceResource extends apiServiceResource {


    /**
     * Retrieves volumes in a specific bookshelf for the specified user. (volumes.list)
     *
     * @param  $source String to identify the originator of this request.
     * @param  $userId Id of user for whom to retrieve bookshelf volumes.
     * @param  $shelf Id of bookshelf to retrieve volumes.
     */
    public function listBookshelvesVolumes($shelf, $userId, $source = null) {
      return $this->__call('list', array(array('source' => $source, 'userId' => $userId, 'shelf' => $shelf)));
    }
  }

  /**
   * The "volumes" collection of methods.
   * Typical usage is:
   *  <code>
   *   $booksService = new apiBooksService(...);
   *   $volumes = $booksService->volumes;
   *  </code>
   */
  class VolumesServiceResource extends apiServiceResource {


    /**
     * Performs a book search. (volumes.list)
     *
     * @param  $orderBy Sort search results.
     * @param  $q Full-text search query string.
     * @param  $projection Restrict information returned to a set of selected fields.
     * @param  $langRestrict Restrict results to books with this language code.
     * @param  $printType Restrict to books or magazines.
     * @param  $maxResults Maximum number of results to return.
     * @param  $filter Filter search results.
     * @param  $source String to identify the originator of this request.
     * @param  $startIndex Index of the first result to return (starts at 0)
     * @param  $download Restrict to volumes by download availability.
     */
    public function listVolumes($q, $download = null, $filter = null, $langRestrict = null, $maxResults = null, $orderBy = null, $printType = null, $projection = null, $source = null, $startIndex = null) {
      return $this->__call('list', array(array('orderBy' => $orderBy, 'q' => $q, 'projection' => $projection, 'langRestrict' => $langRestrict, 'printType' => $printType, 'maxResults' => $maxResults, 'filter' => $filter, 'source' => $source, 'startIndex' => $startIndex, 'download' => $download)));
    }
    /**
     * Gets volume information for a single volume. (volumes.get)
     *
     * @param  $source String to identify the originator of this request.
     * @param  $projection Restrict information returned to a set of selected fields.
     * @param  $volumeId Id of volume to retrieve.
     */
    public function get($volumeId, $projection = null, $source = null) {
      return $this->__call('get', array(array('source' => $source, 'projection' => $projection, 'volumeId' => $volumeId)));
    }
  }

  /**
   * The "mylibrary" collection of methods.
   * Typical usage is:
   *  <code>
   *   $booksService = new apiBooksService(...);
   *   $mylibrary = $booksService->mylibrary;
   *  </code>
   */
  class MylibraryServiceResource extends apiServiceResource {


  }


  /**
   * The "bookshelves" collection of methods.
   * Typical usage is:
   *  <code>
   *   $booksService = new apiBooksService(...);
   *   $bookshelves = $booksService->bookshelves;
   *  </code>
   */
  class MylibraryBookshelvesServiceResource extends apiServiceResource {


    /**
     * Clears all volumes from a bookshelf. (bookshelves.clearVolumes)
     *
     * @param  $source String to identify the originator of this request.
     * @param  $shelf Id of bookshelf from which to remove a volume.
     */
    public function clearVolumes($shelf, $source = null) {
      return $this->__call('clearVolumes', array(array('source' => $source, 'shelf' => $shelf)));
    }
    /**
     * Removes a volume from a bookshelf. (bookshelves.removeVolume)
     *
     * @param  $volumeId Id of volume to remove.
     * @param  $source String to identify the originator of this request.
     * @param  $shelf Id of bookshelf from which to remove a volume.
     */
    public function removeVolume($shelf, $volumeId, $source = null) {
      return $this->__call('removeVolume', array(array('volumeId' => $volumeId, 'source' => $source, 'shelf' => $shelf)));
    }
    /**
     * Retrieves a list of bookshelves belonging to the authenticated user. (bookshelves.list)
     *
     * @param  $source String to identify the originator of this request.
     */
    public function listMylibraryBookshelves($source = null) {
      return $this->__call('list', array(array('source' => $source)));
    }
    /**
     * Adds a volume to a bookshelf. (bookshelves.addVolume)
     *
     * @param  $volumeId Id of volume to add.
     * @param  $source String to identify the originator of this request.
     * @param  $shelf Id of bookshelf to which to add a volume.
     */
    public function addVolume($shelf, $volumeId, $source = null) {
      return $this->__call('addVolume', array(array('volumeId' => $volumeId, 'source' => $source, 'shelf' => $shelf)));
    }
    /**
     * Retrieves a specific bookshelf belonging to the authenticated user. (bookshelves.get)
     *
     * @param  $source String to identify the originator of this request.
     * @param  $shelf Id of bookshelf to retrieve.
     */
    public function get($shelf, $source = null) {
      return $this->__call('get', array(array('source' => $source, 'shelf' => $shelf)));
    }
  }


  /**
   * The "volumes" collection of methods.
   * Typical usage is:
   *  <code>
   *   $booksService = new apiBooksService(...);
   *   $volumes = $booksService->volumes;
   *  </code>
   */
  class MylibraryBookshelvesVolumesServiceResource extends apiServiceResource {


    /**
     * Gets volume information for volumes on a bookshelf. (volumes.list)
     *
     * @param  $startIndex Index of the first element to return (starts at 0)
     * @param  $projection Restrict information returned to a set of selected fields.
     * @param  $maxResults Maximum number of results to return
     * @param  $source String to identify the originator of this request.
     * @param  $shelf The bookshelf id or name retrieve volumes for.
     */
    public function listMylibraryBookshelvesVolumes($maxResults = null, $projection = null, $shelf = null, $source = null, $startIndex = null) {
      return $this->__call('list', array(array('startIndex' => $startIndex, 'projection' => $projection, 'maxResults' => $maxResults, 'source' => $source, 'shelf' => $shelf)));
    }
  }



/**
 * Service definition for Books (v1).
 *
 * <p>
 * Lets you search for books and manage your Google Books library.
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class apiBooksService {

  // Variables that the apiServiceResource implementation depends on.
  private $serviceName = 'books';
  private $version = 'v1';
  private $restBasePath = '/books/v1/';
  private $rpcPath = '/rpc';
  private $io;
  // apiServiceResource's that are used internally
  public $bookshelves;
  public $volumes;
  public $mylibrary;
  /**
   * Constructs the internal representation of the Books service.
   *
   * @param apiClient apiClient
   */
  public function __construct(apiClient $apiClient) {
     $apiClient->addService($this->serviceName, $this->version);
     $this->io = $apiClient->getIo();
     $this->bookshelves = new BookshelvesServiceResource($this, $this->serviceName, 'bookshelves', json_decode('{"methods": {"list": {"scopes": ["https://www.googleapis.com/auth/books"], "parameters": {"source": {"restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}}, "rpcMethod": "books.bookshelves.list", "httpMethod": "GET", "response": {"$ref": "Bookshelves"}, "restPath": "users/{userId}/bookshelves"}, "get": {"scopes": ["https://www.googleapis.com/auth/books"], "parameters": {"shelf": {"restParameterType": "path", "required": true, "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "source": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "books.bookshelves.get", "httpMethod": "GET", "response": {"$ref": "Bookshelf"}, "restPath": "users/{userId}/bookshelves/{shelf}"}}, "resources": {"volumes": {"methods": {"list": {"scopes": ["https://www.googleapis.com/auth/books"], "parameters": {"shelf": {"restParameterType": "path", "required": true, "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "source": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "books.bookshelves.volumes.list", "httpMethod": "GET", "response": {"$ref": "Volumes"}, "restPath": "users/{userId}/bookshelves/{shelf}/volumes"}}}}}', true));
     $this->volumes = new VolumesServiceResource($this, $this->serviceName, 'volumes', json_decode('{"methods": {"list": {"scopes": ["https://www.googleapis.com/auth/books"], "parameters": {"orderBy": {"restParameterType": "query", "enum": ["newest", "relevance"], "type": "string"}, "filter": {"restParameterType": "query", "enum": ["ebooks", "free-ebooks", "full", "paid-ebooks", "partial"], "type": "string"}, "projection": {"restParameterType": "query", "enum": ["full", "lite"], "type": "string"}, "langRestrict": {"restParameterType": "query", "type": "string"}, "printType": {"restParameterType": "query", "enum": ["all", "books", "magazines"], "type": "string"}, "maxResults": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "40"}, "q": {"restParameterType": "query", "required": true, "type": "string"}, "source": {"restParameterType": "query", "type": "string"}, "startIndex": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}, "download": {"restParameterType": "query", "enum": ["epub"], "type": "string"}}, "rpcMethod": "books.volumes.list", "httpMethod": "GET", "response": {"$ref": "Volumes"}, "restPath": "volumes"}, "get": {"scopes": ["https://www.googleapis.com/auth/books"], "parameters": {"source": {"restParameterType": "query", "type": "string"}, "projection": {"restParameterType": "query", "enum": ["full", "lite"], "type": "string"}, "volumeId": {"restParameterType": "path", "required": true, "type": "string"}}, "rpcMethod": "books.volumes.get", "httpMethod": "GET", "response": {"$ref": "Volume"}, "restPath": "volumes/{volumeId}"}}}', true));
     $this->mylibrary = new MylibraryServiceResource($this, $this->serviceName, 'mylibrary', json_decode('{"resources": {"bookshelves": {"methods": {"clearVolumes": {"scopes": ["https://www.googleapis.com/auth/books"], "parameters": {"shelf": {"restParameterType": "path", "required": true, "type": "string"}, "source": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "books.mylibrary.bookshelves.clearVolumes", "httpMethod": "POST", "restPath": "mylibrary/bookshelves/{shelf}/clearVolumes"}, "removeVolume": {"scopes": ["https://www.googleapis.com/auth/books"], "parameters": {"shelf": {"restParameterType": "path", "required": true, "type": "string"}, "volumeId": {"restParameterType": "query", "required": true, "type": "string"}, "source": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "books.mylibrary.bookshelves.removeVolume", "httpMethod": "POST", "restPath": "mylibrary/bookshelves/{shelf}/removeVolume"}, "list": {"scopes": ["https://www.googleapis.com/auth/books"], "parameters": {"source": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "books.mylibrary.bookshelves.list", "httpMethod": "GET", "response": {"$ref": "Bookshelves"}, "restPath": "mylibrary/bookshelves"}, "addVolume": {"scopes": ["https://www.googleapis.com/auth/books"], "parameters": {"shelf": {"restParameterType": "path", "required": true, "type": "string"}, "volumeId": {"restParameterType": "query", "required": true, "type": "string"}, "source": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "books.mylibrary.bookshelves.addVolume", "httpMethod": "POST", "restPath": "mylibrary/bookshelves/{shelf}/addVolume"}, "get": {"scopes": ["https://www.googleapis.com/auth/books"], "parameters": {"shelf": {"restParameterType": "path", "required": true, "type": "string"}, "source": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "books.mylibrary.bookshelves.get", "httpMethod": "GET", "response": {"$ref": "Bookshelf"}, "restPath": "mylibrary/bookshelves/{shelf}"}}, "resources": {"volumes": {"methods": {"list": {"scopes": ["https://www.googleapis.com/auth/books"], "parameters": {"shelf": {"restParameterType": "path", "type": "string"}, "startIndex": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}, "projection": {"restParameterType": "query", "enum": ["full", "lite"], "type": "string"}, "maxResults": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}, "source": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "books.mylibrary.bookshelves.volumes.list", "httpMethod": "GET", "response": {"$ref": "Volumes"}, "restPath": "mylibrary/bookshelves/{shelf}/volumes"}}}}}}}', true));
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

class ReviewAuthor {

  public $displayName;

  public function setDisplayName($displayName) {
    $this->displayName = $displayName;
  }

  public function getDisplayName() {
    return $this->displayName;
  }
  
}


class Review {

  public $rating;
  public $kind;
  public $author;
  public $title;
  public $volumeId;
  public $content;
  public $source;
  public $date;
  public $type;
  public $fullTextUrl;

  public function setRating($rating) {
    $this->rating = $rating;
  }

  public function getRating() {
    return $this->rating;
  }
  
  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setAuthor( ReviewAuthor $author) {
    $this->author = $author;
  }

  public function getAuthor() {
    return $this->author;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
  public function setVolumeId($volumeId) {
    $this->volumeId = $volumeId;
  }

  public function getVolumeId() {
    return $this->volumeId;
  }
  
  public function setContent($content) {
    $this->content = $content;
  }

  public function getContent() {
    return $this->content;
  }
  
  public function setSource( ReviewSource $source) {
    $this->source = $source;
  }

  public function getSource() {
    return $this->source;
  }
  
  public function setDate($date) {
    $this->date = $date;
  }

  public function getDate() {
    return $this->date;
  }
  
  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }
  
  public function setFullTextUrl($fullTextUrl) {
    $this->fullTextUrl = $fullTextUrl;
  }

  public function getFullTextUrl() {
    return $this->fullTextUrl;
  }
  
}


class VolumeVolumeInfoIndustryIdentifiers {

  public $identifier;
  public $type;

  public function setIdentifier($identifier) {
    $this->identifier = $identifier;
  }

  public function getIdentifier() {
    return $this->identifier;
  }
  
  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }
  
}


class VolumeVolumeInfoImageLinks {

  public $medium;
  public $smallThumbnail;
  public $large;
  public $extraLarge;
  public $small;
  public $thumbnail;

  public function setMedium($medium) {
    $this->medium = $medium;
  }

  public function getMedium() {
    return $this->medium;
  }
  
  public function setSmallThumbnail($smallThumbnail) {
    $this->smallThumbnail = $smallThumbnail;
  }

  public function getSmallThumbnail() {
    return $this->smallThumbnail;
  }
  
  public function setLarge($large) {
    $this->large = $large;
  }

  public function getLarge() {
    return $this->large;
  }
  
  public function setExtraLarge($extraLarge) {
    $this->extraLarge = $extraLarge;
  }

  public function getExtraLarge() {
    return $this->extraLarge;
  }
  
  public function setSmall($small) {
    $this->small = $small;
  }

  public function getSmall() {
    return $this->small;
  }
  
  public function setThumbnail($thumbnail) {
    $this->thumbnail = $thumbnail;
  }

  public function getThumbnail() {
    return $this->thumbnail;
  }
  
}


class VolumeAccessInfoEpub {

  public $downloadLink;
  public $acsTokenLink;

  public function setDownloadLink($downloadLink) {
    $this->downloadLink = $downloadLink;
  }

  public function getDownloadLink() {
    return $this->downloadLink;
  }
  
  public function setAcsTokenLink($acsTokenLink) {
    $this->acsTokenLink = $acsTokenLink;
  }

  public function getAcsTokenLink() {
    return $this->acsTokenLink;
  }
  
}


class VolumeAccessInfoPdf {

  public $downloadLink;
  public $acsTokenLink;

  public function setDownloadLink($downloadLink) {
    $this->downloadLink = $downloadLink;
  }

  public function getDownloadLink() {
    return $this->downloadLink;
  }
  
  public function setAcsTokenLink($acsTokenLink) {
    $this->acsTokenLink = $acsTokenLink;
  }

  public function getAcsTokenLink() {
    return $this->acsTokenLink;
  }
  
}


class Bookshelves {

  public $items;
  public $kind;

  public function setItems( Bookshelf $items) {
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


class VolumeVolumeInfoDimensions {

  public $width;
  public $thickness;
  public $height;

  public function setWidth($width) {
    $this->width = $width;
  }

  public function getWidth() {
    return $this->width;
  }
  
  public function setThickness($thickness) {
    $this->thickness = $thickness;
  }

  public function getThickness() {
    return $this->thickness;
  }
  
  public function setHeight($height) {
    $this->height = $height;
  }

  public function getHeight() {
    return $this->height;
  }
  
}


class Volume {

  public $kind;
  public $accessInfo;
  public $saleInfo;
  public $etag;
  public $userInfo;
  public $volumeInfo;
  public $id;
  public $selfLink;

  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setAccessInfo( VolumeAccessInfo $accessInfo) {
    $this->accessInfo = $accessInfo;
  }

  public function getAccessInfo() {
    return $this->accessInfo;
  }
  
  public function setSaleInfo( VolumeSaleInfo $saleInfo) {
    $this->saleInfo = $saleInfo;
  }

  public function getSaleInfo() {
    return $this->saleInfo;
  }
  
  public function setEtag($etag) {
    $this->etag = $etag;
  }

  public function getEtag() {
    return $this->etag;
  }
  
  public function setUserInfo( VolumeUserInfo $userInfo) {
    $this->userInfo = $userInfo;
  }

  public function getUserInfo() {
    return $this->userInfo;
  }
  
  public function setVolumeInfo( VolumeVolumeInfo $volumeInfo) {
    $this->volumeInfo = $volumeInfo;
  }

  public function getVolumeInfo() {
    return $this->volumeInfo;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setSelfLink($selfLink) {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink() {
    return $this->selfLink;
  }
  
}


class Bookshelf {

  public $kind;
  public $description;
  public $created;
  public $volumeCount;
  public $title;
  public $updated;
  public $access;
  public $volumesLastUpdated;
  public $id;
  public $selfLink;

  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setDescription($description) {
    $this->description = $description;
  }

  public function getDescription() {
    return $this->description;
  }
  
  public function setCreated($created) {
    $this->created = $created;
  }

  public function getCreated() {
    return $this->created;
  }
  
  public function setVolumeCount($volumeCount) {
    $this->volumeCount = $volumeCount;
  }

  public function getVolumeCount() {
    return $this->volumeCount;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
  public function setUpdated($updated) {
    $this->updated = $updated;
  }

  public function getUpdated() {
    return $this->updated;
  }
  
  public function setAccess($access) {
    $this->access = $access;
  }

  public function getAccess() {
    return $this->access;
  }
  
  public function setVolumesLastUpdated($volumesLastUpdated) {
    $this->volumesLastUpdated = $volumesLastUpdated;
  }

  public function getVolumesLastUpdated() {
    return $this->volumesLastUpdated;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setSelfLink($selfLink) {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink() {
    return $this->selfLink;
  }
  
}


class VolumeUserInfo {

  public $updated;
  public $readingPosition;
  public $isPurchased;
  public $review;

  public function setUpdated($updated) {
    $this->updated = $updated;
  }

  public function getUpdated() {
    return $this->updated;
  }
  
  public function setReadingPosition( ReadingPosition $readingPosition) {
    $this->readingPosition = $readingPosition;
  }

  public function getReadingPosition() {
    return $this->readingPosition;
  }
  
  public function setIsPurchased($isPurchased) {
    $this->isPurchased = $isPurchased;
  }

  public function getIsPurchased() {
    return $this->isPurchased;
  }
  
  public function setReview( Review $review) {
    $this->review = $review;
  }

  public function getReview() {
    return $this->review;
  }
  
}


class VolumeSaleInfoRetailPrice {

  public $amount;
  public $currencyCode;

  public function setAmount($amount) {
    $this->amount = $amount;
  }

  public function getAmount() {
    return $this->amount;
  }
  
  public function setCurrencyCode($currencyCode) {
    $this->currencyCode = $currencyCode;
  }

  public function getCurrencyCode() {
    return $this->currencyCode;
  }
  
}


class DownloadAccessRestriction {

  public $nonce;
  public $kind;
  public $maxDownloadDevices;
  public $downloadsAcquired;
  public $signature;
  public $volumeId;
  public $deviceAllowed;
  public $source;
  public $restricted;
  public $reasonCode;
  public $message;

  public function setNonce($nonce) {
    $this->nonce = $nonce;
  }

  public function getNonce() {
    return $this->nonce;
  }
  
  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setMaxDownloadDevices($maxDownloadDevices) {
    $this->maxDownloadDevices = $maxDownloadDevices;
  }

  public function getMaxDownloadDevices() {
    return $this->maxDownloadDevices;
  }
  
  public function setDownloadsAcquired($downloadsAcquired) {
    $this->downloadsAcquired = $downloadsAcquired;
  }

  public function getDownloadsAcquired() {
    return $this->downloadsAcquired;
  }
  
  public function setSignature($signature) {
    $this->signature = $signature;
  }

  public function getSignature() {
    return $this->signature;
  }
  
  public function setVolumeId($volumeId) {
    $this->volumeId = $volumeId;
  }

  public function getVolumeId() {
    return $this->volumeId;
  }
  
  public function setDeviceAllowed($deviceAllowed) {
    $this->deviceAllowed = $deviceAllowed;
  }

  public function getDeviceAllowed() {
    return $this->deviceAllowed;
  }
  
  public function setSource($source) {
    $this->source = $source;
  }

  public function getSource() {
    return $this->source;
  }
  
  public function setRestricted($restricted) {
    $this->restricted = $restricted;
  }

  public function getRestricted() {
    return $this->restricted;
  }
  
  public function setReasonCode($reasonCode) {
    $this->reasonCode = $reasonCode;
  }

  public function getReasonCode() {
    return $this->reasonCode;
  }
  
  public function setMessage($message) {
    $this->message = $message;
  }

  public function getMessage() {
    return $this->message;
  }
  
}


class ReviewSource {

  public $extraDescription;
  public $url;
  public $description;

  public function setExtraDescription($extraDescription) {
    $this->extraDescription = $extraDescription;
  }

  public function getExtraDescription() {
    return $this->extraDescription;
  }
  
  public function setUrl($url) {
    $this->url = $url;
  }

  public function getUrl() {
    return $this->url;
  }
  
  public function setDescription($description) {
    $this->description = $description;
  }

  public function getDescription() {
    return $this->description;
  }
  
}


class VolumeSaleInfoListPrice {

  public $amount;
  public $currencyCode;

  public function setAmount($amount) {
    $this->amount = $amount;
  }

  public function getAmount() {
    return $this->amount;
  }
  
  public function setCurrencyCode($currencyCode) {
    $this->currencyCode = $currencyCode;
  }

  public function getCurrencyCode() {
    return $this->currencyCode;
  }
  
}


class VolumeSaleInfo {

  public $country;
  public $retailPrice;
  public $isEbook;
  public $saleability;
  public $buyLink;
  public $listPrice;

  public function setCountry($country) {
    $this->country = $country;
  }

  public function getCountry() {
    return $this->country;
  }
  
  public function setRetailPrice( VolumeSaleInfoRetailPrice $retailPrice) {
    $this->retailPrice = $retailPrice;
  }

  public function getRetailPrice() {
    return $this->retailPrice;
  }
  
  public function setIsEbook($isEbook) {
    $this->isEbook = $isEbook;
  }

  public function getIsEbook() {
    return $this->isEbook;
  }
  
  public function setSaleability($saleability) {
    $this->saleability = $saleability;
  }

  public function getSaleability() {
    return $this->saleability;
  }
  
  public function setBuyLink($buyLink) {
    $this->buyLink = $buyLink;
  }

  public function getBuyLink() {
    return $this->buyLink;
  }
  
  public function setListPrice( VolumeSaleInfoListPrice $listPrice) {
    $this->listPrice = $listPrice;
  }

  public function getListPrice() {
    return $this->listPrice;
  }
  
}


class VolumeAccessInfo {

  public $publicDomain;
  public $embeddable;
  public $downloadAccess;
  public $country;
  public $textToSpeechAllowed;
  public $pdf;
  public $viewability;
  public $epub;
  public $accessViewStatus;

  public function setPublicDomain($publicDomain) {
    $this->publicDomain = $publicDomain;
  }

  public function getPublicDomain() {
    return $this->publicDomain;
  }
  
  public function setEmbeddable($embeddable) {
    $this->embeddable = $embeddable;
  }

  public function getEmbeddable() {
    return $this->embeddable;
  }
  
  public function setDownloadAccess( DownloadAccessRestriction $downloadAccess) {
    $this->downloadAccess = $downloadAccess;
  }

  public function getDownloadAccess() {
    return $this->downloadAccess;
  }
  
  public function setCountry($country) {
    $this->country = $country;
  }

  public function getCountry() {
    return $this->country;
  }
  
  public function setTextToSpeechAllowed($textToSpeechAllowed) {
    $this->textToSpeechAllowed = $textToSpeechAllowed;
  }

  public function getTextToSpeechAllowed() {
    return $this->textToSpeechAllowed;
  }
  
  public function setPdf( VolumeAccessInfoPdf $pdf) {
    $this->pdf = $pdf;
  }

  public function getPdf() {
    return $this->pdf;
  }
  
  public function setViewability($viewability) {
    $this->viewability = $viewability;
  }

  public function getViewability() {
    return $this->viewability;
  }
  
  public function setEpub( VolumeAccessInfoEpub $epub) {
    $this->epub = $epub;
  }

  public function getEpub() {
    return $this->epub;
  }
  
  public function setAccessViewStatus($accessViewStatus) {
    $this->accessViewStatus = $accessViewStatus;
  }

  public function getAccessViewStatus() {
    return $this->accessViewStatus;
  }
  
}


class ReadingPosition {

  public $kind;
  public $gbImagePosition;
  public $epubCfiPosition;
  public $updated;
  public $volumeId;
  public $pdfPosition;
  public $gbTextPosition;

  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setGbImagePosition($gbImagePosition) {
    $this->gbImagePosition = $gbImagePosition;
  }

  public function getGbImagePosition() {
    return $this->gbImagePosition;
  }
  
  public function setEpubCfiPosition($epubCfiPosition) {
    $this->epubCfiPosition = $epubCfiPosition;
  }

  public function getEpubCfiPosition() {
    return $this->epubCfiPosition;
  }
  
  public function setUpdated($updated) {
    $this->updated = $updated;
  }

  public function getUpdated() {
    return $this->updated;
  }
  
  public function setVolumeId($volumeId) {
    $this->volumeId = $volumeId;
  }

  public function getVolumeId() {
    return $this->volumeId;
  }
  
  public function setPdfPosition($pdfPosition) {
    $this->pdfPosition = $pdfPosition;
  }

  public function getPdfPosition() {
    return $this->pdfPosition;
  }
  
  public function setGbTextPosition($gbTextPosition) {
    $this->gbTextPosition = $gbTextPosition;
  }

  public function getGbTextPosition() {
    return $this->gbTextPosition;
  }
  
}


class Volumes {

  public $totalItems;
  public $items;
  public $kind;

  public function setTotalItems($totalItems) {
    $this->totalItems = $totalItems;
  }

  public function getTotalItems() {
    return $this->totalItems;
  }
  
  public function setItems( Volume $items) {
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


class VolumeVolumeInfo {

  public $publishedDate;
  public $subtitle;
  public $dimensions;
  public $language;
  public $pageCount;
  public $imageLinks;
  public $description;
  public $previewLink;
  public $printType;
  public $mainCategory;
  public $contentVersion;
  public $industryIdentifiers;
  public $authors;
  public $publisher;
  public $title;
  public $ratingsCount;
  public $infoLink;
  public $categories;
  public $averageRating;

  public function setPublishedDate($publishedDate) {
    $this->publishedDate = $publishedDate;
  }

  public function getPublishedDate() {
    return $this->publishedDate;
  }
  
  public function setSubtitle($subtitle) {
    $this->subtitle = $subtitle;
  }

  public function getSubtitle() {
    return $this->subtitle;
  }
  
  public function setDimensions( VolumeVolumeInfoDimensions $dimensions) {
    $this->dimensions = $dimensions;
  }

  public function getDimensions() {
    return $this->dimensions;
  }
  
  public function setLanguage($language) {
    $this->language = $language;
  }

  public function getLanguage() {
    return $this->language;
  }
  
  public function setPageCount($pageCount) {
    $this->pageCount = $pageCount;
  }

  public function getPageCount() {
    return $this->pageCount;
  }
  
  public function setImageLinks( VolumeVolumeInfoImageLinks $imageLinks) {
    $this->imageLinks = $imageLinks;
  }

  public function getImageLinks() {
    return $this->imageLinks;
  }
  
  public function setDescription($description) {
    $this->description = $description;
  }

  public function getDescription() {
    return $this->description;
  }
  
  public function setPreviewLink($previewLink) {
    $this->previewLink = $previewLink;
  }

  public function getPreviewLink() {
    return $this->previewLink;
  }
  
  public function setPrintType($printType) {
    $this->printType = $printType;
  }

  public function getPrintType() {
    return $this->printType;
  }
  
  public function setMainCategory($mainCategory) {
    $this->mainCategory = $mainCategory;
  }

  public function getMainCategory() {
    return $this->mainCategory;
  }
  
  public function setContentVersion($contentVersion) {
    $this->contentVersion = $contentVersion;
  }

  public function getContentVersion() {
    return $this->contentVersion;
  }
  
  public function setIndustryIdentifiers( VolumeVolumeInfoIndustryIdentifiers $industryIdentifiers) {
    $this->industryIdentifiers = $industryIdentifiers;
  }

  public function getIndustryIdentifiers() {
    return $this->industryIdentifiers;
  }
  
  public function setAuthors($authors) {
    $this->authors = $authors;
  }

  public function getAuthors() {
    return $this->authors;
  }
  
  public function setPublisher($publisher) {
    $this->publisher = $publisher;
  }

  public function getPublisher() {
    return $this->publisher;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
  public function setRatingsCount($ratingsCount) {
    $this->ratingsCount = $ratingsCount;
  }

  public function getRatingsCount() {
    return $this->ratingsCount;
  }
  
  public function setInfoLink($infoLink) {
    $this->infoLink = $infoLink;
  }

  public function getInfoLink() {
    return $this->infoLink;
  }
  
  public function setCategories($categories) {
    $this->categories = $categories;
  }

  public function getCategories() {
    return $this->categories;
  }
  
  public function setAverageRating($averageRating) {
    $this->averageRating = $averageRating;
  }

  public function getAverageRating() {
    return $this->averageRating;
  }
  
}


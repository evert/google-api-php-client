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
   * The "activities" collection of methods.
   * Typical usage is:
   *  <code>
   *   $buzzService = new apiBuzzService(...);
   *   $activities = $buzzService->activities;
   *  </code>
   */
  class ActivitiesServiceResource extends apiServiceResource {


    /**
     * Get a count of link shares (activities.count)
     *
     * @param  $url URLs for which to get share counts.
     */
    public function count($url = null) {
      return $this->__call('count', array(array('url' => $url)));
    }
    /**
     * Create a new activity (activities.insert)
     *
     * @param  $preview If true, only preview the action.
     * @param  $userId ID of the user being referenced.
     * @param $postBody the {@link Activity}
     */
    public function insert($userId, Activity $postBody, $preview = null) {
      return $this->__call('insert', array(array('preview' => $preview, 'userId' => $userId, 'postBody' => $postBody)));
    }
    /**
     * Search for activities (activities.search)
     *
     * @param  $max_results Maximum number of results to include.
     * @param  $c A continuation token that allows pagination.
     * @param  $pid ID of a place to use in a geographic location query.
     * @param  $lon Longitude to use in a geographic location query.
     * @param  $q Full-text search query string.
     * @param  $truncateAtom Truncate the value of the atom:content element.
     * @param  $radius Radius to use in a geographic location query.
     * @param  $bbox Bounding box to use in a geographic location query.
     * @param  $lat Latitude to use in a geographic location query.
     */
    public function search($bbox = null, $c = null, $lat = null, $lon = null, $max_results = null, $pid = null, $q = null, $radius = null, $truncateAtom = null) {
      return $this->__call('search', array(array('max-results' => $max_results, 'c' => $c, 'pid' => $pid, 'lon' => $lon, 'q' => $q, 'truncateAtom' => $truncateAtom, 'radius' => $radius, 'bbox' => $bbox, 'lat' => $lat)));
    }
    /**
     * Get an activity (activities.get)
     *
     * @param  $truncateAtom Truncate the value of the atom:content element.
     * @param  $max_comments Maximum number of comments to include.
     * @param  $max_liked Maximum number of likes to include.
     * @param  $userId ID of the user whose post to get.
     * @param  $postId ID of the post to get.
     */
    public function get($postId, $userId, $max_comments = null, $max_liked = null, $truncateAtom = null) {
      return $this->__call('get', array(array('truncateAtom' => $truncateAtom, 'max-comments' => $max_comments, 'max-liked' => $max_liked, 'userId' => $userId, 'postId' => $postId)));
    }
    /**
     * Get real-time activity tracking information (activities.track)
     *
     * @param  $max_results Maximum number of results to include.
     * @param  $c A continuation token that allows pagination.
     * @param  $pid ID of a place to use in a geographic location query.
     * @param  $lon Longitude to use in a geographic location query.
     * @param  $q Full-text search query string.
     * @param  $radius Radius to use in a geographic location query.
     * @param  $bbox Bounding box to use in a geographic location query.
     * @param  $lat Latitude to use in a geographic location query.
     */
    public function track($bbox = null, $c = null, $lat = null, $lon = null, $max_results = null, $pid = null, $q = null, $radius = null) {
      return $this->__call('track', array(array('max-results' => $max_results, 'c' => $c, 'pid' => $pid, 'lon' => $lon, 'q' => $q, 'radius' => $radius, 'bbox' => $bbox, 'lat' => $lat)));
    }
    /**
     * List activities (activities.list)
     *
     * @param  $max_results Maximum number of results to include.
     * @param  $c A continuation token that allows pagination.
     * @param  $truncateAtom Truncate the value of the atom:content element.
     * @param  $max_comments Maximum number of comments to include.
     * @param  $max_liked Maximum number of likes to include.
     * @param  $userId ID of the user being referenced.
     * @param  $scope The collection of activities to list.
     */
    public function listActivities($scope, $userId, $c = null, $max_comments = null, $max_liked = null, $max_results = null, $truncateAtom = null) {
      return $this->__call('list', array(array('max-results' => $max_results, 'c' => $c, 'truncateAtom' => $truncateAtom, 'max-comments' => $max_comments, 'max-liked' => $max_liked, 'userId' => $userId, 'scope' => $scope)));
    }
    /**
     * Update an activity (activities.update)
     *
     * @param  $abuseType
     * @param  $userId ID of the user whose post to update.
     * @param  $scope The collection to which the activity belongs.
     * @param  $postId ID of the activity to update.
     * @param $postBody the {@link Activity}
     */
    public function update($postId, $scope, $userId, Activity $postBody, $abuseType = null) {
      return $this->__call('update', array(array('abuseType' => $abuseType, 'userId' => $userId, 'scope' => $scope, 'postId' => $postId, 'postBody' => $postBody)));
    }
    /**
     * Update an activity. This method supports patch semantics. (activities.patch)
     *
     * @param  $abuseType
     * @param  $userId ID of the user whose post to update.
     * @param  $scope The collection to which the activity belongs.
     * @param  $postId ID of the activity to update.
     * @param $postBody the {@link Activity}
     */
    public function patch($postId, $scope, $userId, Activity $postBody, $abuseType = null) {
      return $this->__call('patch', array(array('abuseType' => $abuseType, 'userId' => $userId, 'scope' => $scope, 'postId' => $postId, 'postBody' => $postBody)));
    }
    /**
     * Search for people by topic (activities.extractPeopleFromSearch)
     *
     * @param  $max_results Maximum number of results to include.
     * @param  $c A continuation token that allows pagination.
     * @param  $pid ID of a place to use in a geographic location query.
     * @param  $lon Longitude to use in a geographic location query.
     * @param  $q Full-text search query string.
     * @param  $radius Radius to use in a geographic location query.
     * @param  $bbox Bounding box to use in a geographic location query.
     * @param  $lat Latitude to use in a geographic location query.
     */
    public function extractPeopleFromSearch($bbox = null, $c = null, $lat = null, $lon = null, $max_results = null, $pid = null, $q = null, $radius = null) {
      return $this->__call('extractPeopleFromSearch', array(array('max-results' => $max_results, 'c' => $c, 'pid' => $pid, 'lon' => $lon, 'q' => $q, 'radius' => $radius, 'bbox' => $bbox, 'lat' => $lat)));
    }
    /**
     * Delete an activity (activities.delete)
     *
     * @param  $userId ID of the user whose post to delete.
     * @param  $scope The collection to which the activity belongs.
     * @param  $postId ID of the activity to delete.
     */
    public function delete($postId, $scope, $userId) {
      return $this->__call('delete', array(array('userId' => $userId, 'scope' => $scope, 'postId' => $postId)));
    }
  }

  /**
   * The "people" collection of methods.
   * Typical usage is:
   *  <code>
   *   $buzzService = new apiBuzzService(...);
   *   $people = $buzzService->people;
   *  </code>
   */
  class PeopleServiceResource extends apiServiceResource {


    /**
     * Get people who liked an activity (people.liked)
     *
     * @param  $max_results Maximum number of results to include.
     * @param  $c A continuation token that allows pagination.
     * @param  $userId ID of the user being referenced.
     * @param  $scope
     * @param  $postId ID of the activity that was liked.
     * @param  $groupId
     */
    public function liked($groupId, $postId, $scope, $userId, $c = null, $max_results = null) {
      return $this->__call('liked', array(array('max-results' => $max_results, 'c' => $c, 'userId' => $userId, 'scope' => $scope, 'postId' => $postId, 'groupId' => $groupId)));
    }
    /**
     * Get a user profile (people.get)
     *
     * @param  $userId ID of the user being referenced.
     */
    public function get($userId) {
      return $this->__call('get', array(array('userId' => $userId)));
    }
    /**
     * Add a person to a group (people.update)
     *
     * @param  $userId ID of the owner of the group.
     * @param  $groupId ID of the group to which to add the person.
     * @param  $personId ID of the person to add to the group.
     * @param $postBody the {@link Person}
     */
    public function update($groupId, $personId, $userId, Person $postBody) {
      return $this->__call('update', array(array('userId' => $userId, 'groupId' => $groupId, 'personId' => $personId, 'postBody' => $postBody)));
    }
    /**
     * Get people in a group (people.list)
     *
     * @param  $max_results Maximum number of results to include.
     * @param  $c A continuation token that allows pagination.
     * @param  $userId ID of the user being referenced.
     * @param  $groupId ID of the group for which to list users.
     */
    public function listPeople($groupId, $userId, $c = null, $max_results = null) {
      return $this->__call('list', array(array('max-results' => $max_results, 'c' => $c, 'userId' => $userId, 'groupId' => $groupId)));
    }
    /**
     * Search for people (people.search)
     *
     * @param  $max_results Maximum number of results to include.
     * @param  $q Full-text search query string.
     * @param  $c A continuation token that allows pagination.
     */
    public function search($c = null, $max_results = null, $q = null) {
      return $this->__call('search', array(array('max-results' => $max_results, 'q' => $q, 'c' => $c)));
    }
    /**
     * Add a person to a group. This method supports patch semantics. (people.patch)
     *
     * @param  $userId ID of the owner of the group.
     * @param  $groupId ID of the group to which to add the person.
     * @param  $personId ID of the person to add to the group.
     * @param $postBody the {@link Person}
     */
    public function patch($groupId, $personId, $userId, Person $postBody) {
      return $this->__call('patch', array(array('userId' => $userId, 'groupId' => $groupId, 'personId' => $personId, 'postBody' => $postBody)));
    }
    /**
     * Get people who reshared an activity (people.reshared)
     *
     * @param  $max_results Maximum number of results to include.
     * @param  $c A continuation token that allows pagination.
     * @param  $userId ID of the user being referenced.
     * @param  $scope
     * @param  $postId ID of the activity that was reshared.
     * @param  $groupId
     */
    public function reshared($groupId, $postId, $scope, $userId, $c = null, $max_results = null) {
      return $this->__call('reshared', array(array('max-results' => $max_results, 'c' => $c, 'userId' => $userId, 'scope' => $scope, 'postId' => $postId, 'groupId' => $groupId)));
    }
    /**
     * Remove a person from a group (people.delete)
     *
     * @param  $userId ID of the owner of the group.
     * @param  $groupId ID of the group from which to remove the person.
     * @param  $personId ID of the person to remove from the group.
     */
    public function delete($groupId, $personId, $userId) {
      return $this->__call('delete', array(array('userId' => $userId, 'groupId' => $groupId, 'personId' => $personId)));
    }
  }

  /**
   * The "photoAlbums" collection of methods.
   * Typical usage is:
   *  <code>
   *   $buzzService = new apiBuzzService(...);
   *   $photoAlbums = $buzzService->photoAlbums;
   *  </code>
   */
  class PhotoAlbumsServiceResource extends apiServiceResource {


    /**
     * Create a photo album (photoAlbums.insert)
     *
     * @param  $userId ID of the user being referenced.
     * @param $postBody the {@link Album}
     */
    public function insert($userId, Album $postBody) {
      return $this->__call('insert', array(array('userId' => $userId, 'postBody' => $postBody)));
    }
    /**
     * Get a photo album (photoAlbums.get)
     *
     * @param  $userId ID of the user being referenced.
     * @param  $albumId ID of the album to get.
     */
    public function get($albumId, $userId) {
      return $this->__call('get', array(array('userId' => $userId, 'albumId' => $albumId)));
    }
    /**
     * List a user's photo albums (photoAlbums.list)
     *
     * @param  $max_results Maximum number of results to include.
     * @param  $c A continuation token that allows pagination.
     * @param  $userId ID of the user being referenced.
     * @param  $scope The collection of albums to list.
     */
    public function listPhotoAlbums($scope, $userId, $c = null, $max_results = null) {
      return $this->__call('list', array(array('max-results' => $max_results, 'c' => $c, 'userId' => $userId, 'scope' => $scope)));
    }
    /**
     * Delete a photo album (photoAlbums.delete)
     *
     * @param  $userId ID of the user being referenced.
     * @param  $albumId ID of the album to delete.
     */
    public function delete($albumId, $userId) {
      return $this->__call('delete', array(array('userId' => $userId, 'albumId' => $albumId)));
    }
  }

  /**
   * The "comments" collection of methods.
   * Typical usage is:
   *  <code>
   *   $buzzService = new apiBuzzService(...);
   *   $comments = $buzzService->comments;
   *  </code>
   */
  class CommentsServiceResource extends apiServiceResource {


    /**
     * Create a comment (comments.insert)
     *
     * @param  $userId ID of the user on whose behalf to comment.
     * @param  $postId ID of the activity on which to comment.
     * @param $postBody the {@link Comment}
     */
    public function insert($postId, $userId, Comment $postBody) {
      return $this->__call('insert', array(array('userId' => $userId, 'postId' => $postId, 'postBody' => $postBody)));
    }
    /**
     * Get a comment (comments.get)
     *
     * @param  $userId ID of the user being referenced.
     * @param  $postId ID of the activity for which to get comments.
     * @param  $commentId ID of the comment being referenced.
     */
    public function get($commentId, $postId, $userId) {
      return $this->__call('get', array(array('userId' => $userId, 'postId' => $postId, 'commentId' => $commentId)));
    }
    /**
     * List comments (comments.list)
     *
     * @param  $max_results Maximum number of results to include.
     * @param  $c A continuation token that allows pagination.
     * @param  $userId ID of the user for whose post to get comments.
     * @param  $scope The collection to which the activity belongs.
     * @param  $postId ID of the activity for which to get comments.
     */
    public function listComments($postId, $scope, $userId, $c = null, $max_results = null) {
      return $this->__call('list', array(array('max-results' => $max_results, 'c' => $c, 'userId' => $userId, 'scope' => $scope, 'postId' => $postId)));
    }
    /**
     * Update a comment (comments.update)
     *
     * @param  $abuseType
     * @param  $userId ID of the user being referenced.
     * @param  $scope The collection to which the activity belongs.
     * @param  $postId ID of the activity for which to update the comment.
     * @param  $commentId ID of the comment being referenced.
     * @param $postBody the {@link Comment}
     */
    public function update($commentId, $postId, $scope, $userId, Comment $postBody, $abuseType = null) {
      return $this->__call('update', array(array('abuseType' => $abuseType, 'userId' => $userId, 'scope' => $scope, 'postId' => $postId, 'commentId' => $commentId, 'postBody' => $postBody)));
    }
    /**
     * Update a comment. This method supports patch semantics. (comments.patch)
     *
     * @param  $abuseType
     * @param  $userId ID of the user being referenced.
     * @param  $scope The collection to which the activity belongs.
     * @param  $postId ID of the activity for which to update the comment.
     * @param  $commentId ID of the comment being referenced.
     * @param $postBody the {@link Comment}
     */
    public function patch($commentId, $postId, $scope, $userId, Comment $postBody, $abuseType = null) {
      return $this->__call('patch', array(array('abuseType' => $abuseType, 'userId' => $userId, 'scope' => $scope, 'postId' => $postId, 'commentId' => $commentId, 'postBody' => $postBody)));
    }
    /**
     * Delete a comment (comments.delete)
     *
     * @param  $userId ID of the user being referenced.
     * @param  $postId ID of the activity for which to delete the comment.
     * @param  $commentId ID of the comment being referenced.
     */
    public function delete($commentId, $postId, $userId) {
      return $this->__call('delete', array(array('userId' => $userId, 'postId' => $postId, 'commentId' => $commentId)));
    }
  }

  /**
   * The "photos" collection of methods.
   * Typical usage is:
   *  <code>
   *   $buzzService = new apiBuzzService(...);
   *   $photos = $buzzService->photos;
   *  </code>
   */
  class PhotosServiceResource extends apiServiceResource {


    /**
     * Upload a photo to an album (photos.insert2)
     *
     * @param  $userId ID of the user being referenced.
     * @param  $albumId ID of the album to which to upload.
     * @param $postBody the {@link ChiliPhotosResourceJson}
     */
    public function insert2($albumId, $userId, ChiliPhotosResourceJson $postBody) {
      return $this->__call('insert2', array(array('userId' => $userId, 'albumId' => $albumId, 'postBody' => $postBody)));
    }
    /**
     * Upload a photo to an album (photos.insert)
     *
     * @param  $userId ID of the user being referenced.
     * @param  $albumId ID of the album to which to upload.
     * @param $postBody the {@link AlbumLite}
     */
    public function insert($albumId, $userId, AlbumLite $postBody) {
      return $this->__call('insert', array(array('userId' => $userId, 'albumId' => $albumId, 'postBody' => $postBody)));
    }
    /**
     * Get photo metadata (photos.get)
     *
     * @param  $userId ID of the user being referenced.
     * @param  $albumId ID of the album containing the photo.
     * @param  $photoId ID of the photo for which to get metadata.
     */
    public function get($albumId, $photoId, $userId) {
      return $this->__call('get', array(array('userId' => $userId, 'albumId' => $albumId, 'photoId' => $photoId)));
    }
    /**
     * Get a user's photos (photos.listByScope)
     *
     * @param  $max_results Maximum number of results to include.
     * @param  $c A continuation token that allows pagination.
     * @param  $userId ID of the user being referenced.
     * @param  $scope The collection of photos to list.
     */
    public function listByScope($scope, $userId, $c = null, $max_results = null) {
      return $this->__call('listByScope', array(array('max-results' => $max_results, 'c' => $c, 'userId' => $userId, 'scope' => $scope)));
    }
    /**
     * Delete a photo (photos.delete)
     *
     * @param  $userId ID of the user being referenced.
     * @param  $albumId ID of the album to which to photo belongs.
     * @param  $photoId ID of the photo to delete.
     */
    public function delete($albumId, $photoId, $userId) {
      return $this->__call('delete', array(array('userId' => $userId, 'albumId' => $albumId, 'photoId' => $photoId)));
    }
    /**
     * List photos in an album (photos.listByAlbum)
     *
     * @param  $max_results Maximum number of results to include.
     * @param  $c A continuation token that allows pagination.
     * @param  $userId ID of the user being referenced.
     * @param  $albumId ID of the album for which to list photos.
     */
    public function listByAlbum($albumId, $userId, $c = null, $max_results = null) {
      return $this->__call('listByAlbum', array(array('max-results' => $max_results, 'c' => $c, 'userId' => $userId, 'albumId' => $albumId)));
    }
  }

  /**
   * The "related" collection of methods.
   * Typical usage is:
   *  <code>
   *   $buzzService = new apiBuzzService(...);
   *   $related = $buzzService->related;
   *  </code>
   */
  class RelatedServiceResource extends apiServiceResource {


    /**
     * Get related links for an activity (related.list)
     *
     * @param  $userId ID of the user being referenced.
     * @param  $scope The collection to which the activity belongs.
     * @param  $postId ID of the activity to which to get related links.
     */
    public function listRelated($postId, $scope, $userId) {
      return $this->__call('list', array(array('userId' => $userId, 'scope' => $scope, 'postId' => $postId)));
    }
  }

  /**
   * The "groups" collection of methods.
   * Typical usage is:
   *  <code>
   *   $buzzService = new apiBuzzService(...);
   *   $groups = $buzzService->groups;
   *  </code>
   */
  class GroupsServiceResource extends apiServiceResource {


    /**
     * Create a group (groups.insert)
     *
     * @param  $userId ID of the user being referenced.
     * @param $postBody the {@link Group}
     */
    public function insert($userId, Group $postBody) {
      return $this->__call('insert', array(array('userId' => $userId, 'postBody' => $postBody)));
    }
    /**
     * Get a group (groups.get)
     *
     * @param  $userId ID of the user being referenced.
     * @param  $groupId ID of the group to get.
     */
    public function get($groupId, $userId) {
      return $this->__call('get', array(array('userId' => $userId, 'groupId' => $groupId)));
    }
    /**
     * Get a user's groups (groups.list)
     *
     * @param  $max_results Maximum number of results to include.
     * @param  $c A continuation token that allows pagination.
     * @param  $userId ID of the user being referenced.
     */
    public function listGroups($userId, $c = null, $max_results = null) {
      return $this->__call('list', array(array('max-results' => $max_results, 'c' => $c, 'userId' => $userId)));
    }
    /**
     * Update a group (groups.update)
     *
     * @param  $userId ID of the user being referenced.
     * @param  $groupId ID of the group to update.
     * @param $postBody the {@link Group}
     */
    public function update($groupId, $userId, Group $postBody) {
      return $this->__call('update', array(array('userId' => $userId, 'groupId' => $groupId, 'postBody' => $postBody)));
    }
    /**
     * Update a group. This method supports patch semantics. (groups.patch)
     *
     * @param  $userId ID of the user being referenced.
     * @param  $groupId ID of the group to update.
     * @param $postBody the {@link Group}
     */
    public function patch($groupId, $userId, Group $postBody) {
      return $this->__call('patch', array(array('userId' => $userId, 'groupId' => $groupId, 'postBody' => $postBody)));
    }
    /**
     * Delete a group (groups.delete)
     *
     * @param  $userId ID of the user being referenced.
     * @param  $groupId ID of the group to delete.
     */
    public function delete($groupId, $userId) {
      return $this->__call('delete', array(array('userId' => $userId, 'groupId' => $groupId)));
    }
  }



/**
 * Service definition for Buzz (v1).
 *
 * <p>
 * Lets you share updates, photos, videos, and more with your friends around the world
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class apiBuzzService {

  // Variables that the apiServiceResource implementation depends on.
  private $serviceName = 'buzz';
  private $version = 'v1';
  private $restBasePath = '/buzz/v1/';
  private $rpcPath = '/rpc';
  private $io;
  // apiServiceResource's that are used internally
  public $activities;
  public $people;
  public $photoAlbums;
  public $comments;
  public $photos;
  public $related;
  public $groups;
  /**
   * Constructs the internal representation of the Buzz service.
   *
   * @param apiClient apiClient
   */
  public function __construct(apiClient $apiClient) {
     $apiClient->addService($this->serviceName, $this->version);
     $this->io = $apiClient->getIo();
     $this->activities = new ActivitiesServiceResource($this, $this->serviceName, 'activities', json_decode('{"methods": {"count": {"scopes": ["https://www.googleapis.com/auth/buzz", "https://www.googleapis.com/auth/buzz.readonly"], "parameters": {"url": {"restParameterType": "query", "type": "string", "repeated": true}, "hl": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.activities.count", "httpMethod": "GET", "response": {"$ref": "CountFeed"}, "restPath": "activities/count"}, "insert": {"scopes": ["https://www.googleapis.com/auth/buzz"], "parameters": {"alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "preview": {"default": "false", "restParameterType": "query", "type": "boolean"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "request": {"$ref": "Activity"}, "rpcMethod": "chili.activities.insert", "httpMethod": "POST", "response": {"$ref": "Activity"}, "restPath": "activities/{userId}/@self"}, "search": {"scopes": ["https://www.googleapis.com/auth/buzz", "https://www.googleapis.com/auth/buzz.readonly"], "parameters": {"max-results": {"default": "20", "maximum": "4294967295", "minimum": "0", "restParameterType": "query", "type": "integer"}, "c": {"restParameterType": "query", "type": "string"}, "pid": {"restParameterType": "query", "type": "string"}, "lon": {"restParameterType": "query", "type": "string"}, "q": {"restParameterType": "query", "type": "string"}, "truncateAtom": {"restParameterType": "query", "type": "boolean"}, "radius": {"restParameterType": "query", "type": "string"}, "bbox": {"restParameterType": "query", "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}, "lat": {"restParameterType": "query", "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.activities.search", "httpMethod": "GET", "response": {"$ref": "ActivityFeed"}, "restPath": "activities/search"}, "get": {"scopes": ["https://www.googleapis.com/auth/buzz", "https://www.googleapis.com/auth/buzz.readonly"], "parameters": {"userId": {"restParameterType": "path", "required": true, "type": "string"}, "truncateAtom": {"restParameterType": "query", "type": "boolean"}, "max-comments": {"default": "0", "maximum": "4294967295", "minimum": "0", "restParameterType": "query", "type": "integer"}, "hl": {"restParameterType": "query", "type": "string"}, "max-liked": {"default": "0", "maximum": "4294967295", "minimum": "0", "restParameterType": "query", "type": "integer"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "postId": {"restParameterType": "path", "required": true, "type": "string"}}, "rpcMethod": "chili.activities.get", "httpMethod": "GET", "response": {"$ref": "Activity"}, "restPath": "activities/{userId}/@self/{postId}"}, "track": {"scopes": ["https://www.googleapis.com/auth/buzz", "https://www.googleapis.com/auth/buzz.readonly"], "parameters": {"max-results": {"default": "20", "maximum": "4294967295", "minimum": "0", "restParameterType": "query", "type": "integer"}, "c": {"restParameterType": "query", "type": "string"}, "pid": {"restParameterType": "query", "type": "string"}, "lon": {"restParameterType": "query", "type": "string"}, "q": {"restParameterType": "query", "type": "string"}, "radius": {"restParameterType": "query", "type": "string"}, "bbox": {"restParameterType": "query", "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}, "lat": {"restParameterType": "query", "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.activities.track", "httpMethod": "GET", "response": {"$ref": "ActivityFeed"}, "restPath": "activities/track"}, "list": {"scopes": ["https://www.googleapis.com/auth/buzz", "https://www.googleapis.com/auth/buzz.readonly"], "parameters": {"max-results": {"default": "20", "maximum": "4294967295", "minimum": "0", "restParameterType": "query", "type": "integer"}, "c": {"restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "truncateAtom": {"restParameterType": "query", "type": "boolean"}, "max-comments": {"default": "0", "maximum": "4294967295", "minimum": "0", "restParameterType": "query", "type": "integer"}, "hl": {"restParameterType": "query", "type": "string"}, "max-liked": {"default": "0", "maximum": "4294967295", "minimum": "0", "restParameterType": "query", "type": "integer"}, "scope": {"required": true, "enum": ["@comments", "@consumption", "@liked", "@public", "@self"], "restParameterType": "path", "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.activities.list", "httpMethod": "GET", "response": {"$ref": "ActivityFeed"}, "restPath": "activities/{userId}/{scope}"}, "update": {"scopes": ["https://www.googleapis.com/auth/buzz"], "parameters": {"userId": {"restParameterType": "path", "required": true, "type": "string"}, "abuseType": {"restParameterType": "query", "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}, "scope": {"required": true, "enum": ["@abuse", "@liked", "@muted", "@self"], "restParameterType": "path", "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "postId": {"restParameterType": "path", "required": true, "type": "string"}}, "request": {"$ref": "Activity"}, "rpcMethod": "chili.activities.update", "httpMethod": "PUT", "response": {"$ref": "Activity"}, "restPath": "activities/{userId}/{scope}/{postId}"}, "patch": {"scopes": ["https://www.googleapis.com/auth/buzz"], "parameters": {"userId": {"restParameterType": "path", "required": true, "type": "string"}, "abuseType": {"restParameterType": "query", "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}, "scope": {"required": true, "enum": ["@abuse", "@liked", "@muted", "@self"], "restParameterType": "path", "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "postId": {"restParameterType": "path", "required": true, "type": "string"}}, "request": {"$ref": "Activity"}, "rpcMethod": "chili.activities.patch", "httpMethod": "PATCH", "response": {"$ref": "Activity"}, "restPath": "activities/{userId}/{scope}/{postId}"}, "extractPeopleFromSearch": {"scopes": ["https://www.googleapis.com/auth/buzz", "https://www.googleapis.com/auth/buzz.readonly"], "parameters": {"max-results": {"default": "20", "maximum": "4294967295", "minimum": "0", "restParameterType": "query", "type": "integer"}, "c": {"restParameterType": "query", "type": "string"}, "pid": {"restParameterType": "query", "type": "string"}, "lon": {"restParameterType": "query", "type": "string"}, "q": {"restParameterType": "query", "type": "string"}, "radius": {"restParameterType": "query", "type": "string"}, "bbox": {"restParameterType": "query", "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}, "lat": {"restParameterType": "query", "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.activities.extractPeopleFromSearch", "httpMethod": "GET", "response": {"$ref": "PeopleFeed"}, "restPath": "activities/search/@people"}, "delete": {"scopes": ["https://www.googleapis.com/auth/buzz"], "parameters": {"scope": {"required": true, "enum": ["@liked", "@muted", "@self"], "restParameterType": "path", "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "postId": {"restParameterType": "path", "required": true, "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.activities.delete", "httpMethod": "DELETE", "restPath": "activities/{userId}/{scope}/{postId}"}}}', true));
     $this->people = new PeopleServiceResource($this, $this->serviceName, 'people', json_decode('{"methods": {"search": {"scopes": ["https://www.googleapis.com/auth/buzz", "https://www.googleapis.com/auth/buzz.readonly"], "parameters": {"max-results": {"default": "20", "maximum": "4294967295", "minimum": "0", "restParameterType": "query", "type": "integer"}, "q": {"restParameterType": "query", "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "c": {"restParameterType": "query", "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.people.search", "httpMethod": "GET", "response": {"$ref": "PeopleFeed"}, "restPath": "people/search"}, "get": {"scopes": ["https://www.googleapis.com/auth/buzz", "https://www.googleapis.com/auth/buzz.readonly"], "parameters": {"alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.people.get", "httpMethod": "GET", "response": {"$ref": "Person"}, "restPath": "people/{userId}/@self"}, "update": {"scopes": ["https://www.googleapis.com/auth/buzz"], "parameters": {"personId": {"restParameterType": "path", "required": true, "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "groupId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "request": {"$ref": "Person"}, "rpcMethod": "chili.people.update", "httpMethod": "PUT", "response": {"$ref": "Person"}, "restPath": "people/{userId}/@groups/{groupId}/{personId}"}, "list": {"scopes": ["https://www.googleapis.com/auth/buzz", "https://www.googleapis.com/auth/buzz.readonly"], "parameters": {"max-results": {"default": "20", "maximum": "4294967295", "minimum": "0", "restParameterType": "query", "type": "integer"}, "c": {"restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "groupId": {"restParameterType": "path", "required": true, "type": "string"}}, "rpcMethod": "chili.people.list", "httpMethod": "GET", "response": {"$ref": "PeopleFeed"}, "restPath": "people/{userId}/@groups/{groupId}"}, "liked": {"scopes": ["https://www.googleapis.com/auth/buzz", "https://www.googleapis.com/auth/buzz.readonly"], "parameters": {"max-results": {"default": "20", "maximum": "4294967295", "minimum": "0", "restParameterType": "query", "type": "integer"}, "c": {"restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}, "scope": {"restParameterType": "path", "required": true, "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "postId": {"restParameterType": "path", "required": true, "type": "string"}, "groupId": {"restParameterType": "path", "required": true, "type": "string", "enum": ["@liked"]}}, "rpcMethod": "chili.people.liked", "httpMethod": "GET", "response": {"$ref": "PeopleFeed"}, "restPath": "activities/{userId}/{scope}/{postId}/{groupId}"}, "patch": {"scopes": ["https://www.googleapis.com/auth/buzz"], "parameters": {"personId": {"restParameterType": "path", "required": true, "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "groupId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "request": {"$ref": "Person"}, "rpcMethod": "chili.people.patch", "httpMethod": "PATCH", "response": {"$ref": "Person"}, "restPath": "people/{userId}/@groups/{groupId}/{personId}"}, "reshared": {"scopes": ["https://www.googleapis.com/auth/buzz", "https://www.googleapis.com/auth/buzz.readonly"], "parameters": {"max-results": {"default": "20", "maximum": "4294967295", "minimum": "0", "restParameterType": "query", "type": "integer"}, "c": {"restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}, "scope": {"restParameterType": "path", "required": true, "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "postId": {"restParameterType": "path", "required": true, "type": "string"}, "groupId": {"restParameterType": "path", "required": true, "type": "string", "enum": ["@reshared"]}}, "rpcMethod": "chili.people.reshared", "httpMethod": "GET", "response": {"$ref": "PeopleFeed"}, "restPath": "activities/{userId}/{scope}/{postId}/{groupId}"}, "delete": {"scopes": ["https://www.googleapis.com/auth/buzz"], "parameters": {"personId": {"restParameterType": "path", "required": true, "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "groupId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.people.delete", "httpMethod": "DELETE", "restPath": "people/{userId}/@groups/{groupId}/{personId}"}}}', true));
     $this->photoAlbums = new PhotoAlbumsServiceResource($this, $this->serviceName, 'photoAlbums', json_decode('{"methods": {"insert": {"scopes": ["https://www.googleapis.com/auth/picasa"], "parameters": {"alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "request": {"$ref": "Album"}, "rpcMethod": "chili.photoAlbums.insert", "httpMethod": "POST", "response": {"$ref": "Album"}, "restPath": "photos/{userId}/@self"}, "delete": {"scopes": ["https://www.googleapis.com/auth/picasa"], "parameters": {"albumId": {"restParameterType": "path", "required": true, "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.photoAlbums.delete", "httpMethod": "DELETE", "restPath": "photos/{userId}/@self/{albumId}"}, "list": {"scopes": ["https://www.googleapis.com/auth/picasa"], "parameters": {"max-results": {"default": "20", "maximum": "4294967295", "minimum": "0", "restParameterType": "query", "type": "integer"}, "c": {"restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}, "scope": {"required": true, "enum": ["@self"], "restParameterType": "path", "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.photoAlbums.list", "httpMethod": "GET", "response": {"$ref": "AlbumsFeed"}, "restPath": "photos/{userId}/{scope}"}, "get": {"scopes": ["https://www.googleapis.com/auth/picasa"], "parameters": {"albumId": {"restParameterType": "path", "required": true, "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.photoAlbums.get", "httpMethod": "GET", "response": {"$ref": "Album"}, "restPath": "photos/{userId}/@self/{albumId}"}}}', true));
     $this->comments = new CommentsServiceResource($this, $this->serviceName, 'comments', json_decode('{"methods": {"insert": {"scopes": ["https://www.googleapis.com/auth/buzz"], "parameters": {"alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "postId": {"restParameterType": "path", "required": true, "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "request": {"$ref": "Comment"}, "rpcMethod": "chili.comments.insert", "httpMethod": "POST", "response": {"$ref": "Comment"}, "restPath": "activities/{userId}/@self/{postId}/@comments"}, "get": {"scopes": ["https://www.googleapis.com/auth/buzz", "https://www.googleapis.com/auth/buzz.readonly"], "parameters": {"commentId": {"restParameterType": "path", "required": true, "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "postId": {"restParameterType": "path", "required": true, "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.comments.get", "httpMethod": "GET", "response": {"$ref": "Comment"}, "restPath": "activities/{userId}/@self/{postId}/@comments/{commentId}"}, "list": {"scopes": ["https://www.googleapis.com/auth/buzz", "https://www.googleapis.com/auth/buzz.readonly"], "parameters": {"max-results": {"default": "20", "maximum": "4294967295", "minimum": "0", "restParameterType": "query", "type": "integer"}, "c": {"restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}, "scope": {"required": true, "enum": ["@self"], "restParameterType": "path", "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "postId": {"restParameterType": "path", "required": true, "type": "string"}}, "rpcMethod": "chili.comments.list", "httpMethod": "GET", "response": {"$ref": "CommentFeed"}, "restPath": "activities/{userId}/{scope}/{postId}/@comments"}, "update": {"scopes": ["https://www.googleapis.com/auth/buzz"], "parameters": {"userId": {"restParameterType": "path", "required": true, "type": "string"}, "abuseType": {"restParameterType": "query", "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}, "commentId": {"restParameterType": "path", "required": true, "type": "string"}, "scope": {"required": true, "enum": ["@abuse", "@self"], "restParameterType": "path", "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "postId": {"restParameterType": "path", "required": true, "type": "string"}}, "request": {"$ref": "Comment"}, "rpcMethod": "chili.comments.update", "httpMethod": "PUT", "response": {"$ref": "Comment"}, "restPath": "activities/{userId}/{scope}/{postId}/@comments/{commentId}"}, "patch": {"scopes": ["https://www.googleapis.com/auth/buzz"], "parameters": {"userId": {"restParameterType": "path", "required": true, "type": "string"}, "abuseType": {"restParameterType": "query", "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}, "commentId": {"restParameterType": "path", "required": true, "type": "string"}, "scope": {"required": true, "enum": ["@abuse", "@self"], "restParameterType": "path", "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "postId": {"restParameterType": "path", "required": true, "type": "string"}}, "request": {"$ref": "Comment"}, "rpcMethod": "chili.comments.patch", "httpMethod": "PATCH", "response": {"$ref": "Comment"}, "restPath": "activities/{userId}/{scope}/{postId}/@comments/{commentId}"}, "delete": {"scopes": ["https://www.googleapis.com/auth/buzz"], "parameters": {"commentId": {"restParameterType": "path", "required": true, "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "postId": {"restParameterType": "path", "required": true, "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.comments.delete", "httpMethod": "DELETE", "restPath": "activities/{userId}/@self/{postId}/@comments/{commentId}"}}}', true));
     $this->photos = new PhotosServiceResource($this, $this->serviceName, 'photos', json_decode('{"methods": {"insert2": {"scopes": ["https://www.googleapis.com/auth/picasa"], "parameters": {"albumId": {"restParameterType": "path", "required": true, "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "request": {"$ref": "ChiliPhotosResourceJson"}, "rpcMethod": "chili.photos.insert2", "httpMethod": "POST", "response": {"$ref": "ChiliPhotosResourceJson"}, "restPath": "photos/{userId}/@self/{albumId}/@photos"}, "insert": {"scopes": ["https://www.googleapis.com/auth/buzz"], "parameters": {"albumId": {"restParameterType": "path", "required": true, "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "request": {"$ref": "AlbumLite"}, "rpcMethod": "chili.photos.insert", "httpMethod": "POST", "response": {"$ref": "AlbumLite"}, "restPath": "photos/{userId}/{albumId}"}, "get": {"scopes": ["https://www.googleapis.com/auth/picasa"], "parameters": {"albumId": {"restParameterType": "path", "required": true, "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "photoId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}}, "rpcMethod": "chili.photos.get", "httpMethod": "GET", "response": {"$ref": "ChiliPhotosResourceJson"}, "restPath": "photos/{userId}/@self/{albumId}/@photos/{photoId}"}, "listByScope": {"scopes": ["https://www.googleapis.com/auth/picasa"], "parameters": {"max-results": {"default": "20", "maximum": "4294967295", "minimum": "0", "restParameterType": "query", "type": "integer"}, "c": {"restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}, "scope": {"required": true, "enum": ["@recent"], "restParameterType": "path", "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.photos.listByScope", "httpMethod": "GET", "response": {"$ref": "PhotosFeed"}, "restPath": "photos/{userId}/@self/{scope}/@photos"}, "listByAlbum": {"scopes": ["https://www.googleapis.com/auth/picasa"], "parameters": {"max-results": {"default": "20", "maximum": "4294967295", "minimum": "0", "restParameterType": "query", "type": "integer"}, "c": {"restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "albumId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.photos.listByAlbum", "httpMethod": "GET", "response": {"$ref": "PhotosFeed"}, "restPath": "photos/{userId}/@self/{albumId}/@photos"}, "delete": {"scopes": ["https://www.googleapis.com/auth/picasa"], "parameters": {"albumId": {"restParameterType": "path", "required": true, "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "photoId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}}, "rpcMethod": "chili.photos.delete", "httpMethod": "DELETE", "restPath": "photos/{userId}/@self/{albumId}/@photos/{photoId}"}}}', true));
     $this->related = new RelatedServiceResource($this, $this->serviceName, 'related', json_decode('{"methods": {"list": {"scopes": ["https://www.googleapis.com/auth/buzz", "https://www.googleapis.com/auth/buzz.readonly"], "parameters": {"scope": {"required": true, "enum": ["@self"], "restParameterType": "path", "type": "string"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "postId": {"restParameterType": "path", "required": true, "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.related.list", "httpMethod": "GET", "response": {"$ref": "RelatedFeed"}, "restPath": "activities/{userId}/{scope}/{postId}/@related"}}}', true));
     $this->groups = new GroupsServiceResource($this, $this->serviceName, 'groups', json_decode('{"methods": {"insert": {"scopes": ["https://www.googleapis.com/auth/buzz"], "parameters": {"alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "request": {"$ref": "Group"}, "rpcMethod": "chili.groups.insert", "httpMethod": "POST", "response": {"$ref": "Group"}, "restPath": "people/{userId}/@groups"}, "get": {"scopes": ["https://www.googleapis.com/auth/buzz", "https://www.googleapis.com/auth/buzz.readonly"], "parameters": {"alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "groupId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.groups.get", "httpMethod": "GET", "response": {"$ref": "Group"}, "restPath": "people/{userId}/@groups/{groupId}/@self"}, "list": {"scopes": ["https://www.googleapis.com/auth/buzz", "https://www.googleapis.com/auth/buzz.readonly"], "parameters": {"max-results": {"default": "20", "maximum": "4294967295", "minimum": "0", "restParameterType": "query", "type": "integer"}, "alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "c": {"restParameterType": "query", "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.groups.list", "httpMethod": "GET", "response": {"$ref": "GroupFeed"}, "restPath": "people/{userId}/@groups"}, "update": {"scopes": ["https://www.googleapis.com/auth/buzz"], "parameters": {"alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "groupId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "request": {"$ref": "Group"}, "rpcMethod": "chili.groups.update", "httpMethod": "PUT", "response": {"$ref": "Group"}, "restPath": "people/{userId}/@groups/{groupId}/@self"}, "patch": {"scopes": ["https://www.googleapis.com/auth/buzz"], "parameters": {"alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "groupId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "request": {"$ref": "Group"}, "rpcMethod": "chili.groups.patch", "httpMethod": "PATCH", "response": {"$ref": "Group"}, "restPath": "people/{userId}/@groups/{groupId}/@self"}, "delete": {"scopes": ["https://www.googleapis.com/auth/buzz"], "parameters": {"alt": {"default": "atom", "enum": ["atom", "json"], "restParameterType": "query", "type": "string"}, "userId": {"restParameterType": "path", "required": true, "type": "string"}, "groupId": {"restParameterType": "path", "required": true, "type": "string"}, "hl": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "chili.groups.delete", "httpMethod": "DELETE", "restPath": "people/{userId}/@groups/{groupId}"}}}', true));
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

class Album {

  public $kind;
  public $description;
  public $links;
  public $created;
  public $lastModified;
  public $tags;
  public $version;
  public $firstPhotoId;
  public $owner;
  public $title;
  public $id;

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
  
  public function setLinks( AlbumLinks $links) {
    $this->links = $links;
  }

  public function getLinks() {
    return $this->links;
  }
  
  public function setCreated($created) {
    $this->created = $created;
  }

  public function getCreated() {
    return $this->created;
  }
  
  public function setLastModified($lastModified) {
    $this->lastModified = $lastModified;
  }

  public function getLastModified() {
    return $this->lastModified;
  }
  
  public function setTags($tags) {
    $this->tags = $tags;
  }

  public function getTags() {
    return $this->tags;
  }
  
  public function setVersion($version) {
    $this->version = $version;
  }

  public function getVersion() {
    return $this->version;
  }
  
  public function setFirstPhotoId($firstPhotoId) {
    $this->firstPhotoId = $firstPhotoId;
  }

  public function getFirstPhotoId() {
    return $this->firstPhotoId;
  }
  
  public function setOwner( AlbumOwner $owner) {
    $this->owner = $owner;
  }

  public function getOwner() {
    return $this->owner;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
}


class PersonAccounts {

  public $username;
  public $domain;
  public $userid;

  public function setUsername($username) {
    $this->username = $username;
  }

  public function getUsername() {
    return $this->username;
  }
  
  public function setDomain($domain) {
    $this->domain = $domain;
  }

  public function getDomain() {
    return $this->domain;
  }
  
  public function setUserid($userid) {
    $this->userid = $userid;
  }

  public function getUserid() {
    return $this->userid;
  }
  
}


class ActivityFeed {

  public $kind;
  public $links;
  public $title;
  public $items;
  public $updated;
  public $id;

  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setLinks( ActivityFeedLinks $links) {
    $this->links = $links;
  }

  public function getLinks() {
    return $this->links;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
  public function setItems( Activity $items) {
    $this->items = $items;
  }

  public function getItems() {
    return $this->items;
  }
  
  public function setUpdated($updated) {
    $this->updated = $updated;
  }

  public function getUpdated() {
    return $this->updated;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
}


class Group {

  public $memberCount;
  public $kind;
  public $id;
  public $links;
  public $title;

  public function setMemberCount($memberCount) {
    $this->memberCount = $memberCount;
  }

  public function getMemberCount() {
    return $this->memberCount;
  }
  
  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setLinks( GroupLinks $links) {
    $this->links = $links;
  }

  public function getLinks() {
    return $this->links;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
}


class RelatedFeed {

  public $kind;
  public $links;
  public $title;
  public $items;
  public $updated;
  public $id;

  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setLinks( RelatedFeedLinks $links) {
    $this->links = $links;
  }

  public function getLinks() {
    return $this->links;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
  public function setItems( Related $items) {
    $this->items = $items;
  }

  public function getItems() {
    return $this->items;
  }
  
  public function setUpdated($updated) {
    $this->updated = $updated;
  }

  public function getUpdated() {
    return $this->updated;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
}


class AlbumsFeed {

  public $items;
  public $kind;

  public function setItems( Album $items) {
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


class CommentLinksInReplyTo {

  public $source;
  public $href;
  public $ref;

  public function setSource($source) {
    $this->source = $source;
  }

  public function getSource() {
    return $this->source;
  }
  
  public function setHref($href) {
    $this->href = $href;
  }

  public function getHref() {
    return $this->href;
  }
  
  public function setRef($ref) {
    $this->ref = $ref;
  }

  public function getRef() {
    return $this->ref;
  }
  
}


class PersonOrganizations {

  public $startDate;
  public $endDate;
  public $description;
  public $title;
  public $primary;
  public $location;
  public $department;
  public $type;
  public $name;

  public function setStartDate($startDate) {
    $this->startDate = $startDate;
  }

  public function getStartDate() {
    return $this->startDate;
  }
  
  public function setEndDate($endDate) {
    $this->endDate = $endDate;
  }

  public function getEndDate() {
    return $this->endDate;
  }
  
  public function setDescription($description) {
    $this->description = $description;
  }

  public function getDescription() {
    return $this->description;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
  public function setPrimary($primary) {
    $this->primary = $primary;
  }

  public function getPrimary() {
    return $this->primary;
  }
  
  public function setLocation($location) {
    $this->location = $location;
  }

  public function getLocation() {
    return $this->location;
  }
  
  public function setDepartment($department) {
    $this->department = $department;
  }

  public function getDepartment() {
    return $this->department;
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


class ActivitySource {

  public $title;

  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
}


class PhotosFeed {

  public $items;
  public $kind;

  public function setItems( ChiliPhotosResourceJson $items) {
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


class PeopleFeed {

  public $totalResults;
  public $entry;
  public $kind;
  public $itemsPerPage;
  public $startIndex;

  public function setTotalResults($totalResults) {
    $this->totalResults = $totalResults;
  }

  public function getTotalResults() {
    return $this->totalResults;
  }
  
  public function setEntry( Person $entry) {
    $this->entry = $entry;
  }

  public function getEntry() {
    return $this->entry;
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
  
  public function setStartIndex($startIndex) {
    $this->startIndex = $startIndex;
  }

  public function getStartIndex() {
    return $this->startIndex;
  }
  
}


class ActivityObjectActor {

  public $profileUrl;
  public $thumbnailUrl;
  public $id;
  public $name;

  public function setProfileUrl($profileUrl) {
    $this->profileUrl = $profileUrl;
  }

  public function getProfileUrl() {
    return $this->profileUrl;
  }
  
  public function setThumbnailUrl($thumbnailUrl) {
    $this->thumbnailUrl = $thumbnailUrl;
  }

  public function getThumbnailUrl() {
    return $this->thumbnailUrl;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }
  
}


class ActivityCategories {

  public $term;
  public $schema;
  public $label;

  public function setTerm($term) {
    $this->term = $term;
  }

  public function getTerm() {
    return $this->term;
  }
  
  public function setSchema($schema) {
    $this->schema = $schema;
  }

  public function getSchema() {
    return $this->schema;
  }
  
  public function setLabel($label) {
    $this->label = $label;
  }

  public function getLabel() {
    return $this->label;
  }
  
}


class ChiliPhotosResourceJsonOwner {

  public $profileUrl;
  public $thumbnailUrl;
  public $id;
  public $name;

  public function setProfileUrl($profileUrl) {
    $this->profileUrl = $profileUrl;
  }

  public function getProfileUrl() {
    return $this->profileUrl;
  }
  
  public function setThumbnailUrl($thumbnailUrl) {
    $this->thumbnailUrl = $thumbnailUrl;
  }

  public function getThumbnailUrl() {
    return $this->thumbnailUrl;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }
  
}


class ActivityLinksLiked {

  public $count;
  public $href;
  public $type;

  public function setCount($count) {
    $this->count = $count;
  }

  public function getCount() {
    return $this->count;
  }
  
  public function setHref($href) {
    $this->href = $href;
  }

  public function getHref() {
    return $this->href;
  }
  
  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }
  
}


class ActivityVisibilityEntries {

  public $id;
  public $title;

  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
}


class CommentActor {

  public $profileUrl;
  public $thumbnailUrl;
  public $id;
  public $name;

  public function setProfileUrl($profileUrl) {
    $this->profileUrl = $profileUrl;
  }

  public function getProfileUrl() {
    return $this->profileUrl;
  }
  
  public function setThumbnailUrl($thumbnailUrl) {
    $this->thumbnailUrl = $thumbnailUrl;
  }

  public function getThumbnailUrl() {
    return $this->thumbnailUrl;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }
  
}


class AlbumLiteCollectionPhoto {

  public $photoUrl;

  public function setPhotoUrl($photoUrl) {
    $this->photoUrl = $photoUrl;
  }

  public function getPhotoUrl() {
    return $this->photoUrl;
  }
  
}


class CommentFeedLinks {


}


class PersonUrls {

  public $type;
  public $primary;
  public $value;

  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }
  
  public function setPrimary($primary) {
    $this->primary = $primary;
  }

  public function getPrimary() {
    return $this->primary;
  }
  
  public function setValue($value) {
    $this->value = $value;
  }

  public function getValue() {
    return $this->value;
  }
  
}


class PersonPhotos {

  public $width;
  public $type;
  public $primary;
  public $value;
  public $height;

  public function setWidth($width) {
    $this->width = $width;
  }

  public function getWidth() {
    return $this->width;
  }
  
  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }
  
  public function setPrimary($primary) {
    $this->primary = $primary;
  }

  public function getPrimary() {
    return $this->primary;
  }
  
  public function setValue($value) {
    $this->value = $value;
  }

  public function getValue() {
    return $this->value;
  }
  
  public function setHeight($height) {
    $this->height = $height;
  }

  public function getHeight() {
    return $this->height;
  }
  
}


class ChiliPhotosResourceJson {

  public $album;
  public $kind;
  public $description;
  public $links;
  public $created;
  public $lastModified;
  public $title;
  public $version;
  public $video;
  public $fileSize;
  public $timestamp;
  public $owner;
  public $id;

  public function setAlbum( ChiliPhotosResourceJsonAlbum $album) {
    $this->album = $album;
  }

  public function getAlbum() {
    return $this->album;
  }
  
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
  
  public function setLinks( ChiliPhotosResourceJsonLinks $links) {
    $this->links = $links;
  }

  public function getLinks() {
    return $this->links;
  }
  
  public function setCreated($created) {
    $this->created = $created;
  }

  public function getCreated() {
    return $this->created;
  }
  
  public function setLastModified($lastModified) {
    $this->lastModified = $lastModified;
  }

  public function getLastModified() {
    return $this->lastModified;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
  public function setVersion($version) {
    $this->version = $version;
  }

  public function getVersion() {
    return $this->version;
  }
  
  public function setVideo( Video $video) {
    $this->video = $video;
  }

  public function getVideo() {
    return $this->video;
  }
  
  public function setFileSize($fileSize) {
    $this->fileSize = $fileSize;
  }

  public function getFileSize() {
    return $this->fileSize;
  }
  
  public function setTimestamp($timestamp) {
    $this->timestamp = $timestamp;
  }

  public function getTimestamp() {
    return $this->timestamp;
  }
  
  public function setOwner( ChiliPhotosResourceJsonOwner $owner) {
    $this->owner = $owner;
  }

  public function getOwner() {
    return $this->owner;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
}


class GroupFeedLinks {


}


class PersonEmails {

  public $type;
  public $primary;
  public $value;

  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }
  
  public function setPrimary($primary) {
    $this->primary = $primary;
  }

  public function getPrimary() {
    return $this->primary;
  }
  
  public function setValue($value) {
    $this->value = $value;
  }

  public function getValue() {
    return $this->value;
  }
  
}


class AlbumOwner {

  public $profileUrl;
  public $thumbnailUrl;
  public $id;
  public $name;

  public function setProfileUrl($profileUrl) {
    $this->profileUrl = $profileUrl;
  }

  public function getProfileUrl() {
    return $this->profileUrl;
  }
  
  public function setThumbnailUrl($thumbnailUrl) {
    $this->thumbnailUrl = $thumbnailUrl;
  }

  public function getThumbnailUrl() {
    return $this->thumbnailUrl;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }
  
}


class ActivityObjectAttachmentsLinks {


}


class Link {

  public $count;
  public $updated;
  public $title;
  public $height;
  public $width;
  public $href;
  public $type;

  public function setCount($count) {
    $this->count = $count;
  }

  public function getCount() {
    return $this->count;
  }
  
  public function setUpdated($updated) {
    $this->updated = $updated;
  }

  public function getUpdated() {
    return $this->updated;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
  public function setHeight($height) {
    $this->height = $height;
  }

  public function getHeight() {
    return $this->height;
  }
  
  public function setWidth($width) {
    $this->width = $width;
  }

  public function getWidth() {
    return $this->width;
  }
  
  public function setHref($href) {
    $this->href = $href;
  }

  public function getHref() {
    return $this->href;
  }
  
  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }
  
}


class ActivityLinks {

  public $liked;

  public function setLiked( ActivityLinksLiked $liked) {
    $this->liked = $liked;
  }

  public function getLiked() {
    return $this->liked;
  }
  
}


class ActivityObjectAttachments {

  public $content;
  public $type;
  public $id;
  public $links;
  public $title;

  public function setContent($content) {
    $this->content = $content;
  }

  public function getContent() {
    return $this->content;
  }
  
  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setLinks( ActivityObjectAttachmentsLinks $links) {
    $this->links = $links;
  }

  public function getLinks() {
    return $this->links;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
}


class AlbumLiteCollection {

  public $album;
  public $albumId;
  public $photo;

  public function setAlbum($album) {
    $this->album = $album;
  }

  public function getAlbum() {
    return $this->album;
  }
  
  public function setAlbumId($albumId) {
    $this->albumId = $albumId;
  }

  public function getAlbumId() {
    return $this->albumId;
  }
  
  public function setPhoto( AlbumLiteCollectionPhoto $photo) {
    $this->photo = $photo;
  }

  public function getPhoto() {
    return $this->photo;
  }
  
}


class CommentLinks {

  public $inReplyTo;

  public function setInReplyTo( CommentLinksInReplyTo $inReplyTo) {
    $this->inReplyTo = $inReplyTo;
  }

  public function getInReplyTo() {
    return $this->inReplyTo;
  }
  
}


class ChiliPhotosResourceJsonLinks {

  public $alternate;

  public function setAlternate( Link $alternate) {
    $this->alternate = $alternate;
  }

  public function getAlternate() {
    return $this->alternate;
  }
  
}


class AlbumLite {

  public $kind;
  public $collection;

  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setCollection( AlbumLiteCollection $collection) {
    $this->collection = $collection;
  }

  public function getCollection() {
    return $this->collection;
  }
  
}


class Person {

  public $status;
  public $phoneNumbers;
  public $fashion;
  public $addresses;
  public $romance;
  public $turnOffs;
  public $preferredUsername;
  public $quotes;
  public $books;
  public $accounts;
  public $turnOns;
  public $hasApp;
  public $drinker;
  public $sports;
  public $languagesSpoken;
  public $children;
  public $ethnicity;
  public $relationships;
  public $note;
  public $thumbnailUrl;
  public $humor;
  public $id;
  public $tags;
  public $anniversary;
  public $happiestWhen;
  public $currentLocation;
  public $languages;
  public $religion;
  public $ims;
  public $music;
  public $pets;
  public $interests;
  public $activities;
  public $updated;
  public $bodyType;
  public $relationshipStatus;
  public $sexualOrientation;
  public $food;
  public $cars;
  public $aboutMe;
  public $kind;
  public $photos;
  public $birthday;
  public $connected;
  public $profileVideo;
  public $heroes;
  public $nickname;
  public $emails;
  public $organizations;
  public $jobInterests;
  public $displayName;
  public $name;
  public $politicalViews;
  public $tvShows;
  public $gender;
  public $profileSong;
  public $smoker;
  public $scaredOf;
  public $profileUrl;
  public $movies;
  public $utcOffset;
  public $urls;
  public $published;
  public $livingArrangement;
  public $lookingFor;

  public function setStatus($status) {
    $this->status = $status;
  }

  public function getStatus() {
    return $this->status;
  }
  
  public function setPhoneNumbers( PersonPhoneNumbers $phoneNumbers) {
    $this->phoneNumbers = $phoneNumbers;
  }

  public function getPhoneNumbers() {
    return $this->phoneNumbers;
  }
  
  public function setFashion($fashion) {
    $this->fashion = $fashion;
  }

  public function getFashion() {
    return $this->fashion;
  }
  
  public function setAddresses( PersonAddresses $addresses) {
    $this->addresses = $addresses;
  }

  public function getAddresses() {
    return $this->addresses;
  }
  
  public function setRomance($romance) {
    $this->romance = $romance;
  }

  public function getRomance() {
    return $this->romance;
  }
  
  public function setTurnOffs($turnOffs) {
    $this->turnOffs = $turnOffs;
  }

  public function getTurnOffs() {
    return $this->turnOffs;
  }
  
  public function setPreferredUsername($preferredUsername) {
    $this->preferredUsername = $preferredUsername;
  }

  public function getPreferredUsername() {
    return $this->preferredUsername;
  }
  
  public function setQuotes($quotes) {
    $this->quotes = $quotes;
  }

  public function getQuotes() {
    return $this->quotes;
  }
  
  public function setBooks($books) {
    $this->books = $books;
  }

  public function getBooks() {
    return $this->books;
  }
  
  public function setAccounts( PersonAccounts $accounts) {
    $this->accounts = $accounts;
  }

  public function getAccounts() {
    return $this->accounts;
  }
  
  public function setTurnOns($turnOns) {
    $this->turnOns = $turnOns;
  }

  public function getTurnOns() {
    return $this->turnOns;
  }
  
  public function setHasApp($hasApp) {
    $this->hasApp = $hasApp;
  }

  public function getHasApp() {
    return $this->hasApp;
  }
  
  public function setDrinker($drinker) {
    $this->drinker = $drinker;
  }

  public function getDrinker() {
    return $this->drinker;
  }
  
  public function setSports($sports) {
    $this->sports = $sports;
  }

  public function getSports() {
    return $this->sports;
  }
  
  public function setLanguagesSpoken($languagesSpoken) {
    $this->languagesSpoken = $languagesSpoken;
  }

  public function getLanguagesSpoken() {
    return $this->languagesSpoken;
  }
  
  public function setChildren($children) {
    $this->children = $children;
  }

  public function getChildren() {
    return $this->children;
  }
  
  public function setEthnicity($ethnicity) {
    $this->ethnicity = $ethnicity;
  }

  public function getEthnicity() {
    return $this->ethnicity;
  }
  
  public function setRelationships($relationships) {
    $this->relationships = $relationships;
  }

  public function getRelationships() {
    return $this->relationships;
  }
  
  public function setNote($note) {
    $this->note = $note;
  }

  public function getNote() {
    return $this->note;
  }
  
  public function setThumbnailUrl($thumbnailUrl) {
    $this->thumbnailUrl = $thumbnailUrl;
  }

  public function getThumbnailUrl() {
    return $this->thumbnailUrl;
  }
  
  public function setHumor($humor) {
    $this->humor = $humor;
  }

  public function getHumor() {
    return $this->humor;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setTags($tags) {
    $this->tags = $tags;
  }

  public function getTags() {
    return $this->tags;
  }
  
  public function setAnniversary($anniversary) {
    $this->anniversary = $anniversary;
  }

  public function getAnniversary() {
    return $this->anniversary;
  }
  
  public function setHappiestWhen($happiestWhen) {
    $this->happiestWhen = $happiestWhen;
  }

  public function getHappiestWhen() {
    return $this->happiestWhen;
  }
  
  public function setCurrentLocation($currentLocation) {
    $this->currentLocation = $currentLocation;
  }

  public function getCurrentLocation() {
    return $this->currentLocation;
  }
  
  public function setLanguages($languages) {
    $this->languages = $languages;
  }

  public function getLanguages() {
    return $this->languages;
  }
  
  public function setReligion($religion) {
    $this->religion = $religion;
  }

  public function getReligion() {
    return $this->religion;
  }
  
  public function setIms( PersonIms $ims) {
    $this->ims = $ims;
  }

  public function getIms() {
    return $this->ims;
  }
  
  public function setMusic($music) {
    $this->music = $music;
  }

  public function getMusic() {
    return $this->music;
  }
  
  public function setPets($pets) {
    $this->pets = $pets;
  }

  public function getPets() {
    return $this->pets;
  }
  
  public function setInterests($interests) {
    $this->interests = $interests;
  }

  public function getInterests() {
    return $this->interests;
  }
  
  public function setActivities($activities) {
    $this->activities = $activities;
  }

  public function getActivities() {
    return $this->activities;
  }
  
  public function setUpdated($updated) {
    $this->updated = $updated;
  }

  public function getUpdated() {
    return $this->updated;
  }
  
  public function setBodyType($bodyType) {
    $this->bodyType = $bodyType;
  }

  public function getBodyType() {
    return $this->bodyType;
  }
  
  public function setRelationshipStatus($relationshipStatus) {
    $this->relationshipStatus = $relationshipStatus;
  }

  public function getRelationshipStatus() {
    return $this->relationshipStatus;
  }
  
  public function setSexualOrientation($sexualOrientation) {
    $this->sexualOrientation = $sexualOrientation;
  }

  public function getSexualOrientation() {
    return $this->sexualOrientation;
  }
  
  public function setFood($food) {
    $this->food = $food;
  }

  public function getFood() {
    return $this->food;
  }
  
  public function setCars($cars) {
    $this->cars = $cars;
  }

  public function getCars() {
    return $this->cars;
  }
  
  public function setAboutMe($aboutMe) {
    $this->aboutMe = $aboutMe;
  }

  public function getAboutMe() {
    return $this->aboutMe;
  }
  
  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setPhotos( PersonPhotos $photos) {
    $this->photos = $photos;
  }

  public function getPhotos() {
    return $this->photos;
  }
  
  public function setBirthday($birthday) {
    $this->birthday = $birthday;
  }

  public function getBirthday() {
    return $this->birthday;
  }
  
  public function setConnected($connected) {
    $this->connected = $connected;
  }

  public function getConnected() {
    return $this->connected;
  }
  
  public function setProfileVideo($profileVideo) {
    $this->profileVideo = $profileVideo;
  }

  public function getProfileVideo() {
    return $this->profileVideo;
  }
  
  public function setHeroes($heroes) {
    $this->heroes = $heroes;
  }

  public function getHeroes() {
    return $this->heroes;
  }
  
  public function setNickname($nickname) {
    $this->nickname = $nickname;
  }

  public function getNickname() {
    return $this->nickname;
  }
  
  public function setEmails( PersonEmails $emails) {
    $this->emails = $emails;
  }

  public function getEmails() {
    return $this->emails;
  }
  
  public function setOrganizations( PersonOrganizations $organizations) {
    $this->organizations = $organizations;
  }

  public function getOrganizations() {
    return $this->organizations;
  }
  
  public function setJobInterests($jobInterests) {
    $this->jobInterests = $jobInterests;
  }

  public function getJobInterests() {
    return $this->jobInterests;
  }
  
  public function setDisplayName($displayName) {
    $this->displayName = $displayName;
  }

  public function getDisplayName() {
    return $this->displayName;
  }
  
  public function setName( PersonName $name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }
  
  public function setPoliticalViews($politicalViews) {
    $this->politicalViews = $politicalViews;
  }

  public function getPoliticalViews() {
    return $this->politicalViews;
  }
  
  public function setTvShows($tvShows) {
    $this->tvShows = $tvShows;
  }

  public function getTvShows() {
    return $this->tvShows;
  }
  
  public function setGender($gender) {
    $this->gender = $gender;
  }

  public function getGender() {
    return $this->gender;
  }
  
  public function setProfileSong($profileSong) {
    $this->profileSong = $profileSong;
  }

  public function getProfileSong() {
    return $this->profileSong;
  }
  
  public function setSmoker($smoker) {
    $this->smoker = $smoker;
  }

  public function getSmoker() {
    return $this->smoker;
  }
  
  public function setScaredOf($scaredOf) {
    $this->scaredOf = $scaredOf;
  }

  public function getScaredOf() {
    return $this->scaredOf;
  }
  
  public function setProfileUrl($profileUrl) {
    $this->profileUrl = $profileUrl;
  }

  public function getProfileUrl() {
    return $this->profileUrl;
  }
  
  public function setMovies($movies) {
    $this->movies = $movies;
  }

  public function getMovies() {
    return $this->movies;
  }
  
  public function setUtcOffset($utcOffset) {
    $this->utcOffset = $utcOffset;
  }

  public function getUtcOffset() {
    return $this->utcOffset;
  }
  
  public function setUrls( PersonUrls $urls) {
    $this->urls = $urls;
  }

  public function getUrls() {
    return $this->urls;
  }
  
  public function setPublished($published) {
    $this->published = $published;
  }

  public function getPublished() {
    return $this->published;
  }
  
  public function setLivingArrangement($livingArrangement) {
    $this->livingArrangement = $livingArrangement;
  }

  public function getLivingArrangement() {
    return $this->livingArrangement;
  }
  
  public function setLookingFor($lookingFor) {
    $this->lookingFor = $lookingFor;
  }

  public function getLookingFor() {
    return $this->lookingFor;
  }
  
}


class ActivityFeedLinks {


}


class GroupLinksSelf {

  public $href;
  public $type;

  public function setHref($href) {
    $this->href = $href;
  }

  public function getHref() {
    return $this->href;
  }
  
  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }
  
}


class CountFeedCounts {


}


class Activity {

  public $untranslatedTitle;
  public $links;
  public $radius;
  public $id;
  public $title;
  public $geocode;
  public $actor;
  public $source;
  public $verbs;
  public $crosspostSource;
  public $placeName;
  public $updated;
  public $object;
  public $visibility;
  public $detectedlLang;
  public $address;
  public $placeholder;
  public $annotation;
  public $categories;
  public $targetLang;
  public $kind;
  public $placeId;
  public $published;

  public function setUntranslatedTitle($untranslatedTitle) {
    $this->untranslatedTitle = $untranslatedTitle;
  }

  public function getUntranslatedTitle() {
    return $this->untranslatedTitle;
  }
  
  public function setLinks( ActivityLinks $links) {
    $this->links = $links;
  }

  public function getLinks() {
    return $this->links;
  }
  
  public function setRadius($radius) {
    $this->radius = $radius;
  }

  public function getRadius() {
    return $this->radius;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
  public function setGeocode($geocode) {
    $this->geocode = $geocode;
  }

  public function getGeocode() {
    return $this->geocode;
  }
  
  public function setActor( ActivityActor $actor) {
    $this->actor = $actor;
  }

  public function getActor() {
    return $this->actor;
  }
  
  public function setSource( ActivitySource $source) {
    $this->source = $source;
  }

  public function getSource() {
    return $this->source;
  }
  
  public function setVerbs($verbs) {
    $this->verbs = $verbs;
  }

  public function getVerbs() {
    return $this->verbs;
  }
  
  public function setCrosspostSource($crosspostSource) {
    $this->crosspostSource = $crosspostSource;
  }

  public function getCrosspostSource() {
    return $this->crosspostSource;
  }
  
  public function setPlaceName($placeName) {
    $this->placeName = $placeName;
  }

  public function getPlaceName() {
    return $this->placeName;
  }
  
  public function setUpdated($updated) {
    $this->updated = $updated;
  }

  public function getUpdated() {
    return $this->updated;
  }
  
  public function setObject( ActivityObject $object) {
    $this->object = $object;
  }

  public function getObject() {
    return $this->object;
  }
  
  public function setVisibility( ActivityVisibility $visibility) {
    $this->visibility = $visibility;
  }

  public function getVisibility() {
    return $this->visibility;
  }
  
  public function setDetectedlLang($detectedlLang) {
    $this->detectedlLang = $detectedlLang;
  }

  public function getDetectedlLang() {
    return $this->detectedlLang;
  }
  
  public function setAddress($address) {
    $this->address = $address;
  }

  public function getAddress() {
    return $this->address;
  }
  
  public function setPlaceholder($placeholder) {
    $this->placeholder = $placeholder;
  }

  public function getPlaceholder() {
    return $this->placeholder;
  }
  
  public function setAnnotation($annotation) {
    $this->annotation = $annotation;
  }

  public function getAnnotation() {
    return $this->annotation;
  }
  
  public function setCategories( ActivityCategories $categories) {
    $this->categories = $categories;
  }

  public function getCategories() {
    return $this->categories;
  }
  
  public function setTargetLang($targetLang) {
    $this->targetLang = $targetLang;
  }

  public function getTargetLang() {
    return $this->targetLang;
  }
  
  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setPlaceId($placeId) {
    $this->placeId = $placeId;
  }

  public function getPlaceId() {
    return $this->placeId;
  }
  
  public function setPublished($published) {
    $this->published = $published;
  }

  public function getPublished() {
    return $this->published;
  }
  
}


class ActivityVisibility {

  public $entries;

  public function setEntries( ActivityVisibilityEntries $entries) {
    $this->entries = $entries;
  }

  public function getEntries() {
    return $this->entries;
  }
  
}


class ActivityActor {

  public $profileUrl;
  public $thumbnailUrl;
  public $id;
  public $name;

  public function setProfileUrl($profileUrl) {
    $this->profileUrl = $profileUrl;
  }

  public function getProfileUrl() {
    return $this->profileUrl;
  }
  
  public function setThumbnailUrl($thumbnailUrl) {
    $this->thumbnailUrl = $thumbnailUrl;
  }

  public function getThumbnailUrl() {
    return $this->thumbnailUrl;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }
  
}


class ActivityObjectLinks {


}


class PersonPhoneNumbers {

  public $type;
  public $primary;
  public $value;

  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }
  
  public function setPrimary($primary) {
    $this->primary = $primary;
  }

  public function getPrimary() {
    return $this->primary;
  }
  
  public function setValue($value) {
    $this->value = $value;
  }

  public function getValue() {
    return $this->value;
  }
  
}


class CommentFeed {

  public $kind;
  public $links;
  public $title;
  public $items;
  public $updated;
  public $id;

  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setLinks( CommentFeedLinks $links) {
    $this->links = $links;
  }

  public function getLinks() {
    return $this->links;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
  public function setItems( Comment $items) {
    $this->items = $items;
  }

  public function getItems() {
    return $this->items;
  }
  
  public function setUpdated($updated) {
    $this->updated = $updated;
  }

  public function getUpdated() {
    return $this->updated;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
}


class GroupLinks {

  public $self;

  public function setSelf( GroupLinksSelf $self) {
    $this->self = $self;
  }

  public function getSelf() {
    return $this->self;
  }
  
}


class Comment {

  public $targetLang;
  public $kind;
  public $untranslatedContent;
  public $links;
  public $originalContent;
  public $updated;
  public $actor;
  public $content;
  public $published;
  public $detectedLang;
  public $placeholder;
  public $id;

  public function setTargetLang($targetLang) {
    $this->targetLang = $targetLang;
  }

  public function getTargetLang() {
    return $this->targetLang;
  }
  
  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setUntranslatedContent($untranslatedContent) {
    $this->untranslatedContent = $untranslatedContent;
  }

  public function getUntranslatedContent() {
    return $this->untranslatedContent;
  }
  
  public function setLinks( CommentLinks $links) {
    $this->links = $links;
  }

  public function getLinks() {
    return $this->links;
  }
  
  public function setOriginalContent($originalContent) {
    $this->originalContent = $originalContent;
  }

  public function getOriginalContent() {
    return $this->originalContent;
  }
  
  public function setUpdated($updated) {
    $this->updated = $updated;
  }

  public function getUpdated() {
    return $this->updated;
  }
  
  public function setActor( CommentActor $actor) {
    $this->actor = $actor;
  }

  public function getActor() {
    return $this->actor;
  }
  
  public function setContent($content) {
    $this->content = $content;
  }

  public function getContent() {
    return $this->content;
  }
  
  public function setPublished($published) {
    $this->published = $published;
  }

  public function getPublished() {
    return $this->published;
  }
  
  public function setDetectedLang($detectedLang) {
    $this->detectedLang = $detectedLang;
  }

  public function getDetectedLang() {
    return $this->detectedLang;
  }
  
  public function setPlaceholder($placeholder) {
    $this->placeholder = $placeholder;
  }

  public function getPlaceholder() {
    return $this->placeholder;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
}


class PersonIms {

  public $type;
  public $primary;
  public $value;

  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }
  
  public function setPrimary($primary) {
    $this->primary = $primary;
  }

  public function getPrimary() {
    return $this->primary;
  }
  
  public function setValue($value) {
    $this->value = $value;
  }

  public function getValue() {
    return $this->value;
  }
  
}


class ActivityObject {

  public $targetLang;
  public $liked;
  public $attachments;
  public $links;
  public $originalContent;
  public $actor;
  public $shareOriginal;
  public $content;
  public $detectedlLang;
  public $comments;
  public $type;
  public $id;
  public $untranslatedContent;

  public function setTargetLang($targetLang) {
    $this->targetLang = $targetLang;
  }

  public function getTargetLang() {
    return $this->targetLang;
  }
  
  public function setLiked( Person $liked) {
    $this->liked = $liked;
  }

  public function getLiked() {
    return $this->liked;
  }
  
  public function setAttachments( ActivityObjectAttachments $attachments) {
    $this->attachments = $attachments;
  }

  public function getAttachments() {
    return $this->attachments;
  }
  
  public function setLinks( ActivityObjectLinks $links) {
    $this->links = $links;
  }

  public function getLinks() {
    return $this->links;
  }
  
  public function setOriginalContent($originalContent) {
    $this->originalContent = $originalContent;
  }

  public function getOriginalContent() {
    return $this->originalContent;
  }
  
  public function setActor( ActivityObjectActor $actor) {
    $this->actor = $actor;
  }

  public function getActor() {
    return $this->actor;
  }
  
  public function setShareOriginal( Activity $shareOriginal) {
    $this->shareOriginal = $shareOriginal;
  }

  public function getShareOriginal() {
    return $this->shareOriginal;
  }
  
  public function setContent($content) {
    $this->content = $content;
  }

  public function getContent() {
    return $this->content;
  }
  
  public function setDetectedlLang($detectedlLang) {
    $this->detectedlLang = $detectedlLang;
  }

  public function getDetectedlLang() {
    return $this->detectedlLang;
  }
  
  public function setComments( Comment $comments) {
    $this->comments = $comments;
  }

  public function getComments() {
    return $this->comments;
  }
  
  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setUntranslatedContent($untranslatedContent) {
    $this->untranslatedContent = $untranslatedContent;
  }

  public function getUntranslatedContent() {
    return $this->untranslatedContent;
  }
  
}


class RelatedFeedLinks {


}


class Related {

  public $title;
  public $kind;
  public $href;
  public $id;
  public $summary;

  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setHref($href) {
    $this->href = $href;
  }

  public function getHref() {
    return $this->href;
  }
  
  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setSummary($summary) {
    $this->summary = $summary;
  }

  public function getSummary() {
    return $this->summary;
  }
  
}


class CountFeed {

  public $counts;
  public $kind;

  public function setCounts( CountFeedCounts $counts) {
    $this->counts = $counts;
  }

  public function getCounts() {
    return $this->counts;
  }
  
  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
}


class PersonName {

  public $honorificPrefix;
  public $middleName;
  public $familyName;
  public $formatted;
  public $givenName;
  public $honorificSuffix;

  public function setHonorificPrefix($honorificPrefix) {
    $this->honorificPrefix = $honorificPrefix;
  }

  public function getHonorificPrefix() {
    return $this->honorificPrefix;
  }
  
  public function setMiddleName($middleName) {
    $this->middleName = $middleName;
  }

  public function getMiddleName() {
    return $this->middleName;
  }
  
  public function setFamilyName($familyName) {
    $this->familyName = $familyName;
  }

  public function getFamilyName() {
    return $this->familyName;
  }
  
  public function setFormatted($formatted) {
    $this->formatted = $formatted;
  }

  public function getFormatted() {
    return $this->formatted;
  }
  
  public function setGivenName($givenName) {
    $this->givenName = $givenName;
  }

  public function getGivenName() {
    return $this->givenName;
  }
  
  public function setHonorificSuffix($honorificSuffix) {
    $this->honorificSuffix = $honorificSuffix;
  }

  public function getHonorificSuffix() {
    return $this->honorificSuffix;
  }
  
}


class ChiliPhotosResourceJsonAlbum {

  public $id;
  public $page_link;

  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setPage_link( Link $page_link) {
    $this->page_link = $page_link;
  }

  public function getPage_link() {
    return $this->page_link;
  }
  
}


class Video {

  public $duration;
  public $status;
  public $streams;
  public $size;

  public function setDuration($duration) {
    $this->duration = $duration;
  }

  public function getDuration() {
    return $this->duration;
  }
  
  public function setStatus($status) {
    $this->status = $status;
  }

  public function getStatus() {
    return $this->status;
  }
  
  public function setStreams( Link $streams) {
    $this->streams = $streams;
  }

  public function getStreams() {
    return $this->streams;
  }
  
  public function setSize($size) {
    $this->size = $size;
  }

  public function getSize() {
    return $this->size;
  }
  
}


class AlbumLinks {

  public $alternate;
  public $enclosure;

  public function setAlternate( Link $alternate) {
    $this->alternate = $alternate;
  }

  public function getAlternate() {
    return $this->alternate;
  }
  
  public function setEnclosure( Link $enclosure) {
    $this->enclosure = $enclosure;
  }

  public function getEnclosure() {
    return $this->enclosure;
  }
  
}


class GroupFeed {

  public $items;
  public $kind;
  public $links;

  public function setItems( Group $items) {
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
  
  public function setLinks( GroupFeedLinks $links) {
    $this->links = $links;
  }

  public function getLinks() {
    return $this->links;
  }
  
}


class PersonAddresses {

  public $locality;
  public $country;
  public $region;
  public $primary;
  public $formatted;
  public $streetAddress;
  public $postalCode;
  public $type;

  public function setLocality($locality) {
    $this->locality = $locality;
  }

  public function getLocality() {
    return $this->locality;
  }
  
  public function setCountry($country) {
    $this->country = $country;
  }

  public function getCountry() {
    return $this->country;
  }
  
  public function setRegion($region) {
    $this->region = $region;
  }

  public function getRegion() {
    return $this->region;
  }
  
  public function setPrimary($primary) {
    $this->primary = $primary;
  }

  public function getPrimary() {
    return $this->primary;
  }
  
  public function setFormatted($formatted) {
    $this->formatted = $formatted;
  }

  public function getFormatted() {
    return $this->formatted;
  }
  
  public function setStreetAddress($streetAddress) {
    $this->streetAddress = $streetAddress;
  }

  public function getStreetAddress() {
    return $this->streetAddress;
  }
  
  public function setPostalCode($postalCode) {
    $this->postalCode = $postalCode;
  }

  public function getPostalCode() {
    return $this->postalCode;
  }
  
  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }
  
}


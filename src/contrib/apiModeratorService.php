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
   * The "votes" collection of methods.
   * Typical usage is:
   *  <code>
   *   $moderatorService = new apiModeratorService(...);
   *   $votes = $moderatorService->votes;
   *  </code>
   */
  class VotesServiceResource extends apiServiceResource {


    /**
     * Inserts a new vote by the authenticated user for the specified submission within the specified
     * series. (votes.insert)
     *
     * @param  $seriesId The decimal ID of the Series.
     * @param  $submissionId The decimal ID of the Submission within the Series.
     * @param $postBody the {@link Vote}
     */
    public function insert($seriesId, $submissionId, Vote $postBody) {
      return $this->__call('insert', array(array('seriesId' => $seriesId, 'submissionId' => $submissionId, 'postBody' => $postBody)));
    }
    /**
     * Updates the votes by the authenticated user for the specified submission within the specified
     * series. This method supports patch semantics. (votes.patch)
     *
     * @param  $userId
     * @param  $seriesId The decimal ID of the Series.
     * @param  $submissionId The decimal ID of the Submission within the Series.
     * @param $postBody the {@link Vote}
     */
    public function patch($seriesId, $submissionId, Vote $postBody, $userId = null) {
      return $this->__call('patch', array(array('userId' => $userId, 'seriesId' => $seriesId, 'submissionId' => $submissionId, 'postBody' => $postBody)));
    }
    /**
     * Lists the votes by the authenticated user for the given series. (votes.list)
     *
     * @param  $max_results Maximum number of results to return.
     * @param  $start_index Index of the first result to be retrieved.
     * @param  $seriesId The decimal ID of the Series.
     */
    public function listVotes($seriesId, $max_results = null, $start_index = null) {
      return $this->__call('list', array(array('max-results' => $max_results, 'start-index' => $start_index, 'seriesId' => $seriesId)));
    }
    /**
     * Updates the votes by the authenticated user for the specified submission within the specified
     * series. (votes.update)
     *
     * @param  $userId
     * @param  $seriesId The decimal ID of the Series.
     * @param  $submissionId The decimal ID of the Submission within the Series.
     * @param $postBody the {@link Vote}
     */
    public function update($seriesId, $submissionId, Vote $postBody, $userId = null) {
      return $this->__call('update', array(array('userId' => $userId, 'seriesId' => $seriesId, 'submissionId' => $submissionId, 'postBody' => $postBody)));
    }
    /**
     * Returns the votes by the authenticated user for the specified submission within the specified
     * series. (votes.get)
     *
     * @param  $userId
     * @param  $seriesId The decimal ID of the Series.
     * @param  $submissionId The decimal ID of the Submission within the Series.
     */
    public function get($seriesId, $submissionId, $userId = null) {
      return $this->__call('get', array(array('userId' => $userId, 'seriesId' => $seriesId, 'submissionId' => $submissionId)));
    }
  }

  /**
   * The "responses" collection of methods.
   * Typical usage is:
   *  <code>
   *   $moderatorService = new apiModeratorService(...);
   *   $responses = $moderatorService->responses;
   *  </code>
   */
  class ResponsesServiceResource extends apiServiceResource {


    /**
     * Inserts a response for the specified submission in the specified topic within the specified
     * series. (responses.insert)
     *
     * @param  $anonymous Set to true to mark the new submission as anonymous.
     * @param  $seriesId The decimal ID of the Series.
     * @param  $topicId The decimal ID of the Topic within the Series.
     * @param  $parentSubmissionId The decimal ID of the parent Submission within the Series.
     * @param $postBody the {@link Submission}
     */
    public function insert($parentSubmissionId, $seriesId, $topicId, Submission $postBody, $anonymous = null) {
      return $this->__call('insert', array(array('anonymous' => $anonymous, 'seriesId' => $seriesId, 'topicId' => $topicId, 'parentSubmissionId' => $parentSubmissionId, 'postBody' => $postBody)));
    }
    /**
     * Lists or searches the responses for the specified submission within the specified series and
     * returns the search results. (responses.list)
     *
     * @param  $max_results Maximum number of results to return.
     * @param  $sort Sort order.
     * @param  $author Restricts the results to submissions by a specific author.
     * @param  $start_index Index of the first result to be retrieved.
     * @param  $q Search query.
     * @param  $hasAttachedVideo Specifies whether to restrict to submissions that have videos attached.
     * @param  $seriesId The decimal ID of the Series.
     * @param  $submissionId The decimal ID of the Submission within the Series.
     */
    public function listResponses($seriesId, $submissionId, $author = null, $hasAttachedVideo = null, $max_results = null, $q = null, $sort = null, $start_index = null) {
      return $this->__call('list', array(array('max-results' => $max_results, 'sort' => $sort, 'author' => $author, 'start-index' => $start_index, 'q' => $q, 'hasAttachedVideo' => $hasAttachedVideo, 'seriesId' => $seriesId, 'submissionId' => $submissionId)));
    }
  }

  /**
   * The "tags" collection of methods.
   * Typical usage is:
   *  <code>
   *   $moderatorService = new apiModeratorService(...);
   *   $tags = $moderatorService->tags;
   *  </code>
   */
  class TagsServiceResource extends apiServiceResource {


    /**
     * Inserts a new tag for the specified submission within the specified series. (tags.insert)
     *
     * @param  $seriesId The decimal ID of the Series.
     * @param  $submissionId The decimal ID of the Submission within the Series.
     * @param $postBody the {@link Tag}
     */
    public function insert($seriesId, $submissionId, Tag $postBody) {
      return $this->__call('insert', array(array('seriesId' => $seriesId, 'submissionId' => $submissionId, 'postBody' => $postBody)));
    }
    /**
     * Lists all tags for the specified submission within the specified series. (tags.list)
     *
     * @param  $seriesId The decimal ID of the Series.
     * @param  $submissionId The decimal ID of the Submission within the Series.
     */
    public function listTags($seriesId, $submissionId) {
      return $this->__call('list', array(array('seriesId' => $seriesId, 'submissionId' => $submissionId)));
    }
    /**
     * Deletes the specified tag from the specified submission within the specified series.
     * (tags.delete)
     *
     * @param  $seriesId The decimal ID of the Series.
     * @param  $submissionId The decimal ID of the Submission within the Series.
     * @param  $tagId
     */
    public function delete($seriesId, $submissionId, $tagId) {
      return $this->__call('delete', array(array('seriesId' => $seriesId, 'submissionId' => $submissionId, 'tagId' => $tagId)));
    }
  }

  /**
   * The "series" collection of methods.
   * Typical usage is:
   *  <code>
   *   $moderatorService = new apiModeratorService(...);
   *   $series = $moderatorService->series;
   *  </code>
   */
  class SeriesServiceResource extends apiServiceResource {


    /**
     * Inserts a new series. (series.insert)
     *
     * @param $postBody the {@link Series}
     */
    public function insert(Series $postBody) {
      return $this->__call('insert', array(array('postBody' => $postBody)));
    }
    /**
     * Updates the specified series. This method supports patch semantics. (series.patch)
     *
     * @param  $seriesId The decimal ID of the Series.
     * @param $postBody the {@link Series}
     */
    public function patch($seriesId, Series $postBody) {
      return $this->__call('patch', array(array('seriesId' => $seriesId, 'postBody' => $postBody)));
    }
    /**
     * Searches the series and returns the search results. (series.list)
     *
     * @param  $max_results Maximum number of results to return.
     * @param  $q Search query.
     * @param  $start_index Index of the first result to be retrieved.
     */
    public function listSeries($max_results = null, $q = null, $start_index = null) {
      return $this->__call('list', array(array('max-results' => $max_results, 'q' => $q, 'start-index' => $start_index)));
    }
    /**
     * Updates the specified series. (series.update)
     *
     * @param  $seriesId The decimal ID of the Series.
     * @param $postBody the {@link Series}
     */
    public function update($seriesId, Series $postBody) {
      return $this->__call('update', array(array('seriesId' => $seriesId, 'postBody' => $postBody)));
    }
    /**
     * Returns the specified series. (series.get)
     *
     * @param  $seriesId The decimal ID of the Series.
     */
    public function get($seriesId) {
      return $this->__call('get', array(array('seriesId' => $seriesId)));
    }
  }


  /**
   * The "submissions" collection of methods.
   * Typical usage is:
   *  <code>
   *   $moderatorService = new apiModeratorService(...);
   *   $submissions = $moderatorService->submissions;
   *  </code>
   */
  class SeriesSubmissionsServiceResource extends apiServiceResource {


    /**
     * Searches the submissions for the specified series and returns the search results.
     * (submissions.list)
     *
     * @param  $lang The language code for the language the client prefers resuls in.
     * @param  $max_results Maximum number of results to return.
     * @param  $includeVotes Specifies whether to include the current user's vote
     * @param  $start_index Index of the first result to be retrieved.
     * @param  $author Restricts the results to submissions by a specific author.
     * @param  $sort Sort order.
     * @param  $q Search query.
     * @param  $hasAttachedVideo Specifies whether to restrict to submissions that have videos attached.
     * @param  $seriesId The decimal ID of the Series.
     */
    public function listSeriesSubmissions($seriesId, $author = null, $hasAttachedVideo = null, $includeVotes = null, $lang = null, $max_results = null, $q = null, $sort = null, $start_index = null) {
      return $this->__call('list', array(array('lang' => $lang, 'max-results' => $max_results, 'includeVotes' => $includeVotes, 'start-index' => $start_index, 'author' => $author, 'sort' => $sort, 'q' => $q, 'hasAttachedVideo' => $hasAttachedVideo, 'seriesId' => $seriesId)));
    }
  }
  /**
   * The "responses" collection of methods.
   * Typical usage is:
   *  <code>
   *   $moderatorService = new apiModeratorService(...);
   *   $responses = $moderatorService->responses;
   *  </code>
   */
  class SeriesResponsesServiceResource extends apiServiceResource {


    /**
     * Searches the responses for the specified series and returns the search results. (responses.list)
     *
     * @param  $max_results Maximum number of results to return.
     * @param  $sort Sort order.
     * @param  $author Restricts the results to submissions by a specific author.
     * @param  $start_index Index of the first result to be retrieved.
     * @param  $q Search query.
     * @param  $hasAttachedVideo Specifies whether to restrict to submissions that have videos attached.
     * @param  $seriesId The decimal ID of the Series.
     */
    public function listSeriesResponses($seriesId, $author = null, $hasAttachedVideo = null, $max_results = null, $q = null, $sort = null, $start_index = null) {
      return $this->__call('list', array(array('max-results' => $max_results, 'sort' => $sort, 'author' => $author, 'start-index' => $start_index, 'q' => $q, 'hasAttachedVideo' => $hasAttachedVideo, 'seriesId' => $seriesId)));
    }
  }

  /**
   * The "topics" collection of methods.
   * Typical usage is:
   *  <code>
   *   $moderatorService = new apiModeratorService(...);
   *   $topics = $moderatorService->topics;
   *  </code>
   */
  class TopicsServiceResource extends apiServiceResource {


    /**
     * Inserts a new topic into the specified series. (topics.insert)
     *
     * @param  $seriesId The decimal ID of the Series.
     * @param $postBody the {@link Topic}
     */
    public function insert($seriesId, Topic $postBody) {
      return $this->__call('insert', array(array('seriesId' => $seriesId, 'postBody' => $postBody)));
    }
    /**
     * Searches the topics within the specified series and returns the search results. (topics.list)
     *
     * @param  $max_results Maximum number of results to return.
     * @param  $q Search query.
     * @param  $start_index Index of the first result to be retrieved.
     * @param  $mode
     * @param  $seriesId The decimal ID of the Series.
     */
    public function listTopics($seriesId, $max_results = null, $mode = null, $q = null, $start_index = null) {
      return $this->__call('list', array(array('max-results' => $max_results, 'q' => $q, 'start-index' => $start_index, 'mode' => $mode, 'seriesId' => $seriesId)));
    }
    /**
     * Updates the specified topic within the specified series. (topics.update)
     *
     * @param  $seriesId The decimal ID of the Series.
     * @param  $topicId The decimal ID of the Topic within the Series.
     * @param $postBody the {@link Topic}
     */
    public function update($seriesId, $topicId, Topic $postBody) {
      return $this->__call('update', array(array('seriesId' => $seriesId, 'topicId' => $topicId, 'postBody' => $postBody)));
    }
    /**
     * Returns the specified topic from the specified series. (topics.get)
     *
     * @param  $seriesId The decimal ID of the Series.
     * @param  $topicId The decimal ID of the Topic within the Series.
     */
    public function get($seriesId, $topicId) {
      return $this->__call('get', array(array('seriesId' => $seriesId, 'topicId' => $topicId)));
    }
  }


  /**
   * The "submissions" collection of methods.
   * Typical usage is:
   *  <code>
   *   $moderatorService = new apiModeratorService(...);
   *   $submissions = $moderatorService->submissions;
   *  </code>
   */
  class TopicsSubmissionsServiceResource extends apiServiceResource {


    /**
     * Searches the submissions for the specified topic within the specified series and returns the
     * search results. (submissions.list)
     *
     * @param  $max_results Maximum number of results to return.
     * @param  $includeVotes Specifies whether to include the current user's vote
     * @param  $start_index Index of the first result to be retrieved.
     * @param  $author Restricts the results to submissions by a specific author.
     * @param  $sort Sort order.
     * @param  $q Search query.
     * @param  $hasAttachedVideo Specifies whether to restrict to submissions that have videos attached.
     * @param  $seriesId The decimal ID of the Series.
     * @param  $topicId The decimal ID of the Topic within the Series.
     */
    public function listTopicsSubmissions($seriesId, $topicId, $author = null, $hasAttachedVideo = null, $includeVotes = null, $max_results = null, $q = null, $sort = null, $start_index = null) {
      return $this->__call('list', array(array('max-results' => $max_results, 'includeVotes' => $includeVotes, 'start-index' => $start_index, 'author' => $author, 'sort' => $sort, 'q' => $q, 'hasAttachedVideo' => $hasAttachedVideo, 'seriesId' => $seriesId, 'topicId' => $topicId)));
    }
  }

  /**
   * The "global" collection of methods.
   * Typical usage is:
   *  <code>
   *   $moderatorService = new apiModeratorService(...);
   *   $global = $moderatorService->global;
   *  </code>
   */
  class ModeratorGlobalServiceResource extends apiServiceResource {


  }


  /**
   * The "series" collection of methods.
   * Typical usage is:
   *  <code>
   *   $moderatorService = new apiModeratorService(...);
   *   $series = $moderatorService->series;
   *  </code>
   */
  class ModeratorGlobalSeriesServiceResource extends apiServiceResource {


    /**
     * Searches the public series and returns the search results. (series.list)
     *
     * @param  $max_results Maximum number of results to return.
     * @param  $q Search query.
     * @param  $start_index Index of the first result to be retrieved.
     */
    public function listModeratorGlobalSeries($max_results = null, $q = null, $start_index = null) {
      return $this->__call('list', array(array('max-results' => $max_results, 'q' => $q, 'start-index' => $start_index)));
    }
  }

  /**
   * The "profiles" collection of methods.
   * Typical usage is:
   *  <code>
   *   $moderatorService = new apiModeratorService(...);
   *   $profiles = $moderatorService->profiles;
   *  </code>
   */
  class ProfilesServiceResource extends apiServiceResource {


    /**
     * Updates the profile information for the authenticated user. This method supports patch semantics.
     * (profiles.patch)
     *
     * @param $postBody the {@link Profile}
     */
    public function patch(Profile $postBody) {
      return $this->__call('patch', array(array('postBody' => $postBody)));
    }
    /**
     * Updates the profile information for the authenticated user. (profiles.update)
     *
     * @param $postBody the {@link Profile}
     */
    public function update(Profile $postBody) {
      return $this->__call('update', array(array('postBody' => $postBody)));
    }
    /**
     * Returns the profile information for the authenticated user. (profiles.get)
     *
     */
    public function get() {
      return $this->__call('get', array(array()));
    }
  }

  /**
   * The "featured" collection of methods.
   * Typical usage is:
   *  <code>
   *   $moderatorService = new apiModeratorService(...);
   *   $featured = $moderatorService->featured;
   *  </code>
   */
  class FeaturedServiceResource extends apiServiceResource {


  }


  /**
   * The "series" collection of methods.
   * Typical usage is:
   *  <code>
   *   $moderatorService = new apiModeratorService(...);
   *   $series = $moderatorService->series;
   *  </code>
   */
  class FeaturedSeriesServiceResource extends apiServiceResource {


    /**
     * Lists the featured series. (series.list)
     *
     */
    public function listFeaturedSeries() {
      return $this->__call('list', array(array()));
    }
  }

  /**
   * The "myrecent" collection of methods.
   * Typical usage is:
   *  <code>
   *   $moderatorService = new apiModeratorService(...);
   *   $myrecent = $moderatorService->myrecent;
   *  </code>
   */
  class MyrecentServiceResource extends apiServiceResource {


  }


  /**
   * The "series" collection of methods.
   * Typical usage is:
   *  <code>
   *   $moderatorService = new apiModeratorService(...);
   *   $series = $moderatorService->series;
   *  </code>
   */
  class MyrecentSeriesServiceResource extends apiServiceResource {


    /**
     * Lists the series the authenticated user has visited. (series.list)
     *
     */
    public function listMyrecentSeries() {
      return $this->__call('list', array(array()));
    }
  }

  /**
   * The "my" collection of methods.
   * Typical usage is:
   *  <code>
   *   $moderatorService = new apiModeratorService(...);
   *   $my = $moderatorService->my;
   *  </code>
   */
  class MyServiceResource extends apiServiceResource {


  }


  /**
   * The "series" collection of methods.
   * Typical usage is:
   *  <code>
   *   $moderatorService = new apiModeratorService(...);
   *   $series = $moderatorService->series;
   *  </code>
   */
  class MySeriesServiceResource extends apiServiceResource {


    /**
     * Lists all series created by the authenticated user. (series.list)
     *
     */
    public function listMySeries() {
      return $this->__call('list', array(array()));
    }
  }

  /**
   * The "submissions" collection of methods.
   * Typical usage is:
   *  <code>
   *   $moderatorService = new apiModeratorService(...);
   *   $submissions = $moderatorService->submissions;
   *  </code>
   */
  class SubmissionsServiceResource extends apiServiceResource {


    /**
     * Inserts a new submission in the specified topic within the specified series. (submissions.insert)
     *
     * @param  $anonymous Set to true to mark the new submission as anonymous.
     * @param  $seriesId The decimal ID of the Series.
     * @param  $topicId The decimal ID of the Topic within the Series.
     * @param $postBody the {@link Submission}
     */
    public function insert($seriesId, $topicId, Submission $postBody, $anonymous = null) {
      return $this->__call('insert', array(array('anonymous' => $anonymous, 'seriesId' => $seriesId, 'topicId' => $topicId, 'postBody' => $postBody)));
    }
    /**
     * Returns the specified submission within the specified series. (submissions.get)
     *
     * @param  $lang The language code for the language the client prefers resuls in.
     * @param  $includeVotes Specifies whether to include the current user's vote
     * @param  $seriesId The decimal ID of the Series.
     * @param  $submissionId The decimal ID of the Submission within the Series.
     */
    public function get($seriesId, $submissionId, $includeVotes = null, $lang = null) {
      return $this->__call('get', array(array('lang' => $lang, 'includeVotes' => $includeVotes, 'seriesId' => $seriesId, 'submissionId' => $submissionId)));
    }
  }



/**
 * Service definition for Moderator (v1).
 *
 * <p>
 * Moderator API
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class apiModeratorService {

  // Variables that the apiServiceResource implementation depends on.
  private $serviceName = 'moderator';
  private $version = 'v1';
  private $restBasePath = '/moderator/v1/';
  private $rpcPath = '/rpc';
  private $io;
  // apiServiceResource's that are used internally
  public $votes;
  public $responses;
  public $tags;
  public $series;
  public $topics;
  public $global;
  public $profiles;
  public $featured;
  public $myrecent;
  public $my;
  public $submissions;
  /**
   * Constructs the internal representation of the Moderator service.
   *
   * @param apiClient apiClient
   */
  public function __construct(apiClient $apiClient) {
     $apiClient->addService($this->serviceName, $this->version);
     $this->io = $apiClient->getIo();
     $this->votes = new VotesServiceResource($this, $this->serviceName, 'votes', json_decode('{"methods": {"insert": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "submissionId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}}, "request": {"$ref": "Vote"}, "rpcMethod": "moderator.votes.insert", "httpMethod": "POST", "response": {"$ref": "Vote"}, "restPath": "series/{seriesId}/submissions/{submissionId}/votes/@me"}, "get": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "userId": {"restParameterType": "query", "type": "string"}, "submissionId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}}, "rpcMethod": "moderator.votes.get", "httpMethod": "GET", "response": {"$ref": "Vote"}, "restPath": "series/{seriesId}/submissions/{submissionId}/votes/@me"}, "list": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"max-results": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}, "seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "start-index": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}}, "rpcMethod": "moderator.votes.list", "httpMethod": "GET", "response": {"$ref": "VoteList"}, "restPath": "series/{seriesId}/votes/@me"}, "update": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "userId": {"restParameterType": "query", "type": "string"}, "submissionId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}}, "request": {"$ref": "Vote"}, "rpcMethod": "moderator.votes.update", "httpMethod": "PUT", "response": {"$ref": "Vote"}, "restPath": "series/{seriesId}/submissions/{submissionId}/votes/@me"}, "patch": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "userId": {"restParameterType": "query", "type": "string"}, "submissionId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}}, "request": {"$ref": "Vote"}, "rpcMethod": "moderator.votes.patch", "httpMethod": "PATCH", "response": {"$ref": "Vote"}, "restPath": "series/{seriesId}/submissions/{submissionId}/votes/@me"}}}', true));
     $this->responses = new ResponsesServiceResource($this, $this->serviceName, 'responses', json_decode('{"methods": {"insert": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "parentSubmissionId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "anonymous": {"restParameterType": "query", "type": "boolean"}, "topicId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}}, "request": {"$ref": "Submission"}, "rpcMethod": "moderator.responses.insert", "httpMethod": "POST", "response": {"$ref": "Submission"}, "restPath": "series/{seriesId}/topics/{topicId}/submissions/{parentSubmissionId}/responses"}, "list": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"max-results": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}, "sort": {"restParameterType": "query", "type": "string"}, "seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "author": {"restParameterType": "query", "type": "string"}, "start-index": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}, "submissionId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "q": {"restParameterType": "query", "type": "string"}, "hasAttachedVideo": {"restParameterType": "query", "type": "boolean"}}, "rpcMethod": "moderator.responses.list", "httpMethod": "GET", "response": {"$ref": "SubmissionList"}, "restPath": "series/{seriesId}/submissions/{submissionId}/responses"}}}', true));
     $this->tags = new TagsServiceResource($this, $this->serviceName, 'tags', json_decode('{"methods": {"insert": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "submissionId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}}, "request": {"$ref": "Tag"}, "rpcMethod": "moderator.tags.insert", "httpMethod": "POST", "response": {"$ref": "Tag"}, "restPath": "series/{seriesId}/submissions/{submissionId}/tags"}, "list": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "submissionId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}}, "rpcMethod": "moderator.tags.list", "httpMethod": "GET", "response": {"$ref": "TagList"}, "restPath": "series/{seriesId}/submissions/{submissionId}/tags"}, "delete": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "tagId": {"restParameterType": "path", "required": true, "type": "string"}, "submissionId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}}, "rpcMethod": "moderator.tags.delete", "httpMethod": "DELETE", "restPath": "series/{seriesId}/submissions/{submissionId}/tags/{tagId}"}}}', true));
     $this->series = new SeriesServiceResource($this, $this->serviceName, 'series', json_decode('{"methods": {"insert": {"scopes": ["https://www.googleapis.com/auth/moderator"], "request": {"$ref": "Series"}, "rpcMethod": "moderator.series.insert", "httpMethod": "POST", "response": {"$ref": "Series"}, "restPath": "series"}, "get": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}}, "rpcMethod": "moderator.series.get", "httpMethod": "GET", "response": {"$ref": "Series"}, "restPath": "series/{seriesId}"}, "list": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"max-results": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}, "q": {"restParameterType": "query", "type": "string"}, "start-index": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}}, "rpcMethod": "moderator.series.list", "httpMethod": "GET", "response": {"$ref": "SeriesList"}, "restPath": "series"}, "update": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}}, "request": {"$ref": "Series"}, "rpcMethod": "moderator.series.update", "httpMethod": "PUT", "response": {"$ref": "Series"}, "restPath": "series/{seriesId}"}, "patch": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}}, "request": {"$ref": "Series"}, "rpcMethod": "moderator.series.patch", "httpMethod": "PATCH", "response": {"$ref": "Series"}, "restPath": "series/{seriesId}"}}, "resources": {"submissions": {"methods": {"list": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"lang": {"restParameterType": "query", "type": "string"}, "max-results": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}, "seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "author": {"restParameterType": "query", "type": "string"}, "start-index": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}, "includeVotes": {"restParameterType": "query", "type": "boolean"}, "sort": {"restParameterType": "query", "type": "string"}, "q": {"restParameterType": "query", "type": "string"}, "hasAttachedVideo": {"restParameterType": "query", "type": "boolean"}}, "rpcMethod": "moderator.series.submissions.list", "httpMethod": "GET", "response": {"$ref": "SubmissionList"}, "restPath": "series/{seriesId}/submissions"}}}, "responses": {"methods": {"list": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"max-results": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}, "sort": {"restParameterType": "query", "type": "string"}, "seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "author": {"restParameterType": "query", "type": "string"}, "start-index": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}, "q": {"restParameterType": "query", "type": "string"}, "hasAttachedVideo": {"restParameterType": "query", "type": "boolean"}}, "rpcMethod": "moderator.series.responses.list", "httpMethod": "GET", "response": {"$ref": "SeriesList"}, "restPath": "series/{seriesId}/responses"}}}}}', true));
     $this->topics = new TopicsServiceResource($this, $this->serviceName, 'topics', json_decode('{"methods": {"insert": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}}, "request": {"$ref": "Topic"}, "rpcMethod": "moderator.topics.insert", "httpMethod": "POST", "response": {"$ref": "Topic"}, "restPath": "series/{seriesId}/topics"}, "list": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"max-results": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}, "q": {"restParameterType": "query", "type": "string"}, "start-index": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}, "mode": {"restParameterType": "query", "type": "string"}, "seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}}, "rpcMethod": "moderator.topics.list", "httpMethod": "GET", "response": {"$ref": "TopicList"}, "restPath": "series/{seriesId}/topics"}, "update": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "topicId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}}, "request": {"$ref": "Topic"}, "rpcMethod": "moderator.topics.update", "httpMethod": "PUT", "response": {"$ref": "Topic"}, "restPath": "series/{seriesId}/topics/{topicId}"}, "get": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "topicId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}}, "rpcMethod": "moderator.topics.get", "httpMethod": "GET", "response": {"$ref": "Topic2"}, "restPath": "series/{seriesId}/topics/{topicId}"}}, "resources": {"submissions": {"methods": {"list": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"max-results": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}, "seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "includeVotes": {"restParameterType": "query", "type": "boolean"}, "topicId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "start-index": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}, "author": {"restParameterType": "query", "type": "string"}, "sort": {"restParameterType": "query", "type": "string"}, "q": {"restParameterType": "query", "type": "string"}, "hasAttachedVideo": {"restParameterType": "query", "type": "boolean"}}, "rpcMethod": "moderator.topics.submissions.list", "httpMethod": "GET", "response": {"$ref": "SubmissionList"}, "restPath": "series/{seriesId}/topics/{topicId}/submissions"}}}}}', true));
     $this->global = new ModeratorGlobalServiceResource($this, $this->serviceName, 'global', json_decode('{"resources": {"series": {"methods": {"list": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"max-results": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}, "q": {"restParameterType": "query", "type": "string"}, "start-index": {"restParameterType": "query", "minimum": "0", "type": "integer", "maximum": "4294967295"}}, "rpcMethod": "moderator.global.series.list", "httpMethod": "GET", "response": {"$ref": "SeriesList"}, "restPath": "search"}}}}}', true));
     $this->profiles = new ProfilesServiceResource($this, $this->serviceName, 'profiles', json_decode('{"methods": {"get": {"scopes": ["https://www.googleapis.com/auth/moderator"], "rpcMethod": "moderator.profiles.get", "httpMethod": "GET", "response": {"$ref": "Profile"}, "restPath": "profiles/@me"}, "update": {"scopes": ["https://www.googleapis.com/auth/moderator"], "request": {"$ref": "Profile"}, "rpcMethod": "moderator.profiles.update", "httpMethod": "PUT", "response": {"$ref": "Profile"}, "restPath": "profiles/@me"}, "patch": {"scopes": ["https://www.googleapis.com/auth/moderator"], "request": {"$ref": "Profile"}, "rpcMethod": "moderator.profiles.patch", "httpMethod": "PATCH", "response": {"$ref": "Profile"}, "restPath": "profiles/@me"}}}', true));
     $this->featured = new FeaturedServiceResource($this, $this->serviceName, 'featured', json_decode('{"resources": {"series": {"methods": {"list": {"scopes": ["https://www.googleapis.com/auth/moderator"], "rpcMethod": "moderator.featured.series.list", "httpMethod": "GET", "response": {"$ref": "SeriesList"}, "restPath": "series/featured"}}}}}', true));
     $this->myrecent = new MyrecentServiceResource($this, $this->serviceName, 'myrecent', json_decode('{"resources": {"series": {"methods": {"list": {"scopes": ["https://www.googleapis.com/auth/moderator"], "rpcMethod": "moderator.myrecent.series.list", "httpMethod": "GET", "response": {"$ref": "SeriesList"}, "restPath": "series/@me/recent"}}}}}', true));
     $this->my = new MyServiceResource($this, $this->serviceName, 'my', json_decode('{"resources": {"series": {"methods": {"list": {"scopes": ["https://www.googleapis.com/auth/moderator"], "rpcMethod": "moderator.my.series.list", "httpMethod": "GET", "response": {"$ref": "SeriesList"}, "restPath": "series/@me/mine"}}}}}', true));
     $this->submissions = new SubmissionsServiceResource($this, $this->serviceName, 'submissions', json_decode('{"methods": {"insert": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "topicId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "anonymous": {"restParameterType": "query", "type": "boolean"}}, "request": {"$ref": "Submission"}, "rpcMethod": "moderator.submissions.insert", "httpMethod": "POST", "response": {"$ref": "Submission"}, "restPath": "series/{seriesId}/topics/{topicId}/submissions"}, "get": {"scopes": ["https://www.googleapis.com/auth/moderator"], "parameters": {"lang": {"restParameterType": "query", "type": "string"}, "seriesId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}, "includeVotes": {"restParameterType": "query", "type": "boolean"}, "submissionId": {"required": true, "maximum": "4294967295", "minimum": "0", "restParameterType": "path", "type": "integer"}}, "rpcMethod": "moderator.submissions.get", "httpMethod": "GET", "response": {"$ref": "Submission"}, "restPath": "series/{seriesId}/submissions/{submissionId}"}}}', true));
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

class Topic2RulesVotes {

  public $close;
  public $open;

  public function setClose($close) {
    $this->close = $close;
  }

  public function getClose() {
    return $this->close;
  }
  
  public function setOpen($open) {
    $this->open = $open;
  }

  public function getOpen() {
    return $this->open;
  }
  
}


class ModeratorTopicsResourcePartial {

  public $id;

  public function setId( ModeratorTopicsResourcePartialId $id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
}


class SubmissionGeo {

  public $latitude;
  public $location;
  public $longitude;

  public function setLatitude($latitude) {
    $this->latitude = $latitude;
  }

  public function getLatitude() {
    return $this->latitude;
  }
  
  public function setLocation($location) {
    $this->location = $location;
  }

  public function getLocation() {
    return $this->location;
  }
  
  public function setLongitude($longitude) {
    $this->longitude = $longitude;
  }

  public function getLongitude() {
    return $this->longitude;
  }
  
}


class ModeratorVotesResourcePartial {

  public $vote;
  public $flag;

  public function setVote($vote) {
    $this->vote = $vote;
  }

  public function getVote() {
    return $this->vote;
  }
  
  public function setFlag($flag) {
    $this->flag = $flag;
  }

  public function getFlag() {
    return $this->flag;
  }
  
}


class SubmissionParentSubmissionId {

  public $seriesId;
  public $submissionId;

  public function setSeriesId($seriesId) {
    $this->seriesId = $seriesId;
  }

  public function getSeriesId() {
    return $this->seriesId;
  }
  
  public function setSubmissionId($submissionId) {
    $this->submissionId = $submissionId;
  }

  public function getSubmissionId() {
    return $this->submissionId;
  }
  
}


class VoteId {

  public $seriesId;
  public $submissionId;

  public function setSeriesId($seriesId) {
    $this->seriesId = $seriesId;
  }

  public function getSeriesId() {
    return $this->seriesId;
  }
  
  public function setSubmissionId($submissionId) {
    $this->submissionId = $submissionId;
  }

  public function getSubmissionId() {
    return $this->submissionId;
  }
  
}


class SeriesList {

  public $items;
  public $kind;

  public function setItems( Series $items) {
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


class ProfileId {

  public $user;

  public function setUser($user) {
    $this->user = $user;
  }

  public function getUser() {
    return $this->user;
  }
  
}


class Profile {

  public $kind;
  public $attribution;
  public $id;

  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setAttribution( ProfileAttribution $attribution) {
    $this->attribution = $attribution;
  }

  public function getAttribution() {
    return $this->attribution;
  }
  
  public function setId( ProfileId $id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
}


class Topic2Rules {

  public $votes;
  public $submissions;

  public function setVotes( Topic2RulesVotes $votes) {
    $this->votes = $votes;
  }

  public function getVotes() {
    return $this->votes;
  }
  
  public function setSubmissions( Topic2RulesSubmissions $submissions) {
    $this->submissions = $submissions;
  }

  public function getSubmissions() {
    return $this->submissions;
  }
  
}


class Topic2Id {

  public $seriesId;
  public $topicId;

  public function setSeriesId($seriesId) {
    $this->seriesId = $seriesId;
  }

  public function getSeriesId() {
    return $this->seriesId;
  }
  
  public function setTopicId($topicId) {
    $this->topicId = $topicId;
  }

  public function getTopicId() {
    return $this->topicId;
  }
  
}


class Topic2 {

  public $kind;
  public $description;
  public $rules;
  public $featuredSubmission;
  public $presenter;
  public $counters;
  public $id;
  public $name;

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
  
  public function setRules( Topic2Rules $rules) {
    $this->rules = $rules;
  }

  public function getRules() {
    return $this->rules;
  }
  
  public function setFeaturedSubmission( Submission $featuredSubmission) {
    $this->featuredSubmission = $featuredSubmission;
  }

  public function getFeaturedSubmission() {
    return $this->featuredSubmission;
  }
  
  public function setPresenter($presenter) {
    $this->presenter = $presenter;
  }

  public function getPresenter() {
    return $this->presenter;
  }
  
  public function setCounters( Topic2Counters $counters) {
    $this->counters = $counters;
  }

  public function getCounters() {
    return $this->counters;
  }
  
  public function setId( Topic2Id $id) {
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


class VoteList {

  public $items;
  public $kind;

  public function setItems( Vote $items) {
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


class SubmissionId {

  public $seriesId;
  public $submissionId;

  public function setSeriesId($seriesId) {
    $this->seriesId = $seriesId;
  }

  public function getSeriesId() {
    return $this->seriesId;
  }
  
  public function setSubmissionId($submissionId) {
    $this->submissionId = $submissionId;
  }

  public function getSubmissionId() {
    return $this->submissionId;
  }
  
}


class TopicRulesVotes {

  public $close;
  public $open;

  public function setClose($close) {
    $this->close = $close;
  }

  public function getClose() {
    return $this->close;
  }
  
  public function setOpen($open) {
    $this->open = $open;
  }

  public function getOpen() {
    return $this->open;
  }
  
}


class SeriesRules {

  public $votes;
  public $submissions;

  public function setVotes( SeriesRulesVotes $votes) {
    $this->votes = $votes;
  }

  public function getVotes() {
    return $this->votes;
  }
  
  public function setSubmissions( SeriesRulesSubmissions $submissions) {
    $this->submissions = $submissions;
  }

  public function getSubmissions() {
    return $this->submissions;
  }
  
}


class TopicList {

  public $items;
  public $kind;

  public function setItems( Topic $items) {
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


class SeriesCounters {

  public $users;
  public $noneVotes;
  public $videoSubmissions;
  public $minusVotes;
  public $anonymousSubmissions;
  public $submissions;
  public $plusVotes;

  public function setUsers($users) {
    $this->users = $users;
  }

  public function getUsers() {
    return $this->users;
  }
  
  public function setNoneVotes($noneVotes) {
    $this->noneVotes = $noneVotes;
  }

  public function getNoneVotes() {
    return $this->noneVotes;
  }
  
  public function setVideoSubmissions($videoSubmissions) {
    $this->videoSubmissions = $videoSubmissions;
  }

  public function getVideoSubmissions() {
    return $this->videoSubmissions;
  }
  
  public function setMinusVotes($minusVotes) {
    $this->minusVotes = $minusVotes;
  }

  public function getMinusVotes() {
    return $this->minusVotes;
  }
  
  public function setAnonymousSubmissions($anonymousSubmissions) {
    $this->anonymousSubmissions = $anonymousSubmissions;
  }

  public function getAnonymousSubmissions() {
    return $this->anonymousSubmissions;
  }
  
  public function setSubmissions($submissions) {
    $this->submissions = $submissions;
  }

  public function getSubmissions() {
    return $this->submissions;
  }
  
  public function setPlusVotes($plusVotes) {
    $this->plusVotes = $plusVotes;
  }

  public function getPlusVotes() {
    return $this->plusVotes;
  }
  
}


class ModeratorTopicsResourcePartialId {

  public $seriesId;
  public $topicId;

  public function setSeriesId($seriesId) {
    $this->seriesId = $seriesId;
  }

  public function getSeriesId() {
    return $this->seriesId;
  }
  
  public function setTopicId($topicId) {
    $this->topicId = $topicId;
  }

  public function getTopicId() {
    return $this->topicId;
  }
  
}


class ProfileAttributionGeo {

  public $latitude;
  public $location;
  public $longitude;

  public function setLatitude($latitude) {
    $this->latitude = $latitude;
  }

  public function getLatitude() {
    return $this->latitude;
  }
  
  public function setLocation($location) {
    $this->location = $location;
  }

  public function getLocation() {
    return $this->location;
  }
  
  public function setLongitude($longitude) {
    $this->longitude = $longitude;
  }

  public function getLongitude() {
    return $this->longitude;
  }
  
}


class SeriesId {

  public $seriesId;

  public function setSeriesId($seriesId) {
    $this->seriesId = $seriesId;
  }

  public function getSeriesId() {
    return $this->seriesId;
  }
  
}


class Submission {

  public $kind;
  public $attribution;
  public $created;
  public $text;
  public $topics;
  public $author;
  public $translations;
  public $parentSubmissionId;
  public $vote;
  public $attachmentUrl;
  public $geo;
  public $id;
  public $counters;

  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setAttribution( SubmissionAttribution $attribution) {
    $this->attribution = $attribution;
  }

  public function getAttribution() {
    return $this->attribution;
  }
  
  public function setCreated($created) {
    $this->created = $created;
  }

  public function getCreated() {
    return $this->created;
  }
  
  public function setText($text) {
    $this->text = $text;
  }

  public function getText() {
    return $this->text;
  }
  
  public function setTopics( ModeratorTopicsResourcePartial $topics) {
    $this->topics = $topics;
  }

  public function getTopics() {
    return $this->topics;
  }
  
  public function setAuthor($author) {
    $this->author = $author;
  }

  public function getAuthor() {
    return $this->author;
  }
  
  public function setTranslations( SubmissionTranslations $translations) {
    $this->translations = $translations;
  }

  public function getTranslations() {
    return $this->translations;
  }
  
  public function setParentSubmissionId( SubmissionParentSubmissionId $parentSubmissionId) {
    $this->parentSubmissionId = $parentSubmissionId;
  }

  public function getParentSubmissionId() {
    return $this->parentSubmissionId;
  }
  
  public function setVote( ModeratorVotesResourcePartial $vote) {
    $this->vote = $vote;
  }

  public function getVote() {
    return $this->vote;
  }
  
  public function setAttachmentUrl($attachmentUrl) {
    $this->attachmentUrl = $attachmentUrl;
  }

  public function getAttachmentUrl() {
    return $this->attachmentUrl;
  }
  
  public function setGeo( SubmissionGeo $geo) {
    $this->geo = $geo;
  }

  public function getGeo() {
    return $this->geo;
  }
  
  public function setId( SubmissionId $id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setCounters( SubmissionCounters $counters) {
    $this->counters = $counters;
  }

  public function getCounters() {
    return $this->counters;
  }
  
}


class SubmissionTranslations {

  public $lang;
  public $text;

  public function setLang($lang) {
    $this->lang = $lang;
  }

  public function getLang() {
    return $this->lang;
  }
  
  public function setText($text) {
    $this->text = $text;
  }

  public function getText() {
    return $this->text;
  }
  
}


class Topic2RulesSubmissions {

  public $close;
  public $open;

  public function setClose($close) {
    $this->close = $close;
  }

  public function getClose() {
    return $this->close;
  }
  
  public function setOpen($open) {
    $this->open = $open;
  }

  public function getOpen() {
    return $this->open;
  }
  
}


class TopicRules {

  public $votes;
  public $submissions;

  public function setVotes( TopicRulesVotes $votes) {
    $this->votes = $votes;
  }

  public function getVotes() {
    return $this->votes;
  }
  
  public function setSubmissions( TopicRulesSubmissions $submissions) {
    $this->submissions = $submissions;
  }

  public function getSubmissions() {
    return $this->submissions;
  }
  
}


class TopicRulesSubmissions {

  public $close;
  public $open;

  public function setClose($close) {
    $this->close = $close;
  }

  public function getClose() {
    return $this->close;
  }
  
  public function setOpen($open) {
    $this->open = $open;
  }

  public function getOpen() {
    return $this->open;
  }
  
}


class SubmissionAttribution {

  public $displayName;
  public $location;
  public $avatarUrl;

  public function setDisplayName($displayName) {
    $this->displayName = $displayName;
  }

  public function getDisplayName() {
    return $this->displayName;
  }
  
  public function setLocation($location) {
    $this->location = $location;
  }

  public function getLocation() {
    return $this->location;
  }
  
  public function setAvatarUrl($avatarUrl) {
    $this->avatarUrl = $avatarUrl;
  }

  public function getAvatarUrl() {
    return $this->avatarUrl;
  }
  
}


class SubmissionCounters {

  public $noneVotes;
  public $minusVotes;
  public $plusVotes;

  public function setNoneVotes($noneVotes) {
    $this->noneVotes = $noneVotes;
  }

  public function getNoneVotes() {
    return $this->noneVotes;
  }
  
  public function setMinusVotes($minusVotes) {
    $this->minusVotes = $minusVotes;
  }

  public function getMinusVotes() {
    return $this->minusVotes;
  }
  
  public function setPlusVotes($plusVotes) {
    $this->plusVotes = $plusVotes;
  }

  public function getPlusVotes() {
    return $this->plusVotes;
  }
  
}


class TopicCounters {

  public $users;
  public $noneVotes;
  public $videoSubmissions;
  public $minusVotes;
  public $submissions;
  public $plusVotes;

  public function setUsers($users) {
    $this->users = $users;
  }

  public function getUsers() {
    return $this->users;
  }
  
  public function setNoneVotes($noneVotes) {
    $this->noneVotes = $noneVotes;
  }

  public function getNoneVotes() {
    return $this->noneVotes;
  }
  
  public function setVideoSubmissions($videoSubmissions) {
    $this->videoSubmissions = $videoSubmissions;
  }

  public function getVideoSubmissions() {
    return $this->videoSubmissions;
  }
  
  public function setMinusVotes($minusVotes) {
    $this->minusVotes = $minusVotes;
  }

  public function getMinusVotes() {
    return $this->minusVotes;
  }
  
  public function setSubmissions($submissions) {
    $this->submissions = $submissions;
  }

  public function getSubmissions() {
    return $this->submissions;
  }
  
  public function setPlusVotes($plusVotes) {
    $this->plusVotes = $plusVotes;
  }

  public function getPlusVotes() {
    return $this->plusVotes;
  }
  
}


class ProfileAttribution {

  public $geo;
  public $displayName;
  public $location;
  public $avatarUrl;

  public function setGeo( ProfileAttributionGeo $geo) {
    $this->geo = $geo;
  }

  public function getGeo() {
    return $this->geo;
  }
  
  public function setDisplayName($displayName) {
    $this->displayName = $displayName;
  }

  public function getDisplayName() {
    return $this->displayName;
  }
  
  public function setLocation($location) {
    $this->location = $location;
  }

  public function getLocation() {
    return $this->location;
  }
  
  public function setAvatarUrl($avatarUrl) {
    $this->avatarUrl = $avatarUrl;
  }

  public function getAvatarUrl() {
    return $this->avatarUrl;
  }
  
}


class TopicId {

  public $seriesId;
  public $topicId;

  public function setSeriesId($seriesId) {
    $this->seriesId = $seriesId;
  }

  public function getSeriesId() {
    return $this->seriesId;
  }
  
  public function setTopicId($topicId) {
    $this->topicId = $topicId;
  }

  public function getTopicId() {
    return $this->topicId;
  }
  
}


class Topic2Counters {

  public $users;
  public $noneVotes;
  public $videoSubmissions;
  public $minusVotes;
  public $submissions;
  public $plusVotes;

  public function setUsers($users) {
    $this->users = $users;
  }

  public function getUsers() {
    return $this->users;
  }
  
  public function setNoneVotes($noneVotes) {
    $this->noneVotes = $noneVotes;
  }

  public function getNoneVotes() {
    return $this->noneVotes;
  }
  
  public function setVideoSubmissions($videoSubmissions) {
    $this->videoSubmissions = $videoSubmissions;
  }

  public function getVideoSubmissions() {
    return $this->videoSubmissions;
  }
  
  public function setMinusVotes($minusVotes) {
    $this->minusVotes = $minusVotes;
  }

  public function getMinusVotes() {
    return $this->minusVotes;
  }
  
  public function setSubmissions($submissions) {
    $this->submissions = $submissions;
  }

  public function getSubmissions() {
    return $this->submissions;
  }
  
  public function setPlusVotes($plusVotes) {
    $this->plusVotes = $plusVotes;
  }

  public function getPlusVotes() {
    return $this->plusVotes;
  }
  
}


class Series {

  public $kind;
  public $description;
  public $rules;
  public $videoSubmissionAllowed;
  public $name;
  public $numTopics;
  public $anonymousSubmissionAllowed;
  public $id;
  public $counters;

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
  
  public function setRules( SeriesRules $rules) {
    $this->rules = $rules;
  }

  public function getRules() {
    return $this->rules;
  }
  
  public function setVideoSubmissionAllowed($videoSubmissionAllowed) {
    $this->videoSubmissionAllowed = $videoSubmissionAllowed;
  }

  public function getVideoSubmissionAllowed() {
    return $this->videoSubmissionAllowed;
  }
  
  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }
  
  public function setNumTopics($numTopics) {
    $this->numTopics = $numTopics;
  }

  public function getNumTopics() {
    return $this->numTopics;
  }
  
  public function setAnonymousSubmissionAllowed($anonymousSubmissionAllowed) {
    $this->anonymousSubmissionAllowed = $anonymousSubmissionAllowed;
  }

  public function getAnonymousSubmissionAllowed() {
    return $this->anonymousSubmissionAllowed;
  }
  
  public function setId( SeriesId $id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setCounters( SeriesCounters $counters) {
    $this->counters = $counters;
  }

  public function getCounters() {
    return $this->counters;
  }
  
}


class TagId {

  public $seriesId;
  public $tagId;
  public $submissionId;

  public function setSeriesId($seriesId) {
    $this->seriesId = $seriesId;
  }

  public function getSeriesId() {
    return $this->seriesId;
  }
  
  public function setTagId($tagId) {
    $this->tagId = $tagId;
  }

  public function getTagId() {
    return $this->tagId;
  }
  
  public function setSubmissionId($submissionId) {
    $this->submissionId = $submissionId;
  }

  public function getSubmissionId() {
    return $this->submissionId;
  }
  
}


class SeriesRulesVotes {

  public $close;
  public $open;

  public function setClose($close) {
    $this->close = $close;
  }

  public function getClose() {
    return $this->close;
  }
  
  public function setOpen($open) {
    $this->open = $open;
  }

  public function getOpen() {
    return $this->open;
  }
  
}


class Topic {

  public $kind;
  public $description;
  public $rules;
  public $featuredSubmission;
  public $presenter;
  public $counters;
  public $id;
  public $name;

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
  
  public function setRules( TopicRules $rules) {
    $this->rules = $rules;
  }

  public function getRules() {
    return $this->rules;
  }
  
  public function setFeaturedSubmission($featuredSubmission) {
    $this->featuredSubmission = $featuredSubmission;
  }

  public function getFeaturedSubmission() {
    return $this->featuredSubmission;
  }
  
  public function setPresenter($presenter) {
    $this->presenter = $presenter;
  }

  public function getPresenter() {
    return $this->presenter;
  }
  
  public function setCounters( TopicCounters $counters) {
    $this->counters = $counters;
  }

  public function getCounters() {
    return $this->counters;
  }
  
  public function setId( TopicId $id) {
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


class Tag {

  public $text;
  public $kind;
  public $id;

  public function setText($text) {
    $this->text = $text;
  }

  public function getText() {
    return $this->text;
  }
  
  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setId( TagId $id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
}


class Vote {

  public $vote;
  public $flag;
  public $id;
  public $kind;

  public function setVote($vote) {
    $this->vote = $vote;
  }

  public function getVote() {
    return $this->vote;
  }
  
  public function setFlag($flag) {
    $this->flag = $flag;
  }

  public function getFlag() {
    return $this->flag;
  }
  
  public function setId( VoteId $id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }
  
  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
}


class SeriesRulesSubmissions {

  public $close;
  public $open;

  public function setClose($close) {
    $this->close = $close;
  }

  public function getClose() {
    return $this->close;
  }
  
  public function setOpen($open) {
    $this->open = $open;
  }

  public function getOpen() {
    return $this->open;
  }
  
}


class SubmissionList {

  public $items;
  public $kind;

  public function setItems( Submission $items) {
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


class TagList {

  public $items;
  public $kind;

  public function setItems( Tag $items) {
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


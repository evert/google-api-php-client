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
   * The "tasks" collection of methods.
   * Typical usage is:
   *  <code>
   *   $tasksService = new apiTasksService(...);
   *   $tasks = $tasksService->tasks;
   *  </code>
   */
  class TasksServiceResource extends apiServiceResource {


    /**
     * Creates a new task on the specified task list. (tasks.insert)
     *
     * @param  $parent Parent task identifier. If the task is created at the top level, this parameter is omitted. Optional.
     * @param  $previous Previous sibling task identifier. If the task is created at the first position among its siblings, this parameter is omitted. Optional.
     * @param  $tasklist Task list identifier.
     * @param $postBody the {@link Task}
     */
    public function insert($tasklist, Task $postBody, $parent = null, $previous = null) {
      return $this->__call('insert', array(array('parent' => $parent, 'previous' => $previous, 'tasklist' => $tasklist, 'postBody' => $postBody)));
    }
    /**
     * Returns the specified task. (tasks.get)
     *
     * @param  $tasklist Task list identifier.
     * @param  $task Task identifier.
     */
    public function get($task, $tasklist) {
      return $this->__call('get', array(array('tasklist' => $tasklist, 'task' => $task)));
    }
    /**
     * Clears all completed tasks from the specified task list. The affected tasks will be marked as
     * 'hidden' and no longer be returned by default when retrieving all tasks for a task list.
     * (tasks.clear)
     *
     * @param  $tasklist Task list identifier.
     */
    public function clear($tasklist) {
      return $this->__call('clear', array(array('tasklist' => $tasklist)));
    }
    /**
     * Moves the specified task to another position in the task list. This can include putting it as a
     * child task under a new parent and/or move it to a different position among its sibling tasks.
     * (tasks.move)
     *
     * @param  $parent New parent task identifier. If the task is moved to the top level, this parameter is omitted. Optional.
     * @param  $previous New previous sibling task identifier. If the task is moved to the first position among its siblings, this parameter is omitted. Optional.
     * @param  $tasklist Task list identifier.
     * @param  $task Task identifier.
     */
    public function move($task, $tasklist, $parent = null, $previous = null) {
      return $this->__call('move', array(array('parent' => $parent, 'previous' => $previous, 'tasklist' => $tasklist, 'task' => $task)));
    }
    /**
     * Returns all tasks in the specified task list. (tasks.list)
     *
     * @param  $dueMax Upper bound for a task's due date (as a RFC 3339 timestamp) to filter by. Optional. The default is not to filter by due date.
     * @param  $showDeleted Flag indicating whether deleted tasks are returned in the result. Optional. The default is False.
     * @param  $updatedMin Lower bound for a task's last modification time (as a RFC 3339 timestamp) to filter by. Optional. The default is not to filter by last modification time.
     * @param  $completedMin Lower bound for a task's completion date (as a RFC 3339 timestamp) to filter by. Optional. The default is not to filter by completion date.
     * @param  $maxResults Maximum number of task lists returned on one page. Optional. The default is 100.
     * @param  $showCompleted Flag indicating whether completed tasks are returned in the result. Optional. The default is True.
     * @param  $pageToken Token specifying the result page to return. Optional.
     * @param  $completedMax Upper bound for a task's completion date (as a RFC 3339 timestamp) to filter by. Optional. The default is not to filter by completion date.
     * @param  $showHidden Flag indicating whether hidden tasks are returned in the result. Optional. The default is False.
     * @param  $dueMin Lower bound for a task's due date (as a RFC 3339 timestamp) to filter by. Optional. The default is not to filter by due date.
     * @param  $tasklist Task list identifier.
     */
    public function listTasks($tasklist, $completedMax = null, $completedMin = null, $dueMax = null, $dueMin = null, $maxResults = null, $pageToken = null, $showCompleted = null, $showDeleted = null, $showHidden = null, $updatedMin = null) {
      return $this->__call('list', array(array('dueMax' => $dueMax, 'showDeleted' => $showDeleted, 'updatedMin' => $updatedMin, 'completedMin' => $completedMin, 'maxResults' => $maxResults, 'showCompleted' => $showCompleted, 'pageToken' => $pageToken, 'completedMax' => $completedMax, 'showHidden' => $showHidden, 'dueMin' => $dueMin, 'tasklist' => $tasklist)));
    }
    /**
     * Updates the specified task. (tasks.update)
     *
     * @param  $tasklist Task list identifier.
     * @param  $task Task identifier.
     * @param $postBody the {@link Task}
     */
    public function update($task, $tasklist, Task $postBody) {
      return $this->__call('update', array(array('tasklist' => $tasklist, 'task' => $task, 'postBody' => $postBody)));
    }
    /**
     * Updates the specified task. This method supports patch semantics. (tasks.patch)
     *
     * @param  $tasklist Task list identifier.
     * @param  $task Task identifier.
     * @param $postBody the {@link Task}
     */
    public function patch($task, $tasklist, Task $postBody) {
      return $this->__call('patch', array(array('tasklist' => $tasklist, 'task' => $task, 'postBody' => $postBody)));
    }
    /**
     * Deletes the specified task from the task list. (tasks.delete)
     *
     * @param  $tasklist Task list identifier.
     * @param  $task Task identifier.
     */
    public function delete($task, $tasklist) {
      return $this->__call('delete', array(array('tasklist' => $tasklist, 'task' => $task)));
    }
  }

  /**
   * The "tasklists" collection of methods.
   * Typical usage is:
   *  <code>
   *   $tasksService = new apiTasksService(...);
   *   $tasklists = $tasksService->tasklists;
   *  </code>
   */
  class TasklistsServiceResource extends apiServiceResource {


    /**
     * Creates a new task list and adds it to the authenticated user's task lists. (tasklists.insert)
     *
     * @param $postBody the {@link TaskList}
     */
    public function insert(TaskList $postBody) {
      return $this->__call('insert', array(array('postBody' => $postBody)));
    }
    /**
     * Returns the authenticated user's specified task list. (tasklists.get)
     *
     * @param  $tasklist Task list identifier.
     */
    public function get($tasklist) {
      return $this->__call('get', array(array('tasklist' => $tasklist)));
    }
    /**
     * Returns all the authenticated user's task lists. (tasklists.list)
     *
     * @param  $pageToken Token specifying the result page to return. Optional.
     * @param  $maxResults Maximum number of task lists returned on one page. Optional. The default is 100.
     */
    public function listTasklists($maxResults = null, $pageToken = null) {
      return $this->__call('list', array(array('pageToken' => $pageToken, 'maxResults' => $maxResults)));
    }
    /**
     * Updates the authenticated user's specified task list. (tasklists.update)
     *
     * @param  $tasklist Task list identifier.
     * @param $postBody the {@link TaskList}
     */
    public function update($tasklist, TaskList $postBody) {
      return $this->__call('update', array(array('tasklist' => $tasklist, 'postBody' => $postBody)));
    }
    /**
     * Updates the authenticated user's specified task list. This method supports patch semantics.
     * (tasklists.patch)
     *
     * @param  $tasklist Task list identifier.
     * @param $postBody the {@link TaskList}
     */
    public function patch($tasklist, TaskList $postBody) {
      return $this->__call('patch', array(array('tasklist' => $tasklist, 'postBody' => $postBody)));
    }
    /**
     * Deletes the authenticated user's specified task list. (tasklists.delete)
     *
     * @param  $tasklist Task list identifier.
     */
    public function delete($tasklist) {
      return $this->__call('delete', array(array('tasklist' => $tasklist)));
    }
  }



/**
 * Service definition for Tasks (v1).
 *
 * <p>
 * Lets you manage your tasks and task lists.
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class apiTasksService {

  // Variables that the apiServiceResource implementation depends on.
  private $serviceName = 'tasks';
  private $version = 'v1';
  private $restBasePath = '/tasks/v1/';
  private $rpcPath = '/rpc';
  private $io;
  // apiServiceResource's that are used internally
  public $tasks;
  public $tasklists;
  /**
   * Constructs the internal representation of the Tasks service.
   *
   * @param apiClient apiClient
   */
  public function __construct(apiClient $apiClient) {
     $apiClient->addService($this->serviceName, $this->version);
     $this->io = $apiClient->getIo();
     $this->tasks = new TasksServiceResource($this, $this->serviceName, 'tasks', json_decode('{"methods": {"insert": {"scopes": ["https://www.googleapis.com/auth/tasks"], "parameters": {"tasklist": {"restParameterType": "path", "required": true, "type": "string"}, "parent": {"restParameterType": "query", "type": "string"}, "previous": {"restParameterType": "query", "type": "string"}}, "request": {"$ref": "Task"}, "rpcMethod": "tasks.tasks.insert", "httpMethod": "POST", "response": {"$ref": "Task"}, "restPath": "lists/{tasklist}/tasks"}, "get": {"scopes": ["https://www.googleapis.com/auth/tasks", "https://www.googleapis.com/auth/tasks.readonly"], "parameters": {"tasklist": {"restParameterType": "path", "required": true, "type": "string"}, "task": {"restParameterType": "path", "required": true, "type": "string"}}, "rpcMethod": "tasks.tasks.get", "httpMethod": "GET", "response": {"$ref": "Task"}, "restPath": "lists/{tasklist}/tasks/{task}"}, "clear": {"scopes": ["https://www.googleapis.com/auth/tasks"], "parameters": {"tasklist": {"restParameterType": "path", "required": true, "type": "string"}}, "rpcMethod": "tasks.tasks.clear", "httpMethod": "POST", "restPath": "lists/{tasklist}/clear"}, "move": {"scopes": ["https://www.googleapis.com/auth/tasks"], "parameters": {"previous": {"restParameterType": "query", "type": "string"}, "tasklist": {"restParameterType": "path", "required": true, "type": "string"}, "parent": {"restParameterType": "query", "type": "string"}, "task": {"restParameterType": "path", "required": true, "type": "string"}}, "rpcMethod": "tasks.tasks.move", "httpMethod": "POST", "response": {"$ref": "Task"}, "restPath": "lists/{tasklist}/tasks/{task}/move"}, "list": {"scopes": ["https://www.googleapis.com/auth/tasks", "https://www.googleapis.com/auth/tasks.readonly"], "parameters": {"dueMax": {"restParameterType": "query", "type": "string"}, "tasklist": {"restParameterType": "path", "required": true, "type": "string"}, "pageToken": {"restParameterType": "query", "type": "string"}, "updatedMin": {"restParameterType": "query", "type": "string"}, "completedMin": {"restParameterType": "query", "type": "string"}, "maxResults": {"restParameterType": "query", "minimum": "-9223372036854775808", "type": "integer", "maximum": "9223372036854775807"}, "showCompleted": {"restParameterType": "query", "type": "boolean"}, "showDeleted": {"restParameterType": "query", "type": "boolean"}, "completedMax": {"restParameterType": "query", "type": "string"}, "showHidden": {"restParameterType": "query", "type": "boolean"}, "dueMin": {"restParameterType": "query", "type": "string"}}, "rpcMethod": "tasks.tasks.list", "httpMethod": "GET", "response": {"$ref": "Tasks"}, "restPath": "lists/{tasklist}/tasks"}, "update": {"scopes": ["https://www.googleapis.com/auth/tasks"], "parameters": {"tasklist": {"restParameterType": "path", "required": true, "type": "string"}, "task": {"restParameterType": "path", "required": true, "type": "string"}}, "request": {"$ref": "Task"}, "rpcMethod": "tasks.tasks.update", "httpMethod": "PUT", "response": {"$ref": "Task"}, "restPath": "lists/{tasklist}/tasks/{task}"}, "patch": {"scopes": ["https://www.googleapis.com/auth/tasks"], "parameters": {"tasklist": {"restParameterType": "path", "required": true, "type": "string"}, "task": {"restParameterType": "path", "required": true, "type": "string"}}, "request": {"$ref": "Task"}, "rpcMethod": "tasks.tasks.patch", "httpMethod": "PATCH", "response": {"$ref": "Task"}, "restPath": "lists/{tasklist}/tasks/{task}"}, "delete": {"scopes": ["https://www.googleapis.com/auth/tasks"], "parameters": {"tasklist": {"restParameterType": "path", "required": true, "type": "string"}, "task": {"restParameterType": "path", "required": true, "type": "string"}}, "rpcMethod": "tasks.tasks.delete", "httpMethod": "DELETE", "restPath": "lists/{tasklist}/tasks/{task}"}}}', true));
     $this->tasklists = new TasklistsServiceResource($this, $this->serviceName, 'tasklists', json_decode('{"methods": {"insert": {"scopes": ["https://www.googleapis.com/auth/tasks"], "request": {"$ref": "TaskList"}, "rpcMethod": "tasks.tasklists.insert", "httpMethod": "POST", "response": {"$ref": "TaskList"}, "restPath": "users/@me/lists"}, "get": {"scopes": ["https://www.googleapis.com/auth/tasks", "https://www.googleapis.com/auth/tasks.readonly"], "parameters": {"tasklist": {"restParameterType": "path", "required": true, "type": "string"}}, "rpcMethod": "tasks.tasklists.get", "httpMethod": "GET", "response": {"$ref": "TaskList"}, "restPath": "users/@me/lists/{tasklist}"}, "list": {"scopes": ["https://www.googleapis.com/auth/tasks", "https://www.googleapis.com/auth/tasks.readonly"], "parameters": {"pageToken": {"restParameterType": "query", "type": "string"}, "maxResults": {"restParameterType": "query", "minimum": "-9223372036854775808", "type": "integer", "maximum": "9223372036854775807"}}, "rpcMethod": "tasks.tasklists.list", "httpMethod": "GET", "response": {"$ref": "TaskLists"}, "restPath": "users/@me/lists"}, "update": {"scopes": ["https://www.googleapis.com/auth/tasks"], "parameters": {"tasklist": {"restParameterType": "path", "required": true, "type": "string"}}, "request": {"$ref": "TaskList"}, "rpcMethod": "tasks.tasklists.update", "httpMethod": "PUT", "response": {"$ref": "TaskList"}, "restPath": "users/@me/lists/{tasklist}"}, "patch": {"scopes": ["https://www.googleapis.com/auth/tasks"], "parameters": {"tasklist": {"restParameterType": "path", "required": true, "type": "string"}}, "request": {"$ref": "TaskList"}, "rpcMethod": "tasks.tasklists.patch", "httpMethod": "PATCH", "response": {"$ref": "TaskList"}, "restPath": "users/@me/lists/{tasklist}"}, "delete": {"scopes": ["https://www.googleapis.com/auth/tasks"], "parameters": {"tasklist": {"restParameterType": "path", "required": true, "type": "string"}}, "rpcMethod": "tasks.tasklists.delete", "httpMethod": "DELETE", "restPath": "users/@me/lists/{tasklist}"}}}', true));
  }

  /**
   * @return the $io
   */
  public function getIo() {
    return $this->io;
  }
  /**
   * @return the $version
   */
  public function getVersion() {
    return $this->version;
  }

  /**
   * @return the $restBasePath
   */
  public function getRestBasePath() {
    return $this->restBasePath;
  }

  /**
   * @return the $rpcPath
   */
  public function getRpcPath() {
    return $this->rpcPath;
  }
}

class Task {

  public $status;
  public $kind;
  public $updated;
  public $parent;
  public $title;
  public $deleted;
  public $completed;
  public $due;
  public $etag;
  public $notes;
  public $position;
  public $hidden;
  public $id;
  public $selfLink;

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
  
  public function setUpdated($updated) {
    $this->updated = $updated;
  }

  public function getUpdated() {
    return $this->updated;
  }
  
  public function setParent($parent) {
    $this->parent = $parent;
  }

  public function getParent() {
    return $this->parent;
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
  public function setDeleted($deleted) {
    $this->deleted = $deleted;
  }

  public function getDeleted() {
    return $this->deleted;
  }
  
  public function setCompleted($completed) {
    $this->completed = $completed;
  }

  public function getCompleted() {
    return $this->completed;
  }
  
  public function setDue($due) {
    $this->due = $due;
  }

  public function getDue() {
    return $this->due;
  }
  
  public function setEtag($etag) {
    $this->etag = $etag;
  }

  public function getEtag() {
    return $this->etag;
  }
  
  public function setNotes($notes) {
    $this->notes = $notes;
  }

  public function getNotes() {
    return $this->notes;
  }
  
  public function setPosition($position) {
    $this->position = $position;
  }

  public function getPosition() {
    return $this->position;
  }
  
  public function setHidden($hidden) {
    $this->hidden = $hidden;
  }

  public function getHidden() {
    return $this->hidden;
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


class TaskList {

  public $kind;
  public $etag;
  public $id;
  public $selfLink;
  public $title;

  public function setKind($kind) {
    $this->kind = $kind;
  }

  public function getKind() {
    return $this->kind;
  }
  
  public function setEtag($etag) {
    $this->etag = $etag;
  }

  public function getEtag() {
    return $this->etag;
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
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
  
}


class TaskLists {

  public $nextPageToken;
  public $items;
  public $kind;
  public $etag;

  public function setNextPageToken($nextPageToken) {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken() {
    return $this->nextPageToken;
  }
  
  public function setItems( TaskList $items) {
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
  
  public function setEtag($etag) {
    $this->etag = $etag;
  }

  public function getEtag() {
    return $this->etag;
  }
  
}


class Tasks {

  public $nextPageToken;
  public $items;
  public $kind;
  public $etag;

  public function setNextPageToken($nextPageToken) {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken() {
    return $this->nextPageToken;
  }
  
  public function setItems( Task $items) {
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
  
  public function setEtag($etag) {
    $this->etag = $etag;
  }

  public function getEtag() {
    return $this->etag;
  }
  
}


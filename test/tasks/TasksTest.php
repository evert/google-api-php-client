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

require_once '../src/apiClient.php';
require_once '../src/contrib/apiTasksService.php';

// These variables are shared between all the tasks
// test cases as performance optimization.
$apiClient = null;
$tasks = null;

class TasksTest extends PHPUnit_Framework_TestCase {
  public $apiClient;
  public $oauthToken;
  public $taskService;

  private $origConfig = false;

  public function __construct() {
    global $apiConfig, $apiClient, $taskService;
    parent::__construct();

    if (! $apiClient || ! $taskService) {
      $this->origConfig = $apiConfig;
      // Set up a predictable, default envirioment so the test results are predictable
      //$apiConfig['oauth2_client_id'] = 'INSERT_CLIENT_ID';
      //$apiConfig['oauth2_client_secret'] = 'INSERT_CLIENT_SECRET';
      $apiConfig['authClass'] = 'apiOAuth2';
      $apiConfig['ioClass'] = 'apiCurlIO';
      $apiConfig['cacheClass'] = 'apiFileCache';
      $apiConfig['ioFileCache_directory'] = '/tmp/googleApiTests';

      $apiClient = new apiClient();
      $taskService = new apiTasksService($apiClient);
      $apiClient->setAccessToken($apiConfig['oauth_test_token']);
    }
    $this->apiClient = $apiClient;
    $this->taskService = $taskService;
  }

  public function __destruct() {
    global $apiConfig;
    $this->taskService = null;
    $this->apiClient = null;
    if ($this->origConfig) {
      $apiConfig = $this->origConfig;
    }
  }
  
  public function testInsertTask() {
    $list = $this->createTaskList('List: ' . __METHOD__);
            
    $task = $this->createTask('Task: '.__METHOD__, $list['id']);
    $this->assertIsTask($task);
  }

  public function testGetTask() {
    $tasks = $this->taskService->tasks;
    $taskList = $this->taskService->tasklists;

    $list = $this->createTaskList('List: ' . __METHOD__);
    $task = $this->createTask('Task: '.__METHOD__, $list['id']);

    $task = $tasks->get($task['id'], $list['id']);
    $this->assertIsTask($task);
  }

  public function testListTask() {
    $tasks = $this->taskService->tasks;
    $list = $this->createTaskList('List: ' . __METHOD__);

    for ($i=0; $i<5; $i++) {
      $this->createTask("Task: $i ".__METHOD__, $list['id']);
    }

    $tasksArray = $tasks->listTasks($list['id']);
    $this->assertTrue(sizeof($tasksArray) > 1);
    foreach ($tasksArray['items'] as $task) {
      $this->assertIsTask($task);
    }
  }

  private function createTaskList($name) {
    $taskList = $this->taskService->tasklists;
    $list = new TaskList();
      
    $list->title = $name;
    return $taskList->insert($list);
  }

  private function createTask($title, $listId) {
    $tasks = $this->taskService->tasks;
    $task = new Task();

    $task->title = $title;
    return $tasks->insert($listId, $task);
  }

  private function assertIsTask($task) {
    $this->assertArrayHasKey('title', $task);
    $this->assertArrayHasKey('kind', $task);
    $this->assertArrayHasKey('id', $task);
    $this->assertArrayHasKey('position', $task);
  }
}

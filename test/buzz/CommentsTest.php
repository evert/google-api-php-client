<?php

/**
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

class CommentsTest extends apiBuzzTest {

  private $activityId = false;

  public function setUp() {
    if (! $this->activityId) {
      // find an activity in the @publicstream with comments that we can test with
      $activities = $this->buzz->activities->listActivities('@me', '@public', array('max-results' => 100));
      if (isset($activities['items']) && count($activities['items'])) {
        foreach ($activities['items'] as $activity) {
          if (isset($activity['links']['replies'][0]) && (int)$activity['links']['replies'][0]['count'] > 0) {
            $this->activityId = $activity['id'];
            break;
          }
        }
      }
    }
    if (! $this->activityId) {
      throw new Exception("Could not find a buzz post with comments attached to it in the test user's public stream");
    }
  }

  public function testListAndGetComments() {
    // check the basic comments feed for the activity selected activity
    $opt_params = array('max-results' => 20);
    $comments = $this->buzz->comments->listComments('@me', '@self', $this->activityId, $opt_params);
    $this->assertArrayHasKey('kind', $comments);
    $this->assertEquals('buzz#commentFeed', $comments['kind']);
    $this->assertArrayHasKey('links', $comments);
    $this->assertArrayHasKey('title', $comments);
    $this->assertArrayHasKey('updated', $comments);
    $this->assertArrayHasKey('id', $comments);
    $this->assertArrayHasKey('items', $comments);
    $this->assertTrue(is_array($comments['links']));
    $this->assertTrue(is_array($comments['items']));

    $comment = $comments['items'][0];
    $this->evaluateComment($comment);

    // test getComments()
    $comment = $this->buzz->comments->get($comment['id'], $this->activityId, '@self');
    $this->evaluateComment($comment);
  }

  /**
   * @depends testListAndGetComments
   */
  public function testInsertUpdateAndDeleteComments() {
    // test insert
    $comment = $this->buzz->comments->insert($this->activityId, '@self', array('data' => array('content' => 'Testing insertComment()')));
    $this->evaluateComment($comment);
    $this->assertEquals('Testing insertComment()', $comment['content']);
    $this->assertEquals('Testing insertComment()', $comment['originalContent']);

    // test update
    $comment = $this->buzz->comments->update('@me', $this->activityId, $comment['id'], '@self', new Comment(array('content' => 'Testing updateComment()')));
    $this->evaluateComment($comment);
    $this->assertEquals('Testing updateComment()', $comment['content']);
    $this->assertEquals('Testing updateComment()', $comment['originalContent']);

    // test delete
    $this->buzz->comments->delete('@me', $this->activityId, $comment['id']);
  }

  private function evaluateComment($comment) {
    $this->assertArrayHasKey('kind', $comment);
    $this->assertEquals('buzz#comment', $comment['kind']);
    $this->assertArrayHasKey('id', $comment);
    $this->assertArrayHasKey('published', $comment);
    $this->assertArrayHasKey('updated', $comment);
    $this->assertArrayHasKey('actor', $comment);
    $this->assertArrayHasKey('content', $comment);
    $this->assertArrayHasKey('links', $comment);
    $this->assertTrue(is_array($comment['links']));
    $this->assertTrue(is_array($comment['actor']));
  }

}
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

class GroupsTest extends apiBuzzTest {

  private $cleanedGroups = false;

  public function setUp() {
    parent::setUp();
    if (! $this->cleanedGroups) {
      try {
        // clean up from any failed previous runs which that would have left test groups behind
        $opt = array('max-results' => 50);
        $groups = $this->buzz->groups->listGroups('@me', $opt);
        foreach ($groups['items'] as $group) {
          if ($group['title'] == 'Google API Client Test Group'
              || $group['title'] == 'Google API Client Updated Group'
              || $group['title'] == 'Google API Client Duplicate Group') {
            try {
              $this->buzz->groups->delete('@me', $group['id']);
            } catch (apiServiceException $e) {
              // ignore, group didn't exist
            }
          }
        }
      } catch (apiServiceException $e) {
        // ignore, group didn't exist
      }
      $this->cleanedGroups = true;
    }
  }

  public function testListGroups() {
    $opt = array('max-results' => 50);
    $groups = $this->buzz->groups->listGroups('@me', $opt);
    $this->assertTrue(is_array($groups));
    $this->assertArrayHasKey('kind', $groups);
    $this->assertEquals('buzz#groupFeed', $groups['kind']);
    $this->assertArrayHasKey('links', $groups);
    $this->assertArrayHasKey('items', $groups);
    $this->assertTrue(is_array($groups['items']));
    $this->evaluateGroup($groups['items'][0]);
  }

  /**
   * @depends testListGroups
   */
  public function testDuplicateGroup() {
    $group = new Group();
    $group->setTitle('Google API Client Duplicate Group' . time());

    try {
      $group = $this->buzz->groups->insert('@me', $group);
      $this->buzz->groups->insert('@me', new Group($group));
    } catch (apiServiceException $e) {
      $this->buzz->groups->delete('@me', $group['id']);
      return;
    }
    $this->buzz->groups->delete('@me', $group['id']);
    $this->fail('Missing apiServiceException on creating a duplicate group');
  }

  /**
   * @depends testListGroups
   */
  public function testInsertUpdateAndDeleteGroups() {
    $group = new Group();
    $group->setTitle('Google API Client Duplicate Group' . time());
    $group = $this->buzz->groups->insert('@me', $group);
      
    $this->evaluateGroup($group);

    $group = $this->buzz->groups->get('@me', $group['id']);
    $this->evaluateGroup($group);

    $validateGroup = $this->buzz->groups->get('@me', $group['id']);
    $this->evaluateGroup($validateGroup);
    $this->assertEquals($validateGroup['title'], $group['title']);
    $this->assertEquals($validateGroup['id'], $group['id']);

    $this->buzz->groups->delete('@me', $group['id']);
  }

  private function evaluateGroup($group) {
    $this->assertTrue(is_array($group));
    $this->assertArrayHasKey('kind', $group);
    $this->assertEquals('buzz#group', $group['kind']);
    $this->assertArrayHasKey('id', $group);
    $this->assertArrayHasKey('title', $group);
    $this->assertArrayHasKey('links', $group);
    if (isset($group['memberCount'])) {
      $this->assertTrue(is_numeric($group['memberCount']));
    }
  }
}
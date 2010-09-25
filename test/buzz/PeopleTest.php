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

class PeopleTest extends apiBuzzTest {

  private $groupId;
  private $personId;

  public function __construct() {
    global $apiConfig;
    parent::__construct();
    // try to find a group ID we can use for the various people tests
    $groups = $this->buzz->listGroups('@me', 20);
    foreach ($groups['items'] as $group) {
      if (isset($group['memberCount']) && $group['memberCount'] > 2) {
        $this->groupId = $group['id'];
        break;
      }
    }
    if (! $this->groupId) {
      throw new Exception("Could not run people test because there are no groups available with 2 or more contacts");
    }

    // try to find someone to test un- & follow with
    $people = $this->buzz->listPeople('@following', $apiConfig['oauth_test_user'], 10);
    if (isset($people['entry']) && count($people['entry'])) {
      $this->personId = $people['entry'][0]['id'];
    }
    if (! $this->personId) {
      throw new Exception("Could not run people follow/unfollow tests because the test account isn't following anyone");
    }
  }

  public function testGetPeople() {
    global $apiConfig;
    $person = $this->buzz->getPeople($apiConfig['oauth_test_user']);
    $this->evaluatePerson($person);
  }

  public function testListPeople() {
    global $apiConfig;
    $people = $this->buzz->listPeople($this->groupId, $apiConfig['oauth_test_user'], 10);

    // test the basic feed properties
    $this->assertArrayHasKey('kind', $people);
    $this->assertEquals('buzz#peopleFeed', $people['kind']);
    $this->assertArrayHasKey('startIndex', $people);
    $this->assertArrayHasKey('itemsPerPage', $people);
    $this->assertArrayHasKey('totalResults', $people);
    $this->assertArrayHasKey('entry', $people);

    // and see if it contains valid people
    $this->evaluatePerson($people['entry'][0]);
  }

  /**
   * @depends testListPeople
   */
  public function testFollowers() {
    global $apiConfig;
    $people = $this->buzz->listPeople('@followers', $apiConfig['oauth_test_user'], 10);
    // test the basic feed properties
    $this->assertArrayHasKey('kind', $people);
    $this->assertEquals('buzz#peopleFeed', $people['kind']);
    $this->assertArrayHasKey('startIndex', $people);
    $this->assertArrayHasKey('itemsPerPage', $people);
    $this->assertArrayHasKey('totalResults', $people);
    $this->assertArrayHasKey('entry', $people);

    // and see if it contains valid people
    $this->evaluatePerson($people['entry'][0]);
  }

  /**
   * @depends testFollowers
   */
  public function testFollowing() {
    global $apiConfig;
    $people = $this->buzz->listPeople('@following', $apiConfig['oauth_test_user'], 10);
    // test the basic feed properties
    $this->assertArrayHasKey('kind', $people);
    $this->assertEquals('buzz#peopleFeed', $people['kind']);
    $this->assertArrayHasKey('startIndex', $people);
    $this->assertArrayHasKey('itemsPerPage', $people);
    $this->assertArrayHasKey('totalResults', $people);
    $this->assertArrayHasKey('entry', $people);

    // and see if it contains valid people
    $this->evaluatePerson($people['entry'][0]);
  }

  /**
   * @depends testFollowing
   */
  public function testDeletePeople() {
    global $apiConfig;
    // stop following the test user
    $this->buzz->deletePeople('@following', $apiConfig['oauth_test_user'], $this->personId);
    // check to see if we're not following the user anymore
    $people = $this->buzz->listPeople('@following', $apiConfig['oauth_test_user'], 1000000);
    $found = false;
    foreach ($people['entry'] as $person) {
      if ($person['id'] == $this->personId) {
        $found = true;
        break;
      }
    }
    $this->assertFalse($found);
  }

  /**
   * @depends testDeletePeople
   */
  public function testUpdatePeople() {
    global $apiConfig;
    $this->buzz->updatePeople('@following', $apiConfig['oauth_test_user'], $this->personId, '');
    // assert that we're now following this user again
    $people = $this->buzz->listPeople('@following', $apiConfig['oauth_test_user'], 1000000);
    $found = false;
    foreach ($people['entry'] as $person) {
      if ($person['id'] == $this->personId) {
        $found = true;
        break;
      }
    }
    $this->assertTrue($found);
  }

  public function testLikedPeople() {
    $this->assertTrue(true);
  }

  public function testSearchPeople() {
    $this->assertTrue(true);
  }

  public function testRelatedToUriPeople() {
    $this->assertTrue(true);
  }

  public function testResharedPeople() {
    $this->assertTrue(true);
  }

  private function evaluatePerson($person) {
    $this->assertArrayHasKey('kind', $person);
    $this->assertEquals('buzz#person', $person['kind']);
    $this->assertArrayHasKey('id', $person);
    $this->assertArrayHasKey('displayName', $person);
    $this->assertArrayHasKey('aboutMe', $person);
    $this->assertArrayHasKey('profileUrl', $person);
    $this->assertArrayHasKey('urls', $person);
    $this->assertArrayHasKey('photos', $person);
  }

}
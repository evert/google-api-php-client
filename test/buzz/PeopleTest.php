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

  public function setUp() {
    global $apiConfig;
    parent::setUp();
    // setUp is called for each test, make sure to only do the (expensive) pre-population of data only once
    if (! $this->groupId && ! $this->personId) {
      // try to find a group ID we can use for the various people tests
      $opt_params = array('max-results' => 20);
      $groups = $this->buzz->groups->listGroups('@me', $opt_params);
      foreach ($groups['items'] as $group) {
        if (isset($group['memberCount']) && $group['memberCount'] > 1) {
          $this->groupId = $group['id'];
          break;
        }
      }
      if (! $this->groupId) {
        throw new Exception("Could not run people test because there are no groups available with 2 or more contacts");
      }
      // try to find someone to test un- & follow with
      $opt_params = array("max-results" => 10);
      $people = $this->buzz->people->listPeople(
          $apiConfig['oauth_test_user'], '@following', $opt_params);
      if (isset($people['entry']) && count($people['entry'])) {
        $this->personId = $people['entry'][0]['id'];
      }
      if (! $this->personId) {
        //throw new Exception("Could not run people follow/unfollow tests because the test account isn't following anyone");
      }
    }
  }

  public function testGetPeople() {
    global $apiConfig;
    $person = $this->buzz->people->get($apiConfig['oauth_test_user']);
    $this->evaluatePerson($person);
  }

  public function testListPeople() {
    global $apiConfig;
    $people = $this->buzz->people->listPeople($apiConfig['oauth_test_user'], $this->groupId);

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
    $people = $this->buzz->people->listPeople($apiConfig['oauth_test_user'], '@followers');
    // test the basic feed properties
    $this->assertArrayHasKey('kind', $people);
    $this->assertEquals('buzz#peopleFeed', $people['kind']);
    $this->assertArrayHasKey('startIndex', $people);
    $this->assertArrayHasKey('itemsPerPage', $people);
    $this->assertArrayHasKey('totalResults', $people);
  }

  /**
   * @depends testFollowers
   */
  public function testFollowing() {
    global $apiConfig;
    $people = $this->buzz->people->listPeople($apiConfig['oauth_test_user'], '@following');
    
    // test the basic feed properties
    $this->assertArrayHasKey('kind', $people);
    $this->assertEquals('buzz#peopleFeed', $people['kind']);
    $this->assertArrayHasKey('startIndex', $people);
    $this->assertArrayHasKey('itemsPerPage', $people);
    $this->assertArrayHasKey('totalResults', $people);
  }

  /**
   * @depends testDeletePeople
   */
  public function testUpdatePeople() {
    global $apiConfig;
    $p = new Person();
    $p->id = $this->personId;
    $p->aboutMe = 'foo';
    $this->buzz->people->update($apiConfig['oauth_test_user'], '@following', $this->personId, $p);
    // assert that we're now following this user again
    $people = $this->buzz->people->listPeople($apiConfig['oauth_test_user'], '@following');
    $found = false;
    foreach ($people['entry'] as $person) {
      if ($person['id'] == $this->personId) {
        $found = true;
        break;
      }
    }
    $this->assertTrue($found);
  }

  public function testSearchPeople() {
    $opt_params = array('max-results' => 10, 'q' => 'Test');
    $people = $this->buzz->people->search($opt_params);
    $this->assertArrayHasKey('kind', $people);
    $this->assertArrayHasKey('startIndex', $people);
    $this->assertArrayHasKey('itemsPerPage', $people);
    $this->assertArrayHasKey('entry', $people);
    $this->assertTrue((count($people['entry']) > 0));
    $this->evaluatePerson($people['entry'][0]);
  }

  private function evaluatePerson($person) {
    $this->assertArrayHasKey('kind', $person);
    $this->assertEquals('buzz#person', $person['kind']);
    $this->assertArrayHasKey('id', $person);
    $this->assertArrayHasKey('displayName', $person);
    $this->assertArrayHasKey('profileUrl', $person);
  }
}

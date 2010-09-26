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
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

class RelatedTest extends apiBuzzTest {
  public function testRelated() {
    $related = $this->buzz->listRelated('@self', '@me', 'tag:google.com,2010:buzz:z122xx25xsazeroqe04cdpjqtv3lznixdd0', 20);

    //  check if the the basic root elements match what is expected
    $this->assertArrayHasKey('kind', $related);
    $this->assertEquals('buzz#relatedFeed', $related['kind']);

    $this->assertArrayHasKey('links', $related);
    $this->assertArrayHasKey('title', $related);
    $this->assertArrayHasKey('updated', $related);
    $this->assertArrayHasKey('id', $related);
    $this->assertArrayHasKey('items', $related);

    // does the feed have any items in it?
    $this->assertTrue(count($related['items']) > 0);

    // and check if the fields in the items are as expected
    $this->arrayHasKey('kind', $related['items'][0]);
    $this->assertEquals('buzz#related', $related['items'][0]['kind']);
    $this->arrayHasKey('id', $related['items'][0]);
    $this->arrayHasKey('href', $related['items'][0]);
    $this->arrayHasKey('title', $related['items'][0]);
    $this->arrayHasKey('summary', $related['items'][0]);
  }

}
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

// Include the common header UI
require_once "includes/header.php";

// Include the Google API Client library, and the Buzz Service wrapper
require_once "../../src/apiClient.php";
require_once "../../src/contrib/apiBuzzService.php";

// Include the utility function to display a buzz post- This is only intended to be a demo and a developer should create the UI that works for their app
require_once 'includes/displayBuzzPost.php';

// Setup the API Client, and create the Buzz client using it
$apiClient = new apiClient();
$buzz = new apiBuzzService($apiClient);

// If a oauth token was stored in the session, use that- and otherwise go through the oauth dance
if (isset($_SESSION['auth_token'])) {
  $apiClient->setAccessToken($_SESSION['auth_token']);
} else {
  // In a real application this would be stored in a database, and not in the session!
  $_SESSION['auth_token'] = $apiClient->authenticate();
}

// Get the consumption stream (the activities from the people you're following) for @me, which means 'the authenticated user', using $buzz->listActivities()
$activities = $buzz->listActivities('@consumption', '@me', null, null, null, null);
//echo "<pre>".print_r($activities, true)."</pre>";

foreach ($activities['items'] as $buzzPost) {
  displayBuzzPost($buzzPost);
}

// Include the common footer UI
require_once "includes/footer.php";

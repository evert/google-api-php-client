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
session_start();

require_once '../../src/apiClient.php';
require_once '../../src/contrib/apiBuzzService.php';

global $apiConfig;

// Visit https://code.google.com/apis/console to
// generate your oauth2_client_id, oauth2_client_secret, and to
// register your oauth2_redirect_uri.
//$apiConfig['oauth2_client_id'] = 'INSERT_CLIENT_ID';
//$apiConfig['oauth2_client_secret'] = 'INSERT_CLIENT_SECRET';
//$apiConfig['oauth2_redirect_uri'] = 'http://YOUR_REDIRECT_URI';
$apiConfig['authClass'] = 'apiOAuth2';

$client = new apiClient();
$client->setApplicationName("OAuth2_Example_App");

$buzz = new apiBuzzService($client);

if (isset($_SESSION['access_token'])) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $client->setAccessToken($client->authenticate());
}
$_SESSION['access_token'] = $client->getAccessToken();
?>
<!doctype html>
<html>
<head>
  <title>OAuth2 Sample</title>
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Droid+Serif|Droid+Sans:regular,bold' />
  <link rel='stylesheet' href='css/style.css' />
</head>
<body>
<div id='container'>
  <div id='top'>
    <div id='identity'>
    <?php if ($client->getAccessToken()) {
      $me = $buzz->people->get('@me');
      $ident = '<img alt="photo" src="%s"> <a href="%s">%s</a>';
      printf($ident, $me['thumbnailUrl'], $me['profileUrl'], $me['displayName']);
    }?>
    </div>
    <h1>Google APIs Client Library for PHP: OAuth2 Sample</h1>
  </div>
  <div id='main'>
<?php if ($client->getAccessToken()) {
  $activities = $buzz->activities->listActivities('@consumption', '@me');
  foreach ($activities['items'] as $activity) {
    $actor = $activity['actor'];
    echo <<<HTML
<div id='person'>
  <div><p id='name'><a href='{$actor['profileUrl']}'>{$actor['name']}</a></p></div>
  <p id='post'>{$activity['object']['content']}</p>
</div>
HTML;
  }
}
?>
  </div>
</div>
</body>
</html>
<?php $_SESSION['access_token'] = $client->getAccessToken(); ?>
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
require_once '../../src/apiClient.php';

defined('STDIN') or define('STDIN', fopen('php://stdin', 'r'));

global $apiConfig;

// Visit https://code.google.com/apis/console to
// generate your oauth2_client_id, oauth2_client_secret, and to
// register your oauth2_redirect_uri.
//$apiConfig['oauth2_client_id'] = 'INSERT_CLIENT_ID';
//$apiConfig['oauth2_client_secret'] = 'INSERT_CLIENT_SECRET';
$apiConfig['oauth2_redirect_uri'] ='urn:ietf:wg:oauth:2.0:oob';
$apiConfig['authClass'] ='apiOAuth2';

$client = new apiClient();
$client->setScopes(array(
  'https://www.googleapis.com/auth/buzz',
  'https://www.googleapis.com/auth/latitude',
  'https://www.googleapis.com/auth/moderator',
  'https://www.googleapis.com/auth/tasks',
  'https://www.googleapis.com/auth/siteverification',
  'https://www.googleapis.com/auth/urlshortener',
));

$authUrl = $client->createAuthUrl();

print "Please visit:\n$authUrl\n\n";
print "Please enter the auth code:\n";
$authCode = trim(fgets(STDIN));

$_GET['code'] = $authCode;
var_dump($client->authenticate());

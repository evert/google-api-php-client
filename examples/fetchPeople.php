<?php
session_start();

require_once "../src/apiClient.php";
require_once "../src/contrib/apiBuzzService.php";

$apiClient = new apiClient();
$buzz = new apiBuzzService($apiClient);
$apiClient->discover('buzz');

if (isset($_SESSION['oauth_access_token'])) {
  $apiClient->setAccessToken($_SESSION['oauth_access_token']);
} else {
  $token = $apiClient->authenticate();
  $_SESSION['oauth_access_token'] = $token;
}

$people = $buzz->listPeople('@following', '@me');

echo "<pre>" . print_r($people, true) . "</pre>";

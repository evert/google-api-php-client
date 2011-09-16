<?php
session_start();

require_once "../../src/apiClient.php";
require_once "../../src/contrib/apiBuzzService.php";

$apiClient = new apiClient();
$apiClient->setApplicationName("BuzzFetchPeople_Example_App");
$buzz = new apiBuzzService($apiClient);
$apiClient->discover('buzz');

if (isset($_SESSION['oauth_access_token'])) {
  $apiClient->setAccessToken($_SESSION['oauth_access_token']);
} else {
  $token = $apiClient->authenticate();
  $_SESSION['oauth_access_token'] = $token;
}

$people = $buzz->people->listPeople('@me', '@following');

echo "<pre>" . print_r($people, true) . "</pre>";

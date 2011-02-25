<?php
session_start();

require_once "../src/apiClient.php";

$apiClient = new apiClient();
$apiClient->discover('buzz');
$apiClient->discover('moderator');
$apiClient->authenticate();

if (isset($_SESSION['oauth_access_token'])) {
  $apiClient->setAccessToken($_SESSION['oauth_access_token']);
} else {
  $token = $apiClient->authenticate();
  $_SESSION['oauth_access_token'] = $token;
}

echo "<pre>" . print_r($apiClient->moderator, true) . "</pre>";
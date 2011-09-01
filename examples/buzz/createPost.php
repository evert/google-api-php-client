<?php
session_start();

require_once "../src/apiClient.php";

$apiClient = new apiClient();
$client->setApplicationName("BuzzDiscoveryCreatePost_Example_App");
$apiClient->discover('buzz');
$apiClient->authenticate();

if (isset($_SESSION['oauth_access_token'])) {
  $apiClient->setAccessToken($_SESSION['oauth_access_token']);
} else {
  $token = $apiClient->authenticate();
  $_SESSION['oauth_access_token'] = $token;
}

$activityObj = new ActivityObject();
$activityObj->setContent('Testing the Google API PHP Client library');
$activityObj->setType('note');

$activity = new Activity();
$activity->setObject($activityObj);

$newPost = $buzz->activities->insert('@me', $activity);

echo "<pre>post created:\n".print_r($newPost, true)."\n</pre>";

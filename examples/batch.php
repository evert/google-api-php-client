<?php
session_start();

require_once "../src/apiClient.php";

$apiClient = new apiClient();
$apiClient->discover('buzz');
$apiClient->authenticate();

if (isset($_SESSION['oauth_access_token'])) {
  $apiClient->setAccessToken($_SESSION['oauth_access_token']);
} else {
  $token = $apiClient->authenticate();
  $_SESSION['oauth_access_token'] = $token;
}

$ret = apiBatch::execute(
  $apiClient->buzz->activities->list(array('userId' => '@me', 'scope' => '@consumption'), 'listActivitiesKey'),
  $apiClient->buzz->people->get(array('userId' => '@me'), 'getPeopleKey')
);

echo "<pre>" . print_r($ret, true) . "</pre>";

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

$post = array(
  'data' => array(
     'object' => array(
        'type' => 'note',
        'content' => 'Testing the Google API PHP Client library'
      )
  )
);

$newPost = $apiClient->buzz->activities->insert(array('userId' => '@me', 'postBody' => $post));

echo "<pre>post created:\n".print_r($newPost, true)."\n</pre>";
<?php
session_start();

require_once "../src/apiClient.php";


$apiClient = new apiClient();
//$apiClient->discover('moderator');
$apiClient->discover('buzz', 'v1.0');

if (isset($_SESSION['oauth_access_token'])) {
  $apiClient->setAccessToken($_SESSION['oauth_access_token']);
} else {
  $token = $apiClient->authenticate();
  $_SESSION['oauth_access_token'] = $token;
}
//, 'postId' => 'tag:google.com,2010:buzz:z13rzxkicxi2tbyig04cdpjqtv3lznixdd0', 'max-results' => 20, 'c' => 2
$activites = $apiClient->buzz->people->list(array('userId' => '@me', 'groupId' => 'tag:google.com,2010:buzz-group:108189587050871927619:13'));
echo "Activities: <pre>".print_r($activites, true)."</pre>";


/*
// these both work when creating a buzz post!
$postBody = '
{
  "data": {
    "object": {
      "type": "note",
      "content": "Testing a new library"
    }
  }
}
';

$post = array(
  'data' => array(
     'object' => array(
        'type' => 'note',
        'content' => 'Testing a new library'
      )
  )
);

$newPost = $apiClient->buzz->activities->insert(array('userId' => '@me', 'postBody' => $post));
echo "<pre>post created:\n".print_r($newPost, true)."\n</pre>";
*/

//$comments = $apiClient->buzz->activities->list(array('userId' => '@me', 'scope' => '@comments', 'max-results' => 4, 'c' => 2));
//echo "Comments: <pre>".print_r($comments, true)."</pre>";

//$liked = $apiClient->buzz->activities->list(array('userId' => '@me', 'scope' => '@liked'));
//echo "Liked: <pre>".print_r($liked, true)."</pre>";

//$activites = $apiClient->buzz->activities->list(array('userId' => '@me', 'scope' => '@self'));
//echo "Activities: <pre>".print_r($activites, true)."</pre>";

//$people= $apiClient->buzz->people->get(array('userId' => '@me'));
//echo "People: <pre>".print_r($people, true)."</pre>";

//$followers = $apiClient->buzz->groups->get(array('userId' => '@me', 'groupId' => '@followers'));
//echo "Followers: <pre>".print_r($followers, true)."</pre>";

//$groups = $apiClient->buzz->groups->list(array('userId' => '@me', 'max-results' => 2));
//echo "Groups: <pre>".print_r($groups, true)."</pre>";

//$friends = $apiClient->buzz->people->list(array('userId' => '@me', 'groupId' => 'tag:google.com,2010:buzz-group:108189587050871927619:13', 'max-results' => 40));
//echo "Friends: <pre>".print_r($friends, true)."</pre>";

<?php
session_start();

require_once "../src/apiClient.php";
require_once "../src/contrib/apiBuzzService.php";

$apiClient = new apiClient();
$buzz = new apiBuzzService($apiClient);
//$apiClient->discover('buzz');

if (isset($_SESSION['oauth_access_token'])) {
  $apiClient->setAccessToken($_SESSION['oauth_access_token']);
} else {
  $token = $apiClient->authenticate();
  $_SESSION['oauth_access_token'] = $token;
}

// Access token: {"access_token":"1\/3mbWto2dJZVCfy1T3ULp0g","expires_in":3600,"refresh_token":"1\/DLzWfXeiCxtIdhwnDOpZ6lzg68vHKb3kTQutJtOqw-M","created":1298391230}

//echo "<pre>" . print_r( $apiClient->buzz->activities->list(array('userId' => '@me', 'scope' => '@self')) , true) . "</pre>";

echo "<pre>" . print_r( $buzz->activities->listActivities('@consumption', '@me', 0, 10) , true) . "</pre>";
//echo "<pre>" . print_r( $apiClient->buzz->activities->list(array('scope' => '@consumption', 'userId' => '@me')) , true) . "</pre>";

/*
$post = array(
  'data' => array(
     'object' => array(
        'type' => 'note',
        'content' => 'Test post using the google-api-php-client library'
      )
  )
);

$newPost = $buzz->insertActivities('@me', $post);
echo "<pre>post created:\n".print_r($newPost, true)."\n</pre>";
*/

// If the OAuth2 token has changed, that means the short lived (1 hour) access token got refreshed, store the new token in the session
// or else it will keep refreshing, which is a big performance hit!
if ($apiClient->getAccessToken() != $_SESSION['oauth_access_token']) {
  echo "Access token has changed! updating session<pre>";


  echo "Old token:\n" .print_r($_SESSION['oauth_access_token'], true) . "\n\nNew token:\n".$apiClient->getAccessToken();
  $_SESSION['oauth_access_token'] = $apiClient->getAccessToken();

  echo "</pre>";
}

//$people = $buzz->listPeople('@following', '104562341873818767583', 2048);
//echo "<pre>" . print_r($people, true) . "</pre>";

//$groups = $buzz->listGroups('@me');
//echo "<pre>".print_r($groups, true) . "</pre>";

/*
ob_end_flush();
$c = true;
while ($c != null) {
  echo "<br><br><b>[continuationToken]</b> $c<br><br>";
  $act = $buzz->listActivities('@public', '@me', 0, 10, $c, 0);
  $c = isset($act['continuationToken']) ? $act['continuationToken'] : null;
  foreach ($act['items'] as $activity) {
    echo "<p>Activity {$activity['id']} at {$activity['published']}<br></p>"; flush();
  }
}
*/

/*$people = $buzz->listPeople('@following', '@me');
echo "<pre>Result:" . print_r($people, true) . "</pre>";
*/

/*
$ret = apiBatch::execute(
  $apiClient->buzz->activities->list(array('userId' => '@me', 'scope' => '@self'), 'listActivitiesKey'),
  $apiClient->buzz->people->get(array('userId' => '@me'), 'getPeopleKey')
);
echo "<pre>" . print_r($ret, true) . "</pre>";
*/

/*
$group = $buzz->insertGroups('@me', array('data' => array('title' => 'Test Group')));
echo "<pre>Created initial group:\n" . print_r($group, true) . "</pre>";

$group = $buzz->updateGroups($group['id'], '@me', array('data' => array('title' => 'Updated Group')));
echo "<pre>Updated group:\n" . print_r($group, true) . "</pre>";

echo "getGroups({$group['id']}, '@me');<br>";
$group = $buzz->getGroups($group['id'], '@me');
echo "<pre>getGroup:\n" . print_r($group, true) . "</pre>";
*/


/*
$group = $buzz->getGroups('G:110242419133439594545:3603238784925997337', '@me');
echo "<pre>getGroup (G:110242419133439594545:3603238784925997337):\n" . print_r($group, true) . "</pre>";

$groups = $buzz->listGroups('@me');
echo "<pre>".print_r($groups, true) . "</pre>";
*/


/*
$activityId = null;
$activities = $buzz->listActivities('@consumption', '@me');
if (isset($activities['items']) && count($activities['items'])) {
  foreach ($activities['items'] as $activity) {
    if (isset($activity['links']['replies'][0]) && (int) $activity['links']['replies'][0]['count'] > 0) {
      $activityId = $activity['id'];
      break;
    }
  }
}
if (!$activityId) {
  die("could not find an act with comments");
} else {
  echo "Activity id: $activityId<br>";
}
$comments = $buzz->listComments('@self', '@me', $activityId, 20);
echo "<pre>" . print_r($comments, true) . "</pre>";
*/


//$related = $buzz->listRelated('@self', '@me', 'tag:google.com,2010:buzz:z122xx25xsazeroqe04cdpjqtv3lznixdd0', 20);
//echo "<pre>".print_r($related, true)."</pre>";

/*
$people = $buzz->listPeople('@following', '@me', 10);
if (isset($people['entry']) && count($people['entry'])) {
  $personId = $people['entry'][0]['id'];
}
$ret = $buzz->updatePeople('@following', '@me', $personId, '');
echo "<pre>Result:" . print_r($ret, true) . "</pre>";
*/

//$activities = $buzz->listActivities('@consumption', '@me', 50, 50, null, 50);
//echo "<pre>Activities:\n" . print_r($activities, true) . "</pre>";

//$groups = $buzz->listGroups('@me', 20);
//echo "<pre>Groups:\n" . print_r($groups, true) . "</pre>";

/*// Batch 2 functions
$results = apiBatch::execute(
  $apiClient->buzz->activities->list(array('userId' => 'chabotc', 'scope' => '@public'), 'listActivities')
  //$apiClient->buzz->people->get(array('userId' => '@me'), 'getPeople')
);
echo "<pre>Batch Results:\n". print_r($results, true)."</pre>";
*/

// Old style call
//$activities = $apiClient->buzz->activities->list(array('userId' => '@me', 'scope' => '@consumption'));

/*
// New style using the apiBuzzService wrapper
$activities = $buzz->listActivities('@consumption', '@me');
echo "Activities: <pre>".print_r($activities, true)."</pre>";
*/

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

//$followers = $apiClient->buzz->groups->get(array('userId' => 'chabotc', 'groupId' => '@followers'));
//echo "Followers: <pre>".print_r($followers, true)."</pre>";

//$followers = $apiClient->buzz->groups->get(array('userId' => 'chabotc', 'groupId' => 'tag:google.com,2010:buzz-group:108189587050871927619:13'));
//echo "Followers: <pre>".print_r($followers, true)."</pre>";

//$groups = $apiClient->buzz->groups->list(array('userId' => '@me', 'max-results' => 2));
//echo "Groups: <pre>".print_r($groups, true)."</pre>";

//$friends = $apiClient->buzz->people->list(array('userId' => '@me', 'groupId' => 'tag:google.com,2010:buzz-group:108189587050871927619:13', 'max-results' => 40));
//echo "Friends: <pre>".print_r($friends, true)."</pre>";

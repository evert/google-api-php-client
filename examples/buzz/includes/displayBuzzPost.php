<?php

function displayBuzzPost($post) {
  $content = '';
  if (isset($post['object'])) {
    switch ($post['object']['type']) {
      case 'note':
        $content = $post['object']['content'];
        break;
      case 'activity':
        $content = "<p>".$post['annotation'] . "</p><br>" .
                   "Reshared post by <a href=\"{$post['object']['actor']['name']}\" target=\"_blank\">{$post['object']['actor']['name']}</a>:<br>" .
                   "<div style=\"margin-left:12px; margin-top:12px\">{$post['object']['content']}</div>";
        break;
      default:
        // at the moment buzz only produces note objects, so anything else is unsupported
        $content = "<span class=\"error\">Unsupported activity object type: '{$post['object']['type']}'</span><br>";
        echo "<pre>" . print_r($post, true) . "</pre>";
        break;
    }
  } else {
    echo "[displayBuzzPost] object not set!<br>";
    // this happens on posts with a visibility set, currently private posts are not accessible through the REST API
  }

  $photoContent = $articleContent = $videoContent = '';
  if (isset($post['object']['attachments'])) {
    foreach ($post['object']['attachments'] as $attachment) {
      switch ($attachment['type']) {
        case 'article':
          $aTitle = isset($attachment['title']) ? $attachment['title'] : null;
          $aContent = isset($attachment['content']) ? $attachment['content'] : null;
          $aLink = isset($attachment['links']['alternate'][0]['href']) ? $attachment['links']['alternate'][0]['href'] : null;
          $articleContent .= "<br /><p><a target=\"_blank\" class=\"articleLink\" href=\"$aLink\">$aTitle</a> $aContent<p>";
          break;
        case 'photo':
          $url = isset($attachment['links']['preview'][0]['href']) ? $attachment['links']['preview'][0]['href'] : null;
          $enclosure = isset($attachment['links']['enclosure'][0]['href']) ? $attachment['links']['enclosure'][0]['href'] : null;
          $onClick = $enclosure ? " onClick=\"window.location='$enclosure'\"" : '';
          //FIXME need to add proper click cursor here!
          $photoContent .= "<div $onClick class=\"photo\" style=\"background-image : url(" . htmlentities($url) . ");\"></div>";
          break;
        case 'photo-album':
          if (isset($attachment['links']['alternate'][0]['href'])) {
            $articleContent .= "<br><br><a target=\"_blank\" href=\"{$attachment['links']['alternate'][0]['href']}\">{$attachment['title']}</a><br>";
          }
          if (isset($attachment['content'])) {
            $articleContent .= $attachment['content'] . "<br>";
          }
          break;
        case 'video':
          $flashUrl = isset($attachment['links']['alternate'][0]['href']) ? str_replace('&autoplay=1', '', $attachment['links']['alternate'][0]['href']) : null;
          $videoContent .= "
  			<object width=\"425\" height=\"344\">
    				<param name=\"movie\" value=\"$flashUrl\">
    				<param name=\"allowFullScreen\" value=\"true\">
    				<param name=\"allowscriptaccess\" value=\"always\">
    				<embed src=\"$flashUrl\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\"425\" height=\"344\"></embed>
  			</object>\n";
          break;
        default:
          $content = "<span class=\"error\">Unsupported attachment type:</span><pre>\n".print_r($attachment, true)."</pre>";
      }
    }
  }
  echo "
  		<div class=\"buzzPost ui-corner-all\">
    		<div class=\"thumbnail\"><a target=\"_blank\" href=\"{$post['actor']['profileUrl']}\"><img width=45 height=45 src=\"{$post['actor']['thumbnailUrl']}\"></a></div>
  			<div class=\"content\">
  				<a target=\"_blank\" class=\"person\" href=\"{$post['actor']['profileUrl']}\">{$post['actor']['name']}</a> $content
  				$articleContent";

  if (! empty($photoContent)) {
    echo "<div class=\"photos\">$photoContent</div>";
  }
  if (! empty($videoContent)) {
    echo "<div class=\"photos\" style=\"height:340px; clear:both\">$videoContent</div>";
  }

  if (isset($post['object']['liked']) && count($post['object']['liked'])) {
    $implode = array();
    foreach ($post['object']['liked'] as $person) {
      $implode[] = "<a href=\"{$person['profileUrl']}\" target=\"_blank\">{$person['displayName']}</a>";
    }
    echo "<div class=\"likes\">" . count($implode) . " people liked this: " . implode(', ', $implode) . "</div>";
  }

  if (isset($post['object']['comments']) && count($post['object']['comments'])) {
    foreach ($post['object']['comments'] as $comment) {
      //FIXME add $comment->person->thumbnailUrl
      echo "<div class=\"comment\"><a target=\"_blank\" class=\"person\" href=\"{$comment['actor']['profileUrl']}\">{$comment['actor']['name']}</a> {$comment['content']}</div>";
    }
  }

  echo "
	    	</div>
    	</div>\n";
}
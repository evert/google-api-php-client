<?php
/*
 * Copyright 2008 Google Inc.
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

/*
 * If this file is called without query parameters, it won't set any caching headers
 * calling it with:
 * ?cache=etag will set an etag and most-revalidate headers, and it will respond 304 not modified if the request etag matches
 * ?cache=expires will set a date, expires and most-revalidate headers, and respond to If-Modified-Since request headers
 * ?no-revalidate will set an expires header, without any must-revalidate headers
 * ?cache=no-cache will set pragma and cache-control no-cache
 * ?cache=no-store will set a cache-control: no-store header
 */

$content = '<html><body><h1>Hello world!</h1></body></html>';
$eTag = md5($content);
$date = date('r', time());
$expires = date('r', time() + 60 * 60);

$cachePolicy = isset($_GET['cache']) ? $_GET['cache'] : '';
switch ($cachePolicy) {
  case 'etag':
    header("Cache-Control: no-cache, must-revalidate");
    header("ETag: $etag");
    if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && trim($_SERVER['HTTP_IF_NONE_MATCH']) == $etag) {
      header("HTTP/1.1 304 Not Modified");
      die();
    }
    break;
  case 'expires':
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: $expires");
    header("Date: $date");
    if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) < (time() - 60 * 60)) {
      header("HTTP/1.1 304 Not Modified");
      die();
    }
    break;
  case 'no-revvalidate':
    header("Cache-Control: public, max-age=172800");
    header("ETag: $etag");
    header("Expires: $expires");
    header("Date: $date");
    if ((isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) < (time() - 60 * 60)) ||
        (isset($_SERVER['HTTP_IF_NONE_MATCH']) && trim($_SERVER['HTTP_IF_NONE_MATCH']) == $etag)) {
      header("HTTP/1.1 304 Not Modified");
      die();
    }
    break;
  case 'no-cache':
    header("Cache-Control: no-cache");
    header("Pragma: no-cache");
    break;
  case 'no-store':
    header("Cache-Control: private, max-age=0, no-cache, no-store");
    break;
}

echo $content;

<?php
/*
 * Copyright 2010 Google Inc.
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

class apiCurlIO implements apiIO {

  const USER_AGENT = 'google-api-php-client';

  private $cache;
  private $auth;

  public function __construct(apiCache $cache, apiAuth $auth) {
    $this->cache = $cache;
    $this->auth = $auth;
  }

  public function authenticatedRequest(apiHttpRequest $request) {
    $request = $this->auth->sign($request);
    echo "<pre>AuthenticatedRequest():\n".print_r($request, true)."</pre><br>";
    return $this->makeRequest($request);
  }

  /**
   * Execute a apiHttpRequest
   *
   * @param apiHttpRequest $request the http request to be executed
   * @return apiHttpRequest http request with the response http code, response headers and response body filled in
   */
  public function makeRequest(apiHttpRequest $request) {
    // If it's a GET request, check to see if we have a valid cached version
    if ($request->getMethod() == 'GET') {
      if ($ret = $this->getCachedRequest($request)) {
        return $ret;
      }
    }
    // Couldn't use a cached version, so perform the actual request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $request->getUrl());
    if ($request->getPostBody()) {
      curl_setopt($ch, CURLOPT_POSTFIELDS, $request->getPostBody());
    }
    if ($request->getHeaders() && is_array($request->getHeaders())) {
      curl_setopt($ch, CURLOPT_HTTPHEADER, $request->getHeaders());
    }
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request->getMethod());
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, self::USER_AGENT);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
    curl_setopt($ch, CURLOPT_FAILONERROR, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, true);
    $data = @curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $errno = @curl_errno($ch);
    $error = @curl_error($ch);
    @curl_close($ch);
    if ($errno != CURLE_OK) {
      throw new apiIOException('HTTP Error: (' . $errno . ') ' . $error);
    }
    // Parse out the raw response into usable bits
    list($raw_response_headers, $response_body) = explode("\r\n\r\n", $data, 2);
    $response_header_lines = explode("\r\n", $raw_response_headers);
    array_shift($response_header_lines);
    $response_headers = array();
    foreach ($response_header_lines as $header_line) {
      list($header, $value) = explode(': ', $header_line, 2);
      if (isset($response_header_array[$header])) {
        $response_header_array[$header] .= "\n" . $value;
      } else {
        $response_header_array[$header] = $value;
      }
    }
    // Fill in the apiHttpRequest with the response values
    $request->setResponseHttpCode((int) $http_code);
    $request->setResponseHeaders($response_header_array);
    $request->setResponseBody($response_body);
    // And return it
    return $request;
  }

  private function getCachedRequest($request) {
    //TODO implement caching using pragma, expired, valid, etag, etc headers
    return false;
  }

}

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

class apiHttpRequest {

  protected $url;
  protected $method;
  protected $headers;
  protected $postBody;

  protected $responseHttpCode;
  protected $responseHeaders;
  protected $responseBody;

  public function __construct($url, $method = 'GET', $headers = array(), $postBody = null) {
    $this->url = $url;
    // force the method name to always be upper case so we can do sane comparisons on it
    $this->method = strtoupper($method);
    $this->headers = $headers;
    $this->postBody = $postBody;
  }

  /**
   * Misc function that returns the base url component of the $url
   * used by the OAuth signing class to calculate the base string
   */
  public function getBaseUrl() {
    if ($pos = strpos($this->url, '?')) {
      return substr($this->url, 0, $pos);
    }
    return $this->url;
  }

  /**
   * Misc function that returns a hash array of the query parameters of the current url
   * used by the OAuth signing class to calculate the signature
   */
  public function getQueryParams() {
    if ($pos = strpos($this->url, '?')) {
      $queryStr = substr($this->url, $pos + 1);
      $params = array();
      parse_str($queryStr, $params);
      return $params;
    }
    return array();
  }

  /**
   * @return the $responseHttpCode
   */
  public function getResponseHttpCode() {
    return $this->responseHttpCode;
  }

  /**
   * @param $responseHttpCode the $responseHttpCode to set
   */
  public function setResponseHttpCode($responseHttpCode) {
    $this->responseHttpCode = $responseHttpCode;
  }

  /**
   * @return the $responseHeaders
   */
  public function getResponseHeaders() {
    return $this->responseHeaders;
  }

  /**
   * @return the $responseBody
   */
  public function getResponseBody() {
    return $this->responseBody;
  }

  /**
   * @param $responseHeaders the $responseHeaders to set
   */
  public function setResponseHeaders($responseHeaders) {
    $this->responseHeaders = $responseHeaders;
  }

  /**
   * @param $responseBody the $responseBody to set
   */
  public function setResponseBody($responseBody) {
    $this->responseBody = $responseBody;
  }

  /**
   * @return the $url
   */

  public function getUrl() {
    return $this->url;
  }

  /**
   * @return the $method
   */
  public function getMethod() {
    return $this->method;
  }

  /**
   * @return the $headers
   */
  public function getHeaders() {
    return $this->headers;
  }

  /**
   * @return the $postBody
   */
  public function getPostBody() {
    return $this->postBody;
  }

  /**
   * @param string $url the url to set
   */
  public function setUrl($url) {
    $this->url = $url;
  }

  /**
   * @param string $method the method to set
   */
  public function setMethod($method) {
    $this->method = $method;
  }

  /**
   * @param array $headers the headers to set
   */
  public function setHeaders($headers) {
    $this->headers = $headers;
  }

  /**
   * @param string $postBody the postBody to set
   */
  public function setPostBody($postBody) {
    $this->postBody = $postBody;
  }

}

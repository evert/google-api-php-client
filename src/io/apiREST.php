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

require_once "external/URITemplateParser.php";

/**
 * The API REST class: implements the RESTful transport of apiServiceRequest()'s
 * @author chabotc
 */
class apiREST {

  /**
   * Executes a apiServiceRequest using a RESTful call by transforming it into a apiHttpRequest, execute it via apiIO::authenticatedRequest()
   * and returning the json decoded result
   *
   * @param apiServiceRequest $request
   * @return array decoded result
   * @throws apiServiceException on server side error (ie: not authenticated, invalid or mallformed post body, invalid url, etc)
   */
  static public function execute(apiServiceRequest $request) {
    global $apiTypeHandlers;
    $result = null;
    $requestUrl = $request->getBaseUrl() . $request->getPathUrl();
    $uriTemplateVars = array();
    $queryVars = array();
    foreach ($request->getParameters() as $paramName => $paramSpec) {
      if ($paramSpec['parameterType'] == 'path') {
        $uriTemplateVars[$paramName] = $paramSpec['value'];
      } else {
        $queryVars[] = $paramName . '=' . rawurlencode($paramSpec['value']);
      }
    }
    $queryVars[] = 'alt=json';
    if (count($uriTemplateVars)) {
      $uriTemplateParser = new URI_Template_Parser($requestUrl);
      $requestUrl = $uriTemplateParser->expand($uriTemplateVars);
    }
    //FIXME work around for the the uri template lib which url encodes the @'s & confuses our servers
    $requestUrl = str_replace('%40', '@', $requestUrl);
    //EOFIX

    //FIXME temp work around to make @groups/{@following,@followers} work
/*    if (strpos($requestUrl, '/@groups') && (strpos($requestUrl, '/@following') || strpos($requestUrl, '/@followers'))) {
      $requestUrl = str_replace('/@self', '', $requestUrl);
    }*/
    //EOFIX

    if (count($queryVars)) {
      $requestUrl .= '?' . implode($queryVars, '&');
    }
    $httpRequest = new apiHttpRequest($requestUrl, $request->getHttpMethod(), null, $request->getPostBody());
    // Add a content-type: application/json header so the server knows how to interpret the post body
    if ($request->getPostBody()) {
      $contentTypeHeader = array('Content-Type: application/json');
      if ($httpRequest->getHeaders()) {
        $contentTypeHeader = array_merge($httpRequest->getHeaders(), $contentTypeHeader);
      }
      $httpRequest->setHeaders($contentTypeHeader);
    }
    $httpRequest = $request->getIo()->authenticatedRequest($httpRequest);
    if ($httpRequest->getResponseHttpCode() != '200' && $httpRequest->getResponseHttpCode() != '201') {
      $responseBody = $httpRequest->getResponseBody();
      if (($responseBody = json_decode($responseBody, true)) != null && isset($responseBody['error']['message']) && isset($responseBody['error']['code'])) {
        // if we're getting a json encoded error defintion, use that instead of the raw response body for improved readability
        $errorMessage = "Error calling " . (isset($httpRequest->originalUrl) ? $httpRequest->originalUrl : $httpRequest->getUrl()) . ": ({$responseBody['error']['code']}) {$responseBody['error']['message']}";
      } else {
        $errorMessage = "Error calling " . $httpRequest->getMethod() . " " . (isset($httpRequest->originalUrl) ? $httpRequest->originalUrl : $httpRequest->getUrl()) . ": (" . $httpRequest->getResponseHttpCode() . ") " . $httpRequest->getResponseBody();
      }
      throw new apiServiceException($errorMessage);
    }
    if (($decodedResponse = json_decode($httpRequest->getResponseBody(), true)) == null) {
      throw new apiServiceException("Invalid json in service response: " . $httpRequest->getResponseBody());
    }
    //FIXME currently everything is wrapped in a data enveloppe, but hopefully this might change some day
    $ret = isset($decodedResponse['data']) ? $decodedResponse['data'] : $decodedResponse;
    // if the response type has a registered type handler, call & return it instead of the raw response array
    if (isset($ret['kind']) && isset($apiTypeHandlers[$ret['kind']])) {
      $ret = new $apiTypeHandlers[$ret['kind']]($ret);
    }
    return $ret;
  }

}

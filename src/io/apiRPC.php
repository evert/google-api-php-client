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

/**
 * This class implements the experimental JSON-RPC transport for executing apiServiceRequest'
 *
 * @author Chris Chabot <chabotc@google.com>
 */
class apiRPC {

  static public function execute($requests) {

    echo "<pre>Requests:\n".print_r($requests, true)."</pre>";

    $httpRequest = new apiHttpRequest('http://www.googleapis.com/rpc');
    $httpRequest->setHeaders(array('Content-Type: application/json'));
    $jsonRpcRequest = array();
    foreach ($requests as $request) {
      $jsonRpcRequest[] = array(
        'id' => $request['batchKey'],
        'method' => $request['rpcName']
      );
    }


    $httpRequest = $request->getIo()->authenticatedRequest($httpRequest);
    echo "<pre>" . print_r($httpRequest, true)."</pre>";

/*
 * Example request:
  POST /rpc HTTP/1.1

  Content-Type: application/json
  {
    "method" : "people.get",
    "id" : "myself"
    "params" : {
      "userid" : "@me",
      "groupid" : "@self"
    }
  }
 */
  }
}
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

require_once "apiAuthNone.php";
require_once "apiOAuth.php";

abstract class apiAuth {
  public $localUserId;

  public function __construct($localUserId = null) {
    $this->localUserId = $localUserId;
  }

  abstract public function sign($method, $url, $params = array(), $postBody = false, &$headers = array());
}

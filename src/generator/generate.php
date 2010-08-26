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

require_once "../apiClient.php";
require_once "../generator/apiGenerator.php";

if (!isset($_GET['service']) || !isset($_GET['version'])) {
  die("Please specify both the service and version of what to generate ie, generate.php?service=buzz&version=v1");
}

$apiGenerator = new apiGenerator($_GET['service'], $_GET['version']);
echo "<pre>" . $apiGenerator->generate() . "</pre>";


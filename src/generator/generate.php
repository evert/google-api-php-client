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

// detect if this is a shell or a web envirionment, and extract the service and version numbers from it
if (isset($_SERVER["TERM"])) {
  if ($argc != 3) {
    die("Specify both the service and version of what to generate, ie: php ./generate.php buzz v1");
  }
  // argc and argv are magically available when running from a shell
  $service = $argv[1];
  $version = $argv[2];
  // php gets all confused if you actually write out the php start tag, splitting it up into bits removes that confusion
  // it also breaks stuff if output in the web env, so only do this if ran from the shell
  echo '<' . '?' . 'php' . "\n";
} else {
  // running in web env
  if (!isset($_GET['service']) || !isset($_GET['version'])) {
    die("Please specify both the service and version of what to generate ie, generate.php?service=buzz&version=v1");
  }
  $service = $_GET['service'];
  $version = $_GET['version'];
  // make it look formatted in a web browser
  echo "<pre>";
}

$apiGenerator = new apiGenerator($service, $version);
echo $apiGenerator->generate();


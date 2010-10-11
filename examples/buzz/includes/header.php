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

// start the session first thing, since not everyone has output buffering turned on and this is leading to "can't send headers" errors
session_start();

?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link href="css/examples.css" rel="stylesheet" type="text/css">
  <title>Google API Buzz Demo <?php if (basename($_SERVER["SCRIPT_NAME"]) != "index.php") { echo '[' . str_replace('.php', '', basename($_SERVER["SCRIPT_NAME"])) . ']'; } ?></title>
</head>
<body>
	<div id="headerDiv" class="ui-dark-widget-header ui-corner-all"> &nbsp; Google API Buzz Demo <?php if (basename($_SERVER["SCRIPT_NAME"]) != "index.php") { echo ' - '.str_replace('.php', '', basename($_SERVER["SCRIPT_NAME"])); } ?>
	<?php if (basename($_SERVER["SCRIPT_NAME"]) != 'index.php') { ?>
	<div class="backHome">[ <a href="index.php">Back to index</a> ]</div>
	<?php } ?>
	</div>
	<div id="buzzStream">

<?php
require_once "includes/header.php";

require_once "../../src/apiClient.php";
require_once "../../src/contrib/apiBuzzService.php";

?><div id="buzzStream">
	<div class="left" style="float:left; width:49%">
  		<div class="buzzPost ui-corner-all" style="width:98%">
  			<a class="person" href="getPublicStream.php">Get the public stream</a>
  		</div>
	</div>
	<div class="right" style="float:right; width:49%">
  		<div class="buzzPost ui-corner-all" style="width:98%">
			<a class="person" href="addOrEditComment.php">Add or Edit comments</a>
		</div>
	</div>
</div><?php
require_once "includes/footer.php";

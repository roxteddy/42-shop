<div id="banner">
	<?php
	if (!isset($_SESSION["id"]) or $_SESSION["id"] === "")
		include "src/login0.php";
	else
		include "src/login1.php";
	?>
</div>

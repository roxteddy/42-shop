<div id="content">
<?php
if (isset($_GET["page"]) and $_GET["page"] === "signup")
	include "src/content_signup.php";
else if (isset($_GET["page"]) and $_GET["page"] === "shop")
	include "src/content_shop.php";
else
	include "src/content_home.php";
?>
</div>
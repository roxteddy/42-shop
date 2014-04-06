<div id="content">
<?php
if (isset($_GET["page"]) and $_GET["page"] === "signup")
	include "src/content_signup.php";
else if (!isset($_GET["page"]) or $_GET["page"] === "shop")
	include "src/content_shop.php";
else if (isset($_GET["page"]) and $_GET["page"] === "admin1" and isset($_SESSION["admin"]) and $_SESSION["admin"] > 0)
	include "src/content_admin1.php";
else if (isset($_GET["page"]) and $_GET["page"] === "admin2" and isset($_SESSION["admin"]) and $_SESSION["admin"] > 0)
	include "src/content_admin2.php";
else if (isset($_GET["page"]) and $_GET["page"] === "admin3" and isset($_SESSION["admin"]) and $_SESSION["admin"] > 0)
	include "src/content_admin3.php";
else
	include "src/content_shop.php";
?>
</div>

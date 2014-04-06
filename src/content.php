<div id="content">
	 <?php    if ($_SESSION["admin"] > 0 and isset($_SESSION["login"]))
     echo '<a href="index.php?page=admin1">ADMIN</a>'; ?>
 <?php    if ($_SESSION["admin"] > 0 and isset($_SESSION["login"]))
echo '<a href="index.php?page=admin2">ADMIN2</a>'; ?>
<?php    if ($_SESSION["admin"] > 0 and isset($_SESSION["login"]))
echo '<a href="index.php?page=admin3">ADMIN3</a>'; ?>
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

<?php
include "src/category.php";
include "src/item.php";
include "src/item_category.php";
session_start();

if (isset($_POST["submit"]) and $_POST["submit"] === "signin")
	include "src/check_login.php";
if (isset($_POST["submit"]) and $_POST["submit"] === "signout")
	$_SESSION["id"] = "";
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
	</head>
	<body>
		<?php include "src/banner.php"; ?>
		<?php include "src/menu.php"; ?>
		<?php
			if (!isset($_SESSION["id"]) or $_SESSION["id"] === "")
				include "src/login0.php";
			else
				include "src/login1.php";
		?>
		<?php include "src/content.php"; ?>
	</body>
</html>
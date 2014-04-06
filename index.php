<?php
require "src/category.php";
require "src/item.php";
require "src/item_category.php";
session_start();

if (isset($_POST["submit"]) and $_POST["submit"] === "signin")
	include "src/check_login.php";
if (isset($_POST["submit"]) and $_POST["submit"] === "signout")
	$_SESSION["id"] = "";
if (isset($_POST["submit"]) and $_POST["submit"] === "addtocart")
	include "src/addtocart.php";
if (isset($_GET["cat"]))
    $cat = $_GET["cat"];
else
    $cat = 0;
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
	</head>
	<body>
		<?php include "src/banner.php"; ?>
	<!-- <?php include "src/menu.php"; ?> -->
		<?php include "src/cart.php" ?>
		<?php include "src/content.php"; ?>
	</body>
</html>
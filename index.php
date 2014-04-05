<?php
session_start();

if (isset($_POST["submit"]) and $_POST["submit"] === "login")
	include "src/check_login.php";
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
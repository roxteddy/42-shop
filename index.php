<?php
session_start();
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
	</head>
	<body>
		<?php include "src/banner.php"; ?>
		<?php include "src/menu.php"; ?>
		<?php
			if (!isset($_SESSION["login"]) or $_SESSION["login"] === "")
				include "src/login0.php";
			else
				include "src/login1.php";
		?>
		<?php include "src/content.php"; ?>
	</body>
</html>
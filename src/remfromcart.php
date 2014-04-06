<?php
if (!isset($_SESSION["cart"]))
	$_SESSION["cart"] = array();
$_SESSION["cart"][$_POST["id"]] -= 1;
?>
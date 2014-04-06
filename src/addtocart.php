<?php
if (!isset($_SESSION["cart"]))
	$_SESSION["cart"] = array();
if (isset($_SESSION["cart"][$_POST["id"]]))
	$_SESSION["cart"][$_POST["id"]] += 1;
else
	$_SESSION["cart"][$_POST["id"]] = 1;
?>
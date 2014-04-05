<?php
$passwd = unserialize(file_get_contents("private/passwd"));

if ($_POST["login"] === "" or $_POST["password"] === "")
	echo "LOGIN ERROR: login or password undefined.";
else if (!isset($passwd[$_POST["login"]]))
	echo "LOGIN ERROR: unknown user.";
else if (hash("whirlpool", $_POST["password"]) != $passwd[$_POST["login"]])
	echo "LOGIN ERROR: bad password.";
else
	$_SESSION["id"] = hash($_POST["login"].":".$_POST["password"]);
?>
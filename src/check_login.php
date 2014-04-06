<?php
Include('user.php');
if (($tab = getusertab()) == FALSE)
	$tab = Array();
if ($_POST["login"] === "" or $_POST["password"] === "")
	echo "LOGIN ERROR: login or password undefined.";
else if (!isset($tab[$_POST["login"]]))
	echo "LOGIN ERROR: unknown user.";
else if (hash("whirlpool", $_POST["password"]) != $tab[$_POST["login"]]['password'])
	echo "LOGIN ERROR: bad password.";
else
{
	$_SESSION["id"] = $_POST["login"];
	$_SESSION['admin'] = $tab[$_POST['login']];
}
?>

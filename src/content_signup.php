<?php
Include('user.php');
if (isset($_POST["submit"]) and $_POST["submit"] === "signup")
{
	$tab = getusertab();
	if (!isset($_POST["login"]) or $_POST["login"] === "")
		echo "ERROR: please enter a login<br />";
	else if (isset($tab[$_POST["login"]]))
		echo "ERROR: login already used<br />";
	else if (strlen($_POST["password"]) < 8)
		echo "ERROR: password must be 8 characters long or more<br />";
	else if ($_POST["password"] != $_POST["confirm"])
		echo "ERROR: passwords do not match<br />";
	else
	{
		createuser($tab, $_POST["login"], hash("whirlpool", $_POST["password"]), '0');
		saveusertab($tab);
		echo "SIGNUP OK: now you can login<br />";
	}
}
?>
<span>Veuillez vous inscrire svp</span>
<form method="post" action="index.php?page=signup">
        <input type="text" name="login" />
        <input type="password" name="password" />
        <input type="password" name="confirm" />
        <input type="submit" name="submit" value="signup" />
    </form>

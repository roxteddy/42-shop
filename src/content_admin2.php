<?PHP
if (isset($_SESSION['admin']) && $_SESSION['admin'] != 0)
{
	include('src/user.php');
	$tab = getusertab();
	if (isset($_POST['submitadd']) && $_POST['submitadd'] == 'Add')
	{
		$tab = getusertab();
		if (!isset($_POST["login"]) || $_POST["login"] == "")
			echo "ERROR: The parameter login canot be an empty string<br />";
		else if (isset($tab[$_POST["login"]]))
			echo "ERROR: login already used<br />";
		else if (strlen($_POST["password"]) < 8)
			echo "ERROR: password must be * characters long or more<br />";
		else if ($_POST["password"] != $_POST["confirm"])
			echo "ERROR: passwords do not match<br />";
		else
		{
			$tab[$_POST["login"]] = Array('password' => hash("whirlpool", $_POST["password"]), 'admin' => $_POST['admin']);
			saveusertab($tab);
		}
	}
	if (isset($_POST['submitdelete']) && $_POST['submitdelete'] == 'Delete')
	{
		if ($tab[$_POST["login"]]['admin'] == 2)
			echo "ERROR: you can't remove the head administrator";
		else
		{
			removeuser($tab, $_POST['login']);
			saveusertab($tab, $_POST['login']);
		}
	}
	if (isset($_POST['submitmodify']) && $_POST['submitmodify'] == 'Modify')
	{
		if (strlen($_POST["password"]) < 8)
			echo "ERROR: password must be * characters long or more<br />";
		else if ($_POST["password"] != $_POST["confirm"])
			echo "ERROR: passwords do not match<br />";
		else
		{
			$tab[$_POST["login"]] = Array('password' => hash("whirlpool", $_POST["password"]), 'admin' => $_POST['admin']);
			saveusertab($tab);
		}
	}
	echo '<div class="game">',
		'<form method ="post" action="index.php?admin2">',
		'Login: <input name="login" value="Enter login" /><br />',
		'Password: <input type="password" name="password" value="" /><br />',
		'Confirm: <input type="password" name="confirm" value="" /><br />',
		'Rank:<br />',
		'<input type="radio" name="admin" value=0 checked="true" />User<br />',
		'<input type="radio" name="admin" value=1 />Administrator<br />',
		'<input type="radio" name="admin" value=2 disabled="true" />Head Administrator<br />',
		'<input type="submit" name="submitadd" value="Add">',
		'</form><br />',
		'</div>',
		'<br />';
	foreach ($tab as $id => $value)
	{
		echo '<div class="game">',
			'<form method ="post" action="index.php?page=admin2">',
			'Login: '.$id.'<br />',
			'Password: <input type="password" name="password" value="" /><br />',
			'Confirm: <input type="password" name="confirm" value="" /><br />',
			'Rank:<br />',
			'<input type="radio" name="admin" value=0 ';
		if ($value['admin'] == '0')
			echo 'checked="true" ';
		if ($value['admin'] == '2')
			echo 'disabled="true "';
		echo '/>User<br />',
			'<input type="radio" name="admin" value=1 ';
		if ($value['admin'] == '1')
			echo 'checked="true" ';
		if ($value['admin'] == '2')
			echo 'disabled="true "';
		echo '/>Administrator<br />',
			'<input type="radio" name="admin" value=2 ';
		if ($value['admin'] == '2')
			echo 'checked="true" ';
		echo 'disabled="true" />Head Administrator<br />',
			'<input type="hidden" name="login" value="'.$id.'" />',
			'<input type="submit" name="submitmodify" value="Modify">',
			'<input type="submit" name="submitdelete" value="Delete">',
			'</form><br />',
			'</div>',
			'<br />';
	}
}
?>

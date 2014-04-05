<?PHP
function createuser(&$tab, $login, $password, $admin)
{
	$tab[$login] = Array('password' => $password, 'admin' => $admin);
	return TRUE;
}

function modifyuser(&$tab, $login, $password, $admin)
{
	if (isset($tab[$login]))
	{
		if ($password != '')
			$tab[$login]['password'] = $password;
		$tab[$login]['admin'] = $admin;
		return TRUE;
	}
	return FALSE;
}

function removeuser(&$tab, $login)
{
	if (isset($tab[$login]))
	{
		unset($tab[$login]);
		return TRUE;
	}
	return FALSE;
}

function getusertab()
{
	$filename = ('csv/user.csv');
	if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($data = fgetcsv($handle, 1000, ',')) !== FALSE)
			$tab[$data[0]] = Array('password' => $data[1], 'admin' => $data[2]);
		fclose($handle);
		return $tab;
	}
	return FALSE;
}

function saveusertab($tab)
{
	$filename = ('csv/user.csv');
	if (!file_exists('csv'))
		mkdir('csv');
	if (($handle = fopen($filename, 'w')) !== FALSE)
	{
		foreach ($tab as $key => $value)
			fputcsv($handle, Array('login' => $key, 'password' => $value['password'], 'admin' => $value['admin']));
		fclose($handle);
		return TRUE;
	}
	return FALSE;
}

function printusertab($tab)
{
	foreach ($tab as $key => $value)
		echo 'login='.$key.' password='.$password.' admin='.$admin."\n";
}

function usertest()
{
	if (($tab = getusertab()) !== FALSE)
	{
		removeuser($tab, 'afaucher');
		createuser($tab, 'afaucher', 'bidule', 0);
		printusertab($tab);
		print_r($tab);
		saveusertab($tab);
	}
}
?>

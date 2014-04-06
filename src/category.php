<?PHP
function createcategory(&$tab, $name)
{
	$tab[] = $name;
	return TRUE;
}

function modifycategory(&$tab, $id, $name)
{
	if (isset($tab[$id]))
	{
		$tab[$id] = $name;
		return TRUE;
	}
	return FALSE;
}

function removecategory(&$tab, $id)
{
	if (isset($tab[$id]))
	{
		unset($tab[$id]);
		return TRUE;
	}
	return FALSE;
}

function getcategoryname($id, $tab)
{
	if (isset($tab[$id]) && $tab[$id] != '')
		return $tab[$id];
	return FALSE;
}


function getcategorytab()
{
	$filename = ('csv/category.csv');
	if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($data = fgetcsv($handle, 1000, ';')) !== FALSE)
		{
			if ($data[0] != 'id')
				$tab[$data[0]] = $data[1];
		}
		fclose($handle);
		return $tab;
	}
	return FALSE;
}

function savecategorytab($tab)
{
	$filename = ('csv/category.csv');
	if (($handle = fopen($filename, 'w')) !== FALSE)
	{
		foreach ($tab as $key => $value)
			fputcsv($handle, Array('id' => $key, 'name' => $value), ";");
		fclose($handle);
		return TRUE;
	}
	return FALSE;
}

function printcategorytab($tab)
{
	foreach ($tab as $key => $value)
		echo 'key='.$key.' value='.$tab[$key]."\n";
}
?>

<?PHP
function createitem(&$tab, $name, $description, $stock)
{
	if (is_numeric($stock))
	{
		$tab[] = Array('name' => $name, 'description' => $description, 'stock' => $stock);
		return TRUE;
	}
	return FALSE;
}

function additem(&$tab, $id)
{
	$tab[$id]['stock']++;
	return TRUE;
}

function modifyitem(&$tab, $id, $name, $description, $stock)
{
	if (isset($tab[$id]) && is_numeric($stock))
	{
		$tab[$id]['name'] = $name;
		$tab[$id]['description'] = $description;
		$tab[$id]['stock'] = $stock;
		return TRUE;
	}
	return FALSE;
}

function removeitem(&$tab, $id)
{
	if (isset($tab[$id]))
	{
		unset($tab[$id]);
		return TRUE;
	}
	return FALSE;
}

function getitemname($tab, $id)
{
	if (isset($tab[$id]) && $tab[$id]['name'] != '')
		return $tab[$id]['name'];
	return FALSE;
}


function getitemtab()
{
	$filename = ('csv/item.csv');
	if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($data = fgetcsv($handle, 1000, ',')) !== FALSE)
		{
			if ($data[0] != 'id')
				$tab[$data[0]] = Array('name' => $data[1], 'description' => $data[2], 'stock' => $data[3]);
		}
		fclose($handle);
		return $tab;
	}
	return FALSE;
}

function saveitemtab($tab)
{
	$filename = ('csv/item.csv');
	if (($handle = fopen($filename, 'w')) !== FALSE)
	{
		foreach ($tab as $key => $value)
			fputcsv($handle, Array('id' => $key, 'name' => $value['name'], 'description' => $value['description'], 'stock' => $value['stock']));
		fclose($handle);
		return TRUE;
	}
	return FALSE;
}

function printitemtab($tab)
{
	foreach ($tab as $key => $value)
		echo 'id='.$key.' name='.$value['name'].' description='.$value['description'].' stock='.$value['stock']."\n";
}

function itemtest()
{
	if (($tab = getitemtab()) !== FALSE)
	{
		createitem($tab, 'salut', 'ceci est un test ceci est un test lorem ipsum blabla', '10');
		printitemtab($tab);
		echo getitemname($tab, 369)."\n";
		removeitem($tab, 369);
		echo getitemname($tab, 369)."\n";
		saveitemtab($tab);
	}
}
?>

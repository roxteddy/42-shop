<?PHP
function createitem(&$tab, $name, $description, $stock, $price)
{
	if (is_numeric($stock))
	{
		$tab[] = Array('name' => $name, 'description' => $description, 'stock' => $stock, 'price' => $price);
		return TRUE;
	}
	return FALSE;
}

function additem(&$tab, $id)
{
	$tab[$id]['stock']++;
	return TRUE;
}

function modifyitem(&$tab, $id, $name, $description, $stock, $price)
{
	if (isset($tab[$id]) && is_numeric($stock) && is_numeric($price))
	{
		if ($name != '')
			$tab[$id]['name'] = $name;
		if ($description != '')
			$tab[$id]['description'] = $description;
		if ($description != '')
			$tab[$id]['stock'] = $stock;
		if ($description != '')
			$tab[$id]['price'] = $price;
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
	$filename = ('../csv/item.csv');
	if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($data = fgetcsv($handle, 1000, ',')) !== FALSE)
		{
			if ($data[0] != 'id')
				$tab[$data[0]] = Array('name' => $data[1], 'description' => $data[2], 'stock' => $data[3], 'price' => $data[4]);
		}
		fclose($handle);
		return $tab;
	}
	return FALSE;
}

function saveitemtab($tab)
{
	$filename = ('../csv/item.csv');
	if (($handle = fopen($filename, 'w')) !== FALSE)
	{
		foreach ($tab as $key => $value)
			fputcsv($handle, Array('id' => $key, 'name' => $value['name'], 'description' => $value['description'], 'stock' => $value['stock'], 'price' => $value['price']));
		fclose($handle);
		return TRUE;
	}
	return FALSE;
}

function printitemtab($tab)
{
	foreach ($tab as $key => $value)
		echo 'id='.$key.' name='.$value['name'].' description='.$value['description'].' stock='.$value['stock'].' price='.$value['price'];
}

function itemtest()
{
	if (($tab = getitemtab()) !== FALSE)
	{
		createitem($tab, 'salut', 'ceci est un test ceci est un test lorem ipsum blabla', '10', '39.30');
		printitemtab($tab);
		print_r($tab);
		saveitemtab($tab);
	}
}

itemtest();
?>

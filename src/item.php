<?PHP
function createitem(&$tab, $name, $description, $img, $stock, $price)
{
	if (is_numeric($stock))
	{
		$tab[] = Array('name' => $name, 'description' => $description, 'img' => $img, 'stock' => $stock, 'price' => $price);
		foreach ($tab as $key => $value)
			if ($value['name'] == $name)
				return $key;
		return TRUE;
	}
	return FALSE;
}

function additem(&$tab, $id)
{
	$tab[$id]['stock']++;
	return TRUE;
}

function modifyitem(&$tab, $id, $name, $description, $img, $stock, $price)
{
	if (isset($tab[$id]) && is_numeric($stock) && is_numeric($price))
	{
		if ($name != '')
			$tab[$id]['name'] = $name;
		if ($description != '')
			$tab[$id]['description'] = $description;
		if ($img != '')
			$tab[$id]['img'] = $img;
		if ($description != '')
			$tab[$id]['stock'] = $stock;
		if ($description != '')
			$tab[$id]['price'] = $price;
		return $tab[$id];
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
				$tab[$data[0]] = Array('name' => $data[1], 'description' => $data[2], 'img' => $data[3], 'stock' => $data[4], 'price' => $data[5]);
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
			fputcsv($handle, Array('id' => $key, 'name' => $value['name'], 'description' => $value['description'], 'img' => $value['img'], 'stock' => $value['stock'], 'price' => $value['price']));
		fclose($handle);
		return TRUE;
	}
	return FALSE;
}

function printitemtab($tab)
{
	foreach ($tab as $key => $value)
		echo 'id='.$key.' name='.$value['name'].' description='.$value['description'].'img='.$value['img'].'stock='.$value['stock'].' price='.$value['price'];
}

function itemtest()
{
	if (($tab = getitemtab()) !== FALSE)
	{
		createitem($tab, 'salut', 'ceci est un test ceci est un test lorem ipsum blabla', 'img', '10', '39.30');
		printitemtab($tab);
		print_r($tab);
		saveitemtab($tab);
	}
}
?>

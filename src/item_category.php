<?PHP
function createitemcategory(&$tab, $iditem, $idcategory)
{
	if (is_numeric($iditem) && is_numeric($idcategory))
	{
		foreach ($tab as $key => $value)
		{
			if ($value['item'] == $iditem && $value['category'] == $idcategory)
				return FALSE;
		}
		$tab[] = Array('item' => $iditem, 'category' => $idcategory);
	}
	return TRUE;
}

function removeallitemid(&$tab, $iditem)
{
	if (!is_numeric($iditem))
		return FALSE;
	foreach ($tab as $key => &$value)
		if ($value['item'] == $iditem)
			unset($tab[$key]);
}

function removeallcategoryid(&$tab, $idcategory)
{
	if (!is_numeric($idcategory))
		return FALSE;
	foreach ($tab as $key => &$value)
		if ($value['category'] == $idcategory)
			unset($tab[$key]);
}

function itemisincategory(&$tab, $iditem, $idcategory)
{
	if (!is_numeric($idcategory) || !is_numeric($iditem))
		return FALSE;
	foreach ($tab as $key => &$value)
	{
		if ($iditem == $value['item'] && $idcategory == $value['category'])
			return TRUE;
	}
	return FALSE;
}

function getallitemid(&$tab, $idcategory)
{
	$res = Array();
	if ($idcategory == 0)
	{
		foreach ($tab as $key => $value)
			$res[] = (Integer)$value['item'];
		return $res;
	}
	if (!is_numeric($idcategory))
		return FALSE;
	foreach ($tab as $key => $value)
	{
		if ($value['category'] == $idcategory)
			$res[] = (Integer)$value['item'];
	}
	return $res;
}

function getallcategoryid(&$tab, $iditem)
{
	$res = Array();
	if ($iditem == '')
	{
		foreach ($tab as $key => $value)
			$res[] = (Integer)$value['item'];
		return $res;
	}
	if (!is_numeric($iditem))
		return FALSE;
	foreach ($tab as $key => $value)
	{
		if ($value['item'] == $iditem)
			$res[] = (Integer)$value['category'];
	}
	return $res;
}

function getitemcategorytab()
{
	$filename = ('csv/item_category.csv');
	if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($data = fgetcsv($handle, 1000, ';')) !== FALSE)
		{
			if ($data[0] != 'id')
				$tab[] = Array('item' => (Integer)$data[0], 'category' => (Integer)$data[1]);
		}
		fclose($handle);
		return $tab;
	}
	return FALSE;
}

function saveitemcategorytab($tab)
{
	$filename = ('csv/item_category.csv');
	if (($handle = fopen($filename, 'w')) !== FALSE)
	{
		foreach ($tab as $key => $value)
			fputcsv($handle, Array('item' => (Integer)$value['item'], 'name' => (Integer)$value['category']), ';');
		fclose($handle);
		return TRUE;
	}
	return FALSE;
}

function printitemcategorytab($tab)
{
	foreach ($tab as $key => $value)
		echo 'item='.$value['item'].' category='.$value['category']."\n";
}

function testitemcategory()
{
	if (($tab = getitemcategorytab()) !== FALSE)
	{
		print_r($tab);
		printitemcategorytab($tab);
		print_r(getallcategoryid($tab, 82));
		removeallcategoryid($tab, 227);
		print_r(getallcategoryid($tab, 82));
		saveitemcategorytab($tab);
	}
}
?>

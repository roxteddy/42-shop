<?PHP
include('src/item.php');
include('src/category.php');
include('src/item_category.php');
	$games = getitemtab();
	$categories = getcategorytab();
	$itemcat = getitemcategorytab();
	if (isset($_POST['submitadd']) && $_POST['submitadd'] == 'Add')
	{
		if ($_POST['name'] == '')
			echo "The parameter name cannot be an empty string\n";
		else if ($_POST['img-url'] == '')
			echo "The parameter img-url cannot be an empty string\n";
		else if (!file_exists($_POST['img-url']))
			echo "The parameter img-url is invalid (file not found)\n";
		else if ($_POST['description'] == '')
			echo "The parameter description cannot be an empty string\n";
		else if ($_POST['price'] == '')
			echo "The parameter price cannot be an empty string\n";
		else if (!is_numeric($_POST['price']))
			echo "The parameter price must be a number\n";
		else if ($_POST['stock'] == '')
			echo "The parameter stock cannot be an empty string\n";
		else if (!is_numeric($_POST['price']))
			echo "The parameter price must be a number\n";
		else if ($_POST['stock'] < 0)
			echo "The parameter stock must be a positive number\n";
		else
		{
			$id = createitem($games, str_replace('"', "''", $_POST['name']), str_replace('"', "''", $_POST['description']), $_POST['img-url'], $_POST['stock'], $_POST['price']);
			foreach ($_POST['category'] as $elem)
			{
				createitemcategory($itemcat, $id, $elem);
			}
			saveitemtab($games);
			saveitemcategorytab($itemcat);
		}

	}
	if (isset($_POST['submitdelete']) && $_POST['submitdelete'] == 'Delete')
	{
		removeitem($games, $_POST['id']);
		removeallitemid($itemcat, $_POST['id']);
		saveitemtab($games);
		saveitemcategorytab($itemcat);
	}
	if (isset($_POST['submitmodify']) && $_POST['submitmodify'] == 'Modify')
	{
		if ($_POST['name'] == '')
			echo "The parameter name cannot be an empty string\n";
		else if ($_POST['img-url'] == '')
			echo "The parameter img-url cannot be an empty string\n";
		else if (!file_exists($_POST['img-url']))
			echo "The parameter img-url is invalid (file not found)\n";
		else if ($_POST['description'] == '')
			echo "The parameter description cannot be an empty string\n";
		else if ($_POST['price'] == '')
			echo "The parameter price cannot be an empty string\n";
		else if (!is_numeric($_POST['price']))
			echo "The parameter price must be a number\n";
		else if ($_POST['stock'] == '')
			echo "The parameter stock cannot be an empty string\n";
		else if ($_POST['stock'] < 0)
			echo "The parameter stock must be a positive number\n";
		else if (!is_numeric($_POST['price']))
			echo "The parameter price must be a number\n";
		else
		{
			$modify = modifyitem($games, $_POST['id'], str_replace('"', "''", $_POST['name']), str_replace('"', "''", $_POST['description']), $_POST['img-url'], $_POST['stock'], $_POST['price']);
			if ($modify != FALSE)
				$games[$_POST['id']] = $modify;
			removeallitemid($itemcat, $_POST['id']);
			foreach ($_POST['category'] as $elem)
			{
				createitemcategory($itemcat, $_POST['id'], $elem);
			}
			saveitemtab($games);
			saveitemcategorytab($itemcat);
		}
	}
	echo '<div class="game">',
		'<div class="left">',
		'<form method ="post" action="admin_item.php">',
		'Name: <input name="name" value="Enter name" /><br />',
		'Img-url: <input name="img-url" value="Enter image url" /><br />',
		'Description: <br /><textarea rows="4" cols="40" name="description" value="Enter description"></textarea><br />',
		'Price: <input name="price" type="number" value="0" /><br />',
		'Stock: <input name="stock" type="number" value="0" /><br />',
		'Categories:<br />';
	foreach ($categories as $key => $value)
		echo '<input type="checkbox" name="category[]" value="'.$key.'"/>'.$value.'<br />';
	echo '<input type="submit" name="submitadd" value="Add">',
		'</form><br />',
		'</div>',
		'</div>';
	foreach ($games as $id => $value)
	{
		echo '<div class="game">',
			'<div class="left">',
			'<form method ="post" action="admin_item.php">',
			'Name: <input name="name" value="'.$games[$id]['name'].'" /><br />',
			'Img-url: <input name="img-url" value="'.$games[$id]['img'].'" /><br />',
			'Description: <br /><textarea rows="4" cols="40" name="description" value="'.$games[$id]['description'].'"></textarea><br />',
			'Price: <input name="price" type="number" value="'.$games[$id]['price'].'" /><br />',
			'Stock: <input name="stock" type="number" value="'.$games[$id]['stock'].'" /><br />',
			'Categories:<br />';
		foreach ($categories as $key => $value)
		{
			echo '<input type="checkbox" name="category[]" value="'.$key.'"';
			if (itemisincategory($itemcat, $id, $key))
				echo 'checked="true"';
			echo '/>'.$value.'<br />';
		}
		echo '<input type="submit" name="submitmodify" value="Modify">',
			'<input type="submit" name="submitdelete" value="Delete">',
			'<input type="hidden" name="id" value="'.$id.'" />',
			'</form><br />',
			'</div>',
			'</div>';
	}
?>

<?PHP
if (isset($_SESSION['admin']) && $_SESSION['admin'] != 0)
{
	$categories = getcategorytab();
	$itemcat = getitemcategorytab();
	if (isset($_POST['submitadd']) && $_POST['submitadd'] == 'Add')
	{
		if ($_POST['name'] == '')
			echo "The parameter name cannot be an empty string\n";
		else
		{
			$id = createcategory($categories, str_replace('"', "''", $_POST['name']));
			savecategorytab($categories);
		}

	}
	if (isset($_POST['submitdelete']) && $_POST['submitdelete'] == 'Delete')
	{
		removecategory($categories, $_POST['id']);
		removeallcategoryid($itemcat, $_POST['id']);
		savecategorytab($categories);
		saveitemcategorytab($itemcat);
	}
	if (isset($_POST['submitmodify']) && $_POST['submitmodify'] == 'Modify')
	{
		if ($_POST['name'] == '')
			echo "The parameter name cannot be an empty string\n";
		else
		{
			$categories[$_POST['id']] = str_replace('"', "''", $_POST['name']);
			savecategorytab($categories);
		}
	}
	echo '<div class="category">',
		'<form method ="post" action="index.php?page=admin3">',
		'Name: <input name="name" value="Enter name" /><br />',
		'<input type="submit" name="submitadd" value="Add">',
		'</form><br />',
		'</div>',
		'<br />';
	foreach ($categories as $id => $value)
	{
		echo '<div class="category">',
			'<form method ="post" action="index.php?page=admin3">',
			'Name: <input name="name" value="'.$categories[$id].'" /><br />',
			'<input type="submit" name="submitmodify" value="Modify">',
			'<input type="submit" name="submitdelete" value="Delete">',
			'<input type="hidden" name="id" value="'.$id.'" />',
			'</form><br />',
			'</div>',
			'<br />';
	}
}
?>

<div id="menu">
<table class="menu">
<tr>
<td class="title">
<?php
$cats = getcategorytab();
echo getcategoryname($cat, $cats);
?>
</td>
<td>
<form id="catform" method="get" action="index.php">
	<input type="hidden" name="page" value="shop" />
</form>
<select name="cat" form="catform" onchange='this.form.submit()'>
<?php
	echo '<option value="0"';
	if ($cat == 0) echo ' selected';
	echo '>All Games</option>';
foreach ($cats as $id => $name)
{
	echo '<option value="'.$id.'"';
    if ($cat == $id) echo ' selected';
	echo '>'.$name.'</option>';
}
?>
</select>
</td>
</tr>
</table>
</div>
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
	<option value="0">Highlights</option>
	<option value="1" selected>Action</option>
</select>
</td>
</tr>
</table>
</div>
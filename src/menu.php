<div id="menu">
<?php
$cat = getcategorytab();
foreach ($cat as $val)
	echo "<a href=\"index.php?page=shop&cat=".strtolower($val)."\"><div class=\"cat\">".$val."</div></a>";
?>
</div>
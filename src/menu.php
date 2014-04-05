<div id="menu">
<?php
$cat = getcategorytab();
foreach ($cat as $key => $val)
	echo "<a href=\"index.php?page=shop&cat=".$key."\"><div class=\"cat\">".$val."</div></a>";
?>
</div>
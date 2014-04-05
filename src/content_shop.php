<?php
$ids = getallitemid(getitemcategorytab(), $_GET["cat"]);
$games = getitemtab();
#foreach ($ids as $id)
#{
#	echo "<div class=\"game\">",
#		"<img src=\"img/".$games[$id]["img"]."\" alt=\"".$games[$id]["name"]."\" title=\"".$games[$id]["name"]."\"/>",
#		"</div>";
#}
?>

<div class="game">
	<div class="left">
		Anodyne<br />
		<img src="img/anodyne.png" alt="Anodyne" title="Anodyne" /><br />
		Price: 2$<br />
		<form method="post" action="index.php?page=shop&cat=3">
			<input type="hidden" name="id" value="2" />
			<input type="submit" name="submit" value="addtocart" />
		</form><br />
	</div>
	<div class="right">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus placerat vestibulum pretium. Morbi ac nulla vel mi pretium elementum non nec sapien. Sed viverra venenatis elit, a accumsan est consectetur in. Phasellus et imperdiet nulla. Sed nisi nisl, blandit nec nulla sit amet, luctus venenatis velit. Donec sollicitudin lorem dui, at auctor nibh euismod quis. Ut tincidunt enim ac justo congue rutrum. Vivamus interdum leo urna, vitae varius nisi eleifend sit amet. Vivamus aliquet mauris quis feugiat malesuada. Phasellus accumsan diam odio, ut vulputate odio egestas accumsan. Vivamus bibendum bibendum tortor vel sollicitudin. Pellentesque porta pretium eleifend.<br />
	</div>
</div>
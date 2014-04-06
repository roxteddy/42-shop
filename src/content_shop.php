<div class="game">
<?php
include "src/menu.php";
$ids = getallitemid(getitemcategorytab(), $cat);
$games = getitemtab();
foreach ($ids as $id)
{
 echo '<table>
		  <tr>
			<td class="title">'.$games[$id]["name"].'</td>
			<td class="hr"><hr id="gamehr"></td>
		  </tr>
		</table>
		<table>
		  <tr>
			<td class="pic">
			<img class="pic" src="'.$games[$id]["img"].'" alt="'.$games[$id]["name"].'" title="'.$games[$id]["name"].'" />
		</td>
	    <td class="descr">'.str_replace('\\n', '<br />', $games[$id]["description"]).'
		  </td>
		  <td class="price">
			Price: '.$games[$id]["price"].'$
			<form method="post" action="index.php?page=shop&cat='.$cat.'">
			  <input type="hidden" name="id" value="'.$id.'" />';
if ($games[$id]["stock"] > 0)
	echo '<input id="addtocart" type="submit" name="submit" value="addtocart" />';
else
	echo '<input id="outofstock" type="submit" name="submit" value="outofstock" disabled="disabled" />';
	echo   '</form>
		  </div>
	    </td>
	</tr>
</table>';
}
?>
<div>
<!-- SAMPLE
<div class="game">
	<table>
	  <tr>
		<td class="title">Anodyne</td>
		<td class="hr"><hr id="gamehr"></td>
	 </tr>
	</table>
	 <table>
	  <tr>
	    <td class="pic">
		  <img class="pic" src="img/anodyne.png" alt="Anodyne" title="Anodyne" />
		</td>
	    <td class="descr">
		Lorem ipsum dolor sit amet,consectetur adipiscing elit. Vivamus placerat vestibulum pretium. Morbi ac nulla vel mi pretium elementum non nec sapien. Sed viverra venenatis elit, a accumsan est consectetur in. Phasellus et imperdiet nulla. Sed nisi nisl, blandit nec nulla sit amet, luctus venenatis velit. Donec sollicitudin lorem dui, at auctor nibh euismod quis. Ut tincidunt enim ac justo congue rutrum. Vivamus interdum leo urna, vitae varius nisi eleifend sit amet. Vivamus aliquet mauris quis feugiat malesuada. Phasellus accumsan diam odio, ut vulputate odio egestas accumsan. Vivamus bibendum bibendum tortor vel sollicitudin. Pellentesque porta pretium eleifend.
		  </td>
		  <td class="price">
			Price: 2$
			<form method="post" action="index.php?page=shop&cat=3">
			  <input type="hidden" name="id" value="2" />
			  <input id="addtocart" type="submit" name="submit" value="addtocart" />
		    </form>
		  </div>
	    </td>
	</tr>
</table>
<div>
!>
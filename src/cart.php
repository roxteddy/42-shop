<div id="cart">
	 <div class="title">Cart</div>
	 <div class="content">
<?php
	 $items = getitemtab();
	 if (isset($_SESSION["cart"]))
	 {
		 $total = 0;
		 foreach($_SESSION["cart"] as $id => $nb)
		 {
		 $plus = '<form method="post" action="'.getpageurl().'">
              <input type="hidden" name="id" value="'.$id.'" />
              <input id="plus" type="submit" name="submit" value="+" />
         </form>';
		 $minus = '<form method="post" action="'.getpageurl().'">
              <input type="hidden" name="id" value="'.$id.'" />
              <input id="plus" type="submit" name="submit" value="-" />
         </form>';
			 $price = $nb * $items[$id]["price"];
			 $total += $price;
			 if ($nb > 0)
				 echo "<p>".getitemname($items, $id)." ".$plus.$nb.$minus." = ".$price."</p>";
		 }
		 echo "<p>Total = $total</p>";
	 }
?>
	 </div>
</div>
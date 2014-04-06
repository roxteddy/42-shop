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
			 $price = $nb * $items[$id]["price"];
			 $total += $price;
			 echo "<p>".getitemname($items, $id)." x ".$nb." = ".$price."</p>";
		 }
		 echo "<p>Total = $total</p>";
	 }
	print_r(getpageurl());
?>
	 </div>
</div>
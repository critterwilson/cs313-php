<?php
	session_start();

	if(empty($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}
	//echo session_id();

	if(isset($_POST['item'])) {
		//echo 'Item: '.$_POST['item'];
		array_push($_SESSION['cart'], $_POST['item']);
	}

	//var_dump($_SESSION['cart']);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="prove03.css">
	<title>The Random Things Store</title>
</head>
<body>
	<h1>The Random Things Store</h1>
	<div class="topnav">
		<a class="active" href="prove03.php">Browse</a>
		<a href="cart.php">View Cart</a>
	</div>

	<div class="flex-container" id="itemList">
		<div class="item">
			<img src="spoon.jpg" alt="Whosie" class="itemPhoto">
			<h4>Whosie</h4>
			<h5>Price: $11.95</h5>
			<form method="post" action="prove03.php">
				<button type="submit" name="item" value="Whosie">Add to Cart</button>
			</form>
		</div>
		<div class="item">
			<img src="shoes.jpg" alt="whatsit" class="itemPhoto">
			<h4>Whatsit</h4>
			<h5>Price: $12.95</h5>
			<form method="post" action="prove03.php">
				<button type="submit" name="item" value="Whatsit">Add to Cart</button>
			</form>
		</div>
		<div class="item">
			<img src="chipclip.jpg" alt="Thingy" class="itemPhoto">
			<h4>Thingy</h4>
			<h5>Price: $13.95</h5>
			<form method="post" action="prove03.php">
				<button type="submit" name="item" value="Thingy">Add to Cart</button>
			</form>
		</div>
		<div class="item">
			<img src="paperclip.jpg" alt="Mabob" class="itemPhoto">
			<h4>Mabob</h4>
			<h5>Price: $14.95</h5>
			<form method="post" action="prove03.php">
				<button type="submit" name="item" value="Mabob">Add to Cart</button>
			</form>
		</div>
		<div class="item">
			<img src="comb.jpg" alt="Gizmo" class="itemPhoto">
			<h4>Gizmo</h4>
			<h5>Price: $15.95</h5>
			<form method="post" action="prove03.php">
				<button type="submit" name="item" value="Gizmo">Add to Cart</button>
			</form>
		</div>
		<div class="item">
			<img src="fork.jpg" alt="Snorfblat" class="itemPhoto">
			<h4>Snorfblat</h4>
			<h5>Price: $15.95</h5>
			<form method="post" action="prove03.php">
				<button type="submit" name="item" value="Snorfblat">Add to Cart</button>
			</form>
		</div>
	</div>
</body>
</html>
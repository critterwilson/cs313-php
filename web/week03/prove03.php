<?php
	session_start();

	if(empty($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="prove03.css">
	<!-- <script src="prove03.js"></script> -->
	<title></title>
</head>
<body>

	<div class="topnav">
		<a class="active" href="prove03.php">Browse</a>
		<a href="cart.php">View Cart</a>
	</div>

	<div class="flex-container" id="itemList">
		<div class="item" id="item1">
			Item 1<br>
			<form method="post" action="<?php array_push($_SESSION['cart'], "item1")?>">
				<input type="submit" value="Add to Cart">
			</form>
		</div>
		<div class="item" id="item2">
			Item 2<br>
			<button class="addToCart">Add to Cart</button>
		</div>
		<div class="item" id="item3">
			Item 3<br>
			<button class="addToCart">Add to Cart</button>
		</div>
		<div class="item" id="item4">
			Item 4<br>
			<button class="addToCart">Add to Cart</button>
		</div>
		<div class="item" id="item5">
			Item 5<br>
			<button class="addToCart">Add to Cart</button>
		</div>
	</div>
</body>
</html>
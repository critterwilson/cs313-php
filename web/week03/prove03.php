<?php
	session_start();

	if(empty($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}

	if(!empty($_POST)) {
		var_dump($_POST);
	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="prove03.css">
	<script src="prove03.js"></script>
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
			<form method="post" action="prove03.php">
				<input type="text" name="key" value="item1">
				<input type="submit" value="Add to Cart">
			</form>
		</div>
		<!-- <div class="item" id="item2">
			Item 2<br>
			<form method="post" action="<?php array_push($_SESSION['cart'], "item2"); ?>">
				<input type="submit" value="Add to Cart">
			</form>
		</div>
		<div class="item" id="item3">
			Item 3<br>
			<form method="post" action="<?php array_push($_SESSION['cart'], "item3"); ?>">
				<input type="submit" value="Add to Cart">
			</form>
		</div>
		<div class="item" id="item4">
			Item 4<br>
			<form method="post" action="<?php array_push($_SESSION['cart'], "item4"); ?>">
				<input type="submit" value="Add to Cart">
			</form>
		</div>
		<div class="item" id="item5">
			Item 5<br>
			<form method="post" action="<?php array_push($_SESSION['cart'], "item5"); ?>">
				<input type="submit" value="Add to Cart">
			</form>
		</div> -->
	</div>
</body>
</html>
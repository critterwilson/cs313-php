<?php
	session_start();

	if(empty($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}

	if(isset($_POST['item'])) {
		array_push($_SESSION['cart'], $_POST['item']);
	}

	var_dump($_SESSION['cart']);
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
				<button type="submit" name="item" value="item1">Add to Cart</button>
			</form>
		</div>
		<div class="item" id="item2">
			Item 2<br>
			<form method="post" action="prove03.php">
				<button type="submit" name="item" value="item2">Add to Cart</button>
			</form>
		</div>
		<div class="item" id="item3">
			Item 3<br>
			<form method="post" action="prove03.php">
				<button type="submit" name="item" value="item3">Add to Cart</button>
			</form>
		</div>
		<div class="item" id="item4">
			Item 4<br>
			<form method="post" action="prove03.php">
				<button type="submit" name="item" value="item4">Add to Cart</button>
			</form>
		</div>
		<div class="item" id="item5">
			Item 5<br>
			<form method="post" action="prove03.php">
				<button type="submit" name="item" value="item5">Add to Cart</button>
			</form>
		</div>
		<div class="item" id="item6">
			Item 6<br>
			<form method="post" action="prove03.php">
				<button type="submit" name="item" value="item6">Add to Cart</button>
			</form>
		</div>
	</div>
</body>
</html>
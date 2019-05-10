<?php
	session_start();

	if(empty($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}
	else {
		array_push($_SESSION['cart'], $_POST['item']);
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
				<input type="text" class="noShow" name="item" value="item1">
				<input type="submit" value="Add to Cart">
			</form>
		</div>
	</div>
</body>
</html>
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
				<button type='button' onclick="insertPHP('item1')">
			</form>
		</div>
	</div>
</body>
</html>
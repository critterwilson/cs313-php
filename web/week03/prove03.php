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
	<div class="topnav">
		<a class="active" href="prove03.php">Browse</a>
		<a href="cart.php">View Cart</a>
	</div>

	<div class="flex-container" id="itemList">
		<div class="item">
			Whosie<br>
			<form method="post" action="prove03.php">
				<button type="submit" name="item" value="Whosie">Add to Cart</button>
			</form>
		</div>
		<div class="item">
			Whatsit<br>
			<form method="post" action="prove03.php">
				<button type="submit" name="item" value="Whatsit">Add to Cart</button>
			</form>
		</div>
		<div class="item">
			Thingy<br>
			<form method="post" action="prove03.php">
				<button type="submit" name="item" value="Thingy">Add to Cart</button>
			</form>
		</div>
		<div class="item">
			Mabob<br>
			<form method="post" action="prove03.php">
				<button type="submit" name="item" value="Mabob">Add to Cart</button>
			</form>
		</div>
		<div class="item">
			Gizmo<br>
			<form method="post" action="prove03.php">
				<button type="submit" name="item" value="Gizmo">Add to Cart</button>
			</form>
		</div>
		<div class="item">
			Snorfblat<br>
			<form method="post" action="prove03.php">
				<button type="submit" name="item" value="Snorfblat">Add to Cart</button>
			</form>
		</div>
	</div>
</body>
</html>
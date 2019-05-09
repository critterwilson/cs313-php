<?php
	session_start();
	$_SESSION['cart'] = array();

	// function addItem {
	// 	echo "it is working";
	// }

	// if(array_key_exists('test',$_POST)){
	// 	addItem();
	// }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="prove03.css">
	<!-- <script src="prove03.js"></script> -->
	<title></title>
</head>
<body>
	<?php
	function addItem($item) {
		$cart;
		array_push($cart, $item);
		echo($cart);
	}
	?>
	<div class="topnav">
		<a class="active" href="prove03.php">Browse</a>
		<a href="prove03_1.php">View Cart</a>
	</div>

	<div class="flex-container" id="itemList">
		<div class="item" id="item1">
			Item 1<br>
			<form method="post">
				<input type="submit" name="test" id="test" value="Add to Cart" /><br/>
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
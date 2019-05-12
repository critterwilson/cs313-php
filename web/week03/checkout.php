<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
		var_dump($_SESSION['cart']);
	?>

	<div class="topnav">
	<a href="prove03.php">Browse</a>
	<a href="cart.php">View Cart</a>
	<a class="active" href="checkout.php">Checkout</a>
</div>

</body>
</html>
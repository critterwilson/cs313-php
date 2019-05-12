<?php
	session_start();

	var_dump($_SESSION['cart']);

	//echo session_id();

	if((isset($_POST['unset'])) && ($_POST['unset'] == true)) {
		session_unset();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="topnav">
		<a href="prove03.php">Browse</a>
		<a class="active" href="cart.php">View Cart</a>
	</div>

	<form method="post" action="">
	</form>


	<form method="post" action="cart.php">
		<button type="submit" name="unset" value="true">Clear Cart</button>
	</form>
	<a href="checkout.php">Check Out</a>

</body>
</html>
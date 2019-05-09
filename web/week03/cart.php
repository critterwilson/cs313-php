<?php
	session_start();

	var_dump($_SESSION['cart']);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div class="topnav">
	<a class="active" href="prove03.php">Browse</a>
	<a href="cart.php">View Cart</a>
</div>

<form method="post" action="<?php session_unset(); ?>">
	<input type="submit" value="Clear Cart">
</form>

</body>
</html>
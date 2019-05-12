<?php
	session_start();

	//var_dump($_SESSION['cart']);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="topnav">
		<a href="prove03.php">Browse</a>
		<a href="cart.php">View Cart</a>
		<a class="active">Checkout</a>
	</div>

	<form id="userInfo" method="post" action="confirmation.php">
		First Name: <input type="text" name="name_first"><br>
		Last Name: <input type="text" name="name_last"><br>
		Address: <input type="text" name="address"><br>
		City: <input type="text" name="city"><br>
		State: <input type="text" name="state"><br>
		Zip: <input type="text" name="zip"><br>
	</form>
</body>
</html>
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
		Name: <input type="text"><br>
		
	
	</form>
</body>
</html>
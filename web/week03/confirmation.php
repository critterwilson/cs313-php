<?php
	session_start();
	$first = htmlspecialchars($_POST['name_first']);
	$last = htmlspecialchars($_POST['name_last']);
	$address1 = htmlspecialchars($_POST['address1']);
	$address2 = htmlspecialchars($_POST['address2']);
	$city = htmlspecialchars($_POST['city']);
	$state = htmlspecialchars($_POST['state']);
	$zip = htmlspecialchars($_POST['zip']);

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="prove03.css">
	<title>Order Confirmation</title>
</head>
<body>
	<div class="topnav">
		<a href="prove03.php">Browse</a>
		<a href="cart.php">View Cart</a>
		<a class="active">Confirmation</a>
	</div>

<h2>Confirmation Page</h2>
<h4>Shipping to:</h4>
<?php
	echo "$first $last<br>$address1 $address2<br>$city, $state, $zip";
?>

<h4>Purchased Items:</h4>
<ul>
<?php
	foreach ($_SESSION['cart'] as $item) {
		echo "<li>$item</li>";
	}
	echo "</ul>";
?>

</body>
</html>
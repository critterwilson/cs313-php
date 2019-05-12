<?php
	session_start();

	//var_dump($_SESSION['cart']);

	//echo session_id();
	if(isset($_POST['remove'])) {
		// echo $_POST['remove'];
		$location = array_search($_POST['remove'], $_SESSION['cart']);
		array_splice($_SESSION['cart'], $location, 1);

	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="prove03.css">
	<title>Cart</title>
</head>
<body>
	<div class="topnav">
		<a href="prove03.php">Browse</a>
		<a class="active" href="cart.php">View Cart</a>
	</div>

	<ul id="fullCart">
		<?php
		if((isset($_POST['unset'])) && ($_POST['unset'] == true)) {
			session_unset();
			echo "Cart is Empty";
		}

		if (!isset($_SESSION['cart'])) {
			echo "Cart is Empty";
		}

		$total = 0.00;
		foreach ($_SESSION['cart'] as $item) {
			switch ($item) {
				case 'Whosie':
					$price = 11.95;
					break;
				case 'Whatsit':
					$price = 12.95;
					break;
				case 'Thingy':
					$price = 13.95;
					break;
				case 'Mabob':
					$price = 14.95;
					break;
				case 'Gizmo':
					$price = 15.95;
					break;
				case 'Snorfblat':
					$price = 16.95;
					break;
			}

			$total += $price;
			echo "<li>$item, $".money_format('%i', $price)."</li>";
			echo "<form method='post' action='cart.php'>
				    <button type='submit' name='remove' value='$item'>Remove</button>
				 </form>";
		}
		echo "</ul>";
		echo "<b>Total: $".money_format('%i', $total)."</b>";
		?>

	<form method="post" action="">
	</form>


	<form method="post" action="cart.php">
		<button type="submit" name="unset" value="true" class="button">Clear Cart</button>
	</form>
	<a href="checkout.php" class="button">Check Out</a>

</body>
</html>
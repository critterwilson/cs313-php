<?php
	session_start();

	//var_dump($_SESSION['cart']);

	//echo session_id();

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

	<ul id="fullCart">
		<?php
		if((isset($_POST['unset'])) && ($_POST['unset'] == true)) {
			session_unset();
			echo "Cart is Empty";
		}

		$total = 0.00;
		foreach ($_SESSION['cart'] as $item) {
			switch ($item) {
				case 'item1':
					$price = 11.95;
					break;
				case 'item2':
					$price = 12.95;
					break;
				case 'item3':
					$price = 13.95;
					break;
				case 'item4':
					$price = 14.95;
					break;
				case 'item5':
					$price = 15.95;
					break;
				case 'item6':
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
		<button type="submit" name="unset" value="true">Clear Cart</button>
	</form>
	<a href="checkout.php">Check Out</a>

</body>
</html>
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
	<title></title>
</head>
<body>
<h2>Confirmation Page</h2>
Shipping to:
<?php
	echo "$first $last <br> $address1 $address2, $city, $state, $zip";
?>

<br>Purchased items Items:<br>
<ul>
<?php
	foreach ($_SESSION['cart'] as $item) {
		echo "<li>$item</li>";
	}
	echo "</ul>";
?>

</body>
</html>
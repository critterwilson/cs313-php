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

<form method="post" action="<?php session_unset(); ?>">
	<input type="submit" value="Clear Cart">
</form>

</body>
</html>
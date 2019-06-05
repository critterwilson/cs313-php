<?php
	require('databaseConnection.php');
	$db = get_db();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Sign UP</h1>
	<form id="signUp" action="createAccount.php" method="POST">
		<input type="text" name="username"><br>
		<input type="text" name="password"><br>
		<button type="submit">Sign U[</button>
	</form>

</body>
</html>
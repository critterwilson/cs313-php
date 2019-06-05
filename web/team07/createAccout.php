<?php
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (!isset($_POST['username']) || $username == "") {
		header("Location: sign-up.php");
		die();
	}

	$username = htmlspecialchars($username);

	$hashPassword = password_hash($password, PASSWORD_DEFAULT);

	require('databaseConnection.php');
	$db = get_db();

	$query = 'INSERT INTO user_info (username, password) VALUES (:username, :password)';

	$statement = $db->prepare($query);

	$statement->bindValue(':username', $username);
	$statement->bindValue(':pasword', $hashPassword);

	$statement->execute();

	header("Location: sign-in.php");
	die();

?>
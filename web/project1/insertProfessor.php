<?php
	// make sure we connect to the database
	require('databaseConnection.php');
	$db = get_db();

	$name_last = htmlspecialchars($_POST['name_last']);
	$name_first = htmlspecialchars($_POST['name_first']);

	$stmt = $db->prepare("INSERT INTO professor (name_first, name_last, adjunct) VALUES ('$name_last','$name_first',$_POST['adjunct']) ON CONFLICT DO UPDATE set adjunct = $_POST['adjunct'];");
	$stmt->execute();
?>
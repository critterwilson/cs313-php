<?php
	// make sure we connect to the database
	require('databaseConnection.php');
	$db = get_db();

	$name_last = htmlspecialchars($_POST['name_last']);
	$name_first = htmlspecialchars($_POST['name_first']);

	#psql: INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Christopher', 'Wilson', false) ON CONFLICT (name_first, name_last) DO UPDATE set adjunct = true;

	$stmt = $db->prepare("INSERT INTO professor (name_first, name_last, adjunct) VALUES ('$name_last','$name_first',$_POST['adjunct']) ON CONFLICT (name_first, name_last) DO UPDATE set adjunct = $_POST['adjunct'];");
	
	$stmt->execute();
?>
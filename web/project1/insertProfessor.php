<?php
	// make sure we connect to the database
	require('databaseConnection.php');
	$db = get_db();

	// scrub our data because some items might make it past regex
	$name_last = htmlspecialchars($_POST['name_last']);
	$name_first = htmlspecialchars($_POST['name_first']);
	$adjunct = $_POST['adjunct'];

	# psql: INSERT INTO professor (name_first, name_last, adjunct) VALUES ('Christopher', 'Wilson', false) 
	#		ON CONFLICT (name_first, name_last) DO UPDATE set adjunct = true;

	// insert in to the professor table, if the first and last name combo exists, update the rest of the info
	$query = "INSERT INTO professor (name_last, name_first, adjunct) VALUES ('$name_last', '$name_first', $adjunct) ON CONFLICT (name_first, name_last) DO UPDATE set adjunct = $adjunct;";
	$stmt = $db->prepare($query);
	$stmt->execute();

	// head back to where we were
	$new_page = "professorCreation.php";
 	header("Location: $new_page");
 	die();
?>
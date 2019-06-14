<?php
	// make sure we connect to the database
	require('databaseConnection.php');
	$db = get_db();

	$prefix = htmlspecialchars($_POST['prefix']);
	$postfix = htmlspecialchars($_POST['postfix']);
	$name = htmlspecialchars($_POST['name']);

	#psql: INSERT INTO course (prefix, postfix, name) VALUES ('RELC', '275', 'Book of Mormon') ON CONFLICT (prefix, postfix) DO UPDATE set name = 'Teachings and Doctrine of the Book of Mormon';
	$query = "INSERT INTO course (prefix, postfix, name) VALUES ('$prefix', '$postfix', $name) ON CONFLICT (prefix, postfix) DO UPDATE set name = $name;";
	$stmt = $db->prepare($query);

	$stmt->execute();

	$new_page = "courseCreation.php";
 	header("Location: $new_page");
 	die();
?>
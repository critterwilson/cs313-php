<?php
	// make sure we connect to the database
	require('databaseConnection.php');
	$db = get_db();

	// scrub the input (regex might not catch everything)
	$prefix = htmlspecialchars($_POST['prefix']);
	$postfix = htmlspecialchars($_POST['postfix']);
	$name = htmlspecialchars($_POST['name']);

	#psql: INSERT INTO course (prefix, postfix, name) VALUES ('RELC', '275', 'Book of Mormon') ON CONFLICT (prefix, postfix) DO UPDATE set name = 'Teachings and Doctrine of the Book of Mormon';

	// Insert the data into the course table. If there is already a course with that code, update its name
	$query = "INSERT INTO course (prefix, postfix, name) VALUES ('$prefix', $postfix, '$name') ON CONFLICT (prefix, postfix) DO UPDATE set name = '$name';";
	$stmt = $db->prepare($query);
	$stmt->execute();

	// head back to where we were
	$new_page = "courseCreation.php";
 	header("Location: $new_page");
 	die();
?>
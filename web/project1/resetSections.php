<?php
	// make sure we connect to the database
	require('databaseConnection.php');
	$db = get_db();

	// delete all of the section data
	$stmt = $db->prepare('DELETE FROM section;');
	$stmt->execute();

	// head back to where we were
	$new_page = "sectionCreation.php";
	header("Location: $new_page");
	die();
?>
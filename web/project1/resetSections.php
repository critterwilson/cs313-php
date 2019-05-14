<?php
	require('databaseConnection.php');
	$db = get_db();

	$stmt = $db->prepare('DELETE FROM section;');
	$stmt->execute();

	$new_page = "sectionCreation.php";
	header("Location: $new_page");
	die();
?>
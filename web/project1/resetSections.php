<?php
	require('databaseConnection.php');
	$db = get_db();

	$stmt = $db->prepare('DELETE FROM section;');
	$stmt->bindValue(':course_id', $course_id, PDO::PARAM_INT);
	$stmt->execute();

	$new_page = "sectionCreation.php";
	header("Location: $new_page");
	die();
?>
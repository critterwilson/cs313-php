<?php
	require('databaseConnection.php');
	$db = get_db();

	$course_id = $_POST['cID'];
	$professor_id = $_POST['pID'];
	$section_number = $_POST['sID'];

	echo "$course_id, $professor_id, $section_number";
	# psql: UPDATE section SET professor_id = null, taken = false 
	#		  WHERE course_id = $course_id AND section_number = $section_number 
	#		  AND professor_id = $professor_id;

	// set the professor value to NULL and taken to false, but keep the section
	$stmt = $db->prepare('UPDATE section SET professor_id = null, taken = false WHERE course_id ='.$course_id.' AND section_number = '.$section_number.' AND professor_id = '.$professor_id.';');

	$stmt->execute();

	// redirect to the first page
	$new_page = "readInfo.php";
 	header("Location: $new_page");
 	die();
?>
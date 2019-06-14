<?php
	// make sure we connect to the database
	require('databaseConnection.php');
	$db = get_db();

	// store the professor identification value
	$professor_id = $_POST['professor'];

	// for every course
	for ($i=0; $i < $_POST["numCourses"]; $i++) { 
		// store the course id
		$course_id = $_POST['courseSelect_'.$i];
		// ...and the section number
		$section_number = $_POST['sectionSelect_'.$i];

		#psql: UPDATE section SET professor_id = $professor_id, taken = true 
		#	   WHERE course_id = $course.id AND section_number = $section_number; 

		// update the section reference table so that the section signed up for is taken 
		// and the professor's id is logged
		$stmt = $db->prepare('UPDATE section SET professor_id = '.$professor_id.', taken = true WHERE course_id ='.$course_id.' AND section_number = '.$section_number.';');
		$stmt->execute();
	}

	// head back to where we were
	$new_page = "sectionAssignments.php";
 	header("Location: $new_page");
 	die();
?>
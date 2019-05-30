<?php
	require('databaseConnection.php');
	$db = get_db();

	var_dump($_POST);
	echo '<br><br><br>';
	$professor_id = $_POST['professor'];

	for ($i=0; $i < $_POST["numCourses"]; $i++) { 
		$course_id = $_POST['courseSelect_'.$i];
		$section_number = $_POST['sectionSelect_'.$i];

		#psql: UPDATE section SET professor_id = $professor_id, taken = true 
		#	   WHERE course_id = $course.id AND section_number = $section_number; 
		echo 'UPDATE section SET professor_id = '.$professor_id.', taken = true WHERE course_id ='.$course_id.' AND section_number = '.$section_number.';';

	}
?>
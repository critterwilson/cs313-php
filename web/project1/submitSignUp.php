<?php
	require('databaseConnection.php');
	$db = get_db();

	var_dump($_POST);
	echo '<br><br><br>';

	
	for ($i=0; $i < $_POST["numCourses"]; $i++) { 
		#psql: UPDATE section SET professor_id = 
		#		 (SELECT id FROM professor WHERE name_last = 'Allred' AND name_first = 'Philip'), 
		#		 taken = true 
		#	   WHERE course_id = course.id AND section_number = 1; 


	}
?>
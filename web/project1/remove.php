<?php
	require('databaseConnection.php');
	$db = get_db();

	$course_id = $_POST['cID'];
	$professor_id = $_POST['pID'];
	$section_number = $_POST['sID'];

	echo "$course_id, $professor_id, $section_number";

?>
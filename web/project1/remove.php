<?php
	require('databaseConnection.php');
	$db = get_db();

	$course_id = $_POST['cID'];
	$professor_id = $_POST['pID'];
	$section_number = $_POST['sID'];

	echo "$course_id, $professor_id, $section_number";

	$stmt = $db->prepare('UPDATE section SET professor_id = "null", taken = false WHERE course_id ='.$course_id.' AND section_number = '.$section_number.' AND professor_id = '.$professor_id';');

	// binding course id might not be necessary because it isn't entered by the user
	$stmt->execute();

?>
<?php
	require('databaseConnection.php');
	$db = get_db();

	try {
		// remove a professor
		if (isset($_POST['tID'])) {
			$professor_id = $_POST['tID'];
			// $stmt = $db->prepare('UPDATE section SET professor_id = null, taken = false WHERE professor_id = '.$professor_id.';');
			// $stmt->exectute();

			// $stmt = $db->prepare('DELETE FROM professor WHERE id = '.$professor_id.';');
			// $stmt->execute();
		}

		// remove a course
		if (isset($_POST['qID'])) {
			$course_id = $_POST['qID'];
			$stmt = $db->prepare('DELETE FROM section WHERE course_id = '.$course_id.';');
			$stmt->execute();

			$stmt = $db->prepare('DELETE FROM course WHERE id = '.$course_id.';');
			$stmt->execute();
		}

		// remove a professor assignment from a section
		if (isset($_POST['cID']) && isset($_POST['pID']) && isset($_POST['sID'])) {
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
		}

		// remove room 
		if (isset($_POST['amenID'])) {
			$stmt = $db->prepare('DELETE FROM room WHERE id = '.$_POST['amenID'].';');
			$stmt->execute();
		}

		// remove professor preferences
		if (isset($_POST['prefID'])) {
			$stmt = $db->prepare('DELETE FROM professor_prefs WHERE id = '.$_POST['prefID'].';');
			$stmt->execute();
		}
	}
	catch (PDOException $ex)
	{
		echo "Error with DB. Details: $ex";
		die();
	}

	// redirect to the first page
	$new_page = "readInfo.php";
  	header("Location: $new_page");
  	die();
?>
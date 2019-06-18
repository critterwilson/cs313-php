<?php
	require('databaseConnection.php');
	$db = get_db();

	try {
		// remove a professor
		if (isset($_POST['tID'])) {
			$professor_id = $_POST['tID'];
			// first make sure any courses that professor had are listed as available
			$stmt = $db->prepare('UPDATE section SET professor_id = null, taken = false WHERE professor_id = '.$professor_id.';');
			$stmt->execute();

			// delete the professor from the professor table
			$stmt = $db->prepare('DELETE FROM professor WHERE id = '.$professor_id.';');
			$stmt->execute();
		}

		// remove a course
		if (isset($_POST['qID'])) {
			$course_id = $_POST['qID'];
			// first we have to delete all of the sections of that course
			$stmt = $db->prepare('DELETE FROM section WHERE course_id = '.$course_id.';');
			$stmt->execute();

			// delete the course from the course table
			$stmt = $db->prepare('DELETE FROM course WHERE id = '.$course_id.';');
			$stmt->execute();
		}

		// remove a professor assignment from a section
		if (isset($_POST['cID']) && isset($_POST['pID']) && isset($_POST['sID'])) {
			// store all of the variables to make our queries easier
			$course_id = $_POST['cID'];
			$professor_id = $_POST['pID'];
			$section_number = $_POST['sID'];

			# psql: UPDATE section SET professor_id = null, taken = false 
			#		  WHERE course_id = $course_id AND section_number = $section_number 
			#		  AND professor_id = $professor_id;

			// set the professor value to NULL and taken to false, but keep the section
			$stmt = $db->prepare('UPDATE section SET professor_id = null, taken = false WHERE course_id ='.$course_id.' AND section_number = '.$section_number.' AND professor_id = '.$professor_id.';');
			$stmt->execute();
		}

		// remove room 
		if (isset($_POST['amenID'])) {
			// delete info from schedule_mon, etc.
			$stmt = $db->prepare('DELETE FROM schedule_mon where room_id = '.$_POST['amenID'].';');
			$stmt->execute();

			$stmt = $db->prepare('DELETE FROM schedule_tue where room_id = '.$_POST['amenID'].';');
			$stmt->execute();

			$stmt = $db->prepare('DELETE FROM schedule_wed where room_id = '.$_POST['amenID'].';');
			$stmt->execute();

			$stmt = $db->prepare('DELETE FROM schedule_thu where room_id = '.$_POST['amenID'].';');
			$stmt->execute();

			$stmt = $db->prepare('DELETE FROM schedule_fri where room_id = '.$_POST['amenID'].';');
			$stmt->execute();

			// delete the room from the room table
			$stmt = $db->prepare('DELETE FROM room WHERE id = '.$_POST['amenID'].';');
			$stmt->execute();
		}

		// remove professor preferences
		if (isset($_POST['prefID'])) {
			// delete the preference for the professor from the preference table
			$stmt = $db->prepare('DELETE FROM professor_prefs WHERE id = '.$_POST['prefID'].';');
			$stmt->execute();
		}
	}
	catch (PDOException $ex)
	{
		echo "Error with DB. Details: $ex";
		die();
	}

	// head back to where we were
	$new_page = "readInfo.php";
  	header("Location: $new_page");
  	die();
?>
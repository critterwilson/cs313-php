<?php
	require('databaseConnection.php');
	$db = get_db();

	// For every course in the list
	for ($i = 0; $i < count($_POST['course_id']); $i++) {
		// course[i]
		$course_id = $_POST['course_id'][$i];
		// amount of course[i]
		$amount = $_POST['amount'][$i]; // We may want to use HTML decoding for security purposes???

		// Add the proper number of sections
		for ($j = 1; $j <= $_POST['amount'][$i]; $j++) { 
			# INSERT INTO section(course_id, section_number, professor_id) VALUES (course_id, index, NULL) ON CONFLICT DO NOTHING;
			
			// insert the number of sections desired
			// don't add on top of current sections, just match the desired amount
			$stmt = $db->prepare('INSERT INTO section(course_id, section_number, professor_id, taken) VALUES (:course_id,'.$j.', NULL, false) ON CONFLICT DO NOTHING;');

			// binding course id might not be necessary because it isn't entered by the user
			$stmt->bindValue(':course_id', $course_id, PDO::PARAM_INT);
			$stmt->execute();
		}
		
		// we run into errors when the database uses blanks as a compare element
		if ($amount != "") {
			# DELETE FROM section WHERE course_id = :course_id AND section_number > :amount;

			// delete the sections that are greater than the desired amount
			$stmt = $db->prepare('DELETE FROM section WHERE course_id = :course_id AND section_number > :amount;');

			$stmt->bindValue(':course_id', $course_id, PDO::PARAM_INT);
			// Amount is necessary to bind because it is user input
			$stmt->bindValue(':amount',  $amount, PDO::PARAM_INT);
			$stmt->execute();
		}
	}

 	$new_page = "sectionCreation.php";
 	header("Location: $new_page");
 	die();
?>
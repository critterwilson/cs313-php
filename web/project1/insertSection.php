<?php
	require('databaseConnection.php');
	$db = get_db();

	// For every course in the list
	for ($i = 0; $i < count($_POST['course_id']); $i++) {
		$course_id = $_POST['course_id'][$i];
		$amount = $_POST['amount'][$i];

		for ($j = 1; $j <= $_POST['amount'][$i]; $j++) { 
			// INSERT INTO section(course_id, section_number, professor_id) VALUES course_id, index, NULL) ON CONFLICT DO NOTHING;
			$stmt = $db->prepare('INSERT INTO section(course_id, section_number, professor_id) VALUES (:course_id,'.$j.', NULL) ON CONFLICT DO NOTHING;');
			$stmt->bindValue(':course_id', $course_id, PDO::PARAM_INT);
			$stmt->execute();
		}
		
		//SELECT * FROM section WHERE course_id = :course_id AND section_number > :amount;

		$stmt = $db->prepare('DELETE FROM section WHERE course_id = :course_id AND section_number > :amount;');
		$stmt->bindValue(':course_id', $course_id, PDO::PARAM_INT);
		$stmt->bindValue(':amount',  $amount, PDO::PARAM_INT);
		$stmt->execute();
	}

 	//$new_page = "sectionCreation.php";
 	//header("Location: $new_page");
 	//die();
?>
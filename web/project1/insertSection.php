<?php
	require('databaseConnection.php');
	$db = get_db();

	// For every course in the list
	for ($i = 0; $i < count($_POST['course_id']); $i++) { 
		for ($j = 1; $j <= $_POST['amount'][$i]; $j++) { 
			$course_id = $_POST['course_id'][$i];
			$stmt = $db->prepare('INSERT INTO section(course_id, section_number, professor_id) VALUES (:course_id, $j, NULL) ON CONFLICT DO NOTHING;');
			$stmt->bindValue(':course_id', $course_id, PDO::PARAM_INT);
			// $stmt->bindValue(":j", $j, PDO::PARAM_INT);

			echo $stmt.'<br>';

			// echo "INSERT INTO section (course_id, section_number, professor_id) ";
			// echo "VALUES (".$_POST['course_id'][$i].", ".$j.", NULL) ";
			// echo "ON CONFLICT DO NOTHING;<br>";
		}

		// $n = $_POST['amount'][$i];
		// echo $_POST['course_id'][$i].': '.$n.'<br>';
	}

?>
<?php
	// make sure we connect to the database
	require('databaseConnection.php');
	$db = get_db();

	# INSERT INTO professor_prefs (professor_id, office, instrument, mac, seating) VALUES (6, 'TAY', 2, false, 2) ON CONFLICT (professor_id) DO UPDATE SET office = 'TAY', instrument = 2, mac = false, seating = 2;
	// Insert the data into the table, update if professor_id is already recorded
	$insert = "INSERT INTO professor_prefs (professor_id, office, instrument, mac, seating) VALUES ($professor_id, '$office', $instrument, $mac, $seating) ON CONFLICT (professor_id) DO UPDATE SET office = '$office', instrument = $instrument, mac = $mac, seating = $seating;";
	$stmt = $db->prepare($insert);
	$stmt->execute();

	// Set everything to false
	$reset = "UPDATE professor_prefs SET time0745 = false, time0900 = false, time1015 = false, time1130 = false, time1245 = false, time1400 = false, time1515 = false, time1630 = false WHERE professor_id = $professor_id;";
	$stmt = $db->prepare($reset);
	$stmt->execute();


 	# UPDATE professor_prefs SET time0900 = true;
	// Set the selected times to true
	// foreach ($_POST['time'] as $time) {
	// 	$update = "UPDATE professor_prefs SET $time = true WHERE professor_id = $professor_id;";
	// 	$stmt = $db->prepare($update);
	// 	$stmt->execute();
	// }

// 	$new_page = "professorPrefs.php";
//  	header("Location: $new_page");
//  	die();
?>
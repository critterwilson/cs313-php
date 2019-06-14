<?php
	// make sure we connect to the database
	require('databaseConnection.php');
	$db = get_db();

	// store all of the data to make the query string easier
	$professor_id = $_POST['professor'];
	$office = $_POST['office'];
	$instrument = $_POST['instrument'];
	$seating = $_POST['seating'];
	$mac = $_POST['mac'];

	# INSERT INTO professor_prefs (professor_id, office, instrument, mac, seating) VALUES (6, 'TAY', 2, false, 2) ON CONFLICT (professor_id) DO UPDATE SET office = 'TAY', instrument = 2, mac = false, seating = 2;

	// Insert the data into the table, update if professor_id already exists
	$insert = "INSERT INTO professor_prefs (professor_id, office, instrument, mac, seating) VALUES ($professor_id, '$office', $instrument, $mac, $seating) ON CONFLICT (professor_id) DO UPDATE SET office = '$office', instrument = $instrument, mac = $mac, seating = $seating;";
	$stmt = $db->prepare($insert);
	$stmt->execute();

	// Set everything to false so that our update to true works
	$reset = "UPDATE professor_prefs SET time0745 = false, time0900 = false, time1015 = false, time1130 = false, time1245 = false, time1400 = false, time1515 = false, time1630 = false WHERE professor_id = $professor_id;";
	$stmt = $db->prepare($reset);
	$stmt->execute();

	// Set the selected times to true
	foreach ($_POST['time'] as $time) {
		$update = "UPDATE professor_prefs SET $time = true WHERE professor_id = $professor_id;";
		$stmt = $db->prepare($update);
		$stmt->execute();
	}

	// head back to where we were
	$new_page = "professorPrefs.php";
 	header("Location: $new_page");
 	die();
?>
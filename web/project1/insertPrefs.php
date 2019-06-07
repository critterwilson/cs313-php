<?php
	// make sure we connect to the database
	require('databaseConnection.php');
	$db = get_db();

	var_dump($_POST);
	$professor_id = $_POST['professor'];
	$office = $_POST['office'];
	$instrument = $_POST['instrument'];
	$seating = $_POST['seating'];
	$mac = $_POST['mac'];

	# INSERT INTO professor_prefs (professor_id, office, instrument, mac, seating) VALUES (6, 'TAY', null, true, 2 ) ON CONFLICT UPDATE professor_prefs SET office = 'BID', instrument = null, mac = true, seating = 2) WHERE professor_id = $professor_id;
	$insert = "INSERT INTO professor_prefs (professor_id, office, instrument, mac, seating) VALUES ($professor_id, '$office', $instrument, $mac, $seating ON CONFLICT UPDATE professor_prefs SET office = $office, instrument = $instrument, mac = $mac, seating = $seating) WHERE professor_id = $professor_id;";
	$stmt = $db->prepare($insert);
	$stmt->execute();

 	# UPDATE professor_prefs SET time0900 = true;
	foreach ($_POST['time'] as $time) {
		$update = "UPDATE professor_prefs SET $time = true WHERE professor_id = $professor_id;";
		$stmt = $db->prepare($update);
		$stmt->execute();
	}
?>
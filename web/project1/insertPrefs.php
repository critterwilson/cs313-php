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
	echo $_POST['time'];

	# INSERT INTO professor_prefs (professor_id, office, instrument, mac, seating) VALUES (7, 'TAY', null, true, 2 ) ON CONFLICT (professor_id) DO UPDATE SET office = 'BID', instrument = null, mac = true, seating = 2;;
	$insert = "INSERT INTO professor_prefs (professor_id, office, instrument, mac, seating) VALUES ($professor_id, '$office', $instrument, $mac, $seating) ON CONFLICT (professor_id) DO UPDATE SET office = '$office', instrument = $instrument, mac = $mac, seating = $seating;";
	echo $insert;
	$stmt = $db->prepare($insert);
	$stmt->execute();

	$reset = "UPDATE professor_prefs SET time0745 = false, time0900 = false, time1015 = false, time1130 = false, time1245 = false, time1400 = false, time1515 = false, time1630 = false WHERE professor_id = $professor_id;";
	$stmt = $db->prepare($reset);
	$stmt->execute();


 	# UPDATE professor_prefs SET time0900 = true;
	foreach ($_POST['time'] as $time) {
		$update = "UPDATE professor_prefs SET $time = true WHERE professor_id = $professor_id;";
		$stmt = $db->prepare($update);
		$stmt->execute();
	}
?>
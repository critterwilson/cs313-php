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

	$stmt = $db->prepare("INSERT INTO professor_prefs (professor_id, office, instrument, mac, seating) VALUES ($professor_id, $office, $instrument, $mac, $seating;");
	$stmt->execute();

	foreach ($_POST['time'] as $time) {
		$stmt = $db->prepare("UPDATE professor_prefs SET $time = 'true' WHERE professor_id = $professor_id;")
		$stmt->execute();
	}
?>
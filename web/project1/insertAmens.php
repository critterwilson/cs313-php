<?php
	// make sure we connect to the database
	require('databaseConnection.php');
	$db = get_db();

	var_dump($_POST);
	$building = $_POST['building'];
	$room_number = $_POST['room_number'];
	$piano = $_POST['piano'];
	$keyboard = $_POST['keyboard'];
	$mac = $_POST['mac'];
	$seating = $_POST['seating'];
	$capacity = $_POST['capacity'];
	$primary_owner = $_POST['primary_owner'];
	$secondary_owner = $_POST['secondary_owner'];
	# INSERT INTO room (building, room_number, piano, keyboard, mac, seating, capacity, primary_ownder, secondary_owner) VALUES (...) ON CONFLICT (unique_room) DO UPDATE SET piano = ..., keyboard = ..., mac = ..., seating = 2, capacity = ..., primary_owner = ..., secondary_owner = ...;

	$insert = "INSERT INTO room (building, room_number, piano, keyboard, mac, seating, capacity, primary_owner, secondary_owner) VALUES ('$building', $room_number, $piano, $keyboard, $mac, $seating, $capacity, $primary_owner, $secondary_owner) ON CONFLICT (unique_room) DO UPDATE SET piano = $piano, keyboard = $keyboard, mac = $mac, seating = $seating, capacity = $capacity, primary_owner = $primary_owner, secondary_owner = $secondary_owner;";
	echo $insert;

?>
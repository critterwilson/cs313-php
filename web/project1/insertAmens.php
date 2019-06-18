<?php
	// make sure we connect to the database
	require('databaseConnection.php');
	$db = get_db();

	// store all of the data to make the query easier
	$building = $_POST['building'];
	$room_number = $_POST['room_number'];
	$piano = $_POST['piano'];
	$keyboard = $_POST['keyboard'];
	$mac = $_POST['mac'];
	$seating = $_POST['seating'];
	$capacity = $_POST['capacity'];
	$primary_owner = $_POST['primary_owner'];
	$secondary_owner = $_POST['secondary_owner'];

	# psql: INSERT INTO room (building, room_number, piano, keyboard, mac, seating, capacity, primary_ownder,
	#		secondary_owner) VALUES (...) ON CONFLICT (unique_room) DO UPDATE SET piano = ..., keyboard = ..., 
	#		mac = ..., seating = 2, capacity = ..., primary_owner = ..., secondary_owner = ...;

	// insert data into the room table. If the building/room_number combo already exists,
	// update instead of insert to prevent duplicate data
	$insert = "INSERT INTO room (building, room_number, piano, keyboard, mac, seating, capacity, primary_owner, secondary_owner) VALUES ('$building', $room_number, $piano, $keyboard, $mac, $seating, $capacity, '$primary_owner', '$secondary_owner') ON CONFLICT (building, room_number) DO UPDATE SET piano = $piano, keyboard = $keyboard, mac = $mac, seating = $seating, capacity = $capacity, primary_owner = '$primary_owner', secondary_owner = '$secondary_owner';";
	$stmt = $db->prepare($insert);
	$stmt->execute();

	foreach($db->query("SELECT id FROM room WHERE building = '$building' AND room_number = $room_number") as $room_id)
	{
		$room_id = htmlspecialchars($room_id);
		// $insert = "INSERT INTO schedule_mon (room_id) VALUES ($room_id);";
		// $stmt = $db->prepare($insert);
		// $stmt->execute();
		
		// $insert = "INSERT INTO schedule_tue (room_id) VALUES ($room_id);";
		// $stmt = $db->prepare($insert);
		// $stmt->execute();

		// $insert = "INSERT INTO schedule_wed (room_id) VALUES ($room_id);";
		// $stmt = $db->prepare($insert);
		// $stmt->execute();

		// $insert = "INSERT INTO schedule_thu (room_id) VALUES ($room_id);";
		// $stmt = $db->prepare($insert);
		// $stmt->execute();

		// $insert = "INSERT INTO schedule_fri (room_id) VALUES ($room_id);";
		// $stmt = $db->prepare($insert);
		// $stmt->execute();
	}

	// head back to where we were
	$new_page = "roomAmens.php";
 	header("Location: $new_page");
 	die();

?>
<?php
	require('databaseConnection.php');
	$db = get_db();


	// loop through all professors

	// loop through courses of each professor

	// take one course, professor, compare to room
	// IF professorprefs match room prefs
	//    schedule it
	// ELSE
	//    break


	// foreach($db->query("SELECT id, professor_id FROM section WHERE professor_id IS NOT NULL;") as $prof)
	// {
	// 	foreach($db->query("SELECT id FROM room;") as $room)
	// 	{
	// 		scheduleMatch($db, $prof['id'], $prof['professor_id'], $room['id'], 'mon');
	// 	}
	// }
	// echo 'done';
?>

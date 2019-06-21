<?php
	require('databaseConnection.php');
	$db = get_db();

	// function getScheduleMatch(prof_id, room_id) {

	// }

	// function getPrefMatch(prof_id, room_id) {

	// }
	
	foreach($db->query("SELECT professor_id FROM section WHERE professor_id IS NOT NULL;") as $prof)
	{
		echo $prof['professor_id'].'<br>';

		foreach($db->query("SELECT id FROM room;") as $room)
		{
			echo $room['id'];
		}
		echo '<br>';
	}
?>

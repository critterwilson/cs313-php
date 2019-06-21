<?php
	require('databaseConnection.php');
	$db = get_db();

	function scheduleMatch($db, $prof_id, $room_id) {
		foreach($db->query("SELECT time0745, time0900, time1015, time1130, time1245, time1400, time1515, time1630 FROM professor_prefs WHERE professor_id = $prof_id;") as $prof_time)
		{
			echo $prof_time['time0745'];
		}

		return;
	}

	// function getPrefMatch(prof_id, room_id) {

	// }
	
	foreach($db->query("SELECT professor_id FROM section WHERE professor_id IS NOT NULL;") as $prof)
	{
		foreach($db->query("SELECT id FROM room;") as $room)
		{
			scheduleMatch($db, $prof['professor_id'], $room['id']);
		}
	}
	echo 'done';
?>

<?php
	require('databaseConnection.php');
	$db = get_db();

	function scheduleMatch($db, $prof_id, $room_id, $day) {
		foreach($db->query("SELECT time0745, time0900, time1015, time1130, time1245, time1400, time1515, time1630 FROM professor_prefs WHERE professor_id = $prof_id;") as $prof_time)
		{
			foreach($db->query("SELECT time0745, time0900, time1015, time1130, time1245, time1400, time1515, time1630 FROM schedule_$day WHERE room_id = $room_id;") as $room_time)
			{
				if ($prof_time['time0745'] == true && $room_time['time0745'] == "")
					echo "7:45 true ";
				if ($prof_time['time0900'] == true && $room_time['time0900'] == "")
					echo "9:00 true ";
				if ($prof_time['time1015'] == true && $room_time['time1015'] == "")
					echo "10:15 true ";
				if ($prof_time['time1130'] == true && $room_time['time1130'] == "")
					echo "11:30 true ";
				if ($prof_time['time1245'] == true && $room_time['time1245'] == "")
					echo "12:45 true ";
				if ($prof_time['time1400'] == true && $room_time['time1400'] == "")
					echo "2:00 true ";
				if ($prof_time['time1515'] == true && $room_time['time1515'] == "")
					echo "3:15 true ";
				if ($prof_time['time1630'] == true && $room_time['time1630'] == "")
					echo "4:30 true";
				echo '<br>';
			}
		}

		return;
	}

	// function getPrefMatch(prof_id, room_id) {

	// }
	
	foreach($db->query("SELECT professor_id FROM section WHERE professor_id IS NOT NULL;") as $prof)
	{
		foreach($db->query("SELECT id FROM room;") as $room)
		{
			scheduleMatch($db, $prof['professor_id'], $room['id'], 'mon');
		}
	}
	echo 'done';
?>

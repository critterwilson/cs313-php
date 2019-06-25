<?php
	require('databaseConnection.php');
	$db = get_db();

	function getPrefMatch($db, $prof_id, $room_id) {
		foreach($db->query("SELECT office, instrument, mac, seating FROM professor_prefs WHERE professor_id = $prof_id;") as $prof_pref)
		{
			foreach($db->query("SELECT building, piano, keyboard, mac, seating FROM room WHERE id = $room_id;") as $room)
			{
				$match = 0;
				if ($prof_pref['office'] == 'BID' && $room['building'] != 'TAY')
					return false;
				else
					$match += 1;
				
				if ($prof_pref['instrument'] == '1' && $room['piano'] == '1')
					$match += 1;
				else if ($prof_pref['instrument'] == '0' && $room['keyboard'] == '1')
					$match += 1;
				else if ($prof_pref['instrument'] == "")
					$match += 1;

				if ($prof_pref['mac'] == $room['mac'])
					$match += 1;
				else if ($prof_pref['mac'] == "")
					$match += 1;

				if ($prof_pref['seating'] == $room['seating'])
					$match += 1;
				else if ($prof_pref['seating'] == "")
					$match += 1;

				if (($match / 4) >= .70)
					return true;
				else
					return false;
			}
		}
	}

	function scheduleMatch($db, $prof_id, $room_id, $day) {
		foreach($db->query("SELECT time0745, time0900, time1015, time1130, time1245, time1400, time1515, time1630 FROM professor_prefs WHERE professor_id = $prof_id;") as $prof_time)
		{
			echo $prof_id.'<br>';
			foreach($db->query("SELECT time0745, time0900, time1015, time1130, time1245, time1400, time1515, time1630 FROM schedule_$day WHERE room_id = $room_id;") as $room_time)
			{
				if ($prof_time['time0745'] == true && $room_time['time0745'] == "")
					$x = getPrefMatch($db, $prof_id, $room_id);
					echo "7:45->$x ";
				if ($prof_time['time0900'] == true && $room_time['time0900'] == "")
					$x = getPrefMatch($db, $prof_id, $room_id);
					echo "9:00->$x ";
				if ($prof_time['time1015'] == true && $room_time['time1015'] == "")
					$x = getPrefMatch($db, $prof_id, $room_id);
					echo "10:15->$x ";
				if ($prof_time['time1130'] == true && $room_time['time1130'] == "")
					$x = getPrefMatch($db, $prof_id, $room_id);
					echo "11:30->$x ";
				if ($prof_time['time1245'] == true && $room_time['time1245'] == "")
					$x = getPrefMatch($db, $prof_id, $room_id);
					echo "12:45->$x ";
				if ($prof_time['time1400'] == true && $room_time['time1400'] == "")
					$x = getPrefMatch($db, $prof_id, $room_id);
					echo "2:00->$x ";
				if ($prof_time['time1515'] == true && $room_time['time1515'] == "")
					$x = getPrefMatch($db, $prof_id, $room_id);
					echo "3:15->$x ";
				if ($prof_time['time1630'] == true && $room_time['time1630'] == "")
					$x = getPrefMatch($db, $prof_id, $room_id);
					echo "4:30->$x ";
				echo '<br>';
			}
		}

		return;
	}
	
	foreach($db->query("SELECT professor_id FROM section WHERE professor_id IS NOT NULL;") as $prof)
	{
		foreach($db->query("SELECT id FROM room;") as $room)
		{
			scheduleMatch($db, $prof['professor_id'], $room['id'], 'mon');
		}
	}
	echo 'done';
?>

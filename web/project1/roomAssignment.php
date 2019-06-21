<?php
	require('databaseConnection.php');
	$db = get_db();

	function getScheduleMatch(prof_id, room_id) {

	}

	function getPrefMatch(prof_id, room_id) {

	}
	
	foreach($db->query("SELECT professor_id from section WHERE professor_id != null;") as $prof)
	{
		echo $prof['id'];
	}
?>

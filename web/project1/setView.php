<?php
	require('databaseConnection.php');
	$db = get_db();

	switch($_REQUEST["q"]) {
		case 1:
			// SELECT * FROM professor ORDER BY name_last asc, name_first asc;
			foreach ($db->query('SELECT name_last, name_first FROM professor ORDER BY name_last ASC, name_first ASC;') as $row)
			{
			  	echo $row['name_last'].', '.$row['name_last'];
			}	
			break;
		case 2:
			echo "Case 1";
			break;
		case 3:
			echo "Case 2";
			break;
	}

?>
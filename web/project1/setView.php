<?php
	require('databaseConnection.php');
	$db = get_db();

	switch($_REQUEST["q"]) {
		case 1:
			echo '<select id="professor">';
			foreach ($db->query('SELECT name_first, name_last FROM professor') as $row)
			{
			  	echo '<option value='.$row['name_last'].'>'.$row['name_last'].', '.$row['name_first'].'</option>';
			}
			echo '</select>';	
			break;
		case 2:
			echo "Case 1";
			break;
		case 3:
			echo "Case 2";
			break;
	}

?>
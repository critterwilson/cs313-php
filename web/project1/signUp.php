<?php
	require('databaseConnection.php');
	$db = get_db();
	
	if (isset($_REQUEST["q"])) {
		for ($i = 0; $i < $_REQUEST["q"]; $i++) { 
			echo '<div id="courseSelect_'.$i.'">';
			echo '<select onchange="courseSignUp_Section()">';
			// psql: SELECT * FROM class ORDER BY postfix ASC, prefix ASC;
			foreach ($db->query('SELECT * FROM course ORDER BY postfix ASC, prefix ASC;') as $row)
			{
				// <option value='RELC275'>RELC275 Teachings of the Book of Mormon</option>
			  	echo '<option value="'.$row['prefix'].$row['postfix'].'">'.$row['prefix'].$row['postfix'].' '.$row['name'].'</option>';
			}
			echo '</select>';
			echo '</div>';
		}
	}
?>
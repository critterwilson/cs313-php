<?php
	require('databaseConnection.php');
	$db = get_db();
	
	//if (isset($_REQUEST["q"])) {
		for ($i = 0; $i < $_REQUEST["q"]; $i++) { 
			echo '<select id="courseSelect_'.$i.'">';
			// psql: SELECT * FROM class ORDER BY postfix ASC, prefix ASC;
			foreach ($db->query('SELECT * FROM class ORDER BY postfix ASC, prefix ASC;') as $row)
			{
				// <option value='RELC275'>RELC275 Teachings of the Book of Mormon</option>
			  	echo '<option value="'.$row['prefix'].$row['postfix'].'">'.$row['prefix'].$row['postfix'].' '.$row['name'].'</option>';
			}
			echo '</select>';
		}
	//}
?>
<?php
	require('databaseConnection.php');
	$db = get_db();
	echo "here<br>";
	for ($i = 0; $i < $_REQUEST["q"]; $i++) { 
		echo '<select id="courseSelect_'.$i.'>';
		// psql: SELECT * FROM section
		//       JOIN course ON section.course_id = course.id;
		foreach ($db->query('SELECT * FROM section JOIN course ON section.course_id = course.id;') as $row)
		{
			// <option value='2757'>RELC275:7 Teachings of the Book of Mormon</option>
		  	echo '<option value='.$row['postfix'].$row['section_number'].'>'.$row['prefix'].$row['postfix'].':'.$row['section_number'].' '.$row['name'].'</option>';
		}	
		echo '</select>';
	}

?>
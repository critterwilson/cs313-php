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

		  	echo '<option value='.$row['prefix'].$row['postfix'].':'.$row['section_number'].' '.$row['name'].'</option>';
		}	
		echo '</select>';
	}

?>
<?php
	require('databaseConnection.php');
	$db = get_db();

	switch($_REQUEST["q"]) {
		case 1:
			// psql: SELECT * FROM professor ORDER BY name_last ASC, name_first ASC;
			foreach ($db->query('SELECT * FROM professor ORDER BY name_last ASC, name_first ASC;') as $row)
			{
			  	echo $row['name_last'].', '.$row['name_first'].'<br>';
			}	
			break;
		case 2:
			// psql: SELECT * FROM course ORDER BY postfix ASC;
			foreach ($db->query('SELECT * FROM course ORDER BY postfix ASC;') as $row)
			{
			  	echo $row['prefix'].$row['postfix'].' '.$row['name'].'<br>';
			}				break;
		case 3:
			// psql: SELECT * FROM section
			//       JOIN course ON section.course_id = course.id;
			foreach ($db->query('SELECT * FROM section JOIN course ON section.course_id = course.id;') as $row)
			{
			  	echo $row['prefix'].$row['postfix'].':'.$row['section_number'].' '.$row['name'].'<br>';
			}	
			break;
	}

?>
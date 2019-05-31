<?php
	require('databaseConnection.php');
	$db = get_db();

	switch($_REQUEST["q"]) {
		case 1:
			echo '<table class="readInfo">';
			echo '<tr><th>Professor</th>';
			echo '<th>Course</th>';
			echo '<th>Section</th></tr>';

			# psql: SELECT * FROM professor
			#		JOIN section ON section.professor_id = professor.id
			#		JOIN course ON section.course_id = course.id
			#		ORDER BY professor.name_last ASC, professor.name_first ASC;
			foreach ($db->query('SELECT * FROM professor JOIN section ON section.professor_id = professor.id JOIN course ON section.course_id = course.id ORDER BY professor.name_last ASC, professor.name_first ASC;') as $row)
			{
			  	echo '<tr><td>'.$row['name_last'].', '.$row['name_first'].'</td>';
			  	echo '<td>'.$row['prefix'].$row['postfix'].' '.$row['name'].'</td>';
			  	echo '<td>'.$row['section_number'].'</td></tr>';
			}	
			break;
		case 2:
			echo '<table class="readInfo">';
			echo '<tr><th>Professor</th>';
			echo '<th>Course</th>';
			echo '<th>Section</th></tr>';
			
			# psql: SELECT * FROM professor
			#		JOIN section ON section.professor_id = professor.id
			#		JOIN course ON section.course_id = course.id
			#		ORDER BY professor.name_last ASC, professor.name_first ASC;
			foreach ($db->query('SELECT * FROM professor JOIN section ON section.professor_id = professor.id JOIN course ON section.course_id = course.id ORDER BY professor.name_last ASC, professor.name_first ASC;') as $row)
			{
			  	echo '<tr><td>'.$row['name_last'].', '.$row['name_first'].'</td>';
			  	echo '<td>'.$row['prefix'].$row['postfix'].' '.$row['name'].'</td>';
			  	echo '<td>'.$row['section_number'].'</td></tr>';
			}
			break;
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
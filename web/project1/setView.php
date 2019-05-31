<?php
	require('databaseConnection.php');
	$db = get_db();

	switch($_REQUEST["q"]) {
		// sort by professor
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
			  	echo '<td>'.$row['section_number'].'</td>';
			  	echo '<td><form action="remove.php" method="POST">';
			  	echo '<input type="hidden" value="'.$row['course_id'].'" name="cID">';
			  	echo '<input type="hidden" value="'.$row['professor_id'].'" name="pID">';
			  	echo '<button type="submit">Remove</button></td></tr>';
			}	
			break;
		// sort by course
		case 2:
			echo '<table class="readInfo">';
			echo '<tr><th>Course</th>';
			echo '<th>Section</th>';
			echo '<th>Professor</th></tr>';

			# psql: SELECT * FROM professor
			#		JOIN section ON section.professor_id = professor.id
			#		JOIN course ON section.course_id = course.id
			#		ORDER BY professor.name_last ASC, professor.name_first ASC;
			foreach ($db->query('SELECT * FROM professor JOIN section ON section.professor_id = professor.id JOIN course ON section.course_id = course.id ORDER BY course.postfix ASC, section.section_number ASC;') as $row)
			{
				echo '<tr><td>'.$row['prefix'].$row['postfix'].' '.$row['name'].'</td>';
			  	echo '<td>'.$row['section_number'].'</td>';
			  	echo '<td>'.$row['name_last'].', '.$row['name_first'].'</td>';
			  	echo '<td><form action="remove.php" method="POST">';
			  	echo '<input type="hidden" value="'.$row['course_id'].'" name="cID">';
			  	echo '<input type="hidden" value="'.$row['professor_id'].'" name="pID">';
			  	echo '<button type="submit">Remove</button></td></tr>';	
			}
			break;
	}

?>
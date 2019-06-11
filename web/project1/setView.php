<?php
	require('databaseConnection.php');
	$db = get_db();

	switch($_REQUEST["q"]) {
		// sort by professor
		case 1:
			echo '<table id="readInfo">';
			echo '<tr><th>Professor</th>';
			echo '<th>Course</th>';
			echo '<th>Section</th>';
			echo '<th></th></tr>';

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
			  	echo '<input type="hidden" value="'.$row['section_number'].'" name="sID">';
			  	echo '<button type="submit" class="reset" onclick="return confirm(\'Remove this professor fromt this course?\')">Remove</button></form></td></tr>';
			}	
			echo '</table>';
			break;
		// sort by course
		case 2:
			echo '<table id="readInfo">';
			echo '<tr><th>Course</th>';
			echo '<th>Section</th>';
			echo '<th>Professor</th>';
			echo '<th></th></tr>';

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
			  	echo '<input type="hidden" value="'.$row['section_number'].'" name="sID">';
			  	echo '<button type="submit" class="reset" onclick="return confirm(\'Remove this professor fromt this course?\')">Remove</button></form></td></tr>';	
			}
			echo '</table>';
			break;
		// Show all sections available and taken
		case 3:
			echo '<table id="readInfo">';
			echo '<tr><th>Course</th>';
			echo '<th>Section</th>';
			echo '<th>Professor</th>';
			echo '<th></th></tr>';

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
			  	echo '<input type="hidden" value="'.$row['section_number'].'" name="sID">';
			  	echo '<button type="submit" class="reset" onclick="return confirm(\'Remove this professor fromt this course?\')">Remove</button></form></td></tr>';

			}

			foreach ($db->query('SELECT course.prefix, course.postfix, course.name, section.section_number FROM section JOIN course ON section.course_id = course.id WHERE section.taken = false ORDER BY course.postfix ASC, section.section_number ASC;') as $row)
			{
				echo '<tr><td>'.$row['prefix'].$row['postfix'].' '.$row['name'].'</td>';
			  	echo '<td>'.$row['section_number'].'</td>';
			  	echo '<td></td><td></td>';
			}

			echo '</table>';
			break;
		case 4:
			echo '<table id="readInfo">';
			echo '<tr><th>Professor</th>';
			echo '<th>Office Building</th>';
			echo '<th>Instrument</th>';
			echo '<th>Mac/PC</th>';
			echo '<th>Seating</th>';
			echo '<th>7:45am</th>';
			echo '<th>9:00am</th>';
			echo '<th>10:15am</th>';
			echo '<th>11:30am</th>';
			echo '<th>12:45am</th>';
			echo '<th>2:00pm</th>';
			echo '<th>3:15pm</th>';
			echo '<th>4:30pm</th></tr>';

			foreach ($db->query('SELECT * FROM professor_prefs JOIN professor ON professor_id = professor.id;') as $row)
			{

				echo '<tr><td>'.$row['name_last'].', '.$row['name_first'].'</td>';
			  	echo '<td>'.$row['office'].'</td>';
			  	echo '<td>'.$row['instrument'].'</td>';
			  	echo '<td>'.$row['mac'].'</td>';
			  	echo '<td>'.$row['seating'].'</td>';
			  	echo '<td>'.$row['time0745'].'</td>';
			  	echo '<td>'.$row['time0900'].'</td>';
			  	echo '<td>'.$row['time1015'].'</td>';
			  	echo '<td>'.$row['time1130'].'</td>';
			  	echo '<td>'.$row['time1245'].'</td>';
			  	echo '<td>'.$row['time1400'].'</td>';
			  	echo '<td>'.$row['time1515'].'</td>';
			  	echo $row['time1630'] === '1' ? '<td>Yes</td>' : '<td>No</td>';
			}			
	}

?>
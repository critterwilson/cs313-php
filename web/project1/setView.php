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
				if ($row['mac'] == '1') {
					$mac = 'Mac';
				} else if ($row['mac'] == '0') {
					$mac = 'PC';
				} else {
					$mac = 'Don\'t Care';
				}

				if ($row['instrument'] == '1') {
					$instrument = 'Keyboard';
				} else if ($row['mac'] == '0') {
					$instrument = 'Piano';
				} else {
					$instrument = 'Don\'t Care';
				}

				if ($row['seating'] == '1') {
					$seating = 'Side Aisle';
				} else if ($row['seating'] == '2') {
					$seating = 'Center Aisle';
				} else if ($row['seating'] == '3') {
					$seating = 'Desks';
				} else if ($row['seating'] == '4') {
					$seating = 'Tables/Chairs';
				} else {
					$seating = 'Don\'t Care';
				}

				echo '<tr><td>'.$row['name_last'].', '.$row['name_first'].'</td>';
			  	echo '<td>'.$row['office'].'</td>';
			  	echo '<td>'.$instrument.'</td>';
			  	echo '<td>'.$mac.'</td>';
			  	echo '<td>'.$seating.'</td>';
			  	echo $row['time0745'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
			  	echo $row['time0900'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
			  	echo $row['time1015'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
			  	echo $row['time1130'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
			  	echo $row['time1245'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
			  	echo $row['time1400'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
			  	echo $row['time1515'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
			  	echo $row['time1630'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
			}
			echo '</table>';
			break;

		case 5:
			echo '<table id="readInfo">';
			echo '<tr><th>Building</th>';
			echo '<th>Room</th>';
			echo '<th>Piano</th>';
			echo '<th>Keyboard</th>';
			echo '<th>Mac</th>';
			echo '<th>Seating</th>';
			echo '<th>Capacity</th>';
			echo '<th>Primary</th>';
			echo '<th>Secondary</th></tr>';

			# psql: SELECT * FROM room;
			foreach ($db->query('SELECT * FROM room ORDER BY building ASC, room_number ASC;') as $row)
			{
				if ($row['seating'] == '1') {
					$seating = 'Side Aisle';
				} else if ($row['seating'] == '2') {
					$seating = 'Center Aisle';
				} else if ($row['seating'] == '3') {
					$seating = 'Desks';
				} else if ($row['seating'] == '4') {
					$seating = 'Tables/Chairs';
				} else {
					$seating = 'Don\'t Care';
				}

				echo '<tr><td>'.$row['building'].'</td>';
				echo '<td>'.$row['room'].'</td>'
				echo $row['piano'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
				echo $row['keyboard'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
				echo $row['mac'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
				echo '<td>'.$seating.'</td>';
				echo '<td>'.$row['capacity'].'</td>';
				echo '<td>'.$row['primary_owner'].'</td>';
				echo '<td>'.$row['secondary_owner'].'</td>';
			}
			echo '</table>';
			break;
	}

?>
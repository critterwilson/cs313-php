<?php
	// make sure we are connected to the database
	require('databaseConnection.php');
	$db = get_db();

	// Switch statment based on what the user wants to view (passed in from readInfo.php)
	switch($_REQUEST["q"]) {
		### SHOW ALL PROFESSORS ###
		case 1:
			// table header
			echo '<table id="readInfo">';
			echo '<tr><th>First Name</th>';
			echo '<th>Last Name</th>';
			echo '<th>Adjunct</th>';
			echo '<th></th></tr>';

			# psql: SELECT * FROM professor
			#		JOIN section ON section.professor_id = professor.id
			#		JOIN course ON section.course_id = course.id
			#		ORDER BY professor.name_last ASC, professor.name_first ASC;

			// select everything from professor
			foreach ($db->query('SELECT * FROM professor ORDER BY professor.name_last ASC, professor.name_first ASC;') as $row)
			{
				// First name: ex. Rex
			  	echo '<tr><td>'.$row['name_first'].'</td>';
			  	// Last name: ex. Butterfield
			  	echo '<td>'.$row['name_last'].'</td>';
			  	// Adjunct status: ex. No
			  	echo $row['adjunct'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
			  	// Remove button
			  	echo '<td><form action="remove.php" method="POST">';
			  	echo '<input type="hidden" value="'.$row['id'].'" name="tID">';
			  	echo '<button type="submit" class="reset" onclick="return confirm(\'Remove this professor?\')">Remove</button></form></td></tr>';
			}	
			echo '</table>';
			break;

		### SHOW ALL OCCUPIED SECTIONS ###
		case 2:
			// table headers
			echo '<table id="readInfo">';
			echo '<tr><th>Course</th>';
			echo '<th>Section</th>';
			echo '<th>Professor</th>';
			echo '<th></th></tr>';

			# psql: SELECT * FROM professor
			#		JOIN section ON section.professor_id = professor.id
			#		JOIN course ON section.course_id = course.id
			#		ORDER BY professor.name_last ASC, professor.name_first ASC;

			// select everything from professor, section, and course
			foreach ($db->query('SELECT * FROM professor JOIN section ON section.professor_id = professor.id JOIN course ON section.course_id = course.id ORDER BY course.postfix ASC, section.section_number ASC;') as $row)
			{
				// Course info ex. REL200 The Eternal Family
				echo '<tr><td>'.$row['prefix'].$row['postfix'].' '.$row['name'].'</td>';
				// Section number ex. 12
			  	echo '<td>'.$row['section_number'].'</td>';
			  	// Professor name ex. Butterfield, Rex
			  	echo '<td>'.$row['name_last'].', '.$row['name_first'].'</td>';
			  	// Remove button
			  	echo '<td><form action="remove.php" method="POST">';
			  	echo '<input type="hidden" value="'.$row['course_id'].'" name="cID">';
			  	echo '<input type="hidden" value="'.$row['professor_id'].'" name="pID">';
			  	echo '<input type="hidden" value="'.$row['section_number'].'" name="sID">';
			  	echo '<button type="submit" class="reset" onclick="return confirm(\'Remove this professor from this course?\')">Remove</button></form></td></tr>';	
			}
			echo '</table>';
			break;

		### SHOW ALL UNOCCUPIED SECTIONS ###
		case 3:
			// table headers
			echo '<table id="readInfo">';
			echo '<tr><th>Course</th>';
			echo '<th>Section</th>';
			echo '<th></th></tr>';

			# psql: SELECT course.prefis, course.postfix, course.name, section.section_number FROM 
			#		section JOIN course on section.course_id = course.id WHERE section.taken = false
			#		ORDER BY course.postfix ASC, section.section_number ASC;

			// select all of the data from the section and course tables where the sections are not taken
			foreach ($db->query('SELECT course.prefix, course.postfix, course.name, section.section_number FROM section JOIN course ON section.course_id = course.id WHERE section.taken = false ORDER BY course.postfix ASC, section.section_number ASC;') as $row)
			{
				// Course code ex. RELC200 The Eternal Family
				echo '<tr><td>'.$row['prefix'].$row['postfix'].$row['name'].'</td>';
				// Section number ex. 25
			  	echo '<td>'.$row['section_number'].'</td>';
			  	// Remove button
			  	echo '<td><button class="reset" onclick="alert(\'To remove sections, go to the sections tab and enter the number of sections desired.\')">Remove</button></form></td></tr>';
			}
			echo '</table>';
			break;

		### SHOW ALL PROFESSOR PREFERENCES ###
		case 4:
			// table header
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
			echo '<th>4:30pm</th>';
			echo '<th></th></tr>';

			# psql: SELECT professor_prefs.*, professor.name_last, professor.name_first 
			#		FROM professor_prefs JOIN professor ON professor_id = professor.id;

			// select everything from professor prefs but only name values from professor 
			// to avoid duplicate id column
			foreach ($db->query('SELECT professor_prefs.*, professor.name_last, professor.name_first FROM professor_prefs JOIN professor ON professor_id = professor.id;') as $row)
			{
				// Multiple values for "mac"
				if ($row['mac'] == '1') {
					$mac = 'Mac';
				} else if ($row['mac'] == '0') {
					$mac = 'PC';
				} else {
					$mac = 'Don\'t Care';
				}

				// multiple values for instrument
				if ($row['instrument'] == '1') {
					$instrument = 'Keyboard';
				} else if ($row['mac'] == '0') {
					$instrument = 'Piano';
				} else {
					$instrument = 'Don\'t Care';
				}

				// multiple values for seating
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

				// Professor name ex. Butterfield, Rex
				echo '<tr><td>'.$row['name_last'].', '.$row['name_first'].'</td>';
				// What buliding their office is in ex. TAY
			  	echo '<td>'.$row['office'].'</td>';
			  	// Piano or keyboard ex. Piano
			  	echo '<td>'.$instrument.'</td>';
			  	// Mac or PC ex. MAC
			  	echo '<td>'.$mac.'</td>';
			  	// Seating preference ex. Center Aisle
			  	echo '<td>'.$seating.'</td>';
			  	// Availability for each time ex. Yes
			  	echo $row['time0745'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
			  	echo $row['time0900'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
			  	echo $row['time1015'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
			  	echo $row['time1130'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
			  	echo $row['time1245'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
			  	echo $row['time1400'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
			  	echo $row['time1515'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
			  	echo $row['time1630'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
			  	// Remove button
			  	echo '<td><form action="remove.php" method="POST">';
			  	echo '<input type="hidden" value="'.$row['id'].'" name="prefID">';
			  	echo '<button type="submit" class="reset" onclick="return confirm(\'Remove these preferences?\')">Remove</button></form></td></tr>';
			}
			echo '</table>';
			break;

		### SHOW ALL ROOM AMENITIES ###
		case 5:
			// table header
			echo '<table id="readInfo">';
			echo '<tr><th>Building</th>';
			echo '<th>Room</th>';
			echo '<th>Piano</th>';
			echo '<th>Keyboard</th>';
			echo '<th>CPU</th>';
			echo '<th>Seating</th>';
			echo '<th>Capacity</th>';
			echo '<th>Primary</th>';
			echo '<th>Secondary</th>';
			echo '<th></th></tr>';

			// Select everything from the room table
			foreach ($db->query('SELECT * FROM room ORDER BY building ASC, room_number ASC;') as $row)
			{
				// multiple values for seating
				if ($row['seating'] == '1') {
					$seating = 'Side Aisle';
				} else if ($row['seating'] == '2') {
					$seating = 'Center Aisle';
				} else if ($row['seating'] == '3') {
					$seating = 'Desks';
				} else if ($row['seating'] == '4') {
					$seating = 'Tables/Chairs';
				} else {
					$seating = 'Unknown';
				}

				// Building ex. BEN
				echo '<tr><td>'.$row['building'].'</td>';
				// Room number ex. 107
				echo '<td>'.$row['room_number'].'</td>';
				// Is there a piano? ex. No
				echo $row['piano'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
				// Is there a keyboard ex. No
				echo $row['keyboard'] == '1' ? '<td>Yes</td>' : '<td>No</td>';
				// Is there a Mac or PC ex. PC
				echo $row['mac'] == '1' ? '<td>Mac</td>' : '<td>PC</td>';
				// Which type of seating ex. Desks
				echo '<td>'.$seating.'</td>';
				// Student capacity ex. 48
				echo $row['capacity'] == '0' ? '<td>Unknown</td>' : '<td>'.$row['capacity'].'</td>';
				// Primary registration privilege ex. REL
				echo $row['primary_owner'] == 'NULL' ? '<td>Unknown</td>' : '<td>'.$row['primary_owner'].'</td>';
				// Secondary registration privilege ex. BIO
				echo $row['secondary_owner'] == 'NULL' ? '<td>Unknown</td>' : '<td>'.$row['secondary_owner'].'</td>';
				// Remove button
				echo '<td><form action="remove.php" method="POST">';
			  	echo '<input type="hidden" value="'.$row['id'].'" name="amenID">';
			  	echo '<button type="submit" class="reset" onclick="return confirm(\'Remove this room information?\')">Remove</button></form></td></tr>';
			}
			echo '</table>';
			break;

		### SHOW ALL COURSES ###
		case 6:
			// table header
			echo '<table id="readInfo">';
			echo '<tr><th>Course Code</th>';
			echo '<th>Name</th>';
			echo '<th></th></tr>';

			// select everything from the course table
			foreach ($db->query('SELECT * from course ORDER BY postfix ASC;') as $row)
			{
				// Course code ex. RELC200
				echo '<tr><td>'.$row['prefix'].$row['postfix'].'</td>';
				// Course name ex. The Eternal Family
				echo '<td>'.$row['name'].'</td>';
				// Remove button
			  	echo '<td><form action="remove.php" method="POST">';
			  	echo '<input type="hidden" value="'.$row['id'].'" name="qID">';
			  	echo '<button type="submit" class="reset" onclick="return confirm(\'Remove this course?\')">Remove</button></form></td></tr>';
			}

			echo '</table>';
			break;
	}

?>
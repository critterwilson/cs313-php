<?php
	require('databaseConnection.php');
	$db = get_db();
	
	// make sure we have an amount of classes desired to sign up for
	if (isset($_REQUEST["q"])) {
		// for the number of classes desired
		for ($i = 0; $i < $_REQUEST["q"]; $i++) { 
			echo '<select id="courseSelect_'.$i.'">';
			
			# psql: SELECT course.prefix, course.postfix, course.name, MIN(section.section_number) 
			# 		 FROM course JOIN section ON course.id = section.course_id 
			# 	     WHERE section.taken = false 
			# 		 GROUP BY course.prefix, course.postfix, course.name
			# 		 ORDER BY course.postfix ASC;

			// select only one row per class with available sections, order by postfix
			foreach ($db->query('SELECT course.prefix, course.postfix, course.name, MIN(section.section_number) FROM course JOIN section ON course.id = section.course_id WHERE section.taken = false GROUP BY course.prefix, course.postfix, course.name ORDER BY course.postfix ASC;') as $row)
			{
				# <option value='RELC275'>RELC275 Teachings of the Book of Mormon</option>
			  	echo '<option value="'.$row['prefix'].$row['postfix'].'">'.$row['prefix'].$row['postfix'].' '.$row['name'].'</option>';
			}
			echo '</select>';

			foreach ($db->query('SELECT course.prefix, course.postfix, course.name, MIN(section.section_number) FROM course JOIN section ON course.id = section.course_id WHERE section.taken = false GROUP BY course.prefix, course.postfix, course.name ORDER BY course.postfix ASC;') as $row)
		}
	}
?>


<?php
	require('databaseConnection.php');
	$db = get_db();
	
	// make sure we have an amount of classes desired to sign up for
	if (isset($_REQUEST["q"])) {
		// for the number of classes desired
		for ($i = 0; $i < $_REQUEST["q"]; $i++) { 
			echo '<div id="signUp_'.$i.'">';
			echo '<select id="courseSelect_'.$i.'" onchange="sectionSignUp('.$i.')">';
			
			# psql: SELECT course.prefix, course.postfix, course.name, MIN(section.section_number) 
			# 		 FROM course JOIN section ON course.id = section.course_id 
			# 	     WHERE section.taken = false 
			# 		 GROUP BY course.prefix, course.postfix, course.name
			# 		 ORDER BY course.postfix ASC;

			// select only one row per class with available sections, order by postfix
			foreach ($db->query('SELECT course.prefix, course.postfix, course.name, MIN(section.section_number) FROM course JOIN section ON course.id = section.course_id WHERE section.taken = false GROUP BY course.prefix, course.postfix, course.name ORDER BY course.postfix ASC;') as $row)
			{
				# <option value='RELC275'>RELC275 Teachings of the Book of Mormon</option>
			  	echo '<option value="'.$row['postfix'].'">'.$row['prefix'].$row['postfix'].' '.$row['name'].'</option>';
			}
			echo '</select>';
			echo '</div>';
		}
	}

	if (isset($_REQUEST["r"])) {
		echo '<select id="sectionSelect_'.$i.'">';
		foreach ($db->query('SELECT * FROM section JOIN course ON course.postfix = 100 WHERE section.course_id = course.id;') as $row)
		{
			echo '<option value="'.$row['section_number'].'">"'.$row['section_number'].'</option>';
		}
		echo '</select>';
	}
?>


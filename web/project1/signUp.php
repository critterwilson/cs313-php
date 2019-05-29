<?php
	require('databaseConnection.php');
	$db = get_db();
	
	// make sure we have an amount of classes desired to sign up for
	if (isset($_REQUEST["q"])) {
		// for the number of classes desired
		for ($i = 0; $i < $_REQUEST["q"]; $i++) { 
			echo '<div class="signUp" id="signUp_'.$i.'">';
			echo '<select id="courseSelect_'.$i.'" onchange="sectionSignUp('.$i.')">';
			echo '<option value="">Select Course</option>';
			
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
			// need the extra div so innerHTML can be replaced with the section number
			echo '<div id="sectionSelect_'.$i.'">';
			echo '</div>';
			echo '</div>';
		}
	}

	// present the availabe sections
	if (isset($_REQUEST["r"])) {
		echo '<select id="sectionSelect">';

		# psql: SELECT * FROM section JOIN course ON course.postfix = [passed in postfix]
		#        WHERE section.course_id = course.id AND section.taken = false;

		// give a select option for all of the sections available for the given course
		foreach ($db->query('SELECT * FROM section JOIN course ON course.postfix ='.$_REQUEST["r"].' WHERE section.course_id = course.id AND section.taken = false;') as $row)
		{
			# <option value="5">5</option>
			echo '<option value="'.$row['section_number'].'">'.$row['section_number'].'</option>';
		}
		echo '</select>';
	}
?>


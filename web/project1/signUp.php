<?php
	// make sure we are connected to the database
	require('databaseConnection.php');
	$db = get_db();
	
	// make sure we have an amount of classes desired to sign up for
	if (isset($_POST["q"])) {
		// for the number of classes desired
		for ($i = 0; $i < $_POST["q"]; $i++) { 
			echo '<div class="signUp" id="signUp_'.$i.'">';
			echo '<select name="courseSelect_'.$i.'" id="courseSelect_'.$i.'" onchange="sectionSignUp('.$i.')" class="courseSelect" required>';
			echo '<option value=""> Select Course </option>';
			# psql: SELECT course.prefix, course.postfix, course.name, MIN(section.section_number) 
			# 		FROM course JOIN section ON course.id = section.course_id 
			# 	    WHERE section.taken = false 
			# 		GROUP BY course.prefix, course.postfix, course.name
			# 		ORDER BY course.postfix ASC;

			// select only one row per class with available sections, order by postfix
			foreach ($db->query('SELECT course.prefix, course.postfix, course.name, course.id, MIN(section.section_number) FROM course JOIN section ON course.id = section.course_id WHERE section.taken = false GROUP BY course.prefix, course.postfix, course.name, course.id ORDER BY course.postfix ASC;') as $row)
			{
				# <option value='6 (course id)'>RELC275 Teachings of the Book of Mormon</option>
			  	echo '<option value="'.$row['id'].'">'.$row['prefix'].$row['postfix'].' '.$row['name'].'</option>';
			}
			echo '</select>';
			// need the extra div so innerHTML can be replaced with the section number
			echo '<div id="sectionSelect_'.$i.'" class="sectionSelect">';
			echo '</div>';
			echo '</div>';
		}
	}

	// present the availabe sections
	if (isset($_POST["r"]) && isset($_POST["s"])) {
		$i = $_POST["s"];
		echo '<select name="sectionSelect_'.$i.'" id="section_'.$i.'" required>';

		# psql: SELECT * FROM section JOIN course ON course.postfix = [passed in postfix]
		#       WHERE section.course_id = course.id AND section.taken = false ORDER BY
		#		section_number ASC;

		// give a select option for all of the sections available for the given course
		foreach ($db->query('SELECT section_number FROM section JOIN course ON course.id ='.$_POST["r"].' WHERE section.course_id = course.id AND section.taken = false ORDER BY section_number ASC;') as $row)
		{
			# <option value="5">5</option>
			echo '<option value="'.$row['section_number'].'">'.$row['section_number'].'</option>';
		}
		echo '</select>';
	}
?>


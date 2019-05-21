<?php
	require('databaseConnection.php');
	$db = get_db();
	
	if (isset($_REQUEST["q"])) {
		for ($i = 0; $i < $_REQUEST["q"]; $i++) { 
			echo '<div id="courseSelect_'.$i.'">';
			echo '<select onchange="courseSignUp_Section()">';
			// psql: SELECT * FROM class ORDER BY postfix ASC, prefix ASC;
			foreach ($db->query('SELECT course.prefix, course.postfix, course.name, MIN(section.section_number) FROM course JOIN section ON course.id = section.course_id WHERE section.taken = false GROUP BY course.prefix, course.postfix, course.name ORDER BY course.postfix ASC;') as $row)
			{
				// <option value='RELC275'>RELC275 Teachings of the Book of Mormon</option>
			  	echo '<option value="'.$row['prefix'].$row['postfix'].'">'.$row['prefix'].$row['postfix'].' '.$row['name'].'</option>';
			}
			echo '</select>';
			echo '</div>';
		}
	}
?>

SELECT course.prefix, course.postfix, course.name, MIN(section.section_number) 
FROM course JOIN section ON course.id = section.course_id 
WHERE section.taken = false 
GROUP BY course.prefix, course.postfix, course.name
ORDER BY course.postfix ASC;
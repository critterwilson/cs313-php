<?php
	require('databaseConnection.php');
	$db = get_db();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="project1.css">
	<title>Religion Teacher Sign-Up</title>
</head>
<body>
	<div class="topnav">
		<a href="sectionCreation.php">Sections</a>
		<a class="active" href="project1.php">Sign Up</a>
		<a href="readInfo.php">Read Info</a>
		<a href="professorPrefs">Professor Prefs</a>
	</div>

	<p class="instructions"><b>Instructions:</b><br> 
		1. Select the professors name<br>
		2. Select the amount of courses the professor will teach<br>
		3. Select the desired course and section numbers for each empty slot<br>
		4. Press "submit"</p>

	<form id="teacherSignUp" action="submitSignUp.php" method="POST" onsubmit="return verifySignUp()">
	<!-- Database Query to fetch all professors -->
		<?php
			// start select tag
			echo '<select name="professor" required>';
			echo '<option value="">Select Professor</option>';
			// SELECT name_first, name_last FROM professor
			foreach ($db->query('SELECT name_first, name_last, id FROM professor') as $row)
			{
				// <option value=name_last>Last, First</option 
			  	echo '<option value="'.$row['id'].'">'.$row['name_last'].', '.$row['name_first'].'</option><br>';
			}
			// close select tag
			echo '</select>'
		?>

		<!-- How many courses to register the teacher for -->
		<select name="numCourses" id="numCourses" onchange="courseSignUp()">
			<option value="">Amount</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
		</select><br>

		<!-- Place holder for the incoming course selections -->
		<div id="courseSelect">
		</div>

		<button type="submit" class="button">Submit</button>
	</form>

<script src="project1.js"></script>
</body>
</html>
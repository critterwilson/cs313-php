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
		<a class="active" href="project1.php">Write Info</a>
		<a href="readInfo.php">Read Info</a>
		<a href="sectionCreation.php">Sections</a>
	</div>

	<form id="teacherSignUp" action="submitSignUp.php" method="POST" onsubmit="return verifySignUp()">
	<!-- Database Query to fetch all professors -->
		<?php
			// start select tag
			echo '<select name="professor">';
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
			<option value="0">0</option>
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

		<button type="submit">Click</button>
	</form>

<script src="project1.js"></script>
</body>
</html>
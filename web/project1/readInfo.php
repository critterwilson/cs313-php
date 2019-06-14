<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="project1.css">
	<link rel='icon' href='favicon.png' type='image/png'>
	<title>Religion Teacher Sign-Up</title>
</head>
<body>
	<div class="topnav">
	<ul>
		<li><a href="courseCreation.php">Courses</a></li>
		<li><a href="sectionCreation.php">Sections</a></li>
		<li><a href="professorCreation.php">Professors</a></li>
		<li><a href="sectionAssignments.php">Section Assign</a></li>
		<li><a href="professorPrefs.php">Preferences</a></li>
		<li><a href="roomAmens.php">Rooms</a></li>
		<li><a class="active" href="readInfo.php">Read Info</a></li>
	</div>

	<p class="instructions">Order by:</p>
	
	<!-- Some of the values are out of order because of the 
		order of development: the user won't know -->
	<select id="filter" onchange="viewChange()">
		<option value="">Select</option>
		<option value="1">Professors</option>
		<option value="6">Courses</option>
		<option value="2">Occupied Sections</option>
		<option value="3">Unoccupied Sections</option>
		<option value="4">Prof. Preferences</option>
		<option value="5">Rooms</option>
	</select>

	<!-- To store our returned data -->
	<div id="output">
	</div>

	<script src="project1.js"></script>
</body>
</html>
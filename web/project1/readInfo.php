<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="project1.css">
	<title>Religion Teacher Sign-Up</title>
</head>
<body>
	<div class="topnav">
		<a href="creation/courseCreation.php">Courses</a>
		<a href="creation/sectionCreation.php">Sections</a>
		<a href="creation/professorCreation.php">Professors</a>
		<a href="creation/sectionAssignments.php">Section Assign</a>
		<a href="creation/professorPrefs.php">Preferences</a>
		<a href="creation/roomAmens.php">Rooms</a>
		<a class="active" href="readInfo.php">Read Info</a>
	</div>

	<p class="instructions">Order by:</p>
	
	<select id="filter" onchange="viewChange()">
		<option value="">Select</option>
		<option value="1">Professors</option>
		<option value="6">Courses</option>
		<option value="2">Occupied Sections</option>
		<option value="3">Unoccupied Sections</option>
		<option value="4">Prof. Preferences</option>
		<option value="5">Rooms</option>
	</select>


	<div id="output">
	</div>

	<script src="project1.js"></script>
</body>
</html>
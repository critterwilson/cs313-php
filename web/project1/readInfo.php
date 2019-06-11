<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="project1.css">
	<title>Religion Teacher Sign-Up</title>
</head>
<body>
	<div class="topnav">
		<a href="sectionCreation.php">Sections</a>
		<a href="project1.php">Sign Up</a>
		<a class="active" href="readInfo.php">Read Info</a>
		<a href="professorPrefs">Professor Prefs</a>
	</div>

	<p class="instructions">Order by:</p>
	
	<select id="filter" onchange="viewChange()">
		<option value="">Select</option>
		<option value="1">Teachers</option>
		<option value="2">Courses</option>
		<option value="3">View All</option>
		<option value="4">Preferences</option>
	</select>


	<div id="output">
	</div>

	<script src="project1.js"></script>
</body>
</html>
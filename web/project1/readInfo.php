<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="project1.css">
	<title>Religion Teacher Sign-Up</title>
</head>
<body>
	<div class="topnav">
		<a href="project1.php">Write Info</a>
		<a class="active" href="readInfo.php">Read Info</a>
		<a href="sectionCreation.php">Sections</a>
	</div>

	Filter by:<br>
	<select id="filter" onchange="viewChange()">
		<option value="">Select</option>
		<option value="1">Teachers</option>
		<option value="2">Courses</option>
		<option value="3">Sections</option>
	</select>


	<div id="output">
	</div>

	<script src="project1.js"></script>
</body>
</html>
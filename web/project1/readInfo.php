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

	Primary viewing criteria:
	<select id="filter" onchange="viewChange()">
		<option value="1">Teachers</option>
		<option value="2">Sections</option>
		<option value="3">Courses</option>
	</section>


	<div id="output">
	</div>

</body>
	<script src="project1.js"></script>
</html>
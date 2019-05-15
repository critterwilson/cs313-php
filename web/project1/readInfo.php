<?php
	require('databaseConnection.php');
	$db = get_db();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="project1.css">
	<script src="project1.js"></script>
	<title>Religion Teacher Sign-Up</title>
</head>
<body>
	<div class="topnav">
		<a href="project1.php">Write Info</a>
		<a class="active" href="readInfo.php">Read Info</a>
		<a href="sectionCreation.php">Sections</a>
	</div>

	View:<select id="viewType" onchange="viewChange()">
		<option value="0">Teachers</option>
		<option value="1">Sections</option>
		<option value="2">Courses</option>
	</section>

	<div id="viewInfo">
	</div>

</body>
</html>
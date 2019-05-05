<!DOCTYPE html>
<html>
<head>
	<title>Christopher Wilson</title>
	<link rel="stylesheet" type="text/css" href="landing.css">
</head>
<body>
	<div class="topnav">
		<a href="landing.php">About Me</a>
		<a class="active" href="landing_1.html">Assignment List</a>
		<?php
		date_default_timezone_set("MST");
		echo "<p>".date("d/m/Y")."</p>";
		?>
	</div>
	<div class="flex-container">
		<div class="col">
			<p><b>Name</b>: Christopher Wilson<br>
				<b>Major</b>: Software Engineering<br>
				<b>Hometown</b>: Denver, Colorado<br></p>
			<p><b>Hobbies/Interests:</b>
			<ul id="interests">
				<li>Family Time</li>
				<li>Guitar</li>
				<li>Dogs</li>
				<li>Drums/Percussion</li>
				<li>Hockey (Colorado Avalanche)</li>
				<li>Rugby</li>
				<li>Slacklining</li>
			</ul></p>
		</div>

		<div class="col2">
			<img src="me.jpg" id="me" alt="My Wife and I">
		</div>
	</div>

</body>
</html>
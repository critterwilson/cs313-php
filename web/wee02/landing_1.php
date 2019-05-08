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
	
	<p><b>CS313 Assignments coming soon to a browser near you</b></p>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="project1.css">
	<script src="project1.js"></script>
	<title>Religion Teacher Sign-Up</title>
</head>
<body>
	<div class="topnav">
		<a class="active" href="project1.php">Write Info</a>
		<a href="project1_1.php">Read Info</a>
	</div>

	<!-- Database Connection -->
	<?php 
		try
		{
		  $dbUrl = getenv('DATABASE_URL');

		  $dbOpts = parse_url($dbUrl);

		  $dbHost = $dbOpts["host"];
		  $dbPort = $dbOpts["port"];
		  $dbUser = $dbOpts["user"];
		  $dbPassword = $dbOpts["pass"];
		  $dbName = ltrim($dbOpts["path"],'/');

		  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

		  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $ex)
		{
		  echo 'Error!: ' . $ex->getMessage();
		  die();
		}
	?>

	<form id="teacherSignUp">
	<!-- Database Query to fetch all professors-->
		<?php
			echo '<select id="professor">';
			foreach ($db->query('SELECT name_first, name_last FROM professor') as $row)
			{
			  	echo '<option value='.$row['name_last'].'>'.$row['name_last'].', '.$row['name_first'].'</option>';
			}
			echo '</select>'
		?>

		<select id="numCourses" onchange="courseSignUp()">
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
		</select><br>

		<div id="courseSignUp_0">
			<?php
				echo '<select id="course">';
				foreach ($db->query('SELECT name_first, name_last FROM professor') as $row)
				{
				  	echo '<option value='.$row['name_last'].'>'.$row['name_last'].', '.$row['name_first'].'</option>';
				}
				echo '</select>'

			?>

		</div>

	</form>


</body>
</html>
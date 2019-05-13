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
		<a href="project1_1.php">Read Info</a>
		<a href="sectionCreation.php" class="active">Sections</a>
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

	<form id="numSections">
	<!-- Database Query to fetch all professors -->
		<?php
			foreach ($db->query('SELECT prefix, postfix FROM course') as $row)
			{
				echo '<label>'.$row['prefix'].' '.$row['postfix'].': </label>';
			  	echo '<input class="numSectionInput" type="text" name='.$row['postfix'];
			  	echo '" size="5" maxlength="3"><br>';
			}
			echo '</select>'
		?>
	</form>


</body>
</html>
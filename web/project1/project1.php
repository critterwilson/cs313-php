<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="project1.css">
	<title>Religion Teacher Sign-Up</title>
</head>
<body>
	<div class="topnav">
		<a class="active" href="project1.php">Read Info</a>
		<a href="project1_1.php">Write Info</a>
	</div>

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

	<div class="info to read">
</body>
</html>
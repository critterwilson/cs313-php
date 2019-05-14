<?php
	// Database Connection
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

	// For every course in the list
	for ($i = 0; $i < count($_POST['course_id']); $i++) { 
		
		$n = $_POST['amount'][$i];
		echo $_POST['course_id'][$i].': '.$n.'<br>';
	}

?>
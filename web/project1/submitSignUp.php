<?php
	require('databaseConnection.php');
	$db = get_db();

	echo $_REQUEST["professor"];
	echo $_REQUEST["numCourses"];
	var_dump($_REQUEST);

	for ($i=0; $i < $_REQUEST["numCourses"]; $i++) { 
		$professorID = $db->query('SELECT id FROM professor WHERE name_last = \'Allred\';');
		echo $professorID;
	}
?>
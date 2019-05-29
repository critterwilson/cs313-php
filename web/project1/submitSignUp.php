<?php
	require('databaseConnection.php');
	$db = get_db();

	echo $_REQUEST["professor"];
	echo $_REQUEST["numCourses"];
	var_dump($_REQUEST);
?>
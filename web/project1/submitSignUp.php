<?php
	require('databaseConnection.php');
	$db = get_db();

	echo $_REQUEST["professor"];
	echo $_REQUEST["numCourses"];
	var_dump($_REQUEST);
	echo '<br><br><br>';

	for ($i=0; $i < $_REQUEST["numCourses"]; $i++) { 
		$stmt = $db->prepare('SELECT id FROM professor WHERE name_last=:name');
		$stmt->bindValue(':name', 'Allred', PDO::PARAM_STR);
		$stmt->execute();
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

		var_dump($row);

	}
?>
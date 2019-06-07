<?php
	var_dump($_POST);
	$professor_id = $_POST['professor'];
	$office = $_POST['office'];
	$instrument = $_POST['instrument'];
	$seating = $_POST['seating'];
	$mac = $_POST['mac'];

	foreach ($_POST['time'] as $time) {
		echo $time;
	}
?>
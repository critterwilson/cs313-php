<?php
	// make sure we connect to the database
	require('databaseConnection.php');
	$db = get_db();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="project1.css">
	<title>Professor Preferences</title>
</head>
<body>
	<!-- Our top navigation bar -->
	<div class="topnav">
		<a href="courseCreation.php">Courses</a>
		<a href="sectionCreation.php">Sections</a>
		<a href="professorCreation.php">Professors</a>
		<a href="sectionAssignments.php">Section Assign</a>
		<a class="active" href="professorPrefs.php">Preferences</a>
		<a href="roomAmens.php">Rooms</a>
		<a href="readInfo.php">Read Info</a>
	</div>

	<p class="instructions"><b>Instructions:</b> Please fill out all fields. If a mistake is made, simply resubmit and the preferences will be overwritten.</p>

	<form id="teacherSignUp" action="insertPrefs.php" method="POST">
	<!-- Database Query to fetch all professors -->
		<?php
			// start select tag
			echo '<select name="professor" required>';
			echo '<option value="">Select Professor</option>';
			// SELECT name_first, name_last FROM professor
			foreach ($db->query('SELECT name_first, name_last, id FROM professor') as $row)
			{
				// <option value=name_last>Last, First</option 
			  	echo '<option value="'.$row['id'].'">'.$row['name_last'].', '.$row['name_first'].'</option><br>';
			}
			// close select tag
			echo '</select>'
		?><br>

		<h4>Which building is your office in?</h4>
		<select name="office" requried>
			<option value="">Select</option>
			<option value="TAY">Taylor</option>
			<option value="BID">Biddulph</option>
		</select><br>

		<h4>Which instrument do you prefer?</h4>
		<select name="instrument">
			<option value="null">Don't Care</option>
			<option value="true">Keyboard</option>
			<option value="false">Piano</option>
		</select><br>

		<h4>Which type of seating do you prefer?</h4>
		<select name="seating">
			<option value="null">Don't Care</option>
			<option value="1">Side Aisle</option>
			<option value="2">Center Aisle</option>
			<option value="3">Desks</option>
			<option value="4">Tables and Chairs</option>
		</select>

		<h4>Mac or PC?</h4><br>
		<select name="mac" requried>
			<option value="null">Don't Care</option>
			<option value="true">Mac</option>
			<option value="false">PC</option>
		</select><br>

		<h4>Which times are you willing to teach?</h4>
		<input type="checkbox" name="time[]" value="time0745">7:45am<br>
		<input type="checkbox" name="time[]" value="time0900">9:00am<br>
		<input type="checkbox" name="time[]" value="time1015">10:15am<br>
		<input type="checkbox" name="time[]" value="time1130">11:30am<br>
		<input type="checkbox" name="time[]" value="time1245">12:45pm<br>
		<input type="checkbox" name="time[]" value="time1400">2:00pm<br>
		<input type="checkbox" name="time[]" value="time1515">3:15pm<br>
		<input type="checkbox" name="time[]" value="time1630">4:30pm<br>
		<br>
		<button type="submit" class="button">Submit</button>
	</form>
</body>
</html>
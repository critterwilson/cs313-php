<?php
	require('databaseConnection.php');
	$db = get_db();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
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

		What building is your office in?<br>
		<select name="office" requried>
			<option value="">Select</option>
			<option value="TAY">Taylor</option>
			<option value="BID">Biddulph</option>
		</select><br>

		Do you have any requests on an instrument for your classroom?<br>
		<select name="instrument">
			<option value="null">Don't Care</option>
			<option value="true">Keyboard</option>
			<option value="false">Piano</option>
		</select><br>

		Which type of seating do you prefer?<br>
		<select name="seating">
			<option value="null">Don't Care</option>
			<option value="1">Side Aisle</option>
			<option value="2">Center Aisle</option>
			<option value="3">Desks</option>
			<option value="4">Tables and Chairs</option>
		</select><br>

		Mac or PC?<br>
		<select name="mac" requried>
			<option value="null">Don't Care</option>
			<option value="true">Mac</option>
			<option value="false">PC</option>
		</select><br>

		What times are you willing to teach?<br>
		<input type="checkbox" name="time[]" value="time0745">7:45am<br>
		<input type="checkbox" name="time[]" value="time0900">9:00am<br>
		<input type="checkbox" name="time[]" value="time1015">10:15am<br>
		<input type="checkbox" name="time[]" value="time1130">11:30am<br>
		<input type="checkbox" name="time[]" value="time1245">12:45pm<br>
		<input type="checkbox" name="time[]" value="time1400">2:00pm<br>
		<input type="checkbox" name="time[]" value="time1515">3:15pm<br>
		<input type="checkbox" name="time[]" value="time1630">4:30pm<br>

		<button type="submit">Submit</button>
	</form>
</body>
</html>
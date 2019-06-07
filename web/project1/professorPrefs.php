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
		?>

		What building is your office in?<br>
		<select name="office" requried>
			<option value="1">Taylor</option>
			<option value="2">Biddulph</option>
		</select>

		Do you have any requests on an instrument for your classroom?<br>
		<select name="instrument">
			<option value="1">Keyboard</option>
			<option value="2">Piano</option>
		</select>

		Which type of seating do you prefer?<br>
		<select name="seating">
			<option value="1">Side Aisle</option>
			<option value="2">Center Aisle</option>
			<option value="3">Desks</option>
			<option value="4">Tables and Chairs</option>
		</select>

		Mac or PC?<br>
		<select name="mac" requried>
			<option value="1">Mac</option>
			<option value="0">PC</option>
		</select>

		What times are you willing to teach?<br>
		<input type="checkbox" name="time0745" value="true">7:45am<br>
		<input type="checkbox" name="time0900" value="true">9:00am<br>
		<input type="checkbox" name="time1015" value="true">10:15am<br>
		<input type="checkbox" name="time1130" value="true">11:30am<br>
		<input type="checkbox" name="time1245" value="true">12:45pm<br>
		<input type="checkbox" name="time1400" value="true">2:00pm<br>
		<input type="checkbox" name="time1515" value="true">3:15pm<br>
		<input type="checkbox" name="time1630" value="true">4:30ph<br>

		<button type="submit">Submit</button>
	</form>
</body>
</html>
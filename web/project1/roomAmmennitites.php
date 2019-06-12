<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="project1.css">
	<title>Religion Teacher Sign-Up</title>
	<title>Professor Preferences</title>
</head>
<body>
	<div class="topnav">
		<a href="sectionCreation.php">Sections</a>
		<a href="project1.php">Sign Up</a>
		<a href="professorPrefs.php">Professor Prefs</a>
		<a class="active" href="roomAmmenities.php">Room Ammenities</a>
		<a href="readInfo.php">Read Info</a>
	</div>

	<p class="instructions"><b>Instructions:</b> Please fill out all fields. If a mistake is made, simply resubmit and the ammenities will be overwritten.</p>

	<form id="setRoomAmens" action="insertAmmens.php" method="POST">
		<h4>Which building is the classroom in?</h4>
		<select name="office" requried>
			<option value="">Select</option>
			<option value="TAY">Taylor</option>
			<option value="BID">Biddulph</option>
			<option value="HIN">Hnikley</option>
		</select><br>

		<h4>Is there a piano?</h4>
		<select name="piano">
			<option value="true">Yes</option>
			<option value="false">No</option>
		</select><br>

		<h4>Is there a Keyboard?</h4>
		<select name="keyboard">
			<option value="true">Yes</option>
			<option value="false">No</option>
		</select><br>

		<h4>Is there a Mac or a PC?</h4>
		<select name="keyboard">
			<option value="true">Mac</option>
			<option value="false">PC</option>
		</select><br>

		<h4>Which type of seating does it have?</h4>
		<select name="seating">
			<option value="null">Don't Care</option>
			<option value="1">Side Aisle</option>
			<option value="2">Center Aisle</option>
			<option value="3">Desks</option>
			<option value="4">Tables and Chairs</option>
		</select>

		<h4>What is the max capacity?</h4>
		<input name="capacity" type="text" pattern="\d{1,3}" size="5" maxlength="3"><br>

		<h4>Which department is the primary owner?</h4>
		<select name="primary_owner">
			<option value="REL">Religion</option>
			<option value="HUM">Humanities</option>
			<option value="BIO">Biology</option>
			<option value="LANG">Language</option>
			<option value="BUS">Business</option>
			<option value="PSYC">Psychology</option>
		</select>

		<h4>Which department is the secondary owner?</h4>
		<select name="secondary_owner">
			<option value="REL">Religion</option>
			<option value="HUM">Humanities</option>
			<option value="BIO">Biology</option>
			<option value="LANG">Language</option>
			<option value="BUS">Business</option>
			<option value="PSYC">Psychology</option>
		</select>
		
		<button type="submit" class="button">Submit</button>
	</form>
</body>
</html>
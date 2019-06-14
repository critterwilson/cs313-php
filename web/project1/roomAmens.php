<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="project1.css">
	<link rel='icon' href='favicon.png' type='image/png'>
	<title>Religion Teacher Sign-Up</title>
	<title>Room Creation</title>
</head>
<body>
	<!-- Our top navigation bar -->
	<ul class="nav">
		<li><a href="courseCreation.php">Courses</a></li>
		<li><a href="sectionCreation.php">Sections</a></li>
		<li><a href="professorCreation.php">Professors</a></li>
		<li><a href="sectionAssignments.php">Section Assign</a></li>
		<li><a href="professorPrefs.php">Preferences</a></li>
		<li><a href="roomAmens.php">Rooms</a></li>
		<li><a class="active" href="readInfo.php">Read Info</a></li>
	</ul>

	<div class="content">
	<p class="instructions"><b>Instructions:</b> Please fill out all fields. If a mistake is made, simply resubmit and the ammenities will be overwritten.</p>

	<form id="setRoomAmens" action="insertAmens.php" method="POST">
		<h4>Which building is the classroom in?</h4>
		<select name="building" requried>
			<option value="">Select</option>
			<option value="TAY">Taylor</option>
			<option value="BEN">Benson</option>
			<option value="HIN">Hnikley</option>
		</select><br>

		<h4>What is the room number?</h4>
		<input name="room_number" type="text" pattern="\d{3}" size="5" maxlength="3" required><br>

		<h4>Is there a piano?</h4>
		<select name="piano">
			<option value="false">Unknown</option>
			<option value="true">Yes</option>
			<option value="false">No</option>
		</select><br>

		<h4>Is there a Keyboard?</h4>
		<select name="keyboard">
			<option value="false">Unknown</option>
			<option value="true">Yes</option>
			<option value="false">No</option>
		</select><br>

		<h4>Is there a Mac or a PC?</h4>
		<select name="mac">
			<option value="false">Unknown</option>
			<option value="true">Mac</option>
			<option value="false">PC</option>
		</select><br>

		<h4>Which type of seating does it have?</h4>
		<select name="seating">
			<option value="0">Unkown</option>
			<option value="1">Side Aisle</option>
			<option value="2">Center Aisle</option>
			<option value="3">Desks</option>
			<option value="4">Tables and Chairs</option>
		</select>

		<h4>What is the max capacity?</h4>
		<input name="capacity" type="text" pattern="\d{1,3}" size="5" maxlength="3" required><br>

		<h4>Which department is the primary owner?</h4>
		<select name="primary_owner">
			<option value="NULL">Unknown</option>
			<option value="REL">Religion</option>
			<option value="HUM">Humanities</option>
			<option value="BIO">Biology</option>
			<option value="LANG">Language</option>
			<option value="BUS">Business</option>
			<option value="PSYC">Psychology</option>
		</select>

		<h4>Which department is the secondary owner?</h4>
		<select name="secondary_owner">
			<option value="NULL">Unknown</option>
			<option value="REL">Religion</option>
			<option value="HUM">Humanities</option>
			<option value="BIO">Biology</option>
			<option value="LANG">Language</option>
			<option value="BUS">Business</option>
			<option value="PSYC">Psychology</option>
		</select><br><br>
		
		<button type="submit" class="button">Submit</button>
	</form>
	</div>
</body>
</html>
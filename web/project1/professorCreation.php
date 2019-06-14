<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="project1.css">
	<title>Professor Creation</title>
</head>
<body>
	<div class="topnav">
		<a href="courseCreation.php">Courses</a>
		<a href="sectionCreation.php">Sections</a>
		<a class="active" href="professorCreation.php">Professors</a>
		<a href="sectionAssignments.php">Section Assign</a>
		<a href="professorPrefs.php">Preferences</a>
		<a href="roomAmens.php">Rooms</a>
		<a href="readInfo.php">Read Info</a>
	</div>

	<p class="instructions"><b>Instructions:</b> </p>

	<form id="teacherSetUp" action="insertProfessor.php" method="POST">
		<h4>First name:</h4>
		<input type="text" name="name_first" size="20" pattern="^[a-zA-Z]+(([',.-][a-zA-Z ])?[a-zA-Z]*)*$" required>

		<h4>Last name:</h4>
		<input type="text" name="name_last" size="20" pattern="^[a-zA-Z]+(([',.-][a-zA-Z ])?[a-zA-Z]*)*$" required>

		<h4>Are you and adjunct professor?</h4>
		<select name="adjunct" requried>
			<option value="false">No</option>
			<option value="true">Yes</option>
		</select><br><br>

		<button type="submit" class="button">Submit</button>
	</form>

</body>
</html>
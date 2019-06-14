<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="project1.css">
	<link rel='icon' href='favicon.png' type='image/png'>
	<title>Professor Creation</title>
</head>
<body>
	<!-- Our top navigation bar -->
	<ul class="nav">
		<li><a href="courseCreation.php">Courses</a></li>
		<li><a href="sectionCreation.php">Sections</a></li>
		<li><a class="active" href="professorCreation.php">Professors</a></li>
		<li><a href="sectionAssignments.php">Section Assign</a></li>
		<li><a href="professorPrefs.php">Preferences</a></li>
		<li><a href="roomAmens.php">Rooms</a></li>
		<li><a href="readInfo.php">Read Info</a></li>
	</ul>

	<div class="content">
	<p class="instructions"><b>Instructions: Please fill out all of the information for each of the professors teaching this semester.</b> </p>

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
	</div>
</body>
</html>
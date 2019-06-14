<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="project1.css">
	<title>Course Creation</title>
</head>
<body>
	<!-- Top navigation bar -->
	<div class="topnav">
		<a class="active" href="courseCreation.php">Courses</a>
		<a href="sectionCreation.php">Sections</a>
		<a href="professorCreation.php">Professors</a>
		<a href="sectionAssignments.php">Section Assign</a>
		<a href="professorPrefs.php">Preferences</a>
		<a href="roomAmens.php">Rooms</a>
		<a href="readInfo.php">Read Info</a>
	</div>

	<p class="instructions"><b>Instructions: Please fill out all form fields below for each course being offered this semeseter, then press submit.</b> </p>

	<form id="teacherSetUp" action="insertCourse.php" method="POST">
		<!-- Prefix selection: -->
		<h4>Course prefix:</h4>
		<select name="prefix" requried>
			<option value="REL">REL</option>
			<option value="RELC">RELC</option>
			<option value="RELR">RELR</option>
		</select><br>
	
		<!-- Postfix that only accepts 3 numbers -->
		<h4>Course postfix:</h4>
		<input type="text" name="postfix" size="5" pattern="[0-9]{3}" required>

		<!-- Name of the course with regex for safety -->
		<h4>Name of the course:</h4>
		<input type="text" name="name" size="30" pattern="^[a-zA-Z]+(([', .-][a-zA-Z ])?[a-zA-Z]*)*$" required><br><br>

		<button type="submit" class="button">Submit</button>
	</form>

</body>
</html>
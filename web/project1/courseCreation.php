<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="project1.css">
	<link rel='icon' href='favicon.png' type='image/png'>
	<title>Course Creation</title>
</head>
<body>
	<!-- Top navigation bar -->
	<ul class="nav">
		<li><a class="active" href="courseCreation.php">Courses</a></li>
		<li><a href="sectionCreation.php">Sections</a></li>
		<li><a href="professorCreation.php">Professors</a></li>
		<li><a href="sectionAssignments.php">Section Assign</a></li>
		<li><a href="professorPrefs.php">Preferences</a></li>
		<li><a href="roomAmens.php">Rooms</a></li>
		<li><a href="readInfo.php">Read Info</a></li>
	</ul>

	<div class="content">
	<p class="instructions"><b>Instructions:</b> Please fill out all form fields below for each course being offered this semeseter, then press submit.</b> </p>

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
	</div>
</body>
</html>
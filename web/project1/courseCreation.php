<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="project1.css">
	<title>Course Creation</title>
</head>
<body>
	<div class="topnav">
		<a class="active" href="courseCreation.php">Courses</a>
		<a href="sectionCreation.php">Sections</a>
		<a href="professorCreation.php">Professors</a>
		<a href="project1.php">Section Assign</a>
		<a href="professorPrefs.php">Preferences</a>
		<a href="roomAmens.php">Rooms</a>
		<a href="readInfo.php">Read Info</a>
	</div>

	<p class="instructions"><b>Instructions:</b> </p>

	<form id="teacherSetUp" action="insertCourse.php" method="POST">

		<h4>Is this course a cornerstone?</h4>
		<select name="prefix" requried>
			<option value="REL">No</option>
			<option value="RELC">Yes</option>
		</select><br>
	
		<h4>Course number:</h4>
		<input type="text" name="postfix" size="20" pattern="[0-9]{3}" required>

		<h4>Name of the course:</h4>
		<input type="text" name="name" size="20" pattern="^[a-zA-Z]+(([', .-][a-zA-Z ])?[a-zA-Z]*)*$" required><br><br>

		<button type="submit" class="button">Submit</button>
	</form>

</body>
</html>
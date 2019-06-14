<?php
	// Make sure we are connected to the Database
	require('databaseConnection.php');
	$db = get_db();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="project1.css">
	<link rel='icon' href='favicon.png' type='image/png'>
	<title>Section Creation</title>
</head>
<body>
	<!-- Our top navigation bar -->
	<div class="topnav">
		<a href="courseCreation.php">Courses</a>
		<a class="active" href="sectionCreation.php">Sections</a>
		<a href="professorCreation.php">Professors</a>
		<a href="sectionAssignments.php">Section Assign</a>
		<a href="professorPrefs.php">Preferences</a>
		<a href="roomAmens.php">Rooms</a>
		<a href="readInfo.php">Read Info</a>
	</div>

	<p class="instructions"><b>Instructions:</b> Please enter the number of sections desired for each course. All form items do not need to be filled out. If you put in the wrong number for a section, simply enter the number you would like and re-submit the form (there is no need to do any addition or subtraction: just enter the right number).</p>

	<form id="numSections" action="insertSection.php" method="POST">
	<!-- Database Query to fetch all courses and display them -->
		<?php
			foreach ($db->query('SELECT prefix, postfix, id FROM course') as $row)
			{
				// Label for user
				echo '<label class="sectionLabel">'.$row['prefix'].' '.$row['postfix'].': </label>';
				// hidden text input to store course_id
				echo '<input type="hidden" name="course_id[]" value="'.$row['id'].'">';
				// text input to store amount of sections
			  	echo '<input class="numSectionInput" type="text" name="amount[]"';
			  	// edits the size of the text input
			  	echo 'pattern="\d{1,2}" size="5" maxlength="3"><br>';
			}
		?>
		<button id="sectionSubmit" type="submit" class="button">Submit</button>
	</form>

	<!-- Reset all of the sections to zero -->
	<form id="resetSections" action="resetSections.php" method="POST" 
		onsubmit="return confirm('Reset all section data?');">
		<button type="submit" class="reset">Reset All Sections</button>
	</form>
	
	<script src="project1.js"></script>
</body>
</html>
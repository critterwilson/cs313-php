<?php
	require('databaseConnection.php');
	$db = get_db();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="project1.css">
	<title>Religion Teacher Sign-Up</title>
</head>
<body>
	<div class="topnav">
		<a href="project1.php">Write Info</a>
		<a href="readInfo.php">Read Info</a>
		<a href="sectionCreation.php" class="active">Sections</a>
	</div>

	<form id="numSections" action="insertSection.php" method="POST">
	<!-- Database Query to fetch all courses and display them -->
		<?php
			foreach ($db->query('SELECT prefix, postfix, id FROM course') as $row)
			{
				// Label for user
				echo '<label>'.$row['prefix'].' '.$row['postfix'].': </label>';
				// hidden text input to store course_id
				echo '<input type="hidden" name="course_id[]" value='.$row['id'].'>';
				// text input to store amount of sections
			  	echo '<input class="numSectionInput" type="text" name="amount[]"';
			  	// edits the size of the text input
			  	echo 'pattern="\d{1,2}" size="5" maxlength="3"><br>';
			}
			echo '</select>'
		?>
		<button type="submit" class="button">Submit</button>
	</form>

	<!-- Reset all of the sections to zero -->
	<form id="resetSections" action="resetSections.php" method="POST" 
		onsubmit="return confirm('Reset all section data?');">
		<button type="submit" class="reset">Reset All Sections</button>
	</form>
	
	<script src="project1.js"></script>
</body>
</html>
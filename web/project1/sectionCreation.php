<?php
	require('databaseConnection.php');
	$db = get_db();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="project1.css">
	<script src="project1.js"></script>
	<title>Religion Teacher Sign-Up</title>
</head>
<body>
	<div class="topnav">
		<a href="project1.php">Write Info</a>
		<a href="project1_1.php">Read Info</a>
		<a href="sectionCreation.php" class="active">Sections</a>
		<a href="clearSections.php" class="death">Clear All</a>
	</div>

	<form id="numSections" action="insertSection.php" method="POST">
	<!-- Database Query to fetch all professors -->
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
			  	echo ' size="5" maxlength="3"><br>';
			}
			echo '</select>'
		?>
		<button type="submit">
	</form>


</body>
</html>
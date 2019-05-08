<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	Weclcome <?php echo $_POST["name"];?><br>
	Your email address is <?php echo $_POST["email"];?><br>
	Your major is <?php echo $_POST["major"];?><br>
	Comments: <?php echo $_POST["comments"];?><br>
	Countries you've visited: <?php 
		$visited = $_POST['visited'];
		$V = count($visited);
		for ($i=0; $i < $V; $i++) 
		{
			echo $visited[$i]." ";
		}
	?>
</body>
</html>
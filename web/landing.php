<!DOCTYPE html>
<html>
<head>
	<title>Christopher Wilson</title>
</head>
<body>
	<?php
		$pages = scandir('ponder02');
		
		echo '<div class="menu">';

		foreach ($pages as $page) {
			if (!in_array($page, $notWanted){
				$safeName = strtoupper(str_replace('.php', '', $page));
				$link = 'ponder02'.$page;
				echo '<a heref="'.$link.'">'.$safeName.'</a>';
			}
		}
		echo '</div>';
	?>

</body>
</html>
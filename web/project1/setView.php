<?php
	switch($_REQUEST["q"]) {
		case 0:
			$str = '<select id="professor">';
			foreach ($db->query('SELECT name_first, name_last FROM professor') as $row)
			{
			  	$str += '<option value='.$row['name_last'].'>'.$row['name_last'].', '.$row['name_first'].'</option>';
			}
			$str += '</select>';
			echo $tr;
			break;
		case 1:
			echo "Case 1";
			break;
		case 2:
			echo "Case 2";
			break;
	}

?>
<!DOCTYPE html>

<html>
<head>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bingo/js/js_all.php';
include $_SERVER['DOCUMENT_ROOT'].'/bingo/css/css_all.php';
?>

</head>


<body class="metro">

<center>

<br>
<a href="game_input.php"><input type="button" class="inverse" value="Menu" style="float:right;margin-right:10px;"></a>
<br>
<h2>Jeux termin&eacute;s</h2>
<br>



<table class="bordered" width="100%">

<tr>
	<th>No</th>
	<th>Partie</th>
	<th>Prix</th>
	<th>Cr&eacute;&eacute; le</th>
	<th>Bingo?</th>
	<th>Deleted?</th>
	<th>Action</th>
</tr>

<?php

//get game info from database
include $_SERVER['DOCUMENT_ROOT'].'/bingo/db/db_connect.php';


$result = mysqli_query($con, "SELECT * FROM game where bingo_date <> '0000-00-00 00:00:00' or is_active = 1") or die(mysqli_error($con)); 

while ($row = mysqli_fetch_array($result))
{
	echo '<tr>';
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["partie_no"].'</td>';
	echo '<td>'.$row["prize_desc"].'</td>';
	echo '<td>'.$row["creation_date"].'</td>';
	if($row["bingo_date"] != "0000-00-00 00:00:00")
	{
		echo '<td>Y</td>';
	}
	else
	{
		echo '<td>N</td>';
	}
	echo '<td>';
		if($row["is_active"] == 0)
		{
			echo 'N';
		}else
		{
			echo 'Y';
		}
	echo '</td>';
	echo '<td><a href="game_ui.php?game_id='.$row["id"].'"><input class="small success" type="button" value="Voir"></a></td>';
	echo '</tr>';
}

?>
</table>

</center>

</body>

<?php mysqli_close($con); ?>

</html>

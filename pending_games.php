<!DOCTYPE html>

<html>
<head>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/bingo/js/js_all.php';
include $_SERVER['DOCUMENT_ROOT'].'/bingo/css/css_all.php';
?>

<script>

function show_create_form(game_id)
{
	$("#game_id_hidden").val(game_id);

	$("#dialog").dialog({
	  modal:true,
	  title: "Supprimer?"});

}

function close_dialog()
{
	$("#dialog").dialog("destroy");
}

</script>

</head>


<body class="metro">

<center>

<br>

		<a href="game_input.php"><input type="button" class="inverse" value="Menu" style="float:right;margin-right:10px;"></a>

<br>
<h2>Jeux en cours</h2>
<br>



<table class="bordered" width="100%">

<tr>
	<th>id</th>
	<th>Partie</th>
	<th>Prix</th>
	<th>Cr&eacute;&eacute; le</th>
	<th>Ligne?</th>
	<th>Action</th>
</tr>

<?php

//get game info from database
include $_SERVER['DOCUMENT_ROOT'].'/bingo/db/db_connect.php';


$result = mysqli_query($con, "SELECT * FROM game where bingo_date is null and is_active = 0") or die(mysqli_error($con)); 

while ($row = mysqli_fetch_array($result))
{
	echo '<tr>';
	echo '<td>'.$row["id"].'</td>';
	echo '<td>'.$row["partie_no"].'</td>';
	echo '<td>'.$row["prize_desc"].'</td>';
	echo '<td>'.$row["creation_date"].'</td>';
	if($row["ligne_date"] != "0000-00-00 00:00:00")
	{
		echo '<td>Y</td>';
	}
	else
	{
		echo '<td>N</td>';
	}
	echo '<td>';
	echo '<a href="game_ui.php?game_id='.$row["id"].'"><input class="small success" type="button" value="Lancer"></a>   ';
	echo '<input class="small danger" type="button" value="Delete" onclick="show_create_form('.$row["id"].')">';
	echo '</td>';
	echo '</tr>';
}

?>
</table>

<div id="dialog" title="Supprimer?"   style="display:none">
<form action="engine/delete_game.php" method="post">
<table width="100%" class="bordered">
<tr><td>Saissisez "delete" et cliquez sur valider pour supprimer cette partie</tr></td>
<tr><td><input type="text" name="confirm">
<input type="hidden" name="game_id" id="game_id_hidden"></tr></td>
<tr><td><input class="success" type="submit" value="Valider"><input class="danger" type="button" value="Annuler" onclick="close_dialog()" style="margin-left:10px"></tr></td>
</form>
</center>
</div>

</center>

</body>

<?php mysqli_close($con); ?>

</html>

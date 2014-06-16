<!DOCTYPE html>

<html>
<head>

<?php

include $_SERVER['DOCUMENT_ROOT'].'/bingo/js/js_all.php';
include $_SERVER['DOCUMENT_ROOT'].'/bingo/css/css_all.php';
?>


<script>

function show_create_form()
{
$("#dialog").dialog({
	  modal:true,
	  title: "Nouvelle partie"});

}

function close_dialog()
{
$("#dialog").dialog("destroy");
}

</script>

</head>

<body class="metro" onload="parent.reload_grid(0)">
<h2 onclick='show_create_form()'>Nouvelle partie</h2>


<a href="pending_games.php"><h2>Jeux en cours</h2></a>

<a href="end_games.php"><h2>Jeux terminés</h2></a>

<div id="dialog" title="Nouvelle partie" style="display:none">
		<form action="engine/create_game.php" method="post">
		<table width="100%" class="bordered">
		<tr>
			<td>No Partie: </td>
			<td><input type="text" name="partie_no"></td>
		<tr>
		<tr>
			<td>Prix Bingo: </td>
			<td><input type="text" name="prize_desc"></td>
		<tr>
			<td>Prix Ligne: </td>
			<td><input type="text" name="prize_ligne_desc"></td>
		</tr> 
		<tr align="center">
			<td colspan="2" ><center><input class="success" type="submit" value="Débuter"><input class="info" type="button" value="Annuler" onclick="close_dialog()" style="margin-left:10px"></center></td>
		</tr>
		</table>
		</form>
</div>


</body>

</html>

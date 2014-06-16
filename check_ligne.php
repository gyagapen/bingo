<!DOCTYPE html>

<html>
<head>
<!-- includes all js components-->
<?php

include $_SERVER['DOCUMENT_ROOT'].'/bingo/js/js_all.php';
include $_SERVER['DOCUMENT_ROOT'].'/bingo/css/css_all.php';

?>

<script>





function show_create_form(game_id, number_id)
{
	$("#game_id_hidden").val(game_id);
	$("#number_id_hidden").val(number_id);
	
	$("#input_delete_text").focus();

	$("#dialog").dialog({
	  modal:true,
	  title: "Supprimer?"});

}

function close_dialog()
{
	$("#dialog").dialog("destroy");
}


function show_create_form_ligne(game_id)
{
	$("#game_id_hidden_ligne").val(game_id);
	
	$("#input_ligne_text").focus();

	$("#dialog_ligne").dialog({
	  modal:true,
	  title: "Supprimer?"});

}

function close_dialog_ligne()
{
	$("#dialog_ligne").dialog("destroy");
}


function show_create_form_ligne(game_id)
{
	$("#game_id_hidden_ligne").val(game_id);
	
	$("#input_ligne_text").focus();

	$("#dialog_ligne").dialog({
	  modal:true,
	  title: "Supprimer?"});

}

function close_dialog_ligne()
{
	$("#dialog_ligne").dialog("destroy");
}
 
 
function show_create_form_menu(game_id)
{
	$("#game_id_hidden_menu").val(game_id);
	

	$("#dialog_menu").dialog({
	  modal:true,
	  title: "Retour?"});

}

function close_dialog_menu()
{
	$("#dialog_menu").dialog("destroy");
}
  



</script>

</head>


<body class="metro" id="main_body">

<br>

<center>

<?php

//get game info from database
include $_SERVER['DOCUMENT_ROOT'].'/bingo/db/db_connect.php';

$game_id = $_GET['game_id'];

$result = mysqli_query($con, "SELECT * FROM game where id = ".$game_id) or die(mysqli_error($con)); 

$row = mysqli_fetch_array($result);

$is_ligne = "false";
$is_bingo = "false";
$is_deleted = "false";

if ($row)
{
	echo '<h1>Valider jeu no '.$row["id"].'</h1><br>';
	
	if($row["ligne_date"] != "0000-00-00 00:00:00")
	{
		$is_ligne = "true";
	}
	
	if($row["bingo_date"] != "0000-00-00 00:00:00")
	{
		$is_bingo = "true";
	}
	
	if($row["is_active"] == 1)
	{
		$is_deleted = "true";
	}
}

?>
<form action="engine/save_check_ligne.php" method="POST">
	<h3>V&eacute;rifier num&eacute;ro:</h3>
	<input id="input_no" type="text" name="number">
	<input type="hidden" name="game_id" value="<?php echo $game_id ?>">
	<input class="info" type="submit" value="Verifier" <?php  if (($is_ligne == "true") || ($is_deleted == "true")){echo 'disabled="disabled"';} ?>>
</form>

<br>
<br>
<input class="success large" type="button" value="Valider Ligne!" <?php echo 'onclick="show_create_form_ligne('.$game_id.')"'; if (($is_ligne == "true") || ($is_bingo == "true") || ($is_deleted == "true")){echo 'disabled="disabled"';} ?>>
<input type="button" class="large danger" value="Annuler" style="margin-right:10px;" <?php echo 'onclick="show_create_form_menu('.$game_id.')"' ?> >;
<br>
<br>
<h3>Num&eacute;ros tir&eacute;s</h3>
<br>

<table class="bordered">
<tr>
	<th>Num&eacute;ro</th>
	<th>Action</th>
<tr>
<?php
if ($row)
{
	//fetch numbers for this game
	$result_no = mysqli_query($con, "SELECT * FROM number where game_id = ".$game_id." and is_active=0 and check_state=1") or die(mysqli_error($con)); 
	
	
	while($row_no = mysqli_fetch_array($result_no))
	{
	
		echo '<tr align="center"><td>'.$row_no["value"].'</td>';
		if (($is_ligne == "false") && ($is_deleted == "false")){
			echo '<td><input class="mini" type="button" value="x" onclick="show_create_form('.$game_id.','.$row_no["value"].')"></td></tr>';
		}
		else
		{
			echo '<td></td></tr>';
		}
		
	}
}
?>
</table>

<!-- delete form -->
<div id="dialog" title="Supprimer?"   style="display:none">
<form action="engine/delete_check_ligne.php" method="post">
<table width="100%" class="bordered">
<tr><td>Saissisez "delete" et cliquez sur valider pour supprimer ce num&eacute;ro ligne</td></tr>
<tr><td>
<input id="input_delete_text" type="text" name="confirm">
<input type="hidden" name="game_id" id="game_id_hidden">
<input type="hidden" name="number" id="number_id_hidden">
</td></tr>
<tr><td><input class="success" type="submit" value="Valider"><input class="danger" type="button" value="Annuler" onclick="close_dialog()" style="margin-left:10px"></td></tr>
</table>
</form>
<br>
</center>
</div>

<!-- Validate ligne form -->
<div id="dialog_ligne" title="Valider?"   style="display:none">
<form action="engine/validate_ligne.php" method="post">
<table width="100%" class="bordered">
<tr><td>Saissisez "ligne" et cliquez sur valider pour valider ce gain (ligne)</td></tr>
<tr><td>
<input  id="input_bingo_text" type="text" name="confirm">
<input type="hidden" name="game_id" id="game_id_hidden_ligne">
</td></tr>
<tr><td><input class="success" type="submit" value="Valider"><input class="danger" type="button" value="Annuler" onclick="close_dialog_ligne()" style="margin-left:10px"></td></tr>
</table>
</form>
<br>
</center>
</div>

<!-- Validate ligne form -->
<div id="dialog_menu" title="Retour?"   style="display:none">
<form action="engine/quit_check_ligne.php" method="post">
<table width="100%" class="bordered">
<tr><td>Voulez-vous retourner au Menu?
<input type="hidden" name="game_id" id="game_id_hidden_menu">
</td></tr>
<tr><td><input class="success" type="submit" value="Oui"><input class="danger" type="button" value="Non" onclick="close_dialog_menu()" style="margin-left:10px"></td></tr>
</table>
</form>
<br>
</center>
</div>


</center>


</body>

<script>

(function() {
	var window_grid;
	
	window.onload = refresh_grid;
	
	//gives focus to input field
	$("#input_no").focus();
	

	function refresh_grid()
	{
		var params = getSearchParameters();
		
		//reload child window
		window_grid = window.open('main_grid.php?game_id='+params.game_id+"&new_number="+params.new_number+"&new_ligne="+params.new_ligne+"&num_found="+params.num_found, 'title1');
		parent.reload_grid(params.game_id, params.new_number, params.new_ligne,params.num_found);
		
		
	}
	
	function getSearchParameters() {
      var prmstr = window.location.search.substr(1);
      return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
	}

	function transformToAssocArray( prmstr ) {
    var params = {};
    var prmarr = prmstr.split("&");
		for ( var i = 0; i < prmarr.length; i++) {
			var tmparr = prmarr[i].split("=");
			params[tmparr[0]] = tmparr[1];
		}
		return params;
	}




})();

</script>

<?php mysqli_close($con); ?>

</html>

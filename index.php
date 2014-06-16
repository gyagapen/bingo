<!DOCTYPE html>

<html>
<head>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/bingo/js/js_all.php';
include $_SERVER['DOCUMENT_ROOT'].'/bingo/css/css_all.php';
?>

<script>

function reload_grid(game_id,new_number,new_ligne,num_found)
{
	document.getElementById('right_frame').src = 'main_grid.php?game_id='+game_id+'&new_number='+new_number+'&new_ligne='+new_ligne+'&num_found='+num_found;
}

</script>

</head>


<body class="metro">

<center>


	<div style="width:100%; height:100%">
				  
	<div id="leftArea" style="float:left;width:30%;height:100%">
		<iframe id="left_frame" src="game_input.php" width="100%" height="100%"> </iframe>
	</div>
				  
	<div style="float:right;width:70%;height:100%">
		<iframe id="right_frame" src="main_grid.php" width="100%" height="100%"> </iframe>                 
	</div>
	</center>


</body>

</html>
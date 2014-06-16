<html>
<head>
<!-- includes all js components-->
<?php

include $_SERVER['DOCUMENT_ROOT'].'/bingo/js/js_all.php';
include $_SERVER['DOCUMENT_ROOT'].'/bingo/css/css_all.php';

?>

</head>

<body class="metro">

<?php

//delete a no from a game
include $_SERVER['DOCUMENT_ROOT'].'/bingo/db/db_connect.php';

$game_id = $_POST["game_id"];

if(isset($_POST["confirm"]))
{
	$confirm = $_POST["confirm"];
}
else
{
	$confirm = "";
}

if ($confirm == "ligne")
{

	$sql="update game set ligne_date='".date('Y-m-d H:i:s')."' where id=$game_id" ;

	if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_error($con));
	}

	mysqli_close($con);
	//redirect
	header("Location: ../game_ui.php?game_id=".$game_id."&new_ligne=true");
}
else
{
	echo '<center><h2>Mot de confirmation erron&eacute;</h2><br>';
	echo '<h3><a href="../check_ligne.php?game_id='.$game_id.'">Retour</a><h3>';
	mysqli_close($con);
}

?>

</body>
</html>
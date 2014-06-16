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

$number = $_POST["number"];
$game_id = $_POST["game_id"];
$confirm = $_POST["confirm"];

if ($confirm == "delete")
{

	$sql="update number set is_active=1 where game_id=$game_id and value=$number" ;

	if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_error($con));
	}

	mysqli_close($con);
	//redirect
	header("Location: ../game_ui.php?game_id=".$game_id);
}
else
{
	echo '<center><h2>Mot de confirmation erron&eacute;</h2><br>';
	echo '<h3><a href="../game_ui.php?game_id='.$game_id.'">Retour</a><h3>';
	mysqli_close($con);
}

?>

</body>
</html>
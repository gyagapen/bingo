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

//save a number to a game
include $_SERVER['DOCUMENT_ROOT'].'/bingo/db/db_connect.php';

$number = $_POST["number"];
$game_id = $_POST["game_id"];

if(!is_numeric($number))
{
	echo '<center><h2>Ce num&eacute;ro n est pas num&eacute;rique</h2><br>';
	echo '<h3><a href="../game_ui.php?game_id='.$game_id.'">Retour</a><h3>';
	mysqli_close($con);
	exit();
}

//check if number doesn't exist before inserting
$sql_check="SELECT * FROM number where value = $number and game_id = $game_id and is_active=0";
$result = mysqli_query($con, $sql_check) or die(mysqli_error($con)); 
$value_exist = mysqli_fetch_array($result);



if (($number < 1) || ($number > 90))
{
	echo '<center><h2>Ce num&eacute;ro doit etre compris en 1 et 90</h2><br>';
	echo '<h3><a href="../game_ui.php?game_id='.$game_id.'">Retour</a><h3>';
	mysqli_close($con);
	exit();
}

if (!$value_exist)
{
	$sql="INSERT INTO number (value, game_id, retrieve_at)
	VALUES ($number, $game_id,'".date('Y-m-d H:i:s')."')";

	if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_error($con));
	}
	
	mysqli_close($con);
	//redirect
	header("Location: ../game_ui.php?game_id=".$game_id."&new_number=".$number);
}
else
{
	echo '<center><h2>Ce num&eacute;ro existe d&eacute;j&agrave;</h2><br>';
	echo '<h3><a href="../game_ui.php?game_id='.$game_id.'">Retour</a><h3>';
	mysqli_close($con);
}

?>

</body>
</html>
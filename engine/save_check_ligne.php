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

if(!is_numeric($number))
{
	echo '<center><h2>Ce num&eacute;ro n est pas num&eacute;rique</h2><br>';
	echo '<h3><a href="../check_ligne.php?game_id='.$game_id.'">Retour</a><h3>';
	mysqli_close($con);
	exit();
}

//check if not already existing
$sql_check="select * from number where game_id=$game_id and value=$number and check_state=1"  ;
$result_check = mysqli_query($con, $sql_check);
$row_cnt = mysqli_num_rows($result_check);
if ($row_cnt != 0)
{
	echo '<center><h2>Ce num&eacute;ro a d&eacute;j&agrave; &eacute;t&eacute; valid&eacute;!</h2><br>';
	echo '<h3><a href="../check_bingo.php?game_id='.$game_id.'">Retour</a><h3>';
	mysqli_close($con);
	exit();
}


$sql="update number set check_state=1 where game_id=$game_id and value=$number" ;

if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
}

$affected_record = mysqli_affected_rows ($con);

mysqli_close($con);
//redirect
if($affected_record > 0)
{
	header("Location: ../check_ligne.php?game_id=".$game_id."&new_number=".$number);
}
else
{
	header("Location: ../check_ligne.php?game_id=".$game_id."&new_number=".$number."&num_found=1");
}


?>

</body>
</html>
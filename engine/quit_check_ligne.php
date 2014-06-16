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

//check if ligne has been validated else revert check numbers
include $_SERVER['DOCUMENT_ROOT'].'/bingo/db/db_connect.php';

$game_id = $_POST["game_id"];

//retrieve game
$sql_game="select * from game where id=$game_id" ;
$result = mysqli_query($con,$sql_game);
$row = mysqli_fetch_array($result);

//if no ligne validate
if ($row["ligne_date"] == "0000-00-00 00:00:00" )
{
	$sql="update number set check_state=0 where game_id=$game_id and check_state=1" ;

	if (!mysqli_query($con,$sql)) {
		die('Error: ' . mysqli_error($con));
	}
}

mysqli_close($con);
//redirect
header("Location: ../game_ui.php?game_id=".$game_id);


?>

</body>
</html>
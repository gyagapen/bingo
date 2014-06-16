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

//change game prices
include $_SERVER['DOCUMENT_ROOT'].'/bingo/db/db_connect.php';

$game_id = $_POST["game_id"];
$prize_bingo = mysqli_real_escape_string($con, $_POST["prize_bingo"]);
$prize_ligne = mysqli_real_escape_string($con, $_POST["prize_ligne"]);
$partie_no =  mysqli_real_escape_string($con, $_POST["partie_no"]);


$sql="update game set prize_desc='$prize_bingo', prize_ligne_desc='$prize_ligne', partie_no='$partie_no' where id=$game_id" ;

if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
//redirect
header("Location: ../game_ui.php?game_id=".$game_id);


?>

</body>
</html>
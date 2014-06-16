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


$sql="update number set is_checked=2 where game_id=$game_id and value=$number" ;

if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
//redirect
header("Location: ../validate_bingo.php?game_id=".$game_id."&new_number=".$number);

?>

</body>
</html>
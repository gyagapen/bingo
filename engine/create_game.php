<?php

//create a new game
include $_SERVER['DOCUMENT_ROOT'].'/bingo/db/db_connect.php';

// escape variables for security
$prize_desc = mysqli_real_escape_string($con, $_POST['prize_desc']);
$prize_ligne_desc = mysqli_real_escape_string($con, $_POST['prize_ligne_desc']);
$partie_no = mysqli_real_escape_string($con, $_POST['partie_no']);

$sql="INSERT INTO game (prize_desc, prize_ligne_desc, partie_no, creation_date)
VALUES ('$prize_desc','$prize_ligne_desc',$partie_no,'".date('Y-m-d H:i:s')."')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

//redirection
header("Location: ../game_ui.php?game_id=".mysqli_insert_id($con));

mysqli_close($con);

?>
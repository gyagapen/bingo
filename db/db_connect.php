<?php

//connect to database
$con = mysqli_connect("localhost","root","","bingo_db");
if (!$con) {
	die('Cannot connect to database : ' . mysql_error());
}
	
?>
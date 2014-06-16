<!DOCTYPE html>

<html>
<head>
<!-- includes all js components-->
<?php

include $_SERVER['DOCUMENT_ROOT'].'/bingo/js/js_all.php';
include $_SERVER['DOCUMENT_ROOT'].'/bingo/css/css_all.php';

?>


<STYLE TYPE="text/css"> </STYLE>

<script>
function windowReszie(){
	var size = $(window).width(); 
	$("td").width(size*0.04);
	$("td").height(size*0.04);
}

$(function () {

    $('.pulsate').effect('pulsate', { times: 10 }, 3000);

    $('.effect_bingo').textillate({
		  // enable looping
		  loop: true,
		  // sets the minimum display time for each text before it is replaced
		  minDisplayTime: 2000,
		  // sets the initial delay before starting the animation
		  // (note that depending on the in effect you may need to manually apply 
		  // visibility: hidden to the element before running this plugin)
		  initialDelay: 10,
		  // set whether or not to automatically start animating
		  autoStart: true,
			// in animation settings
		  in: {
			// set the effect name
			effect: 'fadeInLeftBig',
			// set the delay factor applied to each consecutive character
			delayScale: 1.5,
			// set the delay between each character
			delay: 50,
			// set to true to animate all the characters at the same time
			sync: false,
			// randomize the character sequence 
			// (note that shuffle doesn't make sense with sync = true)
			shuffle: false,
			// reverse the character sequence 
			// (note that reverse doesn't make sense with sync = true)
			reverse: false
		  },

		  // out animation settings.
		  out: {
			effect: 'hinge',
			delayScale: 1.5,
			delay: 50,
			sync: false,
			shuffle: false,
			reverse: false,
		  }

	});
	
  $('.effect_ligne').textillate({
 
			  loop: true,
			  minDisplayTime: 1000,
			  initialDelay: 10,
			  autoStart: true,
			  in: {
				effect: 'bounceIn',
				delayScale: 1.5,
				delay: 50,
				sync: false,
				shuffle: false,
				reverse: false
			  },

			  out: {
				effect: 'fadeOut',
				delayScale: 1.5,
				delay: 50,
				sync: false,
				shuffle: false,
				reverse: false,
			  }
	});
	
	$('.effect_not_found').textillate({
 
			  loop: true,
			  minDisplayTime: 1000,
			  initialDelay: 10,
			  autoStart: true,
			  in: {
				effect: 'bounce',
				delayScale: 1.5,
				delay: 50,
				sync: false,
				shuffle: false,
				reverse: false
			  },

			  out: {
				effect: 'fadeOut',
				delayScale: 1.5,
				delay: 50,
				sync: false,
				shuffle: false,
				reverse: false,
			  }
	});
})


</script>

<?php

$price_bingo = "";
$price_ligne = "";
$partie_no = "";

$is_bingo = "false";

$new_number = 0;
$new_ligne = "false";
$num_found = 0;

if (isset($_GET['new_number']))
{
	$new_number = $_GET['new_number'];
}

if (isset($_GET['new_ligne']))
{
	$new_ligne = $_GET['new_ligne'];
}

if (isset($_GET['num_found']))
{
	$num_found = $_GET['num_found'];
}

if (isset($_GET['game_id']))
{

	$game_id = $_GET['game_id'];
	//connect to databse to retrieve numbers
	include $_SERVER['DOCUMENT_ROOT'].'/bingo/db/db_connect.php';

	//check if bingo or ligne
	$result_game = mysqli_query($con, "SELECT * FROM game where id = ".$game_id) or die(mysqli_error($con)); 
	$row_game = mysqli_fetch_array($result_game);
	
	//get prices
	$price_bingo = $row_game["prize_desc"];
	$price_ligne = $row_game["prize_ligne_desc"];
	
	$partie_no = $row_game["partie_no"];

	if (($row_game["bingo_date"] != "0000-00-00 00:00:00") && ($row_game))
	{	

		//launch fireworks
		echo '<script src="js/fireworks.js" type="text/javascript"></script>';
		$is_bingo = "true";
	}

}

?>

</head>


<!-- css -->
<link rel="stylesheet" type="text/css" media="screen" href="css/main_grid.css" />


<body class="metro" onload="windowReszie()" style="background-color:#D8D8D8">

<table style="border:0px;">
<tr style="border:0px;">
	<th style="border:0px;background-color:#D8D8D8"><h1 style="margin-right:160px;margin-left:100px">Partie: <?php echo $partie_no; ?></h1></th>
	<th style="border:0px;background-color:#D8D8D8">
	<img src="images/banner_bingo_2.jpg" style="margin-top:10px;margin-bottom:10px;">
	</th>
</tr>
</table>

<!-- image left -->
<table style="border:0px;" align="center">
<tr style="border:0px;" >
	<th style="border:0px;background-color:#D8D8D8">
		<img src="images/rh.JPG"  style="width:335px;height:600px; margin-right:40px"/>
	</th>
	<th style="border:0px;background-color:#D8D8D8">
<table>
<?php


	
if (isset($_GET['game_id']))
{
	
	
	
	//fetch numbers for this game
	$result_no = mysqli_query($con, "SELECT * FROM number where game_id = ".$game_id."  and is_active=0") or die(mysqli_error($con)); 
	
	$array_counter = 0;
	$check_ligne_counter = 0;
	$check_bingo_counter = 0;
	while($row_no = mysqli_fetch_array($result_no))
	{
		$array_no[$array_counter] = $row_no["value"];
		
		$check_state = $row_no["check_state"];
		if ($check_state == 1)
		{
			$array_check_ligne[$check_ligne_counter] = $row_no["value"];
			$check_ligne_counter++;
		}
		else if ($check_state == 2)
		{
			$array_check_bingo[$check_bingo_counter] = $row_no["value"];
			$check_bingo_counter++;
		}
		$array_counter++;
	}

	$previous_row = 100;
	for($i=1;$i<91;$i++)
	{
		$current_row = (int)(($i-1) / 10);
		
		//new row
		if ($current_row != $previous_row)
		{
			if($i != 1)
			{
				echo '</tr>';
			}
			
			if($i != 99)
			{
				echo '<tr>';
			}
		}
		
		if ((isset($array_no)) &&(in_array($i, $array_no)) )
		{
			//check ligne
			if ((isset($array_check_ligne)) &&(in_array($i, $array_check_ligne)) )
			{
				echo '<td style="color:#fa6800"';
			}
			//check bingo
			else if ((isset($array_check_bingo)) &&(in_array($i, $array_check_bingo)) )
			{
				echo '<td style="color:#60a917"';
			}
			//normal
			else
			{
				echo '<td';
			}
			
			//pulsate if new number
			if($i == $new_number)
			{
				echo ' class="pulsate" ';
			}
			
			echo '>'.$i.'</td>';
		}
		else
		{
			echo '<td> </td>';
		}
			
		
		$previous_row = $current_row;
	}

}

?>

</table>
</th >
<th style="border:0px;background-color:#D8D8D8">
	<img src="images/anniversaire.JPG"  style="width:335px;height:600px;margin-left:40px""/>
</th>
</table

<br>
<center>
<h1 style="color:#60a917">Prix Bingo: </h1><h2><?php echo $price_bingo; ?></h2>
<h1 style="color:#fa6800">Prix Ligne: </h1><h2><?php echo $price_ligne; ?></h2>
</center>

<?php
	//bingo
	if($is_bingo=="true")
	{
		echo '<h2 class="effect_bingo hyper_bingo">BINGO !</h2>';
	}
	
	//ligne
	if($new_ligne=="true")
	{
		echo '<h2 class="effect_ligne hyper_ligne">Ligne !</h2>';
	}
	
	//number not found
	if($num_found==1)
	{
		echo '<h2 class="effect_not_found hyper_not_found">Introuvable !</h2>';
	}
	
?>


</body>

<script>
</script>

<?php 

if(isset($con))
{
	mysqli_close($con);
}
?>

</html>
<?php 
function dice_row($dice){
	$dice = NULL;
	$moves = NULL;
	$dice = rand(1, 6);
	for ($i = 1; $i <= 6; $i++) {
		if ($dice == $i) {
			$moves = $dice;
		}
	}
	return $moves;
}

function dice_execude_moves($colors, $moves){
	for ($j = 0; $j < 12; $j++) {
		//Searching player possitoin
		if ($colors[$j] != "#fff") {
			//Getting player color
			$player_color = $colors[$j];
			//Changin last player possition to white
			$colors[$j] = "#fff";
			if ($moves+$j <  13) {
				// Gathering the possition number on dice row
				$possittion_in_array = $j + $moves;
				$colors[$possittion_in_array] = $player_color;
			}
			elseif ($moves+$j <= 13){
				// Find how much steps are have to possition 1
				$step1 = 12 - $j;
				// Find the steps after possition 1
				$step2 = $moves - $step1;
				// Find the real steps, because in step1 and step2 next possiton is counted as if it starts on possition 1 but it is in possition 0
				$step3 = $step2 - 1;
				$possittion_in_array = $step3;
				$colors[$possittion_in_array] = $player_color;
			}
		}
	}
	$_SESSION['colors'] = $colors;
	return $_SESSION['colors'];
}
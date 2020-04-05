<?php 
function dice_execude_moves($colors){
	$dice = rand(1, 6); 
	$_SESSION['dice'] = $dice;
		for ($j = 0; $j < 12; $j++) {
		if ($colors[$j] != "#fff") {

			$player_color = $colors[$j];

			$colors[$j] = "#fff";
			if ($dice+$j <  12) {

				$possittion_in_array = $j + $dice;
		
				$colors[$possittion_in_array] = $player_color;
				$_SESSION['colors'] = $colors;
				die;
			}
			elseif ($dice+$j >= 12){
		
				$step1 = 12 - $j;

				$step2 = $dice - $step1;
		
				$possittion_in_array = $step2;
				
				$colors[$possittion_in_array] = $player_color;
				$_SESSION['colors'] = $colors;
				die;
			}
		}
	}
	return $_SESSION['colors'];
}


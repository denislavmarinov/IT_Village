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
				break;
			}
			elseif ($dice+$j >= 12){
		
				$step1 = 12 - $j;

				$step2 = $dice - $step1;
		
				$possittion_in_array = $step2;
				
				$colors[$possittion_in_array] = $player_color;
				$_SESSION['colors'] = $colors;
				break;
			}
		}
	}
	return $_SESSION['colors'];
}

function possition_actions($colors, $possitions, $moves, $money, $message, $property_buy, $score, $return_elements){
	for ($k = 0; $k < 12; $k++) {
		if($colors[$k] != "#fff"){
			$current_possition = $k;
		}
	}
	$action_name = $possitions[$current_possition];
	switch ($action_name) {
		case "P":
		$money -= 5;
		$message = "";
		break;
		
		case "I":
			if (!isset($property_buy[$current_possition]) && $money > 100) {
				$money -= 100; 
				$message = "";
				$property_buy[$current_possition] = true;
			}
			elseif ($property_buy == true) {
				$money += 20;
				$message = "";
			}
			elseif ($money <= 100) {
				$money -=  10;
				$message = "";
			}
		break;

		case "F":
		$money += 20;
		$message = "";
		break;

		case "S":
		$_SESSION['moves'] -= 2;
		$message = "";
		break;

		case "V":
		$money = $money * 10;
		$message = "";
		break;

		case "N":
		$score = "win";
		$message = "";
		break;
	}
	$return_elements = [
		'money' => $money,
		'message' => $message,
		'moves' => $_SESSION['moves'],
		'property_buy' => $property_buy,
		'score' => $score
	];
	$_SESSION['return_elements'] = $return_elements;
	return $return_elements;
}
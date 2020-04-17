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

function possition_actions($colors, $possitions, $moves, $money, $message, $property_buy, $score){
	for ($k = 0; $k < 12; $k++) {
		if($colors[$k] != "#fff"){
			$current_possition = $k;
		}
	}
	$action_name = $possitions[$current_possition];
	switch ($action_name) {
		case "P":
		$money -= 5;
		$message = "Вие загубихте 5 пари!";
		break;
		
		case "I":
			if (!isset($property_buy[$current_possition]) && $money > 100) {
				$money -= 100; 
				$message = "Вие закупихте мотел!";
				$property_buy[$current_possition] = true;
			}
			elseif ($property_buy == true) {
				$money += 20;
				$message = "Вие спечелихте от вашия мотел";
			}
			elseif ($money <= 100) {
				$money -=  10;
				$message = "Вие спахте в мотел. Загубихте 10 пари!";
			}
		break;

		case "F":
		$money += 20;
		$message = "Честито! Успешен проект! Печелите 20 пари!";
		break;

		case "S":
		$moves -= 2;
		$message = "Нямате Интернет! Губите 2 хода!";
		break;

		case "V":
		$money = $money * 10;
		$message = "Умножихте капитала Ви десетократно!!!";
		break;

		case "N":
		$score = "win";
		$message = "Спечелихте играта с помощтна на VSC";
		$_SESSION['game_end_message'] = "Спечелихте с помощта на VSC";
		break;
	}
	$_SESSION['moves'] = $moves;
	$_SESSION['money'] = $money;
	$_SESSION['message'] = $message;
	$_SESSION['property_buy'] = $property_buy;
	$_SESSION['score'] = $score;

}

function game_end($money, $property_buy, $moves){
	if ($money <= 0) {
		$_SESSION['game_end_message'] = "Парите Ви свършиха";
		$_SESSION['score'] = "loss";
	}
	elseif (count($property_buy) == 3) {
		$_SESSION['game_end_message'] = "Вие купихте всички имоти";
		$_SESSION['score'] = "win";
	}
	elseif ($moves <= 0) {
		$_SESSION['game_end_message'] = "Нямате повече ходове";
		$_SESSION['score'] = "loss";
	}
}
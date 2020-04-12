<?php
include ('includes/header.php');
if ((int)$_SESSION['moves'] <= 1 && isset($_SESSION['moves'])) {
	unset($_SESSION['player_color']);
	unset($_SESSION['moves']);
	unset($_SESSION);
	header('Location: functions/game_start.php');
}
include ("functions/functions.php");
$player_color = $_SESSION['player_color'];
$colors = [];
$possitions = [];
$colors = $_SESSION['colors'];
$possitions = $_SESSION['possitions'];
$money = 50;
$message = NULL;
$score = NULL;
$property_buy = [];
$return_elements = $_SESSION['return_elements'];
?>
	<div class="container">
		<div class="col-8-lg offset-2">

			<svg width="200" height="200">
				<rect  x="0" y="0" width="50" height="50" style="fill: <?= $colors[0] ?>; stroke: black"><</rect>
				<text x="15" y="37.5" font-family="Verdana" font-size="35" fill="blue"><?= $possitions[0] ?></text>
				<!-- New Block -->
				<rect x="50" y="0" width="50" height="50" style="fill: <?= $colors[1] ?>; stroke: black"></rect>
				<text x="65" y="37.5" font-family="Verdana" font-size="35" fill="blue"><?= $possitions[1] ?></text>
				<!-- New Block -->
				<rect x="100" y="0" width="50" height="50" style="fill: <?= $colors[2] ?>; stroke: black"></rect>
				<text x="115" y="37.5" font-family="Verdana" font-size="35" fill="blue"><?= $possitions[2] ?></text>
				<!-- New Block -->
				<rect x="150" y="0" width="50" height="50" style="fill: <?= $colors[3] ?>; stroke: black"></rect>
				<text x="165" y="37.5" font-family="Verdana" font-size="35" fill="blue"><?= $possitions[3] ?></text>
				<!-- New Block -->
				<rect x="150" y="50" width="50" height="50" style="fill: <?= $colors[4] ?>; stroke: black"></rect>
				<text x="165" y="87.5" font-family="Verdana" font-size="35" fill="blue"><?= $possitions[4] ?></text>
				<!-- New Block -->
				<rect x="150" y="100" width="50" height="50" style="fill: <?= $colors[5] ?>; stroke: black"></rect>
				<text x="165" y="137.5" font-family="Verdana" font-size="35" fill="blue"><?= $possitions[5] ?></text>
				<!-- New Block -->
				<rect x="150" y="150" width="50" height="50" style="fill: <?= $colors[6] ?>; stroke: black"></rect>
				<text x="165" y="187.5" font-family="Verdana" font-size="35" fill="blue"><?= $possitions[6] ?></text>
				<!-- New Block -->
				<rect x="100" y="150" width="50" height="50" style="fill: <?= $colors[7] ?>; stroke: black"></rect>
				<text x="115" y="187.5" font-family="Verdana" font-size="35" fill="blue"><?= $possitions[7] ?></text>
				<!-- New Block -->
				<rect x="50" y="150" width="50" height="50" style="fill: <?= $colors[8] ?>; stroke: black"></rect>
				<text x="65" y="187.5" font-family="Verdana" font-size="35" fill="blue"><?= $possitions[8] ?></text>
				<!-- New Block -->
				<rect x="0" y="150" width="50" height="50" style="fill: <?= $colors[9] ?>; stroke: black"></rect>
				<text x="15" y="187.5" font-family="Verdana" font-size="35" fill="blue"><?= $possitions[9] ?></text>
				<!-- New Block -->
				<rect x="0" y="100" width="50" height="50" style="fill: <?= $colors[10] ?>; stroke: black"></rect>
				<text x="15" y="137.5" font-family="Verdana" font-size="35" fill="blue"><?= $possitions[10] ?></text>
				<!-- New Block -->
				<rect x="0" y="50" width="50" height="50" style="fill: <?= $colors[11]?>; stroke: black"></rect>
				<text x="15" y="87.5" font-family="Verdana" font-size="35" fill="blue"><?= $possitions[11] ?></text>
			</svg>
		</div>
	</div>
	<div>
		<form action="#" method="post">
			<input type="submit" name="dice_row" value="Хвърли зар">
			<input type="hidden" name="moves" value="<?php  $_SESSION['moves']--; echo $_SESSION['moves']?>">
		</form>
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<p>Your dice is:   <img style="width: 50px; height: 50px;" src="img/dice_<?=$_SESSION['dice']?>.jpg" alt="Dice:  <?=$_SESSION['dice']?>"></p>
			</div>

			<div class="col-md-4 offset-md-8">
				<p><?php var_dump($return_elements)?></p>
				<p>You have only <b><?= $_SESSION['moves'] ?></b> more. </p>
				<p>Your money:  <b><?= $return_elements['money'] ?></b></p>
				<p>Game message: <b><?= $return_elements['message'] ?></b></p>
				<p>Property buy: <b><?php print_r($_SESSION['property_buy']) ?></b></p>
				<p>Win or loss:  <b><?= $return_elements['score'] ?></b></p>

			</div>
		</div>
	</div>
<?php
	if(!empty($_POST['dice_row'])){
		unset($_POST['dice_row']);
		dice_execude_moves($colors);
		possition_actions($colors, $possitions, $_SESSION['moves'], $_SESSION['money'], $_SESSION['message'], $_SESSION['property_buy'], $_SESSION['score'], $return_elements);
		// $return_elements = $_SESSION['return_elements'];
		// $money = $return_elements['money'];
		// $message = $return_elements['message'];
		// $property_buy = $return_elements['property_buy'];
		// $score = $return_elements['score'];
	}
include ('includes/footer.php');
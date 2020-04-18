<?php
include ('includes/header.php');
// Head variables
$link = "img/logo_1.jpg";
$title = "Game page";
//Game variables
$player_color = $_SESSION['player_color'];
$colors = [];
$possitions = [];
$colors = $_SESSION['colors'];
$possitions = $_SESSION['possitions'];
// CHeck fi moves is set
if (!isset($_SESSION['moves'])) {
	header ("Location: functions/game_start.php");
}
if ($_SESSION['score'] == "win" || $_SESSION['score'] == "loss") {
	echo '<style>#dice{display: none;} #game_stats{display: none;} #dice_image{display: none;}</style>';
	unset($_SESSION['player_color']);
	?>
	<table style="background: #fff" class="table table-striped">
				<thead>
					<tr>
						<th>Пари</th>
						<th>Причина за свършване на играта</th>
						<th>Купени мотели</th>
						<th>Общ брой мотели </th>
						<th>Победа / Загуба</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?= $_SESSION['money']?></td>
						<td><?= $_SESSION['game_end_message']?></td>
						<td><?= count($_SESSION['property_buy'])?> бр.</td>
						<td>3 бр.</td>
						<td>
						<?php
						if ($_SESSION['score'] == "win") {
							echo "<span style='color: #0f0; font-weight: bold; '>Победа</span>";
						}else{
							echo "<span style='color: #f00; font-weight: bold; '>Загуба</span>";
						}
						?>
						</td>
					</tr>
				</tbody>
			</table>
	<?php

}
include ("functions/functions.php");

?>
	<div class="container">
		<div class="col-4 offset-4">

			<svg width="200" height="200">
				<rect  x="0" y="0" width="50" height="50" style="fill: <?= $colors[0] ?>; stroke: black"></rect>
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
<?php
	if(!empty($_POST['dice_row'])){
		unset($_POST['dice_row']);
		dice_execude_moves($colors);
		;
		possition_actions($colors, $possitions, $_SESSION['moves'], $_SESSION['money'], $_SESSION['message'], $_SESSION['property_buy'], $_SESSION['score']);
		game_end($_SESSION['money'], $_SESSION['property_buy'], $_SESSION['moves']);
	}
?>
		<form action="#" method="post" id="dice">
			<input type="submit" name="dice_row" value="Хвърли зар">
			<input type="hidden" name="moves" value="<?php  $_SESSION['moves']--; echo $_SESSION['moves']?>">
		</form>
		<div class="row">
			<div id="dice_image" class="col-md-4 offset-md-4">
				<p>Your dice is:   <img style="width: 50px; height: 50px;" src="img/dice_<?=$_SESSION['dice']?>.jpg" alt="Dice:  <?=$_SESSION['dice']?>"></p>
			</div>

			<div id="game_stats" class="col-md-4 offset-md-8">
				<p>Game message:</p>
				<p class="alert alert-info"><?= $_SESSION['message'] ?></p>
				<p>You have only <b><?= $_SESSION['moves'] ?></b> more. </p>
				<p>Your money:  <b><?= $_SESSION['money'] ?></b></p>
				<p>Property buy: <b><?php echo count($_SESSION['property_buy']) ?></b></p>
			</div>
		</div>
	</div>
<?php
include ('includes/footer.php');
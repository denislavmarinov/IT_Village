<?php 
session_name('IT_Village');
session_start();
include ('includes/bootstrap_includes.php');
include ("functions/functions.php");
$player_color = $_SESSION['player_color'];
$colors = [];
$possitions = [];
$colors = $_SESSION['colors'];
$possitions = $_SESSION['possitions'];

?>
	<div class="container">
		<div class="col-8-lg offset-2">

			<svg width="200" height="200">
				<rect x="0" y="0" width="50" height="50" style="fill: <?= $colors[0] ?>; stroke: black"><</rect>
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
	$dice = NULL;
	if(isset($_POST['dice_row'])){
		//Here makes error (Start)
		$moves = dice_row($dice);	
		var_dump($moves);
		echo "<br>";
		var_dump($_SESSION['colors']);
		dice_execude_moves($colors, $moves);
		unset($_POST['dice_row']);
		//Error final line
	}	
	if (isset($_POST['delete_session'])) {
		unset($_SESSION['player_color']);
		header("Location: functions/game_start.php");
	}
?>
		<form action="#" method="post">
			<input type="submit" name="dice_row">
		</form>
		<form action="#" method="post">
			<input type="submit" name="delete_session" value="Clear Session">
		</form>
	</div>
</body>
</html>
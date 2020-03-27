<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<?php

	$color1 = "white";
	$color2 = "white";
	$color3 = "white";
	$color4 = "white";
	$color5 = "white";
	$color6 = "white";
	$color7 = "white";
	$color8 = "white";
	$color9 = "white";
	$color10 = "white";
	$color11 = "white";
	$color12 = "white";

	$rand_possition_number = rand(1, 12);

	switch ($rand_possition_number) {
		case 1:
		$color1 = "black";
		break;
		
		case 2:
		$color2 = "black";
		break;

		case 3:
		$color3 = "black";
		break;

		case 4:
		$color4 = "black";
		break;

		case 5:
		$color5 = "black";
		break;

		case 6:
		$color6 = "black";
		break;

		case 7:
		$color7 = "black";
		break;

		case 8:
		$color8 = "black";
		break;

		case 9:
		$color9 = "black";
		break;

		case 10:
		$color10 = "black";
		break;

		case 11:
		$color11 = "black";
		break;

		case 12:
		$color12 = "black";
		break;
	}
	?>
	<div class="container">
		<div class="col-8-lg offset-2">

			<svg width="200" height="200">
				<rect x="0" y="0" width="50" height="50" style="fill: <?= $color1 ?>; stroke: black"></rect>
				<rect x="50" y="0" width="50" height="50" style="fill: <?= $color2 ?>; stroke: black"></rect>
				<rect x="100" y="0" width="50" height="50" style="fill: <?= $color3 ?>; stroke: black"></rect>
				<rect x="150" y="0" width="50" height="50" style="fill: <?= $color4 ?>; stroke: black"></rect>
				<rect x="150" y="50" width="50" height="50" style="fill: <?= $color5 ?>; stroke: black"></rect>
				<rect x="150" y="100" width="50" height="50" style="fill: <?= $color6 ?>; stroke: black"></rect>
				<rect x="150" y="150" width="50" height="50" style="fill: <?= $color7 ?>; stroke: black"></rect>
				<rect x="100" y="150" width="50" height="50" style="fill: <?= $color8 ?>; stroke: black"></rect>
				<rect x="50" y="150" width="50" height="50" style="fill: <?= $color9 ?>; stroke: black"></rect>
				<rect x="0" y="150" width="50" height="50" style="fill: <?= $color10 ?>; stroke: black"></rect>
				<rect x="0" y="100" width="50" height="50" style="fill: <?= $color11 ?>; stroke: black"></rect>
				<rect x="0" y="50" width="50" height="50" style="fill: <?= $color12?>; stroke: black"></rect>
			</svg>
		</div>
	</div>
	<?php 
	

	?>
</body>
</html>
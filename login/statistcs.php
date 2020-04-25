<?php 
include('../includes/header.php');
include('../includes/db_connect.php');
if ($_SESSION['loggedin'] != true) {
	header("Location: login.php");
}
?>
<a href="profile.php" class="btn btn-outline-light"><i class="fas fa-reply-all"></i>   Go back to your profile</a>
<form class="form-group" action="#" method="post">
	<div class="form-group">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Select the column to sort by:</span>
				<select id="column" name="column" class="form-control">
					<option value="1">Name</option>
					<option value="2">Wins</option>
					<option value="3">Losses</option>
				</select>
			</div>
		</div>
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Select how to sort:</span>
				<select id="sort_way" name="sort_way" class="form-control">
					<option value="1">Ascending</option>
					<option value="2">Descending</option>
				</select>
			</div>
		</div>
	</div>
	<input class="btn btn-outline-secondary" type="submit" name="submit" value="Sort">
</form>
<?php

if (isset($_POST['submit'])) {
	include ("sort.php");
}
if (isset($sort)) {
	$query = "SELECT u.`username`, res.`wins`, res.`losses` FROM users u JOIN results res ON u.user_id = res.user_id" . $sort;
} else{
	$query = "SELECT u.`username`, res.`wins`, res.`losses` FROM users u JOIN results res ON u.user_id = res.user_id";
}


$result = mysqli_query($conn, $query);
?>
<p>Players</p>
<table class="table table-striped" style="background-color: #fff;">
	<thead>
		<tr>
			<th>name</th>
			<th>wins</th>
			<th>losses</th>
			<th>games_played</th>
		</tr>
	</thead>
	<tbody>
<?php 
	while ($row = mysqli_fetch_assoc($result)) {
	    ?>
	    <tr>
		    <td><?= $row['username']?></td>
		    <td><?php $wins = $row['wins']; echo $wins;?></td>
		    <td><?php $losses = $row['losses']; echo $losses;?></td>
		    <td><?php echo $wins + $losses?></td>
		</tr>
	    <?php
	}
?>
	</tbody>
</table>
<hr>
<?php
$query = "SELECT SUM(`wins`) AS `sum_wins` FROM `results`";

$result = mysqli_query($conn, $query);

$wins = mysqli_fetch_assoc($result);


$query = "SELECT SUM(`losses`) AS `sum_losses` FROM `results`";

$result = mysqli_query($conn, $query);

$losses = mysqli_fetch_assoc($result);

?>
<p>Games played</p>
<style>
.circularPercentage {
  transform: rotate(-90deg);
}
.wins_dot {
  height: 25px;
  width: 25px;
  background-color: #0f0b;
  border-radius: 50%;
  display: inline-block;
}
.losses_dot {
  height: 25px;
  width: 25px;
  background-color: #f00;
  border-radius: 50%;
  display: inline-block;
}

</style>
<?php 

$games_played = (int)$wins['sum_wins'] + (int)$losses['sum_losses'];

//Find how percents is wins of all games played
$win_percent = (int)$wins['sum_wins'] / $games_played;

//Find how percents is losses of all games played
$loss_percent = (int)$losses['sum_losses'] / $games_played;

//Find how much points of the pie chart is wins
$pie_chart_wins = $win_percent * 424.17;

//Find how much points of the pie chart is losses
$pie_chart_losses = $loss_percent * 424.17;

?>
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<svg class="circularPercentage" fill="none" width="150" height="150">
			    <circle class="background" fill="none" stroke="#f00" cx="75" cy="75" stroke-width="15" r="67.5"></circle>
			    <circle class="percentage" fill="none" cx="75" cy="75" stroke="#0f0" stroke-width="15" r="67.5" stroke-dasharray="<?= $pie_chart_wins?> <?= $pie_chart_losses?>" stroke-dashoffset="0"></circle>
			</svg>
		</div>
		<div class="col-lg-6">
			<p>Legend:</p>
			<p>Wins: <span class="wins_dot"></span>Green color <?php  echo round($win_percent*100) . "%"; ?></p>
			<p>Losses:<span class="losses_dot"></span> Red color <?php echo round($loss_percent*100) . "%"; ?></p>
		</div>
	</div>
</div>
<?php
include('../includes/footer.php');
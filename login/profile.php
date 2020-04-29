<?php 
include("../includes/header.php");
include("../includes/db_connect.php");
if ($_SESSION['loggedin'] != true) {
	header("Location: login.php");
}

$_SESSION['profile_key'] = rand();
//Check the user role

$query = "SELECT r.`role_name` FROM roles r JOIN `users` u ON r.`role_id` = u.`role_id` WHERE u.`user_id` = '".$_SESSION['user_id']."' LIMIT 1";

$result = mysqli_query($conn, $query);

$user_role_arr = mysqli_fetch_assoc($result);
$user_role = $user_role_arr['role_name'];

$_SESSION['role'] = $user_role;

if($user_role == "admin"){
	include ("admin_profile.php");
}else{
	include ("user_profile.php");
}
//Check if user have profile image
$query = "SELECT `user_image`, `username`, CASE WHEN `user_image` IS NULL THEN 'NO' ELSE 'YES' END AS `have_image_or_not` FROM `users` WHERE `user_id` = '".$_SESSION['user_id']."'";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['username'] = $row['username'];
    $have_image_arr = $row['have_image_or_not'];
    $user_image = $row['user_image'];
}

echo "<div class='user_image'>";
if ($have_image_arr == "YES") {
	?>
	<img src="../user_photos/<?= $_SESSION['username'] ?>/<?=$user_image ?>" alt="Your image" style="min-width: 150px; max-width: 350px;">
</div>
<div class="btn-group-vertical" id="change_delete_image_btn_group">
	<a class="btn btn-outline-info" class="change_delete_image_btn" href="update_user_image.php">Update you photo</a>
	<a class="btn btn-outline-danger" class="change_delete_image_btn" href="delete_user_image.php">Delete you photo</a>
</div>
	<?php
}else{
?>
<form action="upload_image.php" method="post" class="form-group" id="image_upload" enctype="multipart/form-data">
	<input type="file" name="user_image" class="form-control" style="width: 250px !important;">
	<p></p>
	<input type="submit" name="submit" value="Upload the file" class="btn btn-outline-info">

</form>
</div>
<?php 
}

if (isset($_SESSION['user_errors'])) {
	if ($_SESSION['user_errors'] != false) {
		?>
		<p class="text-white" style="font-size: 25px; float: right;"><?= $_SESSION['user_errors'] ?></p>
		<?php
	}
}
?>
<p class="text-white text-center" style="font-size: 24px">Hello <?= $_SESSION['username'] ?>!</p>
<?php 
	$query = "SELECT r.`role_name`, r.`role_description` FROM `roles` r JOIN `users` u ON r.`role_id` = u.`role_id` WHERE u.`user_id` = '".$_SESSION['user_id']."'";

	$result = mysqli_query($conn, $query);

?>
<p class="text-white">You role in the app</p>
<table class="table table-striped" style="margin: 25px; background-color: #fff; width: 500px;" >
	<thead>
		<tr>
			<th>#</th>
			<th>Your role</th>
			<th>Role description</th>
		</tr>
	</thead>
	<tbody>
			<?php
			$num = 1;
			while ($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td><?= $num++ ?></td>
				<td><?= $row['role_name']?></td>
				<td><?= $row['role_description'] ?></td>
			</tr>
		<?php }?>
	</tbody>
</table>
<?php
$query = "SELECT res.`wins`, res.`losses` FROM `results` res WHERE `user_id` = '".$_SESSION['user_id']."'";

$result = mysqli_query($conn, $query);
?>
<p class="text-white">Statistic</p>
<div class="row">
		<table style="margin: 25px; background-color: #fff;" class="table table-striped">
			<tr>
				<td>#</td>
				<td>Name</td>
				<td>Wins</td>
				<td>Losses</td>
				<td>Game played</td>
			</tr>
			<?php
			$num = 1;
			while($row = mysqli_fetch_assoc($result)){
				?>
				<tr>					
					<td><?= $num ++?></td>
					<td><?= $_SESSION['username'] ?></td>	
					<td><?php $wins = $row['wins']; echo $wins;?></td>
		    		<td><?php $losses = $row['losses']; echo $losses;?></td>
		    		<td><?php echo $wins + $losses?></td>	
				</tr>
				<?php
			}
			?>
		</table>
	</div>
<?php
$query = "SELECT SUM(`wins`) AS `sum_wins` FROM `results` WHERE `user_id` = '".$_SESSION['user_id']."'";

$result = mysqli_query($conn, $query);

$wins = mysqli_fetch_assoc($result);


$query = "SELECT SUM(`losses`) AS `sum_losses` FROM `results` WHERE `user_id` = '".$_SESSION['user_id']."'";

$result = mysqli_query($conn, $query);

$losses = mysqli_fetch_assoc($result);

?>
<p class="text-white">Games played</p>
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
			<p class="text-white">Legend:</p>
			<p class="text-white">Wins: <span class="wins_dot"></span>Green color <?php  echo round($win_percent*100) . "%"; ?></p>
			<p class="text-white">Losses:<span class="losses_dot"></span> Red color <?php echo round($loss_percent*100) . "%"; ?></p>
		</div>
	</div>
</div>
<?php
include("../includes/footer.php");
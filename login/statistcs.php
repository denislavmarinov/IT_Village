<?php 
include('../includes/header.php');
include('../includes/db_connect.php');


$query = "SELECT u.`user_id`, u.`username`, res.`wins`, res.`losses`, ro.`role_name`, u.`date_registered` FROM users u JOIN roles ro ON u.role_id = ro.role_id JOIN results res ON u.user_id = res.user_id";

$result = mysqli_query($conn, $query);

// if (mysqli_num_rows($result) < 0) {
// 	die("Error" . mysqli_error($conn));
// }
?>
<p>Players</p>
<table class="table table-striped" style="background-color: #fff;">
	<thead>
		<tr>
			<th>name</th>
			<th>wins</th>
			<th>losses</th>
			<th>games_played</th>
			<th>role</th>
			<th>date_registered</th>
			<th>#</th>
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
		    <td><?= $row['role_name']?></td>
		    <td><?= $row['date_registered']?></td>
		    <td><a class="bnt btn-success" href="change_role.php?user_id=<?= $row['user_id']?>">UPDATE ROLE</a></td>
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
// if (mysqli_num_rows($result) < 0) {
// 	die("Error" . mysqli_error($conn));
// }
$wins = mysqli_fetch_assoc($result);
var_dump($wins);

$query = "SELECT SUM(`losses`) AS `sum_losses` FROM `results`";

$result = mysqli_query($conn, $query);
// if (mysqli_num_rows($result) < 0){
// 	die("Error" . mysqli_error($conn));	
// }

$losses = mysqli_fetch_assoc($result);
var_dump($losses);
?>
<p>Game_played</p>
<?php
include('../includes/footer.php');
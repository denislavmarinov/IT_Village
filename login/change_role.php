<?php 
include ('../includes/header.php');
include ('../includes/db_connect.php');

$user_id = $_GET['user_id'];

$query = "SELECT r.`role_name`, u.`username` FROM roles r JOIN users u ON r.`role_id`=u.`role_id` WHERE u.`user_id` ='". $user_id . "' LIMIT 1";

$result = mysqli_query($conn, $query);

// if (mysqli_num_rows($result) < 0) {
// 	die("Error" . mysqli_error($conn));
// }

$row = mysqli_fetch_assoc($result);
$user_role = $row['role_name'];
$username = $row['username'];

$query = "SELECT `role_id`, `role_name` FROM `roles`";

$result = mysqli_query($conn, $query);

// if (mysqli_num_rows($result) < 0) {
// 	die("Error" . mysqli_error($conn));
// }
$num = 0;
while ($row = mysqli_fetch_assoc($result)) {
	$roles[$num]['id'] = $row['role_id'];
    $roles[$num]['name'] = $row['role_name'];
    $num++;
}
?>
<table class="table table-striped" style="background-color: #fff;">
	<thead>
		<tr>
			<th>Username</th>
			<th>New user role</th>
			<th>#</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?= $username?></td>
			<form action="change_role_script.php" method="post">
				<td>
					<select name="new_role">
						<?php 
							for ($i = 0; $i < count($roles); $i++) {
								$selected = NULL;
								if ($user_role == $roles[$i]['name']) {
									$selected = "selected";
								}
								?>
								<option value="<?= $roles[$i]['id'] ?>" <?= $selected ?>><?= $roles[$i]['name'] ?></option>
								<?php
							}
						?>
					</select>
				</td>
				<td>
					<input type="hidden" name="user_id" value="<?=$user_id?>">
					<input class="btn btn-outline-secondary" type="submit" name="submit" value="Confirm">
				</td>
			</form>
		</tr>
	</tbody>
</table>
<?php

include ('../includes/footer.php');
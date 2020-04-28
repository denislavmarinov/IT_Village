<?php 
if (!isset($_SESSION['profile_key'])) {
	header("Location: profile.php");
}
?>

<div class="header">
  <a href="../index.php" class="logo">IT Village</a>
  <div class="header-right">
	<a href="../functions/game_start.php" class="btn btn-outline-info">Play a game</a>
	<a href="statistics.php" class="btn btn-outline-info">Statistics</a>
	<a href="change_role.php" class="btn btn-outline-info">Change user role</a>
	<a href="roles.php" class="btn btn-outline-info">Roles</a>
	<a href="change_password.php" class="btn btn-outline-info">Change password</a>
	<a href="logout.php" class="btn btn-outline-info">Log out</a>
  </div>
</div>

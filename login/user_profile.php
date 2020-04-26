<?php 
if (!isset($_SESSION['profile_key'])) {
	header("Location: profile.php");
}
?>

<ul>
	<li><a href="profile.php" class="btn btn-outline-secondary">Profile</a></li>
	<li><a href="../functions/game_start.php" class="btn btn-outline-secondary">Play a game</a></li>
	<li><a href="statistics.php" class="btn btn-outline-secondary">Statistics</a></li>
	<li><a href="change_password.php" class="btn btn-outline-secondary">Change password</a></li>
	<li><a href="logout.php" class="btn btn-outline-secondary">Log out</a></li>
</ul>
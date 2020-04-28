<?php 
if (!isset($_SESSION['profile_key'])) {
	header("Location: profile.php");
}
?>

<div class="header">
  <a href="../index.php" class="logo">IT Village</a>
  <div class="header-right">
    <a href="../functions/game_start.php" >Play a game</a>
	<a href="statistics.php">Statistics</a>
	<a href="change_password.php">Change password</a>
	<a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
  </div>
</div>
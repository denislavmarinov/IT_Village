<?php 
if (!isset($_SESSION['profile_key'])) {
	header("Location: profile.php");
}
?>

<ul>
	<li><a href="" class="btn btn-outline-secondary">Profile</a></li>
	<li><a href="" class="btn btn-outline-secondary">Play a game</a></li>
	<li><a href="" class="btn btn-outline-secondary">Statistics</a></li>
	<li><a href="" class="btn btn-outline-secondary">Change user role</a></li>
	<li><a href="" class="btn btn-outline-secondary">Roles</a></li>
	<li><a href="" class="btn btn-outline-secondary">Change password</a></li>
	<li><a href="" class="btn btn-outline-secondary">Log out</a></li>
</ul>
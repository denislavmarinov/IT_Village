<?php 
include '../includes/header.php';
include '../includes/db_connect.php';

if (!isset($_SESSION['loggedin'])) {
	header("Location: profile.php");
}


$query = "SELECT `user_image` FROM `users` WHERE `user_id` = '".$_SESSION['user_id']."' LIMIT 1";

$result = mysqli_query($conn, $query);

$file_name_arr = mysqli_fetch_assoc($result);
$file_name = $file_name_arr['user_image'];

$file = "../user_photos/".$_SESSION['username']."/" . $file_name;

if (file_exists($file)) {
    unlink($file);
} else {
  $_SESSION['user_errors'] = "Sorry! You can not update your image";
  header("Location: profile.php");
}

if (!file_exists($file)) {
?>

<a href="profile.php" class="btn btn-outline-light"><i class="fas fa-reply-all"></i>Go back</a>

<div class="container">
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark" id="nav">
	<a class="navbar-brand" href="../index.php">
	<img id="img" src="../img/logo_1.jpg" alt="logo" style="width: 150px;"><p>Home</p></a>
		<div class="container">
		<h4 class="text-warning">Change your photo</h4>
			<form action="upload_image.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="file" name="user_image" class="form-control" style="width: 250px !important;">
				</div>
				<input class="btn btn-primary" id="registration_form" type="submit" name="submit">
			</form>
		</div>
	</nav>
</div>
<?php
}else{
	$_SESSION['user_errors'] = "Sorry! You can not update your image";
	header("Location: profile.php");
}
?>

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
$query = "SELECT `user_image`, CASE WHEN `user_image` IS NULL THEN 'NO' ELSE 'YES' END AS `have_image_or_not` FROM `users` WHERE `user_id` = '".$_SESSION['user_id']."'";

$result = mysqli_query($conn, $query);

$have_image_arr = mysqli_fetch_assoc($result);

echo "<div class='user_image'>";
if ($have_image_arr['have_image_or_not'] == "YES") {
	$user_image = $have_image_arr['user_image'];
	?>
	<img src="../uploads/<?=$user_image ?>" alt="Your image" widht="50px" height="100px">
	<?php
}else{
?>
<form action="upload_image.php" method="post" class="form-group" id="image_upload">
	<input type="file" name="user_image" class="form-control" style="width: 250px !important;">
	<p></p>
	<input type="submit" name="submit" value="Upload the file" class="btn btn-outline-info">

</form>
<?php } ?>
</div>
<?php
include("../includes/footer.php");
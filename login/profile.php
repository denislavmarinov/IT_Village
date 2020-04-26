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

include("../includes/footer.php");
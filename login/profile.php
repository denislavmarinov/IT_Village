<?php 
$link = "../img/logo_1.jpg";
$title = "Proflie";
include("../includes/header.php");
include("../includes/db_connect.php");
if ($_SESSION['loggedin'] != true) {
	header("Location: login.php");
}

$_SESSION['profile_key'] = rand();
//Check the user role

$query = "SELECT r.`role_name` FROM roles r JOIN `users` u ON r.`role_id` = u.`role_id` WHERE u.`user_id` = '".$_SESSION['user_id']."' LIMIT 1";

$result = mysqli_query($conn, $query);

$user_role = mysqli_fetch_assoc($result);

$_SESSION['role'] = $user_role;

if($user_role == "user"){
	include ("user_profile.php");
}else{
	include ("admin_profile.php");
}

include("../includes/footer.php");
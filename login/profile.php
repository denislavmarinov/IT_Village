<?php 
$link = "../img/logo_1.jpg";
$title = "Proflie";
include("../includes/header.php");
include("../includes/db_connect.php");

//include ("../includes/header.php");
$account = "admin";

if($account == "user"){
	include ("user_profile.php");
}else{
	include ("admin_profile.php");
}

include("../includes/footer.php");
<?php 
include("../includes/header.php");
include("../includes/db_connect.php");

//include ("../includes/header.php");
$account = "user";

if($account == "user"){
	include ("user_profile.php");
}else{
	include ("admin_profile.php");
}

include("../includes/footer.php");
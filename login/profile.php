<?php 
//include ("../includes/header.php");
$account = "user";

if($account == "user"){
	include ("user_profile.php");
}else{
	include ("admin_profile.php");
}

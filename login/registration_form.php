<?php
$link = "../img/logo_1.jpg";
$title = "Register";
$error = "";
include '../includes/db_connect.php';
include '../includes/header.php';
?><!-- Registration form -->
<div class="container">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark" id="nav">
	<a class="navbar-brand" href="../index.php">
    <img id="img" src="../img/logo_1.jpg" alt="logo" style="width: 150px;">
  <p>Home</p></a>
  <h4 class="text-warning">Cre@te an @ccount in IT Vill@ge</h4>
    <form action="#" method="Post">
    <div class="form-group">
      <label class="text-warning" for="name">IT Village user*:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter IT Village user" name="name">
    </div>
    <div class="form-group">
      <label class="text-warning" for="email">Email*:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label class="text-warning" for="pwd">Password*:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
    <div class="form-group">
      <label class="text-warning" for="rep_pwd">Repeat password*:</label>
      <input type="password" class="form-control" id="rep_pwd" placeholder="Enter password" name="rep_pswd">
    </div>
   <input type="submit" name="submit" class="btn btn-primary" id="registration_form" value="Create account">
   </form>
</nav><?php
if( isset($_POST ['submit'])){
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && is_string($_POST['name']) && isset($_POST['pswd']) && isset($_POST['rep_pswd'])) {
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
      if($_POST['pswd'] == $_POST['rep_pswd']){
        $password = filter_var($_POST['pswd'], FILTER_SANITIZE_STRING);
      }
      else {
        $error = "Password not match";
      }
$query = "INSERT INTO `users`(`username`, `email`, `role_id`, `date_registered`) VALUES ('".mysqli_real_escape_string($conn, $name)."', '".mysqli_real_escape_string($conn, $email)."', 2, NOW())";

$result = mysqli_query($conn, $query);
$query = "SELECT user_id FROM users WHERE username = '".mysqli_real_escape_string($conn, $name)."'LIMIT 1";
$result = mysqli_query($conn, $query);
$user_id_arr = mysqli_fetch_assoc($result);
$user_id = $user_id_arr['user_id'];
$password_secure = mysqli_real_escape_string($conn, $password);
$password_hashed = md5($password_secure);
$password_query = "INSERT INTO `passwords`(`user_id`, `password`) VALUES ('".$user_id."','". $password_hashed ."')"; 
$password_result = mysqli_query($conn, $password_query);
header("Location: login.php");

  } else {
    $error = "Please fill all fields";
  }
}
?>
<div class="text-warning"><p class="error"><?=$error?></p></div>
</div>
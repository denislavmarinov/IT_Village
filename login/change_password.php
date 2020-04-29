<?php
$error = "";
include '../includes/db_connect.php';
include '../includes/header.php';

if ($_SESSION['loggedin'] != true) {
  header("Location: login.php");
}
?>
<!-- Change password -->

<div class="container">
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark" id="nav">
	<a class="navbar-brand" href="profile.php">
    <img id="img" src="../img/picture_background.jpg" alt="Go back to your profile" style="width: 350px;"></a>
<div class="container">
	<h4 class="text-warning">Ch@nge p@ssword</h4>
<form action="#" method="Post">
	<div class="form-group">
		<label class="text-warning" for="email">* Em@il:</label>
		<input class="form-control" type="email" id="email" name="email" placeholder="Your em@il" >
    </div>
    <div class="form-group">
      	<label class="text-warning" for="pwd">* Password:</label>
      <input class="form-control" type="password" id="pwd" name="pwd" placeholder="Your password">
    </div>
   <div class="form-group">
        <label class="text-warning" for="new_pwd">* New password:</label>
          <input class="form-control" type="password" id="new_pwd" name="new_pwd" placeholder="Your new password">
    <div class="form-group">
        <label class="text-warning" for="rep_new_pwd">* Repeat password:</label>
          <input type="password" class="form-control" id="rep_new_pwd" name="rep_new_pwd" placeholder="Repeat your new password">
    </div>
</div>
   		<input class="btn btn-primary" type="submit" name="submit" id="change_password" value="Change password">
   </form>
</div>
</nav>

<?php
if( isset($_POST['submit'])){
  if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && isset($_POST['pwd']) && isset($_POST['new_pwd']) && isset($_POST['rep_new_pwd'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $old_password = filter_var($_POST['pwd'], FILTER_SANITIZE_STRING);
    $new_password = filter_var($_POST['new_pwd'], FILTER_SANITIZE_STRING);
    $rep_new_password = filter_var($_POST['rep_new_pwd'], FILTER_SANITIZE_STRING);
  } 
  else{
    $error = "Please fill all fields";
  }
$read_query = "SELECT password FROM passwords WHERE user_id = '".$_SESSION['user_id']."' LIMIT 1 ";
  $result = mysqli_query($conn, $read_query);

$db_password_arr = mysqli_fetch_assoc($result);
$db_password = $db_password_arr['password'];

/*var_dump($db_password);*/

if($db_password != md5($old_password)) {
  $error = "Password does not match!";
}
if($new_password == $rep_new_password) {
  $db_password_new = md5($new_password);
} else {
  $error = "New password does not match!";
}
$update = "UPDATE `passwords` SET `password`='".$db_password_new."' WHERE user_id = '".$_SESSION['user_id']."'";
$result_update = mysqli_query($conn, $update);
if($result_update) {
  header("Location: profile.php");
}
}
include '../includes/footer.php';

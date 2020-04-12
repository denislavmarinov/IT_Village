<?php
include '../includes/db_connect.php';
include '../includes/header.php';
?>
<!-- <?php
session_start();
?> -->

<!-- <?php
$loggedin = NULL;
if(!empty($_POST['name']) && !empty($_POST['value'])){
  $_SESSION['name'] = NULL;
  $_SESSION['value'] = NULL;
  $_SESSION['name'] = $_POST['name'];
  $_SESSION['value'] = $_POST['value'];
  $loggedin = TRUE;
  $_SESSION['loggedin'] = $loggedin;
  header("Location: game.php");
}
else{
  echo "Моля, въведете името си и налична сума";
}
?>

 <!-- Brand/logo -->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
 <a class="navbar-brand" href="../index.php">
    <img src="../img/logo.jpg" alt="logo" style="width:40px;">
  </a>

<h4 class="text-warning">JOIN to Game</h4>

<form class="form-inline">
  <div class="form-group">
      <label class="sr-only" for="exampleInputEmail3">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
  </div>
  <div class="form-group">
      <label class="sr-only" for="exampleInputPassword3">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
    </div>
  <div class="checkbox">
    <label>
      <input type="checkbox">Remember me
    </label>
  </div>
    <button type="submit" class="btn btn-secondary">Sign in</button>
</form>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<?php
include 'includes/header.php';
/*include '../registration_form.php';*/
?>
<div class="jumbotron text-center">
  <h1><strong>Welcome</strong></h1>
  <img src="img/logo.jpg" alt="logo" style="width:100px;">
  <p>Любимата бордова игра за програмисти</p>
  <a class="btn btn-success" href="login/login.php">Login</a>
  <a class="btn btn-success" href="login/registration_form.php">Регистрирай се</a>
</div>

<br>
<div class="row">
<div class="col-md-4 col-md-4 col-md-4">
<div class="container">
Всяка петък вечер група от супер-cool програмисти се събират за да играят любимата си бордова игра - "IT Village". Те толкова са уморени от кодиране през седмицата, че непрекъснато забравят правилата на програмата. Също така им е много трудно да работят с хартия и да хвърлят зарчета и взимат едно много важно решение - играта трябва да бъда развита и превърнта в компютърна игра. Всеизвестен факт е, че програмиститите са мързеливи хора. Започнали да програмират новата игра, но спряли. Задачата е:
Да се създаде уеб-приложение "IT-Village", в което играят само регистрирани потребители, след вход с проверка на потребителско име и парола.
Има дъска за игра 4х4. Играта се развива само върху първата и последната колона и първия и последен ред на дъската. Всички останали полета са празни и не може да играете върху тях. 
Играта се стартира от входната позиция или от едно, от полетата за игра и хвърляте зарчето. Ходовете се изпъляват по посока на часовниковата стрелка.
</div>
</div>
<div class="col-xs-6 col-md-4"> </div>
</div>
<div class="row">
  <div class="col-xs-6 col-sm-4"></div>
  <div class="col-xs-6 col-sm-4"></div>
  <!-- Optional: clear the XS cols if their content doesn't match in height -->
  <div class="clearfix visible-xs-block"></div>
  <div class="col-xs-6 col-sm-4"></div>
</div>

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> -->
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

 <!--  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="game.php">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div> -->
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>


  <!-- <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Dropdown
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>
</div> -->


  <!-- Single button -->



<!-- <button type="button" class="btn btn-primary">Primary</button>
<button type="button" class="btn btn-secondary">Secondary</button>
<button type="button" class="btn btn-success">Success</button>
<button type="button" class="btn btn-danger">Danger</button>
<button type="button" class="btn btn-warning">Warning</button>
<button type="button" class="btn btn-info">Info</button>
<button type="button" class="btn btn-light">Light</button>
<button type="button" class="btn btn-dark">Dark</button>	 -->

<?php
include 'includes/footer.php';
?>

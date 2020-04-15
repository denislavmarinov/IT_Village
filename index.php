<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<<main>
<div class="container">
   <img src="img/picture_backgraund.jpg" class="rounded-circle" alt="backgraund" style="width:700px;> 
</div>
</main>
<?php
include 'includes/header.php';
/*include '../registration_form.php';*/
?>

<div>
  <a class="btn btn-danger" href="login/login.php">Login</a>
  <a class="btn btn-primary" href="login/registration_form.php">Регистрирай се</a>
</div>
<div class="container p-3 my-3 bg-dark text-white" class="col-sm-4">
 <div class="container">
  <h3><strong>Добре дошли в любимата бордова игра за програмисти</strong></h3>
  
  <div class="row">
      <div style="column-count: 3;">
      <p>Всяка петък вечер група от супер-cool програмисти се събират за да играят любимата си бордова игра - "IT Village". Те толкова са уморени от кодиране през седмицата, че непрекъснато забравят правилата на програмата. Също така им е много трудно да работят с хартия и да хвърлят зарчета и взимат едно много важно решение - играта трябва да бъда развита и превърнта в компютърна игра.
      Всеизвестен факт е, че програмиститите са мързеливи хора. Започнали да програмират новата игра, но спряли. Задачата е:
      Да се създаде уеб-приложение "IT-Village", в което играят само регистрирани потребители, след вход с проверка на потребителско име и парола. Има дъска за игра 4х4. Играта се развива само върху първата и последната колона и първия и последен ред на дъската. Всички останали полета са празни и не може да играете върху тях.         Играта се стартира от входната позиция или от едно, от полетата за игра и хвърляте зарчето. Ходовете се изпъляват по посока на часовниковата стрелка.</p>
  </div>
</div>
  </div>
</div>
  

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

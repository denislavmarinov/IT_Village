<?php
    include 'includes/header.php';
?>
    <main class="container">
      <div class="relative">
          <a class="btn btn-danger" id="login" href="login/login.php">Login</a>
          <a class="btn btn-primary" id="registration_form" href="login/registration_form.php">Registration</a>
      </div>
   
        <section id="index_content" class="p-3 my-3 bg-dark text-white">
            <h3><strong>Добре дошли в <span class="span">любимата</span>  бордова игра за програмисти</strong></h3>
            <div style="column-count: 1;">
            <img style="width:52%;" src="img/picture_background.jpg" class="img-responsive rounded-circle" id="img_first_page" alt="background" id="img"> 
                <p>Всяка петък вечер група от супер-cool програмисти се събират за да играят любимата си бордова игра - &bdquo;IT Village&rdquo;. Те толкова са уморени от кодиране през седмицата, че непрекъснато забравят правилата на програмата. Също така им е много трудно да работят с хартия и да хвърлят зарчета и взимат едно много важно решение - играта трябва да бъда развита и превърната в компютърна игра.
                Всеизвестен факт е, че програмиститите са мързеливи хора. Започнали да програмират новата игра, но спряли.</p> 
                <p><b>Задачата е:</b></p>
                <p>Да се създаде уеб-приложение &bdquo;IT-Village&rdquo;, в което играят само регистрирани потребители, след вход с проверка на потребителско име и парола. Има дъска за игра 4х4. Играта се развива само върху първата и последната колона и първия и последен ред на дъската. Всички останали полета са празни и не може да се играе върху тях.         
                Играта се стартира от входната позиция или от едно, от полетата за игра и хвърляте зарчето. Ходовете се изпъляват по посока на часовниковата стрелка.</p>
          </div>
        </section>
    </main>
<?php
include 'includes/footer.php';
?>

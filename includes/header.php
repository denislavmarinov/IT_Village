<?php 
session_name('IT_Village');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>IT Village</title>
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Любимата бордова игра за програмисти">
    <meta name="keywords" content="игра, бордова игра, програмист, занимателна игра">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
  <!-- Font Awesome 5 -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" type="text/css" href="../style/inner_style.css">
      <style>
        body {
          margin: 10px;
          background: #7112DB;
          background-image: linear-gradient(-60deg, #983DDF, #7112DB, #340F70);
        }
        h3 {
          font-family: Monospac821 BT;
          color: #340F70; 
          text-shadow: 2px 1px 1px #FFFFFF;
        }
        h4 {
          font-family: Monospac821 BT;
         }
        p {
          font-family: Helvetica;
          text-indent: 50px;
        }
        #login {
          background: #983DDF;
        }       

        #registration_form {
          background: #340F70;
        }
        #nav {
          background: linear-gradient(65deg, #983DDF, #7112DB, #340F70);
          border: solid 1px #FFFFFF;
        }
        #img {
          border: solid 1px #FFFFFF;
        } 
        #index_content{
            font-family: 'Sofia';
            background: linear-gradient(65deg, #983DDF, #7112DB, #340F70);
          border: solid 1px #FFFFFF;
        }
        #img_first_page{
            border: solid 1px #FFFFFF;
            float: right; 
        }
        img:hover {
            transform: scaleX(-1);
        }
        .span {
            writing-mode: vertical-rl;
        }
        .relative {
            position: relative;
            left: 200px;
        }
        .error {
          text-align: center; font-size: 100% ;
        }    
</style>
</head>
<body>

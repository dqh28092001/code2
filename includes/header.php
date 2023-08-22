<?php 
    $page_title = "Home Page"; 

    if(isset($_POST['search_btn'])){

       $srh = $_POST['search_data']; 

      }

?>

<!DOCTYPE html>
<html lang="en">
  <head>

  <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Css Styles -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/style.css" type="text/css">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="../../css/form.css">
    <link rel="stylesheet" type="text/css" href="../../css/custom.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <!-- Alertify JS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark shadow">
    <div class="container">
      <a class="navbar-brand" href="/PHP-2/index.php">DVT</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <form action="./index.php?search" method="POST" class="d-flex ms-auto">
          <input class="form-control me-2" name="search_data" style="margin: 0 auto; width: 250px;" type="text" placeholder="Search" >
          <input class="btn btn-outline-light" name="search_btn" type="submit" value="Search"></input>
        </form>
        <ul class="navbar-nav ms-5">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/PHP-2/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/PHP-2/view/categories.php">Collections</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/PHP-2/view/cart.php">Cart</a>
          </li>

          <?php
          if(!isset($_SESSION['auth']))
            { 
              ?>
              <li class="nav-item">
                <a class="nav-link" href="/PHP-2/view/register.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/PHP-2/view/login.php">Login</a>
              </li>
          <?php 
            }else{
          ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['auth_user']['name']; ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Tài khoản</a></li>
              <li><a class="dropdown-item" href="#">Thông tin</a></li>
              <li><a class="dropdown-item" href="/PHP-2/functions/logout.php">Đăng xuất</a></li>
            </ul>
          </li>
          <?php 
            } 
          ?>

        </ul>
      </div>
    </div>
  </nav>


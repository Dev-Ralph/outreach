<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/login.php';
session_start();
if(isset($_GET['login'])){
  $edit = new login($_GET['username'],$_GET['password']);
  $edit->login();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="vendor/css/bootstrap.css">
  <link rel="stylesheet" href="resource/css/login.css">
  <link href="vendor/fonts/css/fontawesome.css" rel="stylesheet">
  <link href="vendor/fonts/css/brands.css" rel="stylesheet">
  <link href="vendor/fonts/css/solid.css" rel="stylesheet">
</head>
<style media="screen">
body{
background-image: url("resource/img/bg.png");
height: 100vh;
background-size: cover;
background-position: center;
background-attachment: fixed;
}
</style>
<body>
  <nav class="navbar navbar-expand-sm navbar-light bg-white">
    <div class="container-fluid justify-content-center">
        <a class="navbar-brand ml-1" href="homepage.php"><IMG SRC="resource/img/transparent.png" ALT="Logo" WIDTH=250 HEIGHT=80></a>
        </div>
      </nav>
  <div class="container-fluid justify-content-center">
      <div class="col" >
          <div class="d-flex justify-content-center h-100">
            <div class="user_card">
              <div class="d-flex justify-content-center">
                <div class="brand_logo_container" style="margin-top:30px;">
                  <img src="resource/img/logotrans3.png" class="brand_logo" alt="Logo">
                </div>
              </div>
              <div class="d-flex justify-content-center form_container">
                <form method="GET" action="">
                  <div class="input-group mb-3">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="username" class="form-control input_user" value="" placeholder="Username" required autofocus="username" autocomplete="off">
                  </div>
                  <div class="input-group mb-2">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" name="password" class="form-control input_pass" value="" placeholder="Password" required autocomplete="off">
                  </div>
              </div>
              <div class="d-flex justify-content-center mt-3 login_container">
                <button type="submit" name="login" class="btn login_btn">Login</button>
              </div>
            </form>
            </div>
          </div>
      </div>
    </div>
  </div>
  <!-- <footer class="footer bg-dark " style="height:45px">
      <div class="container">
        <div class="d-flex justify-content-center" style="padding-top:13px;">
          <span class="text-light">CEU MALOLOS 2019 - 2020</span>
        </div>
        </div>
    </footer> -->
</body>
</html>
  <script src="vendor/js/jquery.min.js"></script>
  <script src="vendor/js/popper.min.js"></script>
  <script src="vendor/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js" integrity="sha256-jGAkJO3hvqIDc4nIY1sfh/FPbV+UK+1N+xJJg6zzr7A=" crossorigin="anonymous"></script>
  <script src="vendor/js/main.js"></script>

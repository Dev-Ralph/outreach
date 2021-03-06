<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="vendor/css/bootstrap.css">
  <link rel="stylesheet" href="resource/css/login.css">
  <link rel="stylesheet" href="resource/css/style.css">
  <link href="vendor/fonts/css/fontawesome.css" rel="stylesheet">
  <link href="vendor/fonts/css/brands.css" rel="stylesheet">
  <link href="vendor/fonts/css/solid.css" rel="stylesheet">
  <link rel="stylesheet" href="resource/css/animate.min.css">
  <link rel="icon" href="resource/img/icon-tabs.png">
</head>


<style media="screen">
body{
height: 100vh;
background-image: url("resource/img/bg.png");
background-size: cover;
background-position: center;
background-attachment: fixed;
}
    /* ZOOM IN */
@media only screen and (max-width: 1200px) {
  body {
    height: 100vh;
    background-image: url("resource/img/mobile.png");
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    }
  }
/* ZOOM OUT */
@media only screen and (min-width: 1800px) {
  body {
    height: 100vh;
    background-image: url("resource/img/mobile.png");
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    }
  }
</style>

<body>
  <nav class="navbar navbar-expand-sm navbar-light bg-white">
    <div class="container-fluid justify-content-center">
        <a class="navbar-brand ml-1" href="participant.php"><IMG SRC="resource/img/transparent.png" ALT=" " WIDTH=250 HEIGHT=80></a>
        </div>
      </nav>
  <div class="container-fluid justify-content-center">
      <div class="col" >
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/login.php';
        session_start();
        if(isset($_GET['login'])){
          $edit = new login($_GET['username'],$_GET['password']);
          $edit->login();
        }
        ?>
        <?php
        $username_retrieve = $_GET['username_retrieve'];
        if (isset($_GET['retrieve'])) {
          header('location: index.php?username_retrieve='.$username_retrieve.'');
        }
         ?>
         <?php
         $username_retrieve = $_GET['username_retrieve'];
         if (!empty($_GET['username_retrieve'])) {
          header('location: send_mail.php?username_retrieve='.$username_retrieve.'');
        }
          ?>
        <?php
        $sent = $_GET['sent'];
        if ($sent == "true") {
          ?>
          <div class="container">
          <div class="alert alert-success alert-dismissible fade show mt-3 mb-0 animated zoomIn" role="alert">
          Account details has been sent to your email.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      <?php
        }
         ?>
          <div class="d-flex justify-content-center h-100 mb-5">
            <div class="user_card animated zoomIn">
              <div class="d-flex justify-content-center">
                <div class="brand_logo_container mt-5">
                  <img src="resource/img/logo1 .png" class="brand_logo" alt="Logo">
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
              <div class="row">
              <div class="d-flex justify-content-center mt-3 login_container col-md-12">
                <button type="submit" name="login" class="btn login_btn">Login</button>
              </div>
            </div>
            <a class="text-center pt-3" href="" data-toggle="modal" data-target="#exampleModal">
                  Forgot Password?
            </a>
            </form>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Retrieve Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" method="GET">
          <div class="input-group mb-3">
            <div class="input-group-append">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="username_retrieve" class="form-control input_user" value="" placeholder="Username" required autofocus="username" autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-secondary" name="retrieve">Retrieve</button>
          <!-- <?php
          $username_retrieve = $_GET['username_retrieve'];
          echo '<a class="btn btn-primary" href="send_mail.php?username_retrieve='.$username_retrieve.'">Retrieve</a>';
           ?> -->
         </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
    <footer>
      <div class="container mb-5">
        <div class="row">
          <div class="footer-copyright text-center py-2 text-white fixed-bottom fade animated fadeInUp" style="background-color: #d75093;">
            <div class="col-md-6 float-left text-left mt-3">© Copyright 2019. Centro Escolar University Malolos. All Rights Reserved</div>
            <div class="col-md-6 float-right text-right">Ralph Edwin E. Lopez, Kenneth R. Sillo, Johnroy V. Policarpio
            <div class="col-md-12 float-right text-right mr-2">Keith B. Godoy, Robin G. Santos, Vincent Redell A. Suñga</div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  <!-- Footer -->

</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="vendor/js/jquery.min.js"></script>
  <script src="vendor/js/popper.min.js"></script>
  <script src="vendor/js/bootstrap.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js" integrity="sha256-jGAkJO3hvqIDc4nIY1sfh/FPbV+UK+1N+xJJg6zzr7A=" crossorigin="anonymous"></script> -->
  <script src="vendor/js/main.js"></script>
  <script type="text/javascript">
  $('#myModal').on('shown.bs.modal', function () {
$('#myInput').trigger('focus')
})
  </script>

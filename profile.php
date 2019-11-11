<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <link href="vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="resource/css/edit.css" rel="stylesheet">
    <link rel="stylesheet" href="resource/css/animate.min.css">
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
  <body >
    <nav class="navbar navbar-expand-sm navbar-light bg-white">
      <div class="container-fluid">
          <a class="navbar-brand" href="participant.php"><IMG SRC="resource/img/logo.png" ALT="Logo" WIDTH=250 HEIGHT=80></a>
          <button class="navbar-toggler bg-white" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <form action="" method="GET" class="form-inline my-2 my-lg-0">
                  <li class="nav-item"><a class="nav-link text-dark mr-3" style="margin-top:15px;" href="participant.php">Go back</a></li>
                </form>
              </ul>
            </div>
          </div>
        </nav>
      <div class="container-fluid mt-4 ">
        <form action="" method="POST" class="form-inline my-2 my-lg-0">
          <input class="form-control text-dark mr-3 " type="search" name="schl_numberSearch" value="" placeholder="Enter ID Number" autocomplete="off">
          <input class="btn text-white" style="background-color:#d75094;" type="submit" name="searchProfile" value="Search">
        </form>
      </div>
      <div class="container-fluid mt-4 px-0 animated fadeInUp">
        <div class="row">

        <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/searchProfile.php';
        if(isset($_POST['searchProfile'])){
          $searchProfile = new searchProfile($_POST['schl_numberSearch']);
          $searchProfile->searchProfileID();
        }
         ?>
       </div>
       </div>
  </body>

  <!-- Footer -->
  <footer>
    <div class="container row mb-5" >
      <div class="mt-2">
        <div class="mb-4">
          <div class="footer-copyright text-center py-3 text-white fixed-bottom"  style="background-color: #d75093;">© Copyright 2019. Centro Escolar University Malolos. All Rights Reserved</div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="vendor/js/bootstrap.min.js"></script>
</html>

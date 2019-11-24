<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity</title>
    <link href="vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="resource/css/edit.css" rel="stylesheet">
    <link href="resource/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="resource/css/animate.min.css">
    <link href="vendor/fonts/css/fontawesome.min.css" rel="stylesheet">
    <link href="vendor/fonts/css/all.css" rel="stylesheet">
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
                  <li class="nav-item"><a class="nav-link text-dark mr-3 mt-3" href="dataTable.php"><i class="fas fa-arrow-left mr-1"></i>Return</a></li>
                </form>
              </ul>
            </div>
          </div>
        </nav>
      <div class="container mt-3">
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/tableActivity.php';
        $tableActivity = new tableActivity;
        $tableActivity->tableActivityParticipant();
        ?>
      </div>
  </body>
  <!-- Footer -->
  <footer>
    <div class="container row mb-5" >
      <div class="mt-2">
        <div class="mb-4">
          <div class="footer-copyright text-center py-3 text-white fixed-bottom fade animated fadeInUp"  style="background-color: #d75093;">© Copyright 2019. Centro Escolar University Malolos. All Rights Reserved</div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="vendor/js/bootstrap.min.js"></script>
</html>
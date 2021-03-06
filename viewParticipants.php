<?php
session_start();
$username = $_SESSION['username'];
if(isset($username))
{

}else{
  header("Location: index.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participants</title>
    <link href="vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="resource/css/edit.css" rel="stylesheet">
    <link href="resource/css/style.css" rel="stylesheet">
    <link href="vendor/fonts/css/fontawesome.min.css" rel="stylesheet">
    <link href="vendor/fonts/css/all.css" rel="stylesheet">
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
      <div class="container-fluid">
          <a class="navbar-brand" href="participant.php"><IMG SRC="resource/img/logo.png" ALT="Logo" WIDTH=250 HEIGHT=80></a>
          <button class="navbar-toggler bg-white" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <form action="" method="GET" class="form-inline my-2 my-lg-0">
                  <li class="nav-item"><a class="nav-link text-dark mr-3 mt-3" <?php
                  if (!empty($_GET['pg'])) {
                    $pg = $_GET['pg'];
                  }else {
                    $pg = $_SESSION['pg'];
                  }
                   if ($pg == 'activity') {
                    ?>
                    href="activity.php"
                    <?php
                  }elseif ($pg == 'participant') {
                    ?>
                    href="participant.php"
                    <?php
                  }
                  ?>
                  ><i class="fas fa-arrow-left mr-1"></i>Return</a></li>
                </form>
              </ul>
            </div>
          </div>
        </nav>
      <div class="container-fluid mt-4 ">
        <form action="" method="GET" class="form-inline pb-4">
        <input class="form-control mr-3" style="width:55vh;" type="search" name="search" value="" placeholder="Enter keyword..." autocomplete="off">
          <br>
        <label class="ml-1 text-muted mr-2">Filter by:</label>
        <select class="form-control mr-2 text-dark browser-default custom-select" name="down" style="width:25vh;" id="select" name="criteria">
          <option value="schl_number">ID Number</option>
          <option value="p_lastname">Last Name</option>
          <option value="p_firstname">First Name</option>
          <option value="p_middlename">Middle Name</option>
          <option value="collegeDepartment">College Department</option>
        </select>

          <span class="btn btn-default mr-3" style="background-color:#d75094;">
                <i class="fas fa-search text-white"></i>
        <input type="submit" name="submit"value="Search"style="background:none;border:0;color:white;background-color:#d75094;">
          </span>

          <a class="btn text-white" style="background-color:#d75094;" <?php
           if ($pg == 'activity') {
            ?>
            href="viewParticipants.php?pg=activity"
            <?php
          }elseif ($pg == 'participant') {
            ?>
            href="viewParticipants.php?pg=participant"
            <?php
          }
          ?>>Clear</a>
          </form>
      </div>
      <div class="container animated fadeInUp">
        <div class="row">

        <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/searchProfile.php';
        if(isset($_GET['submit'])){
          $searchProfile = new searchProfile;
          $searchProfile->searchProfileID();
        }else {
          $searchProfile = new searchProfile;
          $searchProfile->viewAll();
        }
         ?>
       </div>
       </div>
  </body>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="vendor/js/bootstrap.min.js"></script>
</html>

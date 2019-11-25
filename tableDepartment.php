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
height: 100vh;
background-image: url("resource/img/bg.png");
background-size: cover;
background-position: center;
background-attachment: fixed;
}
    /* ZOOM IN */
@media only screen and (max-width: 1000px) {
  body {
    height: 100vh;
    background-image: url("resource/img/mobile.png");
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    }
  }
  @media only screen and (max-width: 1000px) {
    .navbar {
    display: none;
      }
    }
  @media only screen and (max-width: 1000px) {
    .container {
    display: none;
      }
    }
  @media only screen and (max-width: 1000px) {
    .container-fluid {
    display: none;
      }
    }
    @media only screen and (max-width: 1000px) {
      .btn {
      display: none;
        }
      }
    /* ZOOM OUT */
    @media only screen and (min-width: 2000px) {
      body {
        height: 100vh;
        background-image: url("resource/img/mobile.png");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        }
      }
      @media only screen and (min-width: 2000px) {
        .navbar {
        display: none;
          }
        }
      @media only screen and (min-width: 2000px) {
        .container {
        display: none;
          }
        }
      @media only screen and (min-width: 2000px) {
        .container-fluid {
        display: none;
          }
        }
        @media only screen and (min-width: 2000px) {
          .btn {
          display: none;
            }
          }
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
      <div class="container mt-3 animated pulse">
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/tableActivity.php';
        $tableActivity = new tableActivity;
        $tableActivity->tableCollegeParticipant();
        ?>
      </div>
  </body>
  <!-- Footer -->
  <footer>
    <div class="container-fluid mb-5" >
      <div class="row">
          <div class="footer-copyright text-center py-4 text-white fixed-bottom fade animated fadeInUp"  style="background-color: #d75093;">
          <div class="col-md-6 float-left text-left">© Copyright 2019. Centro Escolar University Malolos. All Rights Reserved</div>
          <div class="col-md-6 float-right text-right">Ralph Lopez, Kenneth Sillo, Johnroy Policarpio,Keith Godoy, Robin Santos, Vincent Sunga
          </div>
        </div>
        </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="vendor/js/bootstrap.min.js"></script>
</html>

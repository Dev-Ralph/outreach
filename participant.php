<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/delete.php';
$remove = new delete();
$remove->deleteData();
?>
<?php
session_start();
$username = $_SESSION['username'];
if(isset($username))
{

}else{
  header("Location: index.php");
}
 ?>
 <?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/logout.php';
 $log = new logout;
 $log->logoutUser();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage | Participant</title>
  <link href="vendor/css/bootstrap.min.css" rel="stylesheet">
  <link href="resource/css/style.css" rel="stylesheet">
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
<body>
        <nav class="navbar navbar-expand-sm navbar-light bg-white">
          <div class="container-fluid">
              <a class="navbar-brand" href="participant.php"><IMG SRC="resource/img/logo.png" ALT="Logo" WIDTH=250 HEIGHT=80></a>
              <button class="navbar-toggler bg-white" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto">
                    <form action="" method="GET" class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-5 mt-3 text-dark" style="width:55vh;" type="search" name="search" value="" placeholder="Enter keyword..." autocomplete="off">
                        <br>
                      <label class="ml-1 text-muted mr-1 mt-3">Filter by:</label>
                        <select class="form-control mr-2 mt-3 text-dark browser-default custom-select" name="down" style="width:20vh;" id="select">
                          <option value="title" title="Title for Item 1">Activity</option>
                          <option value="date" title="Title for Item 2">Date</option>
                          <option value="participation" title="Title for Item 3">Participation</option>
                          <option value="collegeDepartment" title="Title for Item 4">Department</option>
                          <option value="proponent" title="Title for Item 5">Proponent</option>
                        </select>
                        <span class="btn btn-default mr-3 mt-3" style="background-color:#d75094;">
                          <i class="fas fa-search text-white"></i>
                            <input type="submit" name="submit"value="Search" style="background:none;border:0;color:white;">
                        </span>
                      <li class="nav-item"><a class="nav-link text-dark mr-2 mt-3" href="add.php"><span>&#43;</span> New record</a></li>
                      <li class="nav-item"><div class="dropdown py-2">
                      <button class="btn btn-secondary dropdown-toggle text-dark mt-3" style="background-color: transparent; border: none;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Account
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#"><button class="btn text-dark" style="background-color:transparent;" name="logout"><i class="fas fa-sign-out-alt mr-1"></i>Logout</button>
                          <a class="dropdown-item" href="#"><button class="btn text-dark" style="background-color: transparent;" name="logout"><i class="fas fa-user-edit mr-1"></i>Edit Account</button>
                          <a class="dropdown-item" href=""></a>
                        </div>
                      </div></li>
                    </form>
                  </ul>
                </div>
              </div>
            </nav>
            <a type="submit" name="activity" href="activity.php" class="btn btn-default my-3 mr-3 text-light float-right" style="background-color:#d75094"><i class="fas fa-book mr-2"></i>Activity</a>
            <a type="submit" name="viewProfile" href="profile.php" class="btn btn-default my-3 mr-3 float-right text-light" style="background-color:#d75094"><i class="fas fa-user mr-2"></i>View Profile</a>
            <div class="container-fluid px-0">
            <nav class="mt-3">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-link px-3  <?php if(empty($_GET['tab'])){echo "active";}elseif($_GET['tab']=="literacy"){echo "active";}?>" id="nav-literacy-tab" data-toggle="tab" href="#nav-literacy" role="tab" aria-controls="nav-literacy" aria-selected="true">Literacy & Numeracy</a>
              <a class="nav-link px-3  <?php if(!empty($_GET['tab'])){if($_GET['tab']=="health"){echo "active";}} ?>" id="nav-health-tab" data-toggle="tab" href="#nav-health" role="tab" aria-controls="nav-health" aria-selected="false">Health & Wellness</a>
              <a class="nav-link px-3 <?php if(!empty($_GET['tab'])){if($_GET['tab']=="environment"){echo "active";}} ?>" id="nav-environment-tab" data-toggle="tab" href="#nav-environment" role="tab" aria-controls="nav-environment" aria-selected="false">Environment Care</a>
              <a class="nav-link px-3 <?php if(!empty($_GET['tab'])){if($_GET['tab']=="livelihood"){echo "active";}} ?>" id="nav-livelihood-tab" data-toggle="tab" href="#nav-livelihood" role="tab" aria-controls="nav-livelihood" aria-selected="false">Livelihood & Entrepreneurship</a>
            </div>
          </nav>

          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade animated fadeInUp <?php if(empty($_GET['tab'])){echo "active";}elseif($_GET['tab']=="literacy"){echo "active";}?>" id="nav-literacy" role="tabpanel" aria-labelledby="nav-literacy-tab">
              <?php
              require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/view.php';
              $view = new view;
              if(isset($_GET['submit'])){
              $view->viewAllCriteria();
              }else{
              $view->viewAllLiteracy();
              }
              ?>
            </div>
            <div class="tab-pane fade animated fadeInUp <?php if(!empty($_GET['tab'])){if($_GET['tab']=="health"){echo "show active";}} ?>" id="nav-health" role="tabpanel" aria-labelledby="nav-health-tab">
              <?php
              if(isset($_GET['submit'])){
              $view->viewAllCriteria();
              }else{
              $view->viewAllHealth();
              }
              ?>
            </div>
            <div class="tab-pane fade animated fadeInUp <?php if(!empty($_GET['tab'])){if($_GET['tab']=="environment"){echo "show active";}} ?>" id="nav-environment" role="tabpanel" aria-labelledby="nav-environment-tab">
              <?php
              if(isset($_GET['submit'])){
              $view->viewAllCriteria();
              }else{
              $view->viewAllEnvironment();
              }
              ?>
            </div>
            <div class="tab-pane fade animated fadeInUp <?php if(!empty($_GET['tab'])){if($_GET['tab']=="livelihood"){echo "show active";}} ?>" id="nav-livelihood" role="tabpanel" aria-labelledby="nav-livelihood-tab">
              <?php
              if(isset($_GET['submit'])){
              $view->viewAllCriteria();
              }else{
              $view->viewAllLivelihood();
              }
              ?>
            </div>
          </div>
          </div>

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
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="vendor/js/bootstrap.min.js"></script>
</html>

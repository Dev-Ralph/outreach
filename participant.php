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
  <link href="resource/css/edit.css" rel="stylesheet">
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
              <a class="navbar-brand" href=""><IMG SRC="resource/img/logo.png" ALT="Logo" WIDTH=250 HEIGHT=80></a>
              <button class="navbar-toggler bg-white" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto">
                    <form action="" method="GET" class="form-inline my-2 my-lg-0">
                      <li class="nav-item"><a class="nav-link text-dark mr-2 mt-3" href="dataTableParticipant.php"><span style="color:#d75093"><i class="fas fa-chart-bar" ></i> Analytics</span></a></li>
                      <li class="nav-item"><a class="nav-link text-dark mr-2 mt-3" href="viewParticipants.php?pg=participant"><span style="color:#d75093"><i class="fas fa-user-friends"></i> View Participants</span></a></li>
                      <li class="nav-item"><a class="nav-link text-dark mr-2 mt-3" href="addActivity.php?pg=participant"><span style="color:#d75093"><i class="fas fa-pen-nib"></i> Add activity</span></a></li>
                      <li class="nav-item"><a class="nav-link text-dark mr-2 mt-3" href="add.php?pg=participant"><span style="color:#d75093"><i class="fas fa-user"></i> Add participant</span></a></li>
                      <li class="nav-item"><a class="nav-link text-dark mr-2 mt-3" href="addAccount.php?pg=participant"><span style="color:#d75093"><i class="fa fa-address-book"></i>
                        Add account</span></a></li>
                      <li class="nav-item"><div class="dropdown py-2">
                      <button class="btn btn-secondary dropdown-toggle text-dark mt-3" style="background-color: transparent; border: none;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span style="color:#d75093"><i class="fa fa-cog"></i>
                            Account</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                          <?php
                          $account_id = $_SESSION['account_id'];
                          echo '<a class="dropdown-item py-2" href="editParticipantAcc.php?account_id='.$account_id.'"><span style="color:#d75093"><i class="fas fa-user-edit mr-1"></i>Edit Account</span></a>';
                          ?>
                          <a class="dropdown-item" href="#"><button class="btn text-dark" style="background-color:transparent;" name="logout"><span style="color:#d75093"><i class="fas fa-sign-out-alt mr-1"></i>Logout</span></button>
                          <a class="" href=""></a>
                        </div>
                      </div></li>
                    </form>
                  </ul>
                </div>
              </div>
            </nav>
            <div class="container-fluid">
              <div class="row">
                  <h1 class="col-md-12 text-left mt-4 mb-0 pl-4" style="color:#d75093">Participant</h1>
              </div>
            </div>
            <a type="submit" name="activity" href="activity.php" class="btn btn-default my-3 mr-3 text-light float-right" style="background-color:#d75094"><i class="fas fa-pen-nib mr-2"></i>Activity</a>
            <div class="container-fluid px-0">
            <nav class="mt-3">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-link px-5  <?php if(empty($_GET['tab'])){echo "active";}elseif($_GET['tab']=="all"){echo "active";}?>" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-all" aria-selected="true">All</a>
              <a class="nav-link px-3  <?php if(!empty($_GET['tab'])){if($_GET['tab']=="literacy"){echo "active";}} ?>" data-toggle="tab" href="#nav-literacy" role="tab" aria-controls="nav-literacy" aria-selected="true">Literacy & Numeracy</a>
              <a class="nav-link px-3  <?php if(!empty($_GET['tab'])){if($_GET['tab']=="health"){echo "active";}} ?>" id="nav-health-tab" data-toggle="tab" href="#nav-health" role="tab" aria-controls="nav-health" aria-selected="false">Health & Wellness</a>
              <a class="nav-link px-3 <?php if(!empty($_GET['tab'])){if($_GET['tab']=="environment"){echo "active";}} ?>" id="nav-environment-tab" data-toggle="tab" href="#nav-environment" role="tab" aria-controls="nav-environment" aria-selected="false">Environment Care</a>
              <a class="nav-link px-3 <?php if(!empty($_GET['tab'])){if($_GET['tab']=="livelihood"){echo "active";}} ?>" id="nav-livelihood-tab" data-toggle="tab" href="#nav-livelihood" role="tab" aria-controls="nav-livelihood" aria-selected="false">Livelihood & Entrepreneurship</a>
            </div>
          </nav>

          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade animated fadeInUp <?php if(empty($_GET['tab'])){echo "active";}elseif($_GET['tab']=="all"){echo "active";}?>" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
              <?php
              require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/view.php';
              $view = new view;
              if(isset($_GET['submit-all'])){
              $view->viewAllSearch();
              }else{
              $view->viewAll();
              }
              ?>
            </div>
            <div class="tab-pane fade animated fadeInUp <?php if(!empty($_GET['tab'])){if($_GET['tab']=="literacy"){echo "show active";}} ?>" id="nav-literacy" role="tabpanel" aria-labelledby="nav-literacy-tab">
              <?php
              if(isset($_GET['submit-literacy'])){
              $view->viewAllLiteracySearch();
              }else{
              $view->viewAllLiteracy();
              }
              ?>
            </div>
            <div class="tab-pane fade animated fadeInUp <?php if(!empty($_GET['tab'])){if($_GET['tab']=="health"){echo "show active";}} ?>" id="nav-health" role="tabpanel" aria-labelledby="nav-health-tab">
              <?php
              if(isset($_GET['submit-health'])){
              $view->viewAllHealthSearch();
              }else{
              $view->viewAllHealth();
              }
              ?>
            </div>
            <div class="tab-pane fade animated fadeInUp <?php if(!empty($_GET['tab'])){if($_GET['tab']=="environment"){echo "show active";}} ?>" id="nav-environment" role="tabpanel" aria-labelledby="nav-environment-tab">
              <?php
              if(isset($_GET['submit-environment'])){
              $view->viewAllEnvironmentSearch();
              }else{
              $view->viewAllEnvironment();
              }
              ?>
            </div>
            <div class="tab-pane fade animated fadeInUp <?php if(!empty($_GET['tab'])){if($_GET['tab']=="livelihood"){echo "show active";}} ?>" id="nav-livelihood" role="tabpanel" aria-labelledby="nav-livelihood-tab">
              <?php
              if(isset($_GET['submit-livelihood'])){
              $view->viewAllLivelihoodSearch();
              }else{
              $view->viewAllLivelihood();
              }
              ?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="vendor/js/bootstrap.min.js"></script>
<script>
     $(document).ready(function() {
      if (location.hash) {
          $("a[href='" + location.hash + "']").tab("show");
      }
      $(document.body).on("click", "a[data-toggle='tab']", function(event) {
          location.hash = this.getAttribute("href");
      });
    });
    $(window).on("popstate", function() {
      var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
      $("a[href='" + anchor + "']").tab("show");
    });
  </script>
</html>

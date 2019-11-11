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
  <title>Homepage | Activity</title>
  <link href="vendor/css/bootstrap.min.css" rel="stylesheet">
  <link href="resource/css/style.css" rel="stylesheet">
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
<body>
        <nav class="navbar navbar-expand-sm navbar-light bg-white">
          <div class="container-fluid">
              <a class="navbar-brand" href="participant.php"><IMG SRC="resource/img/logo.png" ALT="Logo" WIDTH=250 HEIGHT=80></a>
              <button class="navbar-toggler bg-white" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto">
                    <form action="" method="GET" class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-5 text-dark" style="width:55vh; margin-top:15px;" type="search" name="search" value="" placeholder="Enter keyword..." autocomplete="off">
                        <br>
                      <label class="ml-1 text-muted mr-5" style="margin-top:15px;">Filter by:</label>
                        <select class="form-control mr-2 text-dark browser-default custom-select" name="down" style="width:20vh; margin-top:15px;" id="select" name="criteria" style="width: 115px;">
                          <option value="date" title="Title for Item 1">Date</option>
                          <option value="schoolName" title="Title for Item 2">School</option>
                          <option value="facilitator" title="Title for Item 3">Facilitator</option>
                          <option value="collegeDepartment" title="Title for Item 4">Department</option>
                        </select>
                      <input class="btn text-white mr-5 mt-3" style="background-color:#d75094;" type="submit" name="submit" value="Search">
                      <li class="nav-item"><a class="nav-link text-dark mr-3" style="margin-top:15px;" href="addActivity.php">New record</a></li>
                      <li class="nav-item"><button class="btn text-dark mr-3 py-3" style="margin-top:15px; background-color: transparent;" name="logout">Logout</button></li>
                    </form>
                  </ul>
                </div>
              </div>
            </nav>
            <a type="submit" name="participant" href="participant.php" class="btn my-3 mr-3 float-right text-white" style="background-color:#d75094;">Participant</a>
            <a type="submit" name="viewGraph" href="dataTable.php" class="btn my-3 mr-3 float-right text-white" style="background-color:#d75094;">View Figures</a>
            <div class="container-fluid px-0">
            <nav class="mt-3">
            <div class="nav nav-tabs animated fadeInUp" id="nav-tab" role="tablist">
              <a class="nav-link px-3 active" style="color:#d75094;" id="nav-literacy-tab" data-toggle="tab" href="#nav-literacy" role="tab" aria-controls="nav-literacy" aria-selected="true">Literacy & Numeracy</a>
              <a class="nav-link px-3" style="color:#d75094;" id="nav-health-tab" data-toggle="tab" href="#nav-health" role="tab" aria-controls="nav-health" aria-selected="false">Health & Wellness</a>
              <a class="nav-link px-3" style="color:#d75094;" id="nav-environment-tab" data-toggle="tab" href="#nav-environment" role="tab" aria-controls="nav-environment" aria-selected="false">Environment Care</a>
              <a class="nav-link px-3" style="color:#d75094;" id="nav-livelihood-tab" data-toggle="tab" href="#nav-livelihood" role="tab" aria-controls="nav-livelihood" aria-selected="false">Livelihood & Entrepreneurship</a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane f" id="nav-literacy" role="tabpanel" aria-labelledby="nav-literacy-tab">
              <?php
              require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/viewActivity.php';
              $view = new viewActivity;
              if(isset($_GET['submit'])){
              $view->viewAllCriteria();
              }else{
              $view->viewAllLiteracy();
              }
              ?>
            </div>
            <div class="tab-pane fade animated fadeInUp" id="nav-health" role="tabpanel" aria-labelledby="nav-health-tab">
              <?php
              require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/viewActivity.php';
              $view = new viewActivity;
              if(isset($_GET['submit'])){
              $view->viewAllCriteria();
              }else{
              $view->viewAllHealth();
              }
              ?>
            </div>
            <div class="tab-pane fade animated fadeInUp" id="nav-environment" role="tabpanel" aria-labelledby="nav-environment-tab">
              <?php
              require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/viewActivity.php';
              $view = new viewActivity;
              if(isset($_GET['submit'])){
              $view->viewAllCriteria();
              }else{
              $view->viewAllEnvironment();
              }
              ?>
            </div>
            <div class="tab-pane fade animated fadeInUp" id="nav-livelihood" role="tabpanel" aria-labelledby="nav-livelihood-tab">
              <?php
              require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/viewActivity.php';
              $view = new viewActivity;
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
            <div class="container row mb-5" >
              <div class="mt-2">
                <div class="mb-4">
                  <div class="footer-copyright text-center py-3 text-white fixed-bottom"  style="background-color: #d75093;">© Copyright 2019. Centro Escolar University Malolos. All Rights Reserved</div>
                </div>
              </div>
            </div>
          </footer>
          <!-- Footer -->
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="vendor/js/bootstrap.min.js"></script>
</html>

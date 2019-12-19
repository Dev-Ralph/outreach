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
    <title>Figures | Participant</title>
    <link href="vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="resource/css/edit.css" rel="stylesheet">
    <link href="resource/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="resource/css/animate.min.css">
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
          <a class="navbar-brand" href=""><IMG SRC="resource/img/logo.png" ALT="Logo" WIDTH=250 HEIGHT=80></a>
          <button class="navbar-toggler bg-white" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <form action="" method="GET" class="form-inline my-2 my-lg-0">
                  <li class="nav-item"><a class="nav-link text-dark mr-3 mt-3" href="participant_adviser.php"><i class="fas fa-arrow-left mr-1"></i>Return</a></li>
                </form>
              </ul>
            </div>
          </div>
        </nav>
      <div class="container-fluid mt-3">
        <div class="row">
        <div class="col-3">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link <?php if(empty($_GET['pill'])){echo "active";}elseif($_GET['pill']=="literacy"){echo "active";}?>" id="v-pills-literacy-tab" data-toggle="pill" href="#v-pills-literacy" role="tab" aria-controls="v-pills-literacy" aria-selected="true">Literacy & Numeracy</a>
            <a class="nav-link <?php if(!empty($_GET['pill'])){if($_GET['pill']=="health"){echo "active";}} ?>" id="v-pills-health-tab" data-toggle="pill" href="#v-pills-health" role="tab" aria-controls="v-pills-health" aria-selected="false">Health & Wellness</a>
            <a class="nav-link <?php if(!empty($_GET['pill'])){if($_GET['pill']=="environment"){echo "active";}} ?>" id="v-pills-environment-tab" data-toggle="pill" href="#v-pills-environment" role="tab" aria-controls="v-pills-environment" aria-selected="false">Environment Care</a>
            <a class="nav-link <?php if(!empty($_GET['pill'])){if($_GET['pill']=="livelihood"){echo "active";}} ?>" id="v-pills-livelihood-tab" data-toggle="pill" href="#v-pills-livelihood" role="tab" aria-controls="v-pills-livelihood" aria-selected="false">Livelihood & Entrepreneurship</a>
          </div>
        </div>
        <div class="col-9">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show <?php if(empty($_GET['pill'])){echo "active";}elseif($_GET['pill']=="literacy"){echo "active";}?>" id="v-pills-literacy" role="tabpanel" aria-labelledby="v-pills-literacy-tab">
              <div class="container-fluid px-0">
              <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link px-3 <?php if(empty($_GET['tab'])){echo "active";}elseif($_GET['tab']=="activity"){echo "active";}?>" id="nav-proponents-tab" data-toggle="tab" href="#nav-proponents" role="tab" aria-controls="nav-proponents" aria-selected="true">Activity</a>
                <a class="nav-link px-3 <?php if(!empty($_GET['tab'])){if($_GET['tab']=="college"){echo "active";}} ?>" id="nav-college-tab" data-toggle="tab" href="#nav-college" role="tab" aria-controls="nav-college" aria-selected="false">College Department</a>
                <a class="nav-link px-3 <?php if(!empty($_GET['tab'])){if($_GET['tab']=="attendees"){echo "active";}} ?>" id="nav-attendees-tab" data-toggle="tab" href="#nav-attendees" role="tab" aria-controls="nav-attendees" aria-selected="false">Attendees</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade animated fadeInUp <?php if(!empty($_GET['tab'])){if($_GET['tab']=="attendees"){echo "show active";}} ?>" id="nav-attendees" role="tabpanel" aria-labelledby="nav-attendees-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTableParticipant_adviser.php';
                $dataTable = new dataTableParticipant;
                $dataTable->dataTableAttendeesLiteracy();
                ?>
              </div>
              <div class="tab-pane fade animated fadeInUp <?php if(!empty($_GET['tab'])){if($_GET['tab']=="college"){echo "show active";}} ?>" id="nav-college" role="tabpanel" aria-labelledby="nav-college-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTableParticipant_adviser.php';
                $dataTable = new dataTableParticipant;
                $dataTable->dataTableDepartmentLiteracy();
                ?>
              </div>
              <div class="tab-pane fade animated fadeInUp <?php if(empty($_GET['tab'])){echo "active";}elseif($_GET['tab']=="activity"){echo "active";}?>" id="nav-proponents" role="tabpanel" aria-labelledby="nav-proponents-tab">
                <?php
                if (isset($_GET['searchDate-Literacy'])) {
                  require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/filterDateParticipant_adviser.php';
                  $add = new filterDate($_GET['dateFrom'],$_GET['dateTo']);
                  $add->filterActivityLiteracy();
                }else {
                  require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTableParticipant_adviser.php';
                  $dataTable = new dataTableParticipant;
                  $dataTable->dataTableProponentLiteracy();
              }
                ?>
              </div>
            </div>
            </div>
            </div>
            <div class="tab-pane fade animated fadeInUp <?php if(!empty($_GET['pill'])){if($_GET['pill']=="health"){echo "active";}} ?>" id="v-pills-health" role="tabpanel" aria-labelledby="v-pills-health-tab">
              <div class="container-fluid px-0">
              <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link px-3 <?php if(empty($_GET['tab'])){echo "active";}elseif($_GET['tab']=="activity"){echo "active";}?>" id="nav-proponents1-tab" data-toggle="tab" href="#nav-proponents1" role="tab" aria-controls="nav-proponents1" aria-selected="false">Activity</a>
                <a class="nav-link px-3 <?php if(!empty($_GET['tab'])){if($_GET['tab']=="college"){echo "show active";}} ?>" id="nav-college1-tab" data-toggle="tab" href="#nav-college1" role="tab" aria-controls="nav-college1" aria-selected="false">College Department</a>
                <a class="nav-link px-3 <?php if(!empty($_GET['tab'])){if($_GET['tab']=="all"){echo "show active";}} ?>" id="nav-attendees1-tab" data-toggle="tab" href="#nav-attendees1" role="tab" aria-controls="nav-attendees1" aria-selected="true">Attendees</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade animated fadeInUp <?php if(!empty($_GET['tab'])){if($_GET['tab']=="attendees"){echo "show active";}} ?>" id="nav-attendees1" role="tabpanel" aria-labelledby="nav-attendees1-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTableParticipant_adviser.php';
                $dataTable = new dataTableParticipant;
                $dataTable->dataTableAttendeesHealth();
                ?>
              </div>
              <div class="tab-pane fade animated fadeInUp <?php if(!empty($_GET['tab'])){if($_GET['tab']=="college"){echo "show active";}} ?>" id="nav-college1" role="tabpanel" aria-labelledby="nav-college1-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTableParticipant_adviser.php';
                $dataTable = new dataTableParticipant;
                $dataTable->dataTableDepartmentHealth();
                ?>
              </div>
              <div class="tab-pane fade animated fadeInUp <?php if(empty($_GET['tab'])){echo "active";}elseif($_GET['tab']=="activity"){echo "active";}?>" id="nav-proponents1" role="tabpanel" aria-labelledby="nav-proponents1-tab">
                <?php
                if (isset($_GET['searchDate-Health'])) {
                  require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/filterDateParticipant_adviser.php';
                  $add = new filterDate($_GET['dateFrom'],$_GET['dateTo']);
                  $add->filterActivityHealth();
                }else {
                  require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTableParticipant_adviser.php';
                  $dataTable = new dataTableParticipant;
                  $dataTable->dataTableProponentHealth();
              }
                ?>
              </div>
            </div>
            </div>
            </div>
            <div class="tab-pane fade animated fadeInUp <?php if(!empty($_GET['pill'])){if($_GET['pill']=="environment"){echo "active";}} ?>" id="v-pills-environment" role="tabpanel" aria-labelledby="v-pills-environment-tab">
              <div class="container-fluid px-0">
              <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link px-3 <?php if(empty($_GET['tab'])){echo "active";}elseif($_GET['tab']=="activity"){echo "active";}?>" id="nav-proponents2-tab" data-toggle="tab" href="#nav-proponents2" role="tab" aria-controls="nav-proponents2" aria-selected="false">Activity</a>
                <a class="nav-link px-3 <?php if(!empty($_GET['tab'])){if($_GET['tab']=="college"){echo "show active";}} ?>" id="nav-college2-tab" data-toggle="tab" href="#nav-college2" role="tab" aria-controls="nav-college2" aria-selected="false">College Department</a>
                <a class="nav-link px-3 <?php if(!empty($_GET['tab'])){if($_GET['tab']=="attendees"){echo "show active";}} ?>" id="nav-attendees2-tab" data-toggle="tab" href="#nav-attendees2" role="tab" aria-controls="nav-attendees2" aria-selected="true">Attendees</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade animated fadeInUp <?php if(!empty($_GET['tab'])){if($_GET['tab']=="attendees"){echo "show active";}} ?>" id="nav-attendees2" role="tabpanel" aria-labelledby="nav-attendees2-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTableParticipant_adviser.php';
                $dataTable = new dataTableParticipant;
                $dataTable->dataTableAttendeesEnvironment();
                ?>
              </div>
              <div class="tab-pane fade animated fadeInUp <?php if(!empty($_GET['tab'])){if($_GET['tab']=="college"){echo "show active";}} ?>" id="nav-college2" role="tabpanel" aria-labelledby="nav-college2-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTableParticipant_adviser.php';
                $dataTable = new dataTableParticipant;
                $dataTable->dataTableDepartmentEnvironment();
                ?>
              </div>
              <div class="tab-pane fade  animated fadeInUp <?php if(empty($_GET['tab'])){echo "active";}elseif($_GET['tab']=="activity"){echo "active";}?>" id="nav-proponents2" role="tabpanel" aria-labelledby="nav-proponents2-tab">
                <?php
                if (isset($_GET['searchDate-Environment'])) {
                  require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/filterDateParticipant_adviser.php';
                  $add = new filterDate($_GET['dateFrom'],$_GET['dateTo']);
                  $add->filterActivityEnvironment();
                }else {
                  require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTableParticipant_adviser.php';
                  $dataTable = new dataTableParticipant;
                  $dataTable->dataTableProponentEnvironment();
              }
                ?>
              </div>
            </div>
            </div>
            </div>
            <div class="tab-pane fade animated fadeInUp <?php if(!empty($_GET['pill'])){if($_GET['pill']=="livelihood"){echo "active";}} ?>" id="v-pills-livelihood" role="tabpanel" aria-labelledby="v-pills-livelihood-tab">
              <div class="container-fluid px-0">
              <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link px-3 <?php if(empty($_GET['tab'])){echo "active";}elseif($_GET['tab']=="activity"){echo "active";}?>" id="nav-proponents3-tab" data-toggle="tab" href="#nav-proponents3" role="tab" aria-controls="nav-proponents3" aria-selected="false">Activity</a>
                <a class="nav-link px-3 <?php if(!empty($_GET['tab'])){if($_GET['tab']=="college"){echo "show active";}} ?>" id="nav-college3-tab" data-toggle="tab" href="#nav-college3" role="tab" aria-controls="nav-college3" aria-selected="false">College Department</a>
                <a class="nav-link px-3 <?php if(!empty($_GET['tab'])){if($_GET['tab']=="attendees"){echo "show active";}} ?>" id="nav-attendees3-tab" data-toggle="tab" href="#nav-attendees3" role="tab" aria-controls="nav-attendees3" aria-selected="true">Attendees</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade animated fadeInUp <?php if(!empty($_GET['tab'])){if($_GET['tab']=="attendees"){echo "show active";}} ?>" id="nav-attendees3" role="tabpanel" aria-labelledby="nav-attendees3-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTableParticipant_adviser.php';
                $dataTable = new dataTableParticipant;
                $dataTable->dataTableAttendeesLivelihood();
                ?>
              </div>
              <div class="tab-pane fade animated fadeInUp <?php if(!empty($_GET['tab'])){if($_GET['tab']=="college"){echo "show active";}} ?>" id="nav-college3" role="tabpanel" aria-labelledby="nav-college3-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTableParticipant_adviser.php';
                $dataTable = new dataTableParticipant;
                $dataTable->dataTableDepartmentLivelihood();
                ?>
              </div>
              <div class="tab-pane fade animated fadeInUp <?php if(empty($_GET['tab'])){echo "active";}elseif($_GET['tab']=="activity"){echo "active";}?>" id="nav-proponents3" role="tabpanel" aria-labelledby="nav-proponents3-tab">
                <?php
                if (isset($_GET['searchDate-Livelihood'])) {
                  require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/filterDateParticipant_adviser.php';
                  $add = new filterDate($_GET['dateFrom'],$_GET['dateTo']);
                  $add->filterActivityLivelihood();
                }else {
                  require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTableParticipant_adviser.php';
                  $dataTable = new dataTableParticipant;
                  $dataTable->dataTableProponentLivelihood();
              }
                ?>
              </div>
            </div>
            </div>
            </div>
          </div>
        </div>
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
<script>
     $(document).ready(function() {
      if (location.hash) {
          $("a[href='" + location.hash + "']").tab("show");
      }
      $(document.body).on("click", "a[data-toggle='pill']", function(event) {
          location.hash = this.getAttribute("href");
      });
    });
    $(window).on("popstate", function() {
      var anchor = location.hash || $("a[data-toggle='pill']").first().attr("href");
      $("a[href='" + anchor + "']").tab("show");
    });
  </script>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <link href="vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="resource/css/edit.css" rel="stylesheet">
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
          <a class="navbar-brand" href="homepage.php"><IMG SRC="resource/img/logo.png" ALT="Logo" WIDTH=250 HEIGHT=80></a>
          <button class="navbar-toggler bg-white" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <form action="" method="GET" class="form-inline my-2 my-lg-0">
                  <li class="nav-item"><a class="nav-link text-dark mr-3" style="margin-top:15px;" href="activity.php">Go back</a></li>
                </form>
              </ul>
            </div>
          </div>
        </nav>
      <div class="container-fluid mt-3">
        <div class="row">
        <div class="col-3">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" style="color:#d75094;" id="v-pills-literacy-tab" data-toggle="pill" href="#v-pills-literacy" role="tab" aria-controls="v-pills-literacy" aria-selected="true">Literacy & Numeracy</a>
            <a class="nav-link" style="color:#d75094;" id="v-pills-health-tab" data-toggle="pill" href="#v-pills-health" role="tab" aria-controls="v-pills-health" aria-selected="false">Health & Wellness</a>
            <a class="nav-link" style="color:#d75094;" id="v-pills-environment-tab" data-toggle="pill" href="#v-pills-environment" role="tab" aria-controls="v-pills-environment" aria-selected="false">Environment Care</a>
            <a class="nav-link" style="color:#d75094;" id="v-pills-livelihood-tab" data-toggle="pill" href="#v-pills-livelihood" role="tab" aria-controls="v-pills-livelihood" aria-selected="false">Livelihood & Entrepreneurship</a>
          </div>
        </div>
        <div class="col-9">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-literacy" role="tabpanel" aria-labelledby="v-pills-literacy-tab">
              <div class="container-fluid px-0">
              <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link px-3 active" style="color:#d75094;" id="nav-attendees-tab" data-toggle="tab" href="#nav-attendees" role="tab" aria-controls="nav-attendees" aria-selected="true">Attendees</a>
                <a class="nav-link px-3" style="color:#d75094;" id="nav-proponents-tab" data-toggle="tab" href="#nav-proponents" role="tab" aria-controls="nav-proponents" aria-selected="false">Activity</a>
                <a class="nav-link px-3" style="color:#d75094;" id="nav-college-tab" data-toggle="tab" href="#nav-college" role="tab" aria-controls="nav-college" aria-selected="false">College Department</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-attendees" role="tabpanel" aria-labelledby="nav-attendees-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTable.php';
                $dataTable = new dataTable;
                $dataTable->dataTableAttendeesLiteracy();
                ?>
              </div>
              <div class="tab-pane fade" id="nav-college" role="tabpanel" aria-labelledby="nav-college-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTable.php';
                $dataTable = new dataTable;
                $dataTable->dataTableDepartmentLiteracy();
                ?>
              </div>
              <div class="tab-pane fade" id="nav-proponents" role="tabpanel" aria-labelledby="nav-proponents-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTable.php';
                $dataTable = new dataTable;
                $dataTable->dataTableProponentLiteracy();
                ?>
              </div>
            </div>
            </div>
            </div>
            <div class="tab-pane fade" id="v-pills-health" role="tabpanel" aria-labelledby="v-pills-health-tab">
              <div class="container-fluid px-0">
              <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link px-3 active" style="color:#d75094;" id="nav-attendees1-tab" data-toggle="tab" href="#nav-attendees1" role="tab" aria-controls="nav-attendees1" aria-selected="true">Attendees</a>
                <a class="nav-link px-3" style="color:#d75094;" id="nav-proponents1-tab" data-toggle="tab" href="#nav-proponents1" role="tab" aria-controls="nav-proponents1" aria-selected="false">Activity</a>
                <a class="nav-link px-3" style="color:#d75094;" id="nav-college1-tab" data-toggle="tab" href="#nav-college1" role="tab" aria-controls="nav-college1" aria-selected="false">College Department</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-attendees1" role="tabpanel" aria-labelledby="nav-attendees1-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTable.php';
                $dataTable = new dataTable;
                $dataTable->dataTableAttendeesHealth();
                ?>
              </div>
              <div class="tab-pane fade" id="nav-college1" role="tabpanel" aria-labelledby="nav-college1-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTable.php';
                $dataTable = new dataTable;
                $dataTable->dataTableDepartmentHealth();
                ?>
              </div>
              <div class="tab-pane fade" id="nav-proponents1" role="tabpanel" aria-labelledby="nav-proponents1-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTable.php';
                $dataTable = new dataTable;
                $dataTable->dataTableProponentHealth();
                ?>
              </div>
            </div>
            </div>
            </div>
            <div class="tab-pane fade " id="v-pills-environment" role="tabpanel" aria-labelledby="v-pills-environment-tab">
              <div class="container-fluid px-0">
              <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link px-3 active" style="color:#d75094;" id="nav-attendees2-tab" data-toggle="tab" href="#nav-attendees2" role="tab" aria-controls="nav-attendees2" aria-selected="true">Attendees</a>
                <a class="nav-link px-3" style="color:#d75094;" id="nav-proponents2-tab" data-toggle="tab" href="#nav-proponents2" role="tab" aria-controls="nav-proponents2" aria-selected="false">Activity</a>
                <a class="nav-link px-3" style="color:#d75094;" id="nav-college2-tab" data-toggle="tab" href="#nav-college2" role="tab" aria-controls="nav-college2" aria-selected="false">College Department</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-attendees2" role="tabpanel" aria-labelledby="nav-attendees2-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTable.php';
                $dataTable = new dataTable;
                $dataTable->dataTableAttendeesEnvironment();
                ?>
              </div>
              <div class="tab-pane fade " id="nav-college2" role="tabpanel" aria-labelledby="nav-college2-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTable.php';
                $dataTable = new dataTable;
                $dataTable->dataTableDepartmentEnvironment();
                ?>
              </div>
              <div class="tab-pane fade " id="nav-proponents2" role="tabpanel" aria-labelledby="nav-proponents2-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTable.php';
                $dataTable = new dataTable;
                $dataTable->dataTableProponentEnvironment();
                ?>
              </div>
            </div>
            </div>
            </div>
            <div class="tab-pane fade " id="v-pills-livelihood" role="tabpanel" aria-labelledby="v-pills-livelihood-tab">
              <div class="container-fluid px-0">
              <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link px-3 active" style="color:#d75094;" id="nav-attendees3-tab" data-toggle="tab" href="#nav-attendees3" role="tab" aria-controls="nav-attendees3" aria-selected="true">Attendees</a>
                <a class="nav-link px-3" style="color:#d75094;" id="nav-proponents3-tab" data-toggle="tab" href="#nav-proponents3" role="tab" aria-controls="nav-proponents3" aria-selected="false">Activity</a>
                <a class="nav-link px-3" style="color:#d75094;" id="nav-college3-tab" data-toggle="tab" href="#nav-college3" role="tab" aria-controls="nav-college3" aria-selected="false">College Department</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active " id="nav-attendees3" role="tabpanel" aria-labelledby="nav-attendees3-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTable.php';
                $dataTable = new dataTable;
                $dataTable->dataTableAttendeesLivelihood();
                ?>
              </div>
              <div class="tab-pane fade " id="nav-college3" role="tabpanel" aria-labelledby="nav-college3-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTable.php';
                $dataTable = new dataTable;
                $dataTable->dataTableDepartmentLivelihood();
                ?>
              </div>
              <div class="tab-pane fade " id="nav-proponents3" role="tabpanel" aria-labelledby="nav-proponents3-tab">
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/dataTable.php';
                $dataTable = new dataTable;
                $dataTable->dataTableProponentLivelihood();
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

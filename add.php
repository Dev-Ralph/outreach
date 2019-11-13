<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/add.php';
if(isset($_POST['add'])){
  $add = new add($_POST['type'],$_POST['title'],$_POST['date'],$_POST['venue'],$_POST['schl_number'],$_POST['p_lastname'],$_POST['p_firstname'],$_POST['p_middlename'],$_POST['participation'],$_POST['collegeDepartment'],$_POST['proponent']);
  $add->addRecord();
  header("Location: participant.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Record</title>
    <link href="vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="resource/css/edit.css" rel="stylesheet">
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
                    <li class="nav-item"><a class="nav-link text-dark mr-3 mt-3" href="participant.php"><i class="fas fa-arrow-left mr-1"></i>Return</a></li>
                  </form>
                </ul>
              </div>
            </div>
          </nav>
      <main class="py-4">
        <div class="container-fluid ">
          <div class="row justify-content-center">
            <div class="col-md-10">
              <div class="card animated fadeInUp" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
              -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
              -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                  <div class="card-header text-white bg-white"><h2 style="color:#d75093">New record</h2>
                  </div>
                    <div class="card-body">
                      <form method="POST" action="" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-md-6">
                          <div class="form-group">
                          <label for="type" class="col-form-label text-md-right">Outreach Program</label>
                          <select id="type" class="form-control mr-2 text-dark browser-default custom-select" name="type" autofocus>
                            <option value="Literacy & Numeracy" title="Title for Item 1">Literacy & Numeracy</option>
                            <option value="Health & Wellness" title="Title for Item 2">Health & Wellness</option>
                            <option value="Environment Care" title="Title for Item 3">Environment Care</option>
                            <option value="Livelihood & Entrepreneurship" title="Title for Item 4">Livelihood & Entrepreneurship</option>
                          </select>
                          </div>
                          <hr />
                          <div class="form-group">
                          <label for="title" class="col-form-label text-md-right">Title of Activity</label>
                          <select id="title" class="form-control mr-2 text-dark browser-default custom-select" name="title">
                          <?php
                          require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/edit.php';
                          $edit = new edit;
                          $edit->showTitle();
                           ?>
                         </select>
                          </div>
                          <hr />
                          <div class="form-group">
                          <label for="name" class="col-form-label text-md-right">Date</label>
                          <input id="name" type="date" class="form-control text-muted" name="date" required autocomplete="off">
                          </div>
                          <hr />
                          <div class="form-group">
                          <label for="venue" class="col-form-label text-md-right">Venue</label>
                          <input id="venue" type="text" class="form-control " name="venue" placeholder="Venue" required autocomplete="off">
                          </div>
                          <hr />
                          <div class="form-group">
                          <label for="schl_number" class="col-form-label text-md-right">ID Number</label>
                          <input id="schl_number" type="text" class="form-control " name="schl_number" placeholder="ID Number" required autocomplete="off">
                          </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                            <label for="participants" class="col-form-label text-md-right">Participant</label>
                            <div class="form-inline justify-content-center">
                            <input id="participants" type="text" class="form-control col mr-2" name="p_lastname" placeholder="Last Name" required autocomplete="off">
                            <input id="participants" type="text" class="form-control col" name="p_firstname" placeholder="First Name" required autocomplete="off">
                            <input id="participants" type="text" class="form-control col-md-6 mt-2" name="p_middlename" placeholder="Middle Name" autocomplete="off">
                            </div>
                            </div>
                            <hr />
                            <div class="form-group">
                            <label for="participation" class="col-form-label text-md-right">Participation</label>
                            <select id="participation" class="form-control mr-2 text-dark browser-default custom-select" name="participation">
                              <option value="Chairman" title="Title for Item 1">Chairman</option>
                              <option value="Co-Chairman" title="Title for Item 2">Co-Chairman</option>
                              <option value="Committee Chairman" title="Title for Item 3">Committee Chairman</option>
                              <option value="Committee Member" title="Title for Item 4">Committee Member</option>
                              <option value="Audience" title="Title for Item 5">Audience</option>
                            </select>
                            </div>
                            <hr />
                            <div class="form-group">
                            <label for="collegedepartment" class="col-form-label text-md-right">College Department</label>
                                  <select id="collegedepartment" class="form-control mr-2 text-dark browser-default custom-select" name="collegeDepartment">
                                    <option value="Dentistry Department" title="Title for Item 1">Dentistry Department</option>
                                    <option value="Nursing Department" title="Title for Item 2">Nursing Department</option>
                                    <option value="Pharmacy and Medical Technology Department" title="Title for Item 3">Pharmacy and Medical Technology Department</option>
                                    <option value="College of Accountancy, Management and Technology (CAMT)" title="Title for Item 4">College of Accountancy, Management and Technology (CAMT)</option>
                                    <option value="College of Education, Liberal Arts and Science (CELAS)" title="Title for Item 5">College of Education, Liberal Arts and Science (CELAS)</option>
                                    <option value="College of Hospitality Management (CHM)" title="Title for Item 6">College of Hospitality Management (CHM)</option>
                                  </select>
                            </div>
                            <hr />
                            <div class="form-group">
                            <label for="proponent" class="col-form-label text-md-right">Council/Organization</label>
                            <input id="proponent" type="text" class="form-control " name="proponent" placeholder="Council/Organization" required autocomplete="off">
                            </div>
                          </div>
                          </div>
                          <div class="col-md-12">
                          <div class="form-group mb-2 text-center">
                              <button type="submit" class="card-btn btn text-light px-5" name="add">Submit</button>
                          </div>
                      </div>
                    </form>
                  </div>
                </div>
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

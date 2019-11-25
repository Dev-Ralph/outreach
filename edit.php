<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/edit.php';
session_start();
if(!empty($_GET['outreach_id'])){
  $_SESSION['outreach_id'] = $_GET['outreach_id'];
}
if(isset($_POST['date'])){
$edit = new edit($_SESSION['outreach_id'],$_POST['date'],$_POST['schoolName'],$_POST['facilitator'],$_POST['documentation']);
$edit->edit();
header("Location: participant.php");
}
$edit = new edit;
$edit->showEdit();
?>
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
                    <li class="nav-item"><a class="nav-link text-dark mr-3 mt-3" href="participant.php">Go back</a></li>
                  </form>
                </ul>
              </div>
            </div>
          </nav>
      <main class="py-4">
        <div class="container-fluid ">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card animated fadeInUp" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
              -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
              -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                  <div class="card-header text-white bg-white"><h2 style="color:#d75093">Edit record</h2></div>
                    <div class="card-body">
                      <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">Date</label>
                            <div class="col-md-6">
                              <input id="name" type="date" class="form-control text-muted" name="date" value="<?php echo $edit->date; ?>" required autocomplete="off" autofocus>
                            </div>
                          </div>
                        <div class="form-group row">
                          <label for="schoolname" class="col-md-4 col-form-label text-md-right">School Name</label>
                            <div class="col-md-6">
                              <input id="schoolname" type="text" class="form-control " name="schoolName" value="<?php echo $edit->schoolName; ?>" required autocomplete="off" autofocus>
                            </div>
                          </div>
                          <div class="form-group row">
                          <label for="facilitator" class="col-md-4 col-form-label text-md-right">Facilitator</label>
                            <div class="col-md-6">
                                <input id="facilitator" type="text" class="form-control " name="facilitator" value="<?php echo $edit->facilitator; ?>" required autocomplete="off">
                              </div>
                          </div>
                          <!-- <div class="form-group row">
                            <label for="collegedepartment" class="col-md-4 col-form-label text-md-right">College Department</label>
                            <div class="col-md-6">
                                <select id="collegedepartment" class="form-control mr-2 text-dark browser-default custom-select" name="collegeDepartment">
                                  <option value="Dentistry Department" title="Title for Item 1">Dentistry Department</option>
                                  <option value="Nursing Department" title="Title for Item 2">Nursing Department</option>
                                  <option value="Pharmacy and Medical Technology Department" title="Title for Item 3">Pharmacy and Medical Technology Department</option>
                                  <option value="College of Accountancy, Management and Technology (CAMT)" title="Title for Item 4">College of Accountancy, Management and Technology (CAMT)</option>
                                  <option value="College of Education, Liberal Arts and Science (CELAS)" title="Title for Item 5">College of Education, Liberal Arts and Science (CELAS)</option>
                                  <option value="College of Hospitality Management (CHM)" title="Title for Item 6">College of Hospitality Management (CHM)</option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Images</label>
                            <div class="col-md-6">
                              <input id="image" type="file" class="form-control" name="image" autocomplete="image" accept="*/image">
                              <input id="image1" type="file" class="form-control mt-2" name="image1" autocomplete="image1" accept="*/image">
                              <input id="image2" type="file" class="form-control mt-2" name="image2" autocomplete="image2" accept="*/image">
                              <input id="image3" type="file" class="form-control mt-2" name="image3" autocomplete="image3" accept="*/image">
                              <input id="image4" type="file" class="form-control mt-2" name="image4" autocomplete="image4" accept="*/image">
                              <input id="image5" type="file" class="form-control mt-2" name="image5" autocomplete="image5" accept="*/image">
                            </div>
                          </div> -->
                          <div class="form-group row">
                            <label for="documentation" class="col-md-4 col-form-label text-md-right">Documentation</label>
                            <div class="col-md-6">
                              <textarea id="documentation" name="documentation" rows="8" cols="40" autocomplete="documentation"><?php echo $edit->documentation; ?></textarea>
                            </div>
                          </div>
                          <div class="form-group row mb-2">
                            <div class="col-md-6 text-right">
                              <button type="submit" class="card-btn btn text-light" name="add">Submit</button>
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

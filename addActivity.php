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
    <title>Add Activity</title>
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
      <nav class="navbar navbar-expand-sm navbar-light bg-white animated fadeInDown">
        <div class="container-fluid">
            <a class="navbar-brand" href=""><IMG SRC="resource/img/logo.png" ALT="Logo" WIDTH=250 HEIGHT=80></a>
            <button class="navbar-toggler bg-white" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                  <form action="" method="GET" class="form-inline my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link text-dark mr-3 mt-3" <?php
                    $pg = $_GET['pg'];
                     if ($pg == 'activity') {
                      ?>
                      href="activity.php"
                      <?php
                    }elseif ($pg == 'participant') {
                      ?>
                      href="participant.php"
                      <?php
                    }
                    ?>><i class="fas fa-arrow-left mr-1"></i>Return</a></li>
                  </form>
                </ul>
              </div>
            </div>
          </nav>
      <main class="py-4">
        <div class="container-fluid ">
          <?php
          error_reporting (E_ALL ^ E_NOTICE);
          require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/addActivity.php';
          if(isset($_POST['add'])){
            $add = new addActivity($_POST['type'],$_POST['title'],$_POST['proponent'],$_POST['date'],$_POST['venue'],$_POST['target_p'],$_POST['mean'],$_POST['documentation']);
            $add->addRecord();
            ?>
            <div class="alert alert-success alert-dismissible fade show animated fadeInDown" role="alert">
            You added a new record successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php
          }
          ?>
          <div class="row justify-content-center">
            <div class="col-md-10 mb-5">
              <div class="card animated fadeInDown" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
              -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
              -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                  <div class="card-header text-white bg-white"><h2 class="d-inline" style="color:#d75093">Activity</h2> <a class="float-right text-dark d-inline" <?php
                  $pg = $_GET['pg'];
                   if ($pg == 'activity') {
                    ?>
                    href="addActivity.php?pg=activity"
                    <?php
                  }elseif ($pg == 'participant') {
                    ?>
                    href="addActivity.php?pg=participant"
                    <?php
                  }
                  ?>><h2><span aria-hidden="true">&times;</span></h2></a>
                  </div>
                    <div class="card-body">
                      <form method="POST" action="" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-md-6">
                          <div class="form-group">
                          <label for="type" class="col-form-label text-md-right">Outreach Program</label>
                          <select id="type" class="form-control mr-2 text-dark browser-default custom-select" name="type" autofocus required>
                            <option disabled selected style="display: none;">Outreach Program</option>
                            <option value="Literacy & Numeracy">Literacy & Numeracy</option>
                            <option value="Health & Wellness">Health & Wellness</option>
                            <option value="Environment Care">Environment Care</option>
                            <option value="Livelihood & Entrepreneurship">Livelihood & Entrepreneurship</option>
                          </select>
                          </div>
                          <hr />
                          <div class="form-group">
                          <label for="title" class="col-form-label text-md-right">Title of Activity</label>
                          <input id="title" type="text" class="form-control text-muted" name="title" placeholder="Title of Activity" required autocomplete="off">
                          </div>
                          <hr />
                          <div class="form-group">
                          <label for="proponent" class="col-form-label text-md-right">Proponents</label>
                          <input id="proponent" type="text" class="form-control " name="proponent" placeholder="Proponent" required autocomplete="off">
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
                            <label for="target_p" class="col-form-label text-md-right">Target Participants</label>
                            <input id="target_p" type="text" class="form-control " name="target_p" placeholder="Target Participants" required autocomplete="off">
                          </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="mean" class="col-form-label float-left">Over-all Mean</label>
                              <input id="mean" type="text" class="form-control " name="mean" placeholder="Over-all Mean" onkeypress="return isNumberKey(event)" required autocomplete="off">
                          </div>
                          <hr />
                          <div class="form-group">
                            <label for="image" class="col-form-label text-md-right">Images</label>
                            <br>
                            <input type="button" class="btn btn-primary" id="Add" value="Add">
                            <input type="button" class="btn btn-danger ml-1" id="Remove" value="Remove">
                            <div id="textboxDiv">
                              <input type='file' class='form-control mt-2' name='image' autocomplete='image' accept='*/image'>
                            </div>
                            </div>
                            <hr />
                          <div class="form-group">
                            <label for="documentation" class="col-form-label text-md-right">Documentation</label>
                            <br />
                            <textarea id="documentation" name="documentation" class="form-control" rows="8" cols="40"></textarea>
                            </div>
                          </div>
                          </div>
                          <div class="col-md-12">
                          <div class="form-group mb-2 text-center">
                              <button type="submit" class="card-btn btn text-light px-5" name="add" style="background-color: #d75093;">Add</button>
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
    var counter = 2;
        $(document).ready(function() {
            $("#Add").on("click", function() {
              if(counter>6){
                        alert("Only 6 images allowed.");
                        return 0;
              }
              if (counter == 2) {
                $("#textboxDiv").append("<input type='file' class='form-control mt-2' name='image1' autocomplete='image1' accept='*/image'>");
              }else if (counter == 3) {
                $("#textboxDiv").append("<input type='file' class='form-control mt-2' name='image2' autocomplete='image2' accept='*/image'>");
              }else if (counter == 4) {
                $("#textboxDiv").append("<input type='file' class='form-control mt-2' name='image3' autocomplete='image3' accept='*/image'>");
              }else if (counter == 5) {
                $("#textboxDiv").append("<input type='file' class='form-control mt-2' name='image4' autocomplete='image4' accept='*/image'>");
              }else if (counter == 6) {
                $("#textboxDiv").append("<input type='file' class='form-control mt-2' name='image5' autocomplete='image5' accept='*/image'>");
              }
                counter++;
            });
            $("#Remove").on("click", function() {
              if(counter==2){
                      alert("No more images to be removed.");
                      return 0;
                   }
                $("#textboxDiv").children().last().remove();
                counter--;
            });
        });
    </script>
    <script language="Javascript">
       <!--
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : event.keyCode
          if (charCode != 46 && charCode > 31
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       //-->
    </script>
</html>

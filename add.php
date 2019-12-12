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
    <title>Add Participant</title>
    <link href="vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="resource/css/edit.css" rel="stylesheet">
    <link href="resource/css/style.css" rel="stylesheet">
    <link href="resource/css/custom-drop.css" rel="stylesheet">
    <link href="vendor/fonts/css/fontawesome.min.css" rel="stylesheet">
    <link href="vendor/fonts/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="resource/css/animate.min.css">
    <link rel="stylesheet" href="resource/css/bootstrap-select.css">
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
            <a class="navbar-brand" href="participant.php"><IMG SRC="resource/img/logo.png" ALT="Logo" WIDTH=250 HEIGHT=80></a>
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
        <div class="container-fluid">
          <?php
          require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/add.php';
          if(isset($_POST['add'])){
            $add = new add(null,$_POST['title'],null,null,$_POST['schl_number'],$_POST['p_lastname'],$_POST['p_firstname'],$_POST['p_middlename'],$_POST['participation'],$_POST['collegeDepartment'],$_POST['proponent']);
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
            <div class="col-md-10">
              <div class="card animated fadeInDown" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
              -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
              -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                  <div class="card-header text-white bg-white"><h2 class="d-inline" style="color:#d75093">Participant</h2> <a class="float-right text-dark d-inline" <?php
                  $pg = $_GET['pg'];
                   if ($pg == 'activity') {
                    ?>
                    href="add.php?pg=activity"
                    <?php
                  }elseif ($pg == 'participant') {
                    ?>
                    href="add.php?pg=participant"
                    <?php
                  }
                  ?>><h2><span aria-hidden="true">&times;</span></h2></a>
                  </div>
                    <div class="card-body">
                      <form method="POST" action="" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-md-6">
                          <!-- <div class="form-group">
                          <label for="type" class="col-form-label text-md-right">Outreach Program</label>
                          <select id="type" class="form-control mr-2 text-dark browser-default custom-select" name="type" autofocus>
                            <option value="Literacy & Numeracy" title="Title for Item 1">Literacy & Numeracy</option>
                            <option value="Health & Wellness" title="Title for Item 2">Health & Wellness</option>
                            <option value="Environment Care" title="Title for Item 3">Environment Care</option>
                            <option value="Livelihood & Entrepreneurship" title="Title for Item 4">Livelihood & Entrepreneurship</option>
                          </select>
                          </div>
                          <hr /> -->
                          <div class="form-group">
                          <label for="title" class="col-form-label text-md-right">Title of Activity</label>
                          <select id="title" class="form-control mr-2 browser-default custom-select selectpicker" name="title" data-live-search="true">
                          <?php
                          require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/edit.php';
                          $edit = new edit;
                          $edit->showTitle();
                           ?>
                         </select>
                          </div>
                          <hr />
                          <!-- <div class="form-group">
                          <label for="name" class="col-form-label text-md-right">Date</label>
                          <input id="name" type="date" class="form-control text-muted" name="date" required autocomplete="off">
                          </div>
                          <hr /> -->
                          <!-- <div class="form-group">
                          <label for="venue" class="col-form-label text-md-right">Venue</label>
                          <input id="venue" type="text" class="form-control " name="venue" placeholder="Venue" required autocomplete="off">
                          </div>
                          <hr /> -->
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
                          <label for="schl_number" class="col-form-label text-md-right">ID Number</label>
                          <input id="schl_number" type="text" class="form-control " name="schl_number" placeholder="ID Number" required autocomplete="off">
                          </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                            <label for="participation" class="col-form-label text-md-right">Participation</label>
                            <select id="participation" class="form-control mr-2 browser-default custom-select" name="participation" required>
                              <option disabled selected style="display: none;">Participation</option>
                              <option value="Chairman">Chairman</option>
                              <option value="Co-Chairman">Co-Chairman</option>
                              <option value="Committee Chairman">Committee Chairman</option>
                              <option value="Committee Member">Committee Member</option>
                              <option value="Audience">Audience</option>
                            </select>
                            </div>
                            <hr />
                            <div class="form-group">
                            <label for="collegedepartment" class="col-form-label text-md-right">College Department</label>
                                  <select id="collegedepartment" class="form-control mr-2 browser-default custom-select" name="collegeDepartment" required>
                                    <option disabled selected style="display: none;">College Department</option>
                                    <option value="Dentistry Department">Dentistry Department</option>
                                    <option value="Nursing Department">Nursing Department</option>
                                    <option value="Pharmacy and Medical Technology Department">Pharmacy and Medical Technology Department</option>
                                    <option value="College of Accountancy, Management and Technology">College of Accountancy, Management and Technology</option>
                                    <option value="College of Education, Liberal Arts and Science">College of Education, Liberal Arts and Science</option>
                                    <option value="College of Hospitality Management">College of Hospitality Management</option>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="vendor/js/bootstrap.min.js"></script>
<script src="vendor/js/bootstrap-select.js"></script>
<script type="text/javascript">
$( document ) .ready(function () {
  $('.select').selectpicker();
});
</script>
</script>
</html>

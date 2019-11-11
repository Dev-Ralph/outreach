<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/addActivity.php';
if(isset($_POST['add'])){
  $add = new addActivity($_POST['type'],$_POST['title'],$_POST['proponent'],$_POST['date'],$_POST['venue'],$_POST['target_p'],$_POST['mean'],$_POST['interpretation'],$_POST['documentation']);
  $add->addRecord();
  header("Location: activity.php");
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
      <main class="py-4">
        <div class="container-fluid ">
          <div class="row justify-content-center">
            <div class="col-md-10">
              <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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
                          <input id="title" type="text" class="form-control text-muted" name="title" placeholder="Title of Activity" required autocomplete="off">
                          </div>
                          <hr />
                          <div class="form-group">
                          <label for="proponent" class="col-form-label text-md-right">Proponent</label>
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
                          <div class="card">
                          <div class="card-header bg-white">
                            Present Evaluation
                          </div>
                          <div class="card-body">
                            <div class="form-inline">
                              <div class="col-md-6">
                              <label for="mean" class="col-form-label float-left">Over-all Mean</label>
                              <input id="mean" type="text" class="form-control " name="mean" placeholder="Over-all Mean" required autocomplete="off">
                              </div>
                              <div class="col-md-6">
                              <label for="interpretation" class="col-form-label float-left">Verbal Interpretation</label>
                              <select id="interpretation" class="form-control mr-2 text-dark browser-default custom-select" name="interpretation" autofocus>
                                <option value="Excellent" title="Title for Item 1">Excellent</option>
                                <option value="Superior" title="Title for Item 2">Superior</option>
                                <option value="Very Satisfactory" title="Title for Item 3">Very Satisfactory</option>
                                <option value="Satisfactory" title="Title for Item 4">Satisfactory</option>
                                <option value="Minimally Satisfactory" title="Title for Item 4">Minimally Satisfactory</option>
                              </select>
                            </div>
                            </div>
                          </div>
                          </div>
                          <hr />
                          <div class="form-group">
                            <label for="image" class="col-form-label text-md-right">Images</label>
                              <input id="image" type="file" class="form-control" name="image" autocomplete="image" accept="*/image">
                              <input id="image1" type="file" class="form-control mt-2" name="image1" autocomplete="image1" accept="*/image">
                              <input id="image2" type="file" class="form-control mt-2" name="image2" autocomplete="image2" accept="*/image">
                              <input id="image3" type="file" class="form-control mt-2" name="image3" autocomplete="image3" accept="*/image">
                              <input id="image4" type="file" class="form-control mt-2" name="image4" autocomplete="image4" accept="*/image">
                              <input id="image5" type="file" class="form-control mt-2" name="image5" autocomplete="image5" accept="*/image">
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
                              <button type="submit" class="card-btn btn text-light px-5" name="add">Add</button>
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

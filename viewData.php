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
                    <li class="nav-item"><a class="nav-link text-dark mr-3 mt-3" href="activity.php">Go back</a></li>
                  </form>
                </ul>
              </div>
            </div>
          </nav>
      <div class="container">
        <div class="row pt-3 pb-3 animated zoomIn">
          <div class="col-12 text-center">
          <IMG SRC="resource/img/logotrans2.png" WIDTH=400 HEIGHT=AUTO class="mx-auto">
          </div>
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/db/config.php';
            $config = new config;
            $pdo = $config ->Con();
            $id = $_GET['outreach_activity_id'];
            $stmt=$pdo->prepare("SELECT * FROM `outreach_activity` WHERE `outreach_activity_id` = $id ORDER BY `outreach_activity_id` DESC");
            $stmt->execute();
            $results = $stmt->fetchAll();
            foreach ($results as $result) {
            ?>
            <div class="mt-5 mb-4 row">
              <div class="col">
              <img src="uploads/<?php echo $result->image;?>" style="height: 50vh; width: auto;">
              </div>
              <div class="col">
              <img src="uploads/<?php echo $result->image1;?>" style="height: 50vh; width: auto;">
              </div>
              <div class="col">
              <img src="uploads/<?php echo $result->image2;?>" style="height: 50vh; width: auto;">
              </div>
              <div class="col mt-4">
              <img src="uploads/<?php echo $result->image3;?>" style="height: 50vh; width: auto;">
              </div>
              <div class="col mt-4">
              <img src="uploads/<?php echo $result->image4;?>" style="height: 50vh; width: auto;">
              </div>
              <div class="col mt-4">
              <img src="uploads/<?php echo $result->image5;?>" style="height: 50vh; width: auto;">
              </div>
            </div>
            <?php
            }
             ?>
           </div>
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/edit.php';
        session_start();
        $edit = new edit;
        $edit->showEdit();
        if(isset($_GET['outreach_activity_id'])){
          echo '<h5 class="text-center">'.$edit->title.'</h5>';
          echo '<h6 class="text-center">'.$edit->date.'</h6>';
          echo '<h6 class="text-center">'.$edit->venue.'</h6>';
          echo '<h6 class="text-center">'.$edit->proponent.'</h6>';
          echo '<p class="text-justify pt-4">'.$edit->documentation.'<p>';
        }
         ?>
     </div>

     <!-- Footer -->
     <footer>
       <div class="container row mb-5" >
         <div class="mt-2">
           <div class="mb-4">
             <div class="footer-copyright text-center py-3 text-white fixed-bottom fade animated fadeInUp"  style="background-color: #d75093;">© Copyright 2019. Centro Escolar University Malolos. All Rights Reserved</div>
           </div>
         </div>
       </div>
     </footer>
     <!-- Footer -->

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="vendor/js/bootstrap.min.js"></script>
</html>

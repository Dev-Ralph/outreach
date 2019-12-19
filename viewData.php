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
    <title>View | Activity</title>
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
  <body >
      <nav class="navbar navbar-expand-sm navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href=""><IMG SRC="resource/img/logo.png" ALT="Logo" WIDTH=250 HEIGHT=80></a>
            <button class="navbar-toggler bg-white" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                  <form action="" method="GET" class="form-inline my-2 my-lg-0">
                    <input  type="button" class="btn btn-primary float-right mr-3 mt-3 px-3" value="Print" onClick="window.print()">
                    <li class="nav-item"><a class="nav-link text-dark mr-3 mt-3" href="activity.php"><i class="fas fa-arrow-left mr-1"></i>Return</a></li>
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
            <div class="mt-5 mb-2 container-fluid text-center">
              <?php
              require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/edit.php';
              // session_start();
              $edit = new edit;
              $edit->showEdit();
              if(isset($_GET['outreach_activity_id'])){
                echo '<h4 class="text-center font-weight-bold">'.$edit->title.'</h5>';
                echo '<h6 class="text-center pt-0">'.$edit->date.'</h6>';
                // echo '<h6 class="text-center">'.$edit->venue.'</h6>';
                // echo '<p class="text-justify pt-4 pb-4">'.$edit->documentation.'<p>';
              }
               ?>
              <?php
              $image = $result->image;
              $image1 = $result->image1;
              $image2 = $result->image2;
              $image3 = $result->image3;
              $image4 = $result->image4;
              $image5 = $result->image5;
              if (empty($image5) && empty($image4) && empty($image3) && empty($image2) && empty($image1) && !empty($image)) {
                ?>
                <div class="row">
                <div class="col-md-12 pt-2">
                <img src="uploads/<?php echo $result->image;?>" style="height:350px; width:auto;">
                </div>
                </div>
                <?php
              }elseif (empty($image5) && empty($image4) && empty($image3) && empty($image2) && !empty($image1) && !empty($image)) {
                ?>
                <div class="row">
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image;?>" style="height:350px; width:auto;">
                </div>
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image1;?>" style="height:350px;; width:auto;">
                </div>
                </div>
                <?php
              }elseif (empty($image5) && empty($image4) && empty($image3) && !empty($image2) && !empty($image1) && !empty($image)) {
                ?>
                <div class="row">
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image;?>" style="height:350px; width:auto;">
                </div>
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image1;?>" style="height:350px;; width:auto;">
                </div>
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image2;?>" style="height:350px;; width:auto;">
                </div>
                </div>
                <?php
              }elseif (empty($image5) && empty($image4) && !empty($image3) && !empty($image2) && !empty($image1) && !empty($image)) {
                ?>
                <div class="row">
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image;?>" style="height:350px; width:auto;">
                </div>
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image1;?>" style="height:350px;; width:auto;">
                </div>
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image2;?>" style="height:350px;; width:auto;">
                </div>
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image3;?>" style="height:350px;; width:auto;">
                </div>
                </div>
                <?php
              }elseif (empty($image5) && !empty($image4) && !empty($image3) && !empty($image2) && !empty($image1) && !empty($image)) {
                ?>
                <div class="row">
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image;?>" style="height:350px; width:auto;">
                </div>
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image1;?>" style="height:350px;; width:auto;">
                </div>
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image2;?>" style="height:350px;; width:auto;">
                </div>
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image3;?>" style="height:350px;; width:auto;">
                </div>
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image4;?>" style="height:350px;; width:auto;">
                </div>
                </div>
                <?php
              }elseif (!empty($image5) && !empty($image4) && !empty($image3) && !empty($image2) && !empty($image1) && !empty($image)) {
                ?>
                <div class="row">
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image;?>" style="height:350px; width:auto;">
                </div>
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image1;?>" style="height:350px;; width:auto;">
                </div>
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image2;?>" style="height:350px;; width:auto;">
                </div>
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image3;?>" style="height:350px;; width:auto;">
                </div>
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image4;?>" style="height:350px;; width:auto;">
                </div>
                <div class="col pt-2">
                <img src="uploads/<?php echo $result->image5;?>" style="height:350px;; width:auto;">
                </div>
                </div>
                <?php
              }
              ?>
              <!-- <div class="col mb-4">
              <img src="uploads/<?php echo $result->image1;?>" style="height:200px;; width:300px; border:1px solid pink;">
              </div>
              <div class="col mb-4">
              <img src="uploads/<?php echo $result->image2;?>" style="height:200px;; width:300px; border:1px solid pink;">
              </div>
              <div class="col mt-4">
              <img src="uploads/<?php echo $result->image3;?>" style="height:200px;; width:300px; border:1px solid pink;">
              </div>
              <div class="col mt-4">
              <img src="uploads/<?php echo $result->image4;?>" style="height:200px;; width:300px; border:1px solid pink;">
              </div>
              <div class="col mt-4">
              <img src="uploads/<?php echo $result->image5;?>" style="height:200px;; width:300px; border:1px solid pink;">
              </div> -->
            </div>
            <?php
            }
             ?>
           </div>
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/edit.php';
        // session_start();
        $edit = new edit;
        $edit->showEdit();
        if(isset($_GET['outreach_activity_id'])){
          // echo '<h5 class="text-center">'.$edit->title.'</h5>';
          // echo '<h6 class="text-center">'.$edit->date.'</h6>';
          echo '<h6 class="text-center animated zoomIn">'.$edit->venue.'</h6>';
          echo '<p class="text-justify pt-3 pb-2 animated zoomIn">'.$edit->documentation.'<p>';
        }
         ?>
         <?php
         require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/tableActivity.php';
         $tableActivity = new tableActivity;
         $tableActivity->viewEvaluation();
         ?>
         <?php
         require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/tableActivity.php';
         $tableActivity = new tableActivity;
         $tableActivity->viewActivityParticipant();
         ?>
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
</html>

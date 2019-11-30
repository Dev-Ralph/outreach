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
    <title>Edit Account</title>
    <link href="vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fonts/css/fontawesome.min.css" rel="stylesheet">
    <link href="resource/css/style.css" rel="stylesheet">
    <link href="vendor/fonts/css/all.css" rel="stylesheet">
    <link href="resource/css/edit.css" rel="stylesheet">
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

  <script type="text/javascript">

    window.onload=function(){

/**
 * @author Abdo-Hamoud <abdo.host@gmail.com>
 * https://github.com/Abdo-Hamoud/bootstrap-show-password
 * version: 1.0
 */

!function(a){a(function(){a('[data-toggle="password"]').each(function(){var b = a(this); var c = a(this).parent().find(".input-group-text"); c.css("cursor", "pointer").addClass("input-password-hide"); c.on("click", function(){if (c.hasClass("input-password-hide")){c.removeClass("input-password-hide").addClass("input-password-show"); c.find(".fa").removeClass("fa-eye").addClass("fa-eye-slash"); b.attr("type", "text")} else{c.removeClass("input-password-show").addClass("input-password-hide"); c.find(".fa").removeClass("fa-eye-slash").addClass("fa-eye"); b.attr("type", "password")}})})})}(window.jQuery);
    }
</script>

  <body>
      <nav class="navbar navbar-expand-sm navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="activity.php"><IMG SRC="resource/img/logo.png" ALT="Logo" WIDTH=250 HEIGHT=80></a>
            <button class="navbar-toggler bg-white" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                  <form action="" method="GET" class="form-inline my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link text-dark mr-3 mt-3" href="activity.php"><i class="fas fa-arrow-left mr-1"></i>Return</a></li>
                  </form>
                </ul>
              </div>
            </div>
          </nav>
        <div class="container-fluid ">
          <?php
          require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/function/editAccount.php';
          if(isset($_POST['save'])){
            $edit = new editAccount($_POST['username'],$_POST['password']);
            $edit->changeAccount();
            ?>
            <div class="alert alert-success alert-dismissible fade show animated fadeInDown mt-4 mb-0" role="alert">
            You successfully edited your account!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php
          }
          ?>
          <div class="row justify-content-center">
            <div class="col-md-4 mt-5">
              <div class="card animated fadeInUp" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
              -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
              -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                  <div class="card-header text-white bg-white"><h2 style="color:#d75093">Edit Account</h2></div>
                    <div class="card-body">
                      <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                        <label for="username" class="col-form-label text-md-right">Username</label>
                        <input id="username" type="text" class="form-control " name="username" placeholder="Username" value="<?php
                          $edit = new editAccount;
                          $edit->accountId();
                          echo "$edit->username";
                          ?>" required autocomplete="off">
                        </div>
                        <label for="password" class="col-form-label text-md-right">Password</label>
                        <div class="input-group">
                          <input type="password" name="password" id="password" class="form-control" data-toggle="password" placeholder="Password"
                          value="<?php
                          $edit = new editAccount;
                          $edit->accountId();
                          echo "$edit->password";
                          ?>" required autocomplete="off">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-eye"></i></span>
                          </div>
                        </div>
                          <div class="form-group row justify-content-center">
                            <div class="col-md-12 text-center">
                              <button type="submit" class="card-btn btn text-light mt-3" name="save">Save</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


<script>
// tell the embed parent frame the height of the content
if (window.parent && window.parent.parent){
  window.parent.parent.postMessage(["resultsFrame", {
    height: document.body.getBoundingClientRect().height,
    slug: "zkou4dej"
  }], "*")
}

  // always overwrite window.name, in case users try to set it manually
  window.name = "result"
</script>
      <!-- Footer -->
      <footer>
        <div class="container-fluid mb-5" >
          <div class="row">
              <div class="footer-copyright text-center py-3 text-white fixed-bottom fade animated fadeInUp"  style="background-color: #d75093;">
              <div class="col-md-6 float-left text-left">© Copyright 2019. Centro Escolar University Malolos. All Rights Reserved</div>
              <div class="col-md-6 float-right text-right">Ralph Edwin E. Lopez, Kenneth R. Sillo, Johnroy V. Policarpio, Keith B. Godoy, Robin G. Santos, Vincent Redell A. Suñga
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

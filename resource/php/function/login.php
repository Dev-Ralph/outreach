<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/db/config.php';
error_reporting (E_ALL ^ E_NOTICE);
class login extends config{
public function __construct($username=null,$password=null){
  $this->username = $username;
  $this->password = $password;
}

public function login(){
    $config = new config;
    $pdo = $config ->Con();
    if(isset($_GET['username'])){
    $username = $this->username;
    $password = $this->password;
    $sql = "SELECT * FROM `account` WHERE `username` = ?";
    $data = $pdo->prepare($sql);
    $data->execute([$username]);
    $rows = $data->fetchAll(PDO::FETCH_OBJ);
    foreach ($rows as $row) {
      $username2 = $row->username;
      $password2 = $row->password;
    }
    if ($username == $username2 && $password == $password2){
    $_SESSION['username'] = $username;
    header('location: activity.php');
  }else {
    // header('location: index.php');
    ?>
    <div class="container">
    <div class="alert alert-danger alert-dismissible fade show mt-3 mb-0 animated zoomIn" role="alert">
    Login failed! You entered invalid username or password.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div>
  <?php
  }
}
}
}
?>

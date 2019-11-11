<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/db/config.php';
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
    header('location: participant.php');
  }else {
    header('location: index.php');
  }
}
}
}
?>

<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/db/config.php';
class addAccount extends config{
  public $username;
  public $password;
  public $email;
  public $status;


public function __construct($username=null,$password=null,$email=null,$status){
    $this->username = $username;
    $this->password = $password;
    $this->email = $email;
    $this->status = $status;
}

public function addAccountUser(){
            $config = new config;
            $pdo = $config->Con();
            $pg = $_GET['pg'];
            $username = $this->username;
            $password = $this->password;
            $email = $this->email;
            $status = $this->status;
            $s = $pdo->prepare("INSERT INTO `account`(`username`, `password`, `email`, `status`) VALUES (?, ?, ?, ?)");
            $s->execute([$username, $password, $email, $status]);
            header('location: addAccount.php?pg='.$pg.'');
}
}
 ?>

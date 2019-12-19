<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/db/config.php';
class editAccount extends config{
  public $username;
  public $password;
  public $email;


public function __construct($username=null,$password=null,$email=null){
    $this->username = $username;
    $this->password = $password;
    $this->email = $email;
}

public function accountId(){
            $config = new config;
            $pdo = $config->Con();
            $account_id = $_SESSION['account_id'];
            $s = $pdo->prepare("SELECT * FROM `account` WHERE `account_id` = $account_id");
            $s->execute();
            $results = $s->fetchAll();
            foreach ($results as $result) {
                $this->account_id = $result->account_id;
                $this->username = $result->username;
                $this->password = $result->password;
                $this->email = $result->email;
              }
}

public function changeAccount(){
            $config = new config;
            $pdo = $config->Con();
            $username = $this->username;
            $password = $this->password;
            $email = $this->email;
            $account_id = $_GET['account_id'];
            $s = $pdo->prepare("UPDATE `account` SET `username`= ?,`password`= ?, `email` = ? WHERE `account_id` = $account_id ");
            $s->execute([$username,$password,$email]);
}

public function showAccount(){
            $config = new config;
            $pdo = $config->Con();
            $s = $pdo->prepare("SELECT * FROM `account` WHERE `account_id` = $account_id");
            $s->execute();
            $results = $s->fetchAll();
            foreach ($results as $result) {
                $this->username = $result->username;
                $this->password = $result->password;
              }
}
}
 ?>

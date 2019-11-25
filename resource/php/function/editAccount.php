<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/db/config.php';
class editAccount extends config{
  public $username;
  public $password;


public function __construct($username=null,$password=null){
    $this->username = $username;
    $this->password = $password;
}

public function accountId(){
            $config = new config;
            $pdo = $config->Con();
            $s = $pdo->prepare("SELECT * FROM `account`");
            $s->execute();
            $results = $s->fetchAll();
            foreach ($results as $result) {
                $this->account_id = $result->account_id;
                $this->username = $result->username;
                $this->password = $result->password;
              }
}

public function changeAccount(){
            $config = new config;
            $pdo = $config->Con();
            $username = $this->username;
            $password = $this->password;
            $account_id = $_GET['account_id'];
            $s = $pdo->prepare("UPDATE `account` SET `username`= ?,`password`= ? WHERE `account_id` = $account_id ");
            $s->execute([$username,$password]);
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

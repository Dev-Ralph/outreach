<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/db/config.php';
class delete extends config{
public function deleteData(){
              $config = new config;
              $pdo = $config->Con();
              if(!isset($_GET['delete'])){
              $delete = Null;
              }else {
              $delete = $_GET['delete'];
              $sql = "DELETE FROM `outreach` WHERE `outreach_id` = ?";
              $data = $pdo->prepare($sql);
              $data->execute([$delete]);
              }
}
public function deleteDataActivity(){
              $config = new config;
              $pdo = $config->Con();
              if(!isset($_GET['delete']) && !isset($_GET['title'])){
              $delete = Null;
              $title = Null;
              }else {
              $delete = $_GET['delete'];
              $title = $_GET['title'];
              $sql = "DELETE FROM `outreach_activity` WHERE `outreach_activity_id` = ?";
              $data = $pdo->prepare($sql);
              $data->execute([$delete]);

              $sql2 = "DELETE FROM `outreach` WHERE `title` = ?";
              $data2 = $pdo->prepare($sql2);
              $data2->execute([$title]);
              }
}
          }
 ?>

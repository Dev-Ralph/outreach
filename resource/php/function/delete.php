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
          }
 ?>

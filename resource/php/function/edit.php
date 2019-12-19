<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/db/config.php';
class edit extends config{
  public $date;
  public $schoolName;
  public $facilitator;
  public $documentation;
  public $outreach_id;


public function __construct($outreach_id=null,$date=null,$schoolName=null,$facilitator=null,$documentation=null){
    $this->date = $date;
    $this->schoolName = $schoolName;
    $this->facilitator = $facilitator;
    $this->documentation = $documentation;
    $this->outreach_id = $outreach_id;
  }
public function editActivity(){
              $config = new config;
              $pdo = $config->Con();
              $id = $_GET['outreach_activity_id'];
              $s = $pdo->prepare("SELECT * FROM `outreach_activity` WHERE `outreach_activity_id` = '$id'");
              $s->execute();
              $results = $s->fetchAll();
              foreach ($results as $result) {
                $this->type = $result->type;
                $this->title = $result->title;
                $this->date = $result->date;
                $this->venue = $result->venue;
                $this->proponent = $result->proponent;
                $this->target_p = $result->target_p;
                $this->mean = $result->mean;
                $this->documentation = $result->documentation;
                $this->image = $result->image;
                }
}

public function edit(){
            $config = new config;
            $pdo = $config->Con();
            $id = $this->outreach_id;
            $sql = "SELECT * FROM `outreach_participant` WHERE `outreach_id`= '$id'";
            $data= $pdo->prepare($sql);
            $data->execute();
            $result = $data->fetchAll();
            $date = $this->date;
            $schoolName = $this->schoolName;
            $facilitator = $this->facilitator;
            // $collegeDepartment = $this->collegeDepartment;
            // $image = $this->image;
            $documentation = $this->documentation;
            $sql = "UPDATE `outreach_participant` SET `date`= ?,`schoolName`= ?,`facilitator`= ?,`documentation`= ? WHERE `outreach_id`= '$id'";
            $data= $pdo->prepare($sql);
            $data->execute([$date, $schoolName, $facilitator, $documentation]);
          }

public function showEdit(){
            $config = new config;
            $pdo = $config->Con();
            $id = $_GET['outreach_activity_id'];
            $s = $pdo->prepare("SELECT * FROM `outreach_activity` WHERE `outreach_activity_id` = '$id'");
            $s->execute();
            $results = $s->fetchAll();
            foreach ($results as $result) {
              $this->title = $result->title;
              $this->date = $result->date;
              $this->venue = $result->venue;
              $this->proponent = $result->proponent;
              $this->documentation = $result->documentation;
              $this->image = $result->image;
              $this->image = $result->mean;
              }
}
public function showTitle(){
            $config = new config;
            $pdo = $config->Con();
            $s = $pdo->prepare("SELECT * FROM `outreach_activity` GROUP BY `date` DESC");
            $s->execute();
            $results = $s->fetchAll();
            foreach ($results as $result) {
                echo '<option value="'.$this->title = $result->title.'">'.$this->title = $result->title.' ('.$this->date = $result->date.')'.'</option>';
              }
}
public function showTitleEdit(){
            $config = new config;
            $pdo = $config->Con();
            $id = $_GET['outreach_id'];
            $title2 = $_GET['title'];
            $date2 = $_GET['date'];
            $s2 = $pdo->prepare("SELECT * FROM `outreach_participant` WHERE `outreach_id` = '$id'");
            $s2->execute();
            $rows = $s2->fetchAll();
            foreach ($rows as $row) {
              echo '<option value="'.$title2.'">'.$title2.' ('.$date2.')'.'</option>';
            }
            $s = $pdo->prepare("SELECT * FROM `outreach_activity` GROUP BY `date` DESC");
            $s->execute();
            $results = $s->fetchAll();
            foreach ($results as $result) {
                $title = $result->title;
                $date = $result->date;
                if ($title2 == $title) {

                }else {
                  echo '<option value="'.$title.'">'.$title.' ('.$date.')'.'</option>';
                }
              }
}
}
 ?>

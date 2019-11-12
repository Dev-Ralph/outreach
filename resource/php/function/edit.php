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

public function edit(){
            $config = new config;
            $pdo = $config->Con();
            $id = $this->outreach_id;
            $sql = "SELECT * FROM `outreach` WHERE `outreach_id`= '$id'";
            $data= $pdo->prepare($sql);
            $data->execute();
            $result = $data->fetchAll();
            $date = $this->date;
            $schoolName = $this->schoolName;
            $facilitator = $this->facilitator;
            // $collegeDepartment = $this->collegeDepartment;
            // $image = $this->image;
            $documentation = $this->documentation;
            $sql = "UPDATE `outreach` SET `date`= ?,`schoolName`= ?,`facilitator`= ?,`documentation`= ? WHERE `outreach_id`= '$id'";
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
              $this->image1 = $result->image1;
              $this->image2 = $result->image2;
              $this->image3 = $result->image3;
              $this->image4 = $result->image4;
              $this->image5 = $result->image5;
              }
}
public function showTitle(){
            $config = new config;
            $pdo = $config->Con();
            $s = $pdo->prepare("SELECT * FROM `outreach_activity` GROUP BY `date` DESC");
            $s->execute();
            $results = $s->fetchAll();
            foreach ($results as $result) {
                echo '<option value='.$this->title = $result->title.'>'.$this->title = $result->title.'</option>';

              }
            }
          }
 ?>

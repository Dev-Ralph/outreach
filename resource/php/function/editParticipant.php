<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/db/config.php';
class editParticipant extends config{
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
public function editParticipant(){
              $config = new config;
              $pdo = $config->Con();
              $id = $_GET['outreach_id'];
              $s = $pdo->prepare("SELECT * FROM `outreach_participant` WHERE `outreach_id` = '$id'");
              $s->execute();
              $results = $s->fetchAll();
              foreach ($results as $result) {
                $this->type = $result->type;
                $this->title = $result->title;
                $this->date = $result->date;
                $this->venue = $result->venue;
                $this->p_lastname = $result->p_lastname;
                $this->p_middlename = $result->p_middlename;
                $this->p_firstname = $result->p_firstname;
                $this->schl_number = $result->schl_number;
                $this->participation = $result->participation;
                $this->collegeDepartment = $result->collegeDepartment;
                $this->proponent = $result->proponent;
                }
}
}
 ?>

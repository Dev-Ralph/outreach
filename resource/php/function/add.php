<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/db/config.php';
class add extends config{
    public $type;
    public $title;
    public $date;
    public $venue;
    public $schl_number;
    public $p_lastname;
    public $p_firstname;
    public $p_middlename;
    public $participation;
    public $collegeDepartment;
    public $proponent;

public function __construct($type=null,$title=null,$date=null,$venue=null,$schl_number=null,$p_lastname=null,$p_firstname=null,$p_middlename=null,$participation=null,$collegeDepartment=null,$proponent=null){
  $this->type = $type;
  $this->title = $title;
  $this->date = $date;
  $this->venue = $venue;
  $this->schl_number = $schl_number;
  $this->p_lastname = $p_lastname;
  $this->p_firstname = $p_firstname;
  $this->p_middlename = $p_middlename;
  $this->participation = $participation;
  $this->collegeDepartment = $collegeDepartment;
  $this->proponent = $proponent;
}

public function addRecord(){
    $config = new config;
    $pdo = $config ->Con();
    $pg = $_GET['pg'];
    $_SESSION['pg'] = $pg;
    $type = $this->type;
    $title = $this->title;
    $date = $this->date;
    $venue = $this->venue;
    $schl_number = $this->schl_number;
    $p_lastname = $this->p_lastname;
    $p_firstname = $this->p_firstname;
    $p_middlename = $this->p_middlename;
    $participation = $this->participation;
    $collegeDepartment = $this->collegeDepartment;
    $proponent = $this->proponent;

    $sql2 = "SELECT * FROM `outreach_activity` WHERE `title`= '$title'";
    $data2= $pdo->prepare($sql2);
    $data2->execute();
    $rows = $data2->fetchAll();
    foreach ($rows as $row) {
      $type_a = $row->type;
      $date_a = $row->date;
      $venue_a = $row->venue;
    }

    $sql = "INSERT INTO `outreach_participant`(`type`, `title`, `date`, `venue`, `schl_number`, `p_lastname`, `p_firstname`, `p_middlename`, `participation`,`collegeDepartment`, `proponent`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $data = $pdo->prepare($sql);
    $data->execute([$type_a,$title,$date_a,$venue_a,$schl_number,$p_lastname,$p_firstname,$p_middlename,$participation,$collegeDepartment,$proponent]);
  }

  public function editRecord(){
      $config = new config;
      $pdo = $config ->Con();
      $outreach_id = $_GET['outreach_id'];
      $type = $this->type;
      $title = $this->title;
      $date = $this->date;
      $venue = $this->venue;
      $schl_number = $this->schl_number;
      $p_lastname = $this->p_lastname;
      $p_firstname = $this->p_firstname;
      $p_middlename = $this->p_middlename;
      $participation = $this->participation;
      $collegeDepartment = $this->collegeDepartment;
      $proponent = $this->proponent;

      $sql2 = "SELECT * FROM `outreach_activity` WHERE `title`= '$title'";
      $data2= $pdo->prepare($sql2);
      $data2->execute();
      $rows = $data2->fetchAll();
      foreach ($rows as $row) {
        $type_a = $row->type;
        $date_a = $row->date;
        $venue_a = $row->venue;
      }

      $sql = "UPDATE `outreach_participant` SET `type`= ?,`title`= ?,`date`= ?,`venue`= ?,`schl_number`= ?,`p_lastname`= ?,`p_firstname`= ?,`p_middlename`= ?,`participation`= ?,`collegeDepartment`= ?, `proponent` = ? WHERE `outreach_id` = '$outreach_id'";
      $data = $pdo->prepare($sql);
      $data->execute([$type_a,$title,$date_a,$venue_a,$schl_number,$p_lastname,$p_firstname,$p_middlename,$participation,$collegeDepartment,$proponent]);
    }
}
?>

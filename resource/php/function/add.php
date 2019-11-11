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

    $sql = "INSERT INTO `outreach`(`type`, `title`, `date`, `venue`, `schl_number`, `p_lastname`, `p_firstname`, `p_middlename`, `participation`,`collegeDepartment`, `proponent`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $data = $pdo->prepare($sql);
    $data->execute([$type,$title,$date,$venue,$schl_number,$p_lastname,$p_firstname,$p_middlename,$participation,$collegeDepartment,$proponent]);
  }
}
?>

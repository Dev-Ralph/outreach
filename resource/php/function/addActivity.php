<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/db/config.php';
class addActivity extends config{
    public $type;
    public $title;
    public $proponent;
    public $date;
    public $venue;
    public $target_p;
    public $mean;
    public $interpretation;
    public $documentation;

public function __construct($type=null,$title=null,$proponent=null,$date=null,$venue=null,$target_p=null,$mean=null,$interpretation=null,$documentation=null){
  $this->type = $type;
  $this->title = $title;
  $this->proponent = $proponent;
  $this->date = $date;
  $this->venue = $venue;
  $this->target_p = $target_p;
  $this->mean = $mean;
  $this->interpretation = $interpretation;
  $this->documentation = $documentation;
}

public function addRecord(){
    $config = new config;
    $pdo = $config ->Con();
    $type = $this->type;
    $title = $this->title;
    $proponent = $this->proponent;
    $date = $this->date;
    $venue = $this->venue;
    $target_p = $this->target_p;
    $mean = $this->mean;
    $interpretation = $this->interpretation;
    $documentation = $this->documentation;


    $images=$_FILES['image']['name'];
    $tmp_dir=$_FILES['image']['tmp_name'];
    $imageSize=$_FILES['image']['size'];
    $upload_dir='uploads/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png');
    $documentationImage=rand(1000, 1000000).".".$imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$documentationImage);


    $sql = "INSERT INTO `outreach_activity`(`type`,`title`, `proponent`, `date`, `venue`, `target_p`, `mean`, `interpretation`, `documentation`, `image`) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $data = $pdo->prepare($sql);
    $data->execute([$type,$title,$proponent,$date,$venue,$target_p,$mean,$interpretation,$documentation,$documentationImage]);
  }
}
?>

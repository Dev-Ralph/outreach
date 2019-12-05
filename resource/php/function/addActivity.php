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
    public $documentation;

public function __construct($type=null,$title=null,$proponent=null,$date=null,$venue=null,$target_p=null,$mean=null,$documentation=null){
  $this->type = $type;
  $this->title = $title;
  $this->proponent = $proponent;
  $this->date = $date;
  $this->venue = $venue;
  $this->target_p = $target_p;
  $this->mean = $mean;
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
    if ($mean >= 4.50) {
      $interpretation = "Excellent";
    }elseif ($mean >= 3.50) {
      $interpretation = "Superior";
    }elseif ($mean >= 2.50) {
      $interpretation = "Very Satisfactory";
    }elseif ($mean >= 1.50) {
      $interpretation = "Satisfactory";
    }elseif ($mean >= 0.50) {
      $interpretation = "Minimally Satisfactory";
    }else {
      $interpretation = "Invalid input!";
    };
    $documentation = $this->documentation;


    $images=$_FILES['image']['name'];
    $tmp_dir=$_FILES['image']['tmp_name'];
    $imageSize=$_FILES['image']['size'];
    $upload_dir='uploads/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png');
    $documentationImage=rand(1000, 1000000).".".$imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$documentationImage);

    $images=$_FILES['image1']['name'];
    $tmp_dir=$_FILES['image1']['tmp_name'];
    $imageSize=$_FILES['image1']['size'];
    $upload_dir='uploads/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png');
    $documentationImage1=rand(1000, 1000000).".".$imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$documentationImage1);

    $images=$_FILES['image2']['name'];
    $tmp_dir=$_FILES['image2']['tmp_name'];
    $imageSize=$_FILES['image2']['size'];
    $upload_dir='uploads/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png');
    $documentationImage2=rand(1000, 1000000).".".$imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$documentationImage2);

    $images=$_FILES['image3']['name'];
    $tmp_dir=$_FILES['image3']['tmp_name'];
    $imageSize=$_FILES['image3']['size'];
    $upload_dir='uploads/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png');
    $documentationImage3=rand(1000, 1000000).".".$imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$documentationImage3);

    $images=$_FILES['image4']['name'];
    $tmp_dir=$_FILES['image4']['tmp_name'];
    $imageSize=$_FILES['image4']['size'];
    $upload_dir='uploads/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png');
    $documentationImage4=rand(1000, 1000000).".".$imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$documentationImage4);

    $images=$_FILES['image5']['name'];
    $tmp_dir=$_FILES['image5']['tmp_name'];
    $imageSize=$_FILES['image5']['size'];
    $upload_dir='uploads/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png');
    $documentationImage5=rand(1000, 1000000).".".$imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$documentationImage5);


    $sql = "INSERT INTO `outreach_activity`(`type`,`title`, `proponent`, `date`, `venue`, `target_p`, `mean`, `interpretation`, `documentation`, `image` ,`image1`, `image2`, `image3`, `image4`, `image5`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $data = $pdo->prepare($sql);
    $data->execute([$type,$title,$proponent,$date,$venue,$target_p,$mean,$interpretation,$documentation,$documentationImage,$documentationImage1,$documentationImage2,$documentationImage3,$documentationImage4,$documentationImage5]);
}
public function editRecord(){
    $config = new config;
    $pdo = $config ->Con();
    $outreach_activity_id = $_GET['outreach_activity_id'];
    $type = $this->type;
    $title = $this->title;
    $proponent = $this->proponent;
    $date = $this->date;
    $venue = $this->venue;
    $target_p = $this->target_p;
    $mean = $this->mean;
    if ($mean >= 4.50) {
      $interpretation = "Excellent";
    }elseif ($mean >= 3.50) {
      $interpretation = "Superior";
    }elseif ($mean >= 2.50) {
      $interpretation = "Very Satisfactory";
    }elseif ($mean >= 1.50) {
      $interpretation = "Satisfactory";
    }elseif ($mean >= 0.50) {
      $interpretation = "Minimally Satisfactory";
    }else {
      $interpretation = "Invalid input!";
    };
    $documentation = $this->documentation;


    $images=$_FILES['image']['name'];
    $tmp_dir=$_FILES['image']['tmp_name'];
    $imageSize=$_FILES['image']['size'];
    $upload_dir='uploads/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png');
    $documentationImage=rand(1000, 1000000).".".$imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$documentationImage);

    $images=$_FILES['image1']['name'];
    $tmp_dir=$_FILES['image1']['tmp_name'];
    $imageSize=$_FILES['image1']['size'];
    $upload_dir='uploads/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png');
    $documentationImage1=rand(1000, 1000000).".".$imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$documentationImage1);

    $images=$_FILES['image2']['name'];
    $tmp_dir=$_FILES['image2']['tmp_name'];
    $imageSize=$_FILES['image2']['size'];
    $upload_dir='uploads/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png');
    $documentationImage2=rand(1000, 1000000).".".$imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$documentationImage2);

    $images=$_FILES['image3']['name'];
    $tmp_dir=$_FILES['image3']['tmp_name'];
    $imageSize=$_FILES['image3']['size'];
    $upload_dir='uploads/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png');
    $documentationImage3=rand(1000, 1000000).".".$imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$documentationImage3);

    $images=$_FILES['image4']['name'];
    $tmp_dir=$_FILES['image4']['tmp_name'];
    $imageSize=$_FILES['image4']['size'];
    $upload_dir='uploads/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png');
    $documentationImage4=rand(1000, 1000000).".".$imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$documentationImage4);

    $images=$_FILES['image5']['name'];
    $tmp_dir=$_FILES['image5']['tmp_name'];
    $imageSize=$_FILES['image5']['size'];
    $upload_dir='uploads/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png');
    $documentationImage5=rand(1000, 1000000).".".$imgExt;
    move_uploaded_file($tmp_dir, $upload_dir.$documentationImage5);

    $sql = "UPDATE `outreach_activity` SET `type`= ?,`title`= ?,`proponent`= ?,`date`= ?,`venue`= ?,`target_p`= ?,`mean`= ?,`interpretation`= ?,`documentation`= ?,`image`= ?, `image1`= ?,`image2`= ?,`image3`= ?,`image4`= ?,`image5`= ? WHERE `outreach_activity_id` = '$outreach_activity_id'";
    $data = $pdo->prepare($sql);
    $data->execute([$type,$title,$proponent,$date,$venue,$target_p,$mean,$interpretation,$documentation,$documentationImage,$documentationImage1,$documentationImage2,$documentationImage3,$documentationImage4,$documentationImage5]);
  }
}
?>

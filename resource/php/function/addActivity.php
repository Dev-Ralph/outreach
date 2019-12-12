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
    $pg = $_GET['pg'];
    $_SESSION['pg'] = $pg;
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

    $images1=$_FILES['image1']['name'];
    $tmp_dir1=$_FILES['image1']['tmp_name'];
    $imageSize1=$_FILES['image1']['size'];

    $images2=$_FILES['image2']['name'];
    $tmp_dir2=$_FILES['image2']['tmp_name'];
    $imageSize2=$_FILES['image2']['size'];

    $images3=$_FILES['image3']['name'];
    $tmp_dir3=$_FILES['image3']['tmp_name'];
    $imageSize3=$_FILES['image3']['size'];

    $images4=$_FILES['image4']['name'];
    $tmp_dir4=$_FILES['image4']['tmp_name'];
    $imageSize4=$_FILES['image4']['size'];

    $images5=$_FILES['image5']['name'];
    $tmp_dir5=$_FILES['image5']['tmp_name'];
    $imageSize5=$_FILES['image5']['size'];

    $upload_dir='uploads/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $imgExt1=strtolower(pathinfo($images1,PATHINFO_EXTENSION));
    $imgExt2=strtolower(pathinfo($images2,PATHINFO_EXTENSION));
    $imgExt3=strtolower(pathinfo($images3,PATHINFO_EXTENSION));
    $imgExt4=strtolower(pathinfo($images4,PATHINFO_EXTENSION));
    $imgExt5=strtolower(pathinfo($images5,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png');

    $documentationImage=null;
    $documentationImage1=null;
    $documentationImage2=null;
    $documentationImage3=null;
    $documentationImage4=null;
    $documentationImage5=null;
    if (!empty($imgExt) && !empty($imgExt1) && !empty($imgExt2) && !empty($imgExt3) && !empty($imgExt4) && !empty($imgExt5)) {
      // code...
      $documentationImage=rand(1000, 1000000).".".$imgExt;
      $documentationImage1=rand(1000, 1000000).".".$imgExt1;
      $documentationImage2=rand(1000, 1000000).".".$imgExt2;
      $documentationImage3=rand(1000, 1000000).".".$imgExt3;
      $documentationImage4=rand(1000, 1000000).".".$imgExt4;
      $documentationImage5=rand(1000, 1000000).".".$imgExt5;
      move_uploaded_file($tmp_dir, $upload_dir.$documentationImage);
      move_uploaded_file($tmp_dir1, $upload_dir.$documentationImage1);
      move_uploaded_file($tmp_dir2, $upload_dir.$documentationImage2);
      move_uploaded_file($tmp_dir3, $upload_dir.$documentationImage3);
      move_uploaded_file($tmp_dir4, $upload_dir.$documentationImage4);
      move_uploaded_file($tmp_dir5, $upload_dir.$documentationImage5);
    }elseif (!empty($imgExt) && !empty($imgExt1) && !empty($imgExt2) && !empty($imgExt3) && !empty($imgExt4) && empty($imgExt1)) {
      $documentationImage=rand(1000, 1000000).".".$imgExt;
      $documentationImage1=rand(1000, 1000000).".".$imgExt1;
      $documentationImage2=rand(1000, 1000000).".".$imgExt2;
      $documentationImage3=rand(1000, 1000000).".".$imgExt3;
      $documentationImage4=rand(1000, 1000000).".".$imgExt4;
      move_uploaded_file($tmp_dir, $upload_dir.$documentationImage);
      move_uploaded_file($tmp_dir1, $upload_dir.$documentationImage1);
      move_uploaded_file($tmp_dir2, $upload_dir.$documentationImage2);
      move_uploaded_file($tmp_dir3, $upload_dir.$documentationImage3);
      move_uploaded_file($tmp_dir4, $upload_dir.$documentationImage4);
    }elseif (!empty($imgExt) && !empty($imgExt1) && !empty($imgExt2) && !empty($imgExt3) && empty($imgExt4) && empty($imgExt5)) {
      $documentationImage=rand(1000, 1000000).".".$imgExt;
      $documentationImage1=rand(1000, 1000000).".".$imgExt1;
      $documentationImage2=rand(1000, 1000000).".".$imgExt2;
      $documentationImage3=rand(1000, 1000000).".".$imgExt3;
      move_uploaded_file($tmp_dir, $upload_dir.$documentationImage);
      move_uploaded_file($tmp_dir1, $upload_dir.$documentationImage1);
      move_uploaded_file($tmp_dir2, $upload_dir.$documentationImage2);
      move_uploaded_file($tmp_dir3, $upload_dir.$documentationImage3);
    }elseif (!empty($imgExt) && !empty($imgExt1) && !empty($imgExt2) && empty($imgExt3) && empty($imgEx4t) && empty($imgExt5)) {
      $documentationImage=rand(1000, 1000000).".".$imgExt;
      $documentationImage1=rand(1000, 1000000).".".$imgExt1;
      $documentationImage2=rand(1000, 1000000).".".$imgExt2;
      move_uploaded_file($tmp_dir, $upload_dir.$documentationImage);
      move_uploaded_file($tmp_dir1, $upload_dir.$documentationImage1);
      move_uploaded_file($tmp_dir2, $upload_dir.$documentationImage2);
    }elseif (!empty($imgExt) && empty($imgExt1) && empty($imgExt2) && empty($imgExt3) && empty($imgExt4) && empty($imgExt5)) {
      $documentationImage=rand(1000, 1000000).".".$imgExt;
      $documentationImage1=rand(1000, 1000000).".".$imgExt1;
      move_uploaded_file($tmp_dir, $upload_dir.$documentationImage);
      move_uploaded_file($tmp_dir1, $upload_dir.$documentationImage1);
    }elseif (empty($imgExt) && empty($imgExt1) && empty($imgExt2) && empty($imgExt3) && empty($imgExt4) && empty($imgExt5)) {
      $documentationImage=rand(1000, 1000000).".".$imgExt;
      move_uploaded_file($tmp_dir, $upload_dir.$documentationImage);
    }

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

    $images1=$_FILES['image1']['name'];
    $tmp_dir1=$_FILES['image1']['tmp_name'];
    $imageSize1=$_FILES['image1']['size'];

    $images2=$_FILES['image2']['name'];
    $tmp_dir2=$_FILES['image2']['tmp_name'];
    $imageSize2=$_FILES['image2']['size'];

    $images3=$_FILES['image3']['name'];
    $tmp_dir3=$_FILES['image3']['tmp_name'];
    $imageSize3=$_FILES['image3']['size'];

    $images4=$_FILES['image4']['name'];
    $tmp_dir4=$_FILES['image4']['tmp_name'];
    $imageSize4=$_FILES['image4']['size'];

    $images5=$_FILES['image5']['name'];
    $tmp_dir5=$_FILES['image5']['tmp_name'];
    $imageSize5=$_FILES['image5']['size'];

    $upload_dir='uploads/';
    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
    $imgExt1=strtolower(pathinfo($images1,PATHINFO_EXTENSION));
    $imgExt2=strtolower(pathinfo($images2,PATHINFO_EXTENSION));
    $imgExt3=strtolower(pathinfo($images3,PATHINFO_EXTENSION));
    $imgExt4=strtolower(pathinfo($images4,PATHINFO_EXTENSION));
    $imgExt5=strtolower(pathinfo($images5,PATHINFO_EXTENSION));
    $valid_extensions=array('jpeg', 'jpg', 'png');

    $documentationImage=null;
    $documentationImage1=null;
    $documentationImage2=null;
    $documentationImage3=null;
    $documentationImage4=null;
    $documentationImage5=null;
    if (!empty($imgExt) && !empty($imgExt1) && !empty($imgExt2) && !empty($imgExt3) && !empty($imgExt4) && !empty($imgExt5)) {
      // code...
      $documentationImage=rand(1000, 1000000).".".$imgExt;
      $documentationImage1=rand(1000, 1000000).".".$imgExt1;
      $documentationImage2=rand(1000, 1000000).".".$imgExt2;
      $documentationImage3=rand(1000, 1000000).".".$imgExt3;
      $documentationImage4=rand(1000, 1000000).".".$imgExt4;
      $documentationImage5=rand(1000, 1000000).".".$imgExt5;
      move_uploaded_file($tmp_dir, $upload_dir.$documentationImage);
      move_uploaded_file($tmp_dir1, $upload_dir.$documentationImage1);
      move_uploaded_file($tmp_dir2, $upload_dir.$documentationImage2);
      move_uploaded_file($tmp_dir3, $upload_dir.$documentationImage3);
      move_uploaded_file($tmp_dir4, $upload_dir.$documentationImage4);
      move_uploaded_file($tmp_dir5, $upload_dir.$documentationImage5);
    }elseif (!empty($imgExt) && !empty($imgExt1) && !empty($imgExt2) && !empty($imgExt3) && !empty($imgExt4) && empty($imgExt1)) {
      $documentationImage=rand(1000, 1000000).".".$imgExt;
      $documentationImage1=rand(1000, 1000000).".".$imgExt1;
      $documentationImage2=rand(1000, 1000000).".".$imgExt2;
      $documentationImage3=rand(1000, 1000000).".".$imgExt3;
      $documentationImage4=rand(1000, 1000000).".".$imgExt4;
      move_uploaded_file($tmp_dir, $upload_dir.$documentationImage);
      move_uploaded_file($tmp_dir1, $upload_dir.$documentationImage1);
      move_uploaded_file($tmp_dir2, $upload_dir.$documentationImage2);
      move_uploaded_file($tmp_dir3, $upload_dir.$documentationImage3);
      move_uploaded_file($tmp_dir4, $upload_dir.$documentationImage4);
    }elseif (!empty($imgExt) && !empty($imgExt1) && !empty($imgExt2) && !empty($imgExt3) && empty($imgExt4) && empty($imgExt5)) {
      $documentationImage=rand(1000, 1000000).".".$imgExt;
      $documentationImage1=rand(1000, 1000000).".".$imgExt1;
      $documentationImage2=rand(1000, 1000000).".".$imgExt2;
      $documentationImage3=rand(1000, 1000000).".".$imgExt3;
      move_uploaded_file($tmp_dir, $upload_dir.$documentationImage);
      move_uploaded_file($tmp_dir1, $upload_dir.$documentationImage1);
      move_uploaded_file($tmp_dir2, $upload_dir.$documentationImage2);
      move_uploaded_file($tmp_dir3, $upload_dir.$documentationImage3);
    }elseif (!empty($imgExt) && !empty($imgExt1) && !empty($imgExt2) && empty($imgExt3) && empty($imgEx4t) && empty($imgExt5)) {
      $documentationImage=rand(1000, 1000000).".".$imgExt;
      $documentationImage1=rand(1000, 1000000).".".$imgExt1;
      $documentationImage2=rand(1000, 1000000).".".$imgExt2;
      move_uploaded_file($tmp_dir, $upload_dir.$documentationImage);
      move_uploaded_file($tmp_dir1, $upload_dir.$documentationImage1);
      move_uploaded_file($tmp_dir2, $upload_dir.$documentationImage2);
    }elseif (!empty($imgExt) && empty($imgExt1) && empty($imgExt2) && empty($imgExt3) && empty($imgExt4) && empty($imgExt5)) {
      $documentationImage=rand(1000, 1000000).".".$imgExt;
      $documentationImage1=rand(1000, 1000000).".".$imgExt1;
      move_uploaded_file($tmp_dir, $upload_dir.$documentationImage);
      move_uploaded_file($tmp_dir1, $upload_dir.$documentationImage1);
    }elseif (empty($imgExt) && empty($imgExt1) && empty($imgExt2) && empty($imgExt3) && empty($imgExt4) && empty($imgExt5)) {
      $documentationImage=rand(1000, 1000000).".".$imgExt;
      move_uploaded_file($tmp_dir, $upload_dir.$documentationImage);
    }
    
    $sql = "UPDATE `outreach_activity` SET `type`= ?,`title`= ?,`proponent`= ?,`date`= ?,`venue`= ?,`target_p`= ?,`mean`= ?,`interpretation`= ?,`documentation`= ?,`image`= ?, `image1`= ?,`image2`= ?,`image3`= ?,`image4`= ?,`image5`= ? WHERE `outreach_activity_id` = '$outreach_activity_id'";
    $data = $pdo->prepare($sql);
    $data->execute([$type,$title,$proponent,$date,$venue,$target_p,$mean,$interpretation,$documentation,$documentationImage,$documentationImage1,$documentationImage2,$documentationImage3,$documentationImage4,$documentationImage5]);
  }
}
?>

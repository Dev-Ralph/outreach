<?php
class logout{
public function logoutUser(){
if(isset($_GET['logout'])){
  session_destroy();
  header("Location: index.php");
}
}
}
?>

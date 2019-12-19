<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/db/config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor\autoload.php';
class send_mail extends config{
public function __construct($username_retrieve=null){
  $this->username_retrieve = $username_retrieve;
}

public function retrieve(){
  $config = new config;
  $pdo = $config->Con();
  $username_retrieve = $this->username_retrieve;
  $s = $pdo->prepare("SELECT * FROM `account` WHERE `username` = '$username_retrieve'");
  $s->execute();
  $results = $s->fetchAll();
  foreach ($results as $result) {
      $username = $result->username;
      $password = $result->password;
      $email = $result->email;
    }

if(empty($email)){
    header("location: index.php?sent=false");
    exit();
}
$mail = new PHPMailer();
try{

$mail->SMTPDebug = 1;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com;';
    $mail->SMTPAuth = true;
    $mail->Username = 'ceu.outreach.program@gmail.com';
    $mail->Password = 'ceumalolos';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //Sender
    $mail->setFrom('ceu.outreach.program@gmail.com');
    // Recipient
    $mail->addAddress($email);
    // Body-Content
    $body = "<strong>Hello!</strong>,
    We have received a notice that you are encountering problems when loging in.</p><p>
    Don't worry here is your login credentials.
    </p><p>
    Username: <strong>".$username."</strong>
    </p><p>
    Password: <strong>".$password."</strong>
    </p>";
    //Content
    $mail->isHTML(true);
    $mail->Subject = 'LOGIN CREDENTIALS FOR CEU MALOLOS COMMUNITY OUTREACH PROGRAM SYSTEM';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($email);

    $mail->send();
    header("location: index.php?sent=true");


} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}
}
 ?>

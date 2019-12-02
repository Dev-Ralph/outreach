<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor\autoload.php';

$email = $_POST['email'];
// Validation (para hindi mag send ng blank info yung user)
if(empty($email)){
    header("location: index.php?nomessage");
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
    Username:
    </p><p>
    Password:
    </p>";
    //Content
    $mail->isHTML(true);
    $mail->Subject = 'LOGIN CREDENTIALS FOR CEU MALOLOS COMMUNITY OUTREACH PROGRAM SYSTEM';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($email);

    $mail->send();
    // header("location: sent.php");


} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
 ?>

<?php
session_start();
$_SESSION;

$error = NULL;
$smtp_debug = true;

if(isset($_POST['submit'])){            //vezme si informace z formu
$name = $_POST['name'];
$message = $_POST['message'];
$email = $_POST['email'];


if(strlen($name)<5){
$error= "<p>Username needs to be more than 5 chracters</p>";
}else{
require 'phpmailer/PHPMailerAutoload.php';          //pouzije phpmailer pro poslani tehto emailu na emaily a gmaili

$mail = new PHPMailer;

                                                    //urceni potrebnych informaci o poslanem emailu

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'matyasvaskes@gmail.com';
$mail->Password = 'VaskeS1-.';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('matyasvaskes@gmail.com');
$mail->addAddress('matyasvaskes@gmail.com');
$mail->addAddress('matyasvascak@gmail.com');

$mail->Subject = 'Message Recieved(Contact Page)';
$mail->Body = "<h3>Name : $name <br>Email : $email<br>Message : $message</h3>";


if(!$mail->send()) {
echo 'Message could not be sent.';
echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
//echo 'Message has been sent';
}
}
}
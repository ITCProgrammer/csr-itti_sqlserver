<?php
//ini_set("display_errors", 0) ;
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer(); // create a new object
$mail->isSMTP(); // enable SMTP
$mail->SMTPDebug = 4; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'starttls'; //ssl secure transfer enabled REQUIRED for Gmail
$mail->Host = "mail.indotaichen.com";
$mail->Port = 587; // or 587 465
$mail->IsHTML(true);
$mail->Username = "admqc@indotaichen.com";
$mail->Password = "Itc0920";
$mail->SetFrom("admqc@indotaichen.com");
$mail->Subject = "Test 1";
$mail->Body = "hello 1";
$mail->AddAddress("usmanasasas@hotmail.com");
$mail->AddAddress("usman@indotaichen.com");
$mail->AddAddress("admin@usmanas.web.id");

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }

?>
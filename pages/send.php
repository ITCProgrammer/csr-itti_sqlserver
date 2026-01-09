<?php
ini_set("display_errors", 0) ;
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
// Konfigurasi SMTP
$mail->isSMTP();
$mail->Host = 'mail.indotaichen.com'; //mail.usmanas.web.id / mail.indotaichen.com
$mail->SMTPAuth = true;
$mail->Username = 'admqc@indotaichen.com'; //usman@usmanas.web.id / dept.it@indotaichen.com
$mail->Password = 'Itc0920'; //fariz001 / D1t2017
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('admqc@indotaichen.com', 'admqc');
$mail->addReplyTo('admqc@indotaichen.com', 'admqc');

// Menambahkan penerima
$mail->addAddress('usman.as@indotaichen.com');
$mail->addAddress('usmanas.as@gmail.com');
//$mail->addBCC('usmanas.as@gmail.com');

// Subjek email
$mail->Subject = 'test email 1';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent ='noted 1';
$mail->Body = $mailContent;

// Menambahakn lampiran
//$mail->addAttachment('lmp/file1.pdf');
//$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

// Kirim email
if(!$mail->send()){
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;	
}else{
    echo 'Pesan telah terkirim';
	
}
?>
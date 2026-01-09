<?php
    ini_set( 'display_errors', 1 );   
    error_reporting( E_ALL );    
    $from = $_POST[email];    
    $to = "usman@usmanas.web.id";    
    $subject = $_POST[name];    
    $message = $_POST[isi];   
    $headers = "From:" . $from;    
    mail($to,$subject,$message, $headers);    
    echo "Pesan email sudah terkirim.";
?>
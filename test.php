<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "me@kristianavellucci.com";
    $to = "me@kristianavellucci.com";
    $subject = "PHP Mail Test script";
    $message = "This is a test to check the PHP Mail functionality";
//    $headers = "From:" . $from;
    
$headers = 'From: me@kristianavellucci.com' . "\r\n" .
    'Reply-To: me@kristianavellucci.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();


    mail($to,$subject,$message, $headers);
    echo "Test email sent";

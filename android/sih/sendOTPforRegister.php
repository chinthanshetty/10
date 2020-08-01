<?php
if(isset($_POST['email'])){
    $email = $_POST['email'];
}
if(isset($_POST['otp'])){
    $otp = $_POST['otp'];
}
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "sih@betterfuture.tech";
    $to = $email;
    $subject = "Verify email for BetterFuture";
    $message = "Hello there ! ".$otp." is your otp for registering your account. Please enter the otp in the site/app to finish your register process";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "The email message was sent.";
?>

<?php
if(isset($_POST['To'])){
    $To = $_POST['To'];
}
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $name=$_POST['From'];
    $from = "sih@betterfuture.tech";
    $to = $To;
    $subject = "New Resume Request";
    $message = "Hello there ! You Have a new Resume Request from ".$name;
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "The email message was sent.";
?>

<?php
include('server.php');
session_start();
$user_check=$_SESSION['username'];
$ses_sql=mysqli_query($db,"select email from allusers where username='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$email=$row['email'];
$otp2=$_SESSION['otp'];
?>
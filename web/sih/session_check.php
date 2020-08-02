<?php
include('config.php');
session_start();
$user_check=$_SESSION['username'];
//$user_check2=$_SESSION['username'];
$ses_sql=mysqli_query($con,"select username,uid from allusers where (username='$user_check' OR email='$user_check')");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['username'];
$loggedin_id=$row['uid'];
if(!isset($loggedin_session)||$loggedin_session==NULL){
    echo "go back";
    header("Location:index.php");
}
?>
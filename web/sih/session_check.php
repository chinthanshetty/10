<?php
include('server.php');
session_start();
$user_check=$_SESSION['username'];
$ses_sql=mysqli_query($db,"select username,uid from allusers where username='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['username'];
$loggedin_id=$row['uid'];
if(!isset($loggedin_session)||$loggedin_session==NULL){
    echo "go back";
    header("Location:index.php");
}
?>
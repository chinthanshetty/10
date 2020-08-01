<?php


include('server.php');
$jobid = $_GET['jid'];
$job=mysqli_query($db,"select jdid from jobdetails where jid='$jobid'");
                    $row4=mysqli_fetch_array($job,MYSQLI_ASSOC);
                    $jid=$row4['jdid'];
                    echo $jid;
$del2=mysqli_query($db," delete from jobdetails where jdid='$jid'");
mysqli_query($db,$del2);
$del = mysqli_query($db,"delete  from jobs where jid = '$jobid'");
mysqli_query($db,$del);
if($del)
{
     mysqli_close($db); // Close connection
    header("location:profile_company.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}


?>
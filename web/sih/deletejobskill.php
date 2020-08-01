<?php


include('server.php');
$jdid = $_GET['jdid'];

$del2=mysqli_query($db," delete from jobdetails where jdid='$jdid'");
mysqli_query($db,$del2);
if($del2)
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
<?php


include('server.php');
$expid = $_GET['eid'];
$del = mysqli_query($db,"delete  from experience where eid = '$expid'");
mysqli_query($db,$del);
if($del)
{
     mysqli_close($db); // Close connection
    header("location:profile.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}


?>
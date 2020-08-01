<?php


include('server.php');
$udid = $_GET['udid'];
$del = mysqli_query($db,"delete  from userdegree where udid = '$udid'");
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

      <!DOCTYPE html>

<html lang="en">
      
     <head>
     <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Password Change</title>
     </head>
    <body>
    <h1>Change Password</h1>
   <form method="POST" action="update_pwd.php">
    <table>
    <tr>
   <td>Enter your UserName</td>
    <td><input type="username" size="10" name="username"></td>
    </tr>
    <tr>
    <td>Enter your existing password:</td>
    <td><input type="password" size="10" name="password"></td>
    </tr>
  <tr>
    <td>Enter your new password:</td>
    <td><input type="password" size="10" name="newpassword"></td>
    </tr>
    <tr>
   <td>Re-enter your new password:</td>
   <td><input type="password" size="10" name="confirmnewpassword"></td>
    </tr>
    </table>
    <p><input type="submit"  name="update"  value="Update Password">
    </form>
   <p><a href="home.php">Home</a>
   <p><a href="logout.php">Logout</a>
   </body>
   <?php
#session_start();
include('session_check.php');
if(isset($_POST['update'])) { 
$username = $_POST['username'];
        $password = $_POST['password'];
        $newpassword = $_POST['newpassword'];
        $confirmnewpassword = $_POST['confirmnewpassword'];
        $result = mysql_query("SELECT password FROM allusers WHERE 
uid='$loggedin_id'");
        if(!$result)
        {
        echo "The username you entered does not exist";
        }
        else if($password!= mysql_result($result, 0))
        {
        echo "You entered an incorrect password";
        }
        if($newpassword=$confirmnewpassword)
        $sql=mysql_query("UPDATE allusers SET password='$newpassword' where 

 uid='$loggedin_id'");
        if($sql)
        {
        echo "Congratulations You have successfully changed your password";
        }
       else
        {
       echo "Passwords do not match";
       }
}
      ?>
    </html> 
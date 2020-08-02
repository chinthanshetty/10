<?php
$db = mysqli_connect('localhost', 'u453846619_sih', 'HHHaac@6', 'u453846619_sih2');
if($db){
    echo "";
}
else{
    echo "error";
}
include('session_check.php');
#echo "$loggedin_id";
$select = "select * from allusers where uid=$loggedin_id";
$query=mysqli_query($db,$select);
$data=mysqli_fetch_assoc($query);

$oldpwd=$data['password'];
if(isset($_POST['save']))
{
    $current=md5($_POST['current']);
    $new=md5($_POST['new']);
    $confirm=md5($_POST['confirm']);

    if($current==$oldpwd){
        if($new==$confirm){
              $update="update allusers set password='$new' where uid=$loggedin_id";
              $query=mysqli_query($db,$update);
              if($query){
                  echo "Password updated successfully";
              }
              else{
                  echo "passwords do not match";
              }
        }
    }
    else{
        echo "wrong password";
    }
}
?>
<!DOCTYPE html>

<html lang="en">


<head>
 
 <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
 <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="assets/css/all.css">

  <!-- Bootstrap -->
 
 <link rel="stylesheet" href="assets/css/bootstrap.css">

  <!-- Custom -->
 
 <link rel="stylesheet" href="assets/css/style.css">


<style>body{
    background-color: #F8F9FA;
  }

  .co{
    text-decoration: none;
    color: white;
  }
  .a{
    background-color: #28bcff;
  }
  .a:hover{
    background-color: #2196f3;
  }
  .al{
    background-color: #2196f3;
  }
  </style>

  <title>Account Setting</title>
</head>

<body>


 
 <!-- Navbar -->
 
 <nav class="navbar navbar-expand-lg navbar-dark al fixed-top">

    <div class="container">
 
     <a class="navbar-brand" href="index.php">
  
      <img src="assets/img/" class="logo" alt="">
      </a>
 
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup">

        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
 
       <ul class="navbar-nav">

          <li class="nav-item mr-3">

            <a class="nav-link" href="login_company.php">Login</a>
          </li>
          
          
        </ul>


        <ul class="navbar-nav ml-auto">
 
         <li class="nav-item mr-3">
 
           <a class="nav-link" href="profile_company.php">
 
             <i class="fas fa-user-plus"></i> Back</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>


  <section id="login" class="bg-light py-5">

    <div class="container">

      <div class="row">

        <div class="col-md-6 mx-auto">

          <div class="card">

            <div class="card-header a text-white">

              <h4>
 
               <i class="fas fa-sign-in-alt"></i> Login</h4>
            </div>

            <div class="card-body">

              <form method="post" action="">

                  <?php include('errors.php'); ?>
                  <div class="form-group">

                  <label>Current Password</label>

                  <input type="text" name="current" class="form-control" required>
                </div>

                <div class="form-group">

                  <label>New Password</label>

                  <input type="text" name="new" class="form-control" required>
                </div>

                <div class="form-group">

                  <label>Confirm Password</label>

                  <input type="text" name="confirm" class="form-control" required>
                </div>

                <button type="submit"  name="save" class="btn btn-secondary btn-block a" >Login</button><br>
 
               
 </form>
</div>
</div>
</div>
</div>
</div>
</section>


<!-- Footer -->

<footer id="main-footer" class="py-4 fixed-bottom al text-white text-center">
  Copyright &copy;
  <span class="year"></span> Better Career
</footer>


<script src="assets/js/jquery-3.3.1.min.js "></script>

<script src="assets/js/bootstrap.bundle.min.js "></script>

<script src="assets/js/main.js "></script>
</body>

</html>

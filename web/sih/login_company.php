<?php include('config.php') ;
session_start();
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM allusers WHERE ( username='$username' OR email='$username') AND password='$password'";
  	$results = mysqli_query($con, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      
  	  header("location: profile_company.php");
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
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

<br>
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

  <title>Log In</title>
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

            <a class="nav-link" href="index.php">Home</a>
          </li>
          
          
        </ul>


        <ul class="navbar-nav ml-auto">
 
         <li class="nav-item mr-3">
 
           <a class="nav-link" href="register_company.php">
 
             <i class="fas fa-user-plus"></i> Register</a>
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

              <form method="post" action="login_company.php">

                  <?php include('errors.php'); ?>

                <div class="form-group">

                  <label for="username">Username</label>

                  <input type="text" name="username" class="form-control" required>
                </div>


                <div class="form-group">

                  <label for="password2">Password</label>

                  <input type="password" name="password" class="form-control" required>
                </div>


                <button type="submit" name="login_user" class="btn btn-secondary btn-block a"  >Login</button><br>
 
               
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

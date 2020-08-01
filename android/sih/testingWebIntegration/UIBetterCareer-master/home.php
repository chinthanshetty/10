<?php
session_start();
if(isset($_SESSION['username']))
{
  $username=$_SESSION['username'];
  $_SESSION['user']=$username;
  
}
?>


<!DOCTYPE html>
<html>
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


  <title>Better Career</title>
</head>
<body>

<!-- Navbar -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">

    <div class="container">

      <a class="navbar-brand" href="index.php">

        <img src="assets/img/" class="logo" alt="">
      </a>
 
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup">
 
       <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
 
       <ul class="navbar-nav">
 
         <li class="nav-item active mr-3">
 
           <a class="nav-link" href="index.php">Home</a>
 
         </li>
        
  
        </ul>

	<ul class="navbar-nav">
 
         <li class="nav-item active mr-3">
 
           <a class="nav-link" href="profile.php">Profile</a>
 
         </li>
        
  
        </ul>
        <ul class="navbar-nav ml-auto">
 
         <li class="nav-item mr-3">
 
           <a class="nav-link" href="logout.php">
 
             <i class="fas fa-user-plus"></i>Logout</a>
          </li>
          
        </ul>

        
      </div>
    </div>
  </nav>



  <section id="showcase">

    <div class="container text-center">
  
    <div class="home-search p-5">
  
      <div class="overlay p-5">
     
     <h1 class="display-4 mb-4">
            Better Career
          </h1>
    
      <p class="lead">WELCOME <?php echo $username; ?> </p><br /><br />

          
                 
 
            
          </div>
        </div>
      </div>
    
  </section>

 
 

  <!-- Footer -->
  <footer id="main-footer" class="py-4 bg-primary text-white text-center">
    Copyright &copy;
    <span class="year"></span> Better Career
  </footer>

  <script src="assets/js/jquery-3.3.1.min.js "></script>
 
 <script src="assets/js/bootstrap.bundle.min.js "></script>
  <script src="assets/js/main.js "></script>

		
</body>
</html>
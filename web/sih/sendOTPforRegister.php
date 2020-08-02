
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
  <title>Register</title>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark al sticky-top">
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

       
      </div>
    </div>
  </nav>

  <section id="register" class="bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-header a text-white">
              <h4>
                <i class="fas fa-user-plus"></i> Confirmation using OTP</h4>
            </div>
            <div class="card-body">
	
  <form method="post" action=" ">
  	
	
	<div class="form-group">
		<label for="OTP">Enter OTP</label>
		<input type="number" name="OTP" class="form-control" required value="">
	</div>
    <button type="submit" class="btn btn-secondary btn-block a" name="otpsub" >Submit</button>
  	<?php
    //include('otpset.php');
    
    include('reg.php');
    include('config.php');
        if(isset($_POST['otpsub'])){
                $otp1=$_POST['OTP'];
                echo $otp1;
                
                echo $otp2;
                if($otp1==$otp2){
                  $query = "INSERT INTO allusers (firstname,lastname, username, email, password,usertype)  VALUES('$firstname','$lastname', '$username', '$email', '$password',$type)";
  	              mysqli_query($con, $query);
                    header("location:login.php");
                }
                else{
                    echo "Invalid OTP";
                   // header("location:sendOTPforRegister.php");
                }
        }

      ?>
  	
      </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    
      <!-- Footer -->
      <footer id="main-footer" class="py-4 al text-white text-center fixed-bottom">
        Copyright &copy;
        <span class="year"></span> Better Career
      </footer>
    
    
      <script src="assets/js/jquery-3.3.1.min.js "></script>
      <script src="assets/js/bootstrap.bundle.min.js "></script>
      <script src="assets/js/main.js "></script>
    </body>
    </html>
    

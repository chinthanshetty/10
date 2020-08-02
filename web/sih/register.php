<?php include('config.php') ;
//include('otpset.php');
include('reg.php');
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $firstname= mysqli_real_escape_string($con, $_POST['firstname']);
  $lastname= mysqli_real_escape_string($con, $_POST['lastname']);
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password_1 = mysqli_real_escape_string($con, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($con, $_POST['password_2']);
//  $usertype= mysqli_real_escape_string($db, $_POST['usertype']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM allusers WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
    $_SESSION['firstname']=$firstname;
    $_SESSION['lastname']=$lastname;
    $_SESSION['username']=$username;
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;
    $_SESSION['type']="1";
    $_SESSION['success'] = "You are now logged in";
    include('reg.php');
    $rndno=rand(100000, 999999);//OTP generate
    
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "sih@betterfuture.tech";
    $to = $email;
    $subject = "Verify email for BetterFuture";
    $message = "Hello there ! ".$rndno." is your otp for registering your account. Please enter the otp in the site/app to finish your register process";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "The email message was sent.";
    $_SESSION['otp']=$rndno;
  	header('location: sendOTPforRegister.php');
  }
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

        <ul class="navbar-nav ml-auto">
         
          <li class="nav-item mr-3">
            <a class="nav-link" href="login.php">
              <i class="fas fa-sign-in-alt"></i>

              Login</a>
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
                <i class="fas fa-user-plus"></i> Register Employee</h4>
            </div>
            <div class="card-body">
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
	
	<div class="form-group">
		<label for="firstname">First Name</label>
		<input type="text" name="firstname" class="form-control" required value="<?php echo $firstname; ?>">
	</div>
	<div class="form-group">
		<label for="lastname">Last Name</label>
	    <input type="text" name="lastname" class="form-control" required value="<?php echo $lastname; ?>">
	</div>
  	<div class="form-group">
  	  <label>Username</label>
  	  <input type="text" name="username" class="form-control" required value="<?php echo $username; ?>">
  	</div>
  	<div class="form-group">
  	  <label>Email</label>
  	  <input type="email" name="email" class="form-control" required value="<?php echo $email; ?>">
  	</div>
  	<div class="form-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1" class="form-control" required>
  	</div>
  	<div class="form-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2" class="form-control" required>
  	</div>
	
  	
  	  <button type="submit" class="btn btn-secondary btn-block a" name="reg_user" >Register</button>
  	
  	
  </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<br><br>
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

<?php include('server_company.php') ?>
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
  </style>
  <title>Register</title>
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
          <li class="nav-item mr-3">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          
        </ul>

        <ul class="navbar-nav ml-auto">
         
          <li class="nav-item mr-3">
            <a class="nav-link" href="login_company.php">
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
            <div class="card-header bg-primary text-white">
              <h4>
                <i class="fas fa-user-plus"></i> Register</h4>
            </div>
            <div class="card-body">
	
  <form method="post" action="register_company.php">
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
	
  	
  	  <button type="submit" class="btn btn-secondary btn-block" name="reg_user" >Register</button>
  	
  	
  </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer id="main-footer" class="py-4 bg-primary text-white text-center fixed-bottom">
    Copyright &copy;
    <span class="year"></span> Better Career
  </footer>


  <script src="assets/js/jquery-3.3.1.min.js "></script>
  <script src="assets/js/bootstrap.bundle.min.js "></script>
  <script src="assets/js/main.js "></script>
</body>
</html>


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
  </style>


  <title>Log In</title>
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
 
           <a class="nav-link" href="home.php">
 
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

            <div class="card-header bg-primary text-white">

              <h4>
 
               <i class="fas fa-sign-in-alt"></i> Your Profile</h4>
            </div>

            <div class="card-body">

              
                <div class="form-group">

                  <p class="form-control">Username: 

<?php

include('server_company.php');

error_reporting(0);
// initializing variables
$username = "";
$email    = "";

$db = mysqli_connect('localhost', 'root', '', 'bettercareer');

$user=$_SESSION['username'];

  	$query = "SELECT * FROM allusers WHERE username='$user'";
$result = mysqli_query($db, $query);
while($r=mysqli_fetch_array($result))
{
echo $r['username'];

}

?>
</p>
<p class="form-control">Email: 
<?php

include('server_company.php');

error_reporting(0);
// initializing variables
$username = "";
$email    = "";

$db = mysqli_connect('localhost', 'root', '', 'bettercareer');

$user=$_SESSION['username'];

  	$query = "SELECT * FROM allusers WHERE username='$user'";
$result = mysqli_query($db, $query);
while($r=mysqli_fetch_array($result))
{
echo $r['email'];

}

?>
</p>
              </div>


                
                
               
                          </div>
          </div>
        </div>
      </div>
    </div>

  </section>


  <!-- Footer -->

  <footer id="main-footer" class="py-4 fixed-bottom bg-primary text-white text-center">
    Copyright &copy;
    <span class="year"></span> Better Career
  </footer>


  <script src="assets/js/jquery-3.3.1.min.js "></script>

  <script src="assets/js/bootstrap.bundle.min.js "></script>

  <script src="assets/js/main.js "></script>
</body>

</html>
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
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="acss/bootstrap.min.css">
    <link rel="stylesheet" href="acss/owl.carousel.min.css">
    <link rel="stylesheet" href="acss/magnific-popup.css">
    <link rel="stylesheet" href="acss/font-awesome.min.css">
    <link rel="stylesheet" href="acss/themify-icons.css">
    <link rel="stylesheet" href="acss/nice-select.css">
    <link rel="stylesheet" href="acss/flaticon.css">
    <link rel="stylesheet" href="acss/gijgo.css">
    <link rel="stylesheet" href="acss/animate.min.css">
    <link rel="stylesheet" href="acss/slicknav.css">

    <link rel="stylesheet" href="acss/style.css">

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

  <section id="listings" class="py-4">
    <div class="container">
      <div class="row">



      

       <?php
       include('session_check.php');
       $homie="SELECT allusers.firstname as Company_Name,matched.jobname as Job_Name,matched.jobdiscription as Job_Discription,(matched.skillsmatched/allmatches.totalskillsinthejob)*100 as Match_Percentage FROM
       (SELECT j.jid as jobid,j.jname as jobname,j.uid as companyid,j.discription as jobdiscription, count(*) as skillsmatched from jobs j,skills s, jobdetails jd, allusers u where u.uid=s.uid and u.username='$loggedin_session' and s.tid=jd.tid and jd.jid=j.jid group by j.jid) matched
       JOIN
       (SELECT jd.jid as jobid, count(*) as totalskillsinthejob from jobdetails jd group by jd.jid) allmatches
       ON matched.jobid=allmatches.jobid
       JOIN allusers on allusers.uid=matched.companyid
       ORDER BY Match_Percentage desc";
       $home=mysqli_query($db,$homie);
       while($rw=mysqli_fetch_array($home)){
         ?>
 


 <!-- <div style="clear:both">
         <p><?php echo $rw['Company_Name'].'-'.$rw['Job_Name'].'-'.$rw['Job_Discription'].'-'.$rw['Match_Percentage'];?></p><br>
         </div> -->
  <!-- Listing 1 -->
  <div class="col-md-6 col-lg-4 mb-4">
          <div class="card listing-preview">
            <img class="card-img-top" src="assets/img/compic/" alt="">
            <div class="card-img-overlay">
            </div>
            <div class="card-body">
              <div class="listing-heading text-center">
                <h4 class="text-primary"><?php echo $rw['Company_Name'];?></h4>
                
              </div>
              <hr>
              <div class="row py-2 text-secondary">
                <div class="col-6">
                  <i class="fas fa-th-large"></i> Skill: <?php echo $rw['Job_Name'];?> </div>
                <div class="col-6">
                  <i class="fas fa-car"></i>  Skill match :<?php echo $rw['Match_Percentage'];?> </div>
              </div>
           
              <hr>

              <div class="row py-2 text-secondary">
              <div class="col-12">
                  <i class="fas fa-th-large"></i> Skill: <?php echo $rw['Job_Discription'];?> </div>
              </div>
              <hr>
              <a href="listing.html" class="btn btn-primary btn-block">Apply Now</a>
            </div>
          </div>
        </div>

       <?php
      }
      ?>
                 
      
      


      
      
      
      
      
      </div>

</div>
</section>

  



 


 
 

  <!-- Footer -->
  <footer id="main-footer" class="py-4 bg-primary fixed-bottom text-white text-center">
    Copyright &copy;
    <span class="year"></span> Better Career
  </footer>

  <script src="assets/js/jquery-3.3.1.min.js "></script>
 
 <script src="assets/js/bootstrap.bundle.min.js "></script>
  <script src="assets/js/main.js "></script>

		
</body>
</html>

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
<script type="text/javascript">
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
        </script>
        <style>
            .goog-logo-link {
                display:none !important;
             } 
             
             .goog-te-gadget{
                color: transparent !important;
             }
				.goog-te-banner-frame.skiptranslate{
			display: none;
		}

</style>
  <title>Better Career</title>
</head>
<body>

<!-- Navbar -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">

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
 
           <a class="nav-link" href="account.php">
 
             <i class="fas fa-user-plus"></i>Account Setting</a>
          </li>
          
 
         <li class="nav-item mr-3">
 
           <a class="nav-link" href="logout.php">
 
             <i class="fas fa-sign-in-alt"></i>Logout</a>
          </li>
          <span id="google_translate_element" class="btn"> </span>

        </ul>

        
      </div>
    </div>
  </nav>
	<br><br><br>

  <section id="listings" class="py-4">
    <div class="container">
      <div class="row">



      

       <?php
       include('session_check.php');
       include('config.php');
       $homie="SELECT jobid,firstname as companyname,jname as jobname,discription as jobdiscription,experience,
       location,match_percentage from (SELECT * from(SELECT t3.jobid as jobid,t3.sum/t4.total as match_percentage
        from (select t1.jjid as jobid, sum(t1.cal) as sum from (SELECT j.jid as jjid,j.jdid as jdid ,j.lid as
         jlid, s.lid as slid,  if(s.lid > j.lid, (s.lid-j.lid)*10+100,100-(j.lid-s.lid)*30) as cal from jobdetails j,
          skills s,allusers au where j.tid = s.tid and s.uid = au.uid and au.username=:username) t1 group by t1.jjid)
           t3 join (SELECT jd.jid as jjjid,COUNT(*) as total FROM jobdetails jd GROUP by jd.jid)t4 on t3.jobid=t4.jjjid)t5
            join (SELECT * from jobs)t6 on t6.jid=t5.jobid) t7 join (SELECT firstname,uid from allusers)t8 on t7.uid=t8.uid 
            having match_percentage>=50 order by match_percentage desc";
            
       $home=mysqli_query($con,$homie);
       echo "checking";
       while($rw=mysqli_fetch_array($home)){
         ?>
 


 <!-- <div style="clear:both">
         </p><br>
         </div> -->
  <!-- Listing 1 -->
  <div class="col-md-6 col-lg-4 mb-4">
          <div class="card listing-preview">
            <img class="card-img-top" src="assets/img/compic/" alt="">
            <div class="card-img-overlay">
            </div>
            <div class="card-body">
              <div class="listing-heading text-center">
                <h4 class="text-primary"><?php echo $rw['companyname'];?></h4>
                
              </div>
              <hr>
              <div class="row py-2 text-secondary">
                <div class="col-12">
                  <i class="fas fa-th-large"></i> Skill: <?php echo $rw['jobname'];?> </div>
               
              </div>
		     <div class="row py-2 text-secondary">
               
                <div class="col-12">
                  <i class="fas fa-car"></i>  Skill match :<?php echo round($rw['match_percentage']);?> </div>
              </div>
           
              <hr>

              <div class="row py-2 text-secondary">
              <div class="col-12">
                  <i class="fas fa-th-large"></i> Description: <?php echo $rw['jobdiscription'];?> </div>
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

  <br>

  <br>
  <br>
 


 
 

  <!-- Footer -->
  <footer id="main-footer" class="py-4 bg-primary fixed-bottom text-white text-center">
    Copyright &copy;
    <span class="year"></span> Better Career
  </footer>

  <script src="assets/js/jquery-3.3.1.min.js "></script>
 
 <script src="assets/js/bootstrap.bundle.min.js "></script>
  <script src="assets/js/main.js "></script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		
</body>
</html>

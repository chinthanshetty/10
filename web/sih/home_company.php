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

  <title>Home Company</title>
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
 
         <li class="nav-item active mr-3">
 
           <a class="nav-link" href="index.php">Home</a>
 
         </li>
        
  
        </ul>

	<ul class="navbar-nav">
 
         <li class="nav-item active mr-3">
 
           <a class="nav-link" href="profile_company.php">Profile</a>
 
         </li>
        
  
        </ul>
        <ul class="navbar-nav ml-auto">
 
         <li class="nav-item mr-3">
 
           <a class="nav-link" href="logout.php">
 
             <i class="fas fa-user-plus"></i>Logout</a>
          </li>
		<span id="google_translate_element"> </span>
          
        </ul>

        
      </div>
    </div>
  </nav>


  <section id="listings" class="py-4">
    <div class="container">
      <div class="row">

      <?php
      include('session_check.php');
      include('config.php');
      $homie1="SELECT jjid as jobid,jname as jobname,empusername,firstname,lastname,empdiscription,some/total as match_percentage
      from (SELECT *,sum(cal) as some from (SELECT j.jid as jjid,jj.jname,j.jdid as jdid ,j.lid as jlid,
       s.lid as slid,au.uid as uuid,s.tid as ttid1,  if(s.lid > j.lid, (s.lid-j.lid)*10+100,100-(j.lid-s.lid)*30)
        as cal from jobdetails j, skills s,allusers au,jobs jj where j.tid = s.tid and jj.jid=j.jid and jj.uid=au.uid
         and au.username=:username group by jdid)t1 join (select au.username as empusername,au.firstname as firstname,
          au.lastname as lastname, au.discription as empdiscription,s.tid as ttid from allusers au,skills s where au.uid=s.uid)t2
           on t2.ttid=t1.ttid1 group by jjid,empusername)aa join (SELECT jd.jid as bbjid, COUNT(*) as total from jobdetails 
           jd GROUP by jd.jid)bb on aa.jjid=bb.bbjid having match_percentage>=50 order by match_percentage desc";
          
      $home1=mysqli_query($con,$homie1);
      print_r($home1);
      while($rw=mysqli_fetch_array($home1)){
        ?>

	      
	       <div class="col-md-6 col-lg-4 mb-4">
          <div class="card listing-preview">
            <img class="card-img-top" src="assets/img/compic/" alt="">
            <div class="card-img-overlay">
            </div>
            <div class="card-body">
              <div class="listing-heading text-center">
                <h4 class="text-primary"><?php echo $rw['empusername'];?></h4>
                
              </div>
              <hr>
              <div class="row py-2 text-secondary">
                <div class="col-6">
                  <i class="fas fa-th-large"></i> Skill: <?php echo $rw['firstname'];?> </div>
                <div class="col-6">
                  <i class="fas fa-car"></i>  Skill match :<?php echo $rw['lastname'];?> </div>
              </div>
           
<div class="row py-2 text-secondary">
               
                <div class="col-6">
                  <i class="fas fa-car"></i>  Skill match :<?php echo $rw['match_percentage'];?> </div>
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
  <footer id="main-footer" class="py-4 al text-white text-center fixed-bottom">
    Copyright &copy;
    <span class="year"></span> Better Career
  </footer>

  <script src="assets/js/jquery-3.3.1.min.js "></script>
 
 <script src="assets/js/bootstrap.bundle.min.js "></script>
  <script src="assets/js/main.js "></script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		
</body>
</html>

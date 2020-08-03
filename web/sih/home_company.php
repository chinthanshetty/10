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
<br><br>
<br>
  <section id="listings" class="py-4">
    <div class="container">
      <div class="row">

      <?php
      include('session_check.php');
      include('config.php');
      $homie1=mysqli_query($con,"SELECT *,username as empusername,cal/total as match_percentage from (SELECT *,
      sum(if(slid > jlid, (slid-jlid)*10+100,100-(jlid-slid)*30)) as cal from 
      (SELECT j.jid as jobid,jd.jdid,j.jname as jobname, jd.tid,jd.lid as jlid from jobs j,
       jobdetails jd,allusers au where j.jid=jd.jid and j.uid=au.uid and au.username='$loggedin_session')t1 join
        (SELECT au.username,au.firstname,au.lastname,au.discription as empdiscription,au.email as
         empemail,s.lid as slid,s.tid as tid2 from allusers au,skills s where au.uid=s.uid )t2 on
          t1.tid=t2.tid2 group by jobid,username)t3 join (SELECT jd.jid as jjid,COUNT(*) as total 
          from jobdetails jd GROUP by jd.jid)t4 on t3.jobid=t4.jjid having match_percentage>=50 order by match_percentage desc");
      
      while($rw=mysqli_fetch_array($homie1)){
        $u=$rw['empusername'];
         $r1=mysqli_query($con,"select * from allusers where username='$u'");
         $sql1=mysqli_fetch_array($r1,MYSQLI_ASSOC);
         $email=$sql1['email'];
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
                  <i class="fas fa-th-large"></i> Skill: <?php echo $rw['jobname'];?> </div>
                <div class="col-6">
                  <i class="fas fa-car"></i>  description :<?php echo $rw['empdescription'];?> </div>
              </div>
           
<div class="row py-2 text-secondary">
               
                <div class="col-6">
                  <i class="fas fa-car"></i>  Skill match :<?php echo $rw['match_percentage'];?> </div>
              </div>
              <hr>
              <a href="mailto:<?php echo $email; ?>" class="btn btn-primary btn-block">Contact</a>
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

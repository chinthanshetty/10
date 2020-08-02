<?php
include('config.php');
session_start();
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
    
                <a class="nav-link" href="home_company.php">Home</a>
              </li>
              
              
            </ul>
            <ul class="navbar-nav ml-auto">
     
             <li class="nav-item mr-3">
     
               <a class="nav-link" href="logout.php">
     
                 <i class="fas fa-user-plus"></i>Logout</a>
              </li>
              
            </ul>
    
    
            <!-- <ul class="navbar-nav ml-auto">
     
             <li class="nav-item mr-3">
     
               <a class="nav-link" href="">
     
                 <i class="fas fa-user-plus"></i></a>
              </li>
              
            </ul> -->
          </div>
        </div>
      </nav>
      <br><br>
      <div class="container">
        
          <div class="card pt-4 pb-4 pl-4">
              <h3>Clear your mind, take few minutes to enjoy this session!</h3>
          </div>
      </div>
      <br>
<div class="container">
    <div class="row">

        <?php
        include("session_check.php");
        session_start();
        $result=mysqli_query($con,"select * from skilltest");
        ?>
        <form action="" method="post">
            <?php
        while($row=mysqli_fetch_array($result)){
            $sktid[]=array($row['sktid']);
            $tid[]=array($row['tid']);
            $question1[]=array($row['question1']);
            $question2[]=array($row['question2']);
            $answer1[]=array($row['answer1']);
            $answer2[]=array($row['answer2']);
        
        ?>
        <div class="col-md-8">
         
                    <?php echo $row['question1']; ?>
     
        </div>
        
        <div class="col-md-2">
            
            <div class="form-check">
                <input class="form-check-input" type="radio" name="<?php echo $row['sktid'];?>" id="" value="option1" >
                <label class="form-check-label" for="exampleRadios1">
                  Yes
                </label>
              </div>
              <?php
              if(isset($_POST['1']))
              {
                  $answer1[$row['sktid']]='1';
                  echo $answer1[$row['sktid']];
              }

              ?>
              
        </div>
        <div class="col-md-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="<?php echo $row['sktid'];?>" id="" value="option1" >
                <label class="form-check-label" for="exampleRadios1">
                  No
                </label>
              </div>
              
        </div>
        <?php
        
        }
        ?>
        <input type="submit" name="try">
        </form>
        <?php
        if(isset($_POST['try']))
        {
            while($r=mysqli_fetch_array($answer1))
            {
                echo $r;
            }
        }
        ?>
    </div>
</div>
    

<script src="assets/js/jquery-3.3.1.min.js "></script>

<script src="assets/js/bootstrap.bundle.min.js "></script>

<script src="assets/js/main.js "></script>

      <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </body>
    </html>
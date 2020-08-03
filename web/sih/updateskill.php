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
    
    

          </div>
        </div>
      </nav>
      <br><br><br>
      <div class="container">
        
          <div class="card pt-4 pb-4 pl-4">
              <h3>Clear your mind, take few minutes to enjoy this session!! </h3>
          </div>
      </div>
      <br>
      
<div class="container">
    

        <?php
        include("session_check.php");
        session_start();
        $result=mysqli_query($con,"select * from skilltest");
        ?>
        <form action="" method="post">
            <?php
        while($row=mysqli_fetch_array($result)){
            $sktid[]=$row['sktid'];
            $tidd[]=$row['tid'];
            $question1[]=$row['question1'];
            $question2[]=$row['question2'];
            $answer1[]=$row['answer1'];
            $answer2[]=$row['answer2'];
           
        ?>
        <div class="row">
        <div class="col-md-8">
         
                    <?php echo $row['question1']; ?>
     
        </div>
        
        <div class="col-md-2">
            
            <div class="form-check">
                <input class="form-check-input" type="radio" name="<?php echo $row['sktid'];?>" value="YES" >YES<br>
            </div>
        </div>
        <div class="col-md-2">
            
          <div class="form-check">

                <input class="form-check-input" type="radio" name="<?php echo $row['sktid'];?>" value="NO" >NO<br>
                
              </div>
        </div>
       
     
    
              <?php
              $yes=$_POST[$row['sktid']];
              if($yes=="YES")
              {
                  $answer1[$row['sktid']-1]='1';
                  //echo $answer1[$row['sktid']];
                 // echo "me";
              }

              ?>
              
       
        <?php
        
        }
       // echo $answer1;
        ?>
        
    
         <?php
        if(isset($_POST['SUBMIT']))
        {
            $r1=0;
            
                
            
        }
        ?>
        <?php
$result=mysqli_query($con,"select * from skilltest");
?>

    <?php
while($row=mysqli_fetch_array($result)){
   
?>
</div>




<!-- part 2 -->
<div class="row">
<div class="col-md-8">
 
            <?php echo $row['question2']; ?>

</div>

<div class="col-md-2">
    
    <div class="form-check">
        <input class="form-check-input" type="radio" name="<?php echo $row['sktid'].'r';?>" value="YES" >YES<br>
      </div>
    </div>
        <div class="col-md-2">
    
          <div class="form-check">
        <input class="form-check-input" type="radio" name="<?php echo $row['sktid'].'r';?>" value="NO" >NO<br>
        
      </div>
</div>


      <?php

      $yes=$_POST[$row['sktid'].'r'];
      if($yes=="YES")
      {
          $answer2[$row['sktid']-1]='1';
          //echo $answer2[$row['sktid']];
          
      }

      ?>
       <!-- </div> -->
        <?php
        
        }
       // echo $answer1;
        ?>
        <input type="submit" value="SUBMIT" name="SUBMIT">
    </form>
         <?php
        if(isset($_POST['SUBMIT']))
        {
          $r=0;
        //  print_r($answer1);
          //print_r($answer2);
          /*foreach(array_combine($answer1,$answer2) as $a1 => $a2){
            if($a1==$a2){
                if($a1==1){
              echo $a1;
            }
            }
          }*/
          $count=count($answer1);
          while($count!=$r)
          {
              if($answer1[$r]==$answer2[$r])
              {
                  if($answer1[$r]==1)
                  {
                      //echo "hey";
                      $r1=$r+1;
                      $query=mysqli_query($con,"select * from skilltest where sktid='$r1'");
                      $res=mysqli_fetch_array($query,MYSQLI_ASSOC);
                      $ress=$res['tid'];
                     // echo $ress;
                      //echo $query;
                      $query2=mysqli_query($con,"select * from topics where tid='$ress'");
                      $res2=mysqli_fetch_array($query2,MYSQLI_ASSOC);
                      $ress2=$res2['topicName'];
                      echo "<br>". "You are good at ".$ress2; 
                  }
              }
              $r++;
          }
                
            
        }
       
        ?>
        
      </div>
    </div>
<
<!-- container -->


<script src="assets/js/jquery-3.3.1.min.js "></script>

<script src="assets/js/bootstrap.bundle.min.js "></script>

<script src="assets/js/main.js "></script>

      <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </body>
    </html>
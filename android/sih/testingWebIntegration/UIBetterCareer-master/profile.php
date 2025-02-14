<?php
include('session_check.php');

?>

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

            <a class="nav-link" href="home.php">Home</a>
          </li>
          
          
        </ul>
        <ul class="navbar-nav ml-auto">
 
         <li class="nav-item mr-3">
 
           <a class="nav-link" href="logout.php">
 
             <i class="fas fa-user-plus"></i>Logout</a>
          </li>
          
        </ul>


        <ul class="navbar-nav ml-auto">
 
         <li class="nav-item mr-3">
 
           <a class="nav-link" href="account.php">
 
             <i class="fas fa-user-plus"></i> Account Settings</a>
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
                <?php
                $sql="SELECT * FROM allusers where uid=$loggedin_id";
                $result=mysqli_query($db,$sql);
                ?>
                <?php
                while($rows=mysqli_fetch_array($result)){
                  ?>
                

                  <p class="form-control">Username: <?php echo $rows['username']; ?> 


</p>
<p class="form-control">Email:<?php echo $rows['email']; ?> 

</p>

              </div>


                <?php
                }
                ?>
                
               
                          </div>
          </div>
        </div>
      </div>
    </div>

  </section>
<!-- skill -->
 
 <section id="skills" class="bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header bg-primary text-white">
              <h4>
                <i class="fas fa-user-plus"></i> Add Skills</h4>
            </div>
            <div class="card-body">
              <form method="post" action="profile.php">
        
                <div class="form-group">
                  <select name="specialization" class="form-control" id="type">
                    <option selected="true" disabled="disabled">Specialization</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Data science">Data Science</option>
                    <option value="Design">Design</option>
                    <option value="Softwares">Softwares</option>

                  </select>
                </div>
                <!-- value chnages based on the id of specialization -->
                <div class="form-group">
                  <select name="topic" class="form-control" id="type">
                    <option selected="true" disabled="disabled">Topic</option>  
                    <option>Java</option>
                    <option>C</option>

                  </select>
                </div>

                <div class="form-group">
                  <select name="level" class="form-control" id="type">
                    <option selected="true" disabled="disabled">Level</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                    <option value="Professional">Professional</option>
                  </select>
                </div>
                <input type="submit" name="skill" value="Add Skills" class="btn btn-secondary btn-block"><br>
              </form>
              <!-- move to below [REMOVE]-->  
             
                <!-- till here  -->
            </div>
          </div>
        </div>
        <!-- i addedc this part -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header bg-primary text-white">
              <h4>
                <i class="fas fa-user"></i> My Skills</h4>
            </div>
            <div class="card-body">
              <table class="table table-striped">

                <thead>
                  <tr>
                    
                    <th scope="col">Specialization</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Level</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
              
              
                  if(isset($_POST['skill'])){
                    $specialization= $_POST['specialization'];
                    $topic= $_POST['topic'];
                    $level= $_POST['level'];
                    
                    $spe=mysqli_query($db,"select sid from specialization where sname='$specialization'");
                    $row1=mysqli_fetch_array($spe,MYSQLI_ASSOC);
                    $speci=$row1['sid'];
                    
                    $top=mysqli_query($db,"select tid from topics where topicName='$topic' and sid='$speci'");
                    $row2=mysqli_fetch_array($top,MYSQLI_ASSOC);
                    $topi=$row2['tid'];
                    $lev=mysqli_query($db,"select lid from level where lname='$level'");
                    $row3=mysqli_fetch_array($lev,MYSQLI_ASSOC);
                    $leve=$row3['lid'];
                    
                    $query1="INSERT INTO skills (uid,tid,lid) VALUES ('$loggedin_id','$topi','$leve')";
                    mysqli_query($db,$query1);
                    //$_SESSION['topic']=$topi;
                   // $_SESSION['level']=$leve;
                    //$_SESSION['specialization']=$speci;
                    //header('location:home.php');
                  
                }
                $res=mysqli_query($db,"select * from skills where uid='$loggedin_id'");
                while($r=mysqli_fetch_array($res)){
                  $t=$r['tid'];
                  $t1=mysqli_query($db,"select * from topics where tid='$t'");
                  $r1=mysqli_fetch_array($t1,MYSQLI_ASSOC);
                  $t2=$r1['topicName'];
                  $s=$r1['sid'];
                  $s1=mysqli_query($db,"select * from specialization where sid='$s'");
                  $r2=mysqli_fetch_array($s1,MYSQLI_ASSOC);
                  $s2=$r2['sname'];
                  $l=$r['lid'];
                  $l1=mysqli_query($db,"select * from level where lid='$l'");
                  $r3=mysqli_fetch_array($l1,MYSQLI_ASSOC);
                  $l2=$r3['lname'];
                  $skidd=mysqli_query($db,"select * from skills where  tid='$t'and lid='$l' and uid='$loggedin_id'");
                  $r4=mysqli_fetch_array($skidd,MYSQLI_ASSOC);
                  $st2=$r4['skid'];
                  ?>
                  <tr>
                    
                    <td><?=$s2;?></td>
                    <td><?=$t2;?></td>
                    <td><?=$l2;?></td>
                    <td>
                      
                    <a href="deleteskill.php?skid=<?=$st2 ; ?> "class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                  <!-- remove this if <p> tag its printing thr details in table -->
                  
                    <?php } ?>
                  <!-- skills should come here -->
                  
  
            
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




 <!-- education -->
<section id="education" class="bg-light py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h4>
              <i class="fas fa-user-plus"></i> Add Education</h4>
          </div>
          <div class="card-body">
            <form method="post" action="profile.php">

              
              <!-- value chnages based on the id of specialization -->
              <div class="form-group">
                <select name="Degree" class="form-control" id="type">
                  <option selected="true" disabled="disabled">Degree</option>
                  <option value="10">10th</option>
                  <option value="12">PUC</option>
                  <option value="be">BE</option>
                  <option value="bcom">BCOM</option>
                  <option value="iti">ITI</option>

                </select>
              </div>

              
              <input type="submit" name="education" value="Add Education" class="btn btn-secondary btn-block"><br>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h4>
              <i class="fas fa-user"></i> My Education</h4>
          </div>
          <div class="card-body">
            <table class="table table-striped">
              <thead>
              <tr>
                    
                    <th scope="col">Degree</th>
                   
                  </tr>
                </thead>
                <tbody>
              <?php
                if(isset($_POST['education'])){
                  $scname=$_POST['scname'];
                  $degree=$_POST['Degree'];
                  $year=$_POST['yeargrad'];
                  $deg=mysqli_query($db,"select did from degree where dname='$degree'");
                    $row4=mysqli_fetch_array($deg,MYSQLI_ASSOC);
                    $dege=$row4['did'];
                    
                    $query2="INSERT INTO userdegree (uid,did) VALUES ('$loggedin_id','$dege')";
                    mysqli_query($db,$query2);
                  
                }
                $res1=mysqli_query($db,"select * from userdegree where uid='$loggedin_id'");
                while($r=mysqli_fetch_array($res1)){
                  $d=$r['did'];
                  $d1=mysqli_query($db,"select * from degree where did='$d'");
                  $r1=mysqli_fetch_array($d1,MYSQLI_ASSOC);
                  $d2=$r1['dname'];
                  $userid=mysqli_query($db,"select * from userdegree where did='$d' and uid='$loggedin_id'");
                  $r6=mysqli_fetch_array($userid,MYSQLI_ASSOC);
                  $udid=$r6['udid'];
                  ?>
                  <tr>
                  
                    <td><?=$d2;?></td>
                    <td>
                      
                    <a href="deletedegree.php?udid=<?=$udid ; ?> "class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                  
                  
                    <?php } ?>

          
              </tbody>
               </table>
                
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<hr>



<!-- experience -->
<section id="exp" class="bg-light py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h4>
              <i class="fas fa-user-plus"></i> Add Job Experience</h4>
          </div>
          <div class="card-body">
            <form method="post" action="profile.php">

              
              <!-- value chnages based on the id of specialization -->
              <div class="form-group">
                <label for="desc">Job Description</label>
                <input type="text" name="jDetail" class="form-control" required value="<?php
                    if(isset($_POST['jDetail'])){
                      $jd=$_POST['jDetail'];
                    }
                ?>">
              </div>

              <div class="form-group">
                <label for="desc">Experience</label>
                  <input type="text" name="expduration" class="form-control" required value="<?php
                    if(isset($_POST['expduration'])){
                      $dur=$_POST['expduration'];
                    }
                ?>">
              </div>
              <input type="submit" name="jexp"  class="btn btn-secondary btn-block" value="<?php
              if(isset($_POST['jexp'])){
              $query3="INSERT INTO experience (uid,experience,discription) VALUES ('$loggedin_id','$dur','$jd')";
              mysqli_query($db,$query3);
              unset($_POST['jexp'];
              }
              ?>"><br>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h4>
              <i class="fas fa-user"></i> My Job Experience</h4>
          </div>
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                
                  <th scope="col">Job Description</th>
                  <th scope="col">Experience</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              <?php
              
                if(isset($_POST['jexp'])){
                  
                  
                  $jd=$_POST['jDetail'];
                  $dur=$_POST['expduration'];
                   
                    $query3="INSERT INTO experience (uid,experience,discription) VALUES ('$loggedin_id','$dur','$jd')";
                    mysqli_query($db,$query3);
                  
                }
                
              
                
                $res2=mysqli_query($db,"select * from experience where uid='$loggedin_id'");
                while($r=mysqli_fetch_array($res2)){
                  
                  $e=$r['experience'];
                  $di=$r['discription'];
                  ?>
                  <tr>
                  
                    <td><?=$di;?></td>
                    <td><?=$e;?></td>
                    <td>
                      
                      <button class="btn btn-danger">Delete</button>
                    </td>
                  </tr>
                 

                    <?php
                  
                  
                  } 
                  
                  ?>

          
              </tbody>
            </table>
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
<?php
include('session_check.php');
include('server.php');
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
        </style>
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

<script>
function gettopic(val) {
	$.ajax({
	type: "POST",
	url: "get_district.php",
	data:'spec_id='+val,
	success: function(data){
		$("#topic-list").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>	
  <title>Log In</title>
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

<br><br><br>
  <section id="login" class="bg-light py-5">

    <div class="container">

      <div class="row">

        <div class="col-md-6 mx-auto">

          <div class="card">

            <div class="card-header a text-white">

              <h4>
 
               <i class="fas fa-sign-in-alt"></i> Your Profile</h4>
            </div>

            <div class="card-body">
            
              
                <div class="form-group">
                
                <?php
                $sql="SELECT * FROM allusers where uid=$loggedin_id";
                $result=mysqli_query($con,$sql);
                ?>
                <?php
                while($rows=mysqli_fetch_array($result)){
                  ?>
                <form id="cropimage" method="post" enctype="multipart/form-data" action="change_pic.php">
                <img class="img-circle" id="profile_picture" height="128" data-src="$picture"  data-holder-rendered="true" style="margin-left:30%;margin-bottom:10px;width: 140px; height: 140px;" src="<?php echo $rows['imagelocation']; ?>"/></br>
                <input type="file" value="Select Profile" class="btn btn-primary a" name="profile-pic" id="profile-pic" />
                <input type="submit" id="save_crop" class="btn btn-primary a" value="crop&save" /><br>
                </form>
                  <p class="form-control" style="margin-top:10px"><?php echo $rows['username']; ?> 


</p>
<p class="form-control"><?php echo $rows['email']; ?> 

</p>


              </div>


                <?php
                }
                ?>
                
                <form method="post" action="profile.php">
                <?php
                $ress=mysqli_query($con,"select * from allusers where uid='$loggedin_id'");
                $dis=mysqli_fetch_array($ress,MYSQLI_ASSOC);
                $diss=$dis['discription'];
                ?>
                <input type="text" name="discs" class="form-control" style="height:100px" placeholder="Set Description" value="<?php  echo $diss; ?>"><br></br>
                <input type="submit" class="btn btn-secondary a btn-block" name="setdisc" value="Set Description">
                </form>
                <?php
               //  $query5="ALTER allusers MODIFY (discription NOT NULL) where uid='$loggedin_id'";
                 //mysqli_query($db,$query5);
                if(isset($_POST['setdisc'])){
                  $discs=$_POST['discs'];
                 
                 // echo $_POST['discs'];
                  $del=mysqli_query($con,"select * from allusers where uid='$loggedin_id'");
                  $del1=mysqli_fetch_array($del,MYSQLI_ASSOC);
                  $discp=$del1['discription'];


                if($discp==  NULL){
                  //echo $_POST['discs'];
                 // $query5="ALTER TABLE allusers MODIFY discription (text) NOT NULL where uid='$loggedin_id'";
                  //mysqli_query($db,$query5);
                    $query6=" INSERT INTO allusers (discription) VALUES ('$discs',false) WHERE uid='$loggedin_id'";
                   mysqli_query($con,$query6);
                    $query7="UPDATE allusers SET discription='$discs' WHERE uid='$loggedin_id'";
                    mysqli_query($con,$query7);
                    
                  }
                  else{
                    $query6="UPDATE allusers SET discription='$discs' WHERE uid='$loggedin_id'";
                    mysqli_query($con,$query6);
                  
                  
                  }
                }
                
                ?>

                
               
                          </div>
          </div>
        </div>
      </div>
    </div>

  </section>
<!-- skill -->
 
 <section id="skills" class="bg-light  py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header a text-white">
              <h4>
                <i class="fas fa-user-plus"></i> Add Skills</h4>
            </div>
            <div class="card-body">
              <form method="post" action="profile.php">
  <table width="100%" height="117"  border="0">
  <tr>
    <!-- <th width="27%" height="63" scope="row">Spec :</th> -->
    <td width="73%"><select onChange="gettopic(this.value);"  name="specialization" id="specialization" class="form-control" >
                    <option value="">Select</option>
                   								<?php $query =mysqli_query($con,"SELECT * FROM specialization");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['sid'];?>"><?php echo $row['sname'];?></option>
<?php
}
?>
                    </select></td>
  </tr>
  <tr>
    <!-- <th scope="row">Topic :</th> -->
    <td><select name="topics" id="topic-list" class="form-control">
<option value="">Select</option>
</select></td>
  </tr>
</table>



                <!-- <div class="form-group">
                  <select name="specialization" class="form-control" id="type">
                    <option selected="true" disabled="disabled">Specialization</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Data science">Data Science</option>
                    <option value="Design">Design</option>
                    <option value="Softwares">Softwares</option>

                  </select>
                </div> -->
                <!-- value chnages based on the id of specialization -->
                <!-- <div class="form-group">
                  <select name="topic" class="form-control" id="type">
                    <option selected="true" disabled="disabled">Topic</option>  
                    <option>Java</option>
                    <option>C</option>

                  </select>
                </div> -->

                <div class="form-group ">
                  <select name="level" class="form-control" id="type">
                    <option selected="true" disabled="disabled">Level</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                    <option value="Professional">Professional</option>
                  </select>
                </div>
                <input type="submit" name="skill" value="Add Skills" class="btn btn-secondary a btn-block"><br>
              </form>
              <!-- move to below [REMOVE]-->  
             
                <!-- till here  -->
            </div>
          </div>
        </div>
        <!-- i addedc this part -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header a text-white">
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
                    $topic= $_POST['topics'];
                    $level= $_POST['level'];
                    
                
                    $top=mysqli_query($con,"select tid from topics where topicName='$topic' and sid='$specialization'");
                    $row2=mysqli_fetch_array($top,MYSQLI_ASSOC);
                    $topi=$row2['tid'];
                    $lev=mysqli_query($con,"select lid from level where lname='$level'");
                    $row3=mysqli_fetch_array($lev,MYSQLI_ASSOC);
                    $leve=$row3['lid'];
                   // echo $topi;
                    $query1="INSERT INTO skills (uid,tid,lid) VALUES ('$loggedin_id','$topi','$leve')";
                    mysqli_query($con,$query1);
                    //$_SESSION['topic']=$topi;
                   // $_SESSION['level']=$leve;
                    //$_SESSION['specialization']=$speci;
                    //header('location:home.php');
                  
                }
                $res=mysqli_query($con,"select * from skills where uid='$loggedin_id'");
                while($r=mysqli_fetch_array($res)){
                  $t=$r['tid'];
                  $t1=mysqli_query($con,"select * from topics where tid='$t'");
                  $r1=mysqli_fetch_array($t1,MYSQLI_ASSOC);
                  $t2=$r1['topicName'];
                  $s=$r1['sid'];
                  $s1=mysqli_query($con,"select * from specialization where sid='$s'");
                  $r2=mysqli_fetch_array($s1,MYSQLI_ASSOC);
                  $s2=$r2['sname'];
                  $l=$r['lid'];
                  $l1=mysqli_query($con,"select * from level where lid='$l'");
                  $r3=mysqli_fetch_array($l1,MYSQLI_ASSOC);
                  $l2=$r3['lname'];
                  $skidd=mysqli_query($con,"select * from skills where  tid='$t'and lid='$l' and uid='$loggedin_id'");
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
          <div class="card-header a text-white">
            <h4>
              <i class="fas fa-user-plus"></i> Add Education</h4>
          </div>
          <div class="card-body">
            <form method="post" action="profile.php">

              
              <!-- value chnages based on the id of specialization -->
              <div class="form-group">
                <select name="Degree" class="form-control" id="type">
                  <option selected="true" disabled="disabled">Degree</option>
                  <option value="SSLC">SSLC</option>
                  <option value="PUC">PUC</option>
                  <option value="Master of Science (M.Sc)">Master of Science (M.Sc)</option>
                  <option value="Diploma">Diploma</option>
                  <option value="M Tech">M Tech</option>
                  <option value="Bachelor of Science (B.Sc)">Bachelor of Science (B.Sc)</option>
                  <option value="Bachelor of Engineering (B.E)">Bachelor of Engineering (B.E)</option>

                </select>
              </div>

              
              <input type="submit" name="education" value="Add Education" class="btn btn-secondary  a btn-block"><br>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header a text-white">
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
                  
                  $degree=$_POST['Degree'];
                  
                  $deg=mysqli_query($con,"select did from degree where dname='$degree'");
                    $row4=mysqli_fetch_array($deg,MYSQLI_ASSOC);
                    $dege=$row4['did'];
                    
                    $query2="INSERT INTO userdegree (uid,did) VALUES ('$loggedin_id','$dege')";
                    mysqli_query($con,$query2);
                  
                }
                $res1=mysqli_query($con,"select * from userdegree where uid='$loggedin_id'");
                while($r=mysqli_fetch_array($res1)){
                  $d=$r['did'];
                  $d1=mysqli_query($con,"select * from degree where did='$d'");
                  $r1=mysqli_fetch_array($d1,MYSQLI_ASSOC);
                  $d2=$r1['dname'];
                  $userid=mysqli_query($con,"select * from userdegree where did='$d' and uid='$loggedin_id'");
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
          <div class="card-header a text-white">
            <h4>
              <i class="fas fa-user-plus"></i> Add Job Experience</h4>
          </div>
          <div class="card-body">
            <form method="post" action="profile.php">

              
              <!-- value chnages based on the id of specialization -->
              <div class="form-group">
                <label for="desc">Job Description</label>
                <input type="text" name="jDetail" class="form-control" required
                <?php
                    if(isset($_POST['jDetail'])){
                      $jd=$_POST['jDetail'];
                    }
                ?>
                >
              </div>

              <div class="form-group">
                <label for="desc">Experience</label>
                  <input type="text" name="expduration" class="form-control" required
                  <?php
                    if(isset($_POST['expduration'])){
                      $dur=$_POST['expduration'];
                    }
                ?>
                >
              </div>
              <input type="submit" name="jexp" value="Add experience" class="btn btn-secondary btn-block a"
              <?php
              if(isset($_POST['jexp'])){
              $query3="INSERT INTO experience (uid,experience,discription) VALUES ('$loggedin_id','$dur','$jd')";
              mysqli_query($con,$query3);
              if($sql>0){
                //header("location:http://".$_SERVER['HTTP_HOsT'].dirname($_SERVER['PHP_SELF'])."/profile.php");
              }
              
              }
              ?>
              ><br>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header a text-white">
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
              /*
                if(isset($_POST['jexp'])){
                  
                  
                  $jd=$_POST['jDetail'];
                  $dur=$_POST['expduration'];
                   
                    $query3="INSERT INTO experience (uid,experience,discription) VALUES ('$loggedin_id','$dur','$jd')";
                    mysqli_query($db,$query3);
                  
                }
                */
              
                
                $res2=mysqli_query($con,"select * from experience where uid='$loggedin_id'");
                while($r=mysqli_fetch_array($res2)){
                  
                  $e=$r['experience'];
                  $di=$r['discription'];
                  $expid=$r['eid'];
                  ?>
                  <tr>
                  
                    <td><?=$di;?></td>
                    <td><?=$e;?></td>
                    <td>
                      
                    <a href="deleteexp.php?eid=<?=$expid ; ?> "class="btn btn-danger">Delete</a>
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

  <footer id="main-footer" class="py-4 fixed-bottom al text-white text-center">
    Copyright &copy;
	  <span class="year"></span> Better Career <span id="google_translate_element"> </span>
  </footer>
      <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


  <script src="assets/js/jquery-3.3.1.min.js "></script>

  <script src="assets/js/bootstrap.bundle.min.js "></script>

  <script src="assets/js/main.js "></script>
</body>

</html>

<?php
include('session_check.php');
include('config.php');
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

            <a class="nav-link" href="home_company.php">Home</a>
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
 
           <a class="nav-link" href="account_company.php">
 
             <i class="fas fa-user-plus"></i> Account Settings</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

<br><br>
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
                <form id="cropimage" method="post" enctype="multipart/form-data" action="change_pic_comp.php">
                <img class="img-circle" id="profile_picture" height="128" data-src="$picture"  data-holder-rendered="true" style="margin-left:30%;margin-bottom:10px;width: 140px; height: 140px;" src="<?php echo $rows['imagelocation']; ?>"/></br>
                <input type="file" value="Select Profile" class="btn btn-primary a" name="profile-pic" id="profile-pic" />
                <input type="submit" id="save_crop" class="btn btn-primary a" value="crop&save" /><br>
                </form>

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

                <!-- jobs -->
<section id="exp" class="bg-light py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header a text-white">
            <h4>
              <i class="fas fa-user-plus"></i> Add Job Opening</h4>
          </div>
          <div class="card-body">
            <form method="post" action="profile_company.php">

              
              <!-- value chnages based on the id of specialization -->

              <div class="form-group">
                <label for="desc">Job Name</label>
                <input type="text" name="jName" class="form-control" required
                <?php
                    if(isset($_POST['jName'])){
                      $jn=$_POST['jName'];
                    }
                ?>
                >
              </div>

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
              <input type="submit" name="jexp" value="Add Job" class="btn btn-secondary  a btn-block"
              <?php
              if(isset($_POST['jexp'])){
              $query3="INSERT INTO jobs (jname,uid,experience,discription) VALUES ('$jn','$loggedin_id','$dur','$jd')";
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
              <i class="fas fa-user"></i>  Job Requirement</h4>
          </div>
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                <th scope="col">Job Name</th>
                  <th scope="col">Job Description</th>
                  <th scope="col">Experience</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              <?php
             
              
                
                $res2=mysqli_query($con,"select * from jobs where uid='$loggedin_id'");
                while($r=mysqli_fetch_array($res2)){
                  
                  $e=$r['experience'];
                  $di=$r['discription'];
                  $jobid=$r['jid'];
                  $jnam=$r['jname'];
                  ?>
                  <tr>
                    <td><?=$jnam;?></td>
                    <td><?=$di;?></td>
                    <td><?=$e;?></td>
                    <td>
                      
                    <a href="deletejob.php?jid=<?=$jobid ; ?> "class="btn btn-danger">Delete</a>
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

<!-- Job skill -->
 
<section id="jobskill" class="bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header a text-white">
              <h4>
                <i class="fas fa-user-plus"></i> Add Job Skills</h4>
            </div>
            <div class="card-body">
              <form method="post" action="profile_company.php">
              <input type="text" name="discs" class="form-control" style="height:100px" placeholder="Set Description" value="<?php echo $jnam; ?>"><br></br>
                
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

                <div class="form-group">
                  <select name="level" class="form-control" id="type">
                    <option selected="true" disabled="disabled">Level</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                    <option value="Professional">Professional</option>
                  </select>
                </div>
                <input type="submit" name="jobskill" value="Add Skills" class="btn btn-secondary btn-block a"><br>
              </form>

              </div>
          </div>
        </div>
        <!-- i addedc this part -->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header a text-white">
              <h4>
                <i class="fas fa-user"></i> Job Skills</h4>
            </div>
            <div class="card-body">
              <table class="table table-striped">

                <thead>
                  <tr>
                   <th scope="col">Job Title</th>
                    <th scope="col">Specialization</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Level</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
<?php
                if(isset($_POST['jobskill'])){
                    $specialization= $_POST['specialization'];
                    $topic= $_POST['topics'];
                    $level= $_POST['level'];

                    $jt=mysqli_query($con,"select jid from jobs where jname='$jnam'");
                    $row4=mysqli_fetch_array($jt,MYSQLI_ASSOC);
                    $jtitle=$row4['jid'];
                    
                    
                    $top=mysqli_query($con,"select tid from topics where topicName='$topic' and sid='$specialization'");
                    $row2=mysqli_fetch_array($top,MYSQLI_ASSOC);
                    $topi=$row2['tid'];

                    $lev=mysqli_query($con,"select lid from level where lname='$level'");
                    $row3=mysqli_fetch_array($lev,MYSQLI_ASSOC);
                    $leve=$row3['lid'];
                      
                    $query1="INSERT INTO jobdetails (jid,tid,lid) VALUES ('$jtitle','$topi','$leve')";
                    
                    mysqli_query($con,$query1);
                }
                $res=mysqli_query($con,"select * from jobs where uid='$loggedin_id'");
                while($r=mysqli_fetch_array($res)){
                  $j=$r['jid'];
                  $jobname=$r['jname'];
                  $res2=mysqli_query($con,"select * from jobdetails where jid='$j'");
                 while( $ress2=mysqli_fetch_array($res2)){
                   $jdid=$ress2['jdid'];
                  $t=$ress2['tid'];
                  $t1=mysqli_query($con,"select * from topics where tid='$t'");
                  $r1=mysqli_fetch_array($t1,MYSQLI_ASSOC);
                  $t2=$r1['topicName'];
                  $s=$r1['sid'];
                  $s1=mysqli_query($con,"select * from specialization where sid='$s'");
                  $r2=mysqli_fetch_array($s1,MYSQLI_ASSOC);
                  $s2=$r2['sname'];
                  $l=$ress2['lid'];
                  $l1=mysqli_query($con,"select * from level where lid='$l'");
                  $r3=mysqli_fetch_array($l1,MYSQLI_ASSOC);
                  $l2=$r3['lname'];
                 // $skidd=mysqli_query($db,"select * from skills where  tid='$t'and lid='$l' and uid='$loggedin_id'");
                  //$r4=mysqli_fetch_array($skidd,MYSQLI_ASSOC);
                  //$st2=$r4['skid'];
                ?>
                <tr>
                    <td><?=$jobname;?></td>
                    <td><?=$s2;?></td>
                    <td><?=$t2;?></td>
                    <td><?=$l2;?></td>
                    <td>
                      
                    <a href="deletejobskill.php?jdid=<?=$jdid ; ?> "class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                  <!-- remove this if <p> tag its printing thr details in table -->
                  
                    <?php }} ?>
 <br><br><br><br><br><br>
  <!-- Footer -->

  <footer id="main-footer" class="py-4 fixed-bottom al text-white text-center">
    Copyright &copy;
    <span class="year"></span> Better Career
  </footer>


  <script src="assets/js/jquery-3.3.1.min.js "></script>

  <script src="assets/js/bootstrap.bundle.min.js "></script>

  <script src="assets/js/main.js "></script>
</body>

</html>

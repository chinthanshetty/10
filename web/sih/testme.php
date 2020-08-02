<?php
require_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title> DEMO</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
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
	</head>
	<body>


<div class="container-fluid">
  


  <!--left-->

     
 <!--/left-->
  
  <!--center-->
  <div class="col-sm-8">
    <div class="row">
      <div class="col-xs-12">
       
		<hr >
		<form name="insert" action="" method="post">
  <table width="100%" height="117"  border="0">
  <tr>
    <th width="27%" height="63" scope="row">Spec :</th>
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
    <th scope="row">Topic :</th>
    <td><select name="topics" id="topic-list" class="form-control">
<option value="">Select</option>
</select></td>
  </tr>
</table>



     </form>
 
      </div>
    </div>
    <hr>
        
   
  </div><!--/center-->


<!--/right-->
  <hr>
</div><!--/container-fluid-->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
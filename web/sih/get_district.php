<?php
require_once("config.php");
if(!empty($_POST["spec_id"])) 
{
$query =mysqli_query($con,"SELECT * FROM topics WHERE sid = '" . $_POST["spec_id"] . "'");
?>
<option value="">Select topics</option>
<?php
while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row["topicName"]; ?>"><?php echo $row["topicName"]; ?></option>
<?php
}
}
?>

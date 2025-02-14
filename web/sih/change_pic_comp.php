<?php
/* Get post details */
include("session_check.php");
$post = isset($_POST) ? $_POST: array();
switch($post['profile-pic']) {
	case 'save' :
	saveProfilePic();
	saveProfilePicTmp();
	break;
	default:
	changeProfilePic();
}
/* Function to change profile picture */
function changeProfilePic() {
	$post = isset($_POST) ? $_POST: array();
	$max_width = "500"; 
	$userId = isset($post['hdn-profile-id']) ? intval($post['hdn-profile-id']) : 0;
	$path = 'https://betterfuture.tech/android/sih/images';
	$valid_formats = array("jpg", "png", "gif", "jpeg");
	$name = $_FILES['profile-pic']['name'];
	$size = $_FILES['profile-pic']['size'];
	if(strlen($name)) {
		list($txt, $ext) = explode(".", $name);
		if(in_array($ext,$valid_formats)) {
			if($size<(1024*1024)) {
				$actual_image_name = $userId .'.'.$ext;
				$filePath = $path .'/'.$actual_image_name;
				$tmp = $_FILES['profile-pic']['tmp_name'];
				if(move_uploaded_file($tmp, $filePath)) {
					$width = getWidth($filePath);
					$height = getHeight($filePath);
					//Scale the image if it is greater than the width set above
					if ($width > $max_width){
						$scale = $max_width/$width;
						$uploaded = resizeImage($filePath,$width,$height,$scale, $ext);
					} else {
						$scale = 1;
						$uploaded = resizeImage($filePath,$width,$height,$scale, $ext);
					}
					include_once("config.php");
					include("session_check.php");

					$data_insert = " INSERT INTO allusers (imagelocation) VALUES ('$uploaded') WHERE uid='$loggedin_id'";
					mysqli_query($con, $data_insert);
					$data_in="UPDATE allusers SET imagelocation='$uploaded' WHERE uid='$loggedin_id'";
                    mysqli_query($con,$data_in);					
					//echo "<img id='photo' file-name='".$actual_image_name."' class='' src='".$filePath.'?'.time()."' class='preview'/>";
					header("location:profile_company.php");
				}
				else
				echo "failed";
			}
			else
			echo "Image file size max 1 MB"; 
		}
		else
		echo "Invalid file format.."; 
	}
	else
	echo "Please select image..!";
	exit;
}
/* Function to handle save profile pic */
/*function saveProfilePic(){
	include_once("server.php");
	include("session_check.php");
	$post = isset($_POST) ? $_POST: array();	
	//Handle profile picture update with MySQL update Query using $options array	
	echo "entered";
		$data_insert = " INSERT INTO allusers ( imagelocation) VALUES ( 'image') WHERE uid='$loggedin_id'";
		mysqli_query($db, $data_insert);
		
	
	
}*/
	
/* Function to update image */
 /*function saveProfilePicTmp() {
	$post = isset($_POST) ? $_POST: array();
	$userId = isset($post['id']) ? intval($post['id']) : 0;
	$path ='\\images\tmp';
	$t_width = 300; // Maximum thumbnail width
	$t_height = 300;    // Maximum thumbnail height	
	if(isset($_POST['t']) and $_POST['t'] == "ajax") {
		extract($_POST);		
		$imagePath = 'images/tmp/'.$_POST['image_name'];
		$ratio = ($t_width/$w1); 
		$nw = ceil($w1 * $ratio);
		$nh = ceil($h1 * $ratio);
		$nimg = imagecreatetruecolor($nw,$nh);
		$im_src = imagecreatefromjpeg($imagePath);
		imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$w1,$h1);
		imagejpeg($nimg,$imagePath,90);		
	}
	echo $imagePath.'?'.time();;
	exit(0);    
}*/    
/* Function  to resize image */
function resizeImage($image,$width,$height,$scale, $ext) {
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch ($ext) {
        case 'jpg':
        case 'jpeg':
            $source = imagecreatefromjpeg($image);
            break;
        case 'gif':
            $source = imagecreatefromgif($image);
            break;
        case 'png':
            $source = imagecreatefrompng($image);
            break;
        default:
            $source = false;
            break;
    }	
	imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
	imagejpeg($newImage,$image,90);
	chmod($image, 0777);
	return $image;
}
/*  Function to get image height. */
function getHeight($image) {
    $sizes = getimagesize($image);
    $height = $sizes[1];
    return $height;
}
/* Function to get image width */
function getWidth($image) {
    $sizes = getimagesize($image);
    $width = $sizes[0];
    return $width;
}
?>

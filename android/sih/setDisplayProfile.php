<?php
if(isset($_POST['imageEncoded'])){
    $imageEncoded = $_POST['imageEncoded'];
}
if(isset($_POST['username'])){
    $username = $_POST['username'];
}
$userdetails = array(
    'path' => 'https://betterfuture.tech/android/sih/images/'.$username.'.png',
    'username' => $username
);
$uploadpath = "images/$username.png";
file_put_contents($uploadpath,base64_decode($imageEncoded));
if (uploadDisplayProfile($userdetails)) {

    $response['success'] = "1";
    $response['message'] = "Image upload successful";
    echo json_encode($response);
} else {
    $response['success'] = "0";
    $response['message'] = "Image Upload failed";
    echo json_encode($response);
}
function uploadDisplayProfile($userdetails) {
    require './db.php';
    $query = "UPDATE allusers set imagelocation=:path where username=:username";
    $stmt = $pdo->prepare($query);
    return $stmt->execute($userdetails);
}

/*
    define('UPLOAD_DIR', 'images/');
    $image_parts = explode(";base64,", $_POST['imageEncoded']);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $file = UPLOAD_DIR . uniqid() . '.png';
    file_put_contents($file, $image_base64);

    $image_base64 = base64_decode($_POST['imageEmcoded']);
    $file = UPLOAD_DIR . uniqid() . '.png';
    file_put_contents($file, $image_base64);
*/
/*
$data = base64_decode($_POST['imageEncoded']);
file_put_contents('/images/image.png', $data);
$response['success'] = "0";
    $response['message'] = "check";
    echo json_encode($response);
    */
?>    

<?php
if(isset($_POST['discription'])){
    $discription = $_POST['discription'];
}
if(isset($_POST['username'])){
    $username = $_POST['username'];
}
if(isset($_POST['years'])){
    $years = $_POST['years'];
}
$userdetails = array(
    'username' => $username,
    'discription' => $discription,
    'years' => $years
);
if (uploadExperience($userdetails)) {
    $response['success'] = "1";
    $response['message'] = "degree upload successful";
    echo json_encode($response);
} else {
    $response['success'] = "0";
    $response['message'] = "The degree already exists";
    echo json_encode($response);
}
function uploadExperience($userdetails) {
    require './db.php';
    $query = "INSERT into experience(uid,experience,discription) values((SELECT uid from allusers where allusers.username=:username) ,:years,:discription)";
    $stmt = $pdo->prepare($query);
    return $stmt->execute($userdetails);
}
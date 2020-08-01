<?php
if(isset($_POST['username'])){
    $username = $_POST['username'];
}
if(isset($_POST['discription'])){
    $discription = $_POST['discription'];
}
$response = array();
$userdetails = array(
    'username' => $username,
    'discription' => $discription
);
$success = uploadDiscription($userdetails);
if (!empty($success)) {
    $response['success'] = "1";
    $response['message'] = "success!";
    $response['details'] = $success;
    echo json_encode($response);
} else {
    $response['success'] = "0";
    $response['message'] = "failed!";
    $response['results']=$success;
    echo json_encode($response);
}
function uploadDiscription($userdetails) {
    require './db.php';
    $array = array();
    $stmt = $pdo->prepare("UPDATE allusers set discription = :discription WHERE username = :username");
    $stmt->execute($userdetails);
    $array = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = null;
    return $array;
}
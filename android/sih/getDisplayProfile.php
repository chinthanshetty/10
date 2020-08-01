<?php
if(isset($_POST['username'])){
    $username = $_POST['username'];
}
$response = array();
$userdetails = array(
    'username' => $username
);
$success = getDiscription($userdetails);
if (!empty($success)) {
    $response['success'] = "1";
    $response['message'] = "found!";
    $response['details'] = $success;
    echo json_encode($response);
} else {
    $response['success'] = "0";
    $response['message'] = "not found. Please try again!";
    $response['results']=$success;
    echo json_encode($response);
}
function getDiscription($userdetails) {
    require './db.php';
    $array = array();
    $stmt = $pdo->prepare("SELECT imagelocation from allusers where username = :username");
    $stmt->execute($userdetails);
    $array = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = null;
    return $array;
}
<?php
if(isset($_POST['discription'])){
    $discription = $_POST['discription'];
}
if(isset($_POST['username'])){
    $username = $_POST['username'];
}
if(isset($_POST['title'])){
    $title = $_POST['title'];
}
$userdetails = array(
    'discription' => $discription,
    'username' => $username,
    'title' => $title
);
$response=array();
$success = deleteCompJob($userdetails);
if (!empty($success)) {
    $response['success'] = "1";
    $response['message'] = "deleted";
    echo json_encode($response);
} else {
    $response['success'] = "0";
    $response['message'] = "failed";
    echo json_encode($response);
}
function deleteCompJob($userdetails) {
    require './db.php';
    $query = "DELETE from jobs where uid=(SELECT uid FROM allusers WHERE allusers.username=:username) and discription=:discription and jname=:title";
    $stmt = $pdo->prepare($query);
    return $stmt->execute($userdetails);
}


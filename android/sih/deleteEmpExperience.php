<?php
if(isset($_POST['discription'])){
    $discription = $_POST['discription'];
}
if(isset($_POST['username'])){
    $username = $_POST['username'];
}
$userdetails = array(
    'discription' => $discription,
    'username' => $username
);
$response=array();
$success = deleteExperience($userdetails);
if (!empty($success)) {
    $response['success'] = "1";
    $response['message'] = "deleted";
    echo json_encode($response);
} else {
    $response['success'] = "0";
    $response['message'] = "failed";
    echo json_encode($response);
}
function deleteExperience($userdetails) {
    require './db.php';
    $query = "DELETE from experience where uid=(SELECT uid FROM allusers WHERE allusers.username=:username) and discription=:discription";
    $stmt = $pdo->prepare($query);
    return $stmt->execute($userdetails);
}


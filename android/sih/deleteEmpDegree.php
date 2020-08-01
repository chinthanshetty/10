<?php
if(isset($_POST['degree'])){
    $degree = $_POST['degree'];
}
if(isset($_POST['username'])){
    $username = $_POST['username'];
}
$degreedetails = array(
    
    'degree' => $degree,
    'username' => $username
);
$response=array();
$success = deleteDegree($degreedetails);
if (!empty($success)) {
    $response['success'] = "1";
    $response['message'] = "deleted";
    echo json_encode($response);
} else {
    $response['success'] = "0";
    $response['message'] = "failed";
    echo json_encode($response);
}
function deleteDegree($degreedetails) {
    require './db.php';
    $query = "DELETE from userdegree where udid = ( SELECT udid from userdegree,degree,allusers
     where userdegree.uid=allusers.uid and allusers.username=:username 
     and userdegree.did=degree.did and degree.dname=:degree )";
    $stmt = $pdo->prepare($query);
    return $stmt->execute($degreedetails);
}


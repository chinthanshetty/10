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
if (uploadSkill($degreedetails)) {
    $response['success'] = "1";
    $response['message'] = "degree upload successful";
    echo json_encode($response);
} else {
    $response['success'] = "0";
    $response['message'] = "The degree already exists";
    echo json_encode($response);
}
function uploadSkill($degreedetails) {
    require './db.php';
    $query = "INSERT INTO userdegree(uid,did) select allusers.uid,degree.did from allusers,degree where allusers.username=:username and degree.dname=:degree";
    $stmt = $pdo->prepare($query);
    return $stmt->execute($degreedetails);
}
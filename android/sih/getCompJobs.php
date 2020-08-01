<?php
if(isset($_POST['username'])){
    $username = $_POST['username'];
}
$response = array();
$userdetails = array(
    'username' => $username
);
$success = getCompJobs($userdetails);
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
function getCompJobs($userdetails) {
    require './db.php';
    $array = array();
    $stmt = $pdo->prepare("SELECT jname,jobs.discription from jobs,allusers where allusers.uid=jobs.uid and allusers.username=:username");
    $stmt->execute($userdetails);
    $i=0;
    while ($temp = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $array[$i]=$temp;
        $i++;
      }
    $stmt = null;
    return $array;
}
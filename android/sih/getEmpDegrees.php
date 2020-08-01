<?php
if(isset($_POST['username'])){
    $username = $_POST['username'];
}
$response = array();
$degreedetails = array(
    'username' => $username
);
$success = getDegree($degreedetails);
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
function getDegree($degreedetails) {
    require './db.php';
    $array = array();
    $stmt = $pdo->prepare("SELECT degree.dname from degree, userdegree, allusers where allusers.username=:username and allusers.uid=userdegree.uid and userdegree.did=degree.did");
    $stmt->execute($degreedetails);
    $i=0;
    while ($temp = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $array[$i]=$temp;
        $i++;
      }
    $stmt = null;
    return $array;
}
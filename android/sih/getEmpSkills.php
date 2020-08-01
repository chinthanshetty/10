<?php
if(isset($_POST['username'])){
    $username = $_POST['username'];
}
$response = array();
$skilldetails = array(
    'username' => $username
);
$success = getSkills($skilldetails);
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
function getSkills($skilldetails) {
    require './db.php';
    $array = array();
    $stmt = $pdo->prepare("SELECT topics.topicName,specialization.sname,level.lname from topics,specialization,level,allusers,skills
    where allusers.uid=skills.uid and allusers.username=:username and skills.tid=topics.tid and topics.sid=specialization.sid and level.lid=skills.lid");
    $stmt->execute($skilldetails);
    $i=0;
    while ($temp = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $array[$i]=$temp;
        $i++;
      }
    $stmt = null;
    return $array;
}
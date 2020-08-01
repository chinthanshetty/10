<?php
if(isset($_POST['specialization'])){
    $specialization = $_POST['specialization'];
}
if(isset($_POST['topic'])){
    $topic = $_POST['topic'];
}
if(isset($_POST['username'])){
    $username = $_POST['username'];
}
$skilldetails = array(
    'specialization' => $specialization,
    'topic' => $topic,
    'username' => $username
);
$response=array();
$success = deleteSkill($skilldetails);
if (!empty($success)) {
    $response['success'] = "1";
    $response['message'] = "deleted";
    $response['details']=$success;
    echo json_encode($response);
} else {
    $response['success'] = "0";
    $response['message'] = "failed";
    $response['details']=$success;
    echo json_encode($response);
}
function deleteSkill($skilldetails) {
    require './db.php';
    $query = "DELETE from skills where skills.skid = 
    ( SELECT skid from skills,topics,allusers,specialization where skills.uid=allusers.uid and
     allusers.username=:username and skills.tid=topics.tid and topics.topicName=:topic and
      topics.sid=specialization.sid and specialization.sname=:specialization )";
    $stmt = $pdo->prepare($query);
    return $stmt->execute($skilldetails);
}


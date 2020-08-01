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
if(isset($_POST['title'])){
    $title = $_POST['title'];
}
if(isset($_POST['discription'])){
    $discription = $_POST['discription'];
}
$userdetails = array(
    'specialization' => $specialization,
    'topic' => $topic,
    'username' => $username,
    'discription' => $discription,
    'title' => $discription
);
$response=array();
$success = deleteSkill($userdetails);
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
function deleteSkill($userdetails) {
    require './db.php';
    $query = "DELETE from jobdetails where jid=
    (SELECT jid from jobs,allusers where allusers.uid=jobs.uid
     and allusers.username=:username and jname=:title and jobs.discription=:discription) 
     and tid=(SELECT tid from topics,specialization where topics.topicName=:topic 
     and topics.sid=specialization.sid and specialization.sname=:specialization)";
    $stmt = $pdo->prepare($query);
    return $stmt->execute($userdetails);
}


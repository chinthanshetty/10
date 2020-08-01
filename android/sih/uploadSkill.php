<?php
if(isset($_POST['specialization'])){
    $specialization = $_POST['specialization'];
}
if(isset($_POST['topic'])){
    $topic = $_POST['topic'];
}
if(isset($_POST['level'])){
    $level = $_POST['level'];
}
if(isset($_POST['username'])){
    $username = $_POST['username'];
}
$skilldetails = array(
    'specialization' => $specialization,
    'topic' => $topic,
    'level' => $level,
    'username' => $username
);
if (uploadSkill($skilldetails)) {
    $response['success'] = "1";
    $response['message'] = "Skill upload successful";
    echo json_encode($response);
} else {
    $response['success'] = "0";
    $response['message'] = "The skill already exists";
    echo json_encode($response);
}
function uploadSkill($skilldetails) {
    require './db.php';
    $query = "INSERT INTO skills (uid,tid,lid) SELECT allusers.uid,topics.tid,level.lid from allusers,topics,level,specialization
     where allusers.username=:username and level.lname=:level and specialization.sid=topics.sid
      and specialization.sname=:specialization and topics.topicName=:topic";
    $stmt = $pdo->prepare($query);
    return $stmt->execute($skilldetails);
}
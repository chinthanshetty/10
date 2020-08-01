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
if(isset($_POST['title'])){
    $title = $_POST['title'];
}
if(isset($_POST['discription'])){
    $discription = $_POST['discription'];
}
$userdetails = array(
    'specialization' => $specialization,
    'topic' => $topic,
    'level' => $level,
    'username' => $username,
    'title' => $title,
    'discription' => $discription
);
if (uploadJobSkill($userdetails)) {
    $response['success'] = "1";
    $response['message'] = "Skill upload successful";
    echo json_encode($response);
} else {
    $response['success'] = "0";
    $response['message'] = "The skill already exists";
    echo json_encode($response);
}
function uploadJobSkill($userdetails) {
    require './db.php';
    $query = "INSERT into jobdetails(jid,tid,lid) values((SELECT jid from jobs where
     uid=(SELECT uid from allusers where username =:username) and 
    jname=:title and discription=:discription) ,(SELECT tid from specialization,topics WHERE
     topics.topicName=:topic and topics.sid=specialization.sid and 
     specialization.sname=:specialization) ,(SELECT lid from level where lname=:level))";
    $stmt = $pdo->prepare($query);
    return $stmt->execute($userdetails);
}
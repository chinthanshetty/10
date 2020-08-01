<?php
if(isset($_POST['username'])){
    $username = $_POST['username'];
}
if(isset($_POST['title'])){
    $title = $_POST['title'];
}
if(isset($_POST['discription'])){
    $discription = $_POST['discription'];
}
$response = array();
$skilldetails = array(
    'username' => $username,
    'title' => $title,
    'discription' => $discription
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
    $stmt = $pdo->prepare("SELECT topics.topicName,specialization.sname,level.lname
     from topics,specialization,allusers,level,jobs,jobdetails
    where jobs.uid=allusers.uid and allusers.username=:username and jobs.jid=jobdetails.jid and jobs.jname=:title
     and jobs.discription=:discription and topics.tid=jobdetails.tid  and topics.sid=specialization.sid  and 
    level.lid=jobdetails.lid");
    $stmt->execute($skilldetails);
    $i=0;
    while ($temp = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $array[$i]=$temp;
        $i++;
      }
    $stmt = null;
    return $array;
}
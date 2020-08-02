<?php
$response = array();
$success = getLevels();
if (!empty($success)) {
    $response['success'] = "1";
    $response['message'] = "found!";
    $response['details'] = $success;
    echo json_encode($response);
} else {
    $response['success'] = "0";
    $response['message'] = "not found. Please try again!";
    echo json_encode($response);
}
function getLevels() {
    require './db.php';
    $array = array();
    $stmt = $pdo->prepare("SELECT specialization.sname,topics.topicName,question1,question2,answer1,answer2 from specialization,topics,skilltest where topics.sid=specialization.sid and topics.tid=skilltest.tid");
    $stmt->execute();
    $i=0;
    while ($temp = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $array[$i]=$temp;
        $i++;
      }
    $stmt = null;
    return $array;
}
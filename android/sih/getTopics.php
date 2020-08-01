<?php
if(isset($_POST['specialization'])){
    $specialization = $_POST['specialization'];
}
$response = array();
$details = array(
    'specialization' => $specialization
);
$success = getTopics($details);
if (!empty($success)) {
    $response['success'] = "1";
    $response['message'] = "Topics found!";
    $response['details'] = $success;
    echo json_encode($response);
} else {
    $response['success'] = "0";
    $response['message'] = "Topics not found. Please try again!";
    echo json_encode($response);
}
function getTopics($details) {
    require './db.php';
    $array = array();
    $stmt = $pdo->prepare("SELECT topicName from topics,specialization where topics.sid=specialization.sid and specialization.sname=:specialization");
    $stmt->execute($details);
    $i=0;
    while ($temp = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $array[$i]=$temp;
        $i++;
      }
    $stmt = null;
    return $array;
}
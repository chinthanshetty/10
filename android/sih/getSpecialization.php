<?php

$response = array();
$success = getSpecialization();
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
function getSpecialization() {
    require './db.php';
    $array = array();
    $stmt = $pdo->prepare("SELECT sname from specialization");
    $stmt->execute();
    $i=0;
    while ($temp = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $array[$i]=$temp;
        $i++;
      }
    $stmt = null;
    return $array;
}
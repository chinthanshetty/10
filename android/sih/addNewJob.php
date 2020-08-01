<?php
if(isset($_POST['title'])){
    if(!($_POST['title']=="")){
        $title = $_POST['title'];
    }
}
if(isset($_POST['years'])){
    $years = $_POST['years'];
}
if(isset($_POST['discription'])){
    $discription = $_POST['discription'];
}
if(isset($_POST['username'])){
    $username = $_POST['username'];
}
$userdetails = array(
    'title' => $title,
    'years' => $years,
    'discription' => $discription,
    'username' => $username
);
if (addNewJob($userdetails)) {
    $response['success'] = "1";
    $response['message'] = "Job added";
    echo json_encode($response);
} else {
    $response['success'] = "0";
    $response['message'] = "failed";
    echo json_encode($response);
}
function addNewJob($userdetails) {
    require './db.php';
    $query = "INSERT INTO jobs(uid,jname,discription,experience) VALUES
     ((SELECT uid FROM allusers where username=:username),:title,:discription,:years)";
    $stmt = $pdo->prepare($query);
    return $stmt->execute($userdetails);
}
<?php
if(isset($_POST['title'])){
    if(!($_POST['title']=="")){
        $title = $_POST['title'];
    }
}
if(isset($_POST['years'])){
    $years = $_POST['years'];
}
if(isset($_POST['location'])){
    $location = $_POST['location'];
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
    'username' => $username,
    'location' => $location
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
    $query = "INSERT INTO jobs(uid,jname,discription,experience,location) VALUES
     ((SELECT uid FROM allusers where username=:username),:title,:discription,:years,:location)";
    $stmt = $pdo->prepare($query);
    return $stmt->execute($userdetails);
}
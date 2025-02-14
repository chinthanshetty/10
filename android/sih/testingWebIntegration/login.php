<?php
if(isset($_POST['user'])){
    $user = $_POST['user'];
}
if(isset($_POST['password'])){
    $password = $_POST['password'];
}
$response = array();
//Check if all fieds are given
if (empty($user) || empty($password)) {
    $response['success'] = "0";
    $response['message'] = "Some fields are empty. Please try again!";
    echo("yes, some fields are empty");
    echo json_encode($response);
    die;
}
$userdetails = array(
    'user' => $user,
    'password' => md5($password)
);

$success = loginUser($userdetails);
if (!empty($success)) {
    $response['success'] = "1";
    $response['message'] = "Login successfully!";
    echo("login successfull");
    $response['details'] = $success;
    echo json_encode($response);
} else {
    $response['success'] = "0";
    $response['message'] = "Login failed. Please try again!";
    echo("login failed");
    echo json_encode($response);
}
function loginUser($userdetails) {
    require './db.php';
    $array = array();
    $stmt = $pdo->prepare("SELECT * FROM allusers WHERE (email = :user OR username = :user ) AND password = :password");
    $stmt->execute($userdetails);
    $array = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = null;
    return $array;
}
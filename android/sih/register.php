<?php
if(isset($_POST['firstname'])){
    $firstname = $_POST['firstname'];
}
if(isset($_POST['lastname'])){
    $lastname = $_POST['lastname'];
}
if(isset($_POST['username'])){
    $username = $_POST['username'];
}
if(isset($_POST['email'])){
    $email = $_POST['email'];
}
if(isset($_POST['password'])){
    $password = $_POST['password'];
}
if(isset($_POST['password1'])){
    $password1 = $_POST['password1'];
}
if(isset($_POST['accountType'])){
    $accountType = $_POST['accountType'];
}

$response = array();
//Check if all fieds are given
if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($accountType)) {
    $response['success'] = "0";
    $response['message'] = "Some fields are empty. Please try again!";
    echo json_encode($response);
    die;
}
//Check if password match
if ($password !== $password1) {
    $response['success'] = "0";
    $response['message'] = "Password mistmatch. Please try again!";
    echo json_encode($response);
    die();
}
//Check if email is a valid one
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response['success'] = "0";
    $response['message'] = "Invalid email. Please try again!";
    echo json_encode($response);
    die();
}
//Check if email exists
if (checkEmail($email)) {
    $response['success'] = "0";
    $response['message'] = "That email is registered. Please try again!";
    echo json_encode($response);
    die();
}

//Check if email exists
if (checkUsername($username)) {
    $response['success'] = "0";
    $response['message'] = "That username is registered. Please try again!";
    echo json_encode($response);
    die();
}

//AccountType

$userType=checkAccountType($accountType);
    



$userdetails = array(
    'firstname' => $firstname,
    'lastname' => $lastname,
    'username' => $username,
    'email' => $email,
    'password' => md5($password),
    'userType' => $userType,
);
//Insert the user into the database
if (registerUser($userdetails)) {
    $response['success'] = "1";
    $response['message'] = "User registered successfully!";
    echo json_encode($response);
} else {
    $response['success'] = "0";
    $response['message'] = "User registration failed. Please try again!";
    echo json_encode($response);
}
function registerUser($userdetails) {
    require './db.php';
    $query = "INSERT INTO allusers (firstname, lastname, username, email, password, userType) VALUES "
            . "(:firstname, :lastname, :username, :email, :password, :userType)";
    $stmt = $pdo->prepare($query);
    return $stmt->execute($userdetails);
}
function checkEmail($value) {
    require './db.php';
    $stmt = $pdo->prepare("SELECT * FROM allusers WHERE email = ? ");
    $stmt->execute([$value]);
    $array = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = null;
    return !empty($array);
}
function checkUsername($value) {
    require './db.php';
    $stmt = $pdo->prepare("SELECT * FROM allusers WHERE username = ? ");
    $stmt->execute([$value]);
    $array = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = null;
    return !empty($array);
}

function checkAccountType($value){
    require './db.php';
    $stmt = $pdo->prepare("SELECT typeid FROM usertype WHERE accountType = ? ");
    $stmt->execute([$value]);
    $row = $stmt->fetch(PDO::FETCH_NUM, 0);
    $stmt = null;
    return $row[0];
}
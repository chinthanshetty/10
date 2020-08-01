<?php
if(isset($_POST['username'])){
    $username = $_POST['username'];
}
$response = array();
$userdetails = array(
    'username' => $username
);
$success = updateHomeRV($userdetails);
if (!empty($success)) {
    $response['success'] = "1";
    $response['message'] = "found!";
    $response['details'] = $success;
    echo json_encode($response);
} else {
    $response['success'] = "0";
    $response['message'] = "not found. Please try again!";
    $response['details']=$success;
    echo json_encode($response);
}
function updateHomeRV($userdetails) {
    require './db.php';
    $array = array();
    $stmt = $pdo->prepare("SELECT employeename as empusername,firstname,lastname,(COUNT(*)/total)*100 as match_percentage from 
    (select au.username ,jd.jid,j.jname as jjname,j.discription as jobdiscription,jd.jdid,jd.tid as jtid from jobs j, jobdetails jd, allusers au where jd.jid=j.jid and j.uid=au.uid and au.username=:username)t1
    JOIN
    (SELECT au.username as employeename,au.firstname as firstname,au.lastname as lastname,s.tid as stid from allusers au,skills s where s.uid=au.uid) t2 on t1.jtid=t2.stid
    JOIN
    (SELECT j.jname as jjjname,COUNT(*) as total from jobs j,allusers au, jobdetails jd where j.jid=jd.jid and j.uid=au.uid and au.username=:username GROUP by j.jid) t3 on t1.jjname=t3.jjjname
    GROUP by jid,empusername
    order by match_percentage desc"); 
    $stmt->execute($userdetails);
    $i=0;
    while ($temp = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $array[$i]=$temp;
        $i++;
      }
    $stmt = null;
    return $array;
}
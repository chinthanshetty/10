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
    $stmt = $pdo->prepare("SELECT jobid,firstname as companyname,jname as jobname,discription as jobdiscription,experience,
    location,match_percentage from (SELECT * from(SELECT t3.jobid as jobid,t3.sum/t4.total as match_percentage
     from (select t1.jjid as jobid, sum(t1.cal) as sum from (SELECT j.jid as jjid,j.jdid as jdid ,j.lid as
      jlid, s.lid as slid,  if(s.lid > j.lid, (s.lid-j.lid)*10+100,100-(j.lid-s.lid)*30) as cal from jobdetails j,
       skills s,allusers au where j.tid = s.tid and s.uid = au.uid and au.username=:username) t1 group by t1.jjid)
        t3 join (SELECT jd.jid as jjjid,COUNT(*) as total FROM jobdetails jd GROUP by jd.jid)t4 on t3.jobid=t4.jjjid)t5
         join (SELECT * from jobs)t6 on t6.jid=t5.jobid) t7 join (SELECT firstname,uid from allusers)t8 on t7.uid=t8.uid 
         having match_percentage>=50 order by match_percentage desc"); 
    $stmt->execute($userdetails);
    $i=0;
    while ($temp = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $array[$i]=$temp;
        $i++;
      }
    $stmt = null;
    return $array;
}
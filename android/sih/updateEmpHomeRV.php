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
    $stmt = $pdo->prepare("SELECT allusers.firstname as Company_Name,matched.jobname as Job_Name,jobid2 as jobid,matched.jobdiscription as Job_Discription,(matched.skillsmatched/allmatches.totalskillsinthejob)*100 as Match_Percentage FROM
    (SELECT j.jid as jobid2,j.jname as jobname,jd.jdid as jobidid,j.uid as companyid,j.discription as jobdiscription, count(*) as skillsmatched from jobs j,skills s, jobdetails jd, allusers u where u.uid=s.uid and u.username=:username and s.tid=jd.tid and jd.jid=j.jid group by j.jid) matched
    JOIN
    (SELECT jd.jid as jobid, count(*) as totalskillsinthejob from jobdetails jd group by jd.jid) allmatches
    ON matched.jobid2=allmatches.jobid
    JOIN allusers on allusers.uid=matched.companyid
    ORDER BY Match_Percentage desc"); 
    $stmt->execute($userdetails);
    $i=0;
    while ($temp = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $array[$i]=$temp;
        $i++;
      }
    $stmt = null;
    return $array;
}
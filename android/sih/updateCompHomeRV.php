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
    $stmt = $pdo->prepare("SELECT *,username as empusername,cal/total as match_percentage from (SELECT *,
    sum(if(slid > jlid, (slid-jlid)*10+100,100-(jlid-slid)*30)) as cal from 
    (SELECT j.jid as jobid,jd.jdid,j.jname as jobname, jd.tid,jd.lid as jlid from jobs j,
     jobdetails jd,allusers au where j.jid=jd.jid and j.uid=au.uid and au.username=:username)t1 join
      (SELECT au.username,au.firstname,au.lastname,au.discription as empdiscription,au.email as
       empemail,s.lid as slid,s.tid as tid2 from allusers au,skills s where au.uid=s.uid )t2 on
        t1.tid=t2.tid2 group by jobid,username)t3 join (SELECT jd.jid as jjid,COUNT(*) as total 
        from jobdetails jd GROUP by jd.jid)t4 on t3.jobid=t4.jjid having match_percentage>=50 order by match_percentage desc"); 
    $stmt->execute($userdetails);
    $i=0;
    while ($temp = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $array[$i]=$temp;
        $i++;
      }
    $stmt = null;
    return $array;
}

/*
SELECT *,cal/total as match_percentage from (SELECT *,sum(if(slid > jlid,
 (slid-jlid)*10+100,100-(jlid-slid)*30)) as cal from (SELECT j.jid as jobid,jd.jdid,j.jname,
  jd.tid,jd.lid as jlid from jobs j, jobdetails jd,allusers au where j.jid=jd.jid and 
  j.uid=au.uid and au.username="trebuchet.in")t1 join (SELECT au.username,au.firstname,au.lastname,au.discription
   as empdiscription,au.email as empemail,s.lid as slid,s.tid as tid2 from allusers au,skills s where au.uid=s.uid )
   t2 on t1.tid=t2.tid2 group by jobid,username)t3 join (SELECT jd.jid as jjid,COUNT(*) as total
    from jobdetails jd GROUP by jd.jid)t4 on t3.jobid=t4.jjid having match_percentage>=50 order by match_percentage desc

  SELECT jjid as jobid,jname as jobname,empusername,firstname,lastname,empdiscription,some/total as match_percentage
     from (SELECT *,sum(cal) as some from (SELECT j.jid as jjid,jj.jname,j.jdid as jdid ,j.lid as jlid,
      s.lid as slid,au.uid as uuid,s.tid as ttid1,  if(s.lid > j.lid, (s.lid-j.lid)*10+100,100-(j.lid-s.lid)*30)
       as cal from jobdetails j, skills s,allusers au,jobs jj where j.tid = s.tid and jj.jid=j.jid and jj.uid=au.uid
        and au.username=:username group by jdid)t1 join (select au.username as empusername,au.firstname as firstname,
         au.lastname as lastname, au.discription as empdiscription,s.tid as ttid from allusers au,skills s where au.uid=s.uid)t2
          on t2.ttid=t1.ttid1 group by jjid,empusername)aa join (SELECT jd.jid as bbjid, COUNT(*) as total from jobdetails 
          jd GROUP by jd.jid)bb on aa.jjid=bb.bbjid having match_percentage>=50 order by match_percentage desc


          SELECT *,cal/total as match_percentage from (SELECT *,
    sum(if(slid > jlid, (slid-jlid)*10+100,100-(jlid-slid)*30)) as cal from 
    (SELECT j.jid as jobid,jd.jdid,j.jname as jobname, jd.tid,jd.lid as jlid from jobs j,
     jobdetails jd,allusers au where j.jid=jd.jid and j.uid=au.uid and au.username=:username)t1 join
      (SELECT au.username,au.firstname,au.lastname,au.discription as empdiscription,au.email as
       empemail,s.lid as slid,s.tid as tid2 from allusers au,skills s where au.uid=s.uid )t2 on
        t1.tid=t2.tid2 group by jobid,username)t3 join (SELECT jd.jid as jjid,COUNT(*) as total 
        from jobdetails jd GROUP by jd.jid)t4 on t3.jobid=t4.jjid having match_percentage>=50 order by match_percentage desc
          */
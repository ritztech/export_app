<?php
include('../conf.php');

$siid=$_GET["q"];
//echo $supid;
$result12 = mysql_query("SELECT mandia6.siid,mandia5.fid,mandia6.partyname,mandia5.supid FROM mandia6,mandia5 WHERE mandia6.soid=mandia5.soid AND mandia5.supid ='$siid'");
$row12 = mysql_fetch_array($result12);
$v0= $row12['siid'];
$v1= $row12['supid'];
$v2= $row12['partyname'];

echo $v0 .",". $v1 .",". $v2;


//mysql_close($Connection);
?> 




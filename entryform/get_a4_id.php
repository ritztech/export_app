<?php
include('../conf.php');

$supid=$_GET["q"];
//echo $supid;
$result12 = mysql_query("SELECT mandia4.a4id,mandia4.fid,mandia4.partyname,purchase_order.suppid FROM mandia4,purchase_order WHERE mandia4.poid=purchase_order.poid AND purchase_order.suppid ='$supid'");
$row12 = mysql_fetch_array($result12);
$v0= $row12['a4id'];
$v1= $row12['suppid'];
$v2= $row12['partyname'];

echo $v0 .",". $v1 .",". $v2;


//mysql_close($Connection);
?> 




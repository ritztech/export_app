<?php
include('../conf.php');

$siid=$_GET["q"];
//echo $supid;
$result12 = mysql_query("SELECT partyname FROM mandia6 WHERE siid ='$siid'");
$row12 = mysql_fetch_array($result12);

$v0= $row12['partyname'];

echo $v0;


//mysql_close($Connection);
?> 




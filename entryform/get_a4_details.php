<?php
include('../conf.php');

$poid=$_GET["q"];



$result12 = mysql_query("SELECT  partyname FROM mandia4 WHERE a4id  = $poid");

$row12 = mysql_fetch_array($result12);

$v0= $row12['partyname'];



echo $v0 ;


//mysql_close($Connection);
?> 




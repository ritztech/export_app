<?php
include('../conf.php');

$poid=$_GET["q"];



$result12 = mysql_query("SELECT `soid`, `fid`, `suppliername`, `brokername`, `stockitem`, `moisture`, `dust`, `smallseed`, `splitseed`, `oil`, `quantity`, `denometer`, `bag`, `packingterms`, `bagquality`, `rate`, `deleveryduedate`, `paymentterms`, `cashdcond`, `modeofsupply`, `saudadate`, `stfcondition`, `etfcondition`, `mtfcondition`, `saudashort`, `loadedfinal`, `entrydate` FROM `mandia5` WHERE soid = $soid");

//$result12 = mysql_query("SELECT `id`, upper(`desc`), `capacity`, DATE_FORMAT(exp_date,'%d/%m/%Y'), `s_price`, `qty`, `trg`, upper(`storage`), upper(`cmp_name`),batchno FROM `m_master_store` WHERE id = $id");




$row12 = mysql_fetch_array($result12);

$v0= $row12['fid'];
$v1= $row12['soid'];
$v2= $row12['suppliername'];
$v3= $row12['brokername'];
$v4= $row12['stockitem'];
$v5= $row12['moisture'];
$v6= $row12['dust'];
$v7= $row12['smallseed'];
$v8= $row12['splitseed'];
$v9= $row12['oil'];
$v10= $row12['quantity'];
$v11= $row12['denometer'];
$v12= $row12['bag'];
$v13= $row12['bagquality'];
$v14= $row12['modeofsupply'];

echo $v0 .",". $v1 .",". $v2.",". $v3.",". $v4.",". $v5.",". $v6.",". $v7.",". $v8.",". $v9.",".$v10.",".$v11.",".$v12.",".$v13.",".$v14;


//mysql_close($Connection);
?> 




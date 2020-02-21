<?php
include('../conf.php');

$poid=$_GET["q"];



$result12 = mysql_query("select a1.poid, a1.suppliername, a1.brokername, a1.moisture, a1.dust, a1.smallseed, a1.splitseed, a1.oil, a1.quantity, a1.bag, a1.bagquality, a1.modeofsupply
FROM purchase_order a1  where  a1.poid  = $poid");

//$result12 = mysql_query("SELECT `id`, upper(`desc`), `capacity`, DATE_FORMAT(exp_date,'%d/%m/%Y'), `s_price`, `qty`, `trg`, upper(`storage`), upper(`cmp_name`),batchno FROM `m_master_store` WHERE id = $id");




$row12 = mysql_fetch_array($result12);

$v0= $row12['poid'];
$v1= $row12['suppliername'];
$v2= $row12['brokername'];
$v3= $row12['moisture'];
$v4= $row12['dust'];
$v5= $row12['smallseed'];
$v6= $row12['splitseed'];
$v7= $row12['oil'];
$v8= $row12['quantity'];
$v9= $row12['bag'];
$v10= $row12['bagquality'];
$v11= $row12['modeofsupply'];

echo $v0 .",". $v1 .",". $v2.",". $v3.",". $v4.",". $v5.",". $v6.",". $v7.",". $v8.",".$v9.",".$v10.",".$v11;


//mysql_close($Connection);
?> 




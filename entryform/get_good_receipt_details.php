<?php
include('../conf.php');

$grid=$_GET["q"];



$result12 = mysql_query("SELECT suppliername, brokername, vehiclenumber, billno, gatepassno,poid FROM goodrecieptsnote 
where grid = $grid");

//$result12 = mysql_query("SELECT `id`, upper(`desc`), `capacity`, DATE_FORMAT(exp_date,'%d/%m/%Y'), `s_price`, `qty`, `trg`, upper(`storage`), upper(`cmp_name`),batchno FROM `m_master_store` WHERE id = $id");




$row12 = mysql_fetch_array($result12);


$v0= $row12['suppliername'];
$v1= $row12['brokername'];
$v2= $row12['vehiclenumber'];
$v3= $row12['billno'];
$v4= $row12['gatepassno'];
$v5= $row12['poid'];


echo $v0 .",". $v1 .",". $v2.",". $v3.",". $v4.",". $v5;


//mysql_close($Connection);
?> 




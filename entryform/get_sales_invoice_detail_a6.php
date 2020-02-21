<?php
include('../conf.php');

$grid=$_GET["q"];



$result12 = mysql_query("SELECT suppliername, brokername, quantity,bag,packingterms  from mandia5 WHERE soid  = $grid");




$row12 = mysql_fetch_array($result12);



$v0= $row12['suppliername'];
$v1= $row12['brokername'];
$v2= $row12['quantity'];
$v3= $row12['bag'];
$v4= $row12['packingterms'];


echo $v0 .",". $v1 .",". $v2.",". $v3.",". $v4;


//mysql_close($Connection);
?> 




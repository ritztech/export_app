<?php
require '../conf.php';
$id = $_GET['id'];

$qry1="DELETE FROM `currency_exchangee` WHERE `tab_auto_id`=$id"; 

if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
?>


<?php
require '../conf.php';
$id = $_GET['id'];


$qry1="DELETE FROM mandia6 WHERE siid ='$id'"; 

if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
   
$qry2="DELETE FROM stock_ref WHERE formid='$id' and tempid='A6'"; 
if (!mysql_query($qry2,$connection))
  {
  die('Error: ' . mysql_error());
  }
?>




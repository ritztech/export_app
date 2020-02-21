<?php
require '../conf.php';
$id = $_GET['id'];


$qry1="DELETE FROM mandia7 WHERE billid ='$id'"; 

if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
   
$qry2="DELETE FROM mandia7_ref WHERE formid='$id' and tempid='A7'"; 
if (!mysql_query($qry2,$connection))
  {
  die('Error: ' . mysql_error());
  }
?>




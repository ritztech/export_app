<?php
require '../conf.php';
$id = $_GET['id'];


$qry1="DELETE FROM mandi14 WHERE a14id ='$id'"; 

if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
   
$qry2="DELETE FROM mandia14 WHERE formid='$id' and tempid='A14'"; 
if (!mysql_query($qry2,$connection))
  {
  die('Error: ' . mysql_error());
  }
?>




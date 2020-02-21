<?php
require '../conf.php';
$id = $_GET['id'];


$qry1="DELETE FROM mandi13_ref WHERE a13refid ='$id'"; 

if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
   
$qry2="DELETE FROM mandi13 WHERE gpid='$id'"; 
if (!mysql_query($qry2,$connection))
  {
  die('Error: ' . mysql_error());
  }
?>




<?php
require '../conf.php';
$id = $_GET['id'];


$qry1="DELETE FROM mandia8 WHERE a8id ='$id'"; 

if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
   
$qry2="DELETE FROM mandia7_ref WHERE formid='$id' and tempid='A8'"; 
if (!mysql_query($qry2,$connection))
  {
  die('Error: ' . mysql_error());
  }
?>




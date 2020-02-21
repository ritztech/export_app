<?php
require '../conf.php';
$id = $_GET['id'];


$qry1="DELETE FROM mandia12m WHERE mtaxid ='$id'"; 

if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
   
$qry2="DELETE FROM mandia12n WHERE ntaxid='$id'"; 
if (!mysql_query($qry2,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
$qry3="DELETE FROM mandia12_ref WHERE formidm='$id' and formidn='$id' and tempid='A12'"; 
if (!mysql_query($qry3,$connection))
  {
  die('Error: ' . mysql_error());
  }
?>




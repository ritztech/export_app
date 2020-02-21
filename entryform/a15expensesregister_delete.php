<?php
require '../conf.php';
$id = $_GET['id'];


$qry1="DELETE FROM mandi15 WHERE regid ='$id'"; 

if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }

?>




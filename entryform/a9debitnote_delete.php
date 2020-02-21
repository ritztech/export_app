<?php
require '../conf.php';
$id = $_GET['id'];


$qry1="DELETE FROM mandia9 WHERE debid ='$id'"; 

if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
   

?>




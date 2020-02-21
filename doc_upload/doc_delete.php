<?php
require '../conf.php';
$id = $_GET['id'];

$result1 = mysql_query("SELECT 	uppath from upload  where uid = '$id'");
$row1 = mysql_fetch_array($result1);



$qry1="DELETE FROM upload WHERE uid ='$id'"; 

if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }

  
  
  


$row1 = $row1['0'];


unlink($row1);


  
  
  
?>




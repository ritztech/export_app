
<?php

require '../conf.php';

$id = $_GET['id'];

$pieces = explode(",,,",$id);


$refid = $pieces[0];
$a_sbno = $pieces[1];
$a_sbdatee = $pieces[2];
$a_location = $pieces[3];
$a_curr_status = $pieces[4];
$a_qry_raised = $pieces[5];
$a_qry_replied = $pieces[6];



$sql="UPDATE `file_up` SET `sbno`='$a_sbno',`location`='$a_location',`curr_status`='$a_curr_status',`qry_raised`='$a_qry_raised',`qry_replied`='$a_qry_replied',sbdate=STR_TO_DATE('$a_sbdatee','%d/%m/%Y')  WHERE id=$refid";
  
 //echo $sql;
 

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
?>



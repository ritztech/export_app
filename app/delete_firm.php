<?php
include('../conf.php');

$id = $_GET['id'];

$sqlupd123="DELETE FROM `firmcreation` WHERE `fid`  = '$id'"; 
 
mysql_query($sqlupd123,$connection);

mysql_close($connection);


echo "<script>alert('Firm deleted Sucessfully .');location.href='newuser_view.php'</script>";

?>

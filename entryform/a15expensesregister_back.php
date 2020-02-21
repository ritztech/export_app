<?php
session_start();
$fid=$_SESSION['fid'];
	include('../conf.php');

$j = $_POST['totalcnt'];


	if(isset($_POST['s']))
		{
			$date = trim(strip_tags(addslashes(strtoupper($_POST['date']))));




for($i=2; $i <= $j; $i++) {

$sqlupd1="INSERT INTO `mandi15`(`fid`, `debitid`, `debitvalue`, `debitnarrtion`, `debitname`, `creditid`, `credvalue`, `crdnarration`, `crdname`,trans_date) VALUES 
($fid,'{$_POST['item'.$i]}','{$_POST['debitval'.$i]}','{$_POST['debitnarration'.$i]}','{$_POST['debitname'.$i]}','{$_POST['debitid'.$i]}','{$_POST['creditval'.$i]}',
'{$_POST['creditnarration'.$i]}','{$_POST['creditname'.$i]}',STR_TO_DATE('$date','%d/%m/%Y'))";


//echo $sqlupd1;

mysql_query($sqlupd1,$connection);

   
  
}




echo "<script>alert('Data Sucessfully Inserted.');location.href='a15expensesregister_front.php'</script>";

        }

?>

 
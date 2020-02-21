<?php include('../conf.php'); ?>
<?php
session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }

$fid=$_SESSION['fid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />

<script language="javascript">

function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		} 	
		return xmlhttp;
    }
	

function deleterecord(deleteId) {
	
    if (confirm("Are you sure you want to delete this record  ?!") == true) {
	     	var strURL="a15expensesregister_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='a15expensesregister_view.php';
	
	
	} else {
        x = "You pressed Cancel!";
    }

}


</script>
</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center"><br>
  <h2 align="center"><span style="color:#F17327;">JOURNAL VOUCHER  ENTRY DETAILS </span></h2>

<form id="form1" name="form1" method="post" action="">
  
  <a href='abca15.php'>Click here to get Excel  report</a>
  <table>
  <?php
//ROBERT SORIANO 2015
$sno=1;


	
	try {
	$query = "SELECT `regid`, `fid`, `debitid`, `debitvalue`, `debitnarrtion`, `debitname`, `creditid`, `credvalue`, `crdnarration`, 
	`crdname`, DATE_FORMAT(trans_date,'%d/%m/%Y') as date   FROM `mandi15` WHERE fid = $fid  order by regid desc";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table border='1' cellpadding='5' style='border-collapse:collapse;'>";
	echo "<tr>";
	echo "<th>S NO</th>";
	echo "<th>Transaction date</th>";
	echo "<th>Debit Ledger</th>";
	echo "<th>Debit value</th>";
	echo "<th>Debit Narration</th>";
	echo "<th>Credit ledger</th>";
	echo "<th>Credit value</th>";
	echo "<th>Credit Narration</th>";
	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
	echo "<tr>";
	echo "<td>{$sno}</td>";
	echo "<td>{$date}</td>";
	echo "<td>{$debitname}</td>";
	echo "<td>{$debitvalue}</td>";
	echo "<td>{$debitnarrtion}</td>";
	
		echo "<td>{$crdname}</td>";
	echo "<td>{$credvalue}</td>";
	echo "<td>{$crdnarration}</td>";
	

	
	echo "</tr>";
	$sno=$sno+1;
	}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

?>
  </p>
 
    </table>

</form></div>
</body>
</html>

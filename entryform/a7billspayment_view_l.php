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
	     	var strURL="a7billspayment_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='a7billspayment_view.php';
	
	
	} else {
        x = "You pressed Cancel!";
    }

}


</script>
</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center">
  <h2 align="center"><span style="color:#F17327;">Bill Payment Details</span></h2>
  <p align="center">&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  
  <a href='abca7.php'>Click here to get Excel  report</a>
  
  <table>
  <?php
//ROBERT SORIANO 2015
	$sn=1;
	try {
		
	$query = "SELECT * FROM mandia7  where fid = $fid order by billid desc";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table border='1' cellpadding='5' style='border-collapse:collapse;'>";
	echo "<tr>";
	echo "<th>S N</th>";
echo "<th>Sauda Date</th>";
	echo "<th>Party Name</th>";
	echo "<th>Payment Type</th>";
	echo "<th>Amount</th>";
	echo "<th>Bank Charges</th>";
	echo "<th>Total</th>";
	echo "<th>Edit/View</th>";
	echo "<th>Delete</th>";
	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
	echo "<tr>";
	echo "<td>{$sn}</td>";
echo "<td>{$saudadate}</td>";
	echo "<td>{$suppliername}</td>";
        
	echo "<td>{$type}</td>";
	echo "<td>{$amount}</td>";
	echo "<td>{$bankcharges}</td>";
	echo "<td>{$total}</td>";
	echo "<td><a href='a7billspayment_edit.php?billid={$billid}'>Edit/Full View</a> </td>";
	echo "<td> <input type='button' name='btnprint' value='Delete' onclick='deleterecord($billid)'/></td>";

	
	echo "</tr>";
	$sn=$sn+1;
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

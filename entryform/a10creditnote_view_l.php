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
	     	var strURL="a10creditnote_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='a10creditnote_view.php';
	
	
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
 <p align="center">&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">Credit Note Details</span></h2>
 
<form id="form1" name="form1" method="post" action="">
  
  
  <a href='abca10.php'>Click here for  excel report</a>
  
  <table>
  <?php
//ROBERT SORIANO 2015
$sno=1;

	
	try {
	$query = "SELECT `cnid`, `supid`, `fid`, `suppliername`, `billno`, `billvalue`, `claims`, `shortage`, `moisture`, `sand`, `oil`, `kirda`, `labour`, `cashdcond`, `brokerage`, `postage`, `bardanaclaims`, `bankcharges`, `other`, `entrydate` FROM `mandia10` WHERE fid = $fid  order by cnid  desc";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table border='1' cellpadding='5' style='border-collapse:collapse;'>";
	echo "<tr>";
	echo "<th>S NO</th>";
	echo "<th>Entry ID</th>";
	echo "<th>Party Name</th>";
	echo "<th>Bill Number</th>";
	echo "<th>Bill value</th>";
	echo "<th>Discount</th>";
	echo "<th>Postage</th>";
	echo "<th>Bank Charges</th>";
	echo "<th>Brokerage</th>";
	echo "<th>Edit/View</th>";
	echo "<th>Delete</th>";
	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
	echo "<tr>";
	echo "<td>{$sno}</td>";
	echo "<td>{$cnid}</td>";
	echo "<td>{$suppliername}</td>";
	echo "<td>{$billno}</td>";
	echo "<td>{$billvalue}</td>";
	echo "<td>{$cashdcond}</td>";
	echo "<td>{$postage}</td>";
	echo "<td>{$bankcharges}</td>";
	echo "<td>{$brokerage}</td>";
	echo "<td><a href='a10creditnote_edit.php?cnid={$cnid}'>Edit/Full View</a></td>";
	echo "<td> <input type='button' name='btnprint' value='Delete' onclick='deleterecord($cnid)'/></td>";
	
	
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

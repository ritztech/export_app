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
	     	var strURL="a11mandiform10_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='a11mandiform10_view.php';
	
	
	} else {
        x = "You pressed Cancel!";
    }

}


</script>
</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center"> <p align="center">&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">Mandi Form 10 Application Details</span></h2>
 
<form id="form1" name="form1" method="post" action="">
  
  <table>
  <?php
//ROBERT SORIANO 2015
$sno=1;

	
	try {
	$query = "SELECT *FROM mandia11  WHERE fid = $fid ORDER BY mfid DESC";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table border='1' cellpadding='5' style='border-collapse:collapse;'>";
	echo "<tr>";
	echo "<th>SNO</th>";
	echo "<th>Party Name</th>";
	echo "<th>Stock Item</th>";
	echo "<th>Opening Stock</th>";
	echo "<th>Gate Pass Stock</th>";
	echo "<th>Bag</th>";
	echo "<th>Transporter Name</th>";
	echo "<th>Truck No.</th>";
	echo "<th>Driver Name</th>";
	echo "<th>Action</th>";
	echo "<th>Action</th>";
	echo "<th>Action</th>";
	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
	echo "<tr>";
	echo "<td>{$sno}</td>";
	echo "<td>{$suppliername}</td>";
	echo "<td>{$stockitem}</td>";
	echo "<td>{$stockopening}</td>";
	echo "<td>{$stockgatepass}</td>";
	echo "<td>{$bag}</td>";
	echo "<td>{$transportername}</td>";
	echo "<td>{$truckno}</td>";
	echo "<td>{$drivername}</td>";
   	echo "<td><a href='a11mandiform10_edit.php?mfid={$mfid}'>Edit/Full View</a></td>";	
	echo "<td><a href='a11report.php?mfid={$mfid}'>Hindi Print</a></td>";
	echo "<td> <input type='button' name='btnprint' value='Delete' onclick='deleterecord($mfid)'/></td>";
	
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

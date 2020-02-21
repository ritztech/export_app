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
	     	var strURL="a13gatepassdeposit_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='a13gatepassdeposit_view.php';
	
	
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
  <h2 align="center"><span style="color:#F17327;">Mandi Gate Pass Deposit Details</span></h2>
 
<form id="form1" name="form1" method="post" action="">
  
  <table>
  <?php
//ROBERT SORIANO 2015
$sno=1;

	
	try {
	$query = "SELECT * FROM `mandi13_ref` WHERE fid=$fid order by a13refid desc ";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table border='1' cellpadding='5' style='border-collapse:collapse;'>";
	echo "<tr>";
	echo "<th>S NO</th>";
	echo "<th>ID</th>";
	echo "<th>Bag Quantity</th>";
	echo "<th>Bag Value</th>";
	echo "<th>Value Of Goods</th>";
	echo "<th>Edit/View</th>";
	echo "<th>Delete</th>";
	echo "<th>Hindi Print</th>";
	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
	echo "<tr>";
	echo "<td>{$sno}</td>";
	echo "<td>{$a13refid}</td>";
	echo "<td>{$bagqty}</td>";
	echo "<td>{$bagvalue}</td>";
	echo "<td>{$goodsvalue}</td>";
	echo "<td><a href='a13gatepassdeposit_edit.php?a13refid={$a13refid}'>Edit/Full View</a> </td>";
	echo "<td> <input type='button' name='btnprint' value='Delete' onclick='deleterecord($a13refid)'/></td>";
	echo "<td><a href='a13gatepassdeposit_edit1.php?a13refid={$a13refid}'>Hindi Print</a> </td>";
	
	
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

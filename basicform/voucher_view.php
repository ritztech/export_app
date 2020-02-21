<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }

$fid=$_SESSION['fid'];
?>
<?php include('../conf.php'); ?>
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
	     	var strURL="voucher_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='voucher_view.php';
	
	
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
  <h2 align="center"><span style="color:#F17327;">ACCOUNTING VOUCHER TYPE</span></h2>
  
<form id="form1" name="form1" method="post" action="">
  
  <table>
    <?php
	$sno=1;
	

	try {
	$query = "SELECT * FROM vouchertype where fid=$fid ";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table width='400' border='1' cellpadding='5' align='center' style='border-collapse:collapse;'>";
	echo "<tr>";
	echo "<th>SNO</th>";
	echo "<th>Voucher Type</th>";
	echo "<th>Action</th>";
	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
	echo "<tr>";
     echo "<td>{$sno}</td>";
	echo "<td>{$description}</td>";
	
   	//echo "<td><a href='sirname_edit.php?sirid={$sirid}'>Edit/Full View</a>  || <a href='sirname_delete.php?sirid={$sirid}'>Delete</a></td>";
	echo "<td><a href='voucher_edit.php?voucherid={$voucherid}'>Edit/Full View</a>   <input type='button' name='btnprint' value='Delete' onclick='deleterecord($voucherid)'/></td>";
	echo "</tr>";
	
	$sno = $sno+1;
	
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

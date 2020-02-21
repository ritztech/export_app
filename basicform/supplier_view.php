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
	     	var strURL="supplier_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='supplier_view.php';
	
	
	} else {
        x = "You pressed Cancel!";
    }

}


</script>





</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center"> <p align="left">&nbsp;</p>
  <h2><span style="color:#F17327;">Supplier Details</span></h2>
  <form id="form1" name="form1" method="post" action="supplier_back.php">
   <table align="right">
    <?php
	$sno=1;

	try {
	$query = "SELECT `supid`, `suppliername`, `cityname`,  `contactperson`, `mobile`, `email`, `fid` FROM `supplier`  where fid = $fid";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table border='1' cellpadding='5' style='border-collapse:collapse;'>";
	echo "<tr>";
	echo "<th>SNO</th>";
	echo "<th>Supplier id</th>";
	echo "<th>Supplier  name</th>";
	echo "<th>City</th>";
	echo "<th>Contact Person</th>";
	echo "<th>Mobile</th>";
	echo "<th>Email</th>";
	echo "<th>Action</th>";

	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
	echo "<tr>";
	echo "<td>{$sno}</td>";
	echo "<td>{$supid}</td>";
	echo "<td>{$suppliername}</td>";
	echo "<td>{$cityname}</td>";
	echo "<td>{$contactperson}</td>";
	echo "<td>{$mobile}</td>";
	echo "<td>{$email}</td>";

   //	echo "<td><a href='supplier_edit.php?supid={$supid}'>Edit/Full View</a>  || <a href='supplier_delete.php?supid={$supid}'>Delete</a></td>";
   echo "<td><a href='supplier_edit.php?supid={$supid}'>Edit/Full View</a>  || <input type='button' name='btnprint' value='Delete' onclick='deleterecord($supid)'/></td>";
	echo "</tr>";
	
	$sno = $sno+1;
	
	}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

?>
  </table>
    <p align="left">&nbsp;</p>
  </form>
</div>
</body>
</html>

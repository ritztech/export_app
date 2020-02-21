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
	     	var strURL="stockitem_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='stockitem_view.php';
	
	
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
<p>&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">Stock items Details</span></h2>
  
    <form id="form1" name="form1" method="post" action="">
     <table align="right">
    <?php
	$sno=1;

	try {
	$query = "SELECT * FROM stockitem where fid=$fid ";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table border='1' cellpadding='5' style='border-collapse:collapse;'>";
	echo "<tr>";
	echo "<th>SNO</th>";
	echo "<th>Stock Item</th>";
	
		echo "<th>HSN</th>";
			echo "<th>GST</th>";
				echo "<th>DETAIL</th>";
				
	
	echo "<th>Quantity Type</th>";
	echo "<th>Quantity(OP)</th>";
	echo "<th>Report For Mandi Tax</th>";
	echo "<th>Action</th>";
	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
	echo "<tr>";
	echo "<td>{$sno}</td>";
	echo "<td>{$stockitem}</td>";
	
	echo "<td>{$hsn}</td>";
	echo "<td>{$gst}</td>";
	echo "<td>{$i_detail}</td>";
	
	
	echo "<td>{$quantitytype}</td>";
	echo "<td>{$quantityop}</td>";
	echo "<td>{$reportformanditax}</td>";
	
   //	echo "<td><a href='stockitem_edit.php?stockid={$stockid}'>Edit/Full View</a>  || <a href='stockitem_delete.php?stockid={$stockid}'>Delete</a></td>";
   echo "<td><a href='stockitem_edit.php?stockid={$stockid}'>Edit/Full View</a>  || <input type='button' name='btnprint' value='Delete' onclick='deleterecord($stockid)'/></td>";
	echo "</tr>";
	
	$sno=$sno+1;
	}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

?>
  </table>
    </form>
    
</div>
</body>
</html>

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
	     	var strURL="a12mandinirasrittax_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='a12mandinirastrittax_view.php';
	
	
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
  <h2 align="center"><span style="color:#F17327;">MANDI & NIRASRIT TAX DETAILS</span></h2>
 
<form id="form1" name="form1" method="post" action="">
  
  <a href='abca12.php'>Click here to get Mandi Tax report</a>
  </br>
  </br>
  
  
  <a href='abca13.php'>Click here to get Nirasrit Tax  report</a>
  
  <table>
  <?php
//ROBERT SORIANO 2015
	$sn=1;
	try {
		
	$query = "SELECT fid, entrydate, taxtype, srno,DATE_FORMAT(recieptdate,'%d/%m/%Y') as recieptdate, paymentmode, chequeno, bankname, 
chequedate, deposittax, qtotal, amtotal, ratetotal, mtaxid FROM mandia12m WHERE fid =$fid  order by mtaxid  desc";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table border='1' cellpadding='5' style='border-collapse:collapse;'>";
	echo "<tr>";
	echo "<th>S N</th>";
	echo "<th>Reciept Date</th>";
	echo "<th>Taxtype</th>";
	echo "<th>Srno</th>";
	echo "<th>Cheque No</th>";
	echo "<th>Bank Name</th>";
	echo "<th>Edit/View</th>";
	echo "<th>Delete</th>";

	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
	echo "<tr>";
	echo "<td>{$sn}</td>";
	echo "<td>{$recieptdate}</td>";
	echo "<td>{$taxtype}</td>";
	echo "<td>{$srno}</td>";
	echo "<td>{$chequeno}</td>";
	echo "<td>{$bankname}</td>";
	echo "<td><a href='a12mandinirastrittax_edit.php?mtaxid={$mtaxid}'>Edit/Full View</a></td>";
	echo "<td> <input type='button' name='btnprint' value='Delete' onclick='deleterecord($mtaxid)'/></td>";
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

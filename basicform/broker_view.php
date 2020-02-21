<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }


$ffid = $_SESSION['fid']; 
 
?>
 <?php include('../conf.php');?>
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
	     	var strURL="broker_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='broker_view.php';
	
	
	} else {
        x = "You pressed Cancel!";
    }

}


</script>
</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center"><p align="left">&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">Broker Details</span></h2>
  <form id="form1" name="form1" method="post" action="broker_back.php">
    
    <p align="left"><table align="right">
    <?php
//ROBERT SORIANO 2015
	
	try {
	$query = "SELECT * FROM broker  where fid = $ffid ";
	
	
	$stmt = $dbc->prepare($query);
	$stmt->execute(); 
	echo "<table border='1' cellpadding='5' style='border-collapse:collapse;'>";
	echo "<tr>";
	echo "<th>Broker ID</th>";
	echo "<th>Broker Name</th>";
	echo "<th>Address</th>";
	echo "<th>City</th>"; 
	echo "<th>Pin No</th>";
	echo "<th>Contact Person</th>";
	echo "<th>EMAIL</th>";
	echo "<th>Action</th>";
	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
	echo "<tr>";
	echo "<td>{$brid}</td>";
	echo "<td>{$brokername}</td>";
	echo "<td>{$factoryadd}</td>";
	echo "<td>{$cityname}</td>";
	echo "<td>{$pin}</td>";
	echo "<td>{$contactperson}</td>";
	echo "<td>{$email}</td>";
   //	echo "<td><a href='broker_edit.php?brid={$brid}'>Edit/Full View</a>  || <a href='broker_delete.php?brid={$brid}'>Delete</a></td>";
	echo "<td><a href='broker_edit.php?brid={$brid}'>Edit/Full View</a>  || <input type='button' name='btnprint' value='Delete' onclick='deleterecord($brid)'/></td>";
	echo "</tr>";
	}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

?>
  </table>&nbsp;</p>
  </form>&nbsp;
</div>
</body>
</html>

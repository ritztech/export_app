<?php include('../conf.php'); ?>
<?php

$id = $_GET['id'];

session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

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
	     	var strURL="doc_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='doc_view_all.php';
	
	
	} else {
        x = "You pressed Cancel!";
    }

}


</script>

</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/menu1.php');?>
<div id="gutter"></div>
<div id="col1">
  <h2>Menu</h2>
  <?php include('../include/sidemenu.php');?>
  <p>
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<div id="col4">
  <h2 align="center"><span style="color:#F17327;">UPLOADED DOCUMENTS</span></h2>
  <p align="center">&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  
  <table>
  <?php
  $sno=1;
//ROBERT SORIANO 2015
	
	try {
	$query = "SELECT * FROM upload   where fid = $fid  and fyear = '$id'  order by uid desc";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table border='1' cellpadding='5'>";
	echo "<tr>";
	echo "<th>SNO</th>";
	echo "<th>DOC ID</th>";	
	echo "<th>FINANCILA YEAR</th>";
	echo "<th>DOCUMENT</th>";
	echo "<th>DESCRIPTION</th>";
	echo "<th>DOWNLOAD</th>";
	echo "<th>Delete</th>";
	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
	echo "<tr>";
	echo "<td>{$sno}</td>";
	echo "<td>{$uid}</td>";
	echo "<td>{$fyear}</td>";
	echo "<td>{$fname}</td>";
	echo "<td>{$desc1}</td>";

	 echo "<td><a href='{$uppath}' download='{$fname}' >DOWNLOAD</a> </td>";

	 echo "<td> <input type='button' name='btnprint' value='Delete' onclick='deleterecord($uid)'/></td>";
  
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
<?php include('../include/footer.php');?>
</body>
</html>

<?php 
session_start();
if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }
if($_SESSION['securitylevel']!="ADMIN")
			{
				header('Location: ../index.php');
				}
				


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
	     	var strURL="user_reg_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='showalluser.php';
	
	
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
  <h2 align="center"><span style="color:#F17327;">User Details</span></h2>
  
  <table align="right">
    <?php
	$sno=1;
//ROBERT SORIANO 2015
	require '../conf.php';
	try {
		 
	$query = "SELECT `uid`, `uname`, `username`, appuser.mobile as mobile, `securitylevel`, `status`, `fname`,appuser.fid as fid FROM `appuser` ,firmcreation   where appuser.fid = firmcreation.fid  order by appuser.fname";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table border='1' cellpadding='5' align='center' style='border-collapse:collapse;'>";
	echo "<tr>";
	echo "<th>SNO</th>";
	echo "<th>User ID</th>";
	echo "<th>User Name</th>";
	echo "<th>Mobile</th>";
	echo "<th>Security Level</th>";
	echo "<th>Status</th>";
	echo "<th>Firm name</th>";
	echo "<th>Action</th>";
	echo "<th>Action</th>";
	echo "<th>Action</th>";
	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
	echo "<tr>";
	echo "<td>{$sno}</td>";
	echo "<td>{$uname}</td>";
	echo "<td>{$username}</td>";
	echo "<td>{$mobile}</td>";
	echo "<td>{$securitylevel}</td>";
	echo "<td>{$status}</td>";
	echo "<td><a href='showafirm_user.php?id={$fid}'>{$fname}</a></td>";
		
	echo "<td><a href='user_reg_edit.php?uid={$uid}'>Edit</a></td>";
	echo "<td> <input type='button' name='btnprint' value='Delete' onclick='deleterecord($uid)'/></td>";
	echo "<td><a href='reset_pass.php?uid={$uid}'>Reset Password</a></td>";
	echo "</tr>";
	$sno=$sno+1;
	
	}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

?>
  </table>

</div>

</body>
</html>

<?php
session_start();
if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

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
	     	var strURL="newuser_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='newuser_view.php';
	
	
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
  <h2 align="center"><span style="color:#F17327;">company Information</span></h2>
 
  <table align="right">
    <?php
$sno=1;
//ROBERT SORIANO 2015
	require '../conf.php';
	try {
	$query = "SELECT * FROM firmcreation";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table border='1' cellpadding='5' style='border-collapse:collapse;'>";
	echo "<tr>";
	echo "<th>SNO</th>";
	echo "<th>Firm Name</th>";
	echo "<th>Mobile</th>";
	echo "<th>Type Of Firm</th>";
	echo "<th>Email</th>";
	echo "<th>Sales Tax Registration</th>";
	echo "<th>Mandi License Number</th>";
	echo "<th>ROC Registration No.</th>";
	echo "<th>Propritor Name</th>";
	echo "<th>Place</th>";
	echo "<th>State</th>";
	echo "<th>Delete Record</th>";
  	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
	echo "<tr>";
        echo "<td>{$sno}</td>";
	echo "<td><a href='broker_edit.php?fid={$fid}'>{$firmname}</a></td>";
	echo "<td>{$mobile}</td>";
	echo "<td>{$firmtype}</td>";
	echo "<td>{$email}</td>";
	echo "<td>{$mpvat}</td>";
	echo "<td>{$mandilicenseno}</td>";
	echo "<td>{$tinno}</td>";
	echo "<td>{$propname}</td>";
	echo "<td>{$place}</td>";
	echo "<td>{$state}</td>";
	echo "<td> <input type='button' name='btnprint' value='Delete' onclick='deleterecord($fid)'/></td>";
	echo "</tr>";
    $sno = $sno+1;

	}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

?>
  </table>
  
  
  

</div>
<?php include('../include/footer.php');?>
</body>
</html>

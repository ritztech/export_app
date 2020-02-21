<?php include('../conf.php');

session_start();
if(!isset($_SESSION['uname'])) { echo '<script>window.location="../index.php"</script>'; }

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
	     	var strURL="manditaxablepurchase_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='manditaxablepurchase_view.php';
	
	
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
  <h2><span style="color:#F17327;">Mandi taxable purchase view</span></h2>
  <form id="form1" name="form1" method="post" action="broker_back.php">
    
    <div>
	
	<a href='abca3.php'>Click here to get excel report</a>
      <table  border="0">
        <tbody>
          <tr>
            <td width="596"><p><table>
  <?php
//ROBERT SORIANO 2015
	$sn=1;
	try {
	$query = "SELECT * FROM manditaxablepurchase where fid=$fid  order by mtpid  desc";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table border='1' cellpadding='5' style='border-collapse:collapse;'>";
	echo "<tr>";
	echo "<th>SNO</th>";
	echo "<th>Payment No.</th>";
	echo "<th>Farmer Name</th>";
	echo "<th>Stock Item</th>";
	echo "<th>Purchase Qty</th>";
	echo "<th>Rate</th>";
	echo "<th>Hammali</th>";
	echo "<th>EDIT/SHOW</th>";
	echo "<th>DELETE</th>";
	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
	echo "<tr>";
	echo "<td>{$sn}</td>";
	echo "<td>{$paymentno}</td>";
	echo "<td>{$farmername}</td>";
	echo "<td>{$stockitem}</td>";
	echo "<td>{$purchaseqtl}</td>";
	echo "<td>{$rate}</td>";
	echo "<td>{$hammali}</td>";
	echo "<td><a href='manditaxablepurchase_edit.php?mtpid={$mtpid}'>Edit/Full View</a>  </td>";
	echo "<td> <input type='button' name='btnprint' value='Delete' onclick='deleterecord($mtpid)'/></td>";

	echo "</tr>";
	$sn=$sn+1;
	}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

?>
  </p>
 
    </table>

</form>&nbsp;</p></td>
            <td width="10"><p>&nbsp;</p></td>
          </tr>
        </tbody>
      </table>
    </div>
    <p align="left">&nbsp;</p>
  </form>&nbsp;
</div>
</body>
</html>

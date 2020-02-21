<?php
session_start();
$fid=$_SESSION['fid'];
?>
<?php include('../conf.php'); ?>
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
	     	var strURL="expenses_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='expenses_view.php';
	
	
	} else {
        x = "You pressed Cancel!";
    }

}


</script>
</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>
<div align="center">    <p>&nbsp;    </p>
  <h2 align="center"><span style="color:#F17327;">ACCOUNTING LEDGER REGISTER</span></h2>
  
  <form name="form1" method="post" action="">
 
	
    <p>
      <?php
//ROBERT SORIANO 2015
	
	try {
	$query = "SELECT * FROM expensesregister where fid = $fid";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	
	echo "<table border='1' cellpadding='5' align='center' style='border-collapse:collapse;'>";
	echo "<tr> <td> <a href='supplier_front_new.php'>ADD NEW</a> </td></tr>";
	echo "<tr>";
	
	echo "<th>Expenses ID</th>";
	echo "<th>Expenses Head</th>";
		echo "<th>Edit/View</th>";
		echo "<th>Delete</th>";
	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
	echo "<tr>";
	echo "<td>{$exid}</td>";
	echo "<td>{$expenseshead}</td>";
	
	
   //	echo "<td><a href='expenses_edit.php?exid={$exid}'>Edit/Full View</a></td>";
	echo "<td><a href='expenses_edit.php?exid={$exid}'>Edit/Full View</a>  </td>";
	echo "<td> <input type='button' name='btnprint' value='Delete' onclick='deleterecord($exid)'/></td>";
	echo "</tr>";
	}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

?>
      
      </table>
    </p>
    <p>&nbsp;</p>
  </form>&nbsp;
</div>
</body>
</html>

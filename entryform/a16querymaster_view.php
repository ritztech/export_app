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
  <h2 align="center"><span style="color:#F17327;">Query Details</span></h2>
  <p align="center">&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  
  <table>
  <?php
//ROBERT SORIANO 2015
$sno=1;

	
	try {
	$query = "SELECT `adminid`, `adminterate`, `subject`, `priroty`, `querytype`, `query`, `fid`, `entrydate` FROM `mandia16` WHERE fid = $fid";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table border='1' cellpadding='5'>";
	echo "<tr>";
	echo "<th>S NO</th>";
	echo "<th>Admin</th>";
	echo "<th>Subject</th>";
	echo "<th>Priroty</th>";
	echo "<th>Query type</th>";
	echo "<th>Query</th>";
	echo "<th>Action</th>";
	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
	echo "<tr>";
	echo "<td>{$sno}</td>";
	echo "<td>{$adminterate}</td>";
	echo "<td>{$subject}</td>";
	echo "<td>{$priroty}</td>";
	echo "<td>{$querytype}</td>";
	echo "<td>{$query}</td>";
	echo "<td> <a href='deletehhhhhgggggg.php?adminid={$adminid}'>Delete</a></td>";
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

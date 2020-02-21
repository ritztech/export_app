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
</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/menu1.php');?>
<div id="gutter"></div>

<div id="col4">
  <h2 align="center"><span style="color:#F17327;">User Details</span></h2>
  <p>&nbsp;</p>
  <table align="right">
    <?php
	$sno=1;
//ROBERT SORIANO 2015
	require '../conf.php';
	try {
		 
	$query = "SELECT `uid`, `uname`, `username`, `mobile`, `securitylevel`, `status`, `fname`,fid FROM `appuser`  order by fname";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table border='1' cellpadding='5' align='center'>";
	echo "<tr>";
	echo "<th>SNO</th>";
	echo "<th>User ID</th>";
	echo "<th>User Name</th>";
	echo "<th>Mobile</th>";
	echo "<th>Security Level</th>";
	echo "<th>Status</th>";
	echo "<th>Firm name</th>";
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
	echo "</tr>";
	$sno=$sno+1;
	
	}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

?>
  </table>

</div>
<div id="col3">

</div>
<?php include('../include/footer.php');?>
</body>
</html>

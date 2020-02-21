
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

<div id="col5">
  <h2 align="center"><span style="color:#F17327;">User logged in Information</span></h2>
  <p>&nbsp;</p>
  <table align="right">
    <?php
$sno=1;
//ROBERT SORIANO 2015
	require '../conf.php';
	try {
	$query = "SELECT `userid`, `firmname`,DATE_FORMAT(in_time,'%d/%m/%Y') as in_time FROM `active_user` order by in_time  desc ";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table border='1' cellpadding='5'>";
	echo "<tr>";
	echo "<th>SNO</th>";
	echo "<th>User name</th>";
	echo "<th>Firm Name</th>";
  	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
	echo "<tr>";
      echo "<td>{$sno}</td>";
	echo "<td>{$userid}</td>";
	echo "<td>{$firmname}</td>";
	echo "<td>{$in_time}</td>";

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

<?php
session_start();
$fid=$_SESSION['fid'];
?>
<?php include('../conf.php');?>
<?php 

if(isset($_POST['s'])) {
$villagename = $_POST['villagename'];
$city = $_POST['city'];
$tahseel = $_POST['tahseel'];
$state = $_POST['state'];
$vid = $_POST['vid'];
	$query = "UPDATE villagename SET
	villagename='$villagename',
	city='$city',
	tahseel='$tahseel',
	state='$state'	
    WHERE vid='$vid'";
	mysql_query($query);
	//echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
       echo "<script>alert('Data updated successfully.');location.href='villagename_view.php'</script>"; 
}
?>
<?php
try {
$query = "SELECT `vid`, `villagename`, `city`, `tahseel`, `state`, `fid` FROM `villagename` WHERE vid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['vid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$villagename = $row['villagename'];
$city = $row['city'];
$tahseel = $row['tahseel'];
$state = $row['state'];
$vid = $row['vid'];

} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>

<html>
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center">
 <p>&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">Edit village name</span></h2>
  <form action="" method="POST">
   
    <p>
      <input type="hidden" name="vid" value="<?php echo $vid; ?>"/> 
      </br>
Village Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input type="text" name="villagename" value="<?php echo $villagename; ?>"/>
    </p>
    <p></br>
    
    City Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  
      <input type="text" name="city" value="<?php echo $city; ?>"/>
    </p>
    <p>Tahseel:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="tahseel" value="<?php echo $tahseel; ?>"/>
    </p>
    <p>State:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="state" value="<?php echo $state; ?>"/>
	  
    </p>
    <table width="368" border="0">
      <tbody>
      
        <tr>
          <td width="113">&nbsp;</td>
          <td width="71"><input type="submit" name="s"/></td>
        </tr>
      </tbody>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </form>

</div>
</body>
</html>

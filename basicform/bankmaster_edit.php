<?php include('../conf.php');
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }


?>
<?php 

if(isset($_POST['s'])) {
$bankname = $_POST['bankname'];
$bankid = $_POST['bankid'];
	$query = "UPDATE bank_master SET bankname='$bankname' WHERE bankid='$bankid'";
	mysql_query($query);
	//echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
   echo "<script>alert('Data updated successfully.');location.href='bankmaster_view.php'</script>"; 

}
?>
<?php
try {
$query = "SELECT `bankid`, `fid`, `bankname` FROM `bank_master` WHERE bankid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['bankid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$bankname = $row['bankname'];

$bankid = $row['bankid'];
} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
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
<div id="col1">
  <h2>Menu</h2>
  <?php include('../include/sidemenu.php');?>
  <p>&nbsp;</p>
</div>
<div id="col4">
  <h2>&nbsp;</h2>
 
    <h2 align="center"><span style="color:#F17327;">Edit Bank Name</span></h2>
    <p align="center">&nbsp;</p>
    <form id="form1" name="form1" method="post" action="">
      <p align="center">
        <label for="textfield">Bank Name:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="bankname" value="<?php echo $bankname; ?>" size="39" />
        <br />
          <br />
        </label>
        <input type="hidden" name="bankid" value="<?php echo $bankid; ?>" />
      </p>
      <p align="center">
        <input type="submit" name="s" id="submit" value="Submit" />
      </p>
    </form>
    <p align="center">&nbsp;</p>
    <p align="center">&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </blockquote>
</div>
<?php include('../include/footer.php');?>
</body>
</html>

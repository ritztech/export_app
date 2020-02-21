<?php include('../conf.php');
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }


?>
<?php 

if(isset($_POST['s'])) {
$description = $_POST['description'];
$voucherid = $_POST['voucherid'];
	$query = "UPDATE vouchertype SET description='$description' WHERE voucherid='$voucherid'";
	mysql_query($query);
	//echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
   echo "<script>alert('Data updated successfully.');location.href='voucher_view.php'</script>"; 

}
?>
<?php
try {
$query = "SELECT `voucherid`, `description`, `fid` FROM `vouchertype` WHERE voucherid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['voucherid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$description = $row['description'];

$voucherid = $row['voucherid'];
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
<?php include('../include/sidemenu.php');?>

<div align="center">
  <h2>&nbsp;</h2>
  
    <h2 align="center"><span style="color:#F17327;">Edit ACCOUNTING VOUCHER TYPE</span></h2>
    <p align="center">&nbsp;</p>
    <form id="form1" name="form1" method="post" action="">
      <p align="center">
        <label for="textfield">Accounting Voucher Type: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </label>
        <input type="text" name="description" value="<?php echo $description; ?>" size="45"/>
        <input type="hidden" name="voucherid" value="<?php echo $voucherid; ?>" />
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
</body>
</html>

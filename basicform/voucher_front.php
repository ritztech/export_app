<?php
include('../conf.php'); 
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }

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
<?php include('../include/sidemenu.php');?>

<div>
  <h2>&nbsp;</h2>
 
    <h2 align="center"><span style="color:#F17327;">Add ACCOUNTING VOUCHER TYPE</span></h2>
    
    <form id="form1" name="form1" method="post" action="voucher_back.php">
      <p align="center">
        <label for="textfield"><b>Accounting Voucher Type: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" name="description" size="39" />
        <br />
          <br />
        </label>
      </p>
      <p align="center">
        <input type="submit" name="s" id="submit" value="Submit" />
      </p>
    
   
    </form>
</div>
</body>
</html>

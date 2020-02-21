<?php
session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}
$fid=$_SESSION['fid'];
?>
<?php

include("../conf.php");

?>
<?php

try {
$query = "SELECT `billid`, `supid`, `fid`, `suppliername`, `type`, `fundpayment`, `bankcharges`, `chequeamount`, `chequeno`, `bankname`, `branch`, `entrydate` FROM `mandia7` WHERE billid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['billid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
            $suppliername =$row['suppliername'];
            $type         =$row['type'];
            $fundpayment  =$row['fundpayment'];
            $bankcharges  =$row['bankcharges'];
            $chequeamount =$row['chequeamount'];
            $chequeno    =$row['chequeno'];
            $bankname     =$row['bankname'];
            $branch       = $row['branch'];
            $entrydate    =$row['entrydate'];
            $billid		 = $row['billid'];
} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="..//style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>

</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/menu1.php');?>
<div id="gutter"></div>
<div id="col1">
  <h2>Menu</h2>
  <?php include('./include/sidemenu.php');?>
  <p>&nbsp;</p>
</div>
<div id="col4">
  <h2 align="center"><span style="color:#F17327;">Bill Payment Details</span>    </h2>
  <form id="form1" name="form1" method="post" action="">
  <table  border="1" rules="none" frame="box" cellpadding="6">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Bill Payment Details</h4></td>
        </tr>
        <tr>
          <td width="128"><label for="textfield">Party Name:</label></td>
          <td colspan="2"><input type="text" name="suppliername" size="45" value="<?php echo $suppliername ?>"/></td>
        
          <td width="200">&nbsp;</td>
        </tr>
        <tr>
          <td height="35"><label for="textfield3">Type:</label></td>
          <td><input type="text" name="type" value="<?php echo $type ?>" /></td>
          <td><label for="textfield4">Fund Payment:</label></td>
          <td><input type="text" name="fundpayment" id="textfield4" value="<?php echo $fundpayment ?>" /></td>
        </tr>
        <tr>
          <td><label for="textfield5">Bank Charges:</label></td>
          <td><input type="text" name="bankcharges" id="textfield5" value="<?php echo $bankcharges?>" /></td>
          <td>Cheque Amount:</td>
          <td><input type="text" name="chequeamount" id="textfield" value="<?php echo $chequeamount ?>" /></td>
        </tr>
        <tr>
          <td><label for="textfield6">Cheque Number:</label></td>
          <td><p>
            <input type="text" name="chequeno" id="textfield6" value="<?php echo $chequeno ?>" />
          </p></td>

          <td></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Bank Name</td>
          <td><input type="text" name="bankname" id="textfield7" value="<?php echo $bankname ?>" /></td>
          <td>Branch:</td>
          <td><input type="text" name="branch" id="textfield9" value="<?php echo $branch ?>" /></td>
        </tr>
      <tr>
          <td height="35"></td>
          <td></td>
          <td><?php
					
					if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" )
					{ ?>
					<a href="#" onclick="window.open('a7billspayment_edit.php?billid=<?php echo $billid; ?>');    return false;">
                      <input type="button" value="Click here to Edit Record" />
                    </a>
					
					<?php  } ?></td>
          <td></td>
        </tr>
    </table>
  <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
</form>&nbsp;
</div>
<?php include('../include/footer.php');?>
</body>
</html>

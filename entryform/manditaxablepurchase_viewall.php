<?php
session_start();
$fid=$_SESSION['fid'];
?>
<?php

include("../conf.php");

?>
<?php

try {
$query = "SELECT `fid`, `mtpid`, `paymentno`,DATE_FORMAT(paymentdate,'%d/%m/%Y') as paymentdate, `contact`, `farmername`, `surname`, `villagename`, `stockitem`, `estimateqty`, `purchaseqtl`, `rate`, `hammali`, `hdenometer`, `alock`,DATE_FORMAT(entrydate,'%d/%m/%Y') as entrydate FROM `manditaxablepurchase` WHERE mtpid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['mtpid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
            $paymentno =$row['paymentno'];
			$paymentdate =$row['paymentdate'];
            $contact =$row['contact'];
            $farmername =$row['farmername'];
            $surname =$row['surname'];
            $villagename =$row['villagename'];
            $stockitem =$row['stockitem'];
            $estimateqty=$row['estimateqty'];
            $purchaseqtl= $row['purchaseqtl'];
			$rate =$row['rate'];
            $hammali=$row['hammali'];
            $hdenometer= $row['hdenometer'];
            $alock =$row['alock'];
			 $entrydate =$row['entrydate'];
            $mtpid = $row['mtpid'];
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
  <h2 align="center"><span style="color:#F17327;">mandi taxable purchase details</span></h2>
  <form id="form1" name="form1" method="post" action="broker_back.php">
    <p align="left">&nbsp;</p>
    <div align="left">
      <table  border="0">
        <tbody>
          <tr>
            <td width="596"><p><table>
 <table width="689" border="1" rules="none" frame="box" cellpadding="7">
      <tbody>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="textfield">Payment Number:</label></td>
          <td><input type="text" name="paymentno" id="textfield" value="<?php echo $paymentno ?>" /></td>
          <td><label for="textfield2">Payment Date:</label></td>
          <td><input id="dstart"   name = "paymentdate"   type = "text" value="<?php echo $paymentdate ?>"/></td>
        </tr>
        <tr>
          <td><label for="textfield3">Contact Number:</label></td>
          <td><input type="text" name="contact" id="textfield3" value="<?php echo $contact ?>" /></td>
          <td><label for="textfield4">Farmer Name:</label></td>
          <td><input type="text" name="farmername" id="textfield4" value="<?php echo $farmername ?>" /></td>
        </tr>
        <tr>
          <td><label for="select">Surname:</label></td>
          <td><input type="text" value="<?php echo $surname ?>" name="surname" /></td>
          <td><label for="select2">Village Name:</label></td>
          <td><input type="text" name="villagename" value="<?php echo $villagename ?>" /></td>
        </tr>
        <tr>
          <td><label for="select3">Stock Item:</label></td>
          <td><input type="text" name="stockitem" value="<?php echo $stockitem ?>" /></td>
          <td><label for="textfield5">Estimate Qty:</label></td>
          <td><input type="text" name="estimateqty" id="textfield5" value="<?php echo $estimateqty ?>" /></td>
        </tr>
        <tr>
          <td><label for="textfield6">Purchase Qtl:</label></td>
          <td><input type="text" name="purchaseqtl" id="textfield6" value="<?php echo $purchaseqtl ?>" /></td>
          <td><label for="textfield7">Rate:</label></td>
          <td><input type="text" name="rate" id="textfield7" value="<?php echo $rate ?>" /></td>
        </tr>
        <tr>
          <td><label for="textfield8">Hammali:</label></td>
          <td><input type="text" name="hammali" id="textfield8" value="<?php echo $hammali ?>" /></td>
          <td><label for="select4">Denometer:</label></td>
          <td><input type="text" value="<?php echo $hdenometer ?>" name="hdenometer"/></td>
        </tr>
        <tr>
          <td><label for="select5">Lock For Date:</label></td>
          <td><input type="text" name="alock" value="<?php echo $alock ?>" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td> <?php
					
					if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" )
					{ ?>
					<a href="#" onclick="window.open('manditaxablepurchase_edit.php?mtpid=<?php echo $mtpid; ?>');    return false;">
                      <input type="button" value="Click here to Edit Record" />
                    </a>
					
					<?php  } ?></td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
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
<?php include('../include/footer.php');?>
</body>
</html>

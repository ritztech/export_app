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
$query = "SELECT `a4id`, `fid`, `partyname`, `billno`,DATE_FORMAT(date,'%d/%m/%Y') as date, `stockitem`, `bag`, `packing`, `grossweight`, `netweight`, `salestaxform`, `manditaxform`, `entrytaxform`, `transportername`, `crosingtname`, `brokername`, `paymentterms`, `mandigatepass`, `mandisamiti`, `quantity`, `truckno`, `otherdoc`,DATE_FORMAT(entrydate,'%d/%m/%Y') as entrydate FROM `mandia4` WHERE a4id=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['a4id']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
            $partyname =$row['partyname'];
            $billno =$row['billno'];
            $date =$row['date'];
            $stockitem =$row['stockitem'];
            $bag =$row['bag'];
            $packing =$row['packing'];
            $grossweight =$row['grossweight'];
            $netweight = $row['netweight'];
            $salestaxform =$row['salestaxform'];
            $manditaxform =$row['manditaxform'];
            $entrytaxform = $row['entrytaxform'];
            $transportername =$row['transportername'];
            $crosingtname = $row['crosingtname'];
            $brokername = $row['brokername'];
            $paymentterms =$row['paymentterms'];
            $mandigatepass =$row['mandigatepass'];
            $mandisamiti = $row['mandisamiti'];
            $quantity =$row['quantity'];
            $truckno = $row['truckno'];
            $otherdoc =$row['otherdoc'];
            $entrydate = $row['entrydate'];
            $a4id = $row['a4id'];
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
  <?php include('../include/sidemenu.php');?>
  <p>&nbsp;</p>
</div>
<div id="col4">
  <h2 align="center"><span style="color:#F17327;">purchase order Details form</span>    </h2>
  <form id="form1" name="form1" method="post" action="">
  <table border="1" rules="none" frame="box" cellpadding="9">
              <tbody>
                <tr>
                  <td colspan="4" bgcolor="#14C4B6"><div align="center">
                    <h4>Mandi+VAT Purchase(From Regised Dealer)</h4>
                  </div></td>
                </tr>
                <tr>
                  <td>Party Name</td>
                  <td><input type="text" name="partyname" readonly="readonly" id="textfield15" value="<?php echo $partyname ?>" /></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>Bill Number:</td>
                  <td><input type="text" name="billno" value="<?php echo $billno ?>" readonly="readonly" id="textfield" /></td>
                  <td>Date:</td>
                  <td><input id="dstart"   name = "date" readonly="readonly" value="<?php echo $date ?>"   type = "text" /></td>
                </tr>
                <tr>
                  <td>Stock Item:</td>
                  <td><input type="text" name="stockitem" id="textfield13" readonly="readonly" value="<?php echo $stockitem ?>" /></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>Broker Name:</td>
                  <td colspan="2"><input type="text" name="brokername" readonly="readonly" value="<?php echo $brokername ?>" id="textfield14" size="40" /></td>
                  
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>Bag:</td>
                  <td><input type="text" name="bag" id="textfield2" readonly="readonly" value="<?php echo $bag ?>" /></td>
                  <td>Packing:</td>
                  <td><input type="text" name="packing" id="textfield4" readonly="readonly" value="<?php echo $packing ?>" /></td>
                </tr>
                <tr>
                  <td>Net Weight(Gatepass)</td>
                  <td><input type="text" name="netweight" id="textfield6" readonly="readonly" value="<?php echo $netweight ?>" /></td>
                  <td>Gross Weight:</td>
                  <td><input type="text" name="grossweight" id="textfield5" readonly="readonly" value="<?php echo $grossweight ?>" /></td>
                </tr>
                <tr>
                  <td>Sales Tax Form Terms:</td>
                  <td><input type="text" readonly="readonly" value="<?php echo $salestaxform ?>" name="salestaxform" /></td>
                  <td>Entry Tax Form Terms:</td>
                  <td><input type="text" readonly="readonly" value="<?php echo $entrytaxform ?>" name="entrytaxform" /></td>
                </tr>
                <tr>
                  <td>Mandi Tax Form Terms:</td>
                  <td><input type="text" readonly="readonly" value="<?php echo $manditaxform ?>" name="manditaxform" /></td>
                  <td>Transporter Name:</td>
                  <td><input type="text" readonly="readonly" value="<?php echo $transportername ?>" name="transportername" /></td>
                </tr>
                <tr>
                  <td>Crossing Transporter terms:</td>
                  <td><input type="text" readonly="readonly" value="<?php echo $crosingtname ?>" name="crosingtname" /></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>Payment Terms:</td>
                  <td><input type="text" name="paymentterms" readonly="readonly" value="<?php echo $paymentterms ?>" id="textfield7" /></td>
                  <td>Mandi Gate Pass Details</td>
                  <td><input type="text" name="mandigatepass" id="textfield8" readonly="readonly" value="<?php echo $mandigatepass ?>" /></td>
                </tr>
                <tr>
                  <td>Issue Mandi Samiti:</td>
                  <td><input type="text" name="mandisamiti" id="textfield9" readonly="readonly" value="<?php echo $mandisamiti ?>" /></td>
                  <td>Quantity:</td>
                  <td><input type="text" name="quantity" id="textfield10" readonly="readonly" value="<?php echo $quantity?>" /></td>
                </tr>
                <tr>
                  <td>Truck Vehicle Number:</td>
                  <td><input type="text" name="truckno" id="textfield11" readonly="readonly" value="<?php echo $truckno ?>" /></td>
                  <td>Other Document Attached:</td>
                  <td><input type="text" name="otherdoc" id="textfield12" readonly="readonly" value="<?php echo $otherdoc ?>" /></td>
                </tr>
                <tr>
                <td><label>Entry Date:</label></td>
                <td><input type="text" name="entrydate" id="textfield12" readonly="readonly" value="<?php echo $entrydate ?>" /></td>
                <td><?php
					
					if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" )
					{ ?>
					<a href="#" onclick="window.open('mandipaidpurchase_edit.php?a4id=<?php echo $a4id; ?>');    return false;">
                      <input type="button" value="Click here to Edit Record" />
                    </a>
					
					<?php  } ?></td>
                <td></td>
                </tr>
      </tbody>
            </table>
  <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
</form>&nbsp;
</div>
<?php include('../include/footer.php');?>
</body>
</html>

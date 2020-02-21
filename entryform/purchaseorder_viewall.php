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
$query = "SELECT `fid`, `poid`, `suppliername`, `brokername`, `stockitem`, `moisture`, `dust`, `smallseed`, `splitseed`, `oil`, `quantity`, `denometer`, `bag`, `packingterms`, `bagquality`, `rate`, DATE_FORMAT(deleveryduedate,'%d/%m/%Y') as deleveryduedate  , `paymentterms`, `cashdcond`, `modeofsupply`, DATE_FORMAT(saudadate,'%d/%m/%Y')  as saudadate , `stfcondition`, `mtfcondition`, `etfcondition`, `entrydate`, `status` FROM `purchase_order` WHERE poid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['poid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
 $suppliername =$row['suppliername'];
            $brokername =$row['brokername'];
            $stockitem =$row['stockitem'];
            $moisture =$row['moisture'];
            $dust =$row['dust'];
            $smallseed =$row['smallseed'];
            $splitseed =$row['splitseed'];
            $oil = $row['oil'];
            $quantity =$row['quantity'];
            $denometer =$row['denometer'];
            $bag = $row['bag'];
            $packingterms =$row['packingterms'];
            $bagquality = $row['bagquality'];
            $rate = $row['rate'];
            $deleveryduedate =$row['deleveryduedate'];
            $paymentterms =$row['paymentterms'];
            $cashdcond = $row['cashdcond'];
            $modeofsupply =$row['modeofsupply'];
            $saudadate = $row['saudadate'];
            $stfcondition =$row['stfcondition'];
            $mtfcondition = $row['mtfcondition'];
            $etfcondition = $row['etfcondition'];
			$status = $row['status'];
            $poid = $row['poid'];
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
  <table border="1" rules="none" frame="box" cellpadding="6">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Basic Details</h4></td>
        </tr>
        <tr>
          <td width="128"><label for="select">Supplier Name:</label></td>
          <td width="220"><input type="text"  size = "34" readonly="readonly" value="<?php echo $suppliername; ?>" />  </td>
		  </tr>
		  
		  <tr>
                       
          <td width="183"><label for="select2">Broker Name:</label></td>
          <td width="200"><input type="text"  size = "34"  readonly="readonly" value="<?php echo $brokername; ?>" /></td>
        </tr>
        <tr>
          <td height="40"><label for="select3">Stock Item:</label></td>
          <td><input type="text" size = "10" readonly="readonly" value="<?php echo $stockitem; ?>" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Quality Norms</h4></td>
        </tr>
        <tr>
          <td><label for="textfield">Moisture%:</label></td>
          <td><input type="text" name="moisture" readonly="readonly" value="<?php echo $moisture; ?>"/></td>
          <td><label for="textfield2">Dust(Sand)%:</label></td>
          <td><input type="text" name="dust" id="textfield2" readonly="readonly" value="<?php echo $dust; ?>" /></td>
        </tr>
        <tr>
          <td height="35"><label for="textfield3">Small Seed%:</label></td>
          <td><input type="text" name="smallseed" readonly="readonly" id="textfield3" value="<?php echo $smallseed; ?>" /></td>
          <td><label for="textfield4">Split Seed%:</label></td>
          <td><input type="text" readonly="readonly" name="splitseed" id="textfield4" value="<?php echo $splitseed; ?>" /></td>
        </tr>
        <tr>
          <td><label for="textfield5">Oil%:</label></td>
          <td><input type="text" name="oil" readonly="readonly" id="textfield5" value="<?php echo $oil; ?>" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="textfield6">Quantity:</label></td>
          <td><p>
            <input type="text" name="quantity" readonly="readonly" id="textfield6" value="<?php echo $quantity; ?>" />
          </p></td>

          <td>Qtl/Ltr</td>
          <td><input type="text" name="quantity" readonly="readonly" id="textfield6" value="<?php echo $denometer; ?>" />
          </td>
        </tr>
        <tr>
          <td>Bag:</td>
          <td><input type="text" name="bag" readonly="readonly" id="textfield7" value="<?php echo $bag; ?>" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="38">Packing Term:</td>
          <td><input type="text" name="packingterms" readonly="readonly" id="textfield8" value="<?php echo $packingterms; ?>" /></td>
          <td>Bag Quality:</td>
          <td><input type="text" name="bagquality" readonly="readonly" id="textfield9" value="<?php echo $bagquality; ?>" /></td>
        </tr>
        <tr>
          <td height="36">Rate/Qty:</td>
          <td><input type="text" name="rate" readonly="readonly" id="textfield10" value="<?php echo $rate; ?>" /></td>
          <td><label for="textfield11">Delivery Due Date:</label></td>
          <td><input id="dstart"   name = "deleveryduedate" value="<?php echo $deleveryduedate; ?>"   type = "text"  size="17"  value="DD/MM/YYYY" />  </td>
        </tr>
        <tr>
          <td height="38">Payment Terms:</td>
          <td><input type="text" name="paymentterms" readonly="readonly" id="textfield12" value="<?php echo $paymentterms; ?>" /></td>
          <td>Cash Discount Conditions:</td>
          <td><input type="text" name="cashdcond" readonly="readonly" id="textfield14" value="<?php echo $cashdcond; ?>" /></td>
        </tr>
        <tr>
          <td>Mode Of Supply:</td>
          <td><input type="text" name="modeofsupply" readonly="readonly" id="textfield13" value="<?php echo $modeofsupply; ?>" /></td>
          <td>Sauda Date:</td>
          <td><input id="saudadate"   name = "saudadate" value="<?php echo $saudadate; ?>"   type = "text"  size="17"  value="DD/MM/YYYY" /> </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Tax Form Conditon</h4></td>
        </tr>
        <tr>
          <td><label for="select4">Sales Tax:</label></td>
          <td><input type="text" name="stfcondition" readonly="readonly" value="<?php echo $stfcondition; ?>" /></td>
          <td>Entry Tax:</td>
          <td><input type="text" name="etfcondition" readonly="readonly" value="<?php echo $etfcondition; ?>" /></td>
        </tr>
        <tr>
          <td height="47">Mandi Tax:</td>
          <td><input type="text" name="mtfcondition" readonly="readonly" value="<?php echo $mtfcondition; ?>" /></td>
          <td>Status</td>
          <td><input type="text" readonly="readonly" name="status" value="<?php echo $status; ?>" />
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td></td>
          <td>
          <?php
					
					if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" )
					{ ?>
					<a href="#" onclick="window.open('purchaseorder_edit.php?poid=<?php echo $poid; ?>');    return false;">
                      <input type="button" value="Click here to Edit Record" />
                    </a>
					
					<?php  } ?>
          
          </td>
          <td>&nbsp;</td>
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

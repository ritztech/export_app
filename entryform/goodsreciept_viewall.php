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
$query = "SELECT `fid`, `stockitem`, `moisture`, `dust`, `smallseed`, `splitseed`, `oil`, `quantity`, `denometer`, `bag`, `packingbag`, `grid`, `suppliername`, `brokername`, `recieptweight`, `bagquality`, `modeofsupply`, `vehiclenumber`, `supervisiorname`, `billno`, `gatepassno`, `form10`, `billtyno`, `frieght`, `remark`, `entrydate` FROM `goodrecieptsnote` WHERE grid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['grid']);
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
			$packingbag = $row['packingbag'];
            $recieptweight = $row['recieptweight'];
            $bagquality = $row['bagquality'];
            $modeofsupply =$row['modeofsupply'];
			$vehiclenumber = $row['vehiclenumber'];
            $supervisiorname = $row['supervisiorname'];
            $billno = $row['billno'];
            $gatepassno = $row['gatepassno'];
            $form10 = $row['form10'];
            $billtyno = $row['billtyno'];
			$frieght = $row['frieght'];
            $remark = $row['remark'];
            $grid = $row['grid'];
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
  <h2 align="center"><span style="color:#F17327;">good reciepts note Details</span>  </h2>
  <form id="form1" name="form1" method="post" action="">
  <table width="771" border="1" rules="none" frame="box" cellpadding="6">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Purchase Order Details</h4></td>
        </tr>
        <tr>
          <td width="128"><label for="textfield19">Supplier Name:</label></td>
          <td width="220"><input type="text" name="suppliername" readonly="readonly" id="textfield19" value="<?php echo $suppliername; ?>" /></td>
          <td width="183">&nbsp;</td>
          <td width="200">&nbsp;</td>
        </tr>
        <tr>
          <td>Broker Name:</td>
          <td><input type="text" name="brokername" readonly="readonly" id="textfield18" value="<?php echo $brokername; ?>" /></td>
          <td>Stock Item:</td>
          <td><input type="text" name="stockitem" readonly="readonly" id="textfield20" value="<?php echo $stockitem; ?>" /></td>
        </tr>
        <tr>
          <td><label for="textfield">Moisture%:</label></td>
          <td><input type="text" name="moisture" readonly="readonly" value="<?php echo $moisture; ?>" /></td>
          <td><label for="textfield2">Dust(Sand)%:</label></td>
          <td><input type="text" name="dust" readonly="readonly" id="textfield2" value="<?php echo $dust; ?>" /></td>
        </tr>
        <tr>
          <td height="35"><label for="textfield3">Small Seed%:</label></td>
          <td><input type="text" name="smallseed" readonly="readonly" id="textfield3" value="<?php echo $smallseed; ?>" /></td>
          <td><label for="textfield4">Split Seed%:</label></td>
          <td><input type="text" name="splitseed" readonly="readonly" id="textfield4" value="<?php echo $splitseed; ?>" /></td>
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
          <td>
          <input type="text" name="denometer" readonly="readonly" value="<?php echo $denometer; ?>" /></td>
        </tr>
        <tr>
          <td>Recipts Bag:</td>
          <td><input type="text" name="bag" readonly="readonly" id="textfield7" value="<?php echo $bag; ?>" /></td>
          <td>Packing per Bag</td>
          <td><input type="text" name="packingbag" readonly="readonly" id="textfield" value="<?php echo $packingbag; ?>" /></td>
        </tr>
        <tr>
          <td height="38">Reciept Weight:</td>
          <td><input type="text" name="recieptweight" readonly="readonly" id="textfield8" value="<?php echo $recieptweight; ?>" /></td>
          <td>Bag Quality:</td>
          <td><input type="text" name="bagquality" readonly="readonly" id="textfield9" value="<?php echo $bagquality; ?>" /></td>
        </tr>
        <tr>
          <td height="36">Mode Of Supply:</td>
          <td><input type="text" name="modeofsupply" readonly="readonly" id="textfield10" value="<?php echo $modeofsupply; ?>" /></td>
          <td>&nbsp;</td>
          <td>
        </td>
        </tr>
        <tr>
          <td height="38">Truck/Vehicle Number:</td>
          <td><input type="text" name="vehiclenumber" readonly="readonly" id="textfield12" value="<?php echo $vehiclenumber; ?>" /></td>
          <td>Supervisior Name:</td>
          <td><input type="text" name="supervisiorname" readonly="readonly" id="textfield14" value="<?php echo $supervisiorname; ?>" /></td>
        </tr>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Attachments Of Paper</h4></td>
        </tr>
        <tr>
          <td><label for="select4">Bill No:</label></td>
          <td><input type="text" name="billno" readonly="readonly" id="textfield15" value="<?php echo $billno; ?>" /></td>
          <td>Mandi Gate Pass Number:</td>
          <td><input type="text" name="gatepassno" readonly="readonly" id="textfield16" value="<?php echo $gatepassno; ?>" /></td>
        </tr>
        <tr>
          <td height="47">Form 10 No.:</td>
          <td><input type="text" name="form10" readonly="readonly" id="textfield17" value="<?php echo $form10; ?>" /></td>
          <td>Billty Number</td>
          <td><input type="text" name="billtyno" readonly="readonly" id="textfield11" value="<?php echo $billtyno; ?>" />
          </td>
        </tr>
        <tr>
          <td>Freight Details(Total)</td>
          <td><input type="text" name="frieght" readonly="readonly" id="textfield13" value="<?php echo $frieght; ?>" /></td>
          <td><label for="textarea">Remark:</label></td>
          <td><textarea name="remark" id="textarea" cols="20" rows="5"><?php echo $remark; ?></textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>
          
          <?php
					
					if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" )
					{ ?>
					<a href="#" onclick="window.open('goodsreciept_edit.php?grid=<?php echo $grid; ?>');    return false;">
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

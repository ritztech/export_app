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
$query = "SELECT `siid`, `fid`, `soid`, `partyname`, `billno`,DATE_FORMAT(date,'%d/%m/%Y') as date, `stockitem`, `bag`, `packing`, `grossweight`, `weight4billed`, `netweight`, `stfcondition`, `etfcondition`, `mtfcondition`, `transportname`, `crosingtname`, `brokername`, `paymentterms`, `mandigatepass`, `issuesamiti`, `quantity`, `denometer`, `truckno`, `billtyno`, `otherdoc`, `porderno`, `freighttotal`, `freightadv`, `freightpaid` FROM `mandia6` WHERE siid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['siid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
            $partyname =$row['partyname'];
            $billno =$row['billno'];
            $date =$row['date'];
            $stockitem =$row['stockitem'];
            $bag =$row['bag'];
            $packing =$row['packing'];
            $grossweight =$row['grossweight'];
            $weight4billed = $row['weight4billed'];
            $netweight =$row['netweight'];
            $stfcondition =$row['stfcondition'];
            $etfcondition = $row['etfcondition'];
            $mtfcondition =$row['mtfcondition'];
            $transportname = $row['transportname'];
            $crosingtname = $row['crosingtname'];
            $brokername =$row['brokername'];
            $paymentterms =$row['paymentterms'];
            $mandigatepass = $row['mandigatepass'];
            $issuesamiti =$row['issuesamiti'];
            $quantity = $row['quantity'];
            $denometer =$row['denometer'];
            $truckno = $row['truckno'];
            $billtyno = $row['billtyno'];
			$otherdoc = $row['otherdoc'];
			$porderno = $row['porderno'];
			$freighttotal = $row['freighttotal'];
			$freightadv = $row['freightadv'];
			$freightpaid = $row['freightpaid'];
            $siid = $row['siid'];
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
  <h2 align="center"><span style="color:#F17327;">SALES INVOICING FORM </span>    </h2>
  <form id="form1" name="form1" method="post" action="">
  <table width="771" border="1" rules="none" frame="box" cellpadding="6">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Sales Order Details</h4></td>
        </tr>
        <tr>
          <td width="128"><label for="textfield19">Supplier Name:</label></td>
          <td colspan="2"><input type="text" name="partyname" value="<?php echo $partyname?>" id="textfield19" size="45" /></td>
          
          <td width="200">&nbsp;</td>
        </tr>
        <tr>
          <td>Broker Name:</td>
          <td colspan="2"><input type="text" name="brokername" value="<?php echo $brokername?>" id="textfield18" size="45"/></td>
          
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Stock Item:</td>
          <td width="220"><input type="text" name="stockitem" value="<?php echo $stockitem?>" id="textfield20" /></td>
          <td width="183">Bill No:</td>
          <td><input type="text" name="billno" value="<?php echo $billno?>" id="textfield21" /></td>
        </tr>
        <tr>
          <td><label for="textfield">Date:</label></td>
          <td><input type="text" name="date" value="<?php echo $date?>" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="textfield6">Quantity:</label></td>
          <td><p>
            <input type="text" name="quantity" value="<?php echo $quantity?>" id="textfield6" />
          </p></td>

          <td>Qtl/Ltr</td>
          <td>
          <input type="text" name="denometer" value="<?php echo $denometer?>" /></td>
        </tr>
        <tr>
          <td>Bag:</td>
          <td><input type="text" name="bag" id="textfield7" value="<?php echo $bag?>" /></td>
          <td>Packing:</td>
          <td><input type="text" name="packing" id="textfield" value="<?php echo $packing?>" /></td>
        </tr>
        <tr>
          <td height="38">Gross Weight:</td>
          <td><input type="text" name="grossweight" id="textfield8" value="<?php echo $grossweight?>" /></td>
          <td>Weight For Billed:</td>
          <td><input type="text" name="weight4billed" value="<?php echo $weight4billed?>" id="textfield9" /></td>
        </tr>
        <tr>
          <td height="36">Net Weight:</td>
          <td><input type="text" name="netweight" value="<?php echo $netweight?>" id="textfield10" /></td>
          <td>Payment Terms</td>
          <td><input type="text" name="paymentterms" value="<?php echo $paymentterms?>" id="textfield14" /></td>
        </tr>
        <tr>
          <td height="38">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Attachments Of Paper</h4></td>
        </tr>
        <tr>
          <td>Truck/Vehicle Number:</td>
          <td><input type="text" name="truckno" id="textfield12" value="<?php echo $truckno?>" /></td>
          <td>Transporter Name:</td>
          <td><input type="text" name="transportname" id="textfield2" value="<?php echo $transportname?>" /></td>
        </tr>
        <tr>
          <td><label for="select4">Crosing Transport Name::</label></td>
          <td><input type="text" name="crosingtname" id="textfield15" value="<?php echo $crosingtname?>" /></td>
          <td>Mandi Gate Pass Number:</td>
          <td><input type="text" name="mandigatepass" id="textfield16" value="<?php echo $mandigatepass?>" /></td>
        </tr>
        <tr>
          <td height="47">Issue Mandi Samiti:</td>
          <td><input type="text" name="issuesamiti" id="textfield17" value="<?php echo $issuesamiti?>" /></td>
          <td>Billty Number</td>
          <td><input type="text" name="billtyno" id="textfield11" value="<?php echo $billtyno?>" />
          </td>
        </tr>
        <tr>
          <td>Purchase Order No.:</td>
          <td><input type="text" name="porderno" id="textfield3" value="<?php echo $porderno?>" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Freight Details(Total)</td>
          <td><input type="text" name="freighttotal" id="textfield13" value="<?php echo $freighttotal?>"/></td>
          <td><label for="textarea">Freight Details(Adv):</label></td>
          <td><input type="text" name="freightadv" id="textfield4" value="<?php echo $freightadv?>" /></td>
        </tr>
        <tr>
          <td>Freight Details(Paid):</td>
          <td><input type="text" name="freightpaid" id="textfield5" value="<?php echo $freightpaid?>" /></td>
          <td>Sales Tax Form:</td>
          <td><input type="text" name="stfcondition" id="textfield24" value="<?php echo $stfcondition?>" />            &nbsp;</td>
        </tr>
        <tr>
          <td>Entry Tax Form:</td>
          <td><input type="text" name="etfcondition" id="textfield23" value="<?php echo $etfcondition?>" /></td>
          <td>Mandi Tax Form:</td>
          <td><input type="text" name="mtfcondition" id="textfield25" value="<?php echo $mtfcondition?>" /></td>
        </tr>
        <tr>
          <td>Other Document:</td>
          <td><input type="text" name="otherdoc" id="textfield22" value="<?php echo $otherdoc?>" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><?php
					
					if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" )
					{ ?>
					<a href="#" onclick="window.open('salesinvoice_edit.php?siid=<?php echo $siid; ?>');    return false;">
                      <input type="button" value="Click here to Edit Record" />
                    </a>
					
					<?php  } ?></td>
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

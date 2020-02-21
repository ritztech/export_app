<?php

include("../conf.php");

?>
<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }
$fid=$_SESSION['fid'];
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
  <h2 align="center"><span style="color:#F17327;">Purchase order creation form</span>    </h2>
  <form id="form1" name="form1" method="post" action="purchaseorder_back.php">
  <table width="749" border="1" rules="none" frame="box" cellpadding="0">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Basic Details</h4></td>
        </tr>
        <tr>
          <td width="128"><label for="select">Supplier Name:</label></td>
          <td width="220"><select name="suppliername">
                       <option> </option>
                       <?php               
				$query = mysql_query("SELECT * FROM supplier where fid='$fid'");
				while($row = mysql_fetch_array($query)){
					$supid = $row['supid'];
					$suppliername = $row['suppliername'];
			?>
                       <option  value = <?php echo $supid; ?> ><?php echo $suppliername; ?></option>
                       <?php } ?>
                     
                     </select></td>
          <td width="183"><label for="select2">Broker Name:</label></td>
          <td width="200"><select name="brokername">
                       <option> </option>
                       <?php               
				$query = mysql_query("SELECT * FROM broker where fid='$fid'");
				while($row = mysql_fetch_array($query)){
					$brid = $row['brid'];
					$brokername = $row['brokername'];
			?>
                       <option><?php echo $brokername; ?></option>
                       <?php } ?>
                     
          </select></td>
        </tr>
        <tr>
          <td height="40"><label for="select3">Stock Item:</label></td>
          <td><select name="stockitem">
                       <option> </option>
                       <?php               
				$query = mysql_query("SELECT * FROM stockitem ");
				while($row = mysql_fetch_array($query)){
					$stockid = $row['stockid'];
					$stockitem = $row['stockitem'];
			?>
                       <option><?php echo $stockitem; ?></option>
                       <?php } ?>
                     
          </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Quality Norms</h4></td>
        </tr>
        <tr>
          <td><label for="textfield">Moisture%:</label></td>
          <td><input type="text" name="moisture"/></td>
          <td><label for="textfield2">Dust(Sand)%:</label></td>
          <td><input type="text" name="dust" id="textfield2" /></td>
        </tr>
        <tr>
          <td height="35"><label for="textfield3">Small Seed%:</label></td>
          <td><input type="text" name="smallseed" id="textfield3" /></td>
          <td><label for="textfield4">Split Seed%:</label></td>
          <td><input type="text" name="splitseed" id="textfield4" /></td>
        </tr>
        <tr>
          <td><label for="textfield5">Oil%:</label></td>
          <td><input type="text" name="oil" id="textfield5" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="textfield6">Quantity:</label></td>
          <td><p>
            <input type="text" name="quantity" id="textfield6" />
          </p></td>

          <td>Qtl/Ltr</td>
          <td>
          <select name="denometer" id="select" style="width:150px">
          <option>QTL</option>
          <option>LTR</option>
          </select></td>
        </tr>
        <tr>
          <td>Bag:</td>
          <td><input type="text" name="bag" id="textfield7" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="38">Packing Term:</td>
          <td><input type="text" name="packingterms" id="textfield8" /></td>
          <td>Bag Quality:</td>
          <td><input type="text" name="bagquality" id="textfield9" /></td>
        </tr>
        <tr>
          <td height="36">Rate/Qty:</td>
          <td><input type="text" name="rate" id="textfield10" /></td>
          <td><label for="textfield11">Delivery Due Date:</label></td>
          <td><input id="dstart"   name = "deleveryduedate"   type = "text"  size="17"  value="DD/MM/YYYY" />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div></td>
        </tr>
        <tr>
          <td height="38">Payment Terms:</td>
          <td><input type="text" name="paymentterms" id="textfield12" /></td>
          <td>Cash Discount Conditions:</td>
          <td><input type="text" name="cashdcond" id="textfield14" /></td>
        </tr>
        <tr>
          <td>Mode Of Supply:</td>
          <td><input type="text" name="modeofsupply" id="textfield13" /></td>
          <td>Sauda Date:</td>
          <td><input id="saudadate"   name = "saudadate"   type = "text"  size="17"  value="DD/MM/YYYY" />  <a href="javascript:NewCal('saudadate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Tax Form Condition</h4></td>
        </tr>
        <tr>
          <td><label for="select4">Sales Tax:</label></td>
          <td><select name="stfcondition">
                       <option> </option>
                       <?php               
				$query = mysql_query("SELECT * FROM taxform ");
				while($row = mysql_fetch_array($query)){
					$taxid = $row['taxid'];
					$salestaxform = $row['salestaxform'];
					$entrytaxform = $row['entrytaxform'];
					$manditaxform = $row['manditaxform'];
			?>
                       <option><?php echo $salestaxform; ?></option>
                       <?php } ?>
                     
          </select></td>
          <td>Entry Tax:</td>
          <td><select name="etfcondition" >
          <option> </option>
         <?php               
				$query = mysql_query("SELECT * FROM taxform ");
				while($row = mysql_fetch_array($query)){
					$taxid = $row['taxid'];
					
					$entrytaxform = $row['entrytaxform'];
					
			?>
                       <option><?php echo $entrytaxform; ?></option>
                       <?php } ?>
                     
          </select></td>
        </tr>
        <tr>
          <td height="47">Mandi Tax:</td>
          <td><select name="mtfcondition">
          <option> </option>
           <?php               
				$query = mysql_query("SELECT * FROM taxform ");
				while($row = mysql_fetch_array($query)){
					$taxid = $row['taxid'];
					
					$manditaxform = $row['manditaxform'];
					
			?>
                       <option><?php echo $manditaxform; ?></option>
                       <?php } ?>
          </select></td>
          <td>&nbsp;</td>
          <td>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="hidden" name="fid" id="textfield13" value="<?php echo $fid; ?>" />&nbsp;</td>
 <td>  <?php  if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" ) { ?>
<input type="submit" name="s" id="submit" value="Submit Record" />
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

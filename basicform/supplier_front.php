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
<link href="../style.css" rel="stylesheet" type="text/css" />
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
  <h2 align="center"><span style="color:#F17327;">Add Buyer/Seller Details</span></h2>
  <form id="form1" name="form1" method="post" action="supplier_back.php">
    <table width="749" border="3" rules="none" frame="box" cellpadding="1">
      <tbody>
        <tr>
          <td  colspan="4" bgcolor="#14C4B6"><h4>Basic Details</h4></td>
        </tr>
        <tr>
          <td width="131" height="38">Seller/Buyer Name:</td>
          <td colspan="3"><input type="text" name="suppliername" size = "55" id="textfield11" required="required" /></td>
        </tr>
        <tr>
          <td colspan="4"><table width="741" border="1">
		  <tr bgcolor="#14C4B6">
          <td colspan="2"><h4 align="center">Factory Details</h4></td>
          
          <td colspan="2"><h4 align="center">Office Details</h4></td>
        </tr>
        <tr>
          <td height="37">Factory Address:</td>
          <td>
          <p>
            <textarea name="factoryadd" cols="20" rows="2"></textarea>
          </p></td>
          <td>Offic Address:</td>
          <td>&nbsp;
          <textarea name="officeadd" id="textarea" cols="20" rows="2"></textarea></td>
        </tr>
        <tr>
          <td><label for="textfield15">City Name:</label></td>
          <td><input type="text" name="cityname" id="textfield15" /></td>
          <td>City:</td>
          <td><input type="text" name="ocity" id="textfield9" /></td>
        </tr>
        <tr>
          <td>State:</td>
          <td>
               <select name="state" style="width:150px">
<option>--Select State--</option>
<option>Andaman and Nicobar Islands</option>
<option>Andhra Pradesh</option>
<option>Arunachal Pradesh</option>
<option>Assam</option>
<option>Bihar</option>
<option>Chandigarh</option>
<option>Chhattisgarh</option>
<option>Dadra and Nagar Haveli</option>
<option>Daman and Diu</option>
<option>Delhi</option>
<option>Goa</option>
<option>Gujarat</option>
<option>Haryana</option>
<option>Himachal Pradesh</option>
<option>Jammu and Kashmir</option>
<option>Jharkhand</option>
<option>Karnataka</option>
<option>Kerala</option>
<option>Lakshadweep</option>
<option>Madhya Pradesh</option>
<option>Maharashtra</option>
<option>Manipur</option>
<option>Meghalaya</option>
<option>Mizoram</option>
<option>Nagaland</option>
<option>Orissa</option>
<option>Pondicherry</option>
<option>Punjab</option>
<option>Rajasthan</option>
<option>Sikkim</option>
<option>Tamil Nadu</option>
<option>Tripura</option>
<option>Uttaranchal</option>
<option>Uttar Pradesh</option>
<option>West Bengal</option>
</select>
          <td>State:</td>
          <td>
          <select name="ostate" style="width:150px">
<option>--Select State--</option>
<option>Andaman and Nicobar Islands</option>
<option>Andhra Pradesh</option>
<option>Arunachal Pradesh</option>
<option>Assam</option>
<option>Bihar</option>
<option>Chandigarh</option>
<option>Chhattisgarh</option>
<option>Dadra and Nagar Haveli</option>
<option>Daman and Diu</option>
<option>Delhi</option>
<option>Goa</option>
<option>Gujarat</option>
<option>Haryana</option>
<option>Himachal Pradesh</option>
<option>Jammu and Kashmir</option>
<option>Jharkhand</option>
<option>Karnataka</option>
<option>Kerala</option>
<option>Lakshadweep</option>
<option>Madhya Pradesh</option>
<option>Maharashtra</option>
<option>Manipur</option>
<option>Meghalaya</option>
<option>Mizoram</option>
<option>Nagaland</option>
<option>Orissa</option>
<option>Pondicherry</option>
<option>Punjab</option>
<option>Rajasthan</option>
<option>Sikkim</option>
<option>Tamil Nadu</option>
<option>Tripura</option>
<option>Uttaranchal</option>
<option>Uttar Pradesh</option>
<option>West Bengal</option>
</select>          </tr>
        <tr>
          <td>Pin No:</td>
          <td><input type="text" name="pin" id="textfield18" /></td>
          <td>Pin :</td>
          <td><input type="text" name="opin" id="textfield13" /></td>
        </tr>
        <tr>
          <td>Mobile Number:</td>
          <td><input type="text" name="mobile" id="textfield12" required="required" /></td>
          <td>Landline Number:</td>
          <td><input type="text" name="olandline" id="textfield21" /></td>
        </tr>
        <tr>
          <td>Contact Person:</td>
          <td><input type="text" name="contactperson" id="textfield20" /></td>
          <td>Email:</td>
          <td><input type="email" name="email" id="email2" /></td>
        </tr>
		  </table></td>
        </tr>
        
        <tr>
          <td colspan="4" bgcolor="#14C4B6"><h4>Taxation Details</h4></td>
        </tr>
        <tr>
          <td>Income Tax Number:</td>
          <td width="255"><input type="text" name="incometaxno" id="textfield14" /></td>
          <td width="129"><label for="textfield4">Service Tax Number:</label></td>
          <td width="207"><input type="text" name="servicetaxno" id="textfield16" /></td>
        </tr>
        <tr>
          <td>Tin Number:</td>
          <td><input type="text" name="tinno" id="textfield19" /></td>
          <td>Central Exice Number</td>
          <td><input type="text" name="centralenumber"  />&nbsp;</td>
        </tr>
        <tr>
          <td>CST Number</td>
          <td><input type="text" name="cstnumber" />&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td  colspan="4" bgcolor="#14C4B6"><h4>Account Details</h4></td>
        </tr>
        <tr>
          <td>Bank Account Name:</td>
          <td><input type="text" name="bankaccname" id="textfield" /></td>
          <td>Type of Account</td>
          <td><input type="text" name="acctype" id="textfield8" />&nbsp;</td>
        </tr>
        <tr>
          <td>Account Number:</td>
          <td><input type="text" name="accountno" id="textfield2" /></td>
          <td>IFSC Code</td>
          <td><input type="text" name="ifsccode" id="textfield7" />&nbsp;</td>
        </tr>
        <tr>
                    <td>Date:</td>
                    <td><input id="saudadate"  onchange = "isDate(this.value)"   name = "saudadate"   type = "text"  size="17" required="required" />
          <a href="javascript:NewCal('saudadate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
                    <td>Opening Balance</td>
                    <td><label for="textfield3"></label>
                      <input type="text" name="obalance" id="textfield3" />
                      <label for="fileField"></label></td>
                  </tr>
                  <tr>
                    <td>Type Of Balance</td>
                    <td>
                      <select name="tbalance" id="select" style="width:150px">
                       <option></option>
                      <option>Dr</option>
                       <option>Cr</option>
                      </select></td>
                    <td>&nbsp;</td>
                    <td></td>
                  </tr>
        <tr>
          <td height="77">&nbsp;</td>
          <td>&nbsp;</td>
          <td><?php  if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" ) { ?>
            <input type="submit" name="s" id="submit2" value="Submit" />
            <?php  } ?></td>

		  
		  
	      <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
  </form>
</div>
<?php include('../include/footer.php');?>
</body>
</html>

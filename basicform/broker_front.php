<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }

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

<?php 
include('../include/menu1.php'); 
?>
<div id="gutter"></div>
<div id="col1">
  <h2>Menu</h2>
  <?php include('../include/sidemenu.php');?>
  <p>&nbsp;</p>
</div>
<div id="col9">
  <h2 align="center"><span style="color:#F17327;">Add broker Details</span></h2>
  <form action="broker_back.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <div align="left">
      <table width="921" border="0">
        <tbody>
          <tr>
            <td width="907" height="583"><div align="left">
              <table width="680" height="265" border="1" align="center" cellpadding="2" frame="box" rules="none">
                <tbody>
                  <tr>
                    <td colspan="4" bgcolor="#14C4B6"><h4>Broker Basic Details</h4></td>
                    </tr>
                  <tr>
                    <td width="171">Broker Name:</td>
                    <td colspan="3"><input type="text" name="brokername"   size = "55" id="textfield11" required="required" /></td>
                    </tr>
                  <tr>
                    <td colspan="4"><table width="680" border="1">
					
					<tr bgcolor="#14C4B6">
                    <td colspan="2"><h4>Factory Address</h4></td>
                    
                    <td colspan="2"><h4>Office Address</h4></td>
                  </tr>
                  <tr>
                    <td>Factory Address:</td>
                    <td width="156"><textarea name="factoryadd" id="textarea2" cols="20" rows="2"></textarea></td>
                    <td width="134">Office Address:</td>
                    <td width="226"><textarea name="officeadd" id="textarea" cols="20" rows="2"></textarea></td>
                    </tr>
                  <tr>
                    <td>City Name:</td>
                    <td><input type="text" name="cityname" id="textfield15" /></td>
                    <td>City:</td>
                    <td><input type="text" name="ocity" id="textfield9" /></td>
                    </tr>
                  <tr>
                    <td>State:</td>
                    <td>     <select name="state" style="width:150px">
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
</select></td>
                    <td>State:</td>
                    <td><select name="ostate" style="width:150px">
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
</select>                    </td>
                    </tr>
                  <tr>
                    <td>Pin No:</td>
                    <td><input type="text" name="pin" id="textfield18" /></td>
                    <td>Pin:</td>
                    <td><input type="text" name="opin" id="textfield13" /></td>
                    </tr>
                  <tr>
                    <td>Mobile Number:</td>
                    <td><input type="text" name="mobile" id="textfield12" required="required" /></td>
                    <td>Landline:</td>
                    <td><input type="text" name="olandline" id="textfield21" /></td>
                    </tr>
                  <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" id="email2" /></td>
                    <td>Contact Person:</td>
                    <td><input type="text" name="contactperson" id="textfield20" /></td>
                    </tr>
					</table>&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td colspan="4"  bgcolor="#14C4B6"><h4>Taxation Details</h4></td>
                    </tr>
                  <tr>
                    <td>Income Tax Number:</td>
                    <td width="205"><input type="text" name="incometaxno"  /></td>
                    <td width="99"><label for="textfield5">Service Tax Number:</label></td>
                    <td width="181"><input type="text" name="servicetaxno"  /></td>
                    </tr>
                  <tr>
                    <td>Tin Number:</td>
                    <td><input type="text" name="tinno"/></td>
                    <td>Central Exise Number</td>
                    <td><input type="text" name="centralenumber"  /></td>
                    </tr>
                  <tr>
                    <td>CST Number</td>
                    <td><input type="text" name="cstnumber" /></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                  <tr>
                    <td colspan="4"  bgcolor="#14C4B6"><h4>Account Deatils</h4></td>
                    </tr>
                  <tr>
                    <td><label for="textfield7">Account Number:</label></td>
                    <td><input type="text" name="accountno" id="textfield2" /></td>
                    <td>Type Of Account</td>
                    <td><input type="text" name="acctype" id="textfield8" /></td>
                    </tr>
                  <tr>
                    <td height="26">Bank Account Name:</td>
                    <td><input type="text" name="bankaccname" id="textfield" /></td>
                    <td>IFSC Code</td>
                    <td><input type="text" name="ifsccode" id="textfield7" /></td>
                    </tr>
                  <tr>
                    <td height="26"> Brokerage Rate:</td>
                    <td><input type="text" name="brokeragerate" id="textfield3" /></td>
                    <td><label for="textfield4">Quantity:</label></td>
                    <td><input type="text" name="brokerageqty" id="textfield4" /></td>
                  </tr>
                  <tr>
                    <td>Date:</td>
                    <td><input id="saudadate"  onchange = "isDate(this.value)"  name = "saudadate"   type = "text"  size="17" required="required" />
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
                    <td><div align="right">
                      <?php  if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" ) { ?>
                      <input type="submit" name="s"  value="Submit Record" />
                      <?php  } ?>
                    </div></td>
                    <td></td>
                  </tr>
                  
                  <tr>
                    <td height="26">&nbsp;</td>
                    <td></td>
					

 
					
					
					
					
                    <td>&nbsp;</td>
                    <td></td>
                    </tr>
                  </tbody>
              </table>
            </div></td>
            <td width="10"><p>
              <label for="textfield12"><br />
                </label>
            </p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>
                <label for="textfield14"><br />
                </label>
              </p>
              <p>&nbsp;</p>
              <p>
                <label for="email2"><br />
              </label>
              </p>
              <p>
                <label for="textfield19"><br />
                </label>
              </p>
              <p>&nbsp;</p>
              
              <p>&nbsp;</p>
              <p align="left">&nbsp;</p>
              <p>&nbsp;</p></td>
          </tr>
        </tbody>
      </table>
    </div>
  </form>
</div>
<?php include('../include/footer.php');?>
</body>
</html>

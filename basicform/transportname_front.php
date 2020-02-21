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
  <h2 align="center"><span style="color:#F17327;">add transporter details</span></h2>
  <form id="form1" name="form1" method="post" action="transportname_back.php"><div align="left">
    <table border="1" align="center" cellpadding="0" frame="box" rules="none">
        <tbody>
          <tr>
            <td colspan="4" bgcolor="#14C4B6"><h4>Basic Details</h4></td>
          </tr>
          <tr>
            <td width="121">Transport Name: </td>
            <td width="210"><p>
              <input type="text" name="transportname"  size = "35"  id="textfield11" required="required"/>
            </p></td>
            <td width="163">&nbsp;</td>
            <td width="184"><p>&nbsp;</p></td>
          </tr>
          <tr>
            <td colspan="4"><table width="687" border="1">
			<tr bgcolor="#14C4B6">
            <td colspan="2"><h4 align="center">Factory Details </h4></td>
          
            <td colspan="2"><div align="center">
              <h4>Office Details </h4>
            </div></td>
          </tr>
          <tr>
            <td>Factory Address:</td>
            <td>
              <textarea name="factoryadd" id="textarea" cols="20" rows="2"></textarea>
          </td>
            <td>Office Address: <br /></td>
            <td>
              <textarea name="officeadd" id="officeadd" cols="20" rows="2"></textarea>
            </td>
          </tr>
          <tr>
            <td>City Name:</td>
            <td>
              <input type="text" name="cityname" id="textfield15" />
            </td>
            <td>City:</td>
            <td>
              <input type="text" name="ocity" id="textfield9" />
           </td>
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
           </td>
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
</select>
            </td>
          </tr>
          <tr>
            <td>Pin No:</td>
            <td>
              <input type="text" name="pin" id="textfield18" />
            </td>
            <td>Pin: </td>
            <td>
              <input type="text" name="opin" id="textfield13" />
            </td>
          </tr>
          <tr>
            <td>Contact Person:</td>
            <td>
              <input type="text" name="contactperson" id="textfield20" />
            </td>
            <td>Landline: </td>
            <td>
              <input type="text" name="olandline" id="textfield21" />
            </td>
          </tr>
          <tr>
            <td height="26">Email:</td>
            <td>
              <input type="email" name="email" id="email2" />
           </td>
            <td>Mobile Number: </td>
            <td><input type="text" name="mobile" id="textfield12" required="required"/></td>
          </tr>
			</table>&nbsp;</td>
          </tr>
          
          <tr>
            <td colspan="4" bgcolor="#14C4B6"><h4>Taxation Details</h4></td>
          </tr>
          <tr>
            <td>Income Tax Number: </td>
            <td>
              <input type="text" name="incometaxno" id="textfield14" />
           </td>
            <td>Central Exise Number: </td>
            <td>
             
                <input type="text" name="centralenumber"  />
            </td>
          </tr>
          <tr>
            <td>Service Tax Number: </td>
            <td>
              <input type="text" name="servicetaxno" id="textfield2" />
            </td>
            <td>CST Number: </td>
            <td>
              <input type="text" name="cstnumber" />
            </td>
          </tr>
          <tr>
            <td>Tin Number:</td>
            <td>
              <input type="text" name="tinno" id="textfield19" />
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            
			
			 <td>  <?php  if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" ) { ?>
<input type="submit" name="s" id="submit2" value="Submit" />
<?php  } ?> </td>
          </tr>
        </tbody>
      </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  </form>
</div>
<?php include('../include/footer.php');?>
</body>
</html>

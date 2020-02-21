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
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center">
<p>&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">Add Village Name</span></h2>
  <form id="form1" name="form1" method="post" action="villagename_back.php">
    <div align="center">
      <table width="385" border="1" rules="none" frame="box">
        <tbody>
          <tr>
            <td height="38"><label for="textfield">Village Name:</label></td>
            <td><input type="text" name="villagename" id="textfield" /></td>
          </tr>
          <tr>
            <td height="37"><label for="textfield3">City Name:</label></td>
            <td><input type="text" name="city" id="textfield2" /></td>
          </tr>
          <tr>
            <td><label for="textfield3">Tahseel Name:</label></td>
            <td><input type="text" name="tahseel" id="textfield3" /></td>
          </tr>
          <tr>
            <td><label for="textfield4">State Name:</label></td>
            <td><p>
              
            </p>
              <p><select name="state" style="width:170px">
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
</select>&nbsp; </p></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div align="right">
              <input type="submit" name="s" id="submit" value="Submit" />
            </div></td>
          </tr>
        </tbody>
      </table>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </form>
  <p align="center">&nbsp;</p>
  <blockquote>&nbsp;</blockquote>
</div>
</body>
</html>

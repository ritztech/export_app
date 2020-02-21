<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include('include/header.php'); ?>
<?php include('include/menu.php');?>
<div id="gutter"></div>
<div id="col1">
  <h2>Menu</h2>
  <?php include('include/sidemenu.php');?>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<div id="col4">
  <h2><span style="color:#F17327;">'Add broker information'</span></h2>
  <form id="form1" name="form1" method="post" action="broker_back.php">
    <table width="805" height="268" border="0">
      <tbody>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="select">Party Name:</label></td>
          <td><select name="select" id="select">
          </select></td>
          <td><label for="select2">Type:</label></td>
          <td><select name="select2" id="select2">
          </select></td>
        </tr>
        <tr>
          <td><label for="textfield">Fund Payment:</label></td>
          <td><input type="text" name="textfield" id="textfield" /></td>
          <td><label for="textfield2">Bank Charges</label>
          <label for="textfield2">:</label></td>
          <td><input type="text" name="textfield2" id="textfield2" /></td>
        </tr>
        <tr>
          <td><label for="textfield3">Check Amount:</label></td>
          <td><input type="text" name="textfield3" id="textfield3" /></td>
          <td><label for="textfield4">Check Number/RTGS UTR No:</label></td>
          <td><input type="text" name="textfield4" id="textfield4" /></td>
        </tr>
        <tr>
          <td><label for="textfield5">Bank Name:</label></td>
          <td><input type="text" name="textfield5" id="textfield5" /></td>
          <td><label for="textfield6">Branch Name:</label></td>
          <td><input type="text" name="textfield6" id="textfield6" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="submit" id="submit" value="Submit" /></td>
        </tr>
      </tbody>
    </table>
    <p align="left">&nbsp;</p>
  </form>&nbsp;
</div>
<?php include('include/footer.php');?>
</body>
</html>

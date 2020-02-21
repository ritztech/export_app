<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="datetimepicker_css.js"></script>
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
    <p align="left">&nbsp;</p>
    <table width="642" border="0">
      <tbody>
        <tr>
          <td width="268"><label for="textfield">Date:</label></td>
          <td width="364"><p>&nbsp;
            </p>
            <p>
              <input type="Text" id="demo1" maxlength="25" size="17" name="midate"/>
          <img src="images2/cal.gif" onclick="javascript:NewCssCal('demo1')" style="cursor:pointer"/></p>            &nbsp;</td>
        </tr>
        <tr>
          <td height="41">Expenses Ledger Name:</td>
          <td><select name="select" id="select">
          </select></td>
        </tr>
        <tr>
          <td height="65">Value Of Expenses:</td>
          <td><input type="text" name="textfield" id="textfield" /></td>
        </tr>
        <tr>
          <td>Narration:</td>
          <td><textarea name="textarea" id="textarea" cols="45" rows="5"></textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="center">
            <input type="submit" name="submit" id="submit" value="Submit" />
          </div></td>
        </tr>
      </tbody>
    </table>
  </form>&nbsp;
</div>
<?php include('include/footer.php');?>
</body>
</html>

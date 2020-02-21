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
  <p>&nbsp;</p>
</div>
<div id="col4">
  <h2><span style="color:#F17327;">'Add broker information'</span></h2>
  <form id="form1" name="form1" method="post" action="broker_back.php">
    <p align="left">&nbsp;</p><table width="877" height="418" border="0">
      <tbody>
        <tr>
          <td><label for="select">Party Name:</label></td>
          <td><select name="select" id="select">
          </select></td>
          <td><label for="textfield">Bill No.:</label></td>
          <td><input type="text" name="textfield" id="textfield" /></td>
        </tr>
        <tr>
          <td><label for="textfield2">Bill Value:</label></td>
          <td><input type="text" name="textfield2" id="textfield2" /></td>
          <td><label for="textfield3">Claim[Standard]:</label></td>
          <td><input type="text" name="textfield3" id="textfield3" /></td>
        </tr>
        <tr>
          <td><label for="textfield4">Quality:</label></td>
          <td><input type="text" name="textfield4" id="textfield4" /></td>
          <td><label for="textfield5">Shortage:</label></td>
          <td><input type="text" name="textfield5" id="textfield5" /></td>
        </tr>
        <tr>
          <td><label for="textfield6">Moisture:</label></td>
          <td><input type="text" name="textfield6" id="textfield6" /></td>
          <td><label for="textfield7">Sand:</label></td>
          <td><input type="text" name="textfield7" id="textfield7" /></td>
        </tr>
        <tr>
          <td><label for="textfield8">Oils:</label></td>
          <td><input type="text" name="textfield8" id="textfield8" /></td>
          <td><label for="textfield9">Kirda:</label></td>
          <td><input type="text" name="textfield9" id="textfield9" /></td>
        </tr>
        <tr>
          <td><label for="textfield10">Labour:</label></td>
          <td><input type="text" name="textfield10" id="textfield10" /></td>
          <td><label for="textfield11">Cash Discount:</label></td>
          <td><input type="text" name="textfield11" id="textfield11" /></td>
        </tr>
        <tr>
          <td><label for="textfield12">Brokerage:</label></td>
          <td><input type="text" name="textfield12" id="textfield12" /></td>
          <td><label for="textfield13">Postage:</label></td>
          <td><input type="text" name="textfield13" id="textfield13" /></td>
        </tr>
        <tr>
          <td><label for="textfield14">Bardana Claims:</label></td>
          <td><input type="text" name="textfield14" id="textfield14" /></td>
          <td><label for="textfield15">Bank Charges:</label></td>
          <td><input type="text" name="textfield15" id="textfield15" /></td>
        </tr>
        <tr>
          <td><label for="textfield16">Others:</label></td>
          <td><input type="text" name="textfield16" id="textfield16" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="submit" id="submit" value="Submit" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
  </form>&nbsp;
</div>
<?php include('include/footer.php');?>
</body>
</html>

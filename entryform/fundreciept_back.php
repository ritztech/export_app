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
</div>
<div id="col4">
  <h2><span style="color:#F17327;">'Add broker information'</span></h2>
  <form id="form1" name="form1" method="post" action="broker_back.php">
    <p align="left">&nbsp;</p>
    <div align="left">
      <table width="921" border="0">
        <tbody>
          <tr>
            <td width="248"><p>
              <label for="textfield11">Broker Name:<br />
                </label>
              <input type="text" name="brokername" id="textfield11" />
              </p>
              <p>
                <label for="textfield13">Factory Address:<br />
                </label>
                <input type="text" name="factoryadd" id="textfield13" />
              </p>
              <p>
                <label for="textfield15">City Name:</label>
              </p>
              <p>
                <input type="text" name="cityname" id="textfield15" />
              </p>
              <p>
                <label for="textfield17">State:<br />
                </label>
                <input type="text" name="state" id="textfield17" />
              </p>
              <p>
                <label for="textfield18">Pin No:</label>
              </p>
              <p>
                <input type="text" name="pin" id="textfield18" />
              </p>
              <p>
                <label for="textfield20">Contact Person:<br />
                </label>
                <input type="text" name="contactperson" id="textfield20" />
              </p>
              <p>&nbsp; </p></td>
            <td width="352"><p>
              <label for="textfield12">Mobile Number:<br />
                </label>
              <input type="text" name="mobile" id="textfield12" />
              </p>
              <p>Email:</p>
              <p>
                <input type="email" name="email" id="email2" />
              </p>
              <p>
                <label for="textfield14">Income Tax Number:<br />
                </label>
                <input type="text" name="incometaxno" id="textfield14" />
              </p>
              <p>
                <label for="textfield16">Service Tax Number:</label>
              </p>
              <p>
                <input type="text" name="servicetaxno" id="textfield16" />
                <label for="email2"><br />
                </label>
              </p>
              <p>
                <label for="textfield19">Tin Number:<br />
                </label>
                <input type="text" name="tinno" id="textfield19" />
              </p>
              <p>
                <label for="textfield">Bank Account Name:</label>
              </p>
              <p>
                <input type="text" name="bankaccname" id="textfield" />
              </p>
              <p>
                <label for="textfield2">Account Number:</label>
              </p>
              <p>
                <input type="text" name="accountno" id="textfield2" />
              </p>
              <p>
                <label for="textfield3">Type Of Brokerage Rate:</label>
              </p>
              <p>
                <input type="text" name="brokeragerate" id="textfield3" />
              </p>
              <p align="left">
                <input type="submit" name="s" id="submit2" value="Submit" />
              </p>
              <p>&nbsp;</p></td>
          </tr>
        </tbody>
      </table>
    </div>
    <p align="left">&nbsp;</p>
  </form>&nbsp;
</div>
<?php include('include/footer.php');?>
</body>
</html>

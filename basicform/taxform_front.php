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
 <p align="center">&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">sales/mandi/entry tax form</span></h2>
 
  <form id="form1" name="form1" method="post" action="taxform_back.php">
  
   
    <div align="center">
	  
      <table width="431" border="1" rules="none" frame="box">
        <tbody>
          <tr>
            <td height="34"><label for="textfield">Sales Tax Form:</label></td>
            <td><input type="text" name="salestaxform" id="textfield" /></td> 
			<td> <a href="taxform_view.php"><h5>View all</h5></a> </td>
          </tr>
          <tr>
            <td height="33"><label for="textfield4">Entry Tax Form:</label></td>
            <td colspan="2"><input type="text" name="entrytaxform" id="textfield2" /></td>
          </tr>
          <tr>
            <td height="39"><label for="textfield5">Mandi Tax Form:</label></td>
            <td colspan="2"><input type="text" name="manditaxform" id="textfield3" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="2"><div align="center">
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
  </form>
  <p align="center">&nbsp;</p>
  <blockquote>&nbsp;</blockquote>
</div>
</body>
</html>

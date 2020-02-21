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
  <h2>&nbsp;</h2>

    <h2 align="center"><span style="color:#F17327;">Add Bank Name</span></h2>
   
    <form id="form1" name="form1" method="post" action="bankmaster_back.php">
      <table width="449" height="109" border="0" align="center" frame="box" rules="none">
        <tr>
          <td height="50">Bank Name : </td>
          <td ><input type="text" name="bankname" size="39" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="s" id="submit" value="Submit" /></td>
        </tr>
      </table>
      <p align="center">&nbsp;</p>
      <p align="center">
        <label for="textfield">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
          <br />
        </label>
      </p>
      <p align="center">&nbsp;</p>
    </form>
    <p align="center">&nbsp;</p>
    <p align="center">&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </blockquote>
</div>
</body>
</html>

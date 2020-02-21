<?php

include("../conf.php");

?>
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
<link href="..//style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>

</head>
<body>
<?php include('../include/header.php');?>
<?php include('../include/sidemenu.php');?>

<div align="center">
  <h2 align="center"><span style="color:#F17327;">Query Master</span>    </h2>
  <form id="form1" name="form1" method="post" action="a16querymaster_back.php">
  <table width="auto" border="1" cellpadding="4" frame="box" rules="none">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Query </h4></td>
        </tr>
        <tr>
          <td width="114">Admin:</td>
          <td width="417"><input type="text" name="adminterate" size="40"/></td>
          <td width="1">&nbsp;</td>
          <td width="8">&nbsp;</td>
        </tr>
        <tr>
          <td>Subject:</td>
          <td><input type="text" name="subject" size="40"/></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="textfield">Priority:</label></td>
          <td><input type="text" name="priroty" size="40"/></td>
          <td>&nbsp;</td>
          <td>&nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td><label for="textfield5">Type Of Query:</label></td>
          <td><input type="text" name="querytype" size="40"/></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        
        <tr>
          <td height="38">Query</td>
          <td><textarea name="query" rows="4" cols="31"></textarea></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>      
        <tr>
          <td>&nbsp;</td>
          <td><div align="center">
            <input type="submit" name="s" id="submit" value="Send Query" />
          </div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      
    </table>
  <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
</form>&nbsp;
</div>

</body>
</html>

<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }

$fid=$_SESSION['fid'];
?>
<?php include('../conf.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script type="text/javascript">

function hledger1(t_actual) {
 var idx = t_actual.selectedIndex;
 var content = t_actual.options[idx].innerHTML;
  
  document.form1.bankid.value = content;
  
		
}

</script>



</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/menu1.php');?>
<div id="gutter"></div>
<div id="col1">
  <h2>Menu</h2>
  <?php include('../include/sidemenu.php');?>
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
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<div id="col4">
  <h2 align="center"><span style="color: #F17327">ACCOUNTIN LEDGER CREATION</span></h2>
  <p align="center">&nbsp;</p>
  <p align="center">&nbsp;</p>
  <form id="form1" name="form1" method="post" action="expenses_back.php">
    <p>&nbsp;</p>
    <div align="center">
      <table width="557" border="1" frame="box" rules="none" cellpadding="4">
        <tbody>
          <tr>
            <td width="137">Name Of Ledger:</td>
            <td width="144"><input type="text" name="expenseshead" id="textfield" /></td>
          </tr>
          <tr>
            <td>Accounting Group:</td>
            <td>
              <select name="acgroup" onchange = "hledger1(this)" style="width:150px">
                       <option>Select Accounting Group</option>
                       <?php               
				$query = mysql_query("SELECT * FROM bank_master");
				while($row = mysql_fetch_array($query)){
					
					$bankname = $row['bankname'];
		            $bankid = $row['bankid'];
			
	           echo"<option  value = $bankid>$bankname</option>"; 
                       } ?>
                     
          </select>   <input type="hidden" name="bankid" id="bankid"  />   </td>
          </tr>
          <tr>
            <td>Date:</td>
            <td><input id="saudadate"  onchange = "isDate(this.value)"   name = "saudadate"   type = "text"  size="17" required="required" />
          <a href="javascript:NewCal('saudadate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>&nbsp;</td>
          </tr>
          <tr>
            <td>Opening Balance:</td>
            <td><label for="textfield2"></label>
            <input type="text" name="obalance" id="textfield2" /></td>
          </tr>
          <tr>
            <td>Type Of Balance(Dr/Cr)</td>
            <td>
              <select name="tbalance" id="select" style="width:150px">
              <option>Select Balance Type</option>
              <option>Dr</option>
              <option>Cr</option>
              
            </select></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><p><input type="submit" name="s" id="submit" value="Submit" /></p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </form>
  <p align="center">&nbsp;</p>
  <blockquote>&nbsp;</blockquote>
</div>
<?php include('../include/footer.php');?>
</body>
</html>

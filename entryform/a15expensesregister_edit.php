<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

$fid=$_SESSION['fid'];
?>
<?php

include("../conf.php");

?>
<?php 

if(isset($_POST['s'])) {
            $date =$_POST['date'];
            $ledgername =$_POST['ledgername'];
            $value =$_POST['value'];
			$ledgername1 =$_POST['ledgername1'];
            $value1 =$_POST['value1'];
            $entrydate =$_POST['entrydate'];
			$narration=$_POST['narration'];
            $regid = $_POST['regid'];
	$query = "UPDATE mandi15 SET
	        date =STR_TO_DATE('$date','%d/%m/%Y'),
            ledgername='$ledgername',
            value ='$value',
			 ledgername1='$ledgername1',
            value1 ='$value1',
            narration ='$narration'
            WHERE regid='$regid'";
	        mysql_query($query);
	 //echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
   echo "<script>alert('Data updated successfully.');location.href='a15expensesregister_view.php'</script>"; 

        

}
?>
<?php

try {
$query = "SELECT `regid`, `fid`,DATE_FORMAT(date,'%d/%m/%Y') as date, `ledgername`, `value`, `narration`,DATE_FORMAT(entrydate,'%d/%m/%Y') as entrydate, `ledgername1`, `value1` FROM `mandi15` WHERE  regid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['regid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
            $date =$row['date'];
            $ledgername =$row['ledgername'];
            $value =$row['value'];
			 $ledgername1 =$row['ledgername1'];
            $value1 =$row['value1'];
            $entrydate =$row['entrydate'];
			$narration=$row['narration'];
            $regid = $row['regid'];
} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
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
<div align="center"><br>
  <h2 align="center"><span style="color:#F17327;">expenses register edit form</span>    </h2>
  <form id="form1" name="form1" method="post" action="">
  <table width="550" height="298"  border="1" cellpadding="6" frame="box" rules="none">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Voucher Details </h4></td>
        </tr>
        <tr>
          <td width="222">Transaction Date:</td>
          <td colspan="2"><input type="text" name="date" id="a2" size="17" value="<?php echo $date ?>" />&nbsp;&nbsp;<a href="javascript:NewCal('a2','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
          
          <td width="1">&nbsp;</td>
        </tr>
        <tr>
          <td>Debit Ledger Name:</td>
          <td width="253"><input type="text" name="ledgername" value="<?php echo $ledgername ?>" size="40"/></td>
          <td width="6">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Debit Ledger Value:</td>
          <td><input type="text" name="value" value="<?php echo $value ?>"/>
          <input type="hidden" name="regid" value="<?php echo $regid ?>"/></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
		<tr>
          <td>Credit Ledger Name:</td>
          <td><input type="text" name="ledgername1" value="<?php echo $ledgername1 ?>" size="40"/></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
		<tr>
          <td>Credit Ledger Value :</td>
          <td><input type="text" name="value1" value="<?php echo $value1 ?>"/></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Entry Date:</td>
          <td><input type="text" name="entrydate" readonly="readonly" value="<?php echo $entrydate ?>"/></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="textfield">Narration:</label></td>
          <td><textarea name="narration" rows="4"><?php echo $narration ?></textarea></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>      
        <tr>
          <td>&nbsp;</td>
          <td><div align="right">
            <input type="submit" name="s" id="submit" value="Edit Value" />
          </div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      
    </table>
 
  </form>&nbsp;
</div>
</body>
</html>

<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }

$fid=$_SESSION['fid'];
?>
<?php include('../conf.php');?>
<?php 

if(isset($_POST['s'])) {
$expenseshead = $_POST['expenseshead'];
$obalance = $_POST['obalance'];
$tbalance = $_POST['tbalance'];
$acgroup = $_POST['acgroup'];
$saudadate = $_POST['saudadate'];
$exid = $_POST['exid'];
$bankid = $_POST['bankid'];




	$query = "UPDATE expensesregister SET
	expenseshead='$expenseshead',
	obalance ='$obalance',
    tbalance ='$tbalance',
	 acgroup ='$acgroup',
    saudadate =STR_TO_DATE('$saudadate','%d/%m/%Y'),
	acgrpid = '$bankid'
    WHERE exid='$exid'";
	mysql_query($query);
	//echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }

   echo "<script>alert('Data updated successfully.');location.href='expenses_view.php'</script>";     

}
?>
<?php
try {
$query = "SELECT `exid`, `expenseshead`, `fid`, `acgroup`, `obalance`, `tbalance`,DATE_FORMAT(saudadate,'%d/%m/%Y') as saudadate FROM `expensesregister` WHERE exid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['exid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$expenseshead = $row['expenseshead'];
$obalance =$row['obalance'];
$tbalance =$row['tbalance'];
$saudadate =$row['saudadate'];
$acgroup =$row['acgroup'];
$exid = $row['exid'];
} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script type="text/javascript">


function phappycode1(){
document.form1.acgroup.value = document.form1.abc.value;
}
function phappycode2(){
document.form1.tbalance.value = document.form1.ab.value;
}


function hledger1(t_actual,t_ac_value) {
 var idx = t_actual.selectedIndex;
 var content = t_actual.options[idx].innerHTML;
  
  document.form1.acgroup.value = content;
  document.form1.bankid.value = t_ac_value
  
		
}


</script>
</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center"><p align="center">&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">expenses register ledger</span></h2>
  
  <form id="form1" name="form1" method="post" action="">
    <table width="586" border="1" align="center" cellpadding="4" frame="box" rules="none">
        <tbody>
          <tr>
            <td width="219">Name Of Ledger:</td>
            <td width="293"><input type="text" name="expenseshead" id="textfield" value="<?php echo $expenseshead; ?>" />
            <input type="hidden" name="exid" id="textfield3" value="<?php echo $exid; ?>" /></td>
          </tr>
          <tr>
            <td>Accounting Group:</td>
            <td>
              <p>
                <label for="textfield4"></label>
              <input type="text" name="acgroup" id="textfield4" value="<?php echo $acgroup; ?>" />
              <select name="abc"  style="width:150px" onchange="hledger1(this,this.value)">
                <option>Select Bank Name</option>
                <?php               
				$query = mysql_query("SELECT * FROM bank_master");
				while($row = mysql_fetch_array($query)){
					
					$bankname = $row['bankname'];
					     $bankid = $row['bankid'];
			
 	           echo"<option  value = $bankid>$bankname</option>"; 
                } ?>
              </select>  <input type="hidden" name="bankid" id="bankid"  /> 
            </p></td>
          </tr>
          <tr>
            <td>Date:</td>
            <td><input id="saudadate"   name = "saudadate"   type = "text"  size="17" value="<?php echo $saudadate; ?>" />
          <a href="javascript:NewCal('saudadate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>&nbsp;</td>
          </tr>
          <tr>
            <td>Opening Balance:</td>
            <td><label for="textfield2"></label>
            <input type="text" name="obalance" id="textfield2" value="<?php echo $obalance; ?>" /></td>
          </tr>
          <tr>
            <td>Type Of Balance(Dr/Cr)</td>
            <td>
              <p>
                <label for="textfield5"></label>
              <input type="text" name="tbalance" id="textfield5" value="<?php echo $tbalance; ?>" />
              <select name="ab" id="select" style="width:150px" onchange="phappycode2()">
                <option>Select Balance Type</option>
                <option>Dr</option>
                <option>Cr</option>
              </select>
            </p></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              
                <input type="submit" name="s" id="submit" value="Submit" />
         </td>
          </tr>
        </tbody>
      </table>&nbsp;</p>
    <p align="center">&nbsp;</p>
    <p align="center">
    
    </p>
  </form>
  <p align="center">&nbsp;</p>
  <blockquote>&nbsp;</blockquote>
</div>
</body>
</html>

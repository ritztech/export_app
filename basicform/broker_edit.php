<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }

$fid=$_SESSION['fid'];
?>
<?php include('../conf.php');?>
<?php 

if(isset($_POST['s'])) {
$brokername = $_POST['brokername'];
$factoryadd = $_POST['factoryadd'];
$cityname = $_POST['cityname'];
$state = $_POST['state'];
$pin = $_POST['pin'];
$contactperson = $_POST['contactperson'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$incometaxno = $_POST['incometaxno'];
$servicetaxno = $_POST['servicetaxno'];
$tinno = $_POST['tinno'];
$bankaccname = $_POST['bankaccname'];
$accountno = $_POST['accountno'];
$brokeragerate = $_POST['brokeragerate'];
$officeadd =$_POST['officeadd'];
$ocity =$_POST['ocity'];
$ostate =$_POST['ostate'];
$opin = $_POST['opin'];
$olandline=$_POST['olandline'];
$centralenumber =$_POST['centralenumber'];
$cstnumber =$_POST['cstnumber'];
$acctype =$_POST['acctype'];
$ifsccode =$_POST['ifsccode'];
$brokerageqty =$_POST['brokerageqty'];
$obalance =$_POST['obalance'];
$tbalance =$_POST['tbalance'];
$saudadate =$_POST['saudadate'];
$brid = $_POST['brid'];
	$query = "UPDATE broker SET
	brokername='$brokername',
	factoryadd='$factoryadd',
	cityname='$cityname',
	state='$state',
	pin='$pin',
	contactperson='$contactperson',
	mobile='$mobile',
	email='$email',
	incometaxno='$incometaxno',
	servicetaxno='$servicetaxno',
	tinno='$tinno',
	bankaccname='$bankaccname',
	accountno='$accountno',
	brokeragerate='$brokeragerate',
	officeadd ='$officeadd',
    ocity ='$ocity',
    ostate ='$ostate',
    opin = '$opin',
    olandline='$olandline',
    centralenumber ='$centralenumber',
    cstnumber ='$cstnumber',
    acctype ='$acctype',
    ifsccode ='$ifsccode',
    brokerageqty ='$brokerageqty',
	obalance ='$obalance',
    tbalance ='$tbalance',
    saudadate =STR_TO_DATE('saudadate','%d/%m/%Y')
    WHERE brid='$brid'";
	mysql_query($query);
	//echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
   echo "<script>alert('Data updated successfully.');location.href='broker_view.php'</script>"; 

        

}
?>

<?php

try {
$query = "SELECT `brid`, `brokername`, `factoryadd`, `cityname`, `state`, `pin`, `contactperson`, `mobile`, `email`, `incometaxno`, `servicetaxno`, `tinno`, `bankaccname`, `accountno`, `brokeragerate`, `officeadd`, `ocity`, `ostate`, `opin`, `olandline`, `centralenumber`, `cstnumber`, `acctype`, `ifsccode`, `brokerageqty`, `fid`, `obalance`, `tbalance`,DATE_FORMAT(saudadate,'%d/%m/%Y') as saudadate  FROM `broker` WHERE brid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['brid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$brokername = $row['brokername'];
$factoryadd =$row['factoryadd'];
$cityname = $row['cityname'];
$state = $row['state'];
$pin =$row['pin'];
$contactperson = $row['contactperson'];
$mobile = $row['mobile'];
$email = $row['email'];
$incometaxno = $row['incometaxno'];
$servicetaxno = $row['servicetaxno'];
$tinno = $row['tinno'];
$bankaccname =$row['bankaccname'];
$accountno = $row['accountno'];
$brokeragerate = $row['brokeragerate'];
$officeadd =$row['officeadd'];
$ocity =$row['ocity'];
$ostate =$row['ostate'];
 $opin = $row['opin'];
$olandline=$row['olandline'];
 $centralenumber =$row['centralenumber'];
$cstnumber =$row['cstnumber'];
$acctype =$row['acctype'];
$ifsccode =$row['ifsccode'];
$brokerageqty =$row['brokerageqty'];
$obalance =$row['obalance'];
$tbalance =$row['tbalance'];
$saudadate =$row['saudadate'];
$brid = $row['brid'];
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
document.form1.tbalance.value = document.form1.abc.value;
}
</script>
</head>
<body>

<?php include('../include/sidemenu.php');?>

<div align="center"> <p align="left">&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">edit broker Details</span></h2>
  <form id="form1" name="form1" method="post" action="">
   <table width="796" height="265" border="1" cellpadding="1" rules="none" frame="box">
                <tbody>
                  <tr>
                    <td colspan="4" bgcolor="#14C4B6"><h4>Broker Basic Details</h4></td>
                  </tr>
                  <tr>
                    <td width="163">Broker Name:</td>
                    <td width="185"><input type="text" name="brokername"   size = "35" id="textfield11" value="<?php echo $brokername ?>" /></td>
                    <td width="178">&nbsp;</td>
                    <td width="170"><p>&nbsp;</p></td>
                  </tr>
                  <tr>
                    <td colspan="4">
					<table width="100%" border="1">
					<tr bgcolor="#14C4B6">
                    <td colspan="2"><h4 align="center">Factory Details </h4></td>
                    
                    <td colspan="2"><h4 align="center">Office Details </h4></td>
                    
                  </tr>
                  <tr>
                    <td>Factory Address:</td>
                    <td><textarea name="factoryadd" id="textarea2" cols="20" rows="2"><?php echo $factoryadd ?></textarea></td>
                    <td><label for="textfield9">Office Address</label></td>
                    <td><textarea name="officeadd" id="textarea" cols="20" rows="2"><?php echo $officeadd ?></textarea></td>
                  </tr>
                  <tr>
                    <td>City Name:</td>
                    <td><input type="text" name="cityname" id="textfield15" value="<?php echo $cityname ?>" /></td>
                    <td>City:</td>
                    <td><input type="text" name="ocity" id="textfield9" value="<?php echo $ocity ?>" /></td>
                  </tr>
                  <tr>
                    <td>State:</td>
                    <td><input type="text" name="state" id="textfield17" value="<?php echo $state ?>" /></td>
                    <td>State:</td>
                    <td><input type="text" name="ostate" id="textfield10" value="<?php echo $ostate ?>" /></td>
                  </tr>
                  <tr>
                    <td>Pin No:</td>
                    <td><input type="text" name="pin" id="textfield18" value="<?php echo $pin ?>" /></td>
                    <td>Pin:</td>
                    <td><input type="text" name="opin" id="textfield13" value="<?php echo $opin ?>" /></td>
                  </tr>
                  <tr>
                    <td>Mobile Number:</td>
                    <td><input type="text" name="mobile" id="textfield12" value="<?php echo $mobile ?>" /></td>
                    <td>Landline:</td>
                    <td><input type="text" name="olandline" id="textfield21" value="<?php echo $olandline ?>" /></td>
                  </tr>
                  <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email" id="email2" value="<?php echo $email ?>" /></td>
                    <td>Contact Person:</td>
                    <td><input type="text" name="contactperson" id="textfield20" value="<?php echo $contactperson ?>" /></td>
                  </tr>
					</table>&nbsp;</td>
                  </tr>
                  
                  <tr>
                    <td colspan="4"  bgcolor="#14C4B6"><h4>Taxation Details</h4></td>
                  </tr>
                  <tr>
                    <td>Income Tax Number:</td>
                    <td><input type="text" name="incometaxno"  value="<?php echo $incometaxno ?>" /></td>
                    <td><label for="textfield5">Service Tax Number:</label></td>
                    <td><input type="text" name="servicetaxno" value="<?php echo $servicetaxno ?>"  /></td>
                  </tr>
                  <tr>
                    <td>Tin Number:</td>
                    <td><input type="text" name="tinno" value="<?php echo $tinno ?>"/></td>
                    <td>Central Exise Number</td>
                    <td><input type="text" name="centralenumber" value="<?php echo $centralenumber ?>"  /></td>
                  </tr>
                  <tr>
                    <td>CST Number</td>
                    <td><input type="text" name="cstnumber" value="<?php echo $cstnumber ?>" /></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="4"  bgcolor="#14C4B6"><h4>Account Deatils</h4></td>
                  </tr>
                  <tr>
                    <td><label for="textfield7">Account Number:</label></td>
                    <td><input type="text" name="accountno" id="textfield2" value="<?php echo $accountno ?>" /></td>
                    <td>Type Of Account</td>
                    <td><input type="text" name="acctype" id="textfield8" value="<?php echo $acctype ?>" /></td>
                  </tr>
                  <tr>
                    <td height="26">Bank Account Name:</td>
                    <td><input type="text" name="bankaccname" id="textfield"  value="<?php echo $bankaccname ?>"/></td>
                    <td>IFSC Code</td>
                    <td><input type="text" name="ifsccode" id="textfield7" value="<?php echo $ifsccode ?>" /></td>
                  </tr>
                  <tr>
                    <td height="26"> Brokerage Rate:</td>
                    <td><input type="text" name="brokeragerate" id="textfield3" value="<?php echo $brokeragerate ?>" /></td>
                    <td><label for="textfield4">Quantity:</label></td>
                    <td><input type="text" name="brokerageqty" id="textfield4" value="<?php echo $brokerageqty ?>" />
                    <input type="hidden" name="brid" id="textfield4" value="<?php echo $brid ?>" />                    </td>
                  </tr>
                  <tr>
                    <td>Date:</td>
                    <td><input id="saudadate"   name = "saudadate"   type = "text"  size="17" value="<?php echo $saudadate ?>" />
          <a href="javascript:NewCal('saudadate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
                    <td>Opening Balance</td>
                    <td><label for="textfield3"></label>
                      <input type="text" name="obalance" id="textfield3" value="<?php echo $obalance ?>" />
                      <label for="fileField"></label></td>
                  </tr>
                  <tr>
                    <td>Type Of Balance</td>
                    <td><label for="textfield2"></label>
                    <input type="text" name="tbalance" id="textfield2" value="<?php echo $tbalance ?>" /></td>
                    <td><select name="abc" id="select" style="width:150px" onchange="phappycode1()">
                      <option></option>
                      <option>Dr</option>
                      <option>Cr</option>
                    </select></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td height="26">&nbsp;</td>
                    <td><div align="right">
                      <?php  if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" ) { ?>
<input type="submit" name="s"  value="Submit Record" />
<?php  } ?>

                    </div></td>
					
					
					
					
					 
 
					
					
					
					
					
					
					
					
					
                    <td>&nbsp;</td>
                    <td></td>
                  </tr>
      </tbody>
              </table>
     </p>&nbsp;
  </form>
</div>
</body>
</html>

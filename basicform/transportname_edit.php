<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }

$fid=$_SESSION['fid'];
?>
<?php include('../conf.php');?>
<?php 

if(isset($_POST['s'])) {
$transportname = $_POST['transportname'];
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
$officeadd =$_POST['officeadd'];
$ocity =$_POST['ocity'];
$ostate =$_POST['ostate'];
$opin = $_POST['opin'];
$olandline=$_POST['olandline'];
$centralenumber =$_POST['centralenumber'];
$cstnumber =$_POST['cstnumber'];
$trid = $_POST['trid'];
	$query = "UPDATE transportname SET
	transportname='$transportname',
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
	officeadd ='$officeadd',
    ocity ='$ocity',
    ostate ='$ostate',
    opin = '$opin',
    olandline='$olandline',
    centralenumber ='$centralenumber',
    cstnumber ='$cstnumber'
    WHERE trid='$trid'";
	mysql_query($query);
	//echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
      echo "<script>alert('Data updated successfully.');location.href='transportname_view.php'</script>"; 

}
?>
<?php

try {
$query = "SELECT `trid`, `transportname`, `factoryadd`, `cityname`, `state`, `pin`, `contactperson`, `mobile`, `email`, `incometaxno`, `servicetaxno`, `tinno`, `officeadd`, `ocity`, `ostate`, `opin`, `olandline`, `centralenumber`, `cstnumber`, `fid` FROM `transportname` WHERE trid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['trid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$transportname = $row['transportname'];
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
$officeadd =$row['officeadd'];
$ocity =$row['ocity'];
$ostate =$row['ostate'];
 $opin = $row['opin'];
$olandline=$row['olandline'];
 $centralenumber =$row['centralenumber'];
$cstnumber =$row['cstnumber'];
$trid = $row['trid'];
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
</head>
<body>

<?php include('../include/sidemenu.php');?>

<div align="center"><p align="left">&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">edit transporter name</span></h2>
  <form id="form1" name="form1" method="post" action="">
    
    <div align="center">
      <table width="767"   border="1" cellpadding="2" frame="box" rules="none">
        <tbody>
          <tr>
            <td height="23" colspan="4" bgcolor="#14C4B6"><h4>Basic Details</h4></td>
          </tr>
          <tr>
          
            <td width="178">Transport Name:</td>
            <td width="171"><input type="text" name="transportname"  size = "35"  id="textfield11" value="<?php echo $transportname; ?>" /></td>
            <td width="140">&nbsp;</td>
            <td width="186">
            <p>&nbsp;</p></td>
          </tr>
          <tr>
            <td colspan="4">
			<table width="100%" border="1" cellpadding="0" >
			
			<tr bgcolor="#14C4B6">
            <td colspan="2"><h4 align="center">Factory Details </h4></td>
            
            <td colspan="2"><h4 align="center">Office Details </h4></td>
           
          </tr>
          <tr>
            <td>Factory Address:</td>
            <td><textarea name="factoryadd" id="textarea" cols="20" rows="2"><?php echo $factoryadd; ?></textarea></td>
            <td>Office Address:</td>
            <td><textarea name="officeadd" id="officeadd" cols="20" rows="3"><?php echo $officeadd; ?></textarea></td>
          </tr>
          <tr>
            <td>City Name:</td>
            <td><input type="text" name="cityname" id="textfield15" value="<?php echo $cityname; ?>" /></td>
            <td>City:</td>
            <td><input type="text" name="ocity" id="textfield9" value="<?php echo $ocity; ?>" /></td>
          </tr>
          <tr>
            <td>State:</td>
            <td><input type="text" name="state" id="textfield17" value="<?php echo $state; ?>" /></td>
            <td>State:</td>
            <td><input type="text" name="ostate" id="textfield10" value="<?php echo $ostate; ?>" /></td>
          </tr>
          <tr>
            <td>Mobile Number:</td>
            <td><input type="text" name="mobile" id="textfield12" value="<?php echo $mobile; ?>" /></td>
            <td>Pin:</td>
            <td><input type="text" name="opin" id="textfield" value="<?php echo $opin; ?>" /></td>
          </tr>
          <tr>
            <td>Pin No:</td>
            <td><input type="text" name="pin" id="textfield18" value="<?php echo $pin; ?>" /></td>
            <td>Landline No.</td>
            <td><input type="text" name="olandline" id="textfield21" value="<?php echo $olandline; ?>" /></td>
          </tr>
          <tr>
            <td>Email:</td>
            <td><input type="text" name="email" id="email2" value="<?php echo $email; ?>" /></td>
            <td>Contact Person:</td>
            <td><input type="text" name="contactperson" id="textfield20" value="<?php echo $contactperson; ?>" /></td>
          </tr>
			</table></td>
          </tr>
          
          <tr>
            <td colspan="4" bgcolor="#14C4B6"><h4>Taxation Details</h4></td>
          </tr>
          <tr>
            <td>Income Tax Number:</td>
            <td><input type="text" name="incometaxno" id="textfield14" value="<?php echo $incometaxno; ?>" /></td>
            <td>Central Exise Number</td>
            <td><input type="text" name="centralenumber" value="<?php echo $centralenumber; ?>"  /></td>
          </tr>
          <tr>
            <td>Tin Number:</td>
            <td><input type="text" name="tinno" id="textfield19" value="<?php echo $tinno; ?>" /></td>
            <td>CST Number</td>
            <td><input type="text" name="cstnumber" value="<?php echo $cstnumber; ?>" /></td>
          </tr>
          <tr>
            <td>Service Tax Number:</td>
            <td><input type="text" name="servicetaxno" id="textfield16" value="<?php echo $servicetaxno; ?>" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td height="39">&nbsp;</td>
            <td><input type="hidden" name="trid" id="textfield13" value="<?php echo $trid; ?>" />&nbsp;</td>
            <td>&nbsp;</td>
            
			
			 <td>  <?php  if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" ) { ?>
<input type="submit" name="s" id="submit2" value="Submit" />
<?php  } ?> </td>
          </tr>
        </tbody>
        </table>
    </div>
    <p align="left">&nbsp;</p>
  </form>
  <p align="center">&nbsp;</p>
  <blockquote>&nbsp;</blockquote>
</div>
</body>
</html>

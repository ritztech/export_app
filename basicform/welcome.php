<?php
include('../access.php');
session_start();
if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

$abc=$_SESSION['fid'];
$uname2=$_SESSION['uname'];
?>
<?php include('../conf.php');?>
<?php

try {
$query = "SELECT `fid`, `firmname`, `businessfirm`, `officeadd`, `shopadd`, `phonno`, `faxnumber`, `mobile`, `contactperson`, `firmtype`, `email`, `mpvat`,  DATE_FORMAT(midate,'%d/%m/%Y') as midate, `mandilicenseno`,  DATE_FORMAT(mandidate,'%d/%m/%Y') as mandidate, `cstno`,  DATE_FORMAT(cstdate,'%d/%m/%Y') as cstdate, `tinno`,  DATE_FORMAT(tindate,'%d/%m/%Y') as tindate, `fssaino`,  DATE_FORMAT(fdate,'%d/%m/%Y') as fdate, `otherdoc`, `propname`, `place`, `state`, `contactperson1`, `email1`, `itnumber`, DATE_FORMAT(itndate,'%d/%m/%Y') as itndate, `otherdoc1`, `pcontact`, `pstatus` FROM `firmcreation` WHERE fid=$abc";
$stmt = $dbc->prepare($query);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$firmname = $row['firmname'];
$businessfirm = $row['businessfirm'];
$officeadd = $row['officeadd'];
$shopadd = $row['shopadd'];
$phonno = $row['phonno'];
$faxnumber = $row['faxnumber'];
$mobile = $row['mobile'];
$contactperson = $row['contactperson'];
$firmtype = $row['firmtype'];
$email = $row['email'];
$mpvat = $row['mpvat'];
$midate = $row['midate'];
$mandilicenseno = $row['mandilicenseno'];
$mandidate = $row['mandidate'];
$cstno = $row['cstno'];
$cstdate = $row['cstdate'];
$tinno = $row['tinno'];
$tindate = $row['tindate'];
$fssaino = $row['fssaino'];
$fdate = $row['fdate'];
$otherdoc = $row['otherdoc'];
$propname = $row['propname'];
$place = $row['place'];
$state = $row['state'];
$contactperson1 = $row['contactperson1'];
$email1 = $row['email1'];
$itnumber = $row['itnumber'];
$itndate = $row['itndate'];
$otherdoc1 = $row['otherdoc1'];
$pcontact = $row['pcontact'];
$pstatus = $row['pstatus'];
$fid = $row['fid'];
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
<?php include('../include/header.php'); ?>
<?php 
include('../include/sidemenu.php'); 
?>


<div align = "center">
  <h2>&nbsp;</h2>
  
  <a href='../app/show_firm.php?fid=<?php echo $fid ?>'>Show Firm Details</a>
  
  <table width="906" border="3" bordercolor="#052F5B">
    <tbody>
         <tr>
           <td colspan="4"><h2 align="center"><span style="color:#F17327;">Welcome <?php echo $uname2; ?></span></h2></td>
         </tr>
         <tr>
           <td width="194"><strong>Firm Name</strong></td>
           <td width="188"><?php echo $firmname; ?></td>
           <td width="254"><strong>Business Firm</strong></td>
           <td width="252"><?php echo $businessfirm; ?></td>
         </tr>
         <tr>
           <td><strong>Phone No</strong></td>
           <td><?php echo $phonno; ?></td>
           <td><strong>Mobile Number</strong></td>
           <td><?php echo $mobile; ?></td>
         </tr>
         <tr>
           <td><strong>Propritor Name</strong></td>
           <td><?php echo $propname; ?></td>
           <td><strong>Place</strong></td>
           <td><?php echo $place; ?></td>
         </tr>
         <tr>
           <td><strong>Contact</strong></td>
           <td><?php echo $pcontact; ?></td>
           <td><strong>Status</strong></td>
           <td><?php echo $pstatus; ?></td>
         </tr>
       </tbody>
     </table>
	 
		
     <p>&nbsp;</p>
</div>
	 

</body>
</html>

<?php
session_start();
if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<?php include('../conf.php');?>
<?php
try {
$query = "SELECT `fid`, `firmname`, `businessfirm`, `officeadd`, `shopadd`, `phonno`, `faxnumber`, `mobile`, `contactperson`, `firmtype`, `email`, `mpvat`,  DATE_FORMAT(midate,'%d/%m/%Y') as midate, `mandilicenseno`,  DATE_FORMAT(mandidate,'%d/%m/%Y') as mandidate, `cstno`,  DATE_FORMAT(cstdate,'%d/%m/%Y') as cstdate, `tinno`,  DATE_FORMAT(tindate,'%d/%m/%Y') as tindate, `fssaino`,  DATE_FORMAT(fdate,'%d/%m/%Y') as fdate, `otherdoc`, `propname`, `place`, `state`, `contactperson1`, `email1`, `itnumber`, DATE_FORMAT(itndate,'%d/%m/%Y') as itndate, `otherdoc1`, `pcontact`, `pstatus`,`bankname`, `banktype`, `bankaccnumber`, `ifsccode` FROM `firmcreation`  WHERE fid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['fid']);
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
$bankname = $row['bankname'];
$banktype = $row['banktype'];
$bankaccnumber = $row['bankaccnumber'];
$ifsccode = $row['ifsccode'];
$fid = $row['fid'];

} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include('../include/menu1.php');?>
<div id="gutter"></div>

<div id="col5">
  <h2 align="center"><span style="color:#F17327;"> Company Details </span></h2>
  <form id="form1" name="form1" method="post" action="">
  <p align="left">&nbsp;</p>
    <div align="left">
      <table width="921" border="1" rules="none" frame="box">
        <tbody>
          <tr>
            <td width="879"><table width="993" height="295" border="0" cellpadding="5">
              <tbody>
                <tr>
                  <td colspan="4" bgcolor="#14C4B6"><h4 align="left">User Information</h4></td>
                  </tr>
                 <tr>
                  <td colspan="4">Firm Name:&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
                  <input type="text" name="firmname" required="required"  size="60" value="<?php echo $firmname; ?>"/></td>
                </tr>
                <tr>
                  <td colspan="4">Business Of Firm:&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 
                  <input type="text" name="businessfirm" size="60" value="<?php echo $businessfirm; ?>" /></td>
                </tr>
                <tr>
                  <td>Office Address:</td>
                  <td>
                  <textarea name="officeadd"  id="textarea" cols="25" rows="3" readonly > <?php echo $officeadd; ?>  </textarea>
                  </td>
                  <td>Shop/Factory Address:</td>
                  <td><textarea name="shopadd" id="textarea" cols="25" rows="3" readonly ><?php echo $shopadd; ?></textarea>
                  </td>
                </tr>
                <tr>
                  <td height="52"><label for="textfield24">Phone Number(STD Code): </label></td>
                  <td><p>
                    <input type="text" name="phonno"  value="<?php echo $phonno; ?>" size="20" readonly />
                  </p></td>
                  <td>Fax Number:</td>
                  <td><input type="text" name="faxnumber" value="<?php echo $faxnumber; ?>" size="20" readonly /></td>
                </tr>
                <tr>
                  <td>Mobile Number: </td>
                  <td><input type="text" name="mobile" value="<?php echo $mobile; ?>" size="20" readonly  /></td>
                  <td>Contact Person:</td>
                  <td><p>
                    <input type="text" name="contactperson" value="<?php echo $contactperson; ?>" size="20"  readonly  />
                  </p>
                  <p><input type="text" name="contactperson1" value="<?php echo $contactperson1; ?>" size="20"  readonly  /></p></td>
                </tr>
                <tr>
                  <td>Type Of Firm:</td>
                  <td>
                    <p>
                      <input type="text" name="mobile" value="<?php echo $firmtype; ?>" size="20" readonly  />
                    </p></td>
                  <td><label for="email2">Email:</label></td>
                  <td><p>
                    <input type="email" name="email" value="<?php echo $email; ?>" size="20" readonly  />
                  </p>
                  <p>
                  <input type="email" name="email1" value="<?php echo $email1; ?>" size="20"  readonly /></p></td>
                </tr>
              </tbody>
            </table>
              <table width="996" height="311" border="0" cellpadding="5">
                <tbody>
                  <tr>
                    <td colspan="4" bgcolor="#14C4B6"><h4 align="left">Taxation Information</h4></td>
                  </tr>
                  <tr>
                    <td width="268">Tin/Sales Tax Registration
                    :  &nbsp;</td>
                    <td width="264"><input type="text" name="mpvat" value="<?php echo $mpvat; ?>"  readonly  /></td>
                    <td width="174">Issue Date:</td>
                    <td width="200"><div align="left">
                    <input id="midate"   name = "midate"   type = "text"  size="17"  value="<?php echo $midate; ?>"  readonly />  
                  
                    
                   </div></td>
                  </tr>
                  <tr>
                    <td>Mandi License
                  Number:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><input type="text" name="mandilicenseno" value="<?php echo $mandilicenseno; ?>" readonly  /></td>
                    <td>Issue Date:</td>
                    <td><div align="left">
                        <input id="mandidate"   name = "mandidate"   type = "text"  size="17"  value="<?php echo $mandidate; ?>"  readonly  />  </div></td>
                  </tr>
                  <tr>
                    <td>CST Registration
                    Number:&nbsp;</td>
                    <td><input type="text" name="cstno" value="<?php echo $cstno; ?>"  /></td>
                    <td>Issue Date:</td>
                    <td><div align="left">
                     <input id="cstdate"   name = "cstdate"   type = "text"  size="17"  value="<?php echo $cstdate; ?>"  readonly  />  </div></td>
                  </tr>

                    <td>Firm/ROC Registration 
                    Number:</td>
                    <td><input type="text" name="tinno" value="<?php echo $tinno; ?>"  /></td>
                    <td>Issue Date:</td>
                    <td><div align="left">
                     <input id="tindate"   name = "tindate"   type = "text"  size="17"  value="<?php echo $tindate; ?>" readonly  />  </div></td>
                  </tr>
                  <tr>
                    <td>FSSAI License
                  Number:&nbsp;</td>
                    <td><input type="text" name="fssaino" value="<?php echo $fssaino; ?>" readonly  /></td>
                    <td>Issue Date:</td>
                    <td><div align="left">
                      <input id="fdate"   name = "fdate"   type = "text"  size="17"  value="<?php echo $fdate; ?>" readonly  />  
                    </div></td>
                  </tr>
                  <tr>
                    <td>Income Tax
                  Number:&nbsp;</td>
                    <td><input type="text" name="itnumber" value="<?php echo $itnumber; ?>"  readonly  /></td>
                    <td>Issue Date:</td>
                    <td><div align="left">
                      <input id="itndate"   name = "itndate"   type = "text"  size="17"  value="<?php echo $itndate; ?>"  readonly />  
                    </div></td>
                </tr>
                  <tr>
                    <td height="22" colspan="4"><input type="hidden" name="fid" id="textfield" value="<?php echo $fid; ?>" readonly  /></td>
                  </tr>
                  <tr>
                    <td colspan="4">
                    <div align="left">Other Goverment Department License Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" name="otherdoc" value="<?php echo $otherdoc; ?>"  /> 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="text" name="otherdoc1" value="<?php echo $otherdoc1; ?>"  readonly  />
                    </div>
                  </td>
                  </tr>
                </tbody>
              </table>
              <table width="997" height="163" border="0" cellpadding="5">
                <tbody>
                  <tr>
                    <td height="20" colspan="4" bgcolor="#14C4B6"><h4 align="left">Proprietor/Partner information</h4></td>
                  </tr>
                  <tr>
                    <td width="156">Proprietor/Partner Name: </td>
                    <td width="243"><input type="text" name="propname" value="<?php echo $propname; ?>" size="30" readonly  /></td>
                    <td width="242">Place:</td>
                    <td width="322"><input type="text" name="place" value="<?php echo $place; ?>" size="30"  readonly  /></td>
                  </tr>
                  <tr>
                    <td><p>State:</p></td>
                    <td><p>
                      <input type="text" name="state" value="<?php echo $state; ?>" size="30"  readonly  />
                    </p></td>
                    <td><p>Contact:</p></td>
                    <td><p>
                      <input type="text" name="pcontact" value="<?php echo $pcontact; ?>" size="30" readonly  />
                       <input type="hidden" name="fid" value="<?php echo $fid; ?>" size="30" readonly />
                    </p></td>
                    
                  </tr>
                  <tr>
                    <td>Status:</td>
                    <td><input type="text" name="pstatus" value="<?php echo $pstatus; ?>" size="30" readonly  /></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                    </tr>
                  <tr>
                    <td colspan="4" bgcolor="#14C4B6"><h4>Bank Account Information</h4></td>
                  </tr>
                  <tr>
                    <td><label for="textfield">Bank Name:</label></td>
                    <td><input type="text" name="bankname"  value="<?php echo $bankname; ?>" /></td>
                    <td>Bank Type</td>
                    <td><input type="text" name="banktype"  value="<?php echo $banktype; ?>" /></td>
                  </tr>
                  <tr>
                    <td>Account Number</td>
                    <td><input type="text" name="bankaccnumber"  value="<?php echo $bankaccnumber; ?>" /></td>
                    <td>IFSC Code</td>
                    <td><input type="text" name="ifsccode"  value="<?php echo $ifsccode; ?>" /></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
					
					<?php
					
					if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" )
					{ ?>
					<a href="#" onclick="window.open('broker_edit.php?fid=<?php echo $fid; ?>');    return false;">
                      <input type="button" value="Click here to Edit Record" />
                    </a>
					
					<?php  } ?>
					
					
					
					
					</td>
                  </tr>
                </tbody>
            </table></td>
            <td width="32"><p></td>
          </tr>
        </tbody>
      </table>
    </div>
  </form>&nbsp;
</div>
<?php include('../include/footer.php');?>
<div id="logincontainer">  

</body>
</html>

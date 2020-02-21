<?php
session_start();
if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<?php include('../conf.php');?>
<?php 

if(isset($_POST['s'])) {
$firmname = $_POST['firmname'];
$businessfirm = $_POST['businessfirm'];
$officeadd = $_POST['officeadd'];
$shopadd = $_POST['shopadd'];
$phonno = $_POST['phonno'];
$faxnumber = $_POST['faxnumber'];
$mobile = $_POST['mobile'];
$contactperson = $_POST['contactperson'];
$firmtype = $_POST['firmtype'];
$email = $_POST['email'];
$mpvat = $_POST['mpvat'];
$midate = $_POST['midate'];
$mandilicenseno = $_POST['mandilicenseno'];
$mandidate = $_POST['mandidate'];
$cstno = $_POST['cstno'];
$cstdate = $_POST['cstdate'];
$tinno = $_POST['tinno'];
$tindate = $_POST['tindate'];
$fssaino = $_POST['fssaino'];
$fdate = $_POST['fdate'];
$otherdoc = $_POST['otherdoc'];
$propname = $_POST['propname'];
$place = $_POST['place'];
$state = $_POST['state'];
$contactperson1 = $_POST['contactperson1'];
$email1 = $_POST['email1'];
$itnumber = $_POST['itnumber'];
$itndate = $_POST['itndate'];
$otherdoc1 = $_POST['otherdoc1'];
$pcontact = $_POST['pcontact'];
$pstatus = $_POST['pstatus'];
$bankname = $_POST['bankname'];
$banktype = $_POST['banktype'];
$bankaccnumber = $_POST['bankaccnumber'];
$ifsccode = $_POST['ifsccode'];
$fid = $_POST['fid'];
	$query = "UPDATE firmcreation SET
    firmname='$firmname',
    businessfirm='$businessfirm',
    officeadd='$officeadd',
    shopadd='$shopadd',
    phonno='$phonno',
    faxnumber='$faxnumber',
    mobile='$mobile',
    contactperson='$contactperson',
    firmtype='$firmtype',
    email='$email',
    mpvat='$mpvat',
    midate=STR_TO_DATE('$midate','%d/%m/%Y'),
    mandilicenseno='$mandilicenseno',
    mandidate=STR_TO_DATE('$mandidate','%d/%m/%Y'),
    cstno='$cstno',
    cstdate=STR_TO_DATE('$cstdate','%d/%m/%Y'),
    tinno='$tinno',
    tindate=STR_TO_DATE('$tindate','%d/%m/%Y'),
    fssaino='$fssaino',
    fdate=STR_TO_DATE('$fdate','%d/%m/%Y'),
    otherdoc='$otherdoc',
	propname='$propname',
    place='$place',
    state='$state',
	contactperson1='$contactperson1',
   email1='$email1', 
   itnumber='$itnumber',
   itndate=STR_TO_DATE('$itndate','%d/%m/%Y'), 
   otherdoc1='$otherdoc1', 
   pcontact='$pcontact', 
   pstatus='$pstatus',
   bankname = '$bankname',
   banktype = '$banktype',
   bankaccnumber = '$bankaccnumber',
   ifsccode ='$ifsccode'
    WHERE fid='$fid'";
	mysql_query($query);
	//echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  echo "<script>alert('Data updated Sucessfully .');location.href='newuser_view.php'</script>";

        

}
?>



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

//  working on date issue

if ($mandidate == "00/00/0000") {	$mandidate = " ";}
if ($midate == "00/00/0000") {	$midate = " ";}
if ($cstdate == "00/00/0000") {	$cstdate = " ";}
if ($tindate == "00/00/0000") {	$tindate = " ";}
if ($fdate == "00/00/0000") {	$fdate = " ";}
if ($itndate == "00/00/0000") {	$itndate = " ";}



//  coded end


} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../entryform/jscode/printdiv.js"> </script>

<script language="javascript">

function phappycode(){
document.form1.firmtype.value = document.form1.firmtype12.value;
}


function phappycode1(){
document.form1.pstatus.value = document.form1.pstatus1.value;
}

</script>




</head>
<body>
<?php include('../include/sidemenu.php');?>


<div align = "center">
<div id = "griddiv">
  <h2 align="center"><span style="color:#F17327;">COMPANY DETAILS</span></h2>
  <form id="form1" name="form1" method="post" action="">
  <p align="left">&nbsp;</p>
    <div align="center">
      <table width="687" border="1" cellpadding="0" frame="box" rules="none">
        <tbody>
          <tr>
            <td width="879"><table width="800" border="0" cellpadding="1">
              <tbody>
                <tr>
                  <td colspan="4" bgcolor="#14C4B6"><h4 align="left" >User Information</h4></td>
                </tr>
                <tr>
                  <td colspan="4">Firm Name:
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
                  <input type="text" name="firmname"   readonly  required="required"  size="60" value="<?php echo $firmname; ?>"/></td>
                </tr>
                <tr>
                  <td colspan="4">Business Of Firm:
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 
                  <input type="text" name="businessfirm" size="60" value="<?php echo $businessfirm; ?>" /></td>
                </tr>
                <tr>
                  <td>Office Address:</td>
                  <td>
                  <textarea name="officeadd"  id="textarea" cols="25" rows="3"><?php echo $officeadd; ?></textarea>
                  </td>
                  <td>Shop/Factory Address:</td>
                  <td><textarea name="shopadd" id="textarea" cols="25" rows="3"><?php echo $shopadd; ?></textarea>
                  </td>
                </tr>
                <tr>
                  <td><label for="textfield24">Phone Number(STD Code): </label></td>
                  <td><input type="text" name="phonno"  value="<?php echo $phonno; ?>" size="34"/></td>
                  <td>Fax Number:</td>

                  <td><input type="text" name="faxnumber" value="<?php echo $faxnumber; ?>" size="34"/></td>
                </tr>
                <tr>
                  <td>Mobile Number: </td>
                  <td><input type="text" name="mobile" value="<?php echo $mobile; ?>" size="34"  /></td>
                  <td>Contact Person:</td>
                  <td>
                    <input type="text" name="contactperson" value="<?php echo $contactperson; ?>" size="34"  /><br />
                  <input type="text" name="contactperson1" value="<?php echo $contactperson1; ?>" size="34"  />
                  </td>
                </tr>
                <tr>
                  <td>Type Of Firm:</td>
                  <td>
                      <input type="text" name="firmtype" value="<?php echo $firmtype; ?>" size="17"  />
                    
                      <select name="firmtype12" id="select2" onChange="phappycode()"  >
                        <option>Proprietor </option>
                        <option>Company </option>
                        <option>Society</option>
                        <option>Partnership </option>
                      </select>
                  </td>
                  <td><label for="email2">Email:</label></td>
                  <td><p>
                    <input type="text" name="email" value="<?php echo $email; ?>" size="34"  />
                  </p>
                  <p>
                  <input type="text" name="email1" value="<?php echo $email1; ?>" size="34"  /></p></td>
                </tr>
              </tbody>
            </table>
              <table width="800" border="0" cellpadding="1">
                <tbody>
                  <tr>
                    <td colspan="4" bgcolor="#14C4B6"><h4 align="left">Taxation Information</h4></td>
                  </tr>
                  <tr>
                    <td width="241">Tin/Sales Tax Registration
                    :  &nbsp;</td>
                    <td width="260"><input type="text" name="mpvat" value="<?php echo $mpvat; ?>"  /></td>
                    <td width="168">Issue Date:</td>
                    <td width="272"><div align="left">
                    <input id="midate"   name = "midate"   type = "text"  size="17"  value="<?php echo $midate; ?>" />  <a href="javascript:NewCal('midate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
                  
                    
                   </div></td>
                  </tr>
                  <tr>
                    <td>Mandi License
                  Number:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><input type="text" name="mandilicenseno" value="<?php echo $mandilicenseno; ?>" /></td>
                    <td>Issue Date:</td>
                    <td><div align="left">
                        <input id="mandidate"   name = "mandidate"   type = "text"  size="17"  value="<?php echo $mandidate; ?>" />  <a href="javascript:NewCal('mandidate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></div></td>
                  </tr>
                  <tr>
                    <td>CST Registration
                    Number:&nbsp;</td>
                    <td><input type="text" name="cstno" value="<?php echo $cstno; ?>"  /></td>
                    <td>Issue Date:</td>
                    <td><div align="left">
                     <input id="cstdate"   name = "cstdate"   type = "text"  size="17"  value="<?php echo $cstdate; ?>" />  <a href="javascript:NewCal('cstdate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></div></td>
                  </tr>

                <td>Firm/ROC Registration 
                    Number:</td>
                    <td><input type="text" name="tinno" value="<?php echo $tinno; ?>"  /></td>
                    <td>Issue Date:</td>
                    <td><div align="left">
                     <input id="tindate"   name = "tindate"   type = "text"  size="17"  value="<?php echo $tindate; ?>" />  <a href="javascript:NewCal('tindate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></div></td>
                  </tr>
                  <tr>
                    <td>FSSAI License
                  Number:&nbsp;</td>
                    <td><input type="text" name="fssaino" value="<?php echo $fssaino; ?>" /></td>
                    <td>Issue Date:</td>
                    <td><div align="left">
                      <input id="fdate"   name = "fdate"   type = "text"  size="17"  value="<?php echo $fdate; ?>" />  <a href="javascript:NewCal('fdate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
                    </div></td>
                  </tr>
                  <tr>
                    <td>Income Tax
                  Number:&nbsp;</td>
                    <td><input type="text" name="itnumber" value="<?php echo $itnumber; ?>" /></td>
                    <td>Issue Date:</td>
                    <td><div align="left">
                      <input id="itndate"   name = "itndate"   type = "text"  size="17"  value="<?php echo $itndate; ?>" />  <a href="javascript:NewCal('itndate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
                    </div></td>
                </tr>
                  <tr>
                    <td colspan="4"><input type="hidden" name="fid" id="textfield" value="<?php echo $fid; ?>" /></td>
                  </tr>
                  <tr>
                    <td colspan="4">
                    <div align="left">Other Goverment Department License Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" name="otherdoc" value="<?php echo $otherdoc; ?>"  /> 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="text" name="otherdoc1" value="<?php echo $otherdoc1; ?>"  />
                    </div>
                  </td>
                  </tr>
                </tbody>
              </table>
              <table width="800" border="0" cellpadding="0">
                <tbody>
                  <tr>
                    <td colspan="4" bgcolor="#14C4B6" ><h4 align="left">Proprietor/Partner information</h4></td>
                  </tr>
                  <tr>
                    <td>Proprietor/Partner Name: </td>
                    <td><input type="text" name="propname" value="<?php echo $propname; ?>" size="30"  /></td>
                    <td>Place:</td>
                    <td><input type="text" name="place" value="<?php echo $place; ?>" size="30"  /></td>
                  </tr>
                  <tr>
                    <td><p>State:</p></td>
                    <td><p>
                      <input type="text" name="state" value="<?php echo $state; ?>" size="30"  />
                    </p></td>
                    <td><p>Contact:</p></td>
                    <td><p>
                      <input type="text" name="pcontact" value="<?php echo $pcontact; ?>" size="30"  />
                    </p></td>
                    
                  </tr>
                  <tr>
                    <td>Status:</td>
                    <td> <input type="text" name="pstatus" value="<?php echo $pstatus; ?>" size="14"/>
                    <select name="pstatus1" onChange="phappycode1()" id="select">
                      <option>Director</option>
                      <option>Manager</option>
                      <option>Partner</option>
                      <option>Proprietor</option>
                      <option></option>
                    </select></td>
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
                    
                    
					 <td>  
 </td>
 
					
					
					
					
                  </tr>
                </tbody>
            </table></td>
            
          </tr>
      </table>
    </div>
  </form>&nbsp;
</div>

<input type="button" name="btnprint" value="Print" onclick="PrintMe('griddiv')"/>
</div>

<?php include('../include/footer.php');?>
<div id="logincontainer">  

</body>
</html>

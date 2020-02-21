<?php
session_start();
if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>

</head>
<body>

<?php include('../include/sidemenu.php');?>
<div id="gutter"></div>

<div id="col5">
<br>
  <h2 align="center"><span style="color:#F17327;">Add Company Details</span></h2>
  <form id="form1" name="form1" method="post" action="newuser_back.php">
  
    <div align="left">
      <table width="997" border="1" frame="box" rules="none">
        <tbody>
          <tr>
            <td width="1033"><table width="989" height="225" border="0" cellpadding="1">
              <tbody>
                <tr>
                  <td height="20" colspan="4" bgcolor="#14C4B6"><h4>User Information</h4></td>
                </tr>
                <tr>
                  <td colspan="4">Firm Name:&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="firmname" required="required"  size="60"/></td>
                </tr>
                <tr>
                  <td colspan="4">Business Of Firm:&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="text" name="businessfirm" size="60" /></td>
                </tr>
                <tr>
                  <td width="184">Office Address:</td>
                  <td width="296">
                  <textarea name="officeadd" id="textarea" cols="25" rows="3"></textarea></td>
                  <td width="147">Shop/Factory Address:</td>
                  <td width="344"> <textarea name="shopadd" id="textarea" cols="25" rows="3"></textarea>
                  </td>
                </tr>
                <tr>
                  <td><label for="textfield24">Phone Number(STD Code): </label></td>
                  <td><input type="text" name="phonno" /></td>
                  <td>Fax Number:</td>
                  <td><input type="text" name="faxnumber"/></td>
                </tr>
                <tr>
                  <td>Mobile Number: </td>
                  <td><input type="text" name="mobile" required="required" /></td>
                  <td>Contact Person:</td>
                  <td>
                    <input type="text" name="contactperson"  />
                  
                    <input type="text" name="contactperson1"  />
                  </td>
                </tr>
                <tr>
                  <td>Type Of Firm:</td>
                  <td><select name="firmtype" id="select2">
                    <option>PROPRIETOR </option>
                    <option>COMPANY </option>
                    <option>SOCIETY</option>
                    <option>PARTNERSHIP FIRMS</option>
                  </select></td>
                  <td><label for="email2">Email:</label></td>
                  <td>
                   
                    <input type="text" name="email"/>
                 
                    <input type="text" name="email1" />
                  </td>
                </tr>
              </tbody>
            </table><BR />
              <table width="986" border="0" cellpadding="1">
                <tbody>
                  <tr>
                    <td height="20" colspan="4" bgcolor="#14C4B6"><h4 align="left">Taxation Information</h4></td>
                  </tr>
                  <tr>
                    <td width="181">Tin/Sales Tax Registration
                    :  &nbsp;</td>
                    <td width="322"><input type="text" name="mpvat" /></td>
                    <td width="83">Issue Date:</td>
                    <td width="382"><div align="left">
                      <input id="dstart"   name = "midate" onchange = "isDate(this.value)"   type = "text"  size="17"  value="DD/MM/YYYY" />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div></td>
                  </tr>
                  <tr>
                    <td>Mandi License
                  Number:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><input type="text" name="mandilicenseno" /></td>
                    <td>Issue Date:</td>
                    <td><div align="left">
                        <input id="mandidate"   name = "mandidate"  onchange = "isDate(this.value)"  type = "text"  size="17"  value="DD/MM/YYYY" />  <a href="javascript:NewCal('mandidate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></div></td>
                  </tr>
                  <tr>
                    <td>CST Registration
                    Number:&nbsp;</td>
                    <td><input type="text" name="cstno"  /></td>
                    <td>Issue Date:</td>
                    <td><div align="left">
                      <input id="cstdate"   name = "cstdate" onchange = "isDate(this.value)"   type = "text"  size="17"  value="DD/MM/YYYY" />  <a href="javascript:NewCal('cstdate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></div></td>
                  </tr>
                  
                <td>Firm/ROC Registration 
                    Number:</td>
                    <td><input type="text" name="tinno"  /></td>
                    <td>Issue Date:</td>
                    <td><div align="left">
                      <input id="tindate"   name = "tindate"  onchange = "isDate(this.value)"  type = "text"  size="17"  value="DD/MM/YYYY" />  <a href="javascript:NewCal('tindate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></div></td>
                  </tr>
                  <tr>
                    <td>FSSAI License
                  Number:&nbsp;</td>
                    <td><input type="text" name="fssaino" /></td>
                    <td>Issue Date:</td>
                    <td><div align="left">
                      <input id="fdate"   name = "fdate"  onchange = "isDate(this.value)"  type = "text"  size="17"  value="DD/MM/YYYY" />  <a href="javascript:NewCal('fdate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
                    </div></td>
                  </tr>
                 <tr>
                    <td>Income Tax
                  Number:&nbsp;</td>
                    <td><input type="text" name="itnumber" /></td>
                    <td>Issue Date:</td>
                    <td><div align="left">
                      <input id="itndate"   name = "itndate" onchange = "isDate(this.value)"   type = "text"  size="17"  value="DD/MM/YYYY" />  <a href="javascript:NewCal('itndate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
                    </div></td>
                </tr>

                  <tr>
                    <td height="22" colspan="4">&nbsp;</td>
                </tr>
                  <tr>
                    <td colspan="4">
                      <div align="left">Other Goverment Department License Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" name="otherdoc"  /> 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" name="otherdoc1"  />
                    </div></td>
                  </tr>
                </tbody>
              </table><BR />
              <table width="989" border="0" cellpadding="1">
                <tbody>
                  <tr>
                    <td  colspan="4" bgcolor="#14C4B6"><h4 align="left">Propritor/Partner information</h4></td>
                  </tr>
                  <tr>
                    <td width="198">Proppritor/Partner Name: </td>
                    <td width="308"><input type="text" name="propname"  /></td>
                    <td width="86">Place:</td>
                    <td width="379"><input type="text" name="place"  /></td>
                  </tr>
                  <tr>
                    <td><p>State:</p></td>
                    <td><p>
                      <input type="text" name="state"  />
                    </p></td>
                    <td><p>Contact:</p></td>
                    <td><p>
                      <input type="text" name="pcontact"  />
                    </p></td>
                    
                  </tr>
                  <tr>
                    <td>Status:</td>
                    <td><select name="pstatus" id="select" style="width:170px;">
                      <option>Director</option>
                      <option>Manager</option>
                      <option>Partner</option>
                      <option>Proprietor</option>
                      <option></option>
                    </select></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="4" bgcolor="#14C4B6"><h4>Bank Account Information</h4></td>
                  </tr>
                  <tr>
                    <td><label for="textfield">Bank Name:</label></td>
                    <td><input type="text" name="bankname" /></td>
                    <td>Bank Type</td>
                    <td><input type="text" name="banktype" /></td>
                  </tr>
                  <tr>
                    <td>Account Number</td>
                    <td><input type="text" name="bankaccnumber" /></td>
                    <td>IFSC Code</td>
                    <td><input type="text" name="ifsccode" /></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="s" id="submit" value="Submit" /></td>
                  </tr>
                </tbody>
            </table></td>
            
          </tr>
        </tbody>
      </table>
    </div>
  </form>
</div>
</body>
</html>

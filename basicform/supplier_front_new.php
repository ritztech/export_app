<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }

$fid=$_SESSION['fid'];

$t_date = date("d/m/Y");
?>
<?php include('../conf.php');?>
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

function ValidateForm(){
	
		    var dt=document.form1.acgroup;
	   // alert(dt.value);
	    if (dt.value == "0" ){
	           dt.focus();
			   alert('Choose Accounting Group ..');
              return false
    }
	
	
    var dt=document.form1.tbalance;
	    if (dt.value == "0" ){
	           dt.focus();
			   alert('Choose Type Of Balance ..');
              return false
    }
	

	

	
	
	
	}
	

</script>

</head>
<body>

<?php include('../include/sidemenu.php');?>

<div align="center">
  <h2 align="center"><span style="color:#F17327;">Add LEDGER Details</span></h2>
  <form id="form1" name="form1" method="post"  onSubmit="return ValidateForm()"  action="supplier_new_back.php">
  
  <div>
  
  <table border = 1 style="border-collapse:collapse; border-color:red;">
  
  <tr>  <td align = "center"> CHOOSE LEDGER TYPE </td> </tr>
   <tr>  <td> <input name="broker" type="checkbox" value="1"><span style="font-size:16px;">Broker</span> 
   <input  name="transporter" type="checkbox" value="1"><span style="font-size:16px;">Transporter</span>  
   <input  name="buyer" type="checkbox" value="1"><span style="font-size:16px;">Trading account</span>  </td> </tr>
	   <tr>  <td align = "center"> <?php  if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" ) { ?>
            <input style="width:100px; height:27px; font-size:14px;" type="submit" name="s" id="submit2" value="Submit" />
            <?php  } ?>  </td> </tr>
  
  </table>
  



</div>



  
  
    <table border="1"  cellpadding="2" style="font-size:12px; border-collapse:collapse;">
      <tbody>
        <tr>
          <td  colspan="4" bgcolor="#14C4B6"><h4>Basic Details</h4></td>
		   
        </tr>
        <tr>
          <td align="right"><b>Name:</b></td>
          <td colspan="3"><input type="text" name="suppliername" style="border:double;"   autofocus size = "55" id="textfield11" required="required" /></td>
		   
        </tr>
        <tr>
          <td colspan="4">
		  <table width="100%" border="1" style="border-collapse:collapse; font-size:12px;" cellpadding="2">
		  <tr bgcolor="#14C4B6">
          <td colspan="2"><h4 align="center">Factory Details</h4></td>
          
          <td colspan="2"><h4 align="center">Office Details</h4></td>
        </tr>
        <tr>
          <td width="19%" height="37">Factory Address:</td>
          <td width="24%">
          <p>
            <textarea name="factoryadd" cols="20" rows="2"></textarea>
          </p></td>
          <td width="19%">BILLING Address:</td>
          <td width="38%">&nbsp;
          <textarea name="officeadd" id="textarea" cols="20" rows="2"></textarea></td>
        </tr>
        <tr>
          <td><label for="textfield15">City Name:</label></td>
          <td><input type="text" name="cityname" id="textfield15" /></td>
          <td>City:</td>
          <td><input type="text" name="ocity" id="textfield9" /></td>
        </tr>
        <tr>
          <td>State:</td>
          <td>
               <select name="state" style="width:150px">
<option>--Select State--</option>
<option>Andaman and Nicobar Islands</option>
<option>Andhra Pradesh</option>
<option>Arunachal Pradesh</option>
<option>Assam</option>
<option>Bihar</option>
<option>Chandigarh</option>
<option>Chhattisgarh</option>
<option>Dadra and Nagar Haveli</option>
<option>Daman and Diu</option>
<option>Delhi</option>
<option>Goa</option>
<option>Gujarat</option>
<option>Haryana</option>
<option>Himachal Pradesh</option>
<option>Jammu and Kashmir</option>
<option>Jharkhand</option>
<option>Karnataka</option>
<option>Kerala</option>
<option>Lakshadweep</option>
<option>Madhya Pradesh</option>
<option>Maharashtra</option>
<option>Manipur</option>
<option>Meghalaya</option>
<option>Mizoram</option>
<option>Nagaland</option>
<option>Orissa</option>
<option>Pondicherry</option>
<option>Punjab</option>
<option>Rajasthan</option>
<option>Sikkim</option>
<option>Tamil Nadu</option>
<option>Tripura</option>
<option>Uttaranchal</option>
<option>Uttar Pradesh</option>
<option>West Bengal</option>
</select>
          <td>State:</td>
          <td>
          <select name="ostate" style="width:150px">
<option>--Select State--</option>
<option>Andaman and Nicobar Islands</option>
<option>Andhra Pradesh</option>
<option>Arunachal Pradesh</option>
<option>Assam</option>
<option>Bihar</option>
<option>Chandigarh</option>
<option>Chhattisgarh</option>
<option>Dadra and Nagar Haveli</option>
<option>Daman and Diu</option>
<option>Delhi</option>
<option>Goa</option>
<option>Gujarat</option>
<option>Haryana</option>
<option>Himachal Pradesh</option>
<option>Jammu and Kashmir</option>
<option>Jharkhand</option>
<option>Karnataka</option>
<option>Kerala</option>
<option>Lakshadweep</option>
<option>Madhya Pradesh</option>
<option>Maharashtra</option>
<option>Manipur</option>
<option>Meghalaya</option>
<option>Mizoram</option>
<option>Nagaland</option>
<option>Orissa</option>
<option>Pondicherry</option>
<option>Punjab</option>
<option>Rajasthan</option>
<option>Sikkim</option>
<option>Tamil Nadu</option>
<option>Tripura</option>
<option>Uttaranchal</option>
<option>Uttar Pradesh</option>
<option>West Bengal</option>
</select>          </tr>
        <tr>
          <td>Pin No:</td>
          <td><input type="text" name="pin" id="textfield18" /></td>
          <td>Pin :</td>
          <td><input type="text" name="opin" id="textfield13" /></td>
        </tr>
        <tr>
          <td>Mobile Number:</td>
          <td><input type="text" name="mobile" id="textfield12"  /></td>
          <td>Landline Number:</td>
          <td><input type="text" name="olandline" id="textfield21" /></td>
        </tr>
        <tr>
          <td>Contact Person:</td>
          <td><input type="text" name="contactperson" id="textfield20" /></td>
          <td>Email:</td>
          <td><input type="email" name="email" id="email2" /></td>
        </tr>
		  </table></td>
        </tr>
        
        <tr>
          <td colspan="4" bgcolor="#14C4B6"><h4>Taxation Details</h4></td>
        </tr>
		
		<tr>  <td  bgcolor = "yellow" colspan = "4" align = "center"> GSTIN : <input type="text" name="gstin" id="gstin" /> 
		Aadhar : <input type="text" name="aadhar" id="aadhar" /> 

 STATE TYPE :  <select name="statetype" style="width:150px">
<option value ="0">OUT STATE</option>
<option value ="1">IN STATE</option>
</select>

 </td>		</tr>
        <tr>
		
		
          <td width="132">Income Tax Number:</td>
          <td width="171"><input type="text" name="incometaxno" id="textfield14" /></td>
          <td width="205"><label for="textfield4">Service Tax Number:</label></td>
          <td width="195"><input type="text" name="servicetaxno" id="textfield16" /></td>
        </tr>
        <tr>
          <td><b>Tin/Pan Number:<b/></td>
          <td><input type="text" name="tinno" id="textfield19" /></td>
          <td>Central Exice Number</td>
          <td><input type="text" name="centralenumber"  />&nbsp;</td>
        </tr>
        <tr>
          <td>CST Number</td>
          <td><input type="text" name="cstnumber" />&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td  colspan="4" bgcolor="#14C4B6"><h4>Account Details</h4></td>
        </tr>
        <tr>
          <td>Bank Account Name:</td>
          <td><input type="text" name="bankaccname" id="textfield" /></td>
          <td>Type of Account</td>
          <td><input type="text" name="acctype" id="textfield8" />&nbsp;</td>
        </tr>
        <tr>
          <td>Account Number:</td>
          <td><input type="text" name="accountno" id="textfield2" /></td>
          <td>IFSC Code</td>
          <td><input type="text" name="ifsccode" id="textfield7" />&nbsp;</td>
        </tr>
		<tr>
          <td>Brokerage Rate:</td>
          <td><input type="text" name="brokeragerate" /></td>
          <td>Quantity</td>
          <td><input type="text" name="bQuantity"/>&nbsp;</td>
        </tr>

                 
				  
				  
				   <tr>
          <td colspan="4" bgcolor="#14C4B6"><h4>Accounting Ledger Creation</h4></td>
        </tr>
         <tr>
            <td>Opening Balance</td>
                    <td><label for="textfield3"></label>
                      <input type="text" name="obalance"  value  ="0" id="textfield3" />
                      <label for="fileField"></label></td>
			 <td>Accounting Group:</td>
            <td>
              <select name="acgroup" onchange = "hledger1(this)" style="width:170px">
                       <option value = "14">Sundry Debtors</option>
					   
					  
					   
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
                    <td>Type Of Balance</td>
                    <td>
                      <select name="tbalance" id="select" style="width:170px">
                          <option>DR</option>
                       <option>CR</option>
                      </select></td>
                                     					
                  <td>Open Date:</td>
                    <td><input id="saudadate"  onchange = "isDate(this.value)"   name = "saudadate" value = "<?php echo $t_date ?>"  type = "text"  size="17" required="required" />
          <a href="javascript:NewCal('saudadate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
		  
					
					
                  </tr>
         
       
				  
				  
        
      </tbody>
    </table>

</div>

 </form>
 
</body>
</html>

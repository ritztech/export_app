<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }

error_reporting(0); 

$fid=$_SESSION['fid'];
$did = $_GET['legid'];
?>
<?php include('../conf.php');?>
<?php 

if(isset($_POST['s'])) {

$broker = 0;
$transporter = 0;
$party = 0;

if(isset($_POST['broker']) ) 
{
   $broker = trim(strip_tags(addslashes($_POST['broker'])));
}

if(isset($_POST['transporter']) ) 
{
   $transporter = trim(strip_tags(addslashes($_POST['transporter'])));
}


if(isset($_POST['party']) ) 
{
   $party = trim(strip_tags(addslashes($_POST['party'])));
}


	
$off_state = trim(strip_tags(addslashes(strtoupper($_POST['off_state']))));
$fact_state = trim(strip_tags(addslashes(strtoupper($_POST['fact_state']))));

$tbalance = trim(strip_tags(addslashes(strtoupper($_POST['tbalance']))));


$accgrpid = trim(strip_tags(addslashes(strtoupper($_POST['accgrpid']))));
$accgruoup = trim(strip_tags(addslashes(strtoupper($_POST['accgruoup']))));	





		
			

$cityname = trim(strip_tags(addslashes(strtoupper($_POST['cityname']))));
$suppliername = trim(strip_tags(addslashes(strtoupper($_POST['suppliername']))));
$factoryadd = trim(strip_tags(addslashes(strtoupper($_POST['factoryadd']))));
$obalance = trim(strip_tags(addslashes(strtoupper($_POST['obalance']))));

$incometaxno = trim(strip_tags(addslashes(strtoupper($_POST['incometaxno']))));
$servicetaxno = trim(strip_tags(addslashes(strtoupper($_POST['servicetaxno']))));
$tinno = trim(strip_tags(addslashes(strtoupper($_POST['tinno']))));
$cstnumber = trim(strip_tags(addslashes(strtoupper($_POST['cstnumber']))));

$centralenumber = trim(strip_tags(addslashes(strtoupper($_POST['centralenumber']))));

$saudadate1 = $_POST['saudadate'];



$officeadd = trim(strip_tags(addslashes(strtoupper($_POST['officeadd']))));
$ocity = trim(strip_tags(addslashes(strtoupper($_POST['ocity']))));
$pin = trim(strip_tags(addslashes(strtoupper($_POST['pin']))));
$opin = trim(strip_tags(addslashes(strtoupper($_POST['opin']))));

$mobile = trim(strip_tags(addslashes(strtoupper($_POST['mobile']))));


$olandline = trim(strip_tags(addslashes(strtoupper($_POST['olandline']))));
$contactperson = trim(strip_tags(addslashes(strtoupper($_POST['contactperson']))));
$email = trim(strip_tags(addslashes(strtoupper($_POST['email']))));

$bankaccname = trim(strip_tags(addslashes(strtoupper($_POST['bankaccname']))));
$acctype = trim(strip_tags(addslashes(strtoupper($_POST['acctype']))));
$accountno = trim(strip_tags(addslashes(strtoupper($_POST['accountno']))));
$ifsccode = trim(strip_tags(addslashes(strtoupper($_POST['ifsccode']))));
$brokeragerate = trim(strip_tags(addslashes(strtoupper($_POST['brokeragerate']))));
$bQuantity = trim(strip_tags(addslashes(strtoupper($_POST['bQuantity']))));
$gstin = trim(strip_tags(addslashes(strtoupper($_POST['gstin']))));

$aadhar = trim(strip_tags(addslashes(strtoupper($_POST['aadhar']))));

$statetype = $_POST['statetype'];






$query = "update ledger_master   set 
leg_name = '$suppliername',
fact_city = '$cityname',
o_bal = '$obalance',
fac_addr = '$factoryadd',off_addr = '$officeadd',
fact_city = '$cityname',
off_city = '$ocity',
f_pin= '$pin',  
o_pin= '$opin',
 o_con= '$olandline', 
f_contact= '$mobile',
 off_email= '$email', 
 inctaxnum= '$incometaxno',
 servicetaxno= '$servicetaxno',
 tinno= '$tinno', 
 centralno= '$centralenumber', 
 cstno= '$cstnumber',
 o_date = STR_TO_DATE('$saudadate1','%d/%m/%Y'),
 bankname='$bankaccname',
 bank_type='$acctype',
 bank_number='$accountno',
 ifsc_code='$ifsccode',
 brokerage='$brokeragerate',
 brok_qty = '$bQuantity',
 broker = $broker,
 transported = $transporter,
 party = $party,
 fact_state = '$fact_state',
 off_state = '$off_state',
 dr_cr = '$tbalance',
 acc_name = '$accgruoup',
 acc_id = $accgrpid,
 firmcontact = '$contactperson',
 gstin = '$gstin',
 aadhar = '$aadhar',
 statetype = '$statetype'
where legid = $did";




	mysql_query($query);
//	echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }

     echo "<script>alert('Data updated successfully.');location.href='transportname_view.php'</script>"; 
}
?>
<?php
try {
	
	

	
$query = "SELECT `leg_name`, `fac_addr`, `off_addr`, `fact_city`, `off_city`, `fact_state`, `off_state`, `f_pin`, `o_pin`, `o_con`, 
`f_contact`, `off_email`, `inctaxnum`, `servicetaxno`, `tinno`, `centralno`, `cstno`, DATE_FORMAT(o_date,'%d/%m/%Y')  as o_date , 
`o_bal`, `acc_grp`, `dr_cr`, `broker`, `transported`, `party`, `legid`,firmcontact, `bankname`, `bank_type`, `bank_number`, `ifsc_code`, `brokerage`,
 `brok_qty`, `acc_name`, `acc_id` ,gstin,aadhar ,statetype  from  ledger_master  WHERE legid =?";

$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['legid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);

$sttype_z =  $row['statetype'];

if($sttype_z == "0") { $state_name = "OUT STATE";}
if($sttype_z == "1") { $state_name = "IN STATE";}





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

function phappycode12(thelist,l_value){

	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
  
  document.form1.accgruoup.value = content;
  document.form1.accgrpid.value = l_value;
  
  


 

}

</script>

</head>
<body>

<?php include('../include/sidemenu.php');?>

<div align="center">
  <h2 align="center"><span style="color:#F17327;">Update LEDGER Details</span></h2>
<form id="form1" name="form1" method="post" action="">
  
  <div>
  

    <input type="submit" name="s" value="Save Record" />
	
	

	
	
	  <table border = 1 style="border-collapse:collapse; border-color:red;">
  
  <tr>  <td align = "center"> CHOOSE LEDGER TYPE </td> </tr>
   <tr>  <td> <input type="checkbox" name="broker" value="1" <?php echo ($row['broker'] == 1) ? 'checked="checked"' : ''; ?>/> <span style="font-size:16px;">Broker</span> 
  <input type="checkbox" name="transporter" value="1" <?php echo ($row['transported'] == 1) ? 'checked="checked"' : ''; ?>/> <span style="font-size:16px;">Transporter</span>  
 <input type="checkbox" name="party" value="1" <?php echo ($row['party'] == 1) ? 'checked="checked"' : ''; ?>/> <span style="font-size:16px;">Trading account</span>  </td> </tr>

  
  </table>
   


</div>



  
  
    <table border="1"  cellpadding="2" style="font-size:12px; border-collapse:collapse;">
      <tbody>
        <tr>
          <td  colspan="4" bgcolor="#14C4B6"><h4>Basic Details</h4></td>
		   
        </tr>
        <tr>
          <td align="right"><b>Name:</b></td>
          <td colspan="3"><input type="text" name="suppliername" style="border:double;" value = "<?php echo $row['leg_name']  ?>"   autofocus size = "55" id="textfield11" required="required" /></td>
		   
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
            <textarea name="factoryadd"     cols="20" rows="2"> <?php echo $row['fac_addr'] ?> </textarea>
          </p></td>
          <td width="19%">Billing Address:</td>
          <td width="38%">&nbsp;
          <textarea name="officeadd"     id="textarea" cols="20" rows="2"><?php echo $row['off_addr']  ?> </textarea></td>
        </tr>
        <tr>
          <td><label for="textfield15">City Name:</label></td>
          <td><input type="text" name="cityname" value = "<?php echo $row['fact_city']  ?>"  id="textfield15" /></td>
          <td>City:</td>
          <td><input type="text" name="ocity" value = "<?php echo $row['off_city']  ?>"   id="textfield9" /></td>
        </tr>
        <tr>
          <td>State:</td>
          <td> <input type="text" name="fact_state"  readonly value = "<?php echo $row['fact_state']  ?>"   id="textfield9" /> 
               <select name="statefact" onchange = "document.form1.fact_state.value = this.value"   style="width:150px">
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
          <td><input type="text" name="off_state"  readonly value = "<?php echo $row['off_state']  ?>"   id="textfield9" /> 
          <select name="ostateofff"   onchange = "document.form1.off_state.value = this.value" style="width:150px">
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
          <td><input type="text" name="pin"   value = "<?php echo $row['f_pin']  ?>"  id="textfield18" /></td>
          <td>Pin :</td>
          <td><input type="text" name="opin" value = "<?php echo $row['o_pin']  ?>"   id="textfield13" /></td>
        </tr>
        <tr>
          <td>Mobile Number:</td>
          <td><input type="text" name="mobile" value = "<?php echo $row['f_contact']  ?>"  id="textfield12"  /></td>
          <td>Landline Number:</td>
          <td><input type="text" name="olandline"  value = "<?php echo $row['o_con']  ?>" id="textfield21" /></td>
        </tr>
        <tr>
          <td>Contact Person:</td>
          <td><input type="text" name="contactperson" id="textfield20" value = "<?php echo $row['firmcontact']  ?>"   /></td>
          <td>Email:</td>
          <td><input type="email" name="email"  value = "<?php echo $row['off_email'] ?>"  id="email2" /></td>
        </tr>
		  </table></td>   
        </tr>
        
        <tr>
          <td colspan="4" bgcolor="#14C4B6"><h4>Taxation Details</h4></td>
        </tr>
		
				<tr>  <td  bgcolor = "yellow" colspan = "4" align = "center"> GSTIN : <input type="text" name="gstin" id="gstin"  value = "<?php echo $row['gstin'] ?>"  />  
				AADHAR : <input type="text" name="aadhar" id="aadhar"  value = "<?php echo $row['aadhar'] ?>"  /> 

 STATE TYPE :  <select name="statetype" style="width:150px">
<option ="<?php echo $sttype_z  ?>"><?php   echo $state_name  ?></option> 
 
<option value ="0">OUT STATE</option>
<option value ="1">IN STATE</option>
</select>

 </td>				</tr>
				
        <tr>
		
		
		
		
		
		
		
          <td width="132">Income Tax Number:</td>
          <td width="171"><input type="text" name="incometaxno"  value = "<?php echo $row['inctaxnum'] ?>"   id="textfield14" /></td>
          <td width="205"><label for="textfield4">Service Tax Number:</label></td>
          <td width="195"><input type="text" name="servicetaxno" value = "<?php echo $row['servicetaxno'] ?>"   id="textfield16" /></td>
        </tr>
        <tr>
          <td><b>Tin/PAN Number:</b> </td>
          <td><input type="text" name="tinno"  value = "<?php echo $row['tinno'] ?>"  id="textfield19" /></td>
          <td>Central Exice Number</td>
          <td><input type="text" name="centralenumber"  value = "<?php echo $row['centralno'] ?>"  />&nbsp;</td>
        </tr>
        <tr>
          <td>CST Number</td>
          <td><input type="text" name="cstnumber" value = "<?php echo $row['cstno'] ?>"   />&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td  colspan="4" bgcolor="#14C4B6"><h4>Account Details</h4></td>
        </tr>
        <tr>
          <td>Bank Account Name:</td>
          <td><input type="text" name="bankaccname"  value = "<?php echo $row['bankname'] ?>"   id="textfield" /></td>
          <td>Type of Account</td>
          <td><input type="text" name="acctype"  value = "<?php echo $row['bank_type'] ?>"  id="textfield8" />&nbsp;</td>
        </tr>
        <tr>
          <td>Account Number:</td>
          <td><input type="text" name="accountno"  value = "<?php echo $row['bank_number'] ?>" id="textfield2" /></td>
          <td>IFSC Code</td>
          <td><input type="text" name="ifsccode" value = "<?php echo $row['ifsc_code'] ?>" id="textfield7" />&nbsp;</td>
        </tr>
		<tr>
          <td>Brokerage Rate:</td>
          <td><input type="text" name="brokeragerate"  value = "<?php echo $row['brokerage'] ?>" /></td>
          <td>Quantity</td>
          <td><input type="text" name="bQuantity"   value = "<?php echo $row['brok_qty'] ?>" />&nbsp;</td>
        </tr>

                 
				            
				  
				   <tr>
          <td colspan="4" bgcolor="#14C4B6"><h4>Accounting Ledger Creation</h4></td>
        </tr>
         <tr>
            <td>Opening Balance</td>
                    <td><label for="textfield3"></label>
                      <input type="text" name="obalance" value = "<?php echo $row['o_bal'] ?>"  id="textfield3" />
                      <label for="fileField"></label></td>
			 <td>Accounting Group:</td>   
            <td>   <input type="text" name="accgruoup" value = "<?php echo $row['acc_name'] ?>" /> 
             Chnage :  <select name="acgroup" onchange = "phappycode12(this,this.value)" style="width:110px">
                       <option value = "0">Select Accounting Group</option>
                       <?php               
				$query = mysql_query("SELECT * FROM bank_master");
				while($row1 = mysql_fetch_array($query)){
					
					$bankname = $row1['bankname'];
		            $bankid = $row1['bankid'];
			
	           echo"<option  value = $bankid>$bankname</option>"; 
                       } ?>
                     
          </select>   <input type="hidden" name="bankid" id="bankid"  />   </td>
			
          </tr>

           <tr>
                    <td>Type Of Balance</td>
                    <td> <input type="text" name="tbalance"  value = "<?php  echo  $row['dr_cr']  ?>" id="bankid"  /> 
                      Change <select name="tbalance11" id="select"   onchange = "document.form1.tbalance.value = this.value"   style="width:110px">
                       <option value = "0"></option>
                      <option>Dr</option>
                       <option>Cr</option>
                      </select></td>
					  
		                                    					
                  <td>Open Date:</td>     <td><input  type = "text" name = "saudadate"    value = "<?php   echo $row['o_date']; ?>" />
          <a href="javascript:NewCal('saudadate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>

		  
					
					
                  </tr>
         
       
				  
				  
        
      </tbody>
    </table>

</div>

 <input type="hidden" name="accgrpid" value = "<?php echo $row['acc_id'] ?>" /> 

 </form>
 
</body>

</html>

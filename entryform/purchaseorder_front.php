<?php

include("../conf.php");

?>
<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }
$fid=$_SESSION['fid'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="..//style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/a4code.js">  </script>

<script language="javascript" type="text/javascript" >
 function getbrokername(thelist) {
function ValidateForm(){

    var dt=document.form1.suppliername
	    if (dt.value=="0"){
	           dt.focus()
              return false
    }
	
	    var dt=document.form1.deleveryduedate
	    if (isDate(dt.value)==false){
	           dt.focus()
              return false
    }
	
	
		    var dt=document.form1.item2.value;
			
			
	    if (dt=="Select stock item"){
		 alert('Please Select stock item');
              return false
    }
	
	
	return true 
 
}





</script>




	




</head>
<body>
<?php include('../include/sidemenu.php');?>
<div align="center">
  <h2 align="center"><span style="color:#F17327;">Purchase order creation form</span>    </h2>
  <form id="form1" name="form1" method="post"  onSubmit="return ValidateForm()"  action="purchaseorder_back.php"  >
  <table border="1" width = "50%"align="center" cellpadding="0" frame="box" rules="none">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Basic Details</h4></td>
        </tr>
        <tr>
          <td width="132" height="41"><label for="select">Buyer/Seller Name:</label>      </td>  <td>        <div id="holder"> 

          <td width="170"><label for="select2">Broker Name:</label></td>
          <td width="436"><select name="brokername"  onchange = "getbrokername(this)" style="width:170px">
                       <option value = "0"> </option>
                       <?php               
				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and broker =1");
				while($row = mysql_fetch_array($query)){
					$brid = $row['legid'];
					$brokername = $row['leg_name'];
			?>
                       <option value = "<?php echo $brid; ?>" ><?php echo $brokername; ?></option>
                       <?php } ?>
                     
          </select></td>
        </tr>
        <tr>
          <td>Sauda Date:</td>
          <td><input id="saudadate"   name = "saudadate"  onchange = "isDate(this.value)" type = "text"  size="17"  value="DD/MM/YYYY" />  <a href="javascript:NewCal('saudadate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>

		
		 <td colspan="4">


 <INPUT type="button" value="ADD ITEM" onclick="addRow('dataTable',<?php echo $fid; ?>);" />
 
 <table width="982" border='1' cellpadding='1'   id="dataTable" style="border-collapse:collapse;"   >

  <tr>
   <th>TOTAL</th> 
   <th> <input  type = "text"  size = "3" name = "totbag"   value = "0" id = "totbag" /> </th>
   <th> <input  type = "text"  size = "5" name = "totgrsweight" id = "totgrsweight" /> </th>
   <th> <input  type = "text"  size = "5" name = "totmandi" id = "totmandi" />  </th> 
   <th> <input  type = "text"  size = "5" name = "totbilwght" id = "totbilwght" />     </th>
   <th> <input  type = "text"  size = "5" name = "totrot" id = "totrot" />  </th>	
   <th> <input  type = "text"  size = "5" name = "totrog" id = "totrog" />  </th>
   <th> <input  type = "text"  size = "5" name = "totvalue" id = "totvalue" />  </th> 
   <th> <input  type = "text"  size = "5" name = "totvto" id = "totvto" />  </th>
    <th> <input  type = "text"  size = "5" name = "totbillv" id = "totbillv" />  </th>
</tr>

<tr>
 

  <th>ITEM NAME</th> <th>BAG</th>  <th>Weight Per Bag in KG</th> <th>GROSS WEIGHT</th> <th> MANDI GATE PASS WT </th> <th>  BILLING WEIGHT </th>	<th> VAT(in %) </th>	<th> RATE OF GOODS </th>	<th>VALUE </th>	<th>VAT TAX</th>	<th>BILL VALUE</th> <th>REMARK</th>
  </tr>
</table> 


<input  type = "hidden"  size = "5" name = "totalcnt" id = "totalcnt" /> 

 <script>
window.onload=addRow('dataTable',<?php echo $fid; ?>) ; 
</script>


&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Quality Norms</h4></td>
        </tr>
       
      
        
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Tax Form Condition</h4></td>
        </tr>
       
       
        <tr>
          <td>&nbsp;</td>
          <td align="right">
 <td>  <?php  if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" ) { ?>
<input type="submit" name="s" id="submit" value="Submit Record" />
<?php  } ?> </td>
 
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
</form>
  &nbsp;
</div>
</body>
</html>
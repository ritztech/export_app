<?php

include("../conf.php");
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }
$fid=$_SESSION['fid'];

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Ritz</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="..//style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/a4code.js">  </script>


<script language="javascript" type="text/javascript" >


function ValidateForm(){
	var dt=document.form1.suppliername;	    if (dt.value=="0"){		 alert('Select buyer name ...');		  dt.focus()              return false    }				var dt=document.form1.brokername;	    if (dt.value=="0"){		 alert('Select broker name ...');		  dt.focus()              return false    }	
    var dt=document.form1.saudadate
	    if (isDate(dt.value)==false){
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
		 alert('Please Select stock item');		  document.form1.item2.focus();
              return false
    }
	
	
	return true 
 
}function phappycode2(thelist){	var idx = thelist.selectedIndex;	var content = thelist.options[idx].innerHTML;document.form1.brk1.value = content;  }

</script>


</head>
<body>

<?php include('../include/sidemenu.php');?>

<div align="center"><br>
  <h2 align="center"><span style="color:#F17327;">Sales order creation form</span>    </h2>
  <form id="form1" name="form1" method="post"  onSubmit="return ValidateForm()"  action="salesorder_back.php">
  <table width="749" border="1" rules="none" frame="box" cellpadding="1">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Basic Details</h4></td>
        </tr>
        <tr>
          <td>Buyer Name:</td>
          <td><select name="suppliername" required = "required" >
            <option value = "0"> </option>
            <?php               
				$query = mysql_query("SELECT legid,concat(leg_name,'-',off_city,'-',fact_state) as suppliername  FROM ledger_master where fid=$fid");
				while($row = mysql_fetch_array($query)){
					$supid = $row['legid'];
					$suppliername = $row['suppliername'];
			?>
            <option value="<?php echo $supid?>"><?php echo $suppliername; ?></option>
            <?php } ?>
          </select></td>
          <td>Broker Name:</td>
          <td><select name="brokername" onchange="phappycode2(this)"  required = "required" >
            <option value = "0"> </option>
            <?php               
				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and broker =1");
				while($row = mysql_fetch_array($query)){
					$brid = $row['legid'];
					$brokername = $row['leg_name'];
			?>
            <option   value = "<?php echo $brid; ?>"> <?php echo $brokername; ?></option>
            <?php } ?>
          </select></td>
        </tr>
        <tr>
          <td width="160">Sauda Date:</td>
          <td width="285"><input id="saudadate"   name = "saudadate"  onchange = "isDate(this.value)"  type = "text"  size="17"  required="required" />  <a href="javascript:NewCal('saudadate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>&nbsp;</td>
          <td width="181">&nbsp;</td>
          <td width="308">&nbsp;</td>
        </tr>
        <tr>
<td colspan="4">




 <INPUT type="button" value="ADD ITEM" onclick="addRow('dataTable',<?php echo $fid; ?>);" />
 
 <table width="982" border='1' cellpadding='1'   id="dataTable"   >

  <tr>
   <th>TOTAL</th> 
   <th> <input  type = "text"  size = "3" name = "totbag" id = "totbag" /> </th>   <th>  </th>   
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
 

  <th>ITEM NAME</th> <th>BAG</th>   <th>Weight Per Bag in KG</th> <th>GROSS WEIGHT</th> <th> MANDI GATE PASS WT </th> <th>  BILLING WEIGHT </th>	<th> VAT(in %) </th>	<th> RATE OF GOODS </th>	<th>VALUE </th>	<th>VAT TAX</th>	<th>BILL VALUE</th> <th>REMARK</th>
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
          <td><label for="textfield">Moisture%:</label></td>
          <td><input type="text" name="moisture"/></td>
          <td><label for="textfield2">Dust(Sand)%:</label></td>
          <td><input type="text" name="dust" id="textfield2" /></td>
        </tr>
        <tr>
          <td><label for="textfield3">Small Seed%:</label></td>
          <td><input type="text" name="smallseed" id="textfield3" /></td>
          <td><label for="textfield4">Split Seed%:</label></td>
          <td><input type="text" name="splitseed" id="textfield4" /></td>
        </tr>
        <tr>
          <td><label for="textfield5">Oil%:</label></td>
          <td><input type="text" name="oil" id="textfield5" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="textfield6">Quantity:</label></td>
          <td><p>
            <input type="text" name="quantity" id="textfield6" required="required" />
          </p></td>

          <td>Bag:</td>
          <td><input type="text" name="bag" id="textfield7" /></td>
        </tr>
        <tr>
          <td>Packing Term:</td>
          <td><input type="text" name="packingterms" id="textfield8" /></td>
          <td>Bag Quality:</td>
          <td><input type="text" name="bagquality" id="textfield9" /></td>
        </tr>
        <tr>
          <td>Rate/Qty:</td>
          <td><input type="text" name="rate" id="textfield10" required="required" /></td>
          <td><label for="textfield11">Delivery Due Date:</label></td>
        <td><input id="dstart"   name = "deleveryduedate"  onchange = "isDate(this.value)"  type = "text"  size="17"  value="DD/MM/YYYY" />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>        </tr>
        <tr>
          <td>Payment Terms:</td>
          <td><input type="text" name="paymentterms" id="textfield12" /></td>
          <td>Cash Discount Conditions:</td>
          <td><input type="text" name="cashdcond" id="textfield14" /></td>
        </tr>
        <tr>
          <td>Mode Of Supply:</td>
          <td><input type="text" name="modeofsupply" id="textfield13" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Tax Form Condition</h4></td>
        </tr>
        <tr>
          <td><label for="select4">Sales Tax:</label></td>
          <td><select name="stfcondition" style="width:150px">
                       <option value = "0"> </option>
                       <?php               
				$query = mysql_query("SELECT * FROM taxform ");
				while($row = mysql_fetch_array($query)){
					$taxid = $row['taxid'];
					$salestaxform = $row['salestaxform'];
					$entrytaxform = $row['entrytaxform'];
					$manditaxform = $row['manditaxform'];
			?>
                       <option  value = <?php echo $taxid; ?> ><?php echo $salestaxform; ?></option>
                       <?php } ?>
                     
          </select></td>
          <td>Entry Tax:</td>
          <td><select name="etfcondition" style="width:150px" >
          <option value = "0"> </option>
         <?php               
				$query = mysql_query("SELECT * FROM taxform ");
				while($row = mysql_fetch_array($query)){
					$taxid = $row['taxid'];
					
					$entrytaxform = $row['entrytaxform'];
					
			?>
        <option  value = <?php echo $taxid; ?> ><?php echo $entrytaxform; ?></option>
                       <?php } ?>
                     
          </select></td>
        </tr>
        <tr>
          <td>Mandi Tax:</td>
          <td><select name="mtfcondition" style="width:150px">
            <option value = "0" > </option>
            <?php               
				$query = mysql_query("SELECT * FROM taxform ");
				while($row = mysql_fetch_array($query)){
					$taxid = $row['taxid'];
					
					$manditaxform = $row['manditaxform'];
					
			?>
           <option  value = <?php echo $taxid; ?> ><?php echo $manditaxform; ?></option>
            <?php } ?>
          </select></td>
          <td>Sauda Short:</td>
          <td><input type="text" name="saudashort" /></td>
        </tr>
        <tr>
          <td>Loaded Pending Finally:</td>
          <td>&nbsp;<input type="text" name="loadedfinal" /></td>
          <td>&nbsp;</td>
          <td>          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td><br>
          <td><input type="submit" name="s" id="submit" value="Submit Record" /></td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>		<input type="hidden"  value = "None" name="brk1" />
  </form>
   
</div>

</body>
</html>

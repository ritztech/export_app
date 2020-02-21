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
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>
<script type="text/javascript">



function hledger(thelist,theinput) {
	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
  
  document.form1.ledgername_n.value = content;
  
		
}





function sum() 
{ 
    var so = document.getElementById('stockopening').value; 
    var sg = document.getElementById('stockgatepass').value; 
    var result = parseInt(so) - parseInt(sg); 
    if(so=="" ||sg=="") 
    { 
        document.getElementById('balance').value = 0; 
    }
    if (!isNaN(result)) 
    { 
        document.getElementById('balance').value = result;
    }
} 



function ValidateForm(){

    var dt=document.form1.applicationdate
	    if (isDate(dt.value)==false){
	           dt.focus()
              return false
    }
	
		var dt=document.form1.suppliername;
	    if (dt.value=="0"){

		 alert('Select party name ...');

		  dt.focus()


              return false


    }
	

	var dt=document.form1.stockitem;
	    if (dt.value=="0"){

		 alert('Select stock name ...');

		  dt.focus()


              return false


    }
	
	
	
	return true 
	}
	
	
	


</script>
</head>
<body>
<?php include('../include/header.php');?>
<?php include('../include/sidemenu.php');?>

<div align="center"><br>
<div id = "griddiv">
  <h2 align="center"><span style="color:#F17327;">mandi form 10 application form</span>    </h2>
  <form id="form1" name="form1" method="post"  onSubmit="return ValidateForm()"  action="a11mandiform10_back.php">
  <table width="680" border="1" cellpadding="6" frame="box" rules="none">
      <tbody>
        <tr>
          <td colspan="2"  bgcolor="#14C4B6"><h4>Application Details</h4></td>
		  <td colspan="2"  bgcolor="#14C4B6"><h4>Stock Position</h4></td>
        </tr>
        
        
        <tr>
          <td>Application date</td>
          <td><input type="text" name="applicationdate"    onchange = "isDate(this.value)" id="a2" size="17" /> <a href="javascript:NewCal('a2','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
          <td>Opening Position:</td>
          <td><input type="text" name="stockopening" id="stockopening" onkeyup="sum()"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Issue Gate Pass Qty:</td>
          <td><input type="text" name="stockgatepass" id="stockgatepass" onkeyup="sum()"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Balance:</td>
          <td><input name="balance" type="text" id="balance" readonly="readonly" />&nbsp;</td>
        </tr>
        <tr>
          <td>Party Name:</td>
          <td><select name="suppliername"   onChange="hledger(this,this.value)"   style="width:150px">
            <option value = "0"> </option>
            <?php               
				$query = mysql_query("SELECT legid,concat(leg_name,'-',off_city,'-',fact_state) as suppliername  FROM ledger_master where fid=$fid");
				while($row = mysql_fetch_array($query)){
					$supid = $row['legid'];
					$suppliername = $row['suppliername'];
		 echo"<option  value = $supid>$suppliername</option>";
		          
									 
				
            } ?>
          </select>     <input type="hidden" name="ledgername_n" id="ledgername_n"  />    </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Stock Item:</td>
          <td width="185"><select name="stockitem" style="width:150px">
            <option value = "0"> </option>
            <?php               
				$query = mysql_query("SELECT * FROM stockitem where fid='$fid'");
				while($row = mysql_fetch_array($query)){
					$stockid = $row['stockid'];
					$stockitem = $row['stockitem'];
			?>
            <option><?php echo $stockitem; ?></option>
            <?php } ?>
          </select></td>
          <td width="132">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Bags:</td>
          <td><input type="text" name="bag"/></td>
          <td>Gross Qty:</td>
          <td><input type="text" name="grossqty" id="textfield2" /></td>
        </tr>
        <tr>
          <td><label for="textfield">Net Qty:</label></td>
          <td><input type="text" name="netqty"/></td>
          <td><label for="textfield2">Value:</label></td>
          <td><input type="text" name="value" id="textfield5" /></td>
        </tr>
        
        <tr>
          <td>Transporter Name:</td>
          <td><select name="transportername" style="width:150px">
            <option value = "None"> </option>
            <?php               
				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and transported =1");
				while($row = mysql_fetch_array($query)){
					$trid = $row['legid'];
					$transportname = $row['leg_name'];
			?>
            <option><?php echo $transportname; ?></option>
            <?php } ?>
          </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Truck Number:</td>
          <td><p>
            <input type="text" name="truckno" id="textfield3" />
          </p></td>

          <td>Driver Name:</td>
          <td><input type="text" name="drivername" id="textfield4" /></td>
        </tr>
        <tr>
          <td>Mandi TaxReciept No:</td>
          <td colspan="3"><input type="text" name="mtaxrecieptno" id="textfield7" size="65" /></td>
        </tr>
        <tr>
          <td>Name Of Decelaration:</td>
          <td><input type="text" name="declaration" id="textfield8" /></td>
          <td>Status:</td>
          <td><select name="status" id="select" style="width:150px">
                      <option>Director</option>
                      <option>Manager</option>
                      <option>Partner</option>
                      <option>Proprietor</option>
                       </select></td>
        </tr>
        
              
        <tr>
          <td>&nbsp;</td>
          <td><input type="hidden" name="fid" id="textfield13" value="<?php echo $fid; ?>" />&nbsp;</td>
          <td></td>
          <td>&nbsp;</td>
        </tr>
    </table>
  <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
&nbsp;
</div>
<input type="submit" name="s" id="submit" value="Submit Record"  />
</form>
</div>

</body>
</html>

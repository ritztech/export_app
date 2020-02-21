<?php

include("../conf.php");

?>
<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }
$fid=$_SESSION['fid'];
?>
<?php
$query_dispMake="SELECT `legid`, `leg_name`FROM ledger_master where fid=$fid ";
$result_dispMake=mysql_query($query_dispMake);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="..//style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script language="javascript">


 function hledger(thelist) {
	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
  
  document.form1.ledgername_n.value = content;
  
		
}





function h456(thelist) {
	
  //  theinput = document.getElementById(theinput);
    var idx = thelist.selectedIndex;
	
	
    var content = thelist.options[idx].innerHTML;
	
	//alert(content);
  document.form1.suppliername.value = content;
		
}









function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		} 	
		return xmlhttp;
    }
	

function getDistrict(provinceId) {	



	var strURL="finda6.php?id="+provinceId;
	var req = getXMLHTTP();
	if (req) {
		req.onreadystatechange = function() 
		{
			if (req.readyState == 4) {
			// only if "OK"
				if (req.status == 200) {						
					document.getElementById('districtdiv').innerHTML=req.responseText;
					document.getElementById('communediv').innerHTML=req.responseText;					
				} else {
					alert("Problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
	}		
}



function h123(str)
{

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var fruits = xmlhttp.responseText;
	var arfruits = fruits.split(',');
	
 document.form1.suppliername.value = arfruits[0];

	
    }
  }
xmlhttp.open("GET","get_sales_a6_detail.php?q="+str,true);
xmlhttp.send();



}


function claimtotal()
{

document.form1.tclaim.value = Number(document.form1.claims.value) + Number(document.form1.shortage.value) + Number(document.form1.moisture.value) + Number(document.form1.sand.value) + Number(document.form1.oil.value) + Number(document.form1.kirda.value) + Number(document.form1.labour.value) + Number(document.form1.cashdcond.value) + Number(document.form1.brokerage.value) + Number(document.form1.postage.value) + Number(document.form1.bardanaclaims.value) +  Number(document.form1.bankcharges.value) + Number(document.form1.freight.value) + Number(document.form1.gatepass.value) + Number(document.form1.rated.value) + Number(document.form1.bankc.value) + Number(document.form1.other.value) 

document.form1.tpaid.value =    Number(document.form1.billvalue.value) - Number(document.form1.tclaim.value)
	
	
}


function ValidateForm(){
	    var dt=document.form1.saudadate
	    if (isDate(dt.value)==false){
	           dt.focus()
              return false
    }
	   var dt=document.form1.debit;
					
	    if (dt.value < 1){
		 alert('Please Select ledger name');
		 dt.focus()
              return false  }
	
	
		var dt=document.form1.province;
					
	    if (dt.value < 1){
		 alert('Please Select party name name');
		 dt.focus()
              return false  }
	
	
	return true
	}
	
	

</script>
</head>
<body>
<?php include('../include/header.php');?>
<?php include('../include/sidemenu.php');?>

<div align="center"><br>
  <h2 align="center"><span style="color:#F17327;">credit Note creation form</span>    </h2>
  <form id="form1" name="form1" method="post" onSubmit="return ValidateForm()" action="a10creditnote_back.php">
  <table border="1" rules="none" frame="box" cellpadding="1">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Select Supplier Details</h4></td>
        </tr>
		 <tr>
          <td>Transaction Date:
          </td><td><input id="saudadate"  onchange = "isDate(this.value)"  name = "tdate"   type = "text"  size="17" required="required" />
          <a href="javascript:NewCal('saudadate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
          <td>Debit Ledger: </td>
		  <td><select name="debit" onChange="hledger(this)"   style="width:170px">
                       <option> </option>
                       <?php               
				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and party =1");
				while($row = mysql_fetch_array($query)){
					$exid = $row['legid'];
					$expenseshead = $row['leg_name'];
			
                  echo"<option  value = $exid>$expenseshead</option>"; 
                        } ?>
                     
                     </select>                      </select>  <input type="hidden" name="ledgername_n" id="ledgername_n"  /> </td>
        </tr>
        <tr>
          <td width="128"><label for="select">Party Name:</label></td>
          <td colspan="2"><select  onChange="getDistrict(this.value),h456(this)"  name="province" id="province">
              <option   value="" selected="selected"> </option>
              <?php 

	while($query_data = mysql_fetch_array($result_dispMake)){
	 
	 echo"<option  value = {$query_data['legid']}>{$query_data['leg_name']}</option>"; 

	 }
	 ?> 
            </select></td>
         
          <td width="200">&nbsp;</td>
        </tr>
        <tr>
          <td height="40"><label for="select3">Sales Bill:</label></td>
          <td colspan="2"><div id="districtdiv">
                    	<select name="district" class="form-control" >
                        	<option>&larr; Select Purchase Bill &rarr;</option>
                    	</select>
                	</div></td>
          
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Bill No.:</td>
          <td><input type="text" required = "required"   name="billno"/></td>
          <td>Bill Value:</td>
          <td><input type="text" required = "required"  name="billvalue"/></td>
        </tr>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Basic Details</h4></td>
        </tr>
        <tr>
          <td>Party Name</td>
          <td colspan="2"><input type="text"  readonly name="suppliername" size="40"/>
          </td>
          
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Claims:</td>
          <td><input type="text"   onkeyup = "claimtotal()" name="claims"/></td>
          <td>Shortage:</td>
          <td><input type="text"  onkeyup = "claimtotal()" name="shortage"/></td>
        </tr>
        <tr>
          <td><label for="textfield">Moisture%:</label></td>
          <td><input type="text" onkeyup = "claimtotal()" name="moisture"/></td>
          <td><label for="textfield2">Dust(Sand)%:</label></td>
          <td><input type="text" onkeyup = "claimtotal()" name="sand" id="textfield2" /></td>
        </tr>
        <tr>
          <td><label for="textfield5">Oil%:</label></td>
          <td><input type="text" onkeyup = "claimtotal()" name="oil" id="textfield5" /></td>
          <td>Kirda:</td>
          <td><input type="text"  onkeyup = "claimtotal()" name="kirda" id="textfield" /></td>
        </tr>
        <tr>
          <td><label for="textfield6">Labour:</label></td>
          <td><p>
            <input type="text"  onkeyup = "claimtotal()" name="labour" id="textfield6" />
          </p></td>

          <td>Cash Discount</td>
          <td><input type="text" onkeyup = "claimtotal()" name="cashdcond" id="textfield3" /></td>
        </tr>
        <tr>
          <td>Brokerage:</td>
          <td><input type="text" onkeyup = "claimtotal()" name="brokerage" id="textfield4" /></td>
          <td>Postage:</td>
          <td><input type="text" onkeyup = "claimtotal()" name="postage" id="textfield7" /></td>
        </tr>
        <tr>
          <td height="38">Bardana Claims:</td>
          <td><input type="text" onkeyup = "claimtotal()" name="bardanaclaims" id="textfield8" /></td>
          <td>Bank Charges:</td>
          <td><input type="text" onkeyup = "claimtotal()" name="bankcharges" id="textfield9" /></td>
        </tr>
        <tr>
          <td>Freight:</td>
          <td><input type="text" onkeyup = "claimtotal()" name="freight" id="textfield10" /></td>
          <td>Gatepass:</td>
          <td><input type="text" onkeyup = "claimtotal()" name="gatepass" id="textfield14" /></td>
        </tr>
        <tr>
          <td>Rate Difference:</td>
          <td><input type="text" onkeyup = "claimtotal()" name="rated" id="textfield11" /></td>
          <td>Bank Commission:</td>
          <td><input type="text" onkeyup = "claimtotal()"  name="bankc" id="textfield15" /></td>
        </tr>
        <tr>
          <td height="38">Others:</td>
          <td><input type="text" onkeyup = "claimtotal()"  name="other" id="textfield12" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>   
		
         <tr>
          <td height="38">Total claim:</td>
          <td><input type="text" name="tclaim" id="tclaim" /></td>
          <td height="38">Total Paid:</td>
          <td><input type="text" name="tpaid" id="tpaid" /></td>
        </tr> 
		


		
        <tr>
          <td>&nbsp;</td>
          <td><input type="hidden" name="fid" id="textfield13" value="<?php echo $fid; ?>" />&nbsp;</td>
          <td><input type="submit" name="s" id="submit" value="Submit Record" /></td>
          <td>&nbsp;</td>
        </tr>
      
    </table>
 
</form>&nbsp;
</div>

</body>
</html>

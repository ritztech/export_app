<?php

include("../conf.php");

?>
<?php
session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

$fid=$_SESSION['fid'];
?>
<?php
$query_dispMake="SELECT legid as `supid`, concat(leg_name,'-',off_city,'-',fact_state) as suppliername  from ledger_master WHERE fid=$fid";
$result_dispMake=mysql_query($query_dispMake);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="..//style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/a4code.js">  </script>
<script language="javascript">

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
	var strURL="findDistrict.php?province="+provinceId;
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
	
	
 document.form1.poid.value = arfruits[0];
document.form1.suppliername.value = arfruits[1];
document.form1.brokername.value = arfruits[2];
document.form1.moisture.value = arfruits[3];
document.form1.dust.value = arfruits[4];
document.form1.smallseed.value = arfruits[5];
document.form1.splitseed.value = arfruits[6];
document.form1.oil.value = arfruits[7];
document.form1.quantity.value = arfruits[8];
document.form1.bag.value = arfruits[9];
document.form1.bagquality.value = arfruits[10];
document.form1.modeofsupply.value = arfruits[11];

	
    }
  }
xmlhttp.open("GET","get_purchase_order.php?q="+str,true);
xmlhttp.send();



}

</script>
<script type="text/javascript">

function phappycode1(idvalue){

document.form1.suppid.value = idvalue;
}




function phappycode2(thelist){


	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;

document.form1.brokername.value = content; 
 
}


function transport(thelist){


	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;

document.form1.transname.value = content; 
 
}





function h456(thelist, theinput) {
    theinput = document.getElementById(theinput);
    var idx = thelist.selectedIndex;
	
	
    var content = thelist.options[idx].innerHTML;
    document.form1.suppliername.value = content;
}


function ValidateForm(){


    var dt=document.form1.province

	    if (dt.value==0){
             alert("Please select ledger ... ");
	           dt.focus()

              return false

    }
	


    var dt=document.form1.dateofbillty
	    if (isDate(dt.value)==false){
	           dt.focus()
              return false
    }
	
	    var dt=document.form1.weightdate
	    if (isDate(dt.value)==false){
	           dt.focus()
              return false
    }
	
	
		var dt=document.form1.item2.value;
			
			
	    if (dt=="Select stock item"){
		 alert('Please Select stock item');
		 document.form1.item2.focus();
              return false
    }
	
	
	return true 
 
}




</script>
</head>
<body>

<?php include('../include/sidemenu.php');?>


<div align="center"><br>
  <h2 align="center"><span style="color:#F17327;">good reciepts note creation form</span>    </h2>
  <form id="form1" name="form1" method="post"   onSubmit="return ValidateForm()"  action="goodreciept_back.php">
  <table border="1" align="center" cellpadding="0" frame="box" rules="none">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Select Suplier</h4></td>
        </tr>
        <tr>
          <td colspan="2"><p>Supplier Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select  onChange="getDistrict(this.value),h456(this,suppliername),phappycode1(this.value)"  name="province" id="province" style="width:170px">
              <option   value="0"> </option>
              <?php 

	while($query_data = mysql_fetch_array($result_dispMake)){
	 
	 echo"<option  value = {$query_data['supid']}>{$query_data['suppliername']}</option>"; 

	 }
	 ?> 
            </select>
          </p></td>
          <td width="191">Select Open Order To Supplier</td>
          <td width="428">  <div id="districtdiv">
           	  <select name="district" class="form-control" style="width:150px" >
                        	<option>&larr; Select Purchase Order &rarr;</option>
           	</select>
       	  </div></td>
        </tr>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Purchase Order Details</h4></td>
        </tr>
        <tr>
          <td width="146"><label for="textfield19">Supplier Name:</label></td>
          <td width="211"><input type="text"  name="suppliername" readonly  id="textfield19" />    <input type="hidden" name="suppid" id="suppid" size="3" /> </td>
        </tr>
        <tr>
          <td>Broker Name:</td>
          <td><input type="text" name="brokername"   value = "None" readonly id="textfield18" /></td>
          <td>Select Broker Name:</td>
          <td><select name="s2" onchange="phappycode2(this)" style="width:150px">
                       <option  value = "0">Select Broker Name</option>
                       <?php               
				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and broker =1");
				while($row = mysql_fetch_array($query)){
					$brid = $row['legid'];
					$brokername = $row['leg_name'];
			?>
                       <option value = "<?php echo $brid; ?>"><?php echo $brokername; ?></option>
                       <?php } ?>
                     
          </select></td>
    </tr>
		  
		  <tr>
		  
		   <td colspan="4">


 <INPUT type="button" value="ADD ITEM" onclick="addRow('dataTable',<?php echo $fid; ?>);" />
 
 <table width="982" border='1' cellpadding='1'   id="dataTable"   >

  <tr>
   <th>TOTAL</th> 
   <th> <input  type = "text"  size = "3" name = "totbag" id = "totbag" /> </th>
   <th>   </th>
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
 

  <th>ITEM NAME</th> <th>BAG</th> <th> Weight Per Bag in KG </th>  <th>GROSS WEIGHT</th> <th> MANDI GATE PASS WT </th> <th>  BILLING WEIGHT </th>	<th> VAT(in %) </th>	<th> RATE OF GOODS </th>	<th>VALUE </th>	<th>VAT TAX</th>	<th>BILL VALUE</th> <th>REMARK</th>
  </tr>
</table> 


<input  type = "hidden"  size = "5" name = "totalcnt" id = "totalcnt" /> 

 <script>
window.onload=addRow('dataTable',<?php echo $fid; ?>) ; 
</script>


&nbsp;</td>
		  </tr>
		
		
		<tr>
		<td colspan="4">
		<table>
		<tr>
		 <td><label for="textfield">Moisture%:</label></td>
          <td><input type="text" name="moisture"/></td>
          <td><label for="textfield2">Dust(Sand)%:</label></td>
          <td><input type="text" name="dust" id="textfield2" /></td>
		    <td height="26"><label for="textfield3">Small Seed%:</label></td>
          <td><input type="text" name="smallseed" id="textfield3" /></td>
          <td><label for="textfield4">Split Seed%:</label></td>
          <td><input type="text" name="splitseed" id="textfield4" /></td>
		
		</tr>
		<tr>
		  <td><label for="textfield5">Oil%:</label></td>
          <td><input type="text" name="oil" id="textfield5" /></td>
          <td>Quantity:</td>
          <td><input type="text" name="quantity" id="textfield6" required="required" /></td>
		   <td><label for="textfield6">Recipts Bag:</label></td>
          <td><p>
            <input type="text" name="bag" id="textfield7" required="required" />
          </p></td>

          <td>Packing per Bag</td>
          <td><input type="text" name="packingbag" id="textfield" /></td>
		
		</tr>
		  <tr>
          <td height="38">Reciept Weight:</td>
          <td><input type="text" name="recieptweight" id="textfield8" /></td>
          <td>Bag Quality:</td>
          <td><input type="text" name="bagquality" id="textfield9" />
          <input type="hidden" name="poid" id="textfield9" />
          <input type="hidden" name="denometer" /></td>
		   <td height="36">Mode Of Supply:</td>
          <td><input type="text" name="modeofsupply" id="textfield10" /></td>
          <td>&nbsp;</td>
          <td>        </td>
        </tr>
		</table>
		
		</td>
		</tr>
		
      
       
      
      
       
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Attachments Of Paper</h4></td>
        </tr>
        <tr>
          <td colspan="4"><table border="1" width="979px">
            <tbody>
              <tr>
                <td colspan="3">Transporter Name</td>
                
                <td colspan="2">Date Of Billty:</td>
              </tr>
              <tr>
                <td colspan="3"><select name="transportername"  onchange = "transport(this)"style="width:150px">
                       <option value = "0"> </option>
                       <?php               
				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and transported =1");
				while($row = mysql_fetch_array($query)){
					$trid = $row['legid'];
					$transportname = $row['leg_name'];
			?>
                       <option  value = "<?php echo $trid; ?>"><?php echo $transportname; ?></option>
                       <?php } ?>
                     
          </select></td>
                
                <td colspan="2">
				<input  onchange = "isDate(this.value)"  name = "dateofbillty" id="dstart"   type = "text"  size="17"  value="DD/MM/YYYY" />  <a href="javascript:NewCal('dstart','ddmmyyyy')">
				<img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div>&nbsp;</td>
               
              </tr>
              <tr>
                <td>Billty No</td>
                <td>Total Freight</td>
                <td>Advance </td>
                <td>Payble</td>
                <td>Truck No.</td>
              </tr>
              <tr>
                <td><input type="text" name="billtyno" id="textfield11" /></td>
                <td><input type="text" name="frieght" id="textfield13" /></td>
                <td><input type="text" name="advance" id="textfield30" /></td>
                <td><input type="text" name="payble" id="textfield32" /></td>
                <td><input type="text" name="vehiclenumber" id="textfield31" /></td>
              </tr>
            </tbody>
          </table></td>
        </tr>
		<tr>
          <td colspan="4">
		  <table>
		  <tr>
		    <td><label for="select4">Bill No:</label></td>
          <td><input type="text" name="billno" id="textfield15" /></td>
          <td>Mandi Gate Pass Number:</td>
          <td><input type="text" name="gatepassno" id="textfield16" /></td>
		   <td height="26">Form 10 No.:</td>
          <td><input type="text" name="form10" id="textfield17" /></td>
          <td>Supervisior Name:</td>
          <td><input type="text" name="supervisiorname" id="textfield14" /></td>
		  </tr>
		  </table>
		  
		  </td>
        </tr>
      
        <tr>
          <td>Remark:</td>
          <td colspan="3"><textarea name="remark" id="textarea" cols="50" rows="2"></textarea></td>
          
        </tr>
        <tr>
          <td colspan="4" bgcolor="#14C4B6"><h4>Kanta Slip</h4></td>
        </tr>
		
		
		<tr>
          <td colspan="4">
		  <table>
		  <tr>
		    <td>Weight Bridge Name:</td>
          <td><input type="text" name="weightbridgename" id="textfield20" /></td>
          <td>Date Of Weight:</td>
          <td><input id="dst"   name = "weightdate" onchange = "isDate(this.value)"    type = "text"  size="17"  value="DD/MM/YYYY" />  <a href="javascript:NewCal('dst','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div></td>
     <td>Kanta Slip No:</td>
          <td><input type="text" name="kantano" id="textfield22" /></td>
          <td>Unit:</td>
          <td><select name="unit" style="width:150px">
		   <option></option>
		  <option>Bags</option>
		  <option>Bundles</option>
		  <option>Cubic Feet</option>
		  <option>Cartoons</option>
		  <option>Dozen</option>
		  <option>Drums</option>
		  <option>Kilograms</option>
		  <option>KiloLeters</option>
		  <option>Liters</option>
		  <option>Metric Tons</option>
		  <option>Numbers</option>
		  <option>Others</option>
		  <option>Rolls</option>
		  <option>Tons</option>
		  <option>Quintal</option>
		  </select></td>
		  </tr>
		  
		  
		  <tr>
		  
		   <td>Gross Weight:</td>
          <td><input type="text" name="grossweight1" id="textfield24" /></td>
          <td>Net Weight:</td>
          <td><input type="text" name="netweight1" id="textfield25" /></td>
		   <td>Tare Weight:</td>
          <td><input type="text" name="tareweight" id="textfield26" /></td>
          <td>&nbsp;</td>
          <td></td>
		  </tr>
		  
		  
		  </table>
		  
		  </td>
        </tr>
		
		
		
		
       
       
      
      
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
	  
		  
		  
		   <td>  
		   <br>
		   <?php  if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" ) { ?>
<input type="submit" name="s" id="submit" value="Submit Record" />
<?php  } ?> </td>
		  
		  
		  
		  
		  
		  
		  
		  
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
	
	<input type="hidden" name="transname" value = "None" />
	
	
  </form>
  &nbsp;
</div>

</body>
</html>

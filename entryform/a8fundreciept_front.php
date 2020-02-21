<?php

include("../conf.php");

?>
<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }
$fid=$_SESSION['fid'];
?>
<?php
$query_dispMake="SELECT legid,concat(leg_name,'-',off_city,'-',fact_state) as suppliername  FROM ledger_master where fid=$fid";
$result_dispMake=mysql_query($query_dispMake);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="..//style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/bankgrid.js">  </script>

<script language="javascript">

function ValidateForm(){

    var dt=document.form1.saudadate
	    if (isDate(dt.value)==false){
	           dt.focus()
              return false
    }
	
	   
	
		    var dt=document.form1.item2.value;
			
			
	    if (dt=="Select Accounting ledger"){
		 alert('Please Select Accounting ledger');
		 document.form1.item2.focus();
              return false
    }
	
	
	 var dt=document.form1.province.value;
			
					
	    if (dt < 1){
		 alert('Please Select party name');
		 document.form1.province.focus();
              return false
    }
	
	
	
	
	
	
	return true }
	
	
	

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

document.form1.type.value = "ADVANCE";	
		
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
 document.form1.type.value = "AGAINST";


	
    }
  }
xmlhttp.open("GET","get_sales_a6_detail.php?q="+str,true);
xmlhttp.send();


}



function h456(thelist, theinput) {
    theinput = document.getElementById(theinput);
    var idx = thelist.selectedIndex;
	
	
    var content = thelist.options[idx].innerHTML;
	
//	alert(content);
    document.form1.suppliername.value = content;
	
	
	
}


</script>
</head>
<body>
<?php include('../include/header.php'); ?>

<?php include('../include/sidemenu.php');?>

<div align="center"><br>
  <h2 align="center"><span style="color:#F17327;">fund receipts Details</span>    </h2>
  <form id="form1" name="form1" method="post"   onSubmit="return ValidateForm()"  action="a8fundreciept_back.php">
  <table width="749" border="1" rules="none" frame="box" cellpadding="6">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Basic Details</h4></td>
        </tr>
        <tr>
          <td width="128"><label for="select">Party Name:</label></td>
          <td colspan="2"><select  onChange="getDistrict(this.value),h456(this,suppliername)"  name="province" id="province">
              <option value="0"> </option>
              <?php 

	while($query_data = mysql_fetch_array($result_dispMake)){
	 
	 echo"<option  value = {$query_data['legid']}>{$query_data['suppliername']}</option>"; 

	 }
	 ?> 
            </select></td>
          
          <td width="277">Transaction Date:
            <input id="saudadate"   name = "saudadate" onchange = "isDate(this.value)"   type = "text"  size="17" required="required" />
          <a href="javascript:NewCal('saudadate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>&nbsp;</td>
        </tr>
        <tr>
          <td height="40">Sales Bills</td>
          <td colspan="2"><div id="districtdiv">
                    	<select name="district" class="form-control" >
                        	<option>&larr; Select Purchase Bill &rarr;</option>
                    	</select>
                	</div></td>
          
          <td><label for="textfield">Payment Type:
              <input type="text" readonly  value = "ADVANCE"  name="type" size="15"/>
          </label></td>
          
        </tr>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Quality Norms</h4></td>
        </tr>
        <tr>
          <td><label for="textfield">Party Name:</label></td>
          <td colspan="2"><p>
            <input type="text" name="suppliername"  readonly size="45"/>
          </p>          </td>
		  

		  
        
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="35" colspan="4"><INPUT type="button" value="ADD ITEM" onClick="addRow('dataTable',<?php echo $fid; ?>);" />
 
 <table   id="dataTable" border='1' cellpadding='1'   >

<tr>
<th>  Grand </th> <th>  Total </th> <th>  ***** </th> 
    <th> <input  type = "text"  size = "3" name = "tamount" id = "totbag" /> </th>
   <th> <input  type = "text"  size = "5" name = "tbcharges" id = "totgrsweight" /> </th>
   <th> <input  type = "text"  size = "5" name = "tbtotal" id = "totmandi" />  </th> 
</tr>
<tr>
 

  <th>ACCOUNTING LEDGER </th> 
  <th>BRANCH</th><th>CHK NO/DD NO</th> <th> AMOUNT </th>  <th>  BANK CHARGES </th>  <th>  TOTAL </th> <th>  MODE OF PAY </th> <th>  REMARK </th>  </tr>
</table> 


<input  type = "hidden"  size = "5" name = "totalcnt" id = "totalcnt" /> 
&nbsp;&nbsp;</td>
        </tr>
     
 <script>
window.onload=addRow('dataTable',<?php echo $fid; ?>) ; 
</script>
	 
      <tr>
          <td height="35"></td>
          <td></td>
          <td><input type="submit" name="s" id="submit" value="Submit" /></td>
          <td></td>
        </tr>
    </table>
  <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
</form>&nbsp;
</div>

</body>
</html>

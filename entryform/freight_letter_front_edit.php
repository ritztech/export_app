<?php

include("../conf.php");

?>
<?php
session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

$fid=$_SESSION['fid'];
?>
<?php
$query_dispMake="SELECT legid,concat(leg_name,'-',off_city,'-',fact_state) as suppliername  FROM ledger_master where fid=$fid";
$result_dispMake=mysql_query($query_dispMake);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>RITZ</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="..//style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/a4code.js">  </script>

<script language="javascript">
function hledger(thelist,theinput) {
	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
  
  document.form1.ledgername_n.value = content;
  
		
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

  	var strURL="findsales.php?province="+provinceId;
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



function h12311(str)
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
	
	
document.form1.partyname.value = arfruits[0];
//document.form1.brokername.value = arfruits[1];
document.form1.quantity.value = arfruits[2];
document.form1.bag.value = arfruits[3];
document.form1.packing.value = arfruits[4];

document.form1.soid.value = str;

    }
  }
xmlhttp.open("GET","get_sales_invoice_detail_a6.php?q="+str,true);
xmlhttp.send();



}


function h456() {

    document.form1.partyname.value = document.form1.keyword.value;
}



</script>
<script type="text/javascript">
function phappycode1(idvalue){

document.form1.suppid.value = idvalue;
}




function ValidateForm(){


	
	    var dt=document.form1.billtydate
	    if (isDate(dt.value)==false){
	           dt.focus()
              return false
    }
	
	 var dt=document.form1.saudadate
	    if (isDate(dt.value)==false){
	           dt.focus()
              return false
    }
	
	
	
		    var dt=document.form1.item2.value;
				
	    if (dt=="Select stock item"){
		 alert('Please Select stock item');
              return false
    }
	
	
	var dt=document.form1.province;
					
	    if (dt.value < 1){
		 alert('Please Select party name name');
		 document.form1.keyword.focus()
              return false  }
			  
			  
			  var dt=document.form1.ledgername;
					
	    if (dt.value < 1){
		 alert('Please Select Debit Ledger:');
		 dt.focus()
              return false  }
			  
			  
	
	
	return true }
	
	

</script>
</head>
<body>

<?php // include('../include/sidemenu.php');?>
<div align="center">
  <h2 align="center"><span style="color:#F17327;">FREIGHT LETTER FORM</span> </br>
  <form id="form1" name="form1" method="post"   onSubmit="return ValidateForm()" action="freight_letter_back_edit.php">
  <table  border="1" cellpadding="6" style="color:black; font-weight:bold;">
 
       
        <tr>
          <td colspan="4" align="center"><input type="submit" name="s" id="submit" value="Update Record" /></td>
         
        </tr>
 
    </table>
</form>�
</div>

</body>
</html>
  <link rel="stylesheet" href="date_picker/jquery-ui.css">
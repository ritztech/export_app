<?php
include("../conf.php");
$t_date = date("d/m/Y");
?>
<?php
session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

$fid=$_SESSION['fid'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>RITZ</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="..//style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/a4code_2.js">  </script>

<script language="javascript">
function hledger(thelist,theinput) {
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;

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


    }
  }
xmlhttp.open("GET","get_sales_invoice_detail_a6.php?q="+str,true);
xmlhttp.send();



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
  <h2 align="center"><span style="color:#F17327;">sales invoice form</span> </br>
  <form id="form1" name="form1" method="post"   onSubmit="return ValidateForm()" action="salesinvoice_back_e.php">
  <table  border="1" rules="none" frame="box" cellpadding="6" style="background-color:snow; color:black;font-weight:bold" >
      <tbody >
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Select Suplier</h4></td>
        </tr>

        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>SALES ORDER DETAILS</h4></td>
        </tr>

        <tr>
          
<td colspan="4">



 
 <table width="982" border='1' cellpadding='1'   id="dataTable"   >

  <tr>
   <th>TOTAL</th> 
   <th> <input  type = "hidden"  size = "3" name = "totbag" id = "totbag" /> </th>
   <th> <input  type = "hidden"  size = "5" name = "totgrsweight" id = "totgrsweight" /> </th>
   <th> <input  type = "hidden"  size = "5" name = "totmandi" id = "totmandi" />  </th> 
   <th> <input  type = "text"  size = "5" name = "totbilwght" id = "totbilwght" />     </th>
   <th> <input  type = "text"  size = "5" name = "totrot" id = "totrot" />  </th>	
   <th> <input  type = "text"  size = "5" name = "totrog" id = "totrog" />  </th>
   <th> <input  type = "text"  size = "5" name = "totvalue" id = "totvalue" />  </th> 
   <th> <input  type = "text"  size = "5" name = "totvto" id = "totvto" />  </th>
    <th> <input  type = "text"  size = "5" name = "totbillv" id = "totbillv" />  </th>
</tr>

<tr>
 

  <th>ITEM NAME</th>   <th>HSN</th>   <th>Detail</th>    <th></th>  <th></th> <th></th> <th> </th> <th>  BILLING WEIGHT </th>	<th> GST(in %) </th>	<th> RATE OF GOODS </th>	<th>VALUE </th>	<th>GST TAX</th>	<th>BILL VALUE</th> <th>REMARK</th>
  
  </tr>
  
 

</table> 


<input  type = "hidden"  size = "5" name = "totalcnt" id = "totalcnt" /> 



&nbsp;</td>
		  
		  </tr>
		  

        <tr>

          <td>Payment Terms : -  <input type="text" value = "<?php echo $s_paymentterms ?>"  size = "20" name="paymentterms" id="textfield14" /></td>
        </tr>
        
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>TRANSPORT DETAILS</h4></td>
        </tr>
        <tr>
          <td colspan="4"><table border="1">
            <tbody>
             <tr>
              <tr>
                <td colspan="3"><select name="transportname"    style="width:150px">
                       <option value = "0"> </option>
                       <?php               
				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and transported =1");
				while($row = mysql_fetch_array($query)){
					$trid = $row['legid'];
					$transportname = $row['leg_name'];
			?>
                       <option  value = "<?php echo $trid; ?>" ><?php echo $transportname; ?></option>
                       <?php } ?>
                     
          </select></td>
                
                <td colspan="2"><input id="dstart"   name = "billtydate"  onchange = "isDate(this.value)"  type = "text"  size="17"  value = "<?php echo $s_billtydate ?>"  />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div>&nbsp;</td>
               
              </tr>
              <tr>	
                <td>Billty No</td>
                <td>Total Freight</td>
                <td>Advance </td>
                <td>Payble</td>
                <td>Truck No.</td>
              </tr>
              <tr>
                <td><input type="text" name="billtyno"  value = "<?php echo $s_billtyno ?>" id="textfield11" /></td>
                <td><input type="text" name="freighttotal" value = "<?php echo $s_freighttotal ?>"  id="textfield13" /></td>
                <td><input type="text" name="freightadv" id="textfield30" value = "<?php echo $s_freightadv ?>" onkeyup = "calcfreight()" /></td>
                <td><input type="text" name="freightpaid"   value = "<?php echo $s_freightpaid ?>"  id="textfield32" /></td>
                <td><input type="text" name="truckno"  id="truckno" value = "<?php echo $s_truckno ?>" id="textfield31" /></td>
              </tr>
            </tbody>
          </table>�</td>
        </tr>




          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td> <input type="button"  tabIndex = "1"  style = "color:blue; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;"  onclick="myFunction()" value="SAVE"   />  </td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
</form>�
</div>

</body>
</html>
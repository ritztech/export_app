<?php
include("../conf.php");
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }
$fid=$_SESSION['fid'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/a5code.js">  </script>

<script language="javascript">
function hledger(thelist,theinput) {
	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
  
  document.form1.ledgername_n.value = content;
  
		
}




function h456(thelist,theinput) {
	
    theinput = document.getElementById(theinput);
    var idx = thelist.selectedIndex;
	
	
    var content = thelist.options[idx].innerHTML;
	
//	alert(content);
  document.form1.partyname.value = content;
		
}




function getDistrict(provinceId) {	


	
	var strURL="findDistrict1.php?province="+provinceId;
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



function h1231(str)
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
document.form1.brokername.value = arfruits[1];
document.form1.truckno.value = arfruits[2];
document.form1.billno.value = arfruits[3];
document.form1.mandigatepass.value = arfruits[4];
document.form1.poid1.value = arfruits[5];

	
    }
  }
xmlhttp.open("GET","get_good_receipt_details.php?q="+str,true);
xmlhttp.send();
}

</script>

</script>
<script type="text/javascript">
function phappycode1(){
document.form1.stockitem.value = document.form1.s1.value;
}


function phappycode2(thelist){


function billvalue(){
document.form1.value2.value = Number(document.form1.totbillv.value) + Number(document.form1.add1.value) - Number(document.form1.less1.value)
}



function ValidateForm(){

    var dt=document.form1.transactiondate
	    if (isDate(dt.value)==false){
	           dt.focus()
              return false
    }
	
	    var dt=document.form1.date
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
			
			
	    if (dt.value=="0"){
		 alert('Please Select Party Name');
		  dt.focus()
              return false
    }
	
	var dt=document.form1.ledgername;
					
	    if (dt.value < 1){
		 alert('Please Select Debit Ledger');
		 dt.focus()
              return false  }
	return true 
 
}





</script>
</head>
<body>
<?php include('../include/sidemenu.php');?>
<div align="center">
  
<form id="form1" name="form1" method="post"   onSubmit="return ValidateForm()" action="mandipaidpurchase_back.php">
  <p align="left">&nbsp;</p>
  
                <table width="300" border="1" cellpadding="1" frame="box" rules="none">
              <tbody>
                <tr>
                  <td colspan="4" bgcolor="#14C4B6"><div align="center">
                    <h4>Mandi+VAT Purchase(From Registered Dealer)</h4>
                  </div></td>
                </tr>
                
             
               
               
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="4">


 <INPUT type="button" value="ADD ITEM" onclick="addRow('dataTable',<?php echo $fid; ?>);" />
 
 <table width="982" border='1' cellpadding='1'   id="dataTable"   >

  <tr>
   <th>TOTAL</th> 
   <th> <input  type = "text"  size = "3" name = "totbag" id = "totbag" /> </th>
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
                  <td colspan="4"><table width="987" border="1">
                    <tbody>
                      <tr>
                        <td width="286"><label for="textfield3">Add:
                            <input type="text" name="add1" onkeyup = "billvalue()" value = "0" id="textfield10" size="7"/>
                        </label></td>
                        <td width="376">Less:
                        <input type="text" name="less1" onkeyup = "billvalue()"  value = "0"   id="textfield16" size="7" /></td>
                        <td width="13">&nbsp;</td>
                        <td width="283">Value:</td>
                      </tr>
                      <tr>
                        <td>Remark:
                        <input type="text" name="remark1" id="textfield17" /></td>
                        <td>Remark:
                          <input type="text" name="remarkless"  />&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input type="text" name="value2" id="textfield18" /></td>
                      </tr>
					  
                    </tbody>
                  </table></td>
                  </tr>
                
               
                <tr>
                  <td colspan="4"><table width="984" border="1">
            <tbody>
              <tr>
                <td colspan="3">Transporter Name</td>
                
                <td colspan="2">Date Of Billty:</td>
              </tr>
              <tr>
                <td colspan="3"><select name="transportername"  onchange="phappycode21(this)" style="width:150px">
                       <option value = "0" > </option>
                       <?php               
				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and transported =1");
				while($row = mysql_fetch_array($query)){
					$trid = $row['legid'];
					$transportname = $row['leg_name'];
			?>
                       <option value = "<?php echo $trid; ?>"><?php echo $transportname; ?></option>
                       <?php } ?>
                     
          </select></td>
                
                <td colspan="2"><input id="dstar"  onchange = "isDate(this.value)"  name = "billtydate"   type = "text"  size="17"  value="DD/MM/YYYY" />  <a href="javascript:NewCal('dstar','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div>&nbsp;</td>
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
                <td><input type="text" name="totalfreight" id="textfield13" /></td>
                <td><input type="text" name="advance" id="textfield30" /></td>
                <td><input type="text" name="payble" id="textfield32" /></td>
                <td><input type="text" name="truckno" id="textfield31" /></td>
              </tr>
            </tbody>
          </table>�</td>
                  </tr>
                
               
                <tr>
                 
                </tr>
               
                <tr>
                <td height="29"></td>
                <td colspan="3"><input type="submit" name="s" id="submit" value="Submit Value" /></td>
				<input type="hidden" name="poid1" id="poid1"  />
				<input type="hidden" name="ledgername_n" value = "None" id="ledgername_n"  />
                </tr>
      </tbody>
            </table>  
                �</p>
</form>&nbsp;
</div>
</body>
</html>
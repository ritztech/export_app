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
<script language="javascript" type="text/javascript" src="jscode/a5code.js">  </script>  <link href="suggest_12/css/style.css" rel="stylesheet" type="text/css">  <SCRIPT LANGUAGE="JavaScript" src="suggest_12/js/jquery.js"></SCRIPT> <SCRIPT LANGUAGE="JavaScript" src="suggest_12/js/script.js"></SCRIPT> 

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


function phappycode2(thelist){	var idx = thelist.selectedIndex;	var content = thelist.options[idx].innerHTML;document.form1.brokername.value = content;  }function phappycode21(thelist){	var idx = thelist.selectedIndex;	var content = thelist.options[idx].innerHTML;document.form1.trkname.value = content;  }


function billvalue(){
document.form1.value2.value = Number(document.form1.totbillv.value) + Number(document.form1.add1.value) - Number(document.form1.less1.value)
}



function ValidateForm(){	var dt=document.form1.province;	    if (dt.value==0){		 alert('Please  enter party name...');		  dt.focus()              return false    }	var dt=document.form1.billno;	    if (dt.value==""){		 alert('Please  enter  bill no ...');		  dt.focus()              return false    }	

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
		 alert('Please Select stock item');		 document.form1.item2.focus();
              return false
    }
	
	var dt=document.form1.province;
			billno
			
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
		 function h123(str){document.form1.province.value = str;	getDistrict(str);}




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
                </tr>								<tr>                  <td colspan="4">				  <table width="100%">				  <tr>                  <td>Transaction Date</td>                  <td width="215" colspan="0"><input id="dstart1"  onchange = "isDate(this.value)"  name = "transactiondate"  autofocus  type = "text"  size="17" required="required" />  <a href="javascript:NewCal('dstart1','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div>&nbsp;</td>                  <td>Debit Ledger:</td>                  <td>  <select name="ledgername"    onChange="hledger(this,this.value)"    style="width:170px">                       <option value = "0"> </option>                       <?php               				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and party =1");				while($row = mysql_fetch_array($query)){					$exid = $row['legid'];					$expenseshead = $row['leg_name'];									           echo"<option  value = $exid>$expenseshead</option>";                                             } ?>          </select></td>                </tr>				   <tr>                  <td width="181">Get Party Name:</td> <td>        <div id="holder"> 		  <input type="text"   size = "25" autocomplete = "off"     tabIndex = "1"  id="keyword" name = "keyword" > 		 </div>		 <div id="ajax_response"></div> </td>                                 <td width="170"> Get details </td>                  <td width="403">  <div id="districtdiv">                    	<select name="district" class="form-control" style="width:170px">                        	<option>&larr; Select Reciept Note &rarr;</option>                    	</select>               	  </div> </td>                </tr>												 <tr>                  <td>Bill Number:</td>                  <td><input type="text" name="billno"  value = "" id="textfield" /></td>                                </tr>				 <tr>                  <td>Bill Date:</td>                  <td><input id="dstart"  onchange = "isDate(this.value)"   name = "date"   type = "text"  size="17"  placeholder = "DD/MM/YYYY" />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div></td>                </tr>				  				  </table>				  				  </td>                </tr>				
                
             
               
               
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
                  </tr>  <tr>                  <td colspan="4"><table><tr>   <td>Broker Name:</td>                  <td colspan="2"><input type="text" name="brokername"  value = "None" readonly id="textfield14" size="40" /></td>                  <td><select name="s2" onchange="phappycode2(this)" style="width:150px">                       <option value = "0">Select Broker Name</option>                       <?php               				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and broker =1");				while($row = mysql_fetch_array($query)){					$brid = $row['legid'];					$brokername = $row['leg_name'];			?>                       <option value = "<?php echo $brid; ?> "  ><?php echo $brokername; ?> </option>                       <?php } ?>                               </select></td>		   <td>Bag:</td>                  <td><input type="text" name="bag" id="textfield2" /></td>                  <td>Packing:</td>                  <td><input type="text" name="packing" size="10" id="textfield4" /></td></tr><tr> <td>Brokerage Type : - </td>   <td> <select name="brokeragetype"   style="width:150px">                       <option value = "QTL"> QTL </option>					    <option value = "BAG"> BAG </option>                              </select>		  </td>  </tr>  <tr>                  <td>Net Weight(Gatepass)</td>                  <td><input type="text" name="netweight" id="textfield6" /></td>                  <td>Gross Weight:</td>                  <td><input type="text" name="grossweight" id="textfield5" /></td> <td>Sales Tax Form Terms:</td>                  <td><select name="salestaxform" style="width:150px">                       <option value = "0">  </option>                       <?php               				$query = mysql_query("SELECT * FROM taxform");				while($row = mysql_fetch_array($query)){					$taxid = $row['taxid'];					$salestaxform = $row['salestaxform'];			?>                      <option  value = <?php echo $taxid; ?> ><?php echo $salestaxform; ?></option>                       <?php } ?>                               </select></td>                  <td>Entry Tax Form Terms:</td>                  <td><select name="entrytaxform" style="width:150px">                       <option value = "0" >Select </option>                       <?php               				$query = mysql_query("SELECT * FROM taxform");				while($row = mysql_fetch_array($query)){					$taxid = $row['taxid'];					$entrytaxform = $row['entrytaxform'];			?>                      <option  value = <?php echo $taxid; ?> ><?php echo $entrytaxform; ?></option>                       <?php } ?>                               </select></td>                </tr></table>                  </td>                </tr>
                
               
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
          </table> </td>
                  </tr> <tr>                  <td colspan="4">				  				  <table>				  <tr>                  <td>Mandi Tax Form Terms:</td>                  <td><select name="manditaxform" style="width:150px">                       <option value = "0">  </option>                       <?php               				$query = mysql_query("SELECT * FROM taxform");				while($row = mysql_fetch_array($query)){					$taxid = $row['taxid'];					$manditaxform = $row['manditaxform'];			?>                   <option  value = <?php echo $taxid; ?> ><?php echo $manditaxform; ?></option>                       <?php } ?>                               </select></td>                  <td>Crossing Transporter terms:</td>                  <td><select name="crosingtname" style="width:150px">                    <option value = "None"> </option>                    <?php               				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and transported =1");				while($row = mysql_fetch_array($query)){					$trid = $row['legid'];					$transportname = $row['leg_name'];			?>                    <option><?php echo $transportname; ?></option>                    <?php } ?>                  </select></td> <td>Payment Terms:</td>                  <td><input type="text" name="paymentterms" id="textfield7" /></td>                </tr>				   <tr>                                   <td>Mandi Gate Pass Details</td>                  <td><input type="text" name="mandigatepass" id="textfield8" /></td> <td>Issue Mandi Samiti:</td>                  <td><input type="text" name="mandisamiti" id="textfield9" /></td>                  <td>Payment Due Date:</td>                  <td><input id="ds"   name = "duedate"  onchange = "isDate(this.value)"   type = "text"  size="17" />  <a href="javascript:NewCal('ds','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date">                  </td>                </tr>				 <tr>                  <td>&nbsp;</td>                  <td>&nbsp;</td>                  <td>Other Document Attached:</td>                  <td><input type="text" name="otherdoc" id="textfield12" /></td>                </tr>								  </table>				  </td>                  </tr>
                
               
                <tr>
                 
                </tr>
               
                <tr>
                <td height="29"></td>
                <td colspan="3"><input type="submit" name="s" id="submit" value="Submit Value" /></td>
				<input type="hidden" name="poid1" id="poid1"  />
				<input type="hidden" name="ledgername_n" value = "None" id="ledgername_n"  />				<input type="hidden" name="trkname" id="trkname"   value = "None" />
                </tr>
      </tbody>
            </table>  
                 </p>												 <input type="hidden" name="province"   value = "0" />
</form>&nbsp;
</div>
</body>
</html>

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
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/a12code.js">  </script>

<script language="javascript">

function hledger(thelist,theinput) {
	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
  
  document.form1.ledgername_n.value = content;
  
		
}


function hledger1(thelist,theinput) {
	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
  
  document.form1.ledgername_m.value = content;
  
		
}

function ValidateForm(){
    var dt=document.form1.m7	    if (dt.value=="0"){	           dt.focus()              return false    }		    var dt=document.form1.n7	    if (dt.value=="0"){	           dt.focus()              return false    }		
    var dt=document.form1.n3
	    if (isDate(dt.value)==false){
	           dt.focus()
              return false
    }
	
	    var dt=document.form1.m8
	    if (isDate(dt.value)==false){
	           dt.focus()
              return false
    }
	
	
		    var dt=document.form1.item2.value;
	
	    if (dt=="Select stock item"){
		 alert('Please Select stock item');		 document.form1.item2.focus()
		              return false
    }
	
	
	return true 
	
	}

</script>





</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>
<div align="center"> <p >&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">mandi tax & nirasrit tax deposit</span></h2>
  <form id="form1" name="form1" method="post"  onSubmit="return ValidateForm()"  action="a12mandinirasrittax_back.php">
 
  <div>
    <table border="0">
        <tbody>
          <tr>
            <td width="702"><table width="690" border="1" frame="box" rules="none">
              <tbody>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
				   <td>TRANSACTION DATE: </td>
                  <td><input id="dstart1"   name = "n3"  onchange = "isDate(this.value)"  type = "text"  size="17" required="required" />  <a href="javascript:NewCal('dstart1','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>&nbsp;&nbsp;</td>
                </tr>
                
                <tr bgcolor="#14C4B6">
                  <td colspan="2"><h4 align="center">Mandi tax</h4></td>
                  <td colspan="2"><h4 align="center">Nirasrit Tax</h4></td>                  
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>TAX DEPOSITED FOR DATE </td>
                  <td><p>
                    <input id="dstart2"   name = "m8"  onchange = "isDate(this.value)"   type = "text"  size="17" required="required" />  
                    <a href="javascript:NewCal('dstart2','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>&nbsp;&nbsp;&nbsp;</p>
                    </td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td width="112">TYPE OF TAX:</td>
                  <td width="186"><input type="text" name="m1" id="textfield" value="MANDI TAX" readonly="readonly" /></td>
                  <td width="152">TYPE OF TAX:</td>
                  <td width="212"><input type="text" name="n1" id="textfield3" value="NIRASRIT TAX" readonly="readonly" /></td>
                </tr>
                <tr>
                  <td>REC EIPTS SR. NO:</td>
                  <td><input type="text" name="m2" id="textfield2" /></td>
                  <td>REC EIPTS SR. NO:</td>
                  <td><input type="text" name="n2" id="textfield4" /></td>
                </tr>
                
                <tr>
                  <td>DEPOSIT TAX</td>
                  <td><input type="text" name="m4" id="textfield5" /></td>
                  <td>DEPOSIT TAX</td>
                  <td><input type="text" name="n4" id="textfield9" /></td>
                </tr>
                <tr>
                  <td>MODE OF PAYMENT</td>
                  <td><input type="text" name="m5" id="textfield6" /></td>
                  <td>MODE OF PAYMENT</td>
                  <td><input type="text" name="n5" id="textfield10" /></td>
                </tr>
                <tr>
                  <td>CHEQUE NO.</td>
                  <td><input type="text" name="m6" id="textfield7" /></td>
                  <td>CHEQUE NO.</td>
                  <td><input type="text" name="n6" id="textfield11" /></td>
                </tr>
                <tr>
                  <td>LEDGER NAME</td>
                  <td>
				  <select name="m7"   onChange="hledger1(this,this.value)"    style="width:150px">
                       <option value = "0"> </option>
                       <?php               
				$query = mysql_query("SELECT legid,leg_name  FROM ledger_master where fid=$fid");
				while($row = mysql_fetch_array($query)){
					$bankid = $row['legid'];
					$bankname = $row['leg_name'];
			
                     echo"<option  value = $bankid>$bankname</option>"; 
					 
                       } ?>
                     </select>  <input type="hidden" name="ledgername_m" id="ledgername_m"  />  
				  <td>LEDGER NAME</td>
                  <td><select name="n7"   onChange="hledger(this,this.value)"   style="width:150px">
                       <option value = "0"> </option>
                       <?php               
				$query = mysql_query("SELECT legid,leg_name  FROM ledger_master where fid=$fid");				while($row = mysql_fetch_array($query)){					$bankid = $row['legid'];					$bankname = $row['leg_name'];
			
                     echo"<option  value = $bankid>$bankname</option>"; 
                       } ?>
                     
                     </select>   <input type="hidden" name="ledgername_n" id="ledgername_n"  />   </td>
                </tr>
                
                <tr>
                  <td colspan="4"> 
                  <INPUT type="button" value="ADD ITEM" onclick="addRow('dataTable',<?php echo $fid; ?>);" />
 
 <table width="686" border='1' cellpadding='1'   id="dataTable"   >

  <tr>
   <th>TOTAL</th> 
   <th> <input  type = "text"  size = "3" name = "qtotal" id = "qtotal" /> </th>
   <th> <input  type = "text"  size = "5" name = "amtotal" id = "amtotal" /> </th>
   <th> <input  type = "text"  size = "5" name = "ratetotal" id = "ratetotal" />  </th> 
</tr>

<tr>
 

  <th>ITEM NAME</th> <th>QUANTITY</th><th>AMOUNT</th> <th> RATE </th> <th>  REMARK </th>  </tr>
</table> 




<input  type = "hidden"  size = "5" name = "totalcnt" id = "totalcnt"  /> &nbsp;</td>

 <script>
window.onload=addRow('dataTable',<?php echo $fid; ?>);
</script>


                  </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="s" id="submit" value="Submit" /></td>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
        </table></td>
            <td width="10"><p>&nbsp;</p>
              <p align="left">&nbsp;</p>
              <p>&nbsp;</p></td>
          </tr>
        </tbody>
      </table>
    </div>
  </form>&nbsp;
</div>
</body>
</html>

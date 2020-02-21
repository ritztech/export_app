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
<script language="javascript" type="text/javascript" src="jscode/jurnal.js">  </script>


<script language="javascript">




 function hledger1(thelist) {
	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
  
  document.form1.ledgername1_n.value = content;
  
		
}



function hledgerval(thelist) {
	
   document.form1.value1.value = thelist;
  
		
}



function ValidateForm(){
	
	
	
	
	
	var dett=document.form1.debitvalue;
	var cett=document.form1.creditvalue;
	
	
	    if (dett.value != cett.value){
		 alert('debit credit valyue not equal ... ');
	          return false  }
	
	
	
	    var dt=document.form1.date
	    if (isDate(dt.value)==false){
	           dt.focus()
              return false
    }
	  	

		var dt=document.form1.totalcnt;
					
	    if (dt.value == 0){
		 alert('Please add ledgers ... ');
		       return false  }
			   
			   
			 var tcnt = document.form1.totalcnt.value;


for (var init=2; init<=tcnt; init++)
  {
    

		var dt=document.form1[ "item" + init ].value
	  	
	    if (dt=="0"){
		 alert('Please Select ledger name');
		 document.form1[ "item" + init ].focus();
              return false
        }
	
		var dt=document.form1[ "debitid" + init ].value
	  	
	    if (dt=="0"){
			 alert('Please Select ledger name');
		 document.form1[ "debitid" + init ].focus();
              return false
        }
	

	
	
	
 }
 
	
			  
			  
	return true
	}
	
	
	

</script>





</head>
<body>
<?php include('../include/header.php');?>
<?php include('../include/sidemenu.php');?>

<div align="center"><br>
  <h2 align="center"><span style="color: #F17327">JOURNAL VOUCHER</span></h2>
  <form id="form1" name="form1" method="post"  onSubmit="return ValidateForm()" action="a15expensesregister_back.php">
  


 <table border='1' cellpadding='1'    >
         <tr>
          <td width="222"> Transaction Date:</td>
          <td colspan="2"><input type="text" onchange = "isDate(this.value)" name="date" autofocus  id="a2" size="17" />&nbsp;&nbsp;<a href="javascript:NewCal('a2','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
          
          <td width="1">&nbsp;</td>
        </tr>
		
		        <tr>
                <td colspan = 2 , align = "center"> <div align="center">
            <input type="submit" name="s" id="submit" value="Submit Record" />
          </div></td>
     
        </tr>
		
		
 
 </table>
 
 </br>
 </br>
 
 

	
	<INPUT type="button" value="ADD ledger" onclick="addRow('dataTable',<?php echo $fid; ?>);" />

 

 <table width="982" border='1' cellpadding='1'   id="dataTable"   >



  <tr>

   <th>TOTAL</th> 

   <th> <input  type = "text"   value = "0" size = "3" name = "debitvalue"  /> </th>

   <th> </th>

   <th>  </th> 

 <th> <input  type = "text" value = "0"  size = "3" name = "creditvalue"  /> </th>



</tr>



<tr>

 



  <th>DEBIT LEDGER</th> <th>DEBIT VALUE</th><th>DEBIT NARATION </th> <th> CREDIT LEDGER </th> <th>  CREDIT VALUE </th>	<th> CREDIT NARRATION </th>	

  </tr>

</table> 


<input type="hidden"  value = "0" name="totalcnt"  />

	
</form>
</div>

</body>
</html>

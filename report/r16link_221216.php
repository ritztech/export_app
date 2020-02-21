<?php

session_start();
if(!isset($_SESSION['uname'])) { echo '<script>window.location="../index.php"</script>'; }

include("../conf.php");
$fid=$_SESSION['fid'];
?>

<?php               
				$query = mysql_query("SELECT `fid`, `firmname`, `businessfirm`, `officeadd`, `shopadd`, `phonno`, `faxnumber`, `mobile`, `contactperson`, `firmtype`, `email`, `mpvat`, `midate`, `mandilicenseno`, `mandidate`, `cstno`, `cstdate`, `tinno`, `tindate`, `fssaino`, `fdate`, `otherdoc`, `propname`, `place`, `state`, `contactperson1`, `email1`, `itnumber`, `itndate`, `otherdoc1`, `pcontact`, `pstatus`, `bankname`, `banktype`, `bankaccnumber`, `ifsccode` FROM `firmcreation` WHERE  fid=$fid");
				while($row = mysql_fetch_array($query)){
					
					$firmname = $row['firmname'];
					$businessfirm = $row['businessfirm'];
					$officeadd = $row['officeadd'];
					$shopadd = $row['shopadd'];
					$phonno = $row['phonno'];
					$mobile = $row['mobile'];
					$contactperson = $row['contactperson'];
					$mandilicenseno = $row['mandilicenseno'];
					$itnumber = $row['itnumber'];
					$mpvat = $row['mpvat'];
			?>
                       
                       <?php } ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../entryform/jscode/printdiv.js"> </script>
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>

<style type="text/css">
<!--
.style1 {color: #0000FF}
.style2 {color: #FF3300}
.style3 {color: #FFFFFF}
.style4 {color: #990033}
-->
</style>



<script language="javascript">

function ValidateForm(){
	
    var dt=document.form1.dstart
	    if (isDate(dt.value)==false){
	           dt.focus()
              return false
    }
	
	    var dt=document.form1.dend
	    if (isDate(dt.value)==false){
	           dt.focus()
              return false
    }
	
	
		var dt=document.form1.suppliername;

			  
			    if (dt.value < 1){
		 alert('Please Select any ledger ');
		 dt.focus()
              return false  }
			  
			  
			
	
	  
	
		return true

	
}



function happycode(){
	
 
  

var crdr =  document.form2.opcrdr.value;


var opval = document.form2.opbalance.value;
var bal1 = document.form2.tbalance1.value;




  if( crdr == "Cr")
   {
  
document.form2.tbalance1.value = Number(bal1) + Number(opval);
   }
   
     if( crdr == "Dr")
   {
  
document.form2.tbalance1.value = Number(bal1) - Number(opval);
   }
 

var j = document.form2.totalcnt.value;

for (var i=2; i<=j; i++)
  {
    
  val1 = document.form2[ "tbalance" + i ].value;
  val2 = document.form2[ "tbalance" + (i-1) ].value;
  

  
  
  final_balance = (Number(val1) + Number(val2)) ;
 // alert(final_balance);
  
  
	
document.form2[ "tbalance" + i ].value  =  (Number(val1) + Number(val2)) ;
  
  }
  
  
  	
 
}

</script>




</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center">
<br>
  <h2 align="center"><span style="color:#F17327;"> ACCOUNTING LEDGER REPORT </span>
    <script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
</h2>
 
    <form name = "form1"  method="get" onSubmit="return ValidateForm()"  action="<?php echo $_SERVER['PHP_SELF']; ?>">

</br>


    
    </font>
    <table width="979"  cellpadding="4" frame="box" rules="none">


<tr>
  <td width="189">&nbsp;</td>
  <td width="214">START DATE </td>
  <td width="516">END DATE </td>
  <td width="516">SELECT LEDGER NAME </td>

  </tr>
<tr>
  <td height="41">&nbsp;</td>
<td> <input id="dstart"  name = "dstart" onchange = "isDate(this.value)"   type = "text"  size="15"  value="01/04/2016" />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
<td><input id="dend"  name = "dend"   type = "text" onchange = "isDate(this.value)"  size="15"  value="12/12/2016" />  <a href="javascript:NewCal('dend','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
<td><select name="suppliername" style="width:170px">
                       <option> </option>
                       <?php               
				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid");
				while($row = mysql_fetch_array($query)){
					$supid = $row['legid'];
					$suppliername = $row['leg_name'];
			?>
                       <option  value = <?php echo $supid; ?> ><?php echo $suppliername; ?></option>
                       <?php } ?>
                     
                     </select></td>
					 


		 
					 
					 
					 
</tr>
<tr>
  <td>&nbsp;</td>
<td><a href="javascript:NewCal('dstart','ddmmyyyy')">
  <input type="submit" name="submit" value="SHOW RECORDS" />
</a></td>
<td>
  <input type="button" name="btnprint" value="Print" onclick="PrintMe('griddiv')"/>
</td>
</tr>
</table>
</div>
</div>
</form>

<?php

include('../conf.php');

if(isset($_GET['submit']))
{

$st_1 = $_GET['dstart'];
$end_1 = $_GET['dend'];
$abc  = $_GET['suppliername'];

$v_partyname = $_GET['suppliername'];

$v_partyid  = $_GET['suppliername'];



$result1 = mysql_query("SELECT  `leg_name`, `o_bal`,dr_cr FROM `ledger_master`  WHERE  legid=$abc");
$row1 = mysql_fetch_array($result1);

		            $v_partyname = $row1['0'];
					$v_party_balance = $row1['1'];
					$v_crdr = $row1['2'];
					


$actual_ledgername = $v_partyname;
			
		
	   
					   

?>
<form name = "form2"   ><div id="purchasecontainer">
 
  
<input type = "hidden"  width="30" name = "v_strdate" id = "v_strdate" value = <?php echo $st_1 ?> />  
<input type = "hidden"  width="30" name = "v_enddate" id = "v_enddate" value = <?php echo $end_1 ?> />  

<script>
document.form1.dstart.value = document.form2.v_strdate.value;
document.form1.dend.value = document.form2.v_enddate.value;
</script>


 <div id = "griddiv">

<table border='1' cellpadding='1' frame="box"  bgcolor="white">

 <tr>
   <td colspan="11"><table width="1030" border="1" rules="none">
     <tr>
       <td width="8">&nbsp;</td>
       <td width="138">Firm Name: </td>
       <td width="326"><?php echo $firmname?></td>
       <td width="15">&nbsp;</td>
       <td width="212">Tin/Sales tax Registration </td>
       <td width="196"><?php echo $mpvat?></td>
       <td width="72">&nbsp;</td>
     </tr>
     <tr>
       <td>&nbsp;</td>
       <td>Business Of Firms: </td>
       <td><?php echo $businessfirm?></td>
       <td>&nbsp;</td>
       <td>Mandi License No: </td>
       <td><?php echo $mandilicenseno?></td>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td>&nbsp;</td>
       <td>Office address: </td>
       <td><?php echo $officeadd?></td>
       <td>&nbsp;</td>
       <td>Income Tax Number: </td>
       <td><?php echo $itnumber?></td>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td>&nbsp;</td>
       <td>Factory Address: </td>
       <td><?php echo $shopadd?></td>
       <td>&nbsp;</td>
       <td>Contact Person: </td>
       <td><?php echo $contactperson?></td>
       <td>&nbsp;</td>
     </tr>
     <tr>
       <td>&nbsp;</td>
       <td>Phone No: </td>
       <td><?php echo $phonno ?></td>
       <td>&nbsp;</td>
       <td>Mobile No. </td>
       <td><?php echo $mobile?></td>
       <td>&nbsp;</td>
	    
     </tr>
	 <tr>
       <td>&nbsp;</td>
       <td><span class="style1">Date Period</span></td>
       <td><div align="left"><span class="style2"> <?php echo $st_1  ?></span> To <span class="style2"><?php echo $end_1  ?></span></div></td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
     </tr>
	 
	 <tr>
       <td>&nbsp;</td>
       <td>Party name: </td>
       <td><?php echo $v_partyname ?></td>
       <td>&nbsp;</td>
       <td>Opening balance. </td>
       <td><?php echo $v_party_balance ?></td>
       <td>&nbsp;</td>
	    
     </tr>
	 	 <tr>
       <td>&nbsp;</td>
       <td>Ledger name: </td>
       <td><?php echo $actual_ledgername ?></td>
	      <td>&nbsp;</td>
        <td>Type of Balance. </td>
       <td><?php echo $v_crdr ?></td>
       <td>&nbsp;</td>
      
     </tr>
	 
	 
	 
	 
   </table></td>
   </tr>
 
 

<tr bgcolor="#14C4B6" style=" text-align:center; text-shadow:#14C4B6"> <th> <span class="style3">Transaction Date</span> </th> 
<th> <span class="style3">Type</span> </th> 
 <th> <span class="style3">Stock Item</span> </th> 
<th> <span class="style3">Bill Boucher No</span> </th>  
<th> <span class="style3">Gross QTY</span> </th> 
 <th> <span class="style3">Billed QTY</span> </th> 
<th> <span class="style3">Net QTY</span> </th>  
<th> <span class="style3">Billed</span> </th> 
 <th> <span class="style3">Debit </span> </th> 
<th> <span class="style3">Credit</span> </th>  
<th> <span class="style3">Balance</span> </th> 
  

  </tr> 

<?php


//  sudhir

$tid= date("Ymdhis");


	
$result01 = mysql_query("SELECT a1.transactiondate,a2.stockid,a1.billno,a2.bag,a2.grswght,
a2.billwght,a2.bilvalue,a1.partyname  FROM mandia4 a1,stock_ref a2 WHERE 
a1.a4id=a2.formid and a1.transactiondate between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')  
and a2.tempid='A4'  and a1.fid=$fid   and a1.suppid = '$v_partyid' ");

  while($row1 = mysql_fetch_array($result01))
  {   
$bal = 0 - $row1[6] ;

$qry1="INSERT INTO ledger_rep(transactiondate, type, stkitm, billvoucher, greqty, billqty, netqty, billed, debit, credit, balance,tid) VALUES 
('$row1[0]','Purchase','$row1[1]','$row1[2]','$row1[3]','','$row1[5]','','','$row1[6]',$bal,$tid)";
  
  if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
}



	$result01 = mysql_query("SELECT a1.transactiondate,a2.stockid,a1.billno,a2.bag,a2.grswght,
a2.billwght,a2.bilvalue,a1.partyname  FROM mandia4 a1,stock_ref a2 WHERE 
a1.a4id=a2.formid and a1.transactiondate between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')  
and a2.tempid='A4'  and a1.fid=$fid   and a1.ledgername_n = '$v_partyid' ");

  while($row1 = mysql_fetch_array($result01))
  {   
$bal = 0 - $row1[6] ;

$qry1="INSERT INTO ledger_rep(transactiondate, type, stkitm, billvoucher, greqty, billqty, netqty, billed, debit, credit, balance,tid) VALUES 
('$row1[0]','Purchase','$row1[1]','$row1[2]','$row1[3]','','$row1[5]','','','$row1[6]',$bal,$tid)";
  
  if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
}


	$result01 = mysql_query("SELECT a1.transactiondate,a2.stockid,a1.billno,a2.bag,a2.grswght,
a2.billwght,a2.bilvalue,a1.partyname  FROM mandia4 a1,stock_ref a2 WHERE 
a1.a4id=a2.formid and a1.transactiondate between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')  
and a2.tempid='A4'  and a1.fid=$fid   and a1.brkid = '$v_partyid' ");

  while($row1 = mysql_fetch_array($result01))
  {   
$bal = 0 - $row1[6] ;

$qry1="INSERT INTO ledger_rep(transactiondate, type, stkitm, billvoucher, greqty, billqty, netqty, billed, debit, credit, balance,tid) VALUES 
('$row1[0]','Purchase','$row1[1]','$row1[2]','$row1[3]','','$row1[5]','','','$row1[6]',$bal,$tid)";
  
  if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
}




  
  



	
/*	$result18 = mysql_query("SELECT a1.date,a2.stockid,a1.billno,a1.bag1,a1.grossweight1,
a1.billweight,a1.billvalue1,a1.partyname FROM mandia6 a1,stock_ref a2 WHERE a1.siid=a2.formid and a1.date 
between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')  
and a2.tempid='A6'  and a1.fid=$fid and a1.supid = '$v_partyid'");
*/

	$result18 = mysql_query("SELECT a1.date,a2.stockid,a1.billno,a2.bag,a2.grswght, a2.billwght,a2.bilvalue,a1.partyname FROM mandia6 a1,stock_ref a2 WHERE a1.siid=a2.formid and a1.date 
between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')  
and a2.tempid='A6'  and a1.fid=$fid and a1.supid = '$v_partyid'");



while($row2 = mysql_fetch_array($result18))
  {   
 $bal = $row2[6] - 0;
 
$qry2="INSERT INTO ledger_rep(transactiondate, type, stkitm, billvoucher, greqty, billqty, netqty, billed, debit, credit, balance,tid) VALUES 
('$row2[0]','Sales','$row2[1]','$row2[2]','$row2[3]','','$row2[5]','','$row2[6]','',$bal,$tid)"; 


  if (!mysql_query($qry2,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
}


	
	$result18 = mysql_query("SELECT a1.date,a2.stockid,a1.billno,a2.bag,a2.grswght, a2.billwght,a2.bilvalue,a1.partyname 
	FROM mandia6 a1,stock_ref a2 WHERE a1.siid=a2.formid and a1.date 
between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')  
and a2.tempid='A6'  and a1.fid=$fid and a1.ledgername_n = '$v_partyid'");


while($row2 = mysql_fetch_array($result18))
  {   
 $bal = $row2[6] - 0;
 
$qry2="INSERT INTO ledger_rep(transactiondate, type, stkitm, billvoucher, greqty, billqty, netqty, billed, debit, credit, balance,tid) VALUES 
('$row2[0]','Sales','$row2[1]','$row2[2]','$row2[3]','','$row2[5]','','$row2[6]','',$bal,$tid)"; 


  if (!mysql_query($qry2,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
}


	$result18 = mysql_query("SELECT a1.date,a2.stockid,a1.billno,a2.bag,a2.grswght, a2.billwght,a2.bilvalue,a1.partyname 
	FROM mandia6 a1,stock_ref a2 WHERE a1.siid=a2.formid and a1.date 
between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')  
and a2.tempid='A6'  and a1.fid=$fid and a1.brkid = '$v_partyid'");


while($row2 = mysql_fetch_array($result18))
  {   
 $bal = $row2[6] - 0;
 
$qry2="INSERT INTO ledger_rep(transactiondate, type, stkitm, billvoucher, greqty, billqty, netqty, billed, debit, credit, balance,tid) VALUES 
('$row2[0]','Sales','$row2[1]','$row2[2]','$row2[3]','','$row2[5]','','$row2[6]','',$bal,$tid)"; 


  if (!mysql_query($qry2,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
}










$result15= mysql_query("SELECT  suppliername,total,saudadate FROM mandia7 where fid=$fid and saudadate between
 STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y') and supid = '$v_partyid' ");


 
 while($row2 = mysql_fetch_array($result15))
  {   
  $bal = $row2[1] - 0;
 

$qry3="INSERT INTO ledger_rep(transactiondate, type, stkitm, billvoucher, greqty, billqty, netqty, billed, debit, credit, balance,tid) VALUES 
('$row2[2]','Payment','','','','','','','$row2[1]','',$bal,$tid)"; 


  if (!mysql_query($qry3,$connection))
  {
  die('Error: ' . mysql_error());
  }

  
}


  
  
$result17= mysql_query("SELECT  suppliername,total,saudadate FROM mandia8 where fid=$fid and 
saudadate between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')   and supid = '$v_partyid'  ");

 
  
   while($row2 = mysql_fetch_array($result17))
  {   
   $bal = 0-$row2[1];
 

$qry4="INSERT INTO ledger_rep(transactiondate, type, stkitm, billvoucher, greqty, billqty, netqty, billed, debit, credit, balance,tid) VALUES 
('$row2[2]','Fund Receipt','','','','','','','','$row2[1]',$bal,$tid)"; 


  if (!mysql_query($qry4,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
}




  // **********************************************
  

	
  
$result19= mysql_query("SELECT trans_date,debitvalue from mandi15 where fid=$fid and trans_date 
between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y') and debitid = '$v_partyid'  ");

  
   while($row2 = mysql_fetch_array($result19))
  {   
   $bal = $row2[1] -0;
 

$qry4="INSERT INTO ledger_rep(transactiondate, type, stkitm, billvoucher, greqty, billqty, netqty, billed, debit, credit, balance,tid) VALUES 
('$row2[0]','Expenses','','','','','','','$row2[1]','',$bal,$tid)"; 


  if (!mysql_query($qry4,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
}




//******

	
  
$result19= mysql_query("SELECT trans_date,credvalue from mandi15 where fid=$fid and trans_date 
between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y') and creditid = '$v_partyid'  ");

  
   while($row2 = mysql_fetch_array($result19))
  {   
   $bal = $row2[1] -0;
 

$qry4="INSERT INTO ledger_rep(transactiondate, type, stkitm, billvoucher, greqty, billqty, netqty, billed, debit, credit, balance,tid) VALUES 
('$row2[0]','Expenses','','','','','','','','$row2[1]',$bal,$tid)"; 

  if (!mysql_query($qry4,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
}





//******


//  sudhir





$result13 = mysql_query("SELECT DATE_FORMAT(transactiondate,'%d/%m/%Y') , type, stkitm, billvoucher, greqty, billqty, netqty, billed, debit, credit FROM ledger_rep where tid = $tid order by transactiondate ");
$i = 0;
$jk = 0;
$open_balane_new = $v_party_balance;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1;   ?>
  
  
 <tr>
   
   <td><input type = "text" size="9" readonly name = "tdate<?=  $i ?>" value = "<?= $row13['0'] ?>" />   </td>
   <td> <input type = "text" size="20" readonly name = "ttype<?=  $i ?>" value = "<?= $row13['1'] ?>" />  </td>
   <td> <input type = "text" size="20" readonly name = "tstkitem<?=  $i ?>" value = "<?= $row13['2'] ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "tbillvouch<?=  $i ?>" value = "<?= $row13['3'] ?>" />  </td>
   <td><input type = "text" size="7" readonly name = "tgrossqty<?=  $i ?>" value = "<?= $row13['4'] ?>" />   </td>
   <td> <input type = "text" size="7" readonly name = "tbillqty<?=  $i ?>" value = "<?= $row13['5'] ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "tnetqty<?=  $i ?>" value = "<?= $row13['6'] ?>"/>  </td>
   <td> <input type = "text" size="7" readonly name = "tbilled<?=  $i ?>" value = "<?= $row13['7'] ?>" />  </td>
   <td><input type = "text" size="7" readonly name = "tdebit<?=  $i ?>" value = "<?= $row13['8'] ?>" />   </td>
   <td> <input type = "text" size="7" readonly name = "tcerdit<?=  $i ?>" value = "<?= $row13['9'] ?>" />  </td>
   
   <?php   

      
	  
	     if ($v_crdr == 'DR')
		 {
			$close_balance = ($row13['9'] -  $row13['8']) + $jk - $open_balane_new; 
			
			echo $close_balance;
			 
		 }
         
	  if ($v_crdr == 'CR')
		 {
			$close_balance = ($row13['9'] -  $row13['8']) + $jk + $open_balane_new; 
			 
		 }
   
   
          

   ?>
   
   
   <td> <input type = "text" size="7" readonly name = "tbalance<?=  $i ?>" value = "<?= $close_balance ?>" />  </td>
   
  
      
   
</tr>
   
<?php 

 $jk = $close_balance;
 $open_balane_new = 0;
 }
?>


</table>
</br>

 <input type = "hidden"  width="30" name = "totalcnt" id = "totalcnt" value=<?=  $i ?> /> 
 
  <input type = "hidden"  width="30" name = "opbalance" id = "opbalance" value = <?php echo $v_party_balance ?> />
<input type = "hidden"  width="30" name = "opcrdr" id = "opcrdr" value = <?php echo $v_crdr ?> />  

</div>
  



</div>






</div>
</div>
</div>
<script>
window.onload=happycode1234 ; 
</script>

</form>

<?php } ?>


</div>
</div>
</div>


  
</div>
</body>
</html>

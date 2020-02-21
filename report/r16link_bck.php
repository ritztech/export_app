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
</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/menu1.php');?>
<div id="gutter"></div>
<div id="gutter">


  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<div id="col4">
  <h2 align="center"><span style="color:#F17327;"> PURCHASE REGISTER REPORTS FROM FARMERS </span>
    <script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
</h2>
 
    <form name = "form1"  method="get"  action="<?php echo $_SERVER['PHP_SELF']; ?>">

</br>


<div id="p1itemcontainer"> 


	<div class="empleftDiv">
    <font color="blue"> 
    
    </font>
    <table width="979" border="1" cellpadding="2" frame="box" rules="none">
	
<tr>
<td></td><td><div align="right"><span class="style4">SELECT DATE RANGE</span></div></td>
<td colspan="2"><div align="left"></div></td>
</tr>


<tr>
  <td width="189">&nbsp;</td>
  <td width="214">START DATE </td>
  <td width="516">END DATE </td>
  <td width="516">SELECT PARTY NAME </td>
  </tr>
<tr>
  <td height="41">&nbsp;</td>
<td> <input id="dstart"  name = "dstart"   type = "text"  size="15"  value="DD/MM/YYYY" />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
<td><input id="dend"  name = "dend"   type = "text"  size="15"  value="DD/MM/YYYY" />  <a href="javascript:NewCal('dend','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
<td><select name="suppliername" style="width:170px">
                       <option> </option>
                       <?php               
				$query = mysql_query("SELECT * FROM supplier where fid='$fid'");
				while($row = mysql_fetch_array($query)){
					$supid = $row['supid'];
					$suppliername = $row['suppliername'];
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
$abc   = $_GET['suppliername'];

?>
<form name = "form2"   ><div id="purchasecontainer">
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


$result13 = mysql_query("SELECT DATE_FORMAT(a1.transactiondate,'%d/%m/%Y'),a2.stockid,a1.billno,a1.bag1,a1.grossweight1,
a1.billweight,a1.billvalue1,a1.partyname FROM mandia4 a1,stock_ref a2 WHERE a1.a4id=a2.formid and a1.transactiondate between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')  
and a2.tempid='A4'  and fid=$fid");
$aw=0;
$a=0;
$b=0;
$c=0;
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; 
$a=$a+$row13['3'];
$b=$b+$row13['5'];
$c=$c+$row13['6'];
 
  ?>
  
  
 <tr>
   
   <td><input type = "text" size="9" readonly name = "pdate<?=  $i ?>" value = "<?= $row13['0'] ?>" />   </td>
   <td> <input type = "text" size="10" readonly name = "pdate<?=  $i ?>" value = "<?php echo"Purchase" ?>" />  </td>
   <td> <input type = "text" size="10" readonly name = "vendor<?=  $i ?>" value = "<?= $row13['1'] ?> "/>  </td>
   <td> <input type = "text" size="7" readonly name = "receipt<?=  $i ?>" value = "<?= $row13['2'] ?>" />  </td>
   <td><input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?= $row13['3'] ?>" />   </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "------" />  </td>
   <td> <input type = "text" size="7" readonly name = "vendor<?=  $i ?>" value = "<?= $row13['5'] ?> "/>  </td>
   <td> <input type = "text" size="7" readonly name = "receipt<?=  $i ?>" value = "--------------" />  </td>
   <td><input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "------------" />   </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?= $row13['6'] ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "vendor<?=  $i ?>" value = ""/>  </td>
   
</tr>




   
<?php 

}
?>
 <tr>
   
   <td> </td>
   <td> </td>
   <td> </td>
   <td> Total  </td>
   <td><input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $a ?>" />   </td>
   <td> </td>
   <td> <input type = "text" size="7" readonly name = "vendor<?=  $i ?>" value = "<?php echo $b ?>"/>  </td>
   <td></td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $aw ?>" /> </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $c ?>" />  </td>
   <td>  <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $aw-$c ?>" /> </td>
   
</tr>
<?php


$result18 = mysql_query("SELECT DATE_FORMAT(a1.date,'%d/%m/%Y'),a2.stockid,a1.billno,a1.bag1,a1.grossweight1,
a1.billweight,a1.billvalue1,a1.partyname FROM mandia6 a1,stock_ref a2 WHERE a1.siid=a2.formid and a1.date between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')  
and a2.tempid='A6'  and fid=$fid");

$ab=0;
$bc=0;
$cd=0;
$i = 0;
while($row18 = mysql_fetch_array($result18))
  {   $i = $i + 1; 
$ab=$ab+$row18['3'];
$bc=$bc+$row18['5'];
$cd=$cd+$row18['6'];
 
  ?>
  
  
 <tr>
   
   <td><input type = "text" size="9" readonly name = "pdate<?=  $i ?>" value = "<?= $row18['0'] ?>" />   </td>
   <td> <input type = "text" size="10" readonly name = "pdate<?=  $i ?>" value = "<?php echo"Sales" ?>" />  </td>
   <td> <input type = "text" size="10" readonly name = "vendor<?=  $i ?>" value = "<?= $row18['1'] ?> "/>  </td>
   <td> <input type = "text" size="7" readonly name = "receipt<?=  $i ?>" value = "<?= $row18['2'] ?>" />  </td>
   <td><input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?= $row18['3'] ?>" />   </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "------" />  </td>
   <td> <input type = "text" size="7" readonly name = "vendor<?=  $i ?>" value = "<?= $row18['5'] ?> "/>  </td>
   <td> <input type = "text" size="7" readonly name = "receipt<?=  $i ?>" value = "--------------" />  </td>
   <td><input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?= $row18['6'] ?>" />   </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "" />  </td>
   <td> <input type = "text" size="7" readonly name = "vendor<?=  $i ?>" value = " "/>  </td>
   
</tr>




   
<?php 

}
?>
<tr>
   
   <td> </td>
   <td> </td>
   <td> </td>
   <td> Total  </td>
   <td><input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $ab ?>" />   </td>
   <td> </td>
   <td> <input type = "text" size="7" readonly name = "vendor<?=  $i ?>" value = "<?php echo $bc ?>"/>  </td>
   <td></td>
   
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $cd ?>" />  </td>
   <td><input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $aw ?>" /> </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $cd-$aw ?>" /> </td>
   
</tr>
<?php


$result15= mysql_query("SELECT  suppliername,total,DATE_FORMAT(saudadate,'%d/%m/%Y') FROM mandia7 where fid=$fid and saudadate between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')");


$cde=0;
$i = 0;
while($row15 = mysql_fetch_array($result15))
  {   $i = $i + 1; 

$cde=$cde+$row15['1'];
 
  ?>
  
  
 <tr>
   
   <td><input type = "text" size="9" readonly name = "pdate<?=  $i ?>" value = "<?= $row15['2'] ?>"/>   </td>
   <td> <input type = "text" size="10" readonly name = "pdate<?=  $i ?>" value = "Payment"  />  </td>
   <td> <input type = "text" size="10" readonly name = "vendor<?=  $i ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "receipt<?=  $i ?>"  />  </td>
   <td><input type = "text" size="7" readonly name = "pdate<?=  $i ?>"  />   </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>"  />  </td>
   <td> <input type = "text" size="7" readonly name = "vendor<?=  $i ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "receipt<?=  $i ?>"  />  </td>
   <td><input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?= $row15['1'] ?>" />   </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>"  />  </td>
   <td> <input type = "text" size="7" readonly name = "vendor<?=  $i ?>" />  </td>
   
</tr>




   
<?php 

}
?>
<tr>
   
   <td> </td>
   <td> </td>
   <td> </td>
   <td> Total  </td>
   <td>  </td>
   <td> </td>
   <td></td>
   <td></td>
   
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $cde ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $aw ?>" /></td>
   <td>  <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $cde-$aw ?>" /></td>
   
</tr>
<?php


$result17= mysql_query("SELECT  suppliername,total,DATE_FORMAT(saudadate,'%d/%m/%Y') FROM mandia8 where fid=$fid and saudadate between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')");

$as=0;
$i = 0;
while($row17 = mysql_fetch_array($result17))
  {   $i = $i + 1; 
$as=$as+$row17['1'];
 
  ?>
  
  
 <tr>
   
   <td><input type = "text" size="9" readonly name = "pdate<?=  $i ?>" value = "<?= $row17['2'] ?>"/>   </td>
   <td> <input type = "text" size="10" readonly name = "pdate<?=  $i ?>" value = "Fund Receipt"  />  </td>
   <td> <input type = "text" size="10" readonly name = "vendor<?=  $i ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "receipt<?=  $i ?>"  />  </td>
   <td><input type = "text" size="7" readonly name = "pdate<?=  $i ?>"  />   </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>"  />  </td>
   <td> <input type = "text" size="7" readonly name = "vendor<?=  $i ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "receipt<?=  $i ?>"  />  </td>
   <td><input type = "text" size="7" readonly name = "pdate<?=  $i ?>"  />   </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?= $row17['1'] ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "vendor<?=  $i ?>" />  </td>
   
</tr>




   
<?php 

}
?>
<tr>
   
   <td> </td>
   <td> </td>
   <td> </td>
   <td> Total  </td>
   <td>  </td>
   <td> </td>
   <td></td>
   <td></td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $aw ?>" /></td>
   
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $as ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $aw-$as ?>" /> </td>
   
</tr>
<?php


$result19= mysql_query("SELECT DATE_FORMAT(date,'%d/%m/%Y'),value from mandi15 where fid=$fid and date between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')");

$asz=0;
$i = 0;
while($row19 = mysql_fetch_array($result19))
  {   $i = $i + 1;
$asz=$asz+$row19['1']; 
 
  ?>
  
  
 <tr>
   
   <td><input type = "text" size="9" readonly name = "pdate<?=  $i ?>" value = "<?= $row19['0'] ?>"/>   </td>
   <td> <input type = "text" size="10" readonly name = "pdate<?=  $i ?>" value = "Expenses"  />  </td>
   <td> <input type = "text" size="10" readonly name = "vendor<?=  $i ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "receipt<?=  $i ?>"  />  </td>
   <td><input type = "text" size="7" readonly name = "pdate<?=  $i ?>"  />   </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>"  />  </td>
   <td> <input type = "text" size="7" readonly name = "vendor<?=  $i ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "receipt<?=  $i ?>"  />  </td>
   <td><input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?= $row19['1'] ?>" />   </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>"  />  </td>
   <td> <input type = "text" size="7" readonly name = "vendor<?=  $i ?>" />  </td>
   
</tr>




   
<?php 

}
?>
<tr>
   
   <td> </td>
   <td> </td>
   <td> </td>
   <td> Total  </td>
   <td>  </td>
   <td> </td>
   <td></td>
   <td></td>
   
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $asz ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $aw ?>" /></td>
   <td>  <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $asz-$aw ?>" /></td>
   
</tr>
<?php


$result20= mysql_query("SELECT DATE_FORMAT(tdate,'%d/%m/%Y'),tpaid from mandia9 where fid=$fid and tdate
 between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')");

$asz2=0;
$i = 0;
while($row20= mysql_fetch_array($result20))
  {   $i = $i + 1;
$asz2=$asz2+$row20['1']; 
 
  ?>
  
  
 <tr>
   
   <td><input type = "text" size="9" readonly name = "pdate<?=  $i ?>" value = "<?= $row20['0'] ?>"/>   </td>
   <td> <input type = "text" size="10" readonly name = "pdate<?=  $i ?>" value = "Debit"  />  </td>
   <td> <input type = "text" size="10" readonly name = "vendor<?=  $i ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "receipt<?=  $i ?>"  />  </td>
   <td><input type = "text" size="7" readonly name = "pdate<?=  $i ?>"  />   </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>"  />  </td>
   <td> <input type = "text" size="7" readonly name = "vendor<?=  $i ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "receipt<?=  $i ?>"  />  </td>
   <td><input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?= $row20['1'] ?>" />   </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>"  />  </td>
   <td> <input type = "text" size="7" readonly name = "vendor<?=  $i ?>" />  </td>
   
</tr>




   
<?php 

}
?>
<tr>
   
   <td> </td>
   <td> </td>
   <td> </td>
   <td> Total  </td>
   <td>  </td>
   <td> </td>
   <td></td>
   <td></td>
   
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $asz2 ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $aw ?>" /></td>
   <td>  <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $asz2-$aw ?>" /></td>
   
</tr>
<?php


$result21= mysql_query("SELECT DATE_FORMAT(tdate,'%d/%m/%Y'),tpaid from mandia10 where fid=$fid and tdate
 between STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y')");

$asz1=0;
$i = 0;
while($row21 = mysql_fetch_array($result21))
  {   $i = $i + 1;
$asz1=$asz1+$row21['1']; 
 
  ?>
  
  
 <tr>
   
   <td><input type = "text" size="9" readonly name = "pdate<?=  $i ?>" value = "<?= $row21['0'] ?>"/>   </td>
   <td> <input type = "text" size="10" readonly name = "pdate<?=  $i ?>" value = "Credit"  />  </td>
   <td> <input type = "text" size="10" readonly name = "vendor<?=  $i ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "receipt<?=  $i ?>"  />  </td>
   <td><input type = "text" size="7" readonly name = "pdate<?=  $i ?>"  />   </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>"  />  </td>
   <td> <input type = "text" size="7" readonly name = "vendor<?=  $i ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "receipt<?=  $i ?>"  />  </td>
   <td><input type = "text" size="7" readonly name = "pdate<?=  $i ?>"  />   </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?= $row21['1'] ?>"  />  </td>
   <td> <input type = "text" size="7" readonly name = "vendor<?=  $i ?>" />  </td>
   
</tr>




   
<?php 

}
?>
<tr>
   
   <td> </td>
   <td> </td>
   <td> </td>
   <td> Total  </td>
   <td>  </td>
   <td> </td>
   <td></td>
   <td></td>
   
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $aw ?>" /> </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $asz1 ?>" /> </td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?php echo $aw-$asz1 ?>" /> </td>
   
</tr>
</table>
</div>
</br>

 <input class = noPrint type = "hidden"  width="30" name = "totalcnt" id = "totalcnt" value=<?=  $i ?> /> 









</div>






</div>
</div>
</div>

</form>

<?php } ?>


</div>
</div>
</div>


  
</div>
<?php include('../include/footer.php');?>
</body>
</html>

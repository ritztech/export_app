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
<?php include('../include/sidemenu.php');?>

<div align="center">
<br>
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
<td><div align="left"></div></td>
</tr>


<tr>
  <td width="189">&nbsp;</td>
  <td width="214">START DATE </td>
  <td width="516">END DATE </td>
  </tr>
<tr>
  <td height="41">&nbsp;</td>
<td> <input id="dstart"  name = "dstart"   type = "text"  size="15"  value="DD/MM/YYYY" />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
<td><input id="dend"  name = "dend"   type = "text"  size="15"  value="DD/MM/YYYY" />  <a href="javascript:NewCal('dend','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
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


$result14=mysql_query("SELECT stockitem, DATE_FORMAT(paymentdate,'%d/%m/%Y'), sum( purchaseqtl ),sum(purchaseqtl*rate),sum(hammali),sum((purchaseqtl*rate)-hammali)
FROM manditaxablepurchase WHERE paymentdate between STR_TO_DATE('$st_1','%d/%m/%Y')  and STR_TO_DATE('$end_1','%d/%m/%Y') and fid=$fid
GROUP BY stockitem, paymentdate
ORDER BY paymentdate, stockitem");
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
 
 

<tr bgcolor="#14C4B6" style=" text-align:center; text-shadow:#14C4B6"> <th> <span class="style3">Date</span> </th> 
<th> <span class="style3">Stock Item</span> </th> 
 <th> <span class="style3">Farmer Name Surname & Address </span> </th> 
<th> <span class="style3">Boucher No</span> </th>  
<th> <span class="style3">Contract No</span> </th>
  <th> <span class="style3">Billed Qty </span></th> 
 <th> <span class="style3">Actual Qty</span> </th>  
 <th> <span class="style3">Rate </span> </th>
  <th> <span class="style3">Purchase E Value</span> </th> 
   <th><span class="style3"> Hammali</span> </th> 
 <th> <span class="style3">Net Purchase E Value</span> </th>
  </tr> 

<?php

while($row14 = mysql_fetch_array($result14))

{

$result13 = mysql_query("SELECT `fid`, `mtpid`, `paymentno`,DATE_FORMAT(paymentdate,'%d/%m/%Y'),
 `contact`, `farmername`, `surname`, `villagename`, `stockitem`, `estimateqty`, `purchaseqtl`, `rate`,
 `hammali`, `hdenometer`, `alock`, `entrydate` FROM `manditaxablepurchase`
 WHERE paymentdate =  STR_TO_DATE('$row14[1]','%d/%m/%Y') and stockitem='$row14[0]' and fid=$fid");


$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; 
  $a=$row13['10'];
  $b=$row13['11'];
  $c=$a*$b;
  $d=$row13['12'];
  $er=$c-$d;
  
  
  $addr="$row13[5] $row13[6] $row13[7]";
  ?>
  
  
 <tr>
   
   <td><input type = "text" size="14" readonly name = "pdate<?=  $i ?>" value = "<?= $row13['3'] ?>" />   </td>
   <td> <input type = "text" size="14" readonly name = "pdate<?=  $i ?>" value = "<?= $row13['8'] ?>" />  </td>
   <td> <input type = "text" size="30" readonly name = "vendor<?=  $i ?>" value = "<?= $addr ?> "/>  </td>
   <td> <input type = "text" size="12" readonly name = "receipt<?=  $i ?>" value = "<?= $row13['2'] ?>" />  </td>
   <td> <input type = "text" size="12" readonly name = "ptype<?=  $i ?>" value = "<?= $row13['4'] ?>" />  </td>
   <td><font color="#663300">  <?= $row13['9']?>  </font></td>
   <td> <input type = "text" size="7" readonly name = "pdate<?=  $i ?>" value = "<?= $row13['10'] ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "vendor<?=  $i ?>" value = "<?= $row13['11'] ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "ptype<?=  $i ?>" value = "<?= $c ?>" />  </td>
   <td> <input type = "text" size="7" readonly name = "receipt<?=  $i ?>" value = "<?= $row13['12'] ?>" />  </td>
   
   <td> <input type = "text" size="10" readonly name = "total<?=  $i ?>" value = "<?= $er ?>" />  </td>
</tr>


   
<?php 
}
?>

<tr style=" background-color:#FFFF66">
<td></td>
<td colspan="4"></td>
<td> <strong>Total</strong></td>
<td> <?php echo round($row14[2],2); ?>  </td>
<td><div align="center">--</div></td>
<td> <?php echo round($row14[3],2); ?>  </td>
<td> <?php echo round($row14[4],2); ?>  </td>
<td>

 <?php echo round($row14[5],2); ?>  </td>
</tr>



<?php }	?>
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
</body>
</html>

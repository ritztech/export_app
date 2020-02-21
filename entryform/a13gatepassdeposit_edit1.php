<?php

include("../conf.php");

?>
<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }
$fid=$_SESSION['fid'];
?>
<?php 

if(isset($_POST['s'])) {
            $depositdate = $_POST['depositdate'];
            $totbilwght =  $_POST['totbilwght'];
            $totrot =  $_POST['totrot'];
            $totrog =  $_POST['totrog'];
            $a13refid = $_POST['a13refid'];
	$query = "UPDATE mandi13_ref SET	       
            depositdate =STR_TO_DATE('$depositdate','%d/%m/%Y'),           
			bagqty='$totbilwght',
			bagvalue='$totrot',
			goodsvalue='$totrog'			
            WHERE a13refid='$a13refid'";
	        mysql_query($query);
	// echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  

//  sudhir


	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
	$j = $_POST['totalcnt'];
	
	$qry1 = "delete  from  mandi13 WHERE gpid='$a13refid' ";
	
mysql_query($qry1,$connection);

	if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }   
    

for($i=2; $i <= $j; $i++) {
	
    $qry2="INSERT INTO `mandi13`(`gpid`, `fid`, `suppliername`, `stockitem`, `msamiti`, `gatepassno`, `bagqty`, `valueqty`, `goodsvalue`, `inwarddate`, `remark`) 
VALUES ($a13refid,$fid,'{$_POST['suppliername'.$i]}','{$_POST['item'.$i]}','{$_POST['msamiti'.$i]}' ,'{$_POST['gatepassno'.$i]}' ,'{$_POST['bagqty'.$i]}' ,'{$_POST['valueqty'.$i]}' ,'{$_POST['goodsvalue'.$i]}',STR_TO_DATE('{$_POST['inwarddate'.$i]}','%d/%m/%Y'),'{$_POST['remark'.$i]}' )";


//echo $qry2;
//echo "</br>";


		
	if (!mysql_query($qry2,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	     echo "<script>alert('Data updated successfully.');location.href='a13gatepassdeposit_edit.php?a13refid=$a13refid'</script>"; 
		  
  }  
  
  	
	
}

//  suhdir






   

}



?>
<?php

try {
$query = "SELECT `a13refid`,DATE_FORMAT(depositdate,'%d/%m/%Y') as depositdate, `bagqty`, `bagvalue`, `goodsvalue`, `fid` FROM `mandi13_ref`  WHERE a13refid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['a13refid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
          $depositdate =$row['depositdate'];
            $totbilwght =  $row['bagqty'];
            $totrot =  $row['bagvalue'];
            $totrog =  $row['goodsvalue'];
            $a13refid = $row['a13refid'];
} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>


<?php               
				$query123 = mysql_query("SELECT `fid`, `firmname`, `businessfirm`, `officeadd`, `shopadd`, `phonno`, `faxnumber`, `mobile`, `contactperson`, `firmtype`, `email`, `mpvat`, `midate`, `mandilicenseno`, `mandidate`, `cstno`, `cstdate`, `tinno`, `tindate`, `fssaino`, `fdate`, `otherdoc`, `propname`, `place`, `state`, `contactperson1`, `email1`, `itnumber`, `itndate`, `otherdoc1`, `pcontact`, `pstatus`, `bankname`, `banktype`, `bankaccnumber`, `ifsccode` FROM `firmcreation` WHERE  fid=$fid");
				while($row = mysql_fetch_array($query123)){
					
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
<link href="..//style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/a13code.js">  </script>
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>


<style type="text/css">
<!--
.style1 {font-size: x-large}
.style2 {font-size: large}
-->
</style>
</head>
<body>
<?php include('../include/header.php');?>
<?php include('../include/sidemenu.php');?>

<div align="center">
<br>
  <h2 align="center"><span style="color:#F17327;">MANDI GATE PASS DEPOSIT DETAILS</span>    </h2>
  <form id="form1" name="form1" method="post" action="">
  <div id = "griddiv">
  <table  border="1" cellpadding="6" frame="box" rules="none">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Gate Pass Details</h4></td>
        </tr>
        
        
        <tr>
          <td height="38" colspan="4"><table width="982" border='1' cellpadding='1'   id="dataTable"   >

  
  <tr>
    <td colspan="10"><table width="1030" border="1" rules="none">
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
	 
   </table>&nbsp;</td>
  </tr>
  <tr>
 <td colspan="10"><div align="center" class="style2">&#2326;&#2339;&#2381;&#2337; &lsquo;&lsquo;&#2326;&lsquo;&lsquo;</div></td>
</tr>
  <tr>
 <td colspan="10" ><div align="center"><span class="style1" style="color:#000000;"><span class="style2" style="color:#000000;">&#2346;&#2352;&#2367;&#2358;&#2367;&#2359;&#2381;&#2335; - &#2327;&#2381;&#2351;&#2366;&#2352;&#2361; &lsquo;</span>&lsquo;&#2326;</span>&lsquo;&lsquo;</div></td>
  </tr>
  <tr>
 <td colspan="2"><div align="center">
  &#2348;&#2381;&#2351;&#2366;&#2346;&#2366;&#2352;&#2368;/&#2325;&#2381;&#2352;&#2375;&#2340;&#2366; &#2325;&#2366; &#2344;&#2366;&#2350; 
  
  
 </div></td>
 
 <td colspan="2"><div align="center">&#2357;&#2367;&#2325;&#2381;&#2352;&#2351; &#2325;&#2366; &#2344;&#2350;&#2381;&#2348;&#2352; &#2319;&#2357;&#2306; &#2342;&#2367;&#2344;&#2366;&#2306;&#2325;</div></td>
 <td colspan="4"><div align="center">&#2325;&#2371;&#2359;&#2367; &#2313;&#2346;&#2332; &#2325;&#2366; &#2344;&#2366;&#2350;    &#2319;&#2357; &#2350;&#2366;&#2340;&#2381;&#2352;&#2366;</div></td>
 <td>&#2325;&#2371;&#2359;&#2367; &#2313;&#2346;&#2332; &#2350;&#2306;&#2339;&#2381;&#2337;&#2368; &#2325;&#2381;&#2359;&#2376;&#2340;&#2381;&#2352; &#2350;&#2306;&#2375; &#2310;&#2344;&#2375; &#2325;&#2366; &#2342;&#2367;&#2344;&#2366;&#2306;&#2325; &#2339;&#2381;&#2337;&#2368;</td>
 <td>&#2309;&#2344;&#2369;&#2332;&#2381;&#2334;&#2366;&#2346;&#2340;&#2381;&#2352; &#2346;&#2381;&#2352;&#2360;&#2381;&#2340;&#2369;&#2340; &#2325;&#2352;&#2344;&#2375; &#2325;&#2366; &#2342;&#2367;&#2344;&#2366;&#2306;&#2325; </td>
  </tr>
  <tr>
 <td colspan="2"></td>
 <td colspan="2"><div align="center">&#2309;&#2344;&#2369;&#2332;&#2381;&#2334;&#2366;-&#2346;&#2340;&#2381;&#2352;&#2344; &#2325;&#2381;&#2352;&#2350;&#2306;&#2366;&#2325;  &#2319;&#2357;&#2306; &#2342;&#2367;&#2344;&#2366;&#2306;&#2325;</div></td>
 <td></td>
 <td></td><td></td><td></td><td></td><td></td>
  </tr>
  <tr><td colspan="2"></td>
  <td colspan="2"><div align="center">&#2346;&#2306;&#2332;&#2368;&#2351;&#2344; &#2306;&#2344;&#2350;&#2381;&#2348;&#2352; &#2319;&#2357;&#2306; &#2342;&#2367;&#2344;&#2366;&#2306;&#2325;</div></td>
  <td></td>
  <td></td><td></td><td></td><td></td><td>
 
  </tr>
  <tr>
 <td colspan="2"></td>
 <td colspan="2"><div align="center">&#2346;&#2381;&#2352;&#2342;&#2375;&#2359; &#2325;&#2375; &#2348;&#2366;&#2361;&#2352; &#2346;&#2306;&#2332;&#2368;&#2351;&#2344; &#2306;&#2344;&#2350;&#2381;&#2348;&#2352; &#2319;&#2357;&#2306; &#2342;&#2367;&#2344;&#2366;&#2306;&#2325;</div></td>
 <td></td>
 <td></td><td></td><td></td><td></td><td></td>
  </tr>
  <tr>
 <td colspan="2"></td><td><div align="center"></div></td><td></td>
 <td>&#2313;&#2346;&#2332; &#2325;&#2366; &#2344;&#2366;&#2350; </td>
 <td>&#2348;&#2332;&#2344;

 </td>
 <td><div align="center">&#2350;&#2366;&#2340;&#2381;&#2352;&#2366;</div></td>
 <td><div align="center">&#2350;&#2370;&#2354;&#2381;&#2351;</div></td>
 <td></td><td></td>
  </tr>
  


  
  <?php 
//$result13 = mysql_query("SELECT `gpid`, `fid`, `suppliername`, `stockitem`, `msamiti`, `gatepassno`, `bagqty`, `valueqty`, `goodsvalue`, DATE_FORMAT(inwarddate,'%d/%m/%Y') as inwarddate, `remark` FROM `mandi13` WHERE gpid=$a13refid");


$result13 = mysql_query("SELECT ms.gpid, ms.fid, s1.leg_name  as suppliername, ms.stockitem, ms.msamiti, ms.gatepassno,
 ms.bagqty, ms.valueqty, ms.goodsvalue, DATE_FORMAT(ms.inwarddate,'%d/%m/%Y') as inwarddate, ms.remark 
 FROM mandi13 ms , ledger_master s1
 WHERE ms.suppid = s1.legid
 and ms.gpid=$a13refid");


 

?>
  <?php
 
$i = 1;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
 
 <tr>
   
   <td colspan="2"> <input type = "text" size="40"     name = "suppliername<?=  $i ?>" value = "<?= $row13['2'] ?>" />  </td>
   
   <td> <input type = "text" size="20"  name = "msamiti<?=  $i ?>" value = "<?= $row13['4'] ?>" />  </td>
   <td> <input type = "text" size="6"   name = "gatepassno<?=  $i ?>" value = "<?= $row13['5'] ?>" />  </td>
   <td> <input type = "text" size="15"     name = "item<?=  $i ?>" value = "<?= $row13['3'] ?>" /></td>
   <td> <input type = "text" size="5"  onkeyup = "itemcalc()"  name = "bagqty<?=  $i ?>" value = "<?= $row13['6'] ?>" />  </td>
   <td> <input type = "text" size="5" onkeyup = "itemcalc()"   name = "valueqty<?=  $i ?>" value = "<?= $row13['7'] ?>" />  </td>
   <td> <input type = "text" size="5" onkeyup = "itemcalc()"   name = "goodsvalue<?=  $i ?>" value = "<?= $row13['8'] ?>" />  </td>
   <td> <input type = "text" size="10"   name = "inwarddate<?=  $i ?>" value = "<?= $row13['9'] ?>" />  </td>
   <td><input  type = "text"  size = "10" name = "totrog" id = "totrog"  value="<?php echo $depositdate ?>"/> </td>
</tr>
 <?php  }    ?>
 <tr>
   <th width="317">Total</th> 
   <th></th>
   <th width="165">  </th>
   <th width="51">  </th> 
   <th width="121">&nbsp;</th>
   <th width="43"> <input  type = "text"  size = "5" name = "totbilwght" id = "totbilwght" value="<?php echo $totbilwght ?>" />     </th>
   <th width="55"> <input  type = "text"  size = "5" name = "totrot" id = "totrot" value="<?php echo $totrot ?>" />  </th>	
   <th width="43"> <input  type = "text"  size = "5" name = "totrog" id = "totrog"  value="<?php echo $totrog ?>"/>  </th>
   <th width="82">   </th> 
   <th width="94">  </th>
</tr>
</table> 
<input  type = "hidden"  size = "5" name = "totalcnt"  value=<?=  $i ?> id = "totalcnt" /> 
<input  type = "hidden"  size = "5" name = "a13refid" value="<?php echo $a13refid?>" /> 

 &nbsp;</td>
        </tr>      

      
    </table>

&nbsp;
</div>
<input type="button" name="btnprint" value="Print" onclick="PrintMe('griddiv')"/>
<input type="button" name="btnprint" value="New Entry" ONCLICK="window.location.href='a13gatepassdeposit_front.php'" />
<br>




</form>
</div>
</body>
</html>

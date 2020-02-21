<?phperror_reporting(0);
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

$fid=$_SESSION['fid'];
include("../conf.php");


?>

<?php 

if(isset($_POST['s'])) {
            $suppliername =$_POST['suppliername'];
            $brokername =$_POST['brokername'];
            $moisture =$_POST['moisture'];
            $dust =$_POST['dust'];
            $smallseed =$_POST['smallseed'];
            $splitseed =$_POST['splitseed'];
            $oil = $_POST['oil'];
            $quantity =$_POST['quantity'];
            $bag = $_POST['bag'];
            $packingterms =$_POST['packingterms'];
            $bagquality = $_POST['bagquality'];
            $rate = $_POST['rate'];
            $deleveryduedate =$_POST['deleveryduedate'];
            $paymentterms =$_POST['paymentterms'];
            $cashdcond = $_POST['cashdcond'];
            $modeofsupply =$_POST['modeofsupply'];
            $saudadate = $_POST['saudadate'];
            $stfcondition =$_POST['stfcondition11'];
            $mtfcondition = $_POST['mtfcondition11'];
            $etfcondition = $_POST['etfcondition11'];
			$saudashort = $_POST['saudashort'];
			$loadedfinal = $_POST['loadedfinal'];
			$totbag =  $_POST['totbag'];
            $totgrsweight =  $_POST['totgrsweight'];
            $totmandi =  $_POST['totmandi'];
            $totbilwght =  $_POST['totbilwght'];
            $totrot =  $_POST['totrot'];
            $totrog =  $_POST['totrog'];
            $totvalue =  $_POST['totvalue'];
            $totvto =  $_POST['totvto'];
            $totbillv =  $_POST['totbillv'];
            $soid = $_POST['soid'];
			$totalcnt = $_POST['totalcnt'];
			$totalcnt = $_POST['totalcnt'];
			$supp_id = $_POST['supp_id'];			$brkid111 = $_POST['brkid111'];									
			
			
			
	$query = "UPDATE mandia5 SET
	        suppliername ='$suppliername',
            brokername ='$brokername',
            moisture ='$moisture',
            dust ='$dust',
            smallseed ='$smallseed',
            splitseed ='$splitseed',
            oil = '$oil',
            quantity ='$quantity',
            bag = '$bag',
            packingterms ='$packingterms',
            bagquality = '$bagquality',
            rate = '$rate',
            deleveryduedate =STR_TO_DATE('$deleveryduedate','%d/%m/%Y'),
            paymentterms ='$paymentterms',
            cashdcond = '$cashdcond',
            modeofsupply ='$modeofsupply',
            saudadate = STR_TO_DATE('$saudadate','%d/%m/%Y'),
            stfcondition ='$stfcondition',
            mtfcondition = '$mtfcondition',
            etfcondition = '$etfcondition',
			saudashort = '$saudashort',
			loadedfinal='$loadedfinal',
			bag1='$totbag',
			grossweight1='$totgrsweight',
			mandigatepass1='$totmandi',
			billweight='$totbilwght',
			rateoftax1='$totrot',
			rateofgoods1='$totrog',
			value1='$totvalue',
			vattax1='$totvto',
			billvalue1='$totbillv',
			supid = '$supp_id',			brkid = $brkid111
            WHERE soid='$soid'";
			
	        mysql_query($query);
	 
	 //echo $query;
	 
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
    

        

		
		$j = $totalcnt;

	$qry1 = "delete  from  stock_ref WHERE formid=$soid and tempid='A5'";
	
mysql_query($qry1,$connection);

	if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  

for($i=2; $i <= $j; $i++) {
	
    $qry1="INSERT INTO stock_ref(formid, stockid, bag, grswght, mandiwght, billwght, rot, rog, vale, vtou, bilvalue,remark,tempid,stid,party_name,party_date,fid,w_per_bag)
VALUES ($soid,'{$_POST['stkname'.$i]}',{$_POST['bagg'.$i]},{$_POST['grsweight'.$i]},{$_POST['mandiwght'.$i]},{$_POST['billwght'.$i]},
        {$_POST['rattax'.$i]},{$_POST['ratgoods'.$i]},{$_POST['itvalue'.$i]},{$_POST['valuetaxout'.$i]},{$_POST['billvalue'.$i]},'{$_POST['remark'.$i]}','A5'		,'{$_POST['item'.$i]}','$suppliername',STR_TO_DATE('$saudadate','%d/%m/%Y'),$fid,'{$_POST['w_per_bag'.$i]}')";

	if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	  echo "<script>alert('Data updated successfully.');location.href='salesorder_view.php'</script>";
	  
	  
  }
  
  
  // New code for grid end
	
	
	
}

		
		
		
}
?>
<?php

try {
$query = "SELECT `soid`, `supid`, `fid`, `suppliername`, `brokername`, `moisture`, `dust`, `smallseed`, `splitseed`, `oil`, `quantity`, `bag`, `packingterms`, `bagquality`, `rate`,DATE_FORMAT(deleveryduedate,'%d/%m/%Y') as deleveryduedate, `paymentterms`, `cashdcond`, `modeofsupply`, DATE_FORMAT(saudadate,'%d/%m/%Y') as saudadate, `stfcondition`, `etfcondition`, `mtfcondition`, `saudashort`, `loadedfinal`, `entrydate`, `bag1`, `grossweight1`, `mandigatepass1`, `billweight`, `rateoftax1`, `rateofgoods1`, `value1`, `vattax1`, `billvalue1`,brkid FROM `mandia5` WHERE soid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['soid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
  $brkid111 =$row['brkid'];  $suppliername =$row['suppliername'];
            $brokername =$row['brokername'];
             $moisture =$row['moisture'];
            $dust =$row['dust'];
            $smallseed =$row['smallseed'];
            $splitseed =$row['splitseed'];
            $oil = $row['oil'];
            $quantity =$row['quantity'];
            $bag = $row['bag'];
            $packingterms =$row['packingterms'];
            $bagquality = $row['bagquality'];
            $rate = $row['rate'];
            $deleveryduedate =$row['deleveryduedate'];
            $paymentterms =$row['paymentterms'];
            $cashdcond = $row['cashdcond'];
            $modeofsupply =$row['modeofsupply'];
            $saudadate = $row['saudadate'];
            $stfcondition =$row['stfcondition'];
            $mtfcondition = $row['mtfcondition'];
            $etfcondition = $row['etfcondition'];
			$saudashort = $row['saudashort'];
			$loadedfinal = $row['loadedfinal'];
			$bag1 =  $row['bag1'];
            $grossweight1 =  $row['grossweight1'];
            $mandigatepass1 =  $row['mandigatepass1'];
            $billweight =  $row['billweight'];
            $rateoftax1 =  $row['rateoftax1'];
            $rateofgoods1 =  $row['rateofgoods1'];
            $value1 =  $row['value1'];
            $vattax1 =  $row['vattax1'];
            $billvalue1 =  $row['billvalue1'];
            $soid = $row['soid'];
			
			
			$stfcondition_qry  = mysql_query("SELECT 	salestaxform,taxid from taxform  where taxid = $stfcondition");
            $stfcondition  = mysql_fetch_array($stfcondition_qry);
			
					
			$mtfcondition_qry  = mysql_query("SELECT 	manditaxform,taxid from taxform  where taxid = $mtfcondition");
            $mtfcondition  = mysql_fetch_array($mtfcondition_qry);
			
			$etfcondition_qry  = mysql_query("SELECT 	entrytaxform,taxid from taxform  where taxid = $etfcondition");
            $etfcondition  = mysql_fetch_array($etfcondition_qry);
			
			
			
} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="..//style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/a4code.js">  </script>

<script type="text/javascript">


  function hledger(t_actual,t_value) {
	
 var idx = t_actual.selectedIndex;
	var content = t_actual.options[idx].innerHTML;
  
  document.form1.suppliername.value = content;
  
  document.form1.supp_id.value = t_value;
  
		
}






function phappycodebrk(thelist,l_value){	var idx = thelist.selectedIndex;	var content = thelist.options[idx].innerHTML;    document.form1.brokername.value = content;  document.form1.brkid111.value = l_value;      }


function phappycode2(){
document.form1.stockitem.value = document.form1.s3.value;
}
function phappycode3(){
document.form1.stfcondition11.value = document.form1.s11.value;
}

function phappycode4(){
document.form1.etfcondition11.value = document.form1.s12.value;
}


function phappycode5(){
document.form1.mtfcondition11.value = document.form1.s13.value;
}
function phappycode6(){
document.form1.status.value = document.form1.sta.value;
}function ValidateForm(){    var dt=document.form1.saudadate	    if (isDate(dt.value)==false){	           dt.focus()              return false    }		    var dt=document.form1.deleveryduedate	    if (isDate(dt.value)==false){	           dt.focus()              return false    }				return true  }
</script>


</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>
<div align="center"><br>
  <h2 align="center"><span style="color:#F17327;">Sales order edit form</span>    </h2>
<form id="form1" name="form1" onSubmit="return ValidateForm()" method="post" action="">
  <table width="988" border="1" cellpadding="5" frame="box" rules="none">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Basic Details</h4></td>
        </tr>
        <tr>
          <td width="167"><label for="select">Buyer Name:</label></td>
          <td colspan="2"><p>
            <input type="text" name="suppliername" readonly  value="<?php echo $suppliername; ?>" size="38" />
            <input type="hidden" name="soid" value="<?php echo $soid; ?>" />
          </p></td>
         
          <td width="391"> Change Buyer Name <select name="s1" onchange="hledger(this,this.value)">
                       <option>Select Supplier Name</option>
                       <?php               
				$query = mysql_query("SELECT legid,leg_name  FROM ledger_master where fid=$fid");
				while($row = mysql_fetch_array($query)){
					$supid = $row['legid'];
					$suppliername = $row['leg_name'];
			
	           echo"<option  value = $supid>$suppliername</option>"; 
                        } ?>
                     
                     </select>   <input type="hidden" name="supp_id" id="supp_id"  />   </td>
        </tr>
        <tr>
          <td>Broker Name:</td>
          <td colspan="2"><input type="text" name="brokername" value="<?php echo $brokername; ?>" size="38" /></td>
          
          <td> Change Broker<select name="s2" onchange="phappycodebrk(this,this.value)">
                       <option>Select Broker Name</option>
                       <?php               
				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and broker =1");
				while($row = mysql_fetch_array($query)){
					$brid = $row['legid'];
					$brokername = $row['leg_name'];
			?>
                       <option value = "<?php echo $brid; ?>" > <?php echo $brokername; ?></option>
                       <?php } ?>
                     
          </select></td>
        </tr>
        <tr>
          <td colspan="4">
		  
		  <INPUT type="button" value="ADD ITEM" onclick="addRow('dataTable',<?php echo $fid; ?>);" />
		  
		  
		  <table width="982" border='1' cellpadding='1'   id="dataTable"   >

  <tr>
   <th>TOTAL</th> 
   <th> <input  type = "text"  size = "3" name = "totbag" id = "totbag" value="<?php echo $bag1; ?>" /> </th>   <th>   </th>
   <th> <input  type = "text"  size = "5" name = "totgrsweight" id = "totgrsweight" value="<?php echo $grossweight1; ?>" /> </th>
   <th> <input  type = "text"  size = "5" name = "totmandi" id = "totmandi" value="<?php echo $mandigatepass1; ?>" />  </th> 
   <th> <input  type = "text"  size = "5" name = "totbilwght" id = "totbilwght" value="<?php echo $billweight; ?>" />     </th>
   <th> <input  type = "text"  size = "5" name = "totrot" id = "totrot" value="<?php echo $rateoftax1; ?>" />  </th>	
   <th> <input  type = "text"  size = "5" name = "totrog" id = "totrog" value="<?php echo $rateofgoods1; ?>" />  </th>
   <th> <input  type = "text"  size = "5" name = "totvalue" id = "totvalue" value="<?php echo $value1; ?>" />  </th> 
   <th> <input  type = "text"  size = "5" name = "totvto" id = "totvto" value="<?php echo $vattax1; ?>" />  </th>
    <th> <input  type = "text"  size = "5" name = "totbillv" id = "totbillv" value="<?php echo $billvalue1; ?>" />  </th>
</tr>

<tr>
 

  <th>ITEM NAME</th> <th>BAG</th>   <th>Weight Per Bag in KG</th> <th>GROSS WEIGHT</th> <th> MANDI GATE PASS WT </th> <th>  BILLING WEIGHT </th>	<th> VAT(in %) </th>	<th> RATE OF GOODS </th>	<th>VALUE </th>	<th>VAT TAX</th>	<th>BILL VALUE</th> <th>REMARK</th>
  </tr>
  <?php 
$result13 = mysql_query("SELECT `stockid`, `bag`, `grswght`, `mandiwght`, `billwght`, `rot`, `rog`, `vale`, `vtou`, `bilvalue`, `remark` ,stid,w_per_bag FROM `stock_ref` WHERE formid=$soid
and tempid='A5'");
?>


</table>

<input  type = "hidden"  size = "5" name = "totalcnt"  value=<?=  $i ?> id = "totalcnt" />		  </td>
        </tr>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Quality Norms</h4></td>
        </tr>
        <tr>
          <td><label for="textfield">Moisture%:</label></td>
          <td width="250"><input type="text" name="moisture" value="<?php echo $moisture; ?>"/></td>
          <td width="162"><label for="textfield2">Dust(Sand)%:</label></td>
          <td><input type="text" name="dust" id="textfield2" value="<?php echo $dust; ?>" /></td>
        </tr>
        <tr>
          <td><label for="textfield3">Small Seed%:</label></td>
          <td><input type="text" name="smallseed" id="textfield3" value="<?php echo $smallseed; ?>" /></td>
          <td><label for="textfield4">Split Seed%:</label></td>
          <td><input type="text" name="splitseed" id="textfield4" value="<?php echo $splitseed; ?>" /></td>
        </tr>
        <tr>
          <td><label for="textfield5">Oil%:</label></td>
          <td><input type="text" name="oil" id="textfield5" value="<?php echo $oil; ?>" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="textfield6">Quantity:</label></td>
          <td><p>
            <input type="text" name="quantity" id="textfield6" value="<?php echo $quantity; ?>" />
          </p></td>

          <td>Bag:</td>
          <td><input type="text" name="bag" id="textfield7" value="<?php echo $bag; ?>" /></td>
        </tr>
        <tr>
          <td>Packing Term:</td>
          <td><input type="text" name="packingterms" id="textfield8" value="<?php echo $packingterms; ?>" /></td>
          <td>Bag Quality:</td>
          <td><input type="text" name="bagquality" id="textfield9" value="<?php echo $bagquality; ?>" /></td>
        </tr>
        <tr>
          <td>Rate/Qty:</td>
          <td><input type="text" name="rate" id="textfield10" value="<?php echo $rate; ?>" /></td>
          <td><label for="textfield11">Delivery Due Date:</label></td>
          <td><input id="dstart"   name = "deleveryduedate"  onchange = "isDate(this.value)"  type = "text"  size="17"  value="<?php echo $deleveryduedate; ?>"  />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div></td>
        </tr>
        <tr>
          <td>Payment Terms:</td>
          <td><input type="text" name="paymentterms" id="textfield12" value="<?php echo $paymentterms; ?>" /></td>
          <td>Cash Discount Conditions:</td>
          <td><input type="text" name="cashdcond" id="textfield14" value="<?php echo $cashdcond; ?>" /></td>
        </tr>
        <tr>
          <td>Mode Of Supply:</td>
          <td><input type="text" name="modeofsupply" id="textfield13" value="<?php echo $modeofsupply; ?>" /></td>
          <td>Sauda Date:</td>
          <td><input id="saudadate"   name = "saudadate" onchange = "isDate(this.value)"   type = "text"  size="17"  value="<?php echo $saudadate; ?>"  />  <a href="javascript:NewCal('saudadate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Tax Form Conditon</h4></td>
        </tr>
        <tr>
          <td><label for="select4">Sales Tax:</label></td>
          <td><input type="text" name="stfcondition" value="<?php echo $stfcondition['0']; ?>" /> 		  <input type="hidden" name="stfcondition11" value="<?php echo $stfcondition['1']; ?>" /> </td>
          <td>Sales Tax:</td>
          <td><select name="s11" onchange="phappycode3()">
                       <option>Select Sales Tax</option>
                       <?php               
				$query = mysql_query("SELECT * FROM taxform ");
				while($row = mysql_fetch_array($query)){
					$taxid = $row['taxid'];
					$salestaxform = $row['salestaxform'];
					
			?>
                      <option  value = <?php echo $taxid; ?> ><?php echo $salestaxform; ?></option>
                       <?php } ?>
                     
          </select></td>
        </tr>
        <tr>
          <td>Entry Tax:</td>
          <td><input type="text" name="etfcondition" value="<?php echo $etfcondition['0']; ?>" />		  <input type="hidden" name="etfcondition11" value="<?php echo $etfcondition['1']; ?>" /></td>
          <td>Entry Tax:</td>
          <td><select name="s12" onchange="phappycode4()" >
          <option>Select Entry Tax</option>
         <?php               
				$query = mysql_query("SELECT * FROM taxform ");
				while($row = mysql_fetch_array($query)){
					$taxid = $row['taxid'];
					
					$entrytaxform = $row['entrytaxform'];
					
			?>
                      <option  value = <?php echo $taxid; ?> ><?php echo $entrytaxform; ?></option>
                       <?php } ?>
                     
          </select></td>
        </tr>
        <tr>
          <td>Mandi Tax:</td>
          <td><input type="text" name="mtfcondition" value="<?php echo $mtfcondition['0']; ?>" />		  <input type="hidden" name="mtfcondition11" value="<?php echo $mtfcondition['1']; ?>" /></td>
          <td>Mandi Tax:</td>
          <td><select name="s13" onchange="phappycode5()">
          <option>Select Mandi Tax</option>
           <?php               
				$query = mysql_query("SELECT * FROM taxform ");
				while($row = mysql_fetch_array($query)){
					$taxid = $row['taxid'];
					
					$manditaxform = $row['manditaxform'];
					
			?>
                      <option  value = <?php echo $taxid; ?> ><?php echo $manditaxform; ?></option>
                       <?php } ?>
          </select>          </td>
        </tr>
        <tr>
          <td>Sauda Short</td>
          <td><input type="text" name="saudashort" value="<?php echo $saudashort; ?>" /></td>
          <td>Loaded Finally</td>
          <td><input type="text" name="loadedfinal" id = "loadedfinal"  value="<?php echo $loadedfinal; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
				
					
					

		  
		 <td>
          <?php
					
					if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" )
					{ ?>
                       <input type="submit" name="s" value="Save Record" />
					
					<?php  } ?>          </td>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>		<input type="hidden" name="brkid111" value="<?php echo $brkid111; ?>" />				  <?phpwhile($row13 = mysql_fetch_array($result13))  {    ?><script>addRow_u('dataTable',<?php echo $fid; ?>,"<?php echo $row13['stid'] ?>","<?php echo $row13['bag'] ?>","<?php echo $row13['grswght'] ?>","<?php echo $row13['mandiwght'] ?>","<?php echo $row13['billwght'] ?>","<?php echo $row13['rot'] ?>","<?php echo $row13['rog'] ?>","<?php echo $row13['vale'] ?>","<?php echo $row13['vtou'] ?>","<?php echo $row13['bilvalue'] ?>","<?php echo $row13['remark'] ?>","<?php echo $row13['stockid'] ?>","<?php echo $row13['w_per_bag'] ?>");</script> <?php  }    ?>	 
</form>
   
</div>
</body>
</html>

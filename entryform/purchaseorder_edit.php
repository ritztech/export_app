<?phperror_reporting(0);
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

$fid=$_SESSION['fid'];
?>
<?php

include("../conf.php");


?>

<?php 

if(isset($_POST['s'])) {
						            $suppliername = trim(strip_tags(addslashes($_POST['suppliername'])));
			 $brokername = trim(strip_tags(addslashes($_POST['brokername'])));
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
			$status = $_POST['status'];
			$totbag =  $_POST['totbag'];
            $totgrsweight =  $_POST['totgrsweight'];
            $totmandi =  $_POST['totmandi'];
            $totbilwght =  $_POST['totbilwght'];
            $totrot =  $_POST['totrot'];
            $totrog =  $_POST['totrog'];
            $totvalue =  $_POST['totvalue'];
            $totvto =  $_POST['totvto'];
            $totbillv =  $_POST['totbillv'];
            $poid = $_POST['poid'];
			$totalcnt = $_POST['totalcnt'];						$brkid12 = $_POST['brkid12'];			$suppid = $_POST['suppid'];
			
			
	$query = "UPDATE purchase_order SET
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
			status = '$status',
			bag1='$totbag',
			grossweight1='$totgrsweight',
			mandigatepass1='$totmandi',
			billweight='$totbilwght',
			rateoftax1='$totrot',
			rateofgoods1='$totrog',
			value1='$totvalue',
			vattax1='$totvto',
			billvalue1='$totbillv',			suppid = $suppid,			brkid = $brkid12
            WHERE poid='$poid'";

		
	mysql_query($query);
	 
	// echo $query;
	 
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  


// New code for grid start  
		
	$j = $totalcnt;

	$qry1 = "delete  from  stock_ref WHERE formid='$poid' and tempid='A1'";
	
mysql_query($qry1,$connection);

	if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  

for($i=2; $i <= $j; $i++) {
	
    $qry1="INSERT INTO stock_ref(formid, stockid, bag, grswght, mandiwght, billwght, rot, rog, vale, vtou, bilvalue,remark,tempid,stid,party_name,party_date,fid,w_per_bag)
VALUES ($poid,'{$_POST['stkname'.$i]}',{$_POST['bagg'.$i]},{$_POST['grsweight'.$i]},{$_POST['mandiwght'.$i]},{$_POST['billwght'.$i]},
        {$_POST['rattax'.$i]},{$_POST['ratgoods'.$i]},{$_POST['itvalue'.$i]},{$_POST['valuetaxout'.$i]},{$_POST['billvalue'.$i]},		'{$_POST['remark'.$i]}','A1','{$_POST['item'.$i]}',		'$suppliername',STR_TO_DATE('$saudadate','%d/%m/%Y'),$fid,'{$_POST['w_per_bag'.$i]}')";				//echo $qry1;

	if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	     echo "<script>alert('Data updated successfully.');location.href='purchaseorder_view.php'</script>"; 
	  
	  
  }
  
  
  // New code for grid end
	
	
	
}
	
}




		
		


?>
<?php

try {
$query = "SELECT `fid`, `poid`, `suppliername`, `brokername`, `moisture`, `dust`, `smallseed`, `splitseed`, `oil`, `quantity`, `bag`, `packingterms`, `bagquality`, `rate`,  DATE_FORMAT(deleveryduedate,'%d/%m/%Y') as deleveryduedate , `paymentterms`, `cashdcond`, `modeofsupply`, DATE_FORMAT(saudadate,'%d/%m/%Y') as saudadate, `stfcondition`, `mtfcondition`, `etfcondition`, entrydate, `status`, `suppid`, `bag1`, `grossweight1`, `mandigatepass1`, `billweight`, `rateoftax1`, `rateofgoods1`, `value1`,  `vattax1`, `billvalue1`,brkid FROM `purchase_order` WHERE poid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['poid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
            $brkid12 =$row['brkid'];           		   $suppliername =$row['suppliername'];   $suppid =$row['suppid'];
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
			$status = $row['status'];
			$bag1 =  $row['bag1'];
            $grossweight1 =  $row['grossweight1'];
            $mandigatepass1 =  $row['mandigatepass1'];
            $billweight =  $row['billweight'];
            $rateoftax1 =  $row['rateoftax1'];
            $rateofgoods1 =  $row['rateofgoods1'];
            $value1 =  $row['value1'];
            $vattax1 =  $row['vattax1'];
            $billvalue1 =  $row['billvalue1'];
            $poid = $row['poid'];			
		    $stfcondition_qry  = mysql_query("SELECT salestaxform,taxid from taxform  where taxid = $stfcondition");
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
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>
<script type="text/javascript">

function phappycode1(thelist,l_value){	var idx = thelist.selectedIndex;	var content = thelist.options[idx].innerHTML;    document.form1.brokername.value = content;  document.form1.brkid12.value = l_value;      

}function phappycode12(thelist,l_value){	var idx = thelist.selectedIndex;	var content = thelist.options[idx].innerHTML;    document.form1.suppliername.value = content;  document.form1.suppid.value = l_value;      }


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
}function ValidateForm(){    var dt=document.form1.saudadate	    if (isDate(dt.value)==false){	           dt.focus()              return false    }		return true  }		
</script>


</head>
<body>

<?php include('../include/sidemenu.php');?>
<div align="center">
<div id = "griddiv"><br>
  <h2 align="center"><span style="color:#F17327;">PURCHASE ORDER DETAILS</span>    </h2>
  <form id="form1" name="form1"  onSubmit="return ValidateForm()" method="post" action="">
  <table width="749" border="1" rules="none" frame="box" cellpadding="1">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Basic Details</h4></td>
        </tr>
        <tr>
          <td width="128"><label for="select">Supplier Name:</label></td>
          <td width="220"><p>
            <input type="text"  size = "35" readonly  name="suppliername" value="<?php echo $suppliername; ?>" />
            <input type="hidden" name="poid" value="<?php echo $poid; ?>" />
          </p></td>		            <td>Change supplier Name:</td>          <td><select name="s2" onchange="phappycode12(this,this.value)">                       <option> </option>                       <?php               				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid ");				while($row = mysql_fetch_array($query)){					$sup_1 = $row['legid'];					$sup_name = $row['leg_name'];																	?>                       <option value = "<?php echo $sup_1; ?>"> <?php echo $sup_name; ?></option>                       <?php } ?>                               </select></td>		  
        </tr>
        <tr>
          <td >Broker Name:</td>
          <td><input type="text" size = "35" name="brokername" readonly  value="<?php echo $brokername; ?>" /></td>
          <td>Change Broker Name:</td>
          <td><select name="s2" onchange="phappycode1(this,this.value)">
                       <option> </option>
                       <?php               
				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and broker =1");
				while($row = mysql_fetch_array($query)){
					$brid = $row['legid'];
					$brokername = $row['leg_name'];														
			?>
                       <option value = "<?php echo $brid; ?>"> <?php echo $brokername; ?></option>
                       <?php } ?>
                     
          </select></td>
        </tr>
        <tr>
          <td colspan="4">
		  
		  <INPUT type="button" value="ADD ITEM" onclick="addRow('dataTable',<?php echo $fid; ?>);" />
		  
		  
		  <table width="982" border='1' cellpadding='1'   id="dataTable"   >

  <tr>
   <th>TOTAL</th> 
   <th> <input  type = "text"  size = "3" name = "totbag" id = "totbag" value="<?php echo $bag1; ?>" /> </th>   <th>  </th>
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
 

  <th>ITEM NAME</th> <th>BAG</th>  <th>Weight Per Bag in KG</th> <th>GROSS WEIGHT</th> <th> MANDI GATE PASS WT </th> <th>  BILLING WEIGHT </th>	<th> VAT(in %) </th>	<th> RATE OF GOODS </th>	<th>VALUE </th>	<th>VAT TAX</th>	<th>BILL VALUE</th> <th>REMARK</th>
  </tr>
  <?php 

?>

</table>

<input  type = "hidden"  size = "5" name = "totalcnt"  id = "totalcnt" />


&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Quality Norms</h4></td>
        </tr>
        <tr>
          <td><label for="textfield">Moisture%:</label></td>
          <td><input type="text" name="moisture" value="<?php echo $moisture; ?>"/></td>
          <td><label for="textfield2">Dust(Sand)%:</label></td>
          <td><input type="text" name="dust" id="textfield2" value="<?php echo $dust; ?>" /></td>
        </tr>
        <tr>
          <td ><label for="textfield3">Small Seed%:</label></td>
          <td><input type="text" name="smallseed" id="textfield3" value="<?php echo $smallseed; ?>" /></td>
          <td><label for="textfield4">Split Seed%:</label></td>
          <td><input type="text" name="splitseed" id="textfield4" value="<?php echo $splitseed; ?>" /></td>
        </tr>
        <tr>
          <td><label for="textfield5">Oil%:</label></td>
          <td><input type="text" name="oil" id="textfield5" value="<?php echo $oil; ?>" /></td>
          <td>Quantity:</td>
          <td><input type="text" name="quantity" id="textfield6" value="<?php echo $quantity; ?>" /></td>
        </tr>
        <tr>
          <td>Bag:</td>
          <td><input type="text" name="bag" id="textfield7" value="<?php echo $bag; ?>" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
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
          <td><input id="dstart"   name = "deleveryduedate"   onchange = "isDate(this.value)" type = "text"  size="17"  value="<?php echo $deleveryduedate; ?>" />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </td>
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
          <td><input id="saudadate"   name = "saudadate"  onchange = "isDate(this.value)"  type = "text"  size="17" value="<?php echo $saudadate; ?>" />  <a href="javascript:NewCal('saudadate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </td>
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
          <td><input type="text" name="stfcondition" readonly  value="<?php echo $stfcondition['0']; ?>" />		  <input type="hidden" name="stfcondition11" readonly  value="<?php echo $stfcondition['1']; ?>" /></td>
          <td>change Sales Tax:</td>
          <td><select name="s11" onchange="phappycode3()" style="width:150px">
                       <option value = "0"> </option>
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
          <td><input type="text" readonly name="etfcondition" value="<?php echo $etfcondition['0']; ?>" />		  <input type="hidden" readonly name="etfcondition11" value="<?php echo $etfcondition['1']; ?>" /></td>
          <td>change Entry Tax:</td>
          <td><select name="s12" onchange="phappycode4()" style="width:150px">
          <option value = "0"> </option>
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
          <td><input type="text" readonly name="mtfcondition" value="<?php echo $mtfcondition['0']; ?>" />		  <input type="hidden" readonly name="mtfcondition11" value="<?php echo $mtfcondition['1']; ?>" /></td>
          <td>change Mandi Tax:</td>
          <td><select name="s13" onchange="phappycode5()" style="width:150px">
          <option> </option>
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
          <td>Status</td>
          <td><input type="text" name="status"  readonly value="<?php echo $status; ?>" /></td>
          <td>Change Status</td>
          <td><select name="sta" onchange="phappycode6()">
          <option>OPEN</option>
          <option>CLOSED</option>
          </select></td>
        </tr>
		
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
<td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
	
 
 
  &nbsp;
</td>

</div>
<input type="button" name="btnprint" value="Print" onclick="PrintMe('griddiv')"/>
<?php
					
					if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" )
					{ ?>
                       <input type="submit" name="s" value="Save Record" />
					
					<?php  } ?> 										<input type="hidden" name="brkid12" value="<?php echo $brkid12; ?>" />										<input type="hidden" name="suppid" value="<?php echo $suppid; ?>" />							  <?php$result13 = mysql_query("SELECT `stockid`, `bag`, `grswght`, `mandiwght`, `billwght`, `rot`, `rog`, `vale`, `vtou`, `bilvalue`, `remark`,stid,w_per_bag FROM `stock_ref` WHERE formid=$poid  and tempid='A1'");while($row13 = mysql_fetch_array($result13))  {    ?><script>addRow_u('dataTable',<?php echo $fid; ?>,"<?php echo $row13['stid'] ?>","<?php echo $row13['bag'] ?>","<?php echo $row13['grswght'] ?>","<?php echo $row13['mandiwght'] ?>","<?php echo $row13['billwght'] ?>","<?php echo $row13['rot'] ?>","<?php echo $row13['rog'] ?>","<?php echo $row13['vale'] ?>","<?php echo $row13['vtou'] ?>","<?php echo $row13['bilvalue'] ?>","<?php echo $row13['remark'] ?>","<?php echo $row13['stockid'] ?>","<?php echo $row13['w_per_bag'] ?>");</script> <?php  }    ?>															
					 </form>  
</div>
</body>
</html>

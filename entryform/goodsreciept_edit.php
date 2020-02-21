<?php
session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

$fid=$_SESSION['fid'];
?>
<?php

include("../conf.php");

?>
<?php 

if(isset($_POST['s'])) {
	
	
	
	$brokernamep = trim(strip_tags(addslashes(strtoupper($_POST['brokername']))));
		$suppliernamep = trim(strip_tags(addslashes(strtoupper($_POST['suppliername']))));
	
	
            
            $vehiclenumber= $_POST['vehiclenumber'];
            $supervisiorname= $_POST['supervisiorname'];
            $billno= $_POST['billno'];
            $gatepassno= $_POST['gatepassno'];
            $form10= $_POST['form10'];
            $billtyno= $_POST['billtyno'];
			$frieght= $_POST['frieght'];
			$remark= $_POST['remark'];
			$totbag =  $_POST['totbag'];
            $totgrsweight =  $_POST['totgrsweight'];
            $totmandi =  $_POST['totmandi'];
            $totbilwght =  $_POST['totbilwght'];
            $totrot =  $_POST['totrot'];
            $totrog =  $_POST['totrog'];
            $totvalue =  $_POST['totvalue'];
            $totvto =  $_POST['totvto'];
            $totbillv =  $_POST['totbillv'];
			$weightbridgename=$_POST['weightbridgename'];
			$weightdate=$_POST['weightdate'];
			$kantano=$_POST['kantano'];
			$unit=$_POST['unit'];
			$grossweight1=$_POST['grossweight1'];
			$netweight1=$_POST['netweight1'];
			$tareweight=$_POST['tareweight'];
			$advance = $_POST['advance'];
            $payble = $_POST['payble'];
            $dateofbillty = $_POST['dateofbillty'];
			$transportername = $_POST['transportername'];
			$grid = $_POST['grid'];
			$totalcnt = $_POST['totalcnt'];
			$suppname = $_POST['suppliername'];
			
			$brkid12 = $_POST['brkid12'];
			$suppid = $_POST['suppid'];
			$transname = $_POST['transname'];
			
			
									
						  
		
			
	$query = "UPDATE goodrecieptsnote SET
	        vehiclenumber='$vehiclenumber',
			supervisiorname='$supervisiorname',
            billno='$billno',
            gatepassno='$gatepassno',
            form10='$form10',
            billtyno='$billtyno',
			frieght='$frieght',
			remark='$remark',
             bag1='$totbag',
			grossweight2='$totgrsweight',
			mandigatepass1='$totmandi',
			billweight='$totbilwght',
			rateoftax1='$totrot',
			rateofgoods1='$totrog',
			value1='$totvalue',
			vattax1='$totvto',
			billvalue1='$totbillv',
			weightbridgename='$weightbridgename',
			weightdate=STR_TO_DATE('$weightdate','%d/%m/%Y'),
			kantano='$kantano',
			unit='$unit',
			grossweight1='$grossweight1',
			netweight1='$netweight1',
			tareweight='$tareweight',
			advance =  '$advance',
            payble =  '$payble',
            dateofbillty = STR_TO_DATE('$dateofbillty','%d/%m/%Y'),
			transportername =  '$transportername',
			suppid = $suppid,
			brkid = $brkid12,
			transname = $transname,
			brokername = '$brokernamep',
			suppliername = '$suppliernamep'
            WHERE grid='$grid'";
	        mysql_query($query);
	 //echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
    
   
   $j = $totalcnt;

	$qry1 = "delete  from  stock_ref WHERE formid=$grid and tempid='A2'";
	
mysql_query($qry1,$connection);

	if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  

for($i=2; $i <= $j; $i++) {
	
    $qry1="INSERT INTO stock_ref(formid, stockid, bag, grswght, mandiwght, billwght, rot, rog, vale, vtou, bilvalue,remark,tempid,stid,party_name,party_date,fid,w_per_bag)
VALUES ($grid,'{$_POST['stkname'.$i]}',{$_POST['bagg'.$i]},{$_POST['grsweight'.$i]},{$_POST['mandiwght'.$i]},{$_POST['billwght'.$i]},
        {$_POST['rattax'.$i]},{$_POST['ratgoods'.$i]},{$_POST['itvalue'.$i]},{$_POST['valuetaxout'.$i]},{$_POST['billvalue'.$i]},'{$_POST['remark'.$i]}','A2'
		,'{$_POST['item'.$i]}','$suppname',STR_TO_DATE('$weightdate','%d/%m/%Y'),$fid,'{$_POST['w_per_bag'.$i]}')";

	if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	     echo "<script>alert('Data updated successfully.');location.href='goodsreciept_view.php'</script>";
	  
	  
  }
  
  
  // New code for grid end
	
	
	
}


        

}
?>
<?php

try {
$query = "SELECT `fid`, `moisture`, `dust`, `smallseed`, `splitseed`, `oil`, `quantity`, `bag`, `packingbag`, `grid`, `suppliername`,
 `brokername`, `recieptweight`, `bagquality`, `modeofsupply`, `transportername`,
 DATE_FORMAT(dateofbillty,'%d/%m/%Y')  as dateofbillty , `advance`, `payble`, 
 `vehiclenumber`, `supervisiorname`, `billno`, `gatepassno`, `form10`, `billtyno`, `frieght`, 
 `remark`, `entrydate`, `poid`, `weightbridgename`,DATE_FORMAT(weightdate,'%d/%m/%Y') as weightdate, `kantano`, `unit`, `grossweight1`, `netweight1`, 
 `tareweight`, `bag1`, `grossweight2`, `mandigatepass1`, `billweight`, `rateoftax1`, `rateofgoods1`, `value1`, `vattax1`, `billvalue1`,suppid,brkid,transname
 FROM `goodrecieptsnote` WHERE grid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['grid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
 
 $suppid =$row['suppid'];
 $brkid =$row['brkid'];
 $transname =$row['transname'];
 
 
 $suppliername =$row['suppliername'];
            $brokername =$row['brokername'];
            $moisture =$row['moisture'];
            $dust =$row['dust'];
			$weightbridgename=$row['weightbridgename'];
			$weightdate=$row['weightdate'];
			$kantano=$row['kantano'];
			$unit=$row['unit'];
			$grossweight1=$row['grossweight1'];
			$netweight1=$row['netweight1'];
			$tareweight=$row['tareweight'];
            $smallseed =$row['smallseed'];
            $splitseed =$row['splitseed'];
            $oil = $row['oil'];
            $quantity =$row['quantity'];
            $bag = $row['bag'];
			$packingbag = $row['packingbag'];
            $recieptweight = $row['recieptweight'];
            $bagquality = $row['bagquality'];
            $modeofsupply =$row['modeofsupply'];
			$vehiclenumber = $row['vehiclenumber'];
            $supervisiorname = $row['supervisiorname'];
            $billno = $row['billno'];
            $gatepassno = $row['gatepassno'];
            $form10 = $row['form10'];
            $billtyno = $row['billtyno'];
			$frieght = $row['frieght'];
            $remark = $row['remark'];
			$bag1 =  $row['bag1'];
            $grossweight2 =  $row['grossweight2'];
            $mandigatepass1 =  $row['mandigatepass1'];
            $billweight =  $row['billweight'];
            $rateoftax1 =  $row['rateoftax1'];
            $rateofgoods1 =  $row['rateofgoods1'];
            $value1 =  $row['value1'];
            $vattax1 =  $row['vattax1'];
            $billvalue1 =  $row['billvalue1'];
			$advance =  $row['advance'];
            $payble =  $row['payble'];
            $dateofbillty =  $row['dateofbillty'];
			$transportername =  $row['transportername'];
            $grid = $row['grid'];
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


function phappycodebrk(thelist,l_value){

	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
  
  document.form1.brokername.value = content;
  document.form1.brkid12.value = l_value;
  
  
  

}

function phappycodesupp(thelist,l_value){

	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
  
  document.form1.suppliername.value = content;
  document.form1.suppid.value = l_value;
  
  
  

}


function phappycodetrans(thelist,l_value){

	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
  
  document.form1.transportername.value = content;
  document.form1.transname.value = l_value;
  
  
  

}


function ValidateForm(){



    var dt=document.form1.weightdate

	    if (isDate(dt.value)==false){

	           dt.focus()

              return false

    }
	
	

    var dt=document.form1.dateofbillty

	    if (isDate(dt.value)==false){

	           dt.focus()

              return false

    }

	
	return true 

 

}



</script>
</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>
<div align="center"><br>
  <h2 align="center"><span style="color:#F17327;">good reciepts note Details</span>  </h2>
  <form id="form1" name="form1"  onSubmit="return ValidateForm()"  method="post" action="">
  <table width="771" border="1" rules="none" frame="box" cellpadding="1">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Purchase Order Details</h4></td>
        </tr>
        <tr>
          <td width="128"><label for="textfield19">Supplier Name:</label></td>
          <td width="220"><input type="text" name="suppliername" id="textfield19" readonly   value="<?php echo $suppliername; ?>" /></td>
          <td>Change supplier Name:</td>

          <td><select name="s2" onchange="phappycodesupp(this,this.value)">

                       <option> </option>

                       <?php               

				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid ");

				while($row = mysql_fetch_array($query)){

					$suppid_1 = $row['legid'];

					$supp_name = $row['leg_name'];
					
									
			?>

                       <option value = "<?php echo $suppid_1; ?>"> <?php echo $supp_name; ?></option>

                       <?php } ?>

                     

          </select></td>
        </tr>
        <tr>
          <td>Broker Name:</td>
          <td><input type="text" name="brokername" id="textfield18" readonly  value="<?php echo $brokername; ?>" /></td>
          <td>Change Broker Name:</td>

          <td><select name="s2" onchange="phappycodebrk(this,this.value)">

                       <option> </option>

                       <?php               

				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and broker =1");

				while($row = mysql_fetch_array($query)){

					$brid111 = $row['legid'];

					$brokername11 = $row['leg_name'];
					
									
			?>

                       <option value = "<?php echo $brid111; ?>"> <?php echo $brokername11; ?></option>

                       <?php } ?>

                     

          </select></td>
        </tr>
        <tr>
          <td colspan="4">
		  
		  <INPUT type="button" value="ADD ITEM" onclick="addRow('dataTable',<?php echo $fid; ?>);" />
		  
		  
		  <table width="982" border='1' cellpadding='1'   id="dataTable"   >

  <tr>
   <th>TOTAL</th> 
   <th> <input  type = "text"  size = "3" name = "totbag" id = "totbag" value="<?php echo $bag1; ?>" /> </th>
     <th>  </th>

   <th> <input  type = "text"  size = "5" name = "totgrsweight" id = "totgrsweight" value="<?php echo $grossweight2; ?>" /> </th>
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



</table>

<input  type = "hidden"  size = "5" name = "totalcnt"  id = "totalcnt" /> 

		  
		   </td>
        </tr>
        <tr>
          <td><label for="textfield">Moisture%:</label></td>
          <td><input type="text" name="moisture"  value="<?php echo $moisture; ?>" /></td>
          <td><label for="textfield2">Dust(Sand)%:</label></td>
          <td><input type="text" name="dust" id="textfield2"  value="<?php echo $dust; ?>" /></td>
        </tr>
        <tr>
          <td height="35"><label for="textfield3">Small Seed%:</label></td>
          <td><input type="text" name="smallseed" id="textfield3"  value="<?php echo $smallseed; ?>" /></td>
          <td><label for="textfield4">Split Seed%:</label></td>
          <td><input type="text" name="splitseed" id="textfield4"  value="<?php echo $splitseed; ?>" /></td>
        </tr>
        <tr>
          <td><label for="textfield5">Oil%:</label></td>
          <td><input type="text" name="oil" id="textfield5"  value="<?php echo $oil; ?>" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="textfield6">Quantity:</label></td>
          <td><p>
            <input type="text" name="quantity" id="textfield6"  value="<?php echo $quantity; ?>" />
          </p></td>

          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Recipts Bag:</td>
          <td><input type="text" name="bag"  id="textfield7" value="<?php echo $bag; ?>" /></td>
          <td>Packing per Bag</td>
          <td><input type="text" name="packingbag" id="textfield" value="<?php echo $packingbag; ?>" /></td>
        </tr>
        <tr>
          <td height="38">Reciept Weight:</td>
          <td><input type="text" name="recieptweight" id="textfield8" value="<?php echo $recieptweight; ?>" /></td>
          <td>Bag Quality:</td>
          <td><input type="text" name="bagquality" id="textfield9" value="<?php echo $bagquality; ?>" /></td>
        </tr>
        <tr>
          <td height="36">Mode Of Supply:</td>
          <td><input type="text" name="modeofsupply"  id="textfield10" value="<?php echo $modeofsupply; ?>" /></td>
          <td>Supervisior Name:</td>
          <td><input type="text" name="supervisiorname" id="textfield14" value="<?php echo $supervisiorname; ?>" /></td>
        </tr>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Attachments Of Paper</h4></td>
        </tr>
        <tr>
          <td colspan="4"><table width="900px" border="1">
            <tbody>
              <tr>
                <td>Transporter Name</td>
                <td><input type="text" name="transportername" id="textfield17" value="<?php echo $transportername; ?>" /></td>
				<td></td>
                <td colspan="2">Date Of Billty:</td>
              </tr>
              <tr>
          <td>Change Transporter Name:</td>

          <td><select name="s2" onchange="phappycodetrans(this,this.value)">

                       <option> </option>

                       <?php               

				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and transported = 1");

				while($row = mysql_fetch_array($query)){

					$trans_id1 = $row['legid'];

					$trabs_name1 = $row['leg_name'];
					
									
			?>

                       <option value = "<?php echo $trans_id1; ?>"> <?php echo $trabs_name1; ?></option>

                       <?php } ?>

                     

          </select></td>
		  <td></td>
                <td colspan="2"><input id="dstart"  onchange = "isDate(this.value)"  name = "dateofbillty"   type = "text"  size="17"  value="<?php echo $dateofbillty; ?>" />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div>&nbsp;</td>
               
              </tr>
              <tr>
                <td>Billty No</td>
                <td>Total Freight</td>
                <td>Advance </td>
                <td>Payble</td>
                <td>Truck No.</td>
              </tr>
              <tr>
                <td><input type="text" name="billtyno" id="textfield11" value="<?php echo $billtyno; ?>" /></td>
                <td><input type="text" name="frieght" id="textfield13" value="<?php echo $frieght; ?>" /></td>
                <td><input type="text" name="advance" id="textfield30" value="<?php echo $advance; ?>" /></td>
                <td><input type="text" name="payble" id="textfield32" value="<?php echo $payble; ?>"/></td>
                <td><input type="text" name="vehiclenumber" id="textfield31" value="<?php echo $vehiclenumber; ?>" /></td>
              </tr>
            </tbody>
          </table> </td>
        </tr>
        <tr>
          <td><label for="select4">Bill No:</label></td>
          <td><input type="text" name="billno" id="textfield15" value="<?php echo $billno; ?>" /></td>
          <td>Mandi Gate Pass Number:</td>
          <td><input type="text" name="gatepassno" id="textfield16" value="<?php echo $gatepassno; ?>" /></td>
        </tr>
        <tr>
          <td height="47">Form 10 No.:</td>
          <td><input type="text" name="form10" id="textfield17" value="<?php echo $form10; ?>" />
          <input type="hidden" name="grid" id="grid" value="<?php echo $grid; ?>" /></td>
          <td>Remark:</td>
          <td><textarea name="remark" id="textarea" cols="20" rows="5"><?php echo $remark; ?></textarea></td>
        </tr>
		<tr>
          <td colspan="4" bgcolor="#14C4B6"><h4>Kanta Slip</h4></td>
        </tr>
        <tr>
          <td>Weight Bridge Name:</td>
          <td><input type="text" name="weightbridgename" id="textfield20" value="<?php echo $weightbridgename; ?>" /></td>
          <td>Date Of Weight:</td>
          <td><input id="dst"   name = "weightdate"  onchange = "isDate(this.value)"  type = "text"  size="17"  value="<?php echo $weightdate; ?>" />  <a href="javascript:NewCal('dst','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div></td>
        </tr>
        <tr>
          <td>Kanta Slip No:</td>
          <td><input type="text" name="kantano" id="textfield22" value="<?php echo $kantano; ?>" /></td>
          <td>Unit:</td>
          <td><input type="text" name="unit" id="textfield23" value="<?php echo $unit; ?>" /></td>
        </tr>
        <tr>
          <td>Gross Weight:</td>
          <td><input type="text" name="grossweight1" id="textfield24" value="<?php echo $grossweight1; ?>" /></td>
          <td>Net Weight:</td>
          <td><input type="text" name="netweight1" id="textfield25" value="<?php echo $netweight1; ?>" /></td>
        </tr>
        <tr>
          <td>Tare Weight:</td>
          <td><input type="text" name="tareweight" id="textfield26" value="<?php echo $tareweight; ?>" /></td>
          <td>&nbsp;</td>
          <td></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
<td>
 <?php
					
					if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" )
					{ ?>
                       <input type="submit" name="s" value="Save Record" />
					
					<?php  } ?> </td>
 
          <td>&nbsp;</td>
        </tr>
		
      </tbody>
    </table>
	
						<input type="hidden" name="brkid12" value="<?php echo $brkid ?>" />
										<input type="hidden" name="suppid" value="<?php echo $suppid ?>" />
										<input type="hidden" name="transname" value="<?php echo $transname ?>" />
										
										
		
							  <?php
							  
							  $result13 = mysql_query("SELECT `stockid`, `bag`, `grswght`, `mandiwght`, `billwght`, `rot`, `rog`, `vale`, `vtou`, 
`bilvalue`, `remark`,stid,w_per_bag FROM `stock_ref` WHERE formid=$grid
and tempid='A2'");


while($row13 = mysql_fetch_array($result13))

  {  

  ?>

<script>

addRow_u('dataTable',<?php echo $fid; ?>,"<?php echo $row13['stid'] ?>","<?php echo $row13['bag'] ?>","<?php echo $row13['grswght'] ?>","<?php echo $row13['mandiwght'] ?>","<?php echo $row13['billwght'] ?>","<?php echo $row13['rot'] ?>","<?php echo $row13['rog'] ?>","<?php echo $row13['vale'] ?>","<?php echo $row13['vtou'] ?>","<?php echo $row13['bilvalue'] ?>","<?php echo $row13['remark'] ?>","<?php echo $row13['stockid'] ?>","<?php echo $row13['w_per_bag'] ?>");

</script>



 <?php  }    ?>	

 
										
  </form>&nbsp;
</div>
</body>
</html>

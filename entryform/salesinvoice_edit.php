<?php
session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}
$fid=$_SESSION['fid'];
include("../conf.php");
?>


<?php 

if(isset($_POST['s'])) {
            $partyname =$_POST['partyname'];
            $billno =$_POST['billno'];
            $date =$_POST['date'];
         
            $stfcondition =$_POST['stfcondition11'];
            $etfcondition = $_POST['etfcondition11'];
            $mtfcondition =$_POST['mtfcondition11'];
            $transportname = $_POST['transportname'];
            $crosingtname = $_POST['crosingtname'];
            $brokername =$_POST['brokername'];
            $paymentterms =$_POST['paymentterms'];
            $mandigatepass = $_POST['mandigatepass'];
            $issuesamiti =$_POST['issuesamiti'];

            $truckno = $_POST['truckno'];
            $billtyno = $_POST['billtyno'];
			$otherdoc = $_POST['otherdoc'];
			$porderno = $_POST['porderno'];
			$freighttotal = $_POST['freighttotal'];
			$freightadv = $_POST['freightadv'];
			$freightpaid = $_POST['freightpaid'];
			$weightbridgename=$_POST['weightbridgename'];
			$weightdate=$_POST['weightdate'];
			$kantano=$_POST['kantano'];
			$unit=$_POST['unit'];
			$grossweight1=$_POST['grossweight1'];
			$netweight1=$_POST['netweight1'];
			$tareweight=$_POST['tareweight'];
			$billtydate=$_POST['billtydate'];
			$totbag =  $_POST['totbag'];
            $totgrsweight =  $_POST['totgrsweight'];
            $totmandi =  $_POST['totmandi'];
            $totbilwght =  $_POST['totbilwght'];
            $totrot =  $_POST['totrot'];
            $totrog =  $_POST['totrog'];
            $totvalue =  $_POST['totvalue'];
            $totvto =  $_POST['totvto'];
            $totbillv =  $_POST['totbillv'];
            $siid = $_POST['siid'];
			$totalcnt = $_POST['totalcnt'];
			$ledgername = $_POST['ledgername'];
			$supp_id = $_POST['suppid111'];
		

			
	$query = "UPDATE mandia6 SET  brokerage_type = '$brokeragetype',
	        partyname ='$partyname',
            billno ='$billno',
            date =STR_TO_DATE('$date','%d/%m/%Y'),
            stfcondition ='$stfcondition',
            etfcondition = '$etfcondition',
            mtfcondition ='$mtfcondition',
            transportname ='$transportname',
            crosingtname ='$crosingtname',
            brokername ='$brokername',
            paymentterms ='$paymentterms',
            mandigatepass = '$mandigatepass',
            issuesamiti ='$issuesamiti',
            truckno = '$truckno',
            billtyno = '$billtyno',
			otherdoc ='$otherdoc',
			porderno = '$porderno',
			freighttotal ='$freighttotal',
			freightadv ='$freightadv',
			freightpaid ='$freightpaid',
			weightbridgename='$weightbridgename',
			weightdate=STR_TO_DATE('$weightdate','%d/%m/%Y'),
			kantano='$kantano',
			unit='$unit',
			grossweight1='$grossweight1',
			netweight1='$netweight1',
			tareweight='$tareweight',
			billtydate =STR_TO_DATE('$billtydate','%d/%m/%Y'),
			bag1='$totbag',
			grossweight2='$totgrsweight',
			mandigatepass1='$totmandi',
			billweight='$totbilwght',
			rateoftax1='$totrot',
			rateofgoods1='$totrog',
			value1='$totvalue',
			vattax1='$totvto',
			billvalue1='$totbillv',
			ledgername='$ledgername',
	        mysql_query($query);
	 //echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  

   $j = $totalcnt;

	$qry1 = "delete  from  stock_ref WHERE formid=$siid and tempid='A6'";
	
mysql_query($qry1,$connection);

	if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  

for($i=2; $i <= $j; $i++) {
	$stkname_1 = trim(strip_tags(addslashes(strtoupper($_POST['stkname'.$i]))));
    $qry1="INSERT INTO stock_ref(formid, stockid, bag, grswght, mandiwght, billwght, rot, rog, vale, vtou, bilvalue,remark,tempid,stid,party_name,party_date,fid,w_per_bag)
VALUES ($siid,'$stkname_1',{$_POST['bagg'.$i]},{$_POST['grsweight'.$i]},{$_POST['mandiwght'.$i]},{$_POST['billwght'.$i]},
        {$_POST['rattax'.$i]},{$_POST['ratgoods'.$i]},{$_POST['itvalue'.$i]},{$_POST['valuetaxout'.$i]},{$_POST['billvalue'.$i]},'$remark_1','A6'

	if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	    echo "<script>alert('Data updated successfully.');location.href='salesinvoice_view.php'</script>"; 
	  
	  
  }
  
  
  // New code for grid end
	
	
	
}

        

}
?>
<?php

try {
$query = "SELECT `siid`, `fid`, `soid`, `partyname`, `billno`,DATE_FORMAT(date,'%d/%m/%Y') as date, `stfcondition`, `etfcondition`, `mtfcondition`, `transportname`, `crosingtname`, `brokername`, `paymentterms`, `mandigatepass`, 
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['siid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);

            $billno =$row['billno'];
			$weightbridgename=$row['weightbridgename'];
			$weightdate=$row['weightdate'];
			$kantano=$row['kantano'];
			$unit=$row['unit'];
			$grossweight1=$row['grossweight1'];
			$netweight1=$row['netweight1'];
			$tareweight=$row['tareweight'];
            $date =$row['date'];
          
            $stfcondition =$row['stfcondition'];
            $etfcondition = $row['etfcondition'];
            $mtfcondition =$row['mtfcondition'];
            $transportname = $row['transportname'];
            $crosingtname = $row['crosingtname'];
            $brokername =$row['brokername'];
            $paymentterms =$row['paymentterms'];
            $mandigatepass = $row['mandigatepass'];
            $issuesamiti =$row['issuesamiti'];

            $truckno = $row['truckno'];
            $billtyno = $row['billtyno'];
			$otherdoc = $row['otherdoc'];
			$porderno = $row['porderno'];
			$freighttotal = $row['freighttotal'];
			$freightadv = $row['freightadv'];
			$freightpaid = $row['freightpaid'];
			$bag1 =  $row['bag1'];
            $grossweight2 =  $row['grossweight2'];
            $mandigatepass1 =  $row['mandigatepass1'];
            $billweight =  $row['billweight'];
            $rateoftax1 =  $row['rateoftax1'];
            $rateofgoods1 =  $row['rateofgoods1'];
            $value1 =  $row['value1'];
            $vattax1 =  $row['vattax1'];
            $billvalue1 =  $row['billvalue1'];
			$billtydate =  $row['billtydate'];
			$ledgername =  $row['ledgername'];
            $siid = $row['siid'];
			
			
																				 
            $stfcondition_qry  = mysql_query("SELECT 	salestaxform,taxid from taxform  where taxid = $stfcondition");
            $stfcondition  = mysql_fetch_array($stfcondition_qry);
			
					
			$mtfcondition_qry  = mysql_query("SELECT  manditaxform,taxid from taxform  where taxid = $mtfcondition");
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

function phappycode1(){
document.form1.etfcondition11.value = document.form1.s1set.value;
}

function phappycode2(){
document.form1.stfcondition11.value = document.form1.s2sst.value;
}
function phappycode3(){
document.form1.mtfcondition11.value = document.form1.s3smt.value;
}

function phappycode5(){
document.form1.crosingtname.value = document.form1.crossopt.value;
}

function phappycodesupp(thelist,l_value){


</script>

</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>
<div align="center">
  <h2 align="center"><span style="color:#F17327;">sales invoice update  form</span>    </h2>
<form id="form1" name="form1" onSubmit="return ValidateForm()"  method="post" action="">
  <table width="771" border="1" rules="none" frame="box" cellpadding="4">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Sales Order Details</h4></td>
        </tr>
        <tr>
          <td width="128"><label for="textfield19">Supplier Name:</label></td>
          <td colspan="4"><input type="text" name="partyname"  class='auto'  value="<?php echo $partyname?>" id="partyname" size="45" /> 
          </tr>
          <td width="200" colspan = 4>  <input type="hidden" name="ledgername"  readonly value="<?php echo $ledgername?>"  size="45" />
        </tr>
        <tr>
          <td>Broker Name:</td>
          <td colspan="4"><input type="text" name="brokername" readonly value="<?php echo $brokername?>" id="textfield18" size="45"/>
          
        </tr>
        <tr>
          <td colspan="4">
		  
		  
		  <INPUT type="button" value="ADD ITEM" onclick="addRow('dataTable',<?php echo $fid; ?>);" />
		  
		  
		  <table width="982" border='1' cellpadding='1'   id="dataTable"   >

  <tr>
   <th>TOTAL</th> 
   <th> <input  type = "text"  size = "3" name = "totbag" id = "totbag" value="<?php echo $bag1; ?>" /> </th>
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
  <?php 
$result13 = mysql_query("SELECT `stockid`, `bag`, `grswght`, `mandiwght`, `billwght`, `rot`, `rog`, `vale`, `vtou`, `bilvalue`, `remark`,stid,w_per_bag FROM `stock_ref` WHERE formid=$siid
and tempid='A6'");
?>

</table>

<input  type = "hidden"  size = "5" name = "totalcnt"  value=<?=  $i ?> id = "totalcnt" /> 

		  
		  �</td>
        </tr>
        <tr>
          <td><label for="textfield">Date:</label></td>
           
		  <td width="220"><input type="text" name="date" onchange = "isDate(this.value)"  id="date" value="<?php echo $date?>" /> <a href="javascript:NewCal('date','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </td>
		  
		  
		  
    
        </tr>
   
        <tr>
             <td>Payment Terms</td>
          <td><input type="text" name="paymentterms" value="<?php echo $paymentterms?>" id="textfield14" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Transport details</h4></td>
        </tr>
        <tr>
          <td colspan="4"><table border="1" width="900px">
            <tbody>
              <tr>
                <td>Transporter Name</td>
                <td><input type="text" name="transportname" id="textfield2" value="<?php echo $transportname?>" /></td>
				<td></td>
                <td colspan="2">Date Of Billty:</td>
              </tr>
              <tr>
                <td>Change  Transport Name:				</td><td>
<select name="s2" onchange="phappycodtrans(this,this.value)">
                <td></td>
                <td><input id="dstart"   name = "billtydate"   onchange = "isDate(this.value)"   type = "text"  size="17"  value="<?php echo $billtydate; ?>" />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div>&nbsp;</td>
               
              </tr>
              <tr>
                <td>Billty No</td>
                <td>Total Freight</td>
                <td>Advance </td>
                <td>Payble</td>
                <td>Truck No.</td>
              </tr>
              <tr>
                <td><input type="text" name="billtyno" id="textfield11" value="<?php echo $billtyno?>" /></td>
                <td><input type="text" name="freighttotal" id="textfield13" value="<?php echo $freighttotal?>" /></td>
                <td><input type="text"  onkeyup = "calcfreight()"  name="freightadv" id="textfield30" value="<?php echo $freightadv?>" /></td>
                <td><input type="text" name="freightpaid" id="textfield32" value="<?php echo $freightpaid?>" /></td>
                <td><input type="text" name="truckno" id="textfield31" value="<?php echo $truckno?>" /></td>
              </tr>
            </tbody>
          </table>�</td>
        </tr>
        
        <tr>
          <td><label for="select4">Crosing Transport Name::</label></td>
          <td><input type="text" name="crosingtname" id="textfield15" value="<?php echo $crosingtname?>" /></td>
          <td>Select Crosing Transport Name:</td>
          <td><select name="crossopt" onchange="phappycode5()">
        </tr>
        <tr>
          <td height="47">Issue Mandi Samiti:</td>
          <td><input type="text" name="issuesamiti" id="textfield17" value="<?php echo $issuesamiti?>" /></td>
          <td>Mandi Gate Pass Number:</td>
          <td><input type="text" name="mandigatepass" id="textfield16" value="<?php echo $mandigatepass?>" /></td>
        </tr>
        <tr>
          <td>Purchase Order No.:</td>
          <td><input type="text" name="porderno" id="textfield3" value="<?php echo $porderno?>" /></td>
          <td>Other Document:</td>
          <td><input type="text" name="otherdoc" id="otherdoc" value="<?php echo $otherdoc?>" /></td>
        </tr>
        
        
        <tr>
          <td>Entry Tax Form:</td>
          <td><input type="text" name="etfcondition" id="textfield23" value="<?php echo $etfcondition['0']?>" />
          <td>Select Entry Tax:</td>
          <td><select name="s1set" style="width:150px" onchange="phappycode1()" >
            <option> </option>
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
          <td>Sales Tax Form:</td>
          <td><input type="text" name="stfcondition" id="textfield24" value="<?php echo $stfcondition['0']?>" />
          <td>Select Sales Tax:</td>
          <td><select name="s2sst" style="width:150px" onchange="phappycode2()">
            <option> </option>
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
          <td>Mandi Tax Form:</td>
          <td><p>
            <input type="text" name="mtfcondition" id="textfield25" value="<?php echo $mtfcondition['0']?>" />
            <input type="hidden" name="siid" id="textfield22" value="<?php echo $siid?>" />
          </p></td>
          <td>Select Mandi Tax</td>
          <td><select name="s3smt" style="width:150px" onchange="phappycode3()">
            <option> </option>
            <?php               
				$query = mysql_query("SELECT * FROM taxform ");
				while($row = mysql_fetch_array($query)){
					$taxid = $row['taxid'];
					
					$manditaxform = $row['manditaxform'];
					
			?>
		
			<option  value = <?php echo $taxid; ?> ><?php echo $manditaxform; ?></option>
            <?php } ?>
          </select></td>
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
</form>
</div>
</body>
</html>
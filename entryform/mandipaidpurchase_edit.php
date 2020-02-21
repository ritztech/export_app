<?phperror_reporting(0);
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

$fid=$_SESSION['fid'];
include("../conf.php");

$a4id1 = $_GET['a4id'];
?>

<?php 

if(isset($_POST['s'])) {
            $partyname =$_POST['partyname'];
            $billno =$_POST['billno'];
            $date =$_POST['date'];
            $bag =$_POST['bag'];
            $packing =$_POST['packing'];
            $grossweight =$_POST['grossweight'];
            $netweight = $_POST['netweight'];
            $salestaxform =$_POST['salestaxform11'];
            $manditaxform =$_POST['manditaxform11'];
            $entrytaxform = $_POST['entrytaxform11'];
            $transportername =$_POST['transportername'];
            $crosingtname = $_POST['crosingtname'];
            $brokername = $_POST['brokername'];
            $paymentterms =$_POST['paymentterms'];
            $mandigatepass =$_POST['mandigatepass'];
            $mandisamiti = $_POST['mandisamiti'];
            $truckno = $_POST['truckno'];
            $otherdoc =$_POST['otherdoc'];
			$totbag =  $_POST['totbag'];
            $totgrsweight =  $_POST['totgrsweight'];
            $totmandi =  $_POST['totmandi'];
            $totbilwght =  $_POST['totbilwght'];
            $totrot =  $_POST['totrot'];
            $totrog =  $_POST['totrog'];
            $totvalue =  $_POST['totvalue'];
            $totvto =  $_POST['totvto'];
            $totbillv =  $_POST['totbillv'];
			$add1 =  $_POST['add1'];
            $less1 =  $_POST['less1'];
            $remark1 =  $_POST['remark1'];
			$remarkless =  $_POST['remarkless'];
            $value2 =  $_POST['value2'];
			$billtydate = $_POST['billtydate'];
			 $billtyno = $_POST['billtyno'];
			 $totalfreight =$_POST['totalfreight'];
			 $advance =$_POST['advance'];
			 $payble =$_POST['payble'];
			 $totalcnt = $_POST['totalcnt'];
			  $ledgername = $_POST['ledgername'];
			   $brkid111 = $_POST['brkid111'];			   $suppid111 = $_POST['suppid111'];			   $trkid111 = $_POST['trkid111'];			   $ledgername_n111 = $_POST['ledgername_n111'];			   			    $brokerage_type = $_POST['brokerage_type'];			   			   		  
			  
            
	$query = "UPDATE mandia4 SET	brokerage_type = '$brokerage_type',
	        partyname ='$partyname',
            date  =STR_TO_DATE('$date','%d/%m/%Y'),
            bag ='$bag',
            packing ='$packing',
            grossweight ='$grossweight',
            netweight ='$netweight',
            salestaxform = '$salestaxform',
            manditaxform ='$manditaxform',
            entrytaxform ='$entrytaxform',
            transportername = '$transportername',
            crosingtname ='$crosingtname',
            brokername = '$brokername',
            paymentterms ='$paymentterms',
            mandigatepass = '$mandigatepass',
			mandisamiti='$mandisamiti',
            truckno ='$truckno',
            otherdoc = '$otherdoc',
			bag1='$totbag',
			grossweight1='$totgrsweight',
			mandigatepass1='$totmandi',
			billweight='$totbilwght',
			rateoftax1='$totrot',
			rateofgoods1='$totrog',
			value1='$totvalue',
			vattax1='$totvto',
			billvalue1='$totbillv',
			add1 =  '$add1',
            less1 =  '$less1',
            remark1 =  '$remark1',
            value2 =  '$value2',
			billtydate =STR_TO_DATE('$billtydate','%d/%m/%Y'),
			billtyno = '$billtyno',
			totalfreight ='$totalfreight',
			advance ='$advance',
			payble ='$payble',
			remarkless =  '$remarkless',
			ledgername =  '$ledgername',
			ledgername_n = '$ledgername_n111',			suppid = $suppid111,			brkid = $brkid111,			trkid = $trkid111,			billno = '$billno'             WHERE a4id=$a4id1";
	        mysql_query($query);
	 //echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  
   
   
   $j = $totalcnt;

	$qry1 = "delete  from  stock_ref WHERE formid=$a4id1 and tempid='A4'";
	
mysql_query($qry1,$connection);

	if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  

for($i=2; $i <= $j; $i++) {
	
    $qry1="INSERT INTO stock_ref(formid, stockid, bag, grswght, mandiwght, billwght, rot, rog, vale, vtou, bilvalue,remark,tempid,stid,party_name,party_date,fid,w_per_bag)
VALUES ($a4id1,'{$_POST['stkname'.$i]}',{$_POST['bagg'.$i]},{$_POST['grsweight'.$i]},{$_POST['mandiwght'.$i]},{$_POST['billwght'.$i]},
        {$_POST['rattax'.$i]},{$_POST['ratgoods'.$i]},{$_POST['itvalue'.$i]},{$_POST['valuetaxout'.$i]},{$_POST['billvalue'.$i]},'{$_POST['remark'.$i]}','A4'		,'{$_POST['item'.$i]}','$partyname',STR_TO_DATE('$date','%d/%m/%Y'),$fid,'{$_POST['w_per_bag'.$i]}')";

	if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	      echo "<script>alert('Data updated successfully.');location.href='mandipaidpurchase_view.php'</script>";
	  
	  
  }
  
  
  // New code for grid end
	
	

}

}
?>
<?php

try {
$query = "SELECT `a4id`, `fid`, `partyname`, `billno`,DATE_FORMAT(date,'%d/%m/%Y') as date, `bag`, `packing`, `grossweight`, `netweight`, `salestaxform`, `manditaxform`, `entrytaxform`, `transportername`, `crosingtname`, `brokername`, `paymentterms`, `mandigatepass`, `mandisamiti`, `truckno`, `otherdoc`, `entrydate`, `poid`, `bag1`, `grossweight1`, `mandigatepass1`, `billweight`, `rateoftax1`, `rateofgoods1`, `value1`, `vattax1`, `billvalue1`, `add1`, `less1`, `remark1`, `value2`, `transactiondate`, `duedate`,DATE_FORMAT(billtydate,'%d/%m/%Y') as billtydate,`totalfreight`,  `advance`, `payble`, `billtyno`, `remarkless`, `ledgername` ,suppid,`brkid`, `trkid`,ledgername_n,brokerage_type FROM `mandia4` WHERE a4id=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['a4id']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC); $brokerage_type =$row['brokerage_type'];              $suppid111 =$row['suppid'];			 $brkid111 =$row['brkid'];			 $trkid111 =$row['trkid'];			 $ledgername_n111 =$row['ledgername_n'];			 
            $partyname =$row['partyname'];						//echo $partyname;
            $billno =$row['billno'];
            $date =$row['date'];
            $bag =$row['bag'];
            $packing =$row['packing'];
            $grossweight =$row['grossweight'];
            $netweight = $row['netweight'];
            $salestaxform =$row['salestaxform'];
            $manditaxform =$row['manditaxform'];
            $entrytaxform = $row['entrytaxform'];
            $transportername =$row['transportername'];
            $crosingtname = $row['crosingtname'];
            $brokername = $row['brokername'];
            $paymentterms =$row['paymentterms'];
            $mandigatepass =$row['mandigatepass'];
            $mandisamiti = $row['mandisamiti'];
            $truckno = $row['truckno'];
            $otherdoc =$row['otherdoc'];
            $entrydate = $row['entrydate'];
			$bag1 =  $row['bag1'];
            $grossweight1 =  $row['grossweight1'];
            $mandigatepass1 =  $row['mandigatepass1'];
            $billweight =  $row['billweight'];
            $rateoftax1 =  $row['rateoftax1'];
            $rateofgoods1 =  $row['rateofgoods1'];
            $value1 =  $row['value1'];
            $vattax1 =  $row['vattax1'];
            $billvalue1 =  $row['billvalue1'];
			$add1 =  $row['add1'];
            $less1 =  $row['less1'];
            $remark1 =  $row['remark1'];
			$remarkless =  $row['remarkless'];
            $value2 =  $row['value2'];
			$billtydate = $row['billtydate'];
			 $billtyno = $row['billtyno'];
			 $totalfreight =$row['totalfreight'];
			 $advance =$row['advance'];
			 $payble =$row['payble'];
			 $ledgername =$row['ledgername'];
            $a4id = $row['a4id'];
			

			
			$stfcondition_qry  = mysql_query("SELECT 	salestaxform,taxid from taxform  where taxid = $salestaxform");
            $salestaxform  = mysql_fetch_array($stfcondition_qry);
			
					
			$mtfcondition_qry  = mysql_query("SELECT 	manditaxform ,taxid from taxform  where taxid = $manditaxform");
            $manditaxform  = mysql_fetch_array($mtfcondition_qry);
			
			$etfcondition_qry  = mysql_query("SELECT 	entrytaxform ,taxid from taxform  where taxid = $entrytaxform");
            $entrytaxform  = mysql_fetch_array($etfcondition_qry);
			
			
			
			
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
<script language="javascript" type="text/javascript" src="jscode/a5code.js">  </script>
<script type="text/javascript">

function phappycodeparty(thelist,l_value){	var idx = thelist.selectedIndex;	var content = thelist.options[idx].innerHTML;    document.form1.partyname.value = content;  document.form1.suppid111.value = l_value;  }function phappycodeledger(thelist,l_value){	var idx = thelist.selectedIndex;	var content = thelist.options[idx].innerHTML;    document.form1.ledgername.value = content;  document.form1.ledgername_n111.value = l_value;  }function phappycodebrk(thelist,l_value){	var idx = thelist.selectedIndex;	var content = thelist.options[idx].innerHTML;    document.form1.brokername.value = content;  document.form1.brkid111.value = l_value;  }function phappycodetrans(thelist,l_value){	var idx = thelist.selectedIndex;	var content = thelist.options[idx].innerHTML;    document.form1.transportername.value = content;  document.form1.trkid111.value = l_value;  }function phappycodetrans111(thelist,l_value){	var idx = thelist.selectedIndex;	var content = thelist.options[idx].innerHTML;    document.form1.crosingtname.value = content; }

function phappycode1(){
document.form1.stockitem.value = document.form1.s1.value;
}



function phappycode3(){
document.form1.salestaxform11.value = document.form1.s3.value;
}


function phappycode4(){
document.form1.entrytaxform11.value = document.form1.s4.value;
}
function phappycode5(){
document.form1.manditaxform11.value = document.form1.s5.value;
}

function billvalue(){


document.form1.value2.value = Number(document.form1.totbillv.value) + Number(document.form1.add1.value) - Number(document.form1.less1.value)


}

function ValidateForm(){    var dt=document.form1.date	    if (isDate(dt.value)==false){	           dt.focus()              return false    }					    var dt=document.form1.billno	    if (dt.value==""){	           dt.focus()              return false    }			return true  }


</script>
</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>
<div align="center"><br>
  <h2 align="center"><span style="color:#F17327;">mandi +vat purchase edit form</span>    </h2>
<form id="form1" name="form1"  onSubmit="return ValidateForm()" method="post" action="">
  <table width="1017" border="1" align="center" cellpadding="1" frame="box" rules="none">
              <tbody>
                <tr>
                  <td colspan="4" bgcolor="#14C4B6"><div align="center">
                    <h4>Mandi+VAT Purchase(From Regised Dealer)</h4>
                  </div></td>
                </tr>
                <tr>
                  <td width="167">Party Name :</td>
                  <td width="318"><input type="text" name="partyname" readonly id="textfield15" value="<?php echo $partyname ?>" size="39" /></td>				  				            <td>Change supplier Name:</td>          <td><select name="s2" onchange="phappycodeparty(this,this.value)">                       <option> </option>                       <?php               				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid ");				while($row = mysql_fetch_array($query)){					$suppid123 = $row['legid'];					$suppname123 = $row['leg_name'];																	?>                       <option value = "<?php echo $suppid123; ?>"> <?php echo $suppname123; ?></option>                       <?php } ?>                               </select></td> </tr>		  <tr>		  
                  <td width="158">Debit Ledger:
                  </td>
                  <td width="348"><p>
                    <input type="text" name="ledgername" readonly  value="<?php echo $ledgername ?>" size="40"/>  </td>					
                              <td>Change Ledger Name:</td>          <td><select name="s2" onchange="phappycodeledger(this,this.value)">                       <option> </option>                       <?php               				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid  and  party = 1  ");				while($row = mysql_fetch_array($query)){					$did123 = $row['legid'];					$dlname123 = $row['leg_name'];																	?>                       <option value = "<?php echo $did123; ?>"> <?php echo $dlname123; ?></option>                       <?php } ?>                               </select></td>		  
                </tr>
                <tr>
                  <td>Bill Number:</td>
                  <td><input type="text" name="billno"  value="<?php echo $billno ?>" id="textfield" /> </td>
                  <td>Date:</td>
                  <td><input id="dstart"   name = "date"  onchange = "isDate(this.value)"  type = "text"  size="17"  value="<?php echo $date ?>" />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div></td>
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
    <th> <input  type = "text"  size = "5" name = "totbillv"  id = "totbillv" value="<?php echo $billvalue1; ?>" />  </th>
</tr>

<tr>
 

  <th>ITEM NAME</th> <th>BAG</th>  <th>Weight Per Bag in KG</th> <th>GROSS WEIGHT</th> <th> MANDI GATE PASS WT </th> <th>  BILLING WEIGHT </th>	<th> VAT(in %) </th>	<th> RATE OF GOODS </th>	<th>VALUE </th>	<th>VAT TAX</th>	<th>BILL VALUE</th> <th>REMARK</th>
  </tr>
  <?php 
$result13 = mysql_query("SELECT `stockid`, `bag`, `grswght`, `mandiwght`, `billwght`, `rot`, `rog`, `vale`, `vtou`, `bilvalue`, `remark`,stid,w_per_bag FROM `stock_ref` WHERE formid=$a4id
and tempid='A4'");
?>

</table>

<input  type = "hidden"  size = "5" name = "totalcnt"  value=<?=  $i ?> id = "totalcnt" /> 
 </td>
                </tr>
                <tr>
                  <td colspan="4"><table width="987" border="1">
                    <tbody>
                      <tr>
                        <td width="325"><label for="textfield3">Add:
                          <input type="text" name="add1" onkeyup = "billvalue()" value = "<?php echo $add1 ?>" id="textfield10" size="7" />
                        </label></td>
                        <td width="285">Less:
                        <input type="text" name="less1" onkeyup = "billvalue()"  value = "<?php echo $less1 ?>"   id="textfield16" size="7" /></td>
                        <td width="16">&nbsp;</td>
                        <td width="333">Value:</td>
                      </tr>
                      <tr>
                        <td>Remark:
                        <input type="text" name="remark1" id="textfield17" value="<?php echo $remark1 ?>" /></td>
                        <td>Remark:
                        <input type="text" name="remarkless" id="remarkless" value="<?php echo $remarkless ?>" /></td>
                        <td>&nbsp;</td>
                        <td><input type="text" name="value2" id="textfield18" value="<?php echo $value2 ?>" /></td>
                      </tr>
                    </tbody>
                  </table>
                   </td>
                </tr>
                <tr>
                  <td>Broker Name:</td>
                  <td colspan="2"><input type="text" name="brokername" value="<?php echo $brokername ?>" id="textfield14" size="40" />				  Change brokername Name: <select name="s2" onchange="phappycodebrk(this,this.value)">                       <option> </option>                       <?php               				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid  and  broker = 1");				while($row = mysql_fetch_array($query)){					$brid111 = $row['legid'];					$brokername111 = $row['leg_name'];																	?>                       <option value = "<?php echo $brid111; ?>"> <?php echo $brokername111; ?></option>                       <?php } ?>                               </select>		  </td>
                  	  
                </tr>								<tr>  		  <td>Brokerage Type : -  </td>   <td> <select name="brokerage_type"   style="width:150px">                        <option value = "<?php echo $brokerage_type ?>"> <?php echo $brokerage_type ?> </option>					   <option value = "QTL"> QTL </option>					    <option value = "BAG"> BAG </option>                              </select>		  </td>		  </tr>
                <tr>
                  <td>Bag:</td>
                  <td><input type="text" name="bag" id="textfield2" value="<?php echo $bag ?>" /></td>
                  <td>Packing:</td>
                  <td><input type="text" name="packing" id="textfield4" value="<?php echo $packing ?>" /></td>
                </tr>
                <tr>
                  <td>Net Weight(Gatepass)</td>
                  <td><input type="text" name="netweight" id="textfield6" value="<?php echo $netweight ?>" /></td>
                  <td>Gross Weight:</td>
                  <td><input type="text" name="grossweight" id="textfield5" value="<?php echo $grossweight ?>" /></td>
                </tr>
                <tr>
                  <td colspan="4"><table width="1009" border="1">
                    <tbody>
                      <tr>
                        <td colspan="3">Transporter Name
                        <input type="text"  value="<?php echo $transportername ?>" name="transportername" /> Change transporter Name:						          <select name="s2" onchange="phappycodetrans(this,this.value)">                       <option> </option>                       <?php               				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid  and transported = 1");				while($row = mysql_fetch_array($query)){					$trid11111 = $row['legid'];					$trokername1111 = $row['leg_name'];																	?>                       <option value = "<?php echo $trid11111; ?>"> <?php echo $trokername1111; ?></option>                       <?php } ?>                               </select>																								</td>						          		  
                        <td colspan="2">Date Of Billty:						         <input id="dstar"   name = "billtydate"  onchange = "isDate(this.value)"   type = "text"  size="17" value="<?php echo $billtydate ?>" />                            <a href="javascript:NewCal('dstar','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date" /></a>                            </div> </td>                          
                      </tr>
                      <tr>

               
                      </tr>
                      <tr>
                        <td>Billty No</td>
                        <td>Total Freight</td>
                        <td>Advance </td>
                        <td>Payble</td>
                        <td>Truck No.</td>
                      </tr>
                      <tr>
                        <td><input type="text" name="billtyno" id="billtyno" value="<?php echo $billtyno ?>" /></td>
                        <td><input type="text" name="totalfreight" id="textfield13" value="<?php echo $totalfreight ?>" /></td>
                        <td><input type="text" name="advance" id="textfield30" value="<?php echo $advance ?>" /></td>
                        <td><input type="text" name="payble" id="textfield32" value="<?php echo $payble ?>" /></td>
                        <td><input type="text" name="truckno" id="textfield11"  value="<?php echo $truckno ?>" /></td>
                      </tr>
                    </tbody>
                  </table></td>
                </tr>
                <tr>
                  <td>Sales Tax Form Terms:</td>
                  <td><input type="text"  value="<?php echo $salestaxform['0'] ?>" name="salestaxform" />				  <input type="hidden"  value="<?php echo $salestaxform['1'] ?>" name="salestaxform11" /></td>
                  <td>Change Sales Tax</td>
				  <td><select name="s3" style="width:150px" onchange="phappycode3()">
                   <option></option>
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
                  <td>Entry Tax Form Terms:</td>
                  <td><input type="text"  value="<?php echo $entrytaxform['0'] ?>" name="entrytaxform"  />				  <input type="hidden"  value="<?php echo $entrytaxform['1'] ?>" name="entrytaxform11"  /></td>
                 <td>Change Entry Tax</td>
				  <td><select name="s4" style="width:150px" onchange="phappycode4()">
                    <option></option>
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
                  <td>Mandi Tax Form Terms:</td>
                  <td><input type="text"  value="<?php echo $manditaxform['0'] ?>" name="manditaxform" />				  <input type="hidden"  value="<?php echo $manditaxform['1'] ?>" name="manditaxform11" /></td>
                 <td>Change  mandi Tax Form:</td>
				  <td><select name="s5" style="width:150px" onchange="phappycode5()">
                    <option></option>
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
                  <td>Crossing Transporter terms:</td>
                  <td><input type="text" value="<?php echo $crosingtname ?>" name="crosingtname" /></td>
                  <td>Select Crosing Transport</td>
				  <td> <select name="s2" onchange="phappycodetrans111(this,this.value)">                       <option> </option>                       <?php               				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid  and transported = 1");				while($row = mysql_fetch_array($query)){					$trid111112 = $row['legid'];					$trokername11112 = $row['leg_name'];																	?>                       <option value = "<?php echo $trid111112; ?>"> <?php echo $trokername11112; ?></option>                       <?php } ?>                               </select> </td>
                </tr>
                <tr>
                  <td>Payment Terms:</td>
                  <td><input type="text" name="paymentterms"  value="<?php echo $paymentterms ?>" id="textfield7" /></td>
                  <td>Mandi Gate Pass Details</td>
                  <td><input type="text" name="mandigatepass" id="textfield8"  value="<?php echo $mandigatepass ?>" /></td>
                </tr>
                <tr>
                  <td>Issue Mandi Samiti:</td>
                  <td><input type="text" name="mandisamiti" id="textfield9"  value="<?php echo $mandisamiti ?>" /></td>
                  <td>Other Document Attached:</td>
                  <td><input type="text" name="otherdoc" id="textfield12"  value="<?php echo $otherdoc ?>" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
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
 
                  
                <td></td>
                </tr>
      </tbody>
  </table>    					<input type="hidden" name="brkid111" value="<?php echo $brkid111; ?>" />					<input type="hidden" name="suppid111" value="<?php echo $suppid111; ?>" />					 <input type="hidden" name="trkid111" value="<?php echo $trkid111; ?>" />					<input type="hidden" name="ledgername_n111" value="<?php echo $ledgername_n111; ?>" />		  <?phpwhile($row13 = mysql_fetch_array($result13))  {    ?><script>addRow_u('dataTable',<?php echo $fid; ?>,"<?php echo $row13['stid'] ?>","<?php echo $row13['bag'] ?>","<?php echo $row13['grswght'] ?>","<?php echo $row13['mandiwght'] ?>","<?php echo $row13['billwght'] ?>","<?php echo $row13['rot'] ?>","<?php echo $row13['rog'] ?>","<?php echo $row13['vale'] ?>","<?php echo $row13['vtou'] ?>","<?php echo $row13['bilvalue'] ?>","<?php echo $row13['remark'] ?>","<?php echo $row13['stockid'] ?>","<?php echo $row13['w_per_bag'] ?>");</script> <?php  }    ?>	 
</form>
   
</div>
</body>
</html>

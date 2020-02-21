<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

$fid=$_SESSION['fid'];
?>
<?php

include("../conf.php");

?>
<?php 

if(isset($_POST['s'])) {
            $suppliername =$_POST['suppliername'];
            $stockitem =$_POST['stockitem'];
            $stockopening =$_POST['stockopening'];
            $stockgatepass =$_POST['stockgatepass'];
            $bag =$_POST['bag'];
            $netqty =$_POST['netqty'];
            $grossqty =$_POST['grossqty'];
            $value = $_POST['value'];
            $transportername =$_POST['transportername'];
            $truckno =$_POST['truckno'];
            $drivername = $_POST['drivername'];
            $mtaxrecieptno =$_POST['mtaxrecieptno'];
            $declaration = $_POST['declaration'];
            $applicationdate =$_POST['applicationdate'];
            $status =$_POST['status'];
			$balance =$_POST['balance'];
            $mfid = $_POST['mfid'];
			$ledgername_n = $_POST['ledgername_n'];
			
			
			
			
			
	$query = "UPDATE mandia11 SET
	        suppliername ='$suppliername',
            stockitem ='$stockitem',
            stockopening ='$stockopening',
            stockgatepass ='$stockgatepass',
            bag ='$bag',
            netqty ='$netqty',
            grossqty ='$grossqty',
            value = '$value',
            transportername ='$transportername',
            truckno ='$truckno',
            drivername = '$drivername',
            mtaxrecieptno ='$mtaxrecieptno',
            declaration ='$declaration',
            applicationdate = STR_TO_DATE('$applicationdate','%d/%m/%Y'),
			status ='$status',
			balance='$balance',
			ledgername_n = '$ledgername_n'
            WHERE mfid='$mfid'";
	        mysql_query($query);
	 //echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
   echo "<script>alert('Data updated successfully.');location.href='a11mandiform10_view.php'</script>"; 

        

}
?>
<?php

try {
$query = "SELECT `mfid`, `fid`, `suppliername`, `stockitem`, `stockopening`, `stockgatepass`, `bag`, `netqty`, `grossqty`, `value`, `transportername`, `truckno`, 
`drivername`, `mtaxrecieptno`, `declaration`, `status`,DATE_FORMAT(applicationdate,'%d/%m/%Y') as applicationdate, `entrydate`,
 `balance`,ledgername_n FROM `mandia11` WHERE mfid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['mfid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);


            $ledgername_n111 =$row['ledgername_n'];
			
			$suppliername =$row['suppliername'];
            $stockitem =$row['stockitem'];
            $stockopening =$row['stockopening'];
            $stockgatepass =$row['stockgatepass'];
            $bag =$row['bag'];
            $netqty =$row['netqty'];
            $grossqty =$row['grossqty'];
            $value = $row['value'];
            $transportername =$row['transportername'];
            $truckno =$row['truckno'];
            $drivername = $row['drivername'];
            $mtaxrecieptno =$row['mtaxrecieptno'];
            $declaration = $row['declaration'];
            $entrydate =$row['entrydate'];
			 $applicationdate =$row['applicationdate'];
            $status =$row['status'];
			$balance =$row['balance'];
            $mfid = $row['mfid'];
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
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>
<script type="text/javascript">

function sum() 
{ 
    var so = document.getElementById('stockopening').value; 
    var sg = document.getElementById('stockgatepass').value; 
    var result = parseInt(so) - parseInt(sg); 
    if(so=="" ||sg=="") 
    { 
        document.getElementById('balance').value = 0; 
    }
    if (!isNaN(result)) 
    { 
        document.getElementById('balance').value = result;
    }
} 


</script>
<script type="text/javascript">
function phappycode1(){
document.form1.suppliername.value = document.form1.s1.value;
}
function phappycode2(){
document.form1.stockitem.value = document.form1.s2.value;
}
function phappycode3(){
document.form1.transportername.value = document.form1.s3.value;
}


function hledger(thelist,theinput) {
	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
  
  document.form1.suppliername.value = content;
    document.form1.ledgername_n.value = theinput;
  
  
  
  
  
		
}



</script>


</head>
<body>
<?php include('../include/header.php');?>
<?php include('../include/sidemenu.php');?>

<div align="center">
  <p align="center">&nbsp;</p>
<div id = "griddiv">
  <h2 align="center"><span style="color:#F17327;">MANDI FORM 10 DETAILS</span></h2>

  <form id="form1" name="form1" method="post" action="">
    <table width="680" height="521"  border="1" cellpadding="6" frame="box" rules="none">
      <tbody>
        <tr>
          <td colspan="2"  bgcolor="#14C4B6"><h4>Application Details</h4></td>
		  <td colspan="2"  bgcolor="#14C4B6"><h4>Stock Positions</h4></td>
        </tr>
        
        <tr>
          <td>Application date</td>
          <td><input type="text" name="applicationdate" onchange = "isDate(this.value)"  value="<?php echo $applicationdate ?>" id="a2" size="17" /><a href="javascript:NewCal('a2','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
          <td>Opening Position:</td>
		  <td><input type="text" value="<?php echo $stockopening ?>" name="stockopening" id="stockopening" onkeyup="sum()"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Issue Gate Pass Qty:</td>
          <td><input type="text" name="stockgatepass" value="<?php echo $stockgatepass ?>" id="stockgatepass" onkeyup="sum()"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Balance:</td>
          <td><input name="balance" type="text" id="balance" readonly="readonly" value="<?php echo $balance ?>" />&nbsp;</td>
        </tr>
        <tr>
          <td>Party Name:</td>
          <td><input type="text" name="suppliername" value="<?php echo $suppliername?>" id="textfield6" /></td>
          <td>change  Party name: </td>
          <td><select name="s1" style="width:150px" onChange="hledger(this,this.value)" >
            <option> </option>
            <?php               
				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid");
				while($row = mysql_fetch_array($query)){
					$supid = $row['legid'];
					$suppliername = $row['leg_name'];
			
		 echo"<option  value = $supid>$suppliername</option>";
             } ?>
          </select>  <input type="hidden" name="ledgername_n"    value = <?php echo $ledgername_n111  ?> id="ledgername_n"   />  </td>
        </tr>
        <tr>
          <td>Stock Item:</td>
          <td><input type="text" name="stockitem" value="<?php echo $stockitem?>" id="textfield10" /></td>
          <td>Select Stock Item: </td>
          <td><select name="s2" style="width:150px" onchange="phappycode2()">
            <option> </option>
            <?php               
				$query = mysql_query("SELECT * FROM stockitem where fid='$fid'");
				while($row = mysql_fetch_array($query)){
					$stockid = $row['stockid'];
					$stockitem = $row['stockitem'];
			?>
            <option><?php echo $stockitem; ?></option>
            <?php } ?>
          </select></td>
        </tr>
        
        <tr>
          <td>Bags:</td>
          <td><input type="text" name="bag" value="<?php echo $bag ?>"/></td>
          <td>Gross Qty:</td>
          <td><input type="text" name="grossqty" id="textfield2" value="<?php echo $grossqty ?>" /></td>
        </tr>
        <tr>
          <td><label for="textfield">Net Qty:</label></td>
          <td><input type="text" name="netqty" value="<?php echo $netqty ?>"/>
          <input type="hidden" name="mfid" value="<?php echo $mfid ?>"/></td>
          <td><label for="textfield2">Value:</label></td>
          <td><input type="text" name="value" id="textfield5" value="<?php echo $value ?>" /></td>
        </tr>
        
        <tr>
          <td>Transporter Name:</td>
          <td><input type="text" name="transportername" value="<?php echo $transportername ?>" id="textfield" /></td>
          <td><select name="s3" style="width:150px" onchange="phappycode3()">
            <option> </option>
            <?php               
				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and transported =1");
				while($row = mysql_fetch_array($query)){
					$trid = $row['legid'];
					$transportname = $row['leg_name'];
			?>
            <option><?php echo $transportname; ?></option>
            <?php } ?>
          </select></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Truck Number:</td>
          <td><p>
            <input type="text" name="truckno" value="<?php echo $truckno ?>" id="textfield3" />
          </p></td>

          <td>Driver Name:</td>
          <td><input type="text" name="drivername" id="textfield4" value="<?php echo $drivername ?>" /></td>
        </tr>
        <tr>
          <td>Mandi TaxReciept No:</td>
          <td colspan="3"><input type="text" name="mtaxrecieptno" value="<?php echo $mtaxrecieptno ?>" id="textfield7" size="65" /></td>
        </tr>
        <tr>
          <td height="38">Name Of Decelaration:</td>
          <td><input type="text" name="declaration" id="textfield8" value="<?php echo $declaration ?>" /></td>
          <td>Status:</td>
          <td><input type="text" name="status" id="textfield9" value="<?php echo $status ?>" /></td>
        </tr>
        
        <tr>
          <td height="38">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>      
        <tr>
          <td>&nbsp;</td>
          <td><input type="hidden" name="fid" id="textfield13" value="<?php echo $fid; ?>" />&nbsp;</td>
          <td></td>
          <td>&nbsp;</td>
        </tr>
    </table>
  <p align="left">&nbsp;
    </div>
    <input type="button" name="btnprint" value="Print" onclick="PrintMe('griddiv')"/>
    <input type="submit" name="s" id="submit" value="Submit Record" />
</p>
  </form>
</div>
</body>
</html>

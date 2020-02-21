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
            $paymentno =$_POST['paymentno'];
			$paymentdate =$_POST['paymentdate'];
            $contact =$_POST['contact'];
            $farmername =$_POST['farmername'];
            $surname =$_POST['surname'];
            $villagename =$_POST['villagename'];
            $stockitem =$_POST['stockitem'];
            $estimateqty=$_POST['estimateqty'];
            $purchaseqtl= $_POST['purchaseqtl'];
			$rate =$_POST['rate'];
            $hammali=$_POST['hammali'];
            $hdenometer= $_POST['hdenometer'];
            $alock =$_POST['alock'];
			$ledgername =$_POST['ledgername'];
			$mtpid = $_POST['mtpid'];
            $ledgername_n = $_POST['ledgername_n'];
			$stkid = $_POST['stkid'];
			
		
				   
	$query = "UPDATE manditaxablepurchase SET
	        paymentno ='$paymentno',
            paymentdate =STR_TO_DATE('$paymentdate','%d/%m/%Y'),
			contact='$contact',
			farmername='$farmername',
            surname ='$surname',
            villagename ='$villagename',
            stockitem ='$stockitem',
            estimateqty ='$estimateqty',
            rate ='$rate',
            hammali ='$hammali',
            hdenometer ='$hdenometer',
            alock = '$alock',
			 ledgername = '$ledgername',
	        ledgername_n = '$ledgername_n',
			stkid = $stkid
            WHERE mtpid='$mtpid'";
	        mysql_query($query);
	 //echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
   echo "<script>alert('Data updated successfully.');location.href='manditaxablepurchase_view.php'</script>"; 

        

}
?>
<?php

try {
$query = "SELECT `fid`, `mtpid`, `paymentno`,DATE_FORMAT(paymentdate,'%d/%m/%Y') as paymentdate, `contact`, `farmername`, `surname`, 
`villagename`, `stockitem`, `estimateqty`, `purchaseqtl`, `rate`, `hammali`, `hdenometer`, `alock`,DATE_FORMAT(entrydate,'%d/%m/%Y') as entrydate, `ledgername`,stkid FROM `manditaxablepurchase` WHERE mtpid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['mtpid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
            $paymentno =$row['paymentno'];
			$paymentdate =$row['paymentdate'];
            $contact =$row['contact'];
            $farmername =$row['farmername'];
            $surname =$row['surname'];
            $villagename =$row['villagename'];
            $stockitem =$row['stockitem'];
            $estimateqty=$row['estimateqty'];
            $purchaseqtl= $row['purchaseqtl'];
			$rate =$row['rate'];
            $hammali=$row['hammali'];
            $hdenometer= $row['hdenometer'];
            $alock =$row['alock'];
			$ledgername =$row['ledgername'];
			 $entrydate =$row['entrydate'];
            $mtpid = $row['mtpid'];
			$stkid = $row['stkid'];
} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>

<script type="text/javascript">
function phappycode(){
document.form1.surname.value = document.form1.s1.value;
}

function phappycode1(){
document.form1.villagename.value = document.form1.s2.value;
}



 function phappycode2(thelist,tvalue) {

	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
	
  document.form1.stockitem.value = content;
  document.form1.stkid.value = tvalue;
  
  
  
  
		
}




function phappycode3(){
document.form1.alock.value = document.form1.s4.value;
}


  
  
  function hledger(t_actual,t_value) {
	
 var idx = t_actual.selectedIndex;
	var content = t_actual.options[idx].innerHTML;
  
  document.form1.ledgername.value = content;
  
  document.form1.ledgername_n.value = t_value;
  
		
}




</script>
</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center">  <p align="left">&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">Mandi Taxable Purchase Edit</span></h2>
  <form id="form1" name="form1" method="post" action="">
  
    <div>
      
 <table width="689" border="1" rules="none" frame="box" cellpadding="3">
      <tbody>
        <tr>
          <td>Debit Ledger: </td>
          <td><input type="text" name="ledgername"   readonly value="<?php echo $ledgername ?>" /></td>
          <td>Select Debit Ledger: </td>
          <td><select name="abc" style="width:170px" onchange="hledger(this,this.value)">
            <option> </option>
            <?php               
				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and party =1");
				while($row = mysql_fetch_array($query)){
					$exid = $row['legid'];
					$expenseshead = $row['leg_name'];
			
	           echo"<option  value = $exid>$expenseshead</option>"; 
             } ?>
          </select>    <input type="hidden" name="ledgername_n" id="ledgername_n"  />   </td>
        </tr>
        <tr>
          <td><label for="textfield">Payment Number:</label></td>
          <td><input type="text" name="paymentno" id="textfield" readonly="readonly" value="<?php echo $paymentno ?>" /></td>
          <td><label for="textfield2">Payment Date:</label></td>
          <td><input id="dstart"  onchange = "isDate(this.value)"  name = "paymentdate" size="17"   type = "text" value="<?php echo $paymentdate ?>"/><a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
        </tr>
        <tr>
          <td><label for="textfield3">Contact Number:</label></td>
          <td><input type="text" name="contact" id="textfield3" value="<?php echo $contact ?>" /></td>
          <td><label for="textfield4">Farmer Name:</label></td>
          <td><input type="text" name="farmername" id="textfield4" value="<?php echo $farmername ?>" />
          <input type="hidden" name="mtpid" id="textfield4" value="<?php echo $mtpid ?>" /></td>
        </tr>
        <tr>
          <td><label for="select">Surname:</label></td>
          <td><input type="text" value="<?php echo $surname ?>" name="surname" /></td>
          <td>Select Surname:</td>
          <td><select name="s1" id="select" onchange="phappycode()" style="width:150px">
            <option></option>
          
            <?php               
				$query = mysql_query("SELECT * FROM sirname  ");
				while($row = mysql_fetch_array($query)){
					$sirname = $row['sirname'];
			?>
            <option><?php echo $sirname; ?></option>
            <?php } ?>
          </select></td>
        </tr>
        <tr>
          <td>Village Name:</td>
          <td><input type="text" name="villagename" value="<?php echo $villagename ?>" /></td>
          <td>Select VillageName:</td>
          <td><select name="s2" id="select2" onchange="phappycode1()"  style="width:150px">
            <option></option>
                   <?php               
				$query = mysql_query("SELECT * FROM villagename ");
				while($row = mysql_fetch_array($query)){
					$villagename = $row['villagename'];
			?>
            <option><?php echo $villagename; ?></option>
            <?php } ?>
          </select></td>
        </tr>
        <tr>
          <td><label for="select3">Stock Item:</label></td>
          <td><input type="text" name="stockitem" readonly  value="<?php echo $stockitem ?>" /></td>
          <td>Select Stock Item:</td>
          <td><select name="s3" id="select3" onchange="phappycode2(this,this.value)"  style="width:150px">
            <option></option>
                 <?php               
				$query = mysql_query("SELECT * FROM stockitem where fid=$fid");
				while($row = mysql_fetch_array($query)){
					$stockid = $row['stockid'];
					$stockitem = $row['stockitem'];
			?>
            <option value = <?php echo $stockid; ?> ><?php echo $stockitem; ?></option>
            <?php } ?>
          </select></td>
        </tr>
        <tr>
          <td>Estimate Qty:</td>
          <td><input type="text" name="estimateqty" id="textfield5" value="<?php echo $estimateqty ?>" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="textfield6">Purchase Qtl:</label></td>
          <td><input type="text" name="purchaseqtl" id="textfield6" value="<?php echo $purchaseqtl ?>" /></td>
          <td><label for="textfield7">Rate:</label></td>
          <td><input type="text" name="rate" id="textfield7" value="<?php echo $rate ?>" /></td>
        </tr>
        <tr>
          <td><label for="textfield8">Hammali:</label></td>
          <td><input type="text" name="hammali" id="textfield8" value="<?php echo $hammali ?>" /></td>
          <td><label for="select4">Unit:</label></td>
          <td><input type="text" value="<?php echo $hdenometer ?>" name="hdenometer"/></td>
        </tr>
        <tr>
          <td><label for="select5">Lock For Date:</label></td>
          <td><input type="text" name="alock" value="<?php echo $alock ?>" /></td>
          <td>Select Lock:</td>
          <td><select name="s4" id="select5" onchange="phappycode3()"  style="width:150px">
            <option></option>
            <option>YES</option>
            <option>NO</option>
          </select></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
<td>
 <?php
					
					if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" )
					{ ?>
                       <input type="submit" name="s" value="Save Record" />
					
					<?php  } ?>
          
 </td>
 
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
	
	<input type="hidden" name="stkid" value="<?php echo $stkid ?>"  />
	
  </form></div>
<p align="left">&nbsp;</p>
  </form>&nbsp;
</div>
</body>
</html>

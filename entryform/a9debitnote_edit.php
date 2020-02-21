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
            $billno =$_POST['billno'];
            $billvalue =$_POST['billvalue'];
            $claims =$_POST['claims'];
            $shortage =$_POST['shortage'];
            $moisture =$_POST['moisture'];
            $sand =$_POST['sand'];
            $oil = $_POST['oil'];
            $kirda =$_POST['kirda'];
            $labour =$_POST['labour'];
            $cashdcond = $_POST['cashdcond'];
            $brokerage =$_POST['brokerage'];
            $postage = $_POST['postage'];
            $bardanaclaims = $_POST['bardanaclaims'];
            $entrydate =$_POST['entrydate'];
            $bankcharges =$_POST['bankcharges'];
            $other = $_POST['other'];
			$freight = $_POST['freight'];
			$gatepass = $_POST['gatepass'];
			$rated = $_POST['rated'];
			$bankc = $_POST['bankc'];
            $debid = $_POST['debid'];
			 $credit = $_POST['credit'];
			$tclaim = trim(strip_tags(addslashes($_POST['tclaim'])));
            $tpaid = trim(strip_tags(addslashes($_POST['tpaid'])));
			
			$supplier_id = trim(strip_tags(addslashes($_POST['supplier_id'])));
			$ledgername_n = trim(strip_tags(addslashes($_POST['ledgername_n'])));
			
			
			
			


			
	$query = "UPDATE mandia9 SET
	        suppliername ='$suppliername',
            billno ='$billno',
            billvalue ='$billvalue',
            claims ='$claims',
            shortage ='$shortage',
            moisture ='$moisture',
            sand ='$sand',
            oil = '$oil',
            kirda ='$kirda',
            cashdcond ='$cashdcond',
            brokerage = '$brokerage',
            postage ='$postage',
            bardanaclaims = '$bardanaclaims',
            entrydate =STR_TO_DATE('$entrydate','%d/%m/%Y'),
            bankcharges ='$bankcharges',
            other = '$other',
			freight = '$freight',
			gatepass = '$gatepass',
			rated = '$rated',
			bankc ='$bankc',
			tclaim = '$tclaim',
			tpaid = '$tpaid',
			credit = '$credit',
			supid = '$supplier_id',
			ledgername_n = '$ledgername_n'
            WHERE debid='$debid'";
	        mysql_query($query);
	 //echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
   echo "<script>alert('Data updated successfully.');location.href='a9debitnote_view.php'</script>"; 

        

}
?>
<?php

try {
$query = "SELECT `debid`, `supid`, `fid`, `a4id`, `suppliername`, `billno`, `billvalue`, `claims`, `shortage`, `moisture`, `sand`, `oil`, `kirda`, `labour`,
 `cashdcond`, `brokerage`, `postage`, `bardanaclaims`,DATE_FORMAT(entrydate,'%d/%m/%Y')  as entrydate, `bankcharges`, `other`,
 `freight`, `gatepass`, `rated`, `bankc` ,tclaim,tpaid,`credit`,ledgername_n FROM `mandia9` WHERE debid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['debid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
            $suppliername =$row['suppliername'];
            $billno =$row['billno'];
            $billvalue =$row['billvalue'];
            $claims =$row['claims'];
            $shortage =$row['shortage'];
            $moisture =$row['moisture'];
            $sand =$row['sand'];
            $oil = $row['oil'];
            $kirda =$row['kirda'];
            $labour =$row['labour'];
            $cashdcond = $row['cashdcond'];
            $brokerage =$row['brokerage'];
            $postage = $row['postage'];
            $bardanaclaims = $row['bardanaclaims'];
            $entrydate =$row['entrydate'];
            $bankcharges =$row['bankcharges'];
            $other = $row['other'];
			$freight = $row['freight'];
			$gatepass = $row['gatepass'];
			$rated = $row['rated'];
			$bankc = $row['bankc'];
            $debid = $row['debid'];
			$credit = $row['credit'];
		    $tclaim = $row['tclaim'];
            $tpaid = $row['tpaid'];
			$t_supid = $row['supid'];
			$t_ledgerid = $row['ledgername_n'];
			
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
<script type="text/javascript">


function claimtotal()
{

document.form1.tclaim.value = Number(document.form1.claims.value) + Number(document.form1.shortage.value) + Number(document.form1.moisture.value) + Number(document.form1.sand.value) + Number(document.form1.oil.value) + Number(document.form1.kirda.value) + Number(document.form1.labour.value) + Number(document.form1.cashdcond.value) + Number(document.form1.brokerage.value)  + Number(document.form1.bardanaclaims.value) +  Number(document.form1.bankcharges.value) + Number(document.form1.freight.value) + Number(document.form1.gatepass.value) + Number(document.form1.rated.value) + Number(document.form1.bankc.value) + Number(document.form1.other.value) + Number(document.form1.postage.value)      

document.form1.tpaid.value =    Number(document.form1.billvalue.value) - Number(document.form1.tclaim.value)
	
	
}

function hledger(t_actual,t_value) {
 var idx = t_actual.selectedIndex;
 var content = t_actual.options[idx].innerHTML;
  
  document.form1.credit.value = content;
 document.form1.ledgername_n.value = t_value;
  
		
}

function hledger1(t_actual,t_value) {
 var idx = t_actual.selectedIndex;
 var content = t_actual.options[idx].innerHTML;
  
  document.form1.suppliername.value = content;
 document.form1.supplier_id.value = t_value;
  
		
}



function ValidateForm(){



    var dt=document.form1.entrydate

	    if (isDate(dt.value)==false){

	           dt.focus()

              return false

    }

	return true 


}
	



</script>


</head>
<body>
<?php include('../include/header.php');?>
<?php include('../include/sidemenu.php');?>

<div align="center">
<p align="center">&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">Debit Note edit form</span></h2>
  
  <form id="form1" name="form1"  onSubmit="return ValidateForm()"  method="post" action="">
    <table  border="1" rules="none" frame="box" cellpadding="6">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Debit Note Details</h4></td>
        </tr>
        <tr>
          <td width="128">Party Name</td>
          <td colspan="2"><input type="text" readonly="readonly" name="suppliername" size="40" value="<?php echo $suppliername; ?>"/></td>
          
          <td width="200"><select name="supid" style="width:156px" onchange="hledger1(this,this.value)">
            <option> </option>
            <?php               
				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid ");
				while($row = mysql_fetch_array($query)){
					$supid = $row['legid'];
					$suppliername = $row['leg_name'];
			
	           echo"<option  value = $supid>$suppliername</option>"; 
             } ?>
          </select>   <input type="hidden" name="supplier_id" id="supplier_id" value="<?php echo $t_supid; ?>"  />  </td>
		  
		  
		  
        </tr>
        <tr>
          <td>Credit Ledger: </td>
          <td colspan="2"><input type="text" name="credit" size="40" value="<?php echo $credit; ?>"/></td>
         
          <td><select name="abc" style="width:170px" onchange="hledger(this,this.value)">
                       <option> </option>
                       <?php               
				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid  and party = 1");
				while($row = mysql_fetch_array($query)){
					$exid = $row['legid'];
					$expenseshead = $row['leg_name'];
			
	           echo"<option  value = $exid>$expenseshead</option>"; 
                        } ?>
                     
                     </select>   <input type="hidden" name="ledgername_n" id="ledgername_n"  value="<?php echo $t_ledgerid; ?>"  />    </td>
        </tr>
        <tr>
          <td>Bill No.:</td>
          <td><input type="text" name="billno"  value="<?php echo $billno; ?>"/></td>
          <td>Bill Value:</td>
          <td><input type="text" name="billvalue" value="<?php echo $billvalue; ?>"/></td>
        </tr>
        <tr>
          <td>Claims:</td>
          <td><input type="text" name="claims" onkeyup = "claimtotal()" value="<?php echo $claims; ?>"/></td>
          <td>Shortage:</td>
          <td><input type="text" name="shortage" onkeyup = "claimtotal()" value="<?php echo $shortage; ?>"/></td>
        </tr>
        <tr>
          <td><label for="textfield">Moisture%:</label></td>
          <td><input type="text" name="moisture" onkeyup = "claimtotal()"  value="<?php echo $moisture; ?>"/></td>
          <td><label for="textfield2">Dust(Sand)%:</label></td>
          <td><input type="text" name="sand" id="textfield2" onkeyup = "claimtotal()" value="<?php echo $sand; ?>" /></td>
        </tr>
        <tr>
          <td><label for="textfield5">Oil%:</label></td>
          <td><input type="text" name="oil" id="textfield5" onkeyup = "claimtotal()" value="<?php echo $oil; ?>" /></td>
          <td>Kirda:</td>
          <td><input type="text" name="kirda" id="textfield" onkeyup = "claimtotal()"  value="<?php echo $kirda; ?>" /></td>
        </tr>
        <tr>
          <td><label for="textfield6">Labour:</label></td>
          <td><p>
            <input type="text" name="labour" id="textfield6" onkeyup = "claimtotal()" value="<?php echo $kirda; ?>" />
          </p></td>

          <td>Cash Discount</td>
          <td><input type="text" name="cashdcond" id="textfield3" onkeyup = "claimtotal()" value="<?php echo $cashdcond; ?>" /></td>
        </tr>
        <tr>
          <td>Brokerage:</td>
          <td><input type="text" name="brokerage" id="textfield4"  onkeyup = "claimtotal()" value="<?php echo $brokerage; ?>" /></td>
          <td>Postage:</td>
          <td><input type="text" name="postage" id="textfield7" onkeyup = "claimtotal()" value="<?php echo $postage; ?>" /></td>
        </tr>
        <tr>
          <td height="38">Bardana Claims:</td>
          <td><input type="text" name="bardanaclaims" id="textfield8" onkeyup = "claimtotal()" value="<?php echo $bardanaclaims; ?>" /></td>
          <td>Bank Charges:</td>
          <td><input type="text" name="bankcharges" id="textfield9" onkeyup = "claimtotal()" value="<?php echo $bankcharges; ?>" /></td>
        </tr>
        <tr>
          <td>Freight:</td>
          <td><input type="text" name="freight" id="textfield10" onkeyup = "claimtotal()" value="<?php echo $freight; ?>" /></td>
          <td>Gatepass:</td>
          <td><input type="text" name="gatepass" id="textfield14" onkeyup = "claimtotal()"  value="<?php echo $gatepass; ?>" /></td>
        </tr>
        <tr>
          <td>Rate Difference:</td>
          <td><input type="text" name="rated" id="textfield11" onkeyup = "claimtotal()" value="<?php echo $rated; ?>" /></td>
          <td>Bank Commission:</td>
          <td><input type="text" name="bankc" id="textfield15" onkeyup = "claimtotal()" value="<?php echo $bankc; ?>" /></td>
        </tr>
        <tr>
          <td height="38">Others:</td>
          <td><input type="text" name="other" id="textfield12" onkeyup = "claimtotal()" value="<?php echo $other; ?>" /></td>
          <td>Entry Date:</td>
          <td><input type="text" name="entrydate"  onchange = "isDate(this.value)" size="17" value="<?php echo $entrydate; ?>" />
            <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>          </td>
        </tr>  

         <tr>
          <td height="38">Total claim:</td>
          <td><input type="text" name="tclaim" id="tclaim" value="<?php echo $tclaim; ?>" /></td>
          <td height="38">Total Paid:</td>
          <td><input type="text" name="tpaid" id="tpaid" value="<?php echo $tpaid; ?>" /></td>
        </tr> 
		
        <tr>
          <td>&nbsp;</td>
          <td><input type="hidden" name="debid" id="textfield13" value="<?php echo $debid; ?>" />&nbsp;</td>
          <td><input type="submit" name="s" id="submit" value="Submit Record" /></td>
          <td>&nbsp;</td>
        </tr>
    </table>
  </form>
   
</div>
</body>
</html>

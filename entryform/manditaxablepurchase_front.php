<?php

session_start();
if(!isset($_SESSION['uname'])) { echo '<script>window.location="../index.php"</script>'; }

include("../conf.php");
$fid=$_SESSION['fid'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>


<script language="javascript">

function hledger(thelist,theinput) {
	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
  
  document.form1.ledgername_n.value = content;
  
		
}

 function hledger111(thelist) {

	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
	
//	alert(content);
  

  document.form1.stkid.value = content;
  
  //document.form1[ "debitname" + icnt ].value  = content;
  
		
}




function ValidateForm(){



		var dt=document.form1.stockitem;
	    if (dt.value=="0"){

		 alert('Select stock item  ...');
		  document.form1.item2.focus();

		  dt.focus()


              return false


    }
	
		var dt=document.form1.ledgername;
	    if (dt.value=="0"){

		 alert('Select ledger name ...');

		  dt.focus()


              return false


    }
	

    var dt=document.form1.paymentdate
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

<div align="center"><p align="left">&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">Add Mandi Taxable Purchase details</span></h2>
  <form id="form1" name="form1"   onSubmit="return ValidateForm()"  method="post" action="manditaxablepurchase_back.php">
    
    <div align="left"></div>
    <table width="689" border="1" rules="none" frame="box" cellpadding="1">
      <tbody>
        <tr>
     
          <td>Debit Ledger: </td>
          <td><select name="ledgername"   autofocus   onChange="hledger(this,this.value)"  style="width:170px">
                       <option value = "0"> </option>
                       <?php               
				$query = mysql_query("SELECT legid,leg_name   FROM ledger_master where fid=$fid   and party =1");
				while($row = mysql_fetch_array($query)){
					$exid = $row['legid'];
					$expenseshead = $row['leg_name'];
			
                      echo"<option  value = $exid>$expenseshead</option>"; 

										   } ?>
          </select>&nbsp;  			<input type="hidden" name="ledgername_n" id="ledgername_n"  /> </td>
        </tr>
        <tr>
          <td><label for="textfield">Payment Number:</label></td>
          <td><input type="text" name="paymentno" id="textfield" required="required" /></td>
          <td><label for="textfield2">Payment Date:</label></td>
          <td><input id="dstart"   name = "paymentdate" onchange = "isDate(this.value)"  type = "text"  size="17"  value="DD/MM/YYYY" required="required"  />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="textfield3">Contact Number:</label></td>
          <td><input type="text" name="contact" id="textfield3" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Farmer Name:</td>
          <td><input type="text" name="farmername" id="textfield4" required="required" /></td>
          <td>Surname:</td>
          <td><select name="surname" id="select" style="width:150px">
            <option value = "None"></option>
            <option>Select Sur Name</option>
            <?php               
				$query = mysql_query("SELECT * FROM sirname");
				while($row = mysql_fetch_array($query)){
					$sirname = $row['sirname'];
			?>
            <option><?php echo $sirname; ?></option>
            <?php } ?>
          </select></td>
        </tr>
        <tr>
          <td>Village Name:</td>
          <td><select name="villagename" id="select2"  style="width:150px">
            <option value = "None"></option>
            <option>Select Village Name</option>
            <?php               
				$query = mysql_query("SELECT * FROM villagename");
				while($row = mysql_fetch_array($query)){
					$villagename = $row['villagename'];
			?>
            <option><?php echo $villagename; ?></option>
            <?php } ?>
          </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="select3">Stock Item:</label></td>
          <td><select name="stockitem" id="select3"  onchange = "hledger111(this)" style="width:150px">
          <option value = "0"></option>
          <option>Select Stock Item</option>
           <?php               
				$query = mysql_query("SELECT * FROM stockitem where fid=$fid");
				while($row = mysql_fetch_array($query)){
					$stockid = $row['stockid'];
					$stockitem = $row['stockitem'];
			?>
                       <option value = "<?php echo $stockid; ?>" ><?php echo $stockitem; ?></option>
                       <?php } ?>
          </select></td>
          <td><label for="textfield5">Estimate Qty(Bag):</label></td>
          <td><input type="text" name="estimateqty" id="textfield5" required="required" /></td>
        </tr>
        <tr>
          <td><label for="textfield6">Purchase Qtl:</label></td>
          <td><input type="text" name="purchaseqtl" id="textfield6" required="required" /></td>
          <td>Unit:</td>
          <td>
		  <select name="hdenometer" style="width:150px">
		   <option>Quintal</option>
		  <option>Bags</option>
		  <option>Bundles</option>
		  <option>Cubic Feet</option>
		  <option>Cartoons</option>
		  <option>Dozen</option>
		  <option>Drums</option>
		  <option>Kilograms</option>
		  <option>KiloLeters</option>
		  <option>Liters</option>
		  <option>Metric Tons</option>
		  <option>Numbers</option>
		  <option>Others</option>
		  <option>Rolls</option>
		  <option>Tons</option>
		 
		  </select>
		  </td>
        </tr>
        <tr>
          <td>Rate:</td>
          <td><input type="text" name="rate" id="textfield7" required="required" /></td>
          <td>Hammali(Rs./QTL):</td>
          <td><input type="text" name="hammali" id="textfield8" /></td>
        </tr>
        <tr>
          <td><label for="select5">Lock For Date:</label></td>
          <td><select name="alock" id="select5"  style="width:150px">
          <option></option>
          <option>YES</option>
          <option>NO</option>
          </select></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
 <td>  <?php  if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" ) { ?>
<input type="submit" name="s" id="submit" value="Submit Record" />
<?php  } ?>
 </td>
 
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
	
	<input type="hidden" name="stkid" />
	
	
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </form>
</div>
</body>
</html>

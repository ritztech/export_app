<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }

$fid=$_SESSION['fid'];
?>
<?php include('../conf.php');?>
<?php 

if(isset($_POST['s'])) {
$stockitem=$_POST['stockitem'];
$quantitytype=$_POST['quantitytype'];
$reportformanditax=$_POST['reportformanditax'];
$quantityop=$_POST['quantityop'];
$sdate=$_POST['sdate'];
$svalue=$_POST['svalue'];

$stockid = $_POST['stockid'];

	 $hsnno = trim(strip_tags(addslashes(strtoupper($_POST['hsnno']))));
	  $gst = trim(strip_tags(addslashes($_POST['gst'])));
		
	 $idetails = trim(strip_tags(addslashes(strtoupper($_POST['idetails']))));		
						 
						 
						 




	$query = "UPDATE stockitem SET
	stockitem='$stockitem',
    quantitytype='$quantitytype',
    reportformanditax='$reportformanditax',
	quantityop='$quantityop',
	sdate=STR_TO_DATE('$sdate','%d/%m/%Y'),
	svalue='$svalue',
    hsn = '$hsnno',
    gst = '$gst' ,
    i_detail = '$idetails'	
	WHERE stockid ='$stockid '";
	mysql_query($query);
	//echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
   echo "<script>alert('Data updated successfully.');location.href='stockitem_view.php'</script>"; 

        

}
?>
<?php
try {
$query = "SELECT `stockid`, `stockitem`, `quantitytype`, `reportformanditax`, `quantityop`, DATE_FORMAT(sdate,'%d/%m/%Y') as sdate, `svalue`,name ,hsn,gst,i_detail FROM `stockitem`,stk_grp WHERE id = `stkgrp` and stockid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['stockid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$stockitem= $row['stockitem'];
$quantitytype= $row['quantitytype'];
$reportformanditax= $row['reportformanditax'];
$quantityop= $row['quantityop'];
$svalue= $row['svalue'];
$sdate= $row['sdate'];
$stockid = $row['stockid'];
$name = $row['name'];
$hsn = $row['hsn'];
$gst = $row['gst'];

$i_detail = $row['i_detail'];



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
document.form1.reportformanditax.value = document.form1.securitylevel1.value;
}

function phappycode1(){
document.form1.status.value = document.form1.status1.value;
}


function phappycode2(){
document.form1.fiddd.value = document.form1.fid.value;
}</script>

</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center">
<p>&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">edit stock item</span></h2>
  
    
    <form id="form1" name="form1" method="post" action="">
      <table width="588" border="1" rules="none" frame="box" cellpadding="9">
        <tbody>
          <tr>
            <td><label for="textfield">Stock Item:</label></td>
            <td><input type="text" name="stockitem" value="<?php echo $stockitem; ?>"  /></td>
          </tr>
		         <tr>
            <td><label for="textfield">Group Name:</label></td>
            <td><input type="text"  readonly name="grpname" value="<?php echo $name; ?>"  /></td>
          </tr>
		  
		  			            <tr>
              <td width="208"><label for="textfield">ITEM DETAILS:</label></td>
              <td width="233"><input type="text"   name="idetails"   value="<?php echo $i_detail; ?>"   /></td>
            </tr>
			
			
		  
		  			            <tr>
              <td width="208"><label for="textfield">HSN Number:</label></td>
              <td width="233"><input type="text"   name="hsnno"   value="<?php echo $hsn; ?>" /></td>
            </tr>
			
					            <tr>
              <td width="208"><label for="textfield">GST%:</label></td>
              <td width="233"><input type="gst"   name="gst"  value="<?php echo $gst; ?>"   /></td>
            </tr>
			
			
			
          <tr>
            <td>Quantity Type:</td>
            <td>  <select name="quantitytype"  style="width:170px">
		   <option><?php echo $quantitytype; ?></option>
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
		  <option>Quintal</option>
		  </select>
		  </td>
          </tr>
          <tr>
            <td>Quantity(OP)</td>
            <td><input type="text" name="quantityop" id="textfield" value="<?php echo $quantityop; ?>" />&nbsp;</td>
          </tr>
          <tr>
            <td>Value:</td>
            <td><input type="text" name="svalue" id="svalue" value="<?php echo $svalue; ?>" />&nbsp;</td>
          </tr>
          <tr>
            <td>Date:</td>
            <td><input id="sdate"   name = "sdate"   type = "text"  size="17"  value="<?php echo $sdate; ?>" />  <a href="javascript:NewCal('sdate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div>&nbsp;</td>
          </tr>
          <tr>
            <td><label for="select2">Item as Freight:</label></td>
            <td><p>
              <input type="text" name="reportformanditax" readonly  value="<?php echo $reportformanditax; ?>" /> 
              <select name="securitylevel1" onchange="phappycode()"  id="select2">
                  <option> Select access</option>
                  <option>YES</option>
                  <option>NO</option>
				  <option>FREIGHT</option>
                </select>
              </p>              </td>
          </tr>
          <tr>
            <td><input type="hidden" name="stockid" value="<?php echo $stockid; ?>"  /></td>
            
			
			 <td>  <?php  if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" ) { ?>
<input type="submit" name="s" id="submit" value="Submit" />
<?php  } ?> </td>
          </tr>
        </tbody>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>
        <label for="textfield2"><br />
        </label>
      </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </form>
    <p>&nbsp;</p>
  </blockquote>
</div>
</body>
</html>

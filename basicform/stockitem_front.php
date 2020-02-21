<?php
session_start();
if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

include('../conf.php');


$query_color="SELECT `gid`,`gname`  FROM `godown`  order by 2 ";
$result_color=mysql_query($query_color);

$query_color1="SELECT `id`,`name`  FROM `stk_grp`   ";
$result_color1=mysql_query($query_color1);

$qry_units="SELECT units FROM `units`   ";
$res_units=mysql_query($qry_units);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>

<script language="javascript">

 function hledger112(thelist) {

	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
	
    document.form1.stkname.value = content;
  

  
		
}



</script>



</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div>
  <h2 align="center"><span style="color:#F17327;">ADD NEW PRODUCT </span></h2>
  
    
    <form id="form1" name="form1" method="post" action="stockitem_back.php">
     
      <div align="center">
        <table width="517" border="2" rules="none" frame="box" cellpadding="8">
          <tbody>
            <tr>
              <td width="208"><label for="textfield">Product Name:</label></td>
              <td width="233"><input type="text"  autofocus name="stockitem"  /></td>
            </tr>
			
			
								            <tr>
              <td>Stock Group </td>
              <td>      <select name = "stkgrp"    style="width:170px" >
      <option   value="0"> </option>
      <?php 

	while($query_data1 = mysql_fetch_array($result_color1)){
	 
	 echo"<option  value = '{$query_data1['0']}'>{$query_data1['1']}  </option>"; 

	 }
	 ?> </select>  </td>
	 

	 
            </tr>
			
					            <tr>
              <td width="208"><label for="textfield">Product Description:</label></td>
              <td width="233">
			  
			  
<textarea id="idetails"  name="idetails"   rows="4" cols="50">

</textarea>  </td>
			  
			  
  <td>
            </tr>
			
			
			
			            <tr>
              <td width="208"><label for="textfield">HSN Number:</label></td>
              <td width="233"><input type="text"   value = ""  name="hsnno"  /></td>
            </tr>
			
			
			
					            <tr>
              <td width="208"><label for="textfield">GST%:</label></td>
              <td width="233"><input type="gst"   value = "0"  name="gst"  /></td>
            </tr>
			
			
			
			
			
			
			
            <tr>
              <td>Unit Type:</td>
              <td>
	
		  <select name = "quantitytype"   style="width:170px" >
      <?php 

	while($query_data = mysql_fetch_array($res_units)){
	 
	 echo"<option  value = '{$query_data['0']}'>{$query_data['0']}  </option>"; 

	 }
	 ?> </select>
	 
		  
		  
		  </td>
            </tr>
            <tr>
              <td>Quantity(OP)</td>
              <td><input type="text" name="quantityop" value = "0" id="textfield" /></td>
            </tr>
			
			            <tr>
              <td>Date</td>
	  
			   <td><input id="sdate"   name = "sdate"  onchange = "isDate(this.value)"  type = "text"  size="17"  value="01/04/2017" />  <a href="javascript:NewCal('sdate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </div>&nbsp;</td>
			  
			  
            </tr>
			
			            <tr>
              <td>Value</td>
              <td><input type="text" name="svalue" value = "0"id="svalue" /></td>
            </tr>
			

			
					            <tr>
              <td>Godown </td>
              <td>      <select name = "p_category"  onchange = "hledger112(this)"   style="width:170px" >
      <?php 

	while($query_data = mysql_fetch_array($result_color)){
	 
	 echo"<option  value = '{$query_data['0']}'>{$query_data['1']}  </option>"; 

	 }
	 ?> </select>  </td>
	 

	 
            </tr>
			
			
			
			
			
			
            <tr>
              <td>Item as Freight:</td>
              <td><select name="reportformanditax" style="width:170px">
             
            <option size="30">YES</option>            
			<option>NO</option>
			<option>FREIGHT</option>
			
              </select></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="center">
			    <?php  if($_SESSION['securitylevel']=="ADMIN" ||  $_SESSION['securitylevel']=="TRANSACTION RIGHTS" ) { ?>
<input type="submit" name="s" id="submit" value="Submit" />
<?php  } ?>

              </div></td>
			  
			  
			  

 
			  
			  
			  
			  
            </tr>
          </tbody>
        </table>
      </div>
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
	  
	  <input  type = "text"  size = "20" name = "stkname"  value = "None" id = "stkname"  /> 
	  
	  
    </form>
    <p>&nbsp;</p>
  </blockquote>
</div>
<?php include('../include/footer.php');?>
</body>
</html>

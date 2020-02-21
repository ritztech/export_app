<?php
session_start();
if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

include('../conf.php');


$query_color="SELECT `legid`,`leg_name` FROM `ledger_master` WHERE `transported`=1 ";
$result_color=mysql_query($query_color);

$query_color1="SELECT `id`,`name`  FROM `stk_grp`   ";
$result_color1=mysql_query($query_color1);



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
<p>&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">Add Vehicle Master</span></h2>
  
    
    <form id="form1" name="form1" method="post"  enctype="multipart/form-data"  action="vehicle_master_bck.php">
     
      <div align="center">
        <table width="517" border="2" rules="none" frame="box" cellpadding="8"  style="font-style:bold"  >
          <tbody>
            <tr>
              <td width="208"><label for="textfield">Vehicle Number:</label></td>
              <td width="233"><input type="text"  autofocus name="stockitem"  /></td>
            </tr>
			
			
					            <tr>
              <td width="208"><label for="textfield">Driver Name:</label></td>
              <td width="233"><input type="text"   value = ""  name="idetails"  /></td>
            </tr>
			
			
			
			       		
			
			

			

			
					            <tr>
              <td>Transporter Name </td>
              <td>      <select name = "p_category"  onchange = "hledger112(this)"   style="width:170px" >
      <?php 

	while($query_data = mysql_fetch_array($result_color)){
	 
	 echo"<option  value = '{$query_data['0']}'>{$query_data['1']}  </option>"; 

	 }
	 ?> </select>  </td>
	 

	 
            </tr>
			
           <tr>
              <td width="208"><label for="textfield">Registration Image:</label></td>
              <td width="233"><input name="registration_file"  id="registration_file" type="file"   />  </td>
            </tr>
			           <tr>
              <td width="208"><label for="textfield">Insurance Image:</label></td>
              <td width="233"><input name="insurance_file"  id="insurance_file" type="file"   />  </td>
            </tr>
			           <tr>
              <td width="208"><label for="textfield">Driving Licence Image:</label></td>
              <td width="233"><input name="drivin_licence_file"  id="drivin_licence_file" type="file"   />  </td>
            </tr>
			
			           <tr>
              <td width="208"><label for="textfield">Aadhar card_image:</label></td>
              <td width="233"><input name="aadhar_card_file"  id="aadhar_card_file" type="file"   />  </td>
            </tr>
			           <tr>
              <td width="208"><label for="textfield">Driver Signature Image:</label></td>
              <td width="233"><input name="driver_sign_file"  id="driver_sign_file" type="file"   />  </td>
            </tr>
			           <tr>
              <td width="208"><label for="textfield">Any other Image:</label></td>
              <td width="233"><input name="any_other_file"  id="any_other_file" type="file"   />  </td>
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

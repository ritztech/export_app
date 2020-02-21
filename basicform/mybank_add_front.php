<?php
session_start();
if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

include('../conf.php');




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
  <h2 align="center"><span style="color:#F17327;">Add Bank Details </span></h2>
  
    
    <form id="form1" name="form1" method="post"  enctype="multipart/form-data"  action="my_bank_bck.php">
     
      <div align="center">
        <table  border="2" rules="none" frame="box" cellpadding="1"  bgcolor="white"  style="font-style:bold"  >
          <tbody>
            <tr>
              <td width="208"><label for="textfield">Bank name:</label></td>
              <td width="233"><input type="text"  autofocus name="bankname"  /></td>
            </tr>
			
			
					            <tr>
              <td width="208"><label for="textfield">Branch Address:</label></td>
              <td width="233"><input type="text"   value = ""  name="brchadrr"  /></td>
            </tr>
			
			
						
					            <tr>
              <td width="208"><label for="textfield">Account Holder Name:</label></td>
              <td width="233"><input type="text"   value = ""  name="accname"  /></td>
            </tr>
			
						
					            <tr>
              <td width="208"><label for="textfield">Account Number :</label></td>
              <td width="233"><input type="text"   value = ""  name="accnumm"  /></td>
            </tr>
			
						
					            <tr>
              <td width="208"><label for="textfield">IFSC Code :</label></td>
              <td width="233"><input type="text"   value = ""  name="ifsccode"  /></td>
            </tr>
			
						
					            <tr>
              <td width="208"><label for="textfield">SWIFT Code :</label></td>
              <td width="233"><input type="text"   value = ""  name="swiftcode"  /></td>
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

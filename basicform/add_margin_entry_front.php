<?php
session_start();
if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

include('../conf.php');

date_default_timezone_set('Asia/Kolkata');
//echo date('d-m-Y H:i:s');
$t_date = date("d/m/Y");


//echo $t_date;



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
  <h2 align="center"><span style="color:#F17327;">Add Data</span></h2>
  
    
    <form id="form1" name="form1" method="post"  enctype="multipart/form-data"  action="daat_mkargin_bck.php">
     
      <div align="center">
        <table  border="2" rules="none" frame="box" cellpadding="1"  bgcolor="white"  style="font-style:bold"  >
          <tbody>
		        <tr>
              <td width="208"><label for="textfield">Date:</label></td>
              <td width="233"><input type="text"  value="<?php  echo $t_date ?>" name="tdate"  /></td>
            </tr>
			
			
            <tr>
              <td width="208"><label for="textfield">QTY in MTS:</label></td>
              <td width="233"><input type="text"   required="required" autofocus name="qty"  /></td>
            </tr>
			
			
					            <tr>
              <td width="208"><label for="textfield">SALE RATE (in USD):</label></td>
              <td width="233"><input type="text" required="required"  value = ""  name="salesrate"  /></td>
            </tr>
			
			
						
					            <tr>
              <td width="208"><label for="textfield">PURCHAE RATE (INR):</label></td>
              <td width="233"><input type="text" required="required"  value = ""  name="purrates"  /></td>
            </tr>
			
						
					            <tr>
              <td width="208"><label for="textfield">RATE CONVERT USD TO INR :</label></td>
              <td width="233"><input type="text" required="required"   value = ""  name="usdinr"  /></td>
            </tr>
			
						
					            <tr>
              <td width="208"><label for="textfield">BROKERAGE(PMT) :</label></td>
              <td width="233"><input type="text" required="required"  value = ""  name="brokerages"  /></td>
            </tr>
			
						
					            <tr>
              <td width="208"><label for="textfield">DUTY DRAWABACK(%) :</label></td>
              <td width="233"><input type="text"  required="required"  value = ""  name="dutydraww"  /></td>
            </tr>
			
			
								            <tr>
              <td width="208"><label for="textfield">MEIS(%):</label></td>
              <td width="233"><input type="text" required="required"   value = ""  name="meisss"  /></td>
            </tr>
			
			
								            <tr>
              <td width="208"><label for="textfield">  OTHER EXPENSE :</label></td>
              <td width="233"><input type="text"   value = ""  name="otherexpp"  /></td>
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

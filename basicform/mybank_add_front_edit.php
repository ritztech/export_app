<?php
session_start();
if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

include('../conf.php');


$id=$_GET['id'];

$result1 = mysql_query("SELECT `bank_id`, `bnkname`, `branchaddr`, `accname`, `accnum`, `ifsc`, `swidt` FROM `mybanks`   where bank_id=$id");
$row1 = mysql_fetch_array($result1);




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
  <h2 align="center"><span style="color:#F17327;">EDIT  Bank Details </span></h2>
  
    
    <form id="form1" name="form1" method="post"  enctype="multipart/form-data"  action="my_bank_edit_1_bck.php">
     
      <div align="center">
        <table  border="2" rules="none" frame="box" cellpadding="1"  bgcolor="white"  style="font-style:bold"  >
          <tbody>
            <tr>
              <td width="208"><label for="textfield">Bank name:</label></td>
              <td width="233"><input type="text"  value = "<?php  echo $row1['bnkname'] ?>" autofocus name="bankname"  /></td>
            </tr>
			
			
					            <tr>
              <td width="208"><label for="textfield">Branch Address:</label></td>
              <td width="233"><input type="text"   value = "<?php  echo $row1['branchaddr'] ?>"   name="brchadrr"  /></td>
            </tr>
			
			
						
					            <tr>
              <td width="208"><label for="textfield">Account Holder Name:</label></td>
              <td width="233"><input type="text"    value = "<?php  echo $row1['accname'] ?>"   name="accname"  /></td>
            </tr>
			
						
					            <tr>
              <td width="208"><label for="textfield">Account Number :</label></td>
              <td width="233"><input type="text"    value = "<?php  echo $row1['accnum'] ?>"  name="accnumm"  /></td>
            </tr>
			
						
					            <tr>
              <td width="208"><label for="textfield">IFSC Code :</label></td>
              <td width="233"><input type="text"    value = "<?php  echo $row1['ifsc'] ?>"   name="ifsccode"  /></td>
            </tr>
			
						
					            <tr>
              <td width="208"><label for="textfield">SWIFT Code :</label></td>
              <td width="233"><input type="text"    value = "<?php  echo $row1['swidt'] ?>"   name="swiftcode"  /></td>
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
	  
	  <input  type = "hidden"  name = "bankidd"  value = "<?php echo $id  ?>" id = "bankidd"  /> 
	  
	  
    </form>
    <p>&nbsp;</p>
  </blockquote>
</div>
<?php include('../include/footer.php');?>
</body>
</html>

<?php
session_start();
if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>

</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div>
<p>&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">Add Godown</span></h2>
  
    
    <form id="form1" name="form1" method="post" action="godown_bck.php">
      
      <div align="center">
        <table width="517" border="1" rules="none" frame="box" cellpadding="8">
          <tbody>
            <tr>
              <td width="208"><label for="textfield">Godown name:</label></td>
              <td width="233"><input type="text"   autofocus name="gname"  /></td>
            </tr>

            <tr>
              <td>Address</td>
              <td><input type="text" name="gaddress"  /></td>
            </tr>
			
			            <tr>
              <td>Contact no</td>
	  
			   <td><input type="text" name="gcontact"  /></td>
			  
			  
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
    
      
    </form>
   
  </blockquote>
</div>
</body>
</html>

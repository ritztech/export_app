<?php
session_start();
if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

include('../conf.php');

$id=$_GET['id'];



$result1 = mysql_query("SELECT `gid`, `gname`, `gcontact`, `gaddress`, `fid` FROM `godown`  where gid=$id");
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
  <h2 align="center"><span style="color:#F17327;">Update Godown details</span></h2>
  
    
    <form id="form1" name="form1" method="post" action="godown_master_front_edit_bck.php">
     
      <div align="center">
        <table width="517" border="2" rules="none" frame="box" cellpadding="8"  style="font-style:bold"  >
          <tbody>
            <tr>
              <td width="208"><label for="textfield">NAME:</label></td>
              <td width="233"><input type="text"   size = "30" value="<?php echo $row1['gname']; ?>" name="gname" required = "required"  /></td>
            </tr>
			
			
					            <tr>
              <td width="208"><label for="textfield">Contact</label></td>
              <td width="233"><input type="text"  value="<?php echo $row1['gcontact']; ?>"  name="gcontact"  /> </td>
            </tr>
			
								            <tr>
              <td width="208"><label for="textfield">Address</label></td>
              <td width="233"><input type="text"   value="<?php echo $row1['gaddress']; ?>"  size = "70" name="gaddress"  /></td>
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

	  <input  type = "hidden"  size = "20" name = "vehicl_id"  value = "<?php echo $id ?>" id = "vehicl_id"  />	  
	  
	  
    </form>
    <p>&nbsp;</p>
  </blockquote>
</div>
<?php include('../include/footer.php');?>

<script>



document.form1.p_category.value="<?php echo $legid ?>"; 

</script>



</body>
</html>

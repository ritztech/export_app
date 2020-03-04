<?php
session_start();
if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

include('../conf.php');

$t_date = date("d/m/Y");

$emp=mysql_query("SELECT `t_date`,id,time(`time_stamp`) as tt FROM `margin_data` order by `t_date` desc") or die(mysql_error());


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
  <h2 align="center"><span style="color:#F17327;">Select date to View Report</span></h2>
  
    
    <form id="form1" name="form1" method="post"  enctype="multipart/form-data"  action="daat_mkargin_bck.php">
     
      <div align="center">

        <table  border="2"  cellpadding="1"  bgcolor="white"  style="font-style:bold"  >
          <tbody>
		  
		  <tr> <td> Sno. </td>  <td align="center">  Date </td>   </tr>

<?php
$i=0;
while ($rec = mysql_fetch_array($emp)) {
	
	$i=$i+1;
?>
		        <tr>
            	<td style="width:60px;padding-left:10px;" align="center"> <?php echo $i; ?> </td>
					
						<td style="width:201px;padding-left:10px;" align="center">
<a href="show_margin_entry_report.php?id= <?php echo  $rec['1']?> "> <font size="3">  <?php echo date("d/m/Y", strtotime($rec['0']));  ?> - <?php echo $rec['2'] ?> </font>   </a>
</td>


            </tr>
			
<?php  } ?>

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

<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }

$fid=$_SESSION['fid'];
$id = $_GET['id'];
?>
<?php include('../conf.php');?>
<?php 

if(isset($_POST['s'])) {
	


$j = $_POST['totalcnt'];

for($i=1; $i <= $j; $i++) {

$sqlupd1="UPDATE `stk_d_mast` SET `perct`  =  {$_POST['perct'.$i]}  where `sub_id`  = {$_POST['subid'.$i]}";


mysql_query($sqlupd1,$connection);


}

header('Location: ../entryform/brand_view1.php');

 //echo "<script>alert('Data updated successfully.');location.href='../entryform/brand_view1.php'</script>"; 
 
	
	/*
$stockitem=$_POST['stockitem'];
$quantitytype=$_POST['quantitytype'];
$reportformanditax=$_POST['reportformanditax'];
$quantityop=$_POST['quantityop'];
$sdate=$_POST['sdate'];
$svalue=$_POST['svalue'];
$stockid = $_POST['stockid'];
	$query = "UPDATE stockitem SET
	stockitem='$stockitem',
    quantitytype='$quantitytype',
    reportformanditax='$reportformanditax',
	quantityop='$quantityop',
	sdate=STR_TO_DATE('$sdate','%d/%m/%Y'),
	svalue='$svalue'	
	WHERE stockid ='$stockid '";
	mysql_query($query);
	//echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  

  */      

}
?>
<?php
try {
$query = "SELECT `stkid`, `stkname`, `brand_name`, `brand_id`, `fid`,perct FROM `stk_d_mast`   WHERE  stkid = ?";
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

</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center">
<p>&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">edit yield item</span></h2>
  
    
    <form id="form1" name="form1" method="post" action="">
     
	 
	  <table  border='1' cellpadding='1' frame="box"  bgcolor="white" align="center"  >
<tr style="background-color:#22B5C1; color:#FFFFFF;"> 

<th> SNO</th> <th>BRAND NAME </th>  <th>PERCENTAGE </th>   </tr> 


<?php

$result15=mysql_query("SELECT `stkid`, `stkname`, `brand_name`, `brand_id`, `fid`,perct,sub_id FROM `stk_d_mast`   where fid = $fid   and stkid = $id");
$i=0;
while($row13 = mysql_fetch_array($result15))
  {   $i = $i + 1; 


?>
  
 <tr>
   
   <td> <?php echo  $i ?> </td>
   <td><?php echo  $row13['brand_name'] ?> </td>
   
   <td> <input type = "text" size="5"  name = "perct<?php echo   $i ?>" value = "<?php echo  $row13['perct'] ?>"/> </td>
      <td> <input type = "hidden" size="5"  name = "subid<?php echo   $i ?>" value = "<?php echo  $row13['sub_id'] ?>"/> </td>

   
   
    
</tr>
  
<?php  }	?>

</table>  

<input  type = "hidden"  size = "5"   value =  "<?php echo   $i ?>" name = "totalcnt" id = "totalcnt"  />

</br>

<input type="submit" name="s" id="submit" value="SAVE" />

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

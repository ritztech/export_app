	<?php

include("../conf.php");

?>
<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }
$fid=$_SESSION['fid'];
?>
<?php 

if(isset($_POST['s'])) {
            $depositdate = $_POST['depositdate'];
            $totbilwght =  $_POST['totbilwght'];
            $totrot =  $_POST['totrot'];
            $totrog =  $_POST['totrog'];
            $a13refid = $_POST['a13refid'];
	$query = "UPDATE mandi13_ref SET	       
            depositdate =STR_TO_DATE('$depositdate','%d/%m/%Y'),           
			bagqty='$totbilwght',
			bagvalue='$totrot',
			goodsvalue='$totrog'			
            WHERE a13refid='$a13refid'";
	        mysql_query($query);
	// echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  

//  sudhir


	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
	$j = $_POST['totalcnt'];
	$k = $_POST['totalcnt1'];
	$l = $k+1;
	
	//echo $j;
	//echo "</br>";
	//echo $k;

	
	
	$qry1 = "delete  from  mandi13 WHERE gpid='$a13refid' ";
	
mysql_query($qry1,$connection);

	if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }   
    

for($i=2; $i <= $k; $i++) {
	
    $qry2="INSERT INTO `mandi13`(`gpid`, `fid`, `suppliername`, `stockitem`, `msamiti`, `gatepassno`, `bagqty`, `valueqty`, `goodsvalue`, `inwarddate`, `remark`,suppid,stkid) 
VALUES ($a13refid,$fid,'{$_POST['suppliername'.$i]}','{$_POST['stkname'.$i]}','{$_POST['msamiti'.$i]}' ,'{$_POST['gatepassno'.$i]}' ,'{$_POST['bagqty'.$i]}' ,'{$_POST['valueqty'.$i]}' ,'{$_POST['goodsvalue'.$i]}',STR_TO_DATE('{$_POST['inwarddate'.$i]}','%d/%m/%Y'),'{$_POST['remark'.$i]}',
'{$_POST['suppid'.$i]}','{$_POST['item'.$i]}' )";  

//echo $qry2;


	
	if (!mysql_query($qry2,$connection))
  {
  die('Error: ' . mysql_error());
  }
  	
	
}



	 if ($j > $k)
       { 

   	for($i=$l; $i <= $j; $i++) {
	
	  
	  	 $result11 = mysql_query("select suppliername FROM supplier where supid = '{$_POST['suppliername'.$i]}'");

      $row11 = mysql_fetch_array($result11);
	  
	
    $qry2="INSERT INTO `mandi13`(`gpid`, `fid`, `suppliername`, `stockitem`, `msamiti`, `gatepassno`, `bagqty`, `valueqty`, `goodsvalue`, `inwarddate`, `remark`,suppid,stkid) 
VALUES ($a13refid,$fid,'{$_POST['suppid'.$i]}','{$_POST['item'.$i]}','{$_POST['msamiti'.$i]}' ,'{$_POST['gatepassno'.$i]}' ,'{$_POST['bagqty'.$i]}' ,'{$_POST['valueqty'.$i]}' ,'{$_POST['goodsvalue'.$i]}',STR_TO_DATE('{$_POST['inwarddate'.$i]}','%d/%m/%Y'),'{$_POST['remark'.$i]}',
'{$_POST['suppliername'.$i]}','{$_POST['stkname'.$i]}' )"; 


   
  // echo $qry2;
	
	if (!mysql_query($qry2,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	     echo "<script>alert('Data updated successfully.');location.href='a13gatepassdeposit_edit.php?a13refid=$a13refid'</script>"; 
		  
  }  
  
  	
	
}

}





  if ($j = $k)
       { 
   
	    echo "<script>alert('Data updated successfully.');location.href='a13gatepassdeposit_edit.php?a13refid=$a13refid'</script>";
   
	   }
	   










//  suhdir






   

}



?>
<?php

try {
$query = "SELECT `a13refid`,DATE_FORMAT(depositdate,'%d/%m/%Y') as depositdate, `bagqty`, `bagvalue`, `goodsvalue`, `fid` FROM `mandi13_ref`  WHERE a13refid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['a13refid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
          $depositdate =$row['depositdate'];
            $totbilwght =  $row['bagqty'];
            $totrot =  $row['bagvalue'];
            $totrog =  $row['goodsvalue'];
            $a13refid = $row['a13refid'];
} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="..//style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/a13code.js">  </script>
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>


</head>
<body>
<?php include('../include/header.php');?>
<?php include('../include/sidemenu.php');?>

<div align="center">
<div id = "griddiv"><br>
  <h2 align="center"><span style="color:#F17327;">MANDI GATE PASS DEPOSIT DETAILS</span>    </h2>
  <form id="form1" name="form1" method="post" action="">
  <table  border="1" cellpadding="6" frame="box" rules="none">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Gate Pass Details</h4></td>
        </tr>
        
        <tr>
          <td height="38" colspan="4">Deposite Date: 
            <input id="dstart"   name = "depositdate" onchange = "isDate(this.value)"   type = "text"  size="17" required="required" value="<?php echo $depositdate ?>"   />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
        </tr>
        <tr>
          <td height="38" colspan="4"><INPUT type="button" value="ADD ITEM" onclick="addRow('dataTable',<?php echo $fid; ?>);" />
 
 <table width="982" border='1' cellpadding='1'   id="dataTable"   >

  <tr>
   <th>TOTAL</th> 
   <th>  </th>
   <th>  </th>
   <th>  </th> 
   <th> <input  type = "text"  size = "5" name = "totbilwght" id = "totbilwght" value="<?php echo $totbilwght ?>" />     </th>
   <th> <input  type = "text"  size = "5" name = "totrot" id = "totrot" value="<?php echo $totrot ?>" />  </th>	
   <th> <input  type = "text"  size = "5" name = "totrog" id = "totrog"  value="<?php echo $totrog ?>"/>  </th>
   <th>   </th> 
   <th>  </th>
    
</tr>

<tr>
 

  <th>SUPPLIER</th> <th>ITEM NAME</th> <th>SAMITI NAME</th><th>GATE PASS NO</th> <th> BAG QTY </th> <th>  BAG VALUE </th>	<th>VALUE OF GOODS </th>	<th>INWARD DATE</th>	<th>REMARK</th>	
  
  </tr>
  <?php 
$result13 = mysql_query("SELECT `gpid`, `fid`, `suppliername`, `stockitem`, `msamiti`, `gatepassno`, `bagqty`, `valueqty`, `goodsvalue`, DATE_FORMAT(inwarddate,'%d/%m/%Y') as inwarddate, `remark`,suppid,stkid FROM `mandi13` WHERE gpid=$a13refid");
?>
  <?php
 
$i = 1;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
 
 <tr>
   
   <td> <input type = "text" size="30"     name = "suppliername<?=  $i ?>" value = "<?= $row13['2'] ?>" />  </td>
   <td> <input type = "text" size="15"     name = "item<?=  $i ?>" value = "<?= $row13['3'] ?>" />  </td>
   <td> <input type = "text" size="20"  name = "msamiti<?=  $i ?>" value = "<?= $row13['4'] ?>" />  </td>
   <td> <input type = "text" size="6"   name = "gatepassno<?=  $i ?>" value = "<?= $row13['5'] ?>" />  </td>
   <td> <input type = "text" size="5"  onkeyup = "itemcalc()"  name = "bagqty<?=  $i ?>" value = "<?= $row13['6'] ?>" />  </td>
   <td> <input type = "text" size="5" onkeyup = "itemcalc()"   name = "valueqty<?=  $i ?>" value = "<?= $row13['7'] ?>" />  </td>
   <td> <input type = "text" size="5" onkeyup = "itemcalc()"   name = "goodsvalue<?=  $i ?>" value = "<?= $row13['8'] ?>" />  </td>
   <td> <input type = "text" size="10"   name = "inwarddate<?=  $i ?>" value = "<?= $row13['9'] ?>" />  </td>
   <td> <input type = "text" size="15"   name = "remark<?=  $i ?>" value = "<?= $row13['10'] ?>" />  </td>
    <td> <input type = "hidden" size="20" name = "suppid<?=  $i ?>" value = "<?= $row13['11'] ?>" />  </td>
	    <td> <input type = "hidden" size="20" name = "stkname<?=  $i ?>" value = "<?= $row13['12'] ?>" />  </td>
   
</tr>
 <?php  }    ?>
  
 

</table> 
<input  type = "hidden"  size = "5" name = "totalcnt"  value=<?=  $i ?> id = "totalcnt" /> 
<input  type = "hidden"  size = "5" name = "totalcnt1" id = "totalcnt1"  value = "<?= $i ?>"  /> 

<input  type = "hidden"  size = "5" name = "a13refid" value="<?php echo $a13refid?>" /> 

 &nbsp;</td>
        </tr>      

      
    </table>

&nbsp;
</div>
<input type="submit" name="s" id="submit" value="Save Record" />
<input type="button" name="btnprint" value="Print" onclick="PrintMe('griddiv')"/>
</form>
</div>
</body>
</html>

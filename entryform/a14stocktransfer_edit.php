<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

$fid=$_SESSION['fid'];

include("../conf.php");

?>

<?php 

if(isset($_POST['s'])) {
            
            $stockdate =  $_POST['stockdate'];
            $stockitem =  $_POST['stockitem'];
            $outqty =  $_POST['outqty'];
            $outvalue =  $_POST['outvalue'];
			$a14id =  $_POST['a14id'];
			
            $shortvalue =  $_POST['shortvalue'];
			$shortaccess =  $_POST['shortaccess'];
			
			
           
	$query = "UPDATE mandi14 SET
	        stockdate =STR_TO_DATE('$stockdate','%d/%m/%Y'),
            stockitem='$stockitem',
			outqty='$outqty',
			outvalue='$outvalue',
			aceevalue ='$shortvalue',
			accdesc = '$shortaccess'
			WHERE a14id='$a14id'";

		
	mysql_query($query);
	 
	// echo $query;
	 
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
	$j = $_POST['totalcnt'];
	
	$qry1 = "delete  from  mandia14 WHERE formid='$a14id'";
	
mysql_query($qry1,$connection);

	if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
    

for($i=1; $i <= $j; $i++) {
	
    $qry2="INSERT INTO mandia14(formid,tempid,stockitem,inputqty,inputvalue)VALUES($a14id,'A14','{$_POST['item'.$i]}','{$_POST['bagg'.$i]}','{$_POST['grsweight'.$i]}')";

		
	if (!mysql_query($qry2,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	     echo "<script>alert('Data updated successfully.');location.href='a14stocktransfer_view.php'</script>"; 
	  
	  
  }
  
  	
	
}
	
}


		


?>
<?php

try {
$query = "SELECT `a14id`, `fid`,DATE_FORMAT(stockdate,'%d/%m/%Y') as stockdate, `stockitem`, `outqty`, `outvalue`,aceevalue,accdesc FROM `mandi14` WHERE a14id=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['a14id']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
            $stockdate = $row['stockdate'];
            $stockitem =$row['stockitem'];
            $outqty = $row['outqty'];
            $outvalue = $row['outvalue'];
			$a14id= $row['a14id'];
			
		    $aceevalue = $row['aceevalue'];
			$accdesc= $row['accdesc'];
			
			
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
<script language="javascript" type="text/javascript" src="jscode/a14code.js">  </script>
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>

<script language="javascript" type="text/javascript" >


function f12345(idvalue)
{

document.form1[ "item" + idvalue ].value = document.form1[ "stockitem" + idvalue ].value



}




function shortaccess1() {
	
	
var j = document.form1.totalcnt.value;
var outqty = document.form1.outqty.value;

var shortvalue = 0;
	
for (var i=1; i<=j; i++)
  {

  var bag = eval("document.form1.bagg"+i+".value");
  
  
  shortvalue = Number(shortvalue) + Number(bag);
 document.form1.shortvalue.value = shortvalue - outqty;
 
 

	
  }
  
  var shortdesc = document.form1.shortvalue.value;
  
if (shortdesc < 0) {
    shortdescval = "SHORT";
} else if (shortdesc > 0) {
	   shortdescval = "ACCESS";
} else {
   shortdescval = "MATCH";
}


document.form1.shortaccess.value = shortdescval; 
  
  	
	
}




</script>



<script type="text/javascript">
function phappycode(){
document.form1.stockitem.value = document.form1.s1.value;
}
</script>
</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center"><br>
  <h2 align="center"><span style="color:#F17327;">stock transfer</span></h2>
  
<form name = "form1" method="post" action=""  >



 
 
 

 <table width="685" border='1' cellpadding='1'   id="dataTable12" frame="box" rules="none"  >
 
 <tr>  <td width="260"> DATE  </td>  
 <td width="434"><input id="saudadate"   name = "stockdate" value="<?php echo $stockdate ?>"   type = "text"  size="17" required="required" />
<a href="javascript:NewCal('saudadate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </td> 
 </tr>
 <tr>  <td>  STOCK ITEM ISSUE</td>  <td><label>
   <input type="text" name="stockitem" value="<?php echo $stockitem ?>" />
   Select Stock Item:
   <select name="s1" style="width:150px" onchange="phappycode()">
                       <option> </option>
                       <?php               
				$query = mysql_query("SELECT * FROM stockitem where fid=$fid");
				while($row = mysql_fetch_array($query)){
					$stockid = $row['stockid'];
					$stockitem = $row['stockitem'];
			?>
                       <option><?php echo $stockitem; ?></option>
                       <?php } ?>
                     
          </select>
   <input type="hidden" name="a14id" value="<?php echo $a14id ?>" />
 </label></td> 
 </tr>
 <tr>  <td> GOODS - OUT QTY. </td>  <td><input type="text" name="outqty" onkeyup = "shortaccess1()"  value="<?php echo $outqty ?>" /></td> 
 </tr>
 <tr>  <td> GOODS - OUT VALUE.  </td>  <td><input type="text" name="outvalue" value="<?php echo $outvalue ?>" /></td> </tr>
 
 
 
 <tr>  <td colspan="2" bgcolor="#14C4B6"> <h4>Add Stock Items </h4></td> </tr>
 <tr>
 <td colspan="2">
  <INPUT type="button" value="ADD ITEM" onClick="addRow('dataTable',<?php echo $fid; ?>);" />
  
 
 <table   id="dataTable" border='1' cellpadding='1' width="635"   >

<tr>
 

  <th>STOCK ITEM</th> <th>GOODS - INPUT QTY.</th><th>GOODS - INPUT VALUE</th> 
  
  </tr>
   <?php 
$result13 = mysql_query("SELECT `formid`, `tempid`, `stockitem`, `inputqty`, `inputvalue` FROM `mandia14` WHERE formid=$a14id");
$i = 0;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
 
 <tr>
   
   <td> <input type = "text" size="10"    name = "item<?=  $i ?>" value = "<?= $row13['2'] ?>" /> 
   <select name="stockitem<?=  $i ?>" id=<?=$i?>  onkeyup = "f12345(this.id)" style="width:150px">
         
          <option>Select Stock Item</option>
           <?php               
				$query = mysql_query("SELECT * FROM stockitem where fid=$fid");
				while($row = mysql_fetch_array($query)){
					$stockid = $row['stockid'];
					$stockitem = $row['stockitem'];
			?>         
                       <option  value='<?php echo $stockitem?>' ><?php echo $stockitem; ?></option>
                       <?php } ?>
          </select>  </td>
   <td> <input type = "text" size="10"    onkeyup = "shortaccess1()"  name = "bagg<?=  $i ?>" value = "<?= $row13['3'] ?>" />  </td>
   <td> <input type = "text" size="10"     name = "grsweight<?=  $i ?>" value = "<?= $row13['4'] ?>" />  </td>
   
</tr>

 <?php }   ?>
 

</table> 



 
<input  type = "hidden"  size = "5" name = "totalcnt" id = "totalcnt"  value=<?=  $i ?>  /> 

   <tr>  <td> SHORT/ACCESS VALUE  </td>  <td><input type="text" name="shortvalue" value="<?php echo $aceevalue ?>"  /></td> </tr>
 <tr>  <td> SHORT/ACCESS  </td>  <td><input type="text" name="shortaccess" value="<?php echo $accdesc ?>"  /></td> </tr>
 




 </td>
 </tr>
 </table>
 
 <input type="submit" name="s" style = "color:black; font-weight:bold;height: 25px; width: 100px; font:"Times New Roman", Times, serif; font-size:14px;"  value="SAVE"> 

 
 
</form> 

</div>

</body>
</html>

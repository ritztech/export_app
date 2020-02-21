<?php

session_start();
if(!isset($_SESSION['uname'])) { echo '<script>window.location="../index.php"</script>'; }

include("../conf.php");
$t_date = date("d/m/Y");
$fid=$_SESSION['fid'];
$i = 0;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../entryform/jscode/printdiv.js"> </script>
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>

<style type="text/css">
<!--
.style1 {color: #0000FF}
.style2 {color: #FF3300}
.style3 {color: #FFFFFF}
.style4 {color: #990033}
-->
</style>
</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center"><br>
  <h2 align="center"><span style="color:#F17327;">PURCHASE REGISTER REPORT FROM REGD PURCHASE </span>
    <script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
</h2>
 
    <form name = "form1"  method="get"  action="">

</br>


<div id="p1itemcontainer"> 


	<div class="empleftDiv">
    <font color="blue"> 
    
    </font>
    <table width="979" border="1" cellpadding="2" frame="box" rules="none">
	
<tr>
<td></td><td><div align="right"><span class="style4">SELECT DATE RANGE</span></div></td>
<td colspan="2"><div align="left"></div></td>
</tr>


<tr>
  <td width="189">&nbsp;</td>
  <td width="214">START DATE </td>
  <td width="516">END DATE </td>
  <td width="516">Stock Item </td>
  </tr>
<tr>
  <td height="41">&nbsp;</td>
<td> <input id="dstart"  name = "dstart"   type = "text"  size="15"  value="01/04/2016" />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
<td><input id="dend"  name = "dend"   type = "text"  size="15"  value="<?php  echo $t_date  ?>" />  <a href="javascript:NewCal('dend','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
<td>
   <select name="stockitem"  onchange = "hledger111(this)" style="width:150px">
                       <option> </option>
                       <?php               
				$query = mysql_query("SELECT * FROM stockitem where fid=$fid");
				while($row = mysql_fetch_array($query)){
					$stockid = $row['stockid'];
					$stockitem = $row['stockitem'];
			?>
                       <option value = "<?php  echo $stockid ?>" ><?php echo $stockitem; ?></option>
                       <?php } ?>
                     
          </select>
</td>

</tr>
<tr>
  <td>&nbsp;</td>
<td><a href="javascript:NewCal('dstart','ddmmyyyy')">
  <input type="submit" name="submit" value="SHOW RECORDS" />
</a></td>
<td>
  <input type="button" name="btnprint" value="Print" onclick="PrintMe('griddiv')"/>
</td>
</tr>
</table>
</div>
</div>
</form>

<?php

include('../conf.php');

if(isset($_GET['submit']))
{

$st_1 = $_GET['dstart'];
$end_1 = $_GET['dend'];
$stkid = $_GET['stockitem'];


$sqlupd124="DELETE FROM `stk_red_1`";

//echo $sqlupd124;

mysql_query($sqlupd124,$connection);


$sqlupd124="DELETE FROM `n_stk_red_1`";

//echo $sqlupd124;

mysql_query($sqlupd124,$connection);


//select `quantityop`,`sdate`   from stockitem where `stockid` = $stkid

$sqlupd124="INSERT INTO `stk_red_1`(`date`, `op_qty`, `particular`, `goodsmfg`, `mandipurch`, `tdpurcgase`, `totin`, `particul2`, `sale`, `issuemfg`, `tot_out`) 
select sdate,quantityop,'goods in',0,0,0,0,'sale',0,0,0  from stockitem 
where  stockid =  $stkid and   fid = $fid  ";

//echo $sqlupd124;

mysql_query($sqlupd124,$connection);



 
$result15=mysql_query("SELECT distinct DATE_FORMAT(party_date,'%d/%m/%Y') as party_date FROM `stock_ref` WHERE 
stid =  $stkid  and fid=$fid   and tempid = 'A4' ");


while($row13 = mysql_fetch_array($result15))
  {   $i = $i + 1; 

$t_date = $row13[0];


$sqlupd124="INSERT INTO `stk_red_1`(`date`, `op_qty`, `particular`, `goodsmfg`, `mandipurch`, `tdpurcgase`, `totin`, `particul2`, `sale`, `issuemfg`, `tot_out`) 
select STR_TO_DATE('$t_date','%d/%m/%Y'),0,'goods in',0,sum(mandiwght),0,0,'sale',0,0,0  from stock_ref 
where  stid =  $stkid and party_date =  STR_TO_DATE('$row13[0]','%d/%m/%Y') and   fid = $fid  and tempid = 'A4' ";

//echo $sqlupd124;

mysql_query($sqlupd124,$connection);

 }
  

  $result15=mysql_query("SELECT distinct DATE_FORMAT(paymentdate,'%d/%m/%Y') as party_date FROM manditaxablepurchase WHERE 
stkid =  $stkid  and fid=$fid");


while($row13 = mysql_fetch_array($result15))
  {   $i = $i + 1; 

$t_date = $row13[0];


$sqlupd124="INSERT INTO `stk_red_1`(`date`, `op_qty`, `particular`, `goodsmfg`, `mandipurch`, `tdpurcgase`, `totin`, `particul2`, `sale`, `issuemfg`, `tot_out`) 
select STR_TO_DATE('$t_date','%d/%m/%Y'),0,'goods in',0,0,sum(purchaseqtl),0,'sale',0,0,0 from 
`manditaxablepurchase` WHERE  stkid =  $stkid and paymentdate =  STR_TO_DATE('$row13[0]','%d/%m/%Y') and   fid = $fid";

//echo $sqlupd124;

mysql_query($sqlupd124,$connection);

 } 

 
// SELECT `formid`, `tempid`, `stockitem`, `inputqty`, `inputvalue`, `stkid`, `fid`, `tdate` FROM `mandia14` WHERE 1
  
 $result15=mysql_query("SELECT distinct DATE_FORMAT(tdate,'%d/%m/%Y') as party_date FROM mandia14    where stkid = $stkid
  and fid=$fid");


while($row13 = mysql_fetch_array($result15))
  {   $i = $i + 1; 

$t_date = $row13[0];


$sqlupd124="INSERT INTO `stk_red_1`(`date`, `op_qty`, `particular`, `goodsmfg`, `mandipurch`, `tdpurcgase`, `totin`, `particul2`, `sale`, `issuemfg`, `tot_out`) 
select STR_TO_DATE('$t_date','%d/%m/%Y'),0,'goods in',sum(inputqty),0,0,0,'sale',0,0,0 from mandia14   where 
stkid = $stkid  and fid=$fid  and tdate =  STR_TO_DATE('$t_date','%d/%m/%Y') ";

//echo $sqlupd124;

mysql_query($sqlupd124,$connection);

 }  
 

 
 $result15=mysql_query("SELECT distinct DATE_FORMAT(party_date,'%d/%m/%Y') as party_date FROM `stock_ref` WHERE 
stid =  $stkid  and fid=$fid  and tempid = 'A6'");


while($row13 = mysql_fetch_array($result15))
  {   $i = $i + 1; 

$t_date = $row13[0];


$sqlupd124="INSERT INTO `stk_red_1`(`date`, `op_qty`, `particular`, `goodsmfg`, `mandipurch`, `tdpurcgase`, `totin`, `particul2`, `sale`, `issuemfg`, `tot_out`) 
select STR_TO_DATE('$t_date','%d/%m/%Y'),0,'goods in',0,0,0,0,'sale',sum(mandiwght),0,0  from stock_ref 
where  stid =  $stkid and party_date =  STR_TO_DATE('$row13[0]','%d/%m/%Y') and   fid = $fid   and tempid = 'A6'";

//echo $sqlupd124;

mysql_query($sqlupd124,$connection);

 } 
 

 
 
 $result15=mysql_query("SELECT distinct DATE_FORMAT(stockdate,'%d/%m/%Y') as party_date FROM `mandi14` WHERE 
stkid =  $stkid  and fid=$fid ");


while($row13 = mysql_fetch_array($result15))
  {   $i = $i + 1; 

$t_date = $row13[0];


$sqlupd124="INSERT INTO `stk_red_1`(`date`, `op_qty`, `particular`, `goodsmfg`, `mandipurch`, `tdpurcgase`, `totin`, `particul2`, `sale`, `issuemfg`, `tot_out`) 
select STR_TO_DATE('$t_date','%d/%m/%Y'),0,'goods in',0,0,0,0,'sale',0,sum(outqty),0  from mandi14 
where  stkid =  $stkid and stockdate =  STR_TO_DATE('$t_date','%d/%m/%Y') and   fid = $fid ";

//echo $sqlupd124;

mysql_query($sqlupd124,$connection);

 } 
 


  

$result1 = mysql_query("select quantityop,stockitem from stockitem 
where  stockid =  $stkid and   fid = $fid");
$row1 = mysql_fetch_array($result1);

$open_qty1 = $row1[0];

$open_stk1 = $row1[1];


$result15=mysql_query("SELECT distinct DATE_FORMAT(date,'%d/%m/%Y') as party_date FROM `stk_red_1`  order by date");
 
$i = 0;

$open_b = 0;
$close_b = 0;

while($row13 = mysql_fetch_array($result15))
  {   $i = $i + 1; 

$result1 = mysql_query("SELECT DATE_FORMAT(date,'%d/%m/%Y') as date, op_qty, 'PURCHASE', sum(goodsmfg), sum(mandipurch), sum(tdpurcgase),
 'SALE', sum(sale), sum(issuemfg) FROM stk_red_1 WHERE 
date = STR_TO_DATE('$row13[0]','%d/%m/%Y')");
$row1 = mysql_fetch_array($result1);

$t_in = ($row1['3'] + $row1['4'] + $row1['5']);
$t_out = ($row1['7'] + $row1['8']);


$open_b = $open_qty1;



if($i >= 2)
{
	$open_b = $close_b;
	
}

$close_b =  $open_b + $t_in  - $t_out ;

$n_date = $row1['date'];
$i_2 = $row1['2'];
$i_3 = $row1['3'];
$i_4 = $row1['4'];
$i_5 = $row1['5'];
$i_6 = $row1['6'];
$i_7 = $row1['7'];
$i_8 = $row1['8'];

$sqlupd124="INSERT INTO `n_stk_red_1`(`date`, `op_qty`, `particular`, `goodsmfg`, `mandipurch`, `tdpurcgase`, `totin`, `particul2`, `sale`, `issuemfg`, `tot_out`,close_b) VALUES
(STR_TO_DATE('$n_date','%d/%m/%Y'),'$open_b','$i_2',
'$i_3','$i_4','$i_5','$t_in','$i_6','$i_7',
'$i_8','$t_out','$close_b')";

mysql_query($sqlupd124,$connection);


  }
?>
 
<div id = "griddiv"> 

 <table  border='1' cellpadding='1' frame="box"  bgcolor="white" align="center"  >
<tr> <th style="text-align:center" colspan="13"  > <font color="blue">  STOCK REGISTER  BETWEEN <?php  echo $st_1 ?>  and   <?php  echo  $end_1  ?>   for  <?php  echo $open_stk1 ?>   </font> </th>  </tr>
<tr style="background-color:#22B5C1; color:#FFFFFF;"> 

<th> SNO</th> <th>DATE </th>  <th> OPEN_QTY </th>  <th> PERTICULAR(PURCHASE)</th>
<th> GOOD MFG</th>  
<th> MANDI PURCHASE</th> 
<th> TD PURCHASE</th>
<th> TOTAL(IN)</th>
<th> PERTICULAR(SALE)</th>
<th> SALE QTY</th> 
<th> ISSUE FOR MFG</th>
<th> TOTAL(OUT)</th> 
<th> CLOSING</th> </tr> 


<?php

$result15=mysql_query("SELECT DATE_FORMAT(date,'%d/%m/%Y') , op_qty, particular, goodsmfg, mandipurch, tdpurcgase, totin, particul2, sale, issuemfg, tot_out, close_b FROM n_stk_red_1 WHERE date  
  between  STR_TO_DATE('$st_1','%d/%m/%Y') and STR_TO_DATE('$end_1','%d/%m/%Y') order by date");
$i=0;
while($row13 = mysql_fetch_array($result15))
  {   $i = $i + 1; 


?>
  
 <tr>
   
   <td> <?php echo  $i ?> </td>
   <td><?php echo  $row13['0'] ?> </td>
   <td><?php echo  round($row13['1'],2) ?> </td>
    <td><?php echo  $row13['2'] ?> </td>
	 <td><?php echo  round($row13['3'],2) ?> </td>
	  <td><?php echo  round($row13['4'],2) ?> </td>
		<td><?php echo  round($row13['5'],2) ?> </td>
		  <td><?php echo  round($row13['6'],2) ?> </td>
		   <td><?php echo  $row13['7'] ?> </td>
			 <td><?php echo  round($row13['8'],2) ?> </td>
			    <td><?php echo  round($row13['9'],2) ?> </td>
                  <td><?php echo  round($row13['10'],2) ?> </td>
				    <td><?php echo  round($row13['11'],2) ?> </td>



    
</tr>
  
<?php  }	?>

</table>  

</div>


 <input class = noPrint type = "hidden"  width="30" name = "totalcnt" id = "totalcnt" value=<?=  $i ?> />  

 
</form>   


 
   
<?php 
}
?>


</div>
</br>




</div>
</div>
</div>


  
</div>
</body>
</html>

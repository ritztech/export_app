<?php
session_start();
if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

include('../conf.php');

$t_date = date("d/m/Y");

$id=$_GET['id'];


$qry="SELECT `id`, `qty`, `sale_rate`, `buy_rate`, `rate_convert`, `brkage`, `duty`, `meis`, `othre_exp`, `t_date`, time(`time_stamp`) as mytime FROM `margin_data` where id=$id";
$margin_res=dops($qry);
$tran_date=$margin_res['t_date'];

//echo "SELECT `export_ex_rate` FROM `currency_exchangee` WHERE '$tran_date between' `startdate` and `enddate`  and currencyid = 1 limit 1";

$result1_exra = mysql_query("SELECT `export_ex_rate` FROM `currency_exchangee` WHERE '$tran_date' between `startdate` and `enddate`  and currencyid = 1 limit 1 ");
$result1_exra_cu = mysql_fetch_array($result1_exra);
$final_Ex_rate = $result1_exra_cu[0];	


//echo " Finla artes are ...".$final_Ex_rate

$qty=$margin_res['qty'];
$sale_rate=$margin_res['sale_rate'];
$buy_rate=$margin_res['buy_rate'];
$rate_convert=$margin_res['rate_convert'];
$brkage=$margin_res['brkage'];
$duty=$margin_res['duty'];
$meis=$margin_res['meis'];
$othre_exp=$margin_res['othre_exp'];

$trans_time=$margin_res['mytime'];

//echo $trans_time;

$sale_rates=$qty*$sale_rate*$rate_convert;

$by_duty_dra=($qty*$final_Ex_rate*$sale_rate*$duty)/100;

$meis_claim=($qty*$final_Ex_rate*$sale_rate*$meis)/100;

$all_sum=$sale_rates+$by_duty_dra+$meis_claim;

$buy_all=$qty*$buy_rate;
$brk_all=$qty*$brkage;

$grs_prodd=$all_sum-$buy_all-$brk_all-$othre_exp;

$profi_per_unit=$grs_prodd/$qty;


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
  <h2 align="center"><span style="color:#F17327;"> Report for <?php echo date("d/m/Y", strtotime($tran_date));  ?> - <?php echo $trans_time ?> </span></h2>
  
    
    <form id="form1" name="form1" method="post"  enctype="multipart/form-data"  action="daat_mkargin_bck.php">
     
      <div align="center">

        <table  border="2"  cellpadding="1"  bgcolor="white"  style="font-style:bold"  >
          <tbody>

              <tr> <td><b>Sales value :</b>  </td>  <td>
			  <table border="1" width="100%" > 

 <tr> <td align="center" >(Qty) X Sales Rate (USD) X (USD_INR RATE)</td>    </tr>
			   <tr> <td align="center"><?php echo $qty ?>  X  <?php echo $sale_rate ?>X  <?php echo $rate_convert ?>  </td>   </tr>
			  </table>
			  
			  
			  </td>  <td>  <?php  echo round($sale_rates,2); ?> </td> </tr>
             <tr> <td><b> Incentive :</b>  </td>  <td>	  <table border="1"  width="100%"> 

 <tr> <td align="center" >(Qty) X Sales Rate (USD) X (Exchange Rates)X(DUTY DRAWABACK%)</td>    </tr>
			   <tr> <td align="center"> <?php echo $qty."X".$final_Ex_rate."X".$sale_rate."X".$duty."%"; ?> </td>   </tr>
			  </table>

			  </td>   <td>  <?php echo round($by_duty_dra,2); ?> </td>  </tr>
		  <tr> <td> </td>  <td><table border="1"  width="100%"> 

 <tr> <td align="center" >(Qty) X Sales Rate (USD) X (Exchange Rates)X(MEIS%)</td>    </tr>
			   <tr> <td align="center"> <?php echo $qty."X".$final_Ex_rate."X".$sale_rate."X".$meis."%"; ?> </td>   </tr>
			  </table>

			  </td>   <td> <?php  echo round($meis_claim,2);?> </td>  </tr>
		    <tr> <td> </td>  <td align="right">Net Total: </td>   <td> <b><?php  echo round($all_sum,2);?> </b> </td>  </tr>
			   <tr> <td> </td>  <td></td>   <td> </br></br> </td>  </tr>
			         <tr> <td><b> Purchase :</b>  </td>  <td>
					 
					 <table border="1"  width="100%"> 

 <tr> <td align="center" >(Qty) X Purchase Rate (INR) </td>    </tr>
			   <tr> <td align="center"> <?php echo $qty."X".$buy_rate; ?> </td>   </tr>
			  </table>
			  
					 
					 </td>   <td>  <?php echo round($buy_all,2); ?> </td>  </tr>
					          <tr> <td><b> Brokerage :</b>  </td>  <td align="center">  <?php echo $qty."X".$brkage; ?> </td>   <td>  <?php echo $brk_all; ?> </td>  </tr>
							    <tr> <td><b> Other Exp :</b>  </td>  <td></td>   <td>  <?php echo $othre_exp; ?> </td>  </tr>
								  <tr> <td colspan="3" align="right"> <span  style="font-size:17px;background-color:#f0c189;color:black;" > Gross Profit:  <?php echo round($grs_prodd,2); ?> &nbsp  </span> 
								  
								  </td>  </tr>
								  
	  <tr> <td colspan="2" align="right">  <span  style="font-size:17px;background-color:#f0c189;color:black;">  Total Qty:                              								      
									  </span> 
								  
								  </td>  <td style="font-size:17px;background-color:#f0c189;color:black;" > <?php  echo $qty ?>  </td> </tr>
								  
	  <tr> <td colspan="2" align="right">  <span  style="font-size:17px;background-color:#f0c189;color:black;" >  Expected Margin INR:                              								      
									  </span> 
								  
								  </td>  <td style="font-size:17px;background-color:#f0c189;color:black;" > <?php  echo round($grs_prodd/$qty,2) ?>  </td> </tr>		

	  <tr> <td colspan="2" align="right">  <span  style="font-size:17px;background-color:#f0c189;color:black;">  Retun on Investment(Gross profit/Purchase Value)                              								      
									  </span> 
								  
								  </td>  <td style="font-size:17px;background-color:#f0c189;color:black;" > <?php  echo round(($grs_prodd/$buy_all)*100,2) ?>%  </td> </tr>										  
					 
		  
		  
		  


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

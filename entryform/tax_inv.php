<?php
error_reporting(0);
session_start();

if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

$fid=$_SESSION['fid'];

if($fid ==12){$gst_zz = "23AGSPJ1748E1ZF";$fssi_zz = "11419510000007";}
if($fid ==15){$gst_zz = "23AGSPJ1748E1ZF";$fssi_zz = "11419510000007";}
if($fid ==16){$gst_zz = "";$fssi_zz = "";}


require '../conf.php';
//$id = $_GET['id'];


try {

 




$query = "SELECT `consigneeid`, `proforma_inv`, DATE_FORMAT(proforma_date,'%d/%m/%Y') as proforma_date, `export_ref`, `buyrefno_date`, `cntry_origin`, `cntry_final`, `pre_carr_by`, `place_of_rec_per`, `vessel`, `port_of_laod`, `port_of_dis`, `final_dest`, `del_terms`, `extra_notes`, `incoterm`, `curency`, `bankid`, `shippartyidd`, `fid`, comm_id as tab_auto_id, `invoice_no`, DATE_FORMAT(inv_date,'%d/%m/%Y') as inv_date, `com_inv_2`, `comm_inv_3`, `proforma_id`,truckno , `ppname`, `ppiddd`, `ppgstn`, `ppbillno`, `ppbilldateee`, `ppqtyyy`, `master_conditions` FROM `commercial_in_main` WHERE `comm_id` = ?";

$stmt = $dbc->prepare($query);

$stmt->bindParam(1, $_GET['siid']);

$stmt->execute();

$row=$stmt->fetch(PDO::FETCH_ASSOC);



		$consignid =$row['consigneeid'];
			$shippid =$row['shippartyidd'];
			
			$curr_id =$row['curency'];
			$bankidd =$row['bankid'];
			$proforma_id =$row['proforma_id'];
			$port_of_dis =$row['port_of_dis'];
			
			
			
			
			
			
			$profidd =$row['tab_auto_id'];
			
			$comm_inv_date=$row['inv_date'];
			
$result1_bankdetails = mysql_query("SELECT `bank_id`, `bnkname`, `branchaddr`, `accname`, `accnum`, `ifsc`, `swidt` FROM `mybanks` WHERE `bank_id` = $bankidd ");
$result1_bank_rec = mysql_fetch_array($result1_bankdetails);

$fin_inv_date=$row['inv_date'];


$result1_exra = mysql_query("SELECT `export_ex_rate` FROM `currency_exchangee` WHERE STR_TO_DATE('$fin_inv_date','%d/%m/%Y') between `startdate` and `enddate`  and currencyid = $curr_id limit 1 ");
$result1_exra_cu = mysql_fetch_array($result1_exra);
$final_Ex_rate = $result1_exra_cu[0];			
//echo "exchange rate ..".$final_Ex_rate;
			
			
$result1_cur = mysql_query("SELECT `curr_name` FROM `currency_master` WHERE tab_auto_id = $curr_id ");
$row1_cur = mysql_fetch_array($result1_cur);
$curr_name = $row1_cur[0];
		



//  get consignee details   start	

///echo "SELECT 	leg_name,fac_addr,gstin,statetype,aadhar from ledger_master  where legid = $consignid";		
		
$result1 = mysql_query("SELECT 	leg_name,fac_addr,gstin,statetype,aadhar from ledger_master  where legid = $consignid");
$row1 = mysql_fetch_array($result1);

$p_name = $row1[0];

//echo $p_name;

$off_addr1 = $row1[1];
$party_gst = $row1[2];
$party_aadhar = $row1['aadhar'];
$statetype =$row1['statetype'];

///  get consignee details 	   end




// shippid details start

$result32 = mysql_query("SELECT `leg_name`, `fac_addr`, `off_addr`, `fact_city`, `off_city`, `fact_state`, `off_state`, `f_pin`, `o_pin`, `o_con`, `f_contact`, `off_email`, `inctaxnum`, `servicetaxno`, `tinno`, `centralno`, `cstno`, `o_date`, `o_bal`, `acc_grp`, `dr_cr`, `broker`, `transported`, `party`, `legid`, `fid`, `firmcontact`, `bankname`, `bank_type`, `bank_number`, `ifsc_code`, `brokerage`, `brok_qty`, `acc_name`, `acc_id`, `gstin`, `aadhar`, `statetype` FROM `ledger_master` WHEre  legid = $shippid");
$row32 = mysql_fetch_array($result32);

$p_name_ss = $row32[0];
$off_addr1_ss = $row32[1];
$ss_aadhar = $row32['aadhar'];
$gstin_ss = $row32['gstin'];



// shippid details ends


					

		
			

				

} catch(PDOException $e) {

	echo "Error: " . $e->getMessage();

}



	
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>INVOICE</title>
<style type="text/css">
<!--
.style4 {font-size: 14px}
.style5 {color: #FF0000}
-->


table { font-size:12px;border-collapse: collapse;}


</style>


<script language="javascript" type="text/javascript" >
function jumpto(){

document.getElementById("ntable").deleteRow(0);
			
			document.location.href = "salesinvoice_view.php";
			window.print();
	
}

function closeMe()
{
//document.location.href = "salesinvoice_view.php";
window.history.back();
}


</script>

</head>

<body>
<form id="form1" name="form1" method="post" action="">

<table width="100%"  align="center"  id = "ntable"  border="2">



<tr>  <td align="center" colspan="3"> 

<b> TAX INVOICE  </b> </br>

<font size="2"> (SUPPLY MEANT FOR EXPORT AGAINST LETTER OF UNDERTAKING WITHOUT PAYMENT OF IGST)  </font>
 


</tr>

</table>


<table width="100%"  align="center"   id = "newtable"  border="2">

<tr> 

<td valign="top" width="50%" >

<table>


<tr>   <td>  <b> <?php echo $_SESSION['myfirmnameeee'] ?>  </b> </td></tr>
<tr>   <td style="font-size:80%"> 

<?php echo $_SESSION['myfirmaddress'] ?>
	
 </td></tr>

</table>



 </td>  




 <td width="60%" valign="top"> 
<table border="1"  width="100%">

<tr>  <td>INVOICE NO:   </td>  <td style="font-size:80%" > <?php  echo $row['com_inv_2'];  ?>/<?php  echo $row['invoice_no'];  ?>/<?php  echo $row['comm_inv_3'];  ?> </td>  </tr>
<tr>  <td>DATE:   </td>  <td style="font-size:90%">  <?php  echo $row['inv_date'] ?>  </td>  </tr>
<tr>  <td>PROFORMA INVOICE NO:   </td>  <td style="font-size:90%" ><?php  echo $row['proforma_inv'] ?>  </td>  </tr>
<tr>  <td>DATE   </td>  <td style="font-size:90%" > <?php  echo $row['proforma_date'] ?>   </td>  </tr>
<tr>  <td>SHIPPING BILL NO & DATE::   </td>  <td>  </td>  </tr>
<tr>  <td>COUNTRY OF ORIGIN: :   </td>  <td style="font-size:90%" >  <?php  echo $row['cntry_origin'] ?>     </td>  </tr>

</table>


 </td> 


 </tr>



</table>


<table width="100%"  align="center"  id = "newtable"  border="2">

<tr> <td valign="top" width="50%"  > Bill To Party </td>  <td valign="top" width="50%"  >SHIP TO PARTY:  </td>   </tr>

<tr> 

<td valign="top" width="50%" >

<table border="2" width="100%">

<tr>  <td align="left" >  <b> <?php echo $p_name  ?>  </b>  </td> </tr>
<tr>  <td style="font-size:80%" >  <?php echo $off_addr1 ?>



 </td> </tr>
</table>

 </td>  




 <td width="50%" valign="top" style="font-size:90%" s> 
GOODS CONSIGNED TO 
<?php 
$result13_33 = mysql_query("SELECT `tab_auto_id`, `issue_branch`, DATE_FORMAT(date_of_issue,'%d/%m/%Y') as date_of_issue, DATE_FORMAT(lc_date,'%d/%m/%Y') as lc_date, `currency`, `amt_of_lc`, `form_of_lc`, `tolerance`, DATE_FORMAT(expdate,'%d/%m/%Y') as expdate, `exp_place`, `advise_bank`, `benefeitiary_details`, `othersss`, `proforma_id`, `lcnumber` FROM `proforma_lc_details` WHERE  proforma_id=$proforma_id"); 
while($row17 = mysql_fetch_array($result13_33))
{   echo $row17['issue_branch']; 

 } 

?>  </br>


<b> Notify : </b>

<?php echo $p_name_ss  ?> </br>
<?php echo $off_addr1_ss  ?> </br>


 

 </td> 


 </tr>
 
 
 <tr style="font-size:90%" >  <td width="50%" valign="top"> Terms of Payment: SIGHT. </br>
 
 <?php

//echo "SELECT `tab_auto_id`, `issue_branch`, `date_of_issue`, `lc_date`, `currency`, `amt_of_lc`, `form_of_lc`, `tolerance`, `expdate`, `exp_place`, `advise_bank`, `benefeitiary_details`, `othersss`, `proforma_id`, `lcnumber` FROM `proforma_lc_details` = $proforma_id";


 $result13_get_lc = mysql_query("SELECT `tab_auto_id`, `issue_branch`, DATE_FORMAT(date_of_issue,'%d/%m/%Y') as date_of_issue, DATE_FORMAT(lc_date,'%d/%m/%Y') as lc_date, `currency`, `amt_of_lc`, `form_of_lc`, `tolerance`, DATE_FORMAT(expdate,'%d/%m/%Y') as expdate, `exp_place`, `advise_bank`, `benefeitiary_details`, `othersss`, `proforma_id`, `lcnumber` FROM `proforma_lc_details` WHERE  proforma_id  = $proforma_id  ");


while($row13_lcd = mysql_fetch_array($result13_get_lc))
  { ?>


	<table   border="2"  width="100%" style="font-size:90%">
<tr>  <td> LC Number    </td>  <td> <?php  echo $row13_lcd['lcnumber']; ?>   </td>  <td> LC Amount    </td>  <td> <?php  echo $row13_lcd['amt_of_lc']; ?>   </td>   </tr>

<tr> <td> LC Date    </td>  <td> <?php  echo $row13_lcd['lc_date']; ?>   </td>  <td> Date of Issue    </td>  <td> <?php  echo $row13_lcd['date_of_issue']; ?>   </td>   </tr>

<tr> <td> Issueing Branch & Address     </td>  <td>  <?php  echo $row13_lcd['issue_branch']; ?>    </td>  <td> Form of LC     </td>  <td> <?php  echo $row13_lcd['form_of_lc']; ?>   </td>   </tr>



</table>

  
 <?php }   ?>
 
  </td>   <td width="50%" valign="top"> Terms of Delivery : <?php  if($row['del_terms']!="0"){ echo $row['del_terms'];  } ?>  </td>   </tr>

<tr  style="font-size:90%">  <td colspan="2"  align="center">  EXPORT AGAINST LETTER OF UNDERTAKING. LUT NO. <?php echo $_SESSION['myfirlutdetails'] ?> </td> </tr>

<tr>  <td colspan="2"  align="center">  </br> </td> </tr>


</table>



<table width="100%" border="2" >

<tr style="font-size:90%"> <td align="center" colspan="2"> Transport Mode:  <?php  if($row['pre_carr_by']!="0") {echo $row['pre_carr_by'];} ?>  </td>  <td colspan="4" align="center" > Port of Loading: <?php  if($row['port_of_laod']!="0") {echo $row['port_of_laod'];} ?>    </td>  <td align="center" colspan="3" > Place of receipt by Pre-carrier: <?php  if($row['place_of_rec_per']!="0") {echo $row['place_of_rec_per'];} ?>    </td>   </tr>

<tr style="font-size:90%"> <td align="center"> S.No.   </td>  <td align="center"> Product Description  </td>  <td align="center"> UNIT   </td>  <td align="center">  Qty.</br> (in MT) </td>  <td align="center">   Rate(<?php echo $curr_name ?>)  </td>  <td align="center">  Amount (<?php echo $curr_name ?>)  </td>
<td align="center"> Exch Rate  </td>  <td align="center"> FOB Amount (INR)  </td>  <td align="center"> TOTAL (INR) </td>  </tr>

<?php 
$result13_2 = mysql_query("SELECT `item_id`, `goods_descr`, `hsncode`, `unit`, `qty`, `rate`, `amount`, `item_details`, `gst`, `comm_item_id`, `comm_inv_id`,bags FROM `comm_in_items` WHERE `comm_inv_id` = $profidd  ");


$i=0;
$net_amt=0;
$net_bags=0;
$net_weights=0;
$final_amt=0;
while($row13 = mysql_fetch_array($result13_2))
  {   $i = $i + 1; 
  
  $hsn_val_fr=$row13['hsncode'];
  $itemdetilas=$row13['item_details'];
  $unit=$row13['unit'];
  $goods_descr=$row13['goods_descr'];
  $qty=$row13['qty'];
  $rate=$row13['rate'];
  $amount=$row13['amount'];
    $bags=$row13['bags'];
	
  $net_amt=$net_amt+$amount;
  $net_bags=$net_bags+$bags;
    $net_weights=$net_weights+$qty;
	$final_amt=$final_amt+(round($final_Ex_rate*$amount,2));
	?>
	
	



<tr  style="font-size:90%" > <td> <?php echo $i ?> </td> <td colspan="1" align="center">  <?php echo $goods_descr ?> </br><?php  echo $itemdetilas  ?> </br> HSNCODE: <?php echo $hsn_val_fr ?> </td>   <td align="center"> <?php  echo $unit  ?>   </td>  <td align="center" >
<?php  echo $qty  ?>   </td>  <td align="center" >  <?php  echo $rate  ?>     </td>  <td align="center" >  <?php  echo $amount  ?>     </td> 
<td align="center" > <?php  echo round($final_Ex_rate,2)  ?>     </td> 
<td align="center" > <?php  echo round($final_Ex_rate*$amount,2)  ?>     </td> 
<td align="center" >  <?php  echo round($final_Ex_rate*$amount,2)  ?>      </td> 


 </tr>


  <?php }


  ?>

<tr  > <td colspan="8" align="left"> <font size="2"> We do hereby certify that the merchandise are of Indian Origin. </br>
FINAL DESTINATION:  <?php  echo $row['port_of_dis'] ?></br>
INDIAN CUSTOMS CLEARANCE THROUGH DUTY DRAWBACK SCHEME (CUSTOMS PORTION ONLY)  </br>
WE INTEND TO CLAIM REWARDS UNDER MEIS SCHEME  </br>
MANUFACTURER:-  <?php echo $row['ppname']; ?> , GSTIN - <?php echo $row['ppgstn']; ?>
</br> MANUFACTURER'S TAX INVOICE NO.  <?php echo $row['ppbillno']; ?> 
TOTAL GROSS WEIGHT : <?php echo $net_weights ?> MT </br>
TOTAL NET WEIGHT : <?php echo $net_weights ?>  MT  </br>
TRUCK NO. <?php echo $row['truckno']; ?> - (<?php echo $net_bags ?>  PCS) - EXPORT STANDARD LOOSE.  </font> 







 </td>    <td>  </td>  </tr>
 
 

<tr> <td colspan="9" align="right">  </td>  </tr>


<tr> <td colspan="5" align="center" style="font-size:80%" >  Total Invoice Amount in Words</td>   <td colspan="3" align="left" style="font-size:80%" >  Total Amount before Tax (INR) (FOB) : </td>   <td colspan="1" align="right">  <?php echo $final_amt  ?></td>  </tr>

<tr> <td colspan="5" align="center"> INR :  <?php  $cheque_amt = round($final_amt) ; try  {  echo convert_number($cheque_amt) ;
    }
catch(Exception $e)
    {
    echo $e->getMessage();
    }    ?>
 </td>


<td colspan="4" align="right"> 

<table border="1" width="100%">

<tr> <td style="font-size:80%" > Add: IGST @ 0 % (Against LUT)  </td>  <td>   </td>   </tr>
<tr> <td style="font-size:80%"   > Total Amount after Tax (INR) :  </td>  <td align="right" > <?php echo $final_amt ; ?> </td>   </tr>
<tr> <td style="font-size:80%"   > GST on Reverse Charge :  </td>  <td align="right" > </td>   </tr>
</table>

 </td>

  </tr>




<tr> <td colspan="4" align="left"  style="font-size:80%" >


<table border="1" width="100%">

<tr> <td colspan="2" align="center"> Bank Details </td>  </tr>
<tr> <td> Bank A/C No :  </td>  <td> <?php echo $result1_bank_rec['accnum']; ?>  </td>   </tr>
<tr> <td> BANK NAME:  </td>  <td>  <?php echo $result1_bank_rec['branchaddr']; ?> </td>   </tr>
<tr> <td> Bank Branch:   </td>  <td> <?php echo $result1_bank_rec['ifsc']; ?>  </td>   </tr>
<tr> <td> SWIFT  </td>  <td> <?php echo $result1_bank_rec['swidt']; ?> </td>   </tr>
<tr> <td> Bank IFSC:   </td>  <td> <?php echo $result1_bank_rec['ifsc']; ?>  </td>   </tr>

</table>


  </td>
<td colspan="3" align="center"></br> <IMG SRC="common_seal_sandar.jpeg"	width="120" height="100" >  </td>
<td colspan="2" align="center" style="font-size:80%" > Certified that the particulars given above are true and correct 
</br>  For <?php echo $_SESSION['myfirmnameeee'] ?></br> <IMG SRC="sandar_new_sign.png"	width="150" height="80" > </br>  </br>   </td>  </tr>

<tr> <td colspan="4" align="center">  </td> <td colspan="3" align="center"> Common Seal </td>  <td colspan="2" align="center"> Authorised signatory </td>   </tr>

</table>


	
	
</form>
</body>
</html>


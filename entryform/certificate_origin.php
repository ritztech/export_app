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
			
			$proforma_id =$row['proforma_id'];
			
			
			$curr_id =$row['curency'];
			
			
			$profidd =$row['tab_auto_id'];
			
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



		
}


catch(PDOException $e) {

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

<table width="100%"  align="center"  id = "ntable"  border="1">


<tr> <td colspan="3"> <table> 

<tr> <td width="10%" valign="top"> 

<IMG SRC="logo_saandar.jpeg"	width="150" height="80" >




 </td>

<td width="90%"   align="right" valign="top">  
<font size="6"><b>SANDAAR  AGRO PRIVATE LIMITED</b></font> 
</td>





  </tr>

 </table>  </td> </tr>


<tr style="font-weight:bold;" >  <td align="center" > 

Certificate of Origin No. <?php  echo $row['com_inv_2'];  ?>/COO/<?php  echo $row['invoice_no'];  ?>/<?php  echo $row['comm_inv_3'];  ?> </td>  <td> Date –11.01.2020  </td>


</tr>


<tr style="font-weight:bold;" >  <td > 

Exporter: </br></br>

<?php echo $_SESSION['myfirmnameeee'] ?> </br>
<span style="font-size:80%">
<?php echo $_SESSION['myfirmaddress'] ?>

</span>
 </td>  <td valign="top"> Buyer: </br> </br>

<?php echo $p_name  ?>  </br>
<span style="font-size:80%" >    <?php echo $off_addr1 ?>  </span>
 </td>


</tr>





</table>

</br></br>

<table width="100%"  align="center" style="font-weight:bold;"  >
<tr> <td  width="50%" align="left"> Invoice No.  <?php  echo $row['com_inv_2'];  ?>/<?php  echo $row['invoice_no'];  ?>/<?php  echo $row['comm_inv_3'];  ?>  </td>
  <td align="right">Date: <?php  echo $row['inv_date'] ?>  </td>  </tr>

<tr>  <td width="100%">  </br> </br>
 <?php

//echo "SELECT `tab_auto_id`, `issue_branch`, `date_of_issue`, `lc_date`, `currency`, `amt_of_lc`, `form_of_lc`, `tolerance`, `expdate`, `exp_place`, `advise_bank`, `benefeitiary_details`, `othersss`, `proforma_id`, `lcnumber` FROM `proforma_lc_details` = $proforma_id";


 $result13_get_lc = mysql_query("SELECT `tab_auto_id`, `issue_branch`, `date_of_issue`, `lc_date`, `currency`, `amt_of_lc`, `form_of_lc`, `tolerance`, `expdate`, `exp_place`, `advise_bank`, `benefeitiary_details`, `othersss`, `proforma_id`, `lcnumber` FROM `proforma_lc_details` where proforma_id  = $proforma_id  ");


while($row13_lcd = mysql_fetch_array($result13_get_lc))
  { ?>

 Documentary Credit No. <?php echo $row13_lcd['lcnumber'] ?> DATED  :    <?php echo date("d-M-Y", strtotime($row13_lcd['lc_date']));  ?>   OF
   <?php echo $row13_lcd['issue_branch'] ?> </br>  
  
 <?php }   ?>
 
 </td>   </tr>


<tr> <td  align="left"> </br> </br> H.S. CODE NO: 7207.19.20  </td>  <td  align="right"> </td>  </tr>


<tr> <td  align="center" colspan="2"> </br> <font size="4"> <u>CERTIFICATE OF ORIGIN</u> </font>  </td>  </tr>

<tr> <td  align="left" colspan="2"> </br> <font size="2"> WE HEREBY CERTIFY THAT 

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
	
	<?php echo $net_weights ?>  
 MT (<?php echo $net_bags ?>  PCS) OF <?php echo $goods_descr  ?>    <?php echo $itemdetilas  ?> </br>
  <?php  } ?>

AGAINST THE ABOVE INVOICE IS
EXPORTED TO <?php echo $p_name  ?>  , <?php echo $off_addr1 ?>  ARE MANUFACTURED IN INDIA AND ARE OF INDIAN
ORIGIN. </font>  </td>  </tr>


<tr> <td  align="left" colspan="2"> </br> <font size="3"> Final Destination – <?php  echo $row['port_of_dis'] ?> </br>

TRUCK NO. <?php echo $row['truckno']; ?>  </font> </br></br></br> </br></br></br> </br>  </td>  </tr>


<tr> <td colspan="2" align="left" style="font-size:80%" > 
</br>  For <?php echo $_SESSION['myfirmnameeee'] ?></br> <IMG SRC="auth_sign_sandar.jpeg"	width="150" height="80" > </br>    </td>  </tr>
<tr> <td colspan="2" align="left" style="font-size:80%" > Authorised signatory  </br>  </br> </td>  </tr>


</table>


<table width="100%" border="1" align="center" style="font-weight:bold;"  >

<tr> <td valign="top" > Reg.Office : 20053, Civil Line Infront Of Harijan Thana Tikamgarh State Madhya Pradesh / Country INDIA Pin code - 472001 </td>  <td valign="top" >
Phone: +91 7000615952
Email: info@sandaar.com
Website: www.sandaar.com  </td>  <td valign="top" >  </td> </tr>

</table>


	
	
</form>
</body>
</html>


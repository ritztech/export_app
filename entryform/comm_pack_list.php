<?php
error_reporting(0);
session_start();

if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

$fid=$_SESSION['fid'];



require '../conf.php';


try {

$query = "SELECT `consigneeid`, `proforma_inv`, DATE_FORMAT(proforma_date,'%d/%m/%Y') as proforma_date, `export_ref`, `buyrefno_date`, `cntry_origin`, `cntry_final`, `pre_carr_by`, `place_of_rec_per`, `vessel`, `port_of_laod`, `port_of_dis`, `final_dest`, `del_terms`, `extra_notes`, `incoterm`, `curency`, `bankid`, `shippartyidd`, `fid`, comm_id as tab_auto_id, `invoice_no`, DATE_FORMAT(inv_date,'%d/%m/%Y') as inv_date, `com_inv_2`, `comm_inv_3`, `proforma_id`,truckno FROM `commercial_in_main` WHERE `comm_id` = ?";

$stmt = $dbc->prepare($query);

$stmt->bindParam(1, $_GET['siid']);

$stmt->execute();

$row=$stmt->fetch(PDO::FETCH_ASSOC);


			$consignid =$row['consigneeid'];
			$shippid =$row['shippartyidd'];
			
			$curr_id =$row['curency'];
			$proforma_id =$row['proforma_id'];
			
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

<tr>  <td align="center" colspan="3"> 

</br>
<b> PACKING LIST AND WEIGHT LIST </b> </br></br>


</tr>

</table>


<table width="100%"  align="center"  id = "newtable"  border="1">

<tr> 

<td valign="top" width="50%" >
<b>
Exporter: </br><font size="3"><b>SANDAAR AGRO PRIVATE LIMITED</b></font> .   </br>

<span  style="font-size:80%" >Reg.Office : 20053, Civil Line Infront Of Harijan Thana  Tikamgarh State Madhya Pradesh / Country INDIA   Pin code - 472001 </br>
Mobile +91 7000615952, 9893142537 Tel.: +91 7683-240342  Fax : +91 7683 297329 
</br> GSTIN:  23ABCCS3959G1ZA
</br>Email :info@sandaar.com Web.: www.sandaar.com  </br>
<b>CIN : U51909MP2019PTC049174    </b>
</span>
</b>



 </td>  




 <td width="50%" valign="top"> 
<table border="1" style="font-weight:bold;" width="100%">
<tr> <td> Invoice No. & Date:  </td>  <td style="font-size:80%" ><?php  echo $row['com_inv_2'];  ?>/<?php  echo $row['invoice_no'];  ?>/<?php  echo $row['comm_inv_3'];  ?>   and <?php  echo $row['inv_date'] ?>  </td> </tr>

<tr> <td> Exporter’s Ref. </td>  <td style="font-size:80%" >  <?php  echo $row['export_ref'] ?></td> </tr>



<tr> <td> Buyer’s Ref. No. & Date: </td>  <td style="font-size:80%" >   <?php  echo $row['buyrefno_date'] ?>
</br>

 <?php

//echo "SELECT `tab_auto_id`, `issue_branch`, `date_of_issue`, `lc_date`, `currency`, `amt_of_lc`, `form_of_lc`, `tolerance`, `expdate`, `exp_place`, `advise_bank`, `benefeitiary_details`, `othersss`, `proforma_id`, `lcnumber` FROM `proforma_lc_details` = $proforma_id";


 $result13_get_lc = mysql_query("SELECT `tab_auto_id`, `issue_branch`, `date_of_issue`, `lc_date`, `currency`, `amt_of_lc`, `form_of_lc`, `tolerance`, `expdate`, `exp_place`, `advise_bank`, `benefeitiary_details`, `othersss`, `proforma_id`, `lcnumber` FROM `proforma_lc_details` where proforma_id  = $proforma_id  ");


while($row13_lcd = mysql_fetch_array($result13_get_lc))
  { ?>

LC NO:  <?php echo $row13_lcd['lcnumber'] ?> DATED  :    <?php echo date("d-M-Y", strtotime($row13_lcd['lc_date']));  ?>   OF
<?php echo $row13_lcd['advise_bank'] ?>  <?php echo $row13_lcd['issue_branch'] ?> </br>  
  
 <?php }   ?>




 </td> </tr>



</table>


 </td> 


 </tr>



</table>


<table width="100%"  align="center"   id = "newtable"  border="1">

<tr> 

<td valign="top" width="50%" >
<b>
Consignee:  </br> <b><?php echo $p_name ?></b><br>   <span  style="font-size:80%" > <?php echo $off_addr1  ?>  </span>
</b>



 </td>  




 <td width="50%" valign="top"> 
<table border="1" width="100%"  style="font-weight:bold;" >
<tr> <td colspan="2"> Proforma Invoice No. </br> <?php  echo $row['proforma_inv'] ?>  DT. <?php  echo $row['proforma_date'] ?>    </td> </tr>

<tr> <td> Country of Origin of goods: <?php  echo $row['cntry_origin'] ?>   </td>

 <td> Country of Final Destination: <?php  echo $row['cntry_final'] ?>  </td> </tr>



</table>


 </td> 


 </tr>



</table>




<table width="100%"  align="center" style="font-weight:bold;"   id = "newtable"  border="1">

<tr style="font-size:80%"> 

<td valign="top" width="70%" > <table width="100%"  border="1" >

<tr> <td> Pre-Carriage By:</td>  <td align="left"> <?php  echo $row['pre_carr_by'] ?>  </td>    </tr>
<tr> <td> Place of receipt by Pre-carrier: </td>  <td align="left">  <?php  echo $row['place_of_rec_per'] ?> </td>    </tr>
<tr> <td></br> Vessel : </td>  <td align="left"> </br>  <?php  echo $row['vessel'] ?> </td>    </tr>
<tr> <td></br> Port of Loading: : </td>  <td align="left"> </br>  <?php  echo $row['port_of_laod'] ?> </td>    </tr>
<tr> <td></br> Port of Discharge: : </td>  <td align="left"> </br> <?php  echo $row['port_of_dis'] ?> </td>    </tr>

</table> 


 </td>  




 <td width="30%" valign="top"> 
</br>Terms of Delivery: </br></br></br>
<?php  echo $row['del_terms'] ?>



 </td> 


 </tr>



</table>




<table width="100%"  align="center"    id = "newtable"  border="1">

<tr> <td colspan="2">
<table width="100%"  style="font-weight:bold;" >   
<tr  style="font-size:90%" >  <td> Marks & Nos. /</br> Container No.  </td>  <td> No. & Kind </br> of Pkgs.   </td>  <td width="60%"  align = "center"> Description of Goods   </td>   </tr>

</table> </td>   <td align = "center" style="font-weight:bold;"  > Quantity  </td>  <td  colspan="3" align = "center" style="font-weight:bold;"  >  REMARKS  </td>   </tr>


	<?php
	
$result13_2 = mysql_query("SELECT `item_id`, `goods_descr`, `hsncode`, `unit`, `qty`, `rate`, `amount`, `item_details`, `gst`, `comm_item_id`, `comm_inv_id`,bags FROM `comm_in_items` WHERE `comm_inv_id` = $profidd  ");


$i=0;
$net_amt=0;
$net_bags=0;
$net_weights=0;
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
	?>


	  <tr> <td colspan="2">
<table width="100%">   
<tr>  <td> <?php echo $i ?> /</br>  </td>  <td align="center">  <?php echo $bags ?>  PCS</br><font size="2">EXPORT</br>STANDAR</br>LOOSE </font>    </td>  <td width="60%"  align = "center"><b> <?php  echo $goods_descr  ?>  </b> </br><?php  echo $itemdetilas  ?>  </br>  <b> H.S. CODE NO:  <?php  echo $hsn_val_fr  ?> </b> </td>   </tr>

</table> </td>   <td align = "center" valign="top" style="font-weight:bold;" > <?php  echo $qty  ?>  M.T  </td>  <td  colspan="3" align = "center" valign="top"  style="font-weight:bold;"  >    </td>    </tr>




	  <?php }  ?>	

<tr> <td colspan="2"> 

<font  size="2">

WE DO HEREBY CERTIFY THAT THE MERCHANDISE ARE OF INDIAN ORIGIN.
WE ALSO CERTIFY THAT QUALITY, QUANTITY, RATE, SPECIFICATION OF THE
MERCHANDISE ARE STRICTLY IN ACCORDANCE WITH PROFORMA INVOICE.</br>
<b>INDIAN CUSTOMS CLEARANCE THROUGH DUTY DRAWBACK SCHEME (CUSTOMS
PORTION ONLY)
WE INTEND TO CLAIM REWARDS UNDER MEIS SCHEME.
MANUFACTURER: - RAIC INTEGRATED SPONGE & POWER PRIVATE LIMITED,
GSTIN - 19AACCB3462A1Z4, MANUFACTURER'S TAX INVOICE NO. R2550
TRUCK NO. <?php echo $row['truckno']; ?>  - (<?php echo $net_bags ?> PCS) - EXPORT STANDARD LOOSE.
TOTAL NET WEIGHT: <?php echo $net_weights ?>  M.T., TOTAL GROSS WEIGHT: <?php echo $net_weights ?> M.T.
PACKING DETAILS: EXPORT STANDARD LOOSE </b>


</b> 
</font> 
 </td><td colspan="1">  </td> <td colspan="3">  </td></tr>
 
 

 
 

</table>

<table width="100%"  align="center" style="font-weight:bold;"   id = "newtable"  border="1">

 <tr  style="font-size:80%"> <td   width="50%" > 
 This is to certify that the merchandise are of Indian Origin.  </br></br>
 
 
 Declaration:  </br></br> 
We declare that this packing list shows the actual quantity of the
goods described and that all particulars are true and correct. 
 </td>  <td width="50%"  >  For SANDAAR AGRO PRIVATE LIMITED  </br>

</br>
</br>

(Authorized Signatory) </td>    </tr>



</table>










































  
  
  
  
  
	
	
	
</form>
</body>
</html>

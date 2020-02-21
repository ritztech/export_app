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

 




$query = "SELECT `fid`, `billno`, DATE_FORMAT(`date`,'%d/%m/%Y') as date_s , `paymentterms`, `truckno`, `billtyno`, `freighttotal`, `freightadv`, `freightpaid`, DATE_FORMAT(`billtydate`,'%d/%m/%Y') as billtydate, `bag1`, `grossweight2`, `mandigatepass1`, `billweight`, `rateoftax1`, `rateofgoods1`, `value1`, `vattax1`, `billvalue1`, `siid`, `supid`, `brkid`, `trid`, `brokerage_type`, `contractnumber`, `freight_type`, `freight_receivable`, `gst_0`, `gst_5`, `gst_12`, `gst_18`, `gst_28`, `billtype`, `placesupply`, `shippid` FROM `mandia6`  WHERE siid=?";

$stmt = $dbc->prepare($query);

$stmt->bindParam(1, $_GET['siid']);

$stmt->execute();

$row=$stmt->fetch(PDO::FETCH_ASSOC);


			$supid_1 =$row['supid'];
			$shippid =$row['shippid'];
			
			$plec_of_supply =$row['placesupply'];
			
				
            
			
			
$result1 = mysql_query("SELECT 	leg_name,fac_addr,gstin,statetype,aadhar from ledger_master  where legid = $supid_1");
$row1 = mysql_fetch_array($result1);

$p_name = $row1[0];

//echo $p_name;

$off_addr1 = $row1[1];
$party_gst = $row1[2];
$party_aadhar = $row1['aadhar'];
$statetype =$row1['statetype'];



$result32 = mysql_query("SELECT `leg_name`, `fac_addr`, `off_addr`, `fact_city`, `off_city`, `fact_state`, `off_state`, `f_pin`, `o_pin`, `o_con`, `f_contact`, `off_email`, `inctaxnum`, `servicetaxno`, `tinno`, `centralno`, `cstno`, `o_date`, `o_bal`, `acc_grp`, `dr_cr`, `broker`, `transported`, `party`, `legid`, `fid`, `firmcontact`, `bankname`, `bank_type`, `bank_number`, `ifsc_code`, `brokerage`, `brok_qty`, `acc_name`, `acc_id`, `gstin`, `aadhar`, `statetype` FROM `ledger_master` WHEre  legid = $shippid");
$row32 = mysql_fetch_array($result32);

$p_name_ss = $row32[0];
$off_addr1_ss = $row32[1];
$ss_aadhar = $row32['aadhar'];
$gstin_ss = $row32['gstin'];



			$brkid111 =$row['brkid'];
			$trkid111 =$row['trid'];
			
			
			
			$result33 = mysql_query("SELECT `leg_name`  FROM `ledger_master`  WHERE  legid = $brkid111");
$row33 = mysql_fetch_array($result33);

$brok_name_ss = $row33['0'];

//echo $brok_name_ss;



$result34 = mysql_query("SELECT `leg_name`,fac_addr   FROM `ledger_master` where  legid = $trkid111");
$row34 = mysql_fetch_array($result34);

$trans_name_ss = $row34['0'];

$trans_name_ss_adddr = $row34['1'];


//echo $trans_name_ss;


			
			//echo $partyname;

            $billno =$row['billno'];
			 $freight_type =$row['freight_type'];
			 
			  $placesupply =$row['placesupply'];
			
			
			
			

            $date =$row['date'];

            $bag =$row['bag'];

            $packing =$row['packing'];

            $grossweight =$row['grossweight'];

           

         
            $paymentterms =$row['paymentterms'];

           
            $quantity = $row['quantity'];

            $truckno = $row['truckno'];

            $billtyno = $row['billtyno'];

			

			$freighttotal = $row['freighttotal'];
			
			
			$freightadv = $row['freightadv'];

			$freightpaid = $row['freightpaid'];
			
			$freight_receivable = $row['freight_receivable'];
			
			$contractnumber = $row['contractnumber'];
			
			
			
			
			

			$bag1 =  $row['bag1'];

            $grossweight2 =  $row['grossweight2'];

            $mandigatepass1 =  $row['mandigatepass1'];

            $billweight =  $row['billweight'];

            $rateoftax1 =  $row['rateoftax1'];

            $rateofgoods1 =  $row['rateofgoods1'];

            $value1 =  $row['value1'];

            $vattax1 =  $row['vattax1'];

            $billvalue1 =  $row['billvalue1'];

			$billtydate =  $row['billtydate'];


            $siid = $row['siid'];
		
			$billtype =  $row['billtype'];
			
			 $gst_0 =  $row['gst_0'];
			 $gst_5 =  $row['gst_5'];
			 $gst_12 =  $row['gst_12'];
			 $gst_18 =  $row['gst_18'];
			 $gst_28 =  $row['gst_28'];
			 
			 
			
			
			
						  if($freight_type == "1")
			  {
				  		$tot_1 = 	 round($billvalue1,2) + round($freight_receivable,2);
						$freight_valuee='Frieght Advance Plus(+)';
			  }
			  else
			  {
						$tot_1 = 	 round($billvalue1,2) - round($freight_receivable,2); 
                        $freight_valuee='Frieght To Pay Minus(-)';						
			  }
			
			//echo  $tot_1;

																							 

         
			$all_t_tax = 0;

					

		
			

				

} catch(PDOException $e) {

	echo "Error: " . $e->getMessage();

}


/** 
*  Function:   convert_number 
*
*  Description: 
*  Converts a given integer (in range [0..1T-1], inclusive) into 
*  alphabetical format ("one", "two", etc.)
*
*  @int
*
*  @return string
*
*/ 
function convert_number($number) 
{  $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'ONE', '2' => 'TWO',
    '3' => 'THREE', '4' => 'FOUR', '5' => 'FIVE', '6' => 'SIX',
    '7' => 'SEVEN', '8' => 'EIGHT', '9' => 'NINE',
    '10' => 'TEN', '11' => 'ELEVEN', '12' => 'TWELVE',
    '13' => 'THIRTEEN', '14' => 'FOURTEEN',
    '15' => 'FIFTEEN', '16' => 'SIXTEEN', '17' => 'SEVENTEEN',
    '18' => 'EIGHTEEN', '19' =>'NINETEEN', '20' => 'TWENTY',
    '30' => 'THIRTY', '40' => 'FORTY', '50' => 'FIFTY',
    '60' => 'SIXTY', '70' => 'SEVENTY',
    '80' => 'EIGHTY', '90' => 'NINETY');
   $digits = array('', 'HUNDRED', 'THOUSAND', 'LAKH', 'CRORE');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 'S' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' AND ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
//  echo $result . "RUPEES  " . $points . " Paise";
return ucwords(strtolower($result));
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

<?php


if($fid==22){  echo '<IMG SRC="prm.jpg"	width="150" height="80" >';   }
elseif($fid==23) {echo '<IMG SRC="logo_saandar.jpeg"	width="150" height="80" >';}
else {echo '<IMG SRC="manisj_jain_logo.png"	width="150" height="80" >';}

?>




 </td>

<?php


 if($fid==16 || $fid==20){ ?>

<td width="90%"   align="center" valign="top">  
<font size="6"><b>MRP AGRO PRIVATE LIMITED</b></font> </br>
Reg.Office : H.no. 100 Ward No. 23 Infrount of Thane Ajak, Street Civil Line, City Tikamgarh, Pin code - 472001 State Madhya Pradesh / Country INDIA </br>
Mobile +91 7000615952, 9893142537 Tel.: +91 7683-240342  Fax : +91 7683 297329 Email : info@mrpagro.com Web.: www.mrpagro.com  </br>
<b>GSTN No. : 23AALCM7698A1Z9    IEC : AALCM7698A      Fedration of indian export Membership no. : MPC/67/2018-2019 </b>
</td>

<?php   } ?>

<?php if($fid==19 || $fid==21){ ?>

<td width="90%"   align="center" valign="top">  
<font size="6"><b>MRP AGRO IMPEX</b></font> </br>
Reg.Office : R1 868, MRP AGRO IMPEX, ABDUL ABBASH KHAN SATTAR KHAN,
SUDHASAGAR ROAD, TIKAMGARH State Madhya Pradesh / Country INDIA </br>
Mobile +91 9165327042Tel.: +91 9165327042  Fax : +91 N.A Email :
mrpagroimpex@gmail.com Web.: www.na.com  </br>
<b>GSTN No. : 23CBLPK1195E1ZS    IEC : CBLPK1195E      Fedration of indian export Membership no. : CBLPK1195E </b>
</td>

<?php   } ?>

<?php if($fid==22){ ?>

<td width="90%"   align="center" valign="top">  
<font size="6"><b>PRM TRADE LINK</b></font> </br>
Reg.Office :  868, R1, ABDUL ABBASH KHAN  SATTAR KHAN,
SUDHASAGAR ROAD, City : Tikamgarh,Pin code - 472001 State Madhya Pradesh / Country INDIA </br>
Mobile +91 9165327042 9617431590 Tel.: +91 7683-240342 Fax : +91 7683 297329 Email : prmtradelink@gmail.com Web.: www.mrpagro.com
 </br>
<b>GSTN No. : 23AGWPA7073M2ZW IEC : AGWPA7073M Fedration of indian export Membership no. : MPC/---/2018-2019 </b>
</td>

<?php   } ?>

<?php if($fid==23){ ?>

<td width="90%"   align="center" valign="top">  
<font size="6"><b>SANDAAR AGRO PRIVATE LIMITED</b></font> </br>
Reg.Office : 20053, Civil Line Infront Of Harijan Thana City : Tikamgarh, 
 Pin code - 472001 State Madhya Pradesh / Country INDIA </br>
Mobile +91 7000615952 9893142537 Tel.: +91 7683-240342 Fax : +91 7683 297329 Email : a9893142537@gmail.com Web.: www.mrpagro.com
 </br>
<b>GSTN No. : 23ABCCS3959G1ZA IEC : ABCCS3959G Fedration of indian export Membership no. : MPC/---/2018-2019 </b>
</td>

<?php   } ?>


  </tr>

 </table>  </td> </tr>

<tr> <td align="center" rowspan="3" width="65%"> <font size="4"><b><?php if($fid==20 || $fid==21 ) {  ?> DOMESTIC INVOICE <?php } ?>
<?php if($fid==16 || $fid==19 || $fid==22|| $fid==23 ) {  ?> EXPORT INVOICE <?php } ?> </b> </font></td>
<td width="5%">   </td>
<td width="30%"> Original For Receipient  </td> </tr>
<tr> 
<td>   </td>
<td> Duplicate for Supplier/Transporter  </td> </tr>
<tr> 
<td>   </td>
<td> Triplicate for Supplier  </td> </tr>

<tr>  <td align="center" colspan="3"> 

<?php if($fid==16 || $fid==19 || $fid==22 || $fid==23 ) {  ?>

<b>Supply Meant for Export Under Bond or Letter of Undertaking without Payment of Integrated Tax (IGST) </b> </br>
GST LUT Details : Application Reference Number (ARN) 

<?php if($fid==16){ ?>
AD2308190011791 dt 19/08/2019
<?php } ?>

<?php if($fid==19){ ?>
AD231019000172V  dt 08/10/2019
<?php }  ?>

<?php if($fid==22){ ?>
AD231219000157J  dt 03/12/2019
<?php }  ?>

<?php if($fid==23){ ?>
AD231219000703K  dt 11/12/2019
<?php }  ?>


<?php } ?>

</td> </tr>

</table>

<table width="100%"  align="center"  id = "newtable"  border="1">

<tr> 

<td valign="top" width="50%" > <table width="100%">

<tr> <td> Reverse Charge:Invoice No. </td>  <td align="center"> : </td>  <td > <?php if($fid==23){ ?>SAN<?php }  else {  ?>  MRP <?php } ?>/2019-2020/<?php echo $billno; ?> </td>   </tr>
<tr> <td> Invoice Date. </td>  <td align="center"> : </td>  <td> <?php  echo  $row['date_s'] ?> </td>   </tr>
<tr> <td></br> CUSTOMER ORDER NO.& DATE  </td>  <td align="center"> </br>: </td>  <td> </br><?php echo $contractnumber  ?> </td>   </tr>
</table> 

<table  width="100%" border="1" style="font-weight:bold">
<tr>  <td width="50%"> State:Madhya Pradesh  </td>   <td width="50%">State Code&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp23   </td>  </tr>
<tr>  <td width="50%"> COUNTRY OF ORIGIN OF GOODS  </td>   <td width="50%">INDIA   </td>  </tr>
<tr>  <td width="50%"> <?php if($fid==16 || $fid==19 ) {  ?> COUNTRY OF FINAL DESTINATION <?php } ?> </td>   <td width="50%"><?php if($fid==16 || $fid==19 ) {  ?> NEPAL <?php } ?>  </td>  </tr>


</table>


 </td>  




 <td width="50%" valign="top"> 
<table border="1" width="100%">
<tr> <td> Transportation Mode &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp By Road </td> </tr>
<tr> <td> Vehicle Number &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp <?php  echo  strtoupper($truckno) ?> </td> </tr>
<tr> <td> Date of Supply &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp <?php  echo  $row['date_s'] ?> </td> </tr>
<tr> <td> LR/RR  NO. &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp 000 000 <?php echo $billno;  ?> </td> </tr>
<tr> <td> Transporter Name. &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp <?php    echo strtoupper($trans_name_ss) ?> </td> </tr>
<tr> <td> Place of Supply . &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp <?php  echo $plec_of_supply ?> </td> </tr>

</table>


 </td> 


 </tr>



</table>

<table width="100%"  align="center"  id = "newtable2"  border="1">

<tr>


<td width="50%"> <table border="1" width="100%"   >

<tr> <td colspan="2"> <font size="4"><b>Details of Receiver - Billed to:</b></font></br>
Name :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php  echo  strtoupper($p_name) ?>  </td> </tr>
<tr> <td rowspan="2"> Address: </td>  <td> <?php  echo  strtoupper($off_addr1) ?> </td>  </tr>
<tr>   <td>  </td>  </tr>
<tr> <td colspan="2"> Remark Delivery &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   C&F(Including Cost & Fright)  </td> </tr>

</table>  

</td>


<td width="50%"> <table border="1" width="100%"   >

<tr>  <td colspan="3" align="center">  Details of Consignee / Importer/ Shipped to:  </td> </tr>
<tr>  <td>NAME &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </td> <td> :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </td>  <td> <?php  echo  strtoupper($p_name) ?>  </td>  </tr>
<tr>  <td>Address &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  </td> <td> :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </td>  <td> <?php  echo  strtoupper($off_addr1) ?>  </td>  </tr>
<tr>  <td>GSTIN &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  </td> <td>:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  </td>  <td> N.A. </td>  </tr>
<tr>  <td>Country &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </td> <td> :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </td>  <td> <?php if($fid==16 || $fid==19 ) {  ?> NEPAL  <?php } ?> </td>  </tr>


</table>  </td>















</tr>

</table>


<table width="100%"  align="center"  id = "newtable2"  border="1" style="font-weight:bold">

<tr> <td>Sr.</br>No.  </td>
<td>Name of Product/</br>Service  </td>
<td> HSN/SAC </td>

<td> UOM </td>
<td> Qty </td>
<td> Rate </td>
<td> Amount </td>
<td> Packing </td>
<td> Taxable Value </td>


<td>  <table border="1" width="100%"> <tr> <td colspan="2" align="center">CGST  </td> </tr>
<tr> <td>Rate &nbsp&nbsp&nbsp&nbsp&nbsp  </td>  <td>Amount &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  </td>  </tr>
 </table> </td>
 
<td>  <table border="1" width="100%" > <tr> <td colspan="2" align="center">SGST  </td> </tr>
<tr> <td>Rate &nbsp&nbsp&nbsp&nbsp&nbsp  </td>  <td>Amount &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  </td>  </tr>
 </table> </td>

<td>  <table border="1" width="100%" > <tr> <td colspan="2" align="center">IGST  </td> </tr>
<tr> <td>Rate &nbsp&nbsp&nbsp&nbsp&nbsp  </td>  <td>Amount &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  </td>  </tr>
 </table> </td>
 
 <td align="center"> Total </td>

 


 </tr>
 
 
 		  <?php

 $i = 0;
 $tbill = 0;
 $t_bags3 = 0;
 $t_qty33 = 0;
 $t_wghttt33 = 0;
 
 
$result13_2 = mysql_query("SELECT `stockid`, `bag`, `grswght`, `mandiwght`, `billwght`, `rot`, `rog`, `vale`, `vtou`, `bilvalue`, `remark`,stid ,w_per_bag,hsn
FROM `stock_ref` WHERE formid=$siid and tempid='A6'");
 

while($row13 = mysql_fetch_array($result13_2))

  {   $i = $i + 1; 
  
   $hsn_val_fr=$row13['hsn'];
  
  ?>
  
  
  <tr>
  
  <td>  <?php  echo $i; ?> </td>
    <td>  <?php  echo $row13['stockid']; ?> </td>
	<td>  <?php  echo $row13['hsn']; ?> </td>
	<td> MTS  </td>
	<td> <?php  echo  $row13['billwght']  ?> </td>
	<td > INR &nbsp <?php  echo   number_format(round($row13['rog'],2),2)    ?> </td> 
	<td> INR &nbsp  <?php  echo  number_format(round($row13['vale'],2),2)     ?>    </td>
    <td align="center"> - </td> 
	<td> INR &nbsp  <?php  echo  number_format(round($row13['vale'],2),2)     ?>    </td>
	<td> <table border="1"  width="100%"> <tr> <td width="50%"> 0% </td>  <td align="center" width="50%" > - </td> </tr> </table> </td>
		<td> <table border="1"  width="100%"> <tr> <td width="50%"> 0% </td>  <td align="center" width="50%" > - </td> </tr> </table> </td>
			<td> <table border="1"  width="100%"> <tr> <td width="50%"> 0% </td>  <td align="center" width="50%" > - </td> </tr> </table> </td>
  
  	<td> INR &nbsp  <?php  echo  number_format(round($row13['vale'],2),2)     ?>    </td>
  
  </tr>
   <?php  
 $tbill = $tbill +  $row13['vale'];
  $t_bags3 =  $t_bags3 +  $row13['bag'];
  $t_qty33 = $t_qty33 + $row13['grswght'] ;
 
   if($hsn_val_fr!=9967) {
  $t_wghttt33=$t_wghttt33+ $row13['billwght'] ;
  }
  


 }    ?>
 
 
 
 
 
 
 
 
 
 
 <tr> <td>  </td> <td>  </td> <td>  </td> <td> Total: </td>

<td align="center"> <?php echo $t_wghttt33; ?> </td><td>  </td><td align="right">INR &nbsp  <?php echo number_format(round($tbill,2),2) ;  ?>  </td><td>  </td> <td align="right">INR &nbsp  <?php echo number_format(round($tbill,2),2) ;  ?>  </td> <td><table border="1" width="100%" > <tr><td> </td> <td align="center"> - </td> </tr>  </table>  </td><td> <table border="1" width="100%" > <tr><td> </td> <td align="center"> - </td> </tr>  </table> </td><td> <table border="1" width="100%" > <tr><td> </td> <td align="center"> - </td> </tr>  </table>   </td>
<td align="right">INR &nbsp  <?php echo number_format(round($tbill,2),2) ;  ?>  </td>  </tr>
 
<tr> <td colspan="9" align="center"> Total Invoice Amount in Words: (in Indian Currency)   </td>

<td colspan="2">  Total Amount Before Tax            :   </td>

<td colspan="2">  INR &nbsp  <?php echo number_format(round($tbill,2),2) ;  ?> </td>

  </tr> 

</table>


<table width="100%"  align="center"  id = "newtable2"  border="1" style="font-weight:bold">

<tr>  

<td width="66%" > <table width="100%">

<tr> <td> 1 Amount (Before Reverse Charge) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php  $cheque_amt = round($tbill) ; try  {  echo convert_number($cheque_amt) ;
    }
catch(Exception $e)
    {
    echo $e->getMessage();
    }    ?>    </td>  </tr>
<tr> <td> 2 Amount (Include Reverse Charge) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php  $cheque_amt = round($tbill) ; try  {  echo convert_number($cheque_amt) ;
    }
catch(Exception $e)
    {
    echo $e->getMessage();
    }    ?>    </td>  </tr>
<tr> <td> 3 <?php if($fid==16 || $fid==19 || $fid==22 || $fid==23 ) {  ?> IGST (Reverse Charge) <?php } ?>
<?php if($fid==20 || $fid==21 ) {  ?> Tax Amount GST <?php } ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ZERO    </td>  </tr>
</table>   </td>


<td width="33%">

<table  border="1" width="100%">

<tr>  <td width="50%">Add&nbsp&nbsp:&nbsp&nbspCGST   </td>   <td colspan="right" width="50%">  - </td>   </tr>
<tr>  <td width="50%">Add&nbsp&nbsp:&nbsp&nbspSGST   </td>   <td colspan="right" width="50%">  - </td>   </tr>
<tr>  <td width="50%">Add&nbsp&nbsp:&nbsp&nbspIGST   </td>   <td colspan="right" width="50%">  - </td>   </tr>

<tr>  <th width="50%" align="left">Tax Amount : GST                      :   </th>   <th colspan="right" width="50%">  - </th>   </tr>


</table>

 
  </td>

 </tr>

</table>




<table width="100%"  align="center"  id = "newtable2"  border="1" style="font-weight:bold">
<tr>   


<td width="33%" valign="top">  

<table width="100%" border="0"> 
<tr> <td style="font-size:12px"> 
:Terms and Conditions : </br>

<?php if($fid==16 || $fid==19 || $fid==22 || $fid==23 ) {  ?>

(1)  Certified that the goods shipped are in accordance with the spcification, quality & quantity as per the terms and conditions and all formalities of export contract complied with  The above prices are C&F  Per Metric Ton
</br>2. The above price is valid till 
</br>3. Any Statutory Liability outside India will be in Buyers Account
</br>4.  The above Delivery given on Credit Sale payment done after
Receipts of Goods by Buyers. So Invoice Value payable Via TT Only. if
invoice amount payable in equal TT compare as short or Excess given
Swift mesages for short or extra amount reason.

</br>5. PARTIAL payment  ALLOWED.
</br>6. TRANSSHIPMENT NOT ALLOWED.
</br>7 The Delivery is subject to receipt of All the statutory clearances from all applicable  statutory authorities, from Both side, In case of non receipt of any statutory clearancethe above contract of supply is null and void and no expenses whatsoever incurred shall be reimbursed to either party.
</br>8 If there  are any delay in deliveries or in transit delay due to reasons beyond the control ofcompany shall not be held responsible for the same directly /indirectly.
</br>10 All disputes are subject to INDIA. only
<?php } ?>

<?php if($fid==20 || $fid==21 ) {  ?>
(1)  Certified that the goods shipped are in accordance with the specification, quality & quantity as per the terms and conditions and all formalities of Domestic contract complied with The above prices are C&F Per  QTY /UOM/RATE.
</br>2. The above price is valid as per Contract with 
</br>3. Any Statutory Liability After any state of  India will be in Buyers Account
</br>4 The above delivery will be against advance payment VIA TT/swift / RTGS/NEFT/IMPS/ Electronic Transfer Mode only cash Not Allow in Any Condition.
</br>5. PARTIAL payment  ALLOWED.
</br>6. TRANSSHIPMENT NOT ALLOWED.
</br>7 The Delivery is subject to receipt of All the statutory clearances from all applicable statutory authorities, from Both side, In case of non receipt of any statutory clearance the above contract of supply is null and void and no expenses whatsoever incurred shall be reimbursed to either party.
</br>8 If there are any delay in deliveries or in transit delay due to reasons beyond the control of company shall not be held responsible for the same directly /indirectly.
</br>10 All disputes are subject to TIKAMGARH MADHYA PRADESH INDIA. only


<?php } ?>



    
</td></tr>
</table>

 

  
  
  </td>
<td width="33%" align="left" valign="bottom">
:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<u>BENIFICIARY BANK DETAILS</u></br>

<?php if($fid==16 || $fid==20){ ?>
Bank Account Number  : 145005000830  </br>
Bank Branch IFSC  : ICIC0001450 SWIFT CODE : ICICINBBCTS                                      </br>
Bank Branch Name      : ICICI BANK, Branch Tikamarh MP
<?php } ?>

<?php if($fid==19 || $fid==20){ ?>
Bank Account Number  : 145005500508  </br>
Bank Branch IFSC  : ICIC0001450 SWIFT CODE : ICICINBBCTS                                      </br>
Bank Branch Name      : ICICI BANK, Branch Tikamarh MP
<?php } ?>


<?php if($fid==22){ ?>
Bank Account Number  : 145005001182  </br>
Bank Branch IFSC  : ICIC0001450 SWIFT CODE : ICICINBBCTS                                      </br>
Bank Branch Name      : ICICI BANK, Branch Tikamarh MP
<?php } ?>

<?php if($fid==23){ ?>
Bank Account Number  : 145005001077  </br>
Bank Branch IFSC  : ICIC0001450 SWIFT CODE : ICICINBBCTS                                      </br>
Bank Branch Name      : ICICI BANK, Branch Tikamarh MP
<?php } ?>


<table  width="100%" border="1"> 

<tr>
<td width="50%"  align="center"   valign="top"> SIGNATURE  </td>
<td width="50%" align="center" > 

<?php if($fid==16 || $fid==20){ ?>

<IMG SRC="mrparo_seal.jpg"	width="120" height="100" > </br>
<?php } ?>

<?php if($fid==22){ ?>

<IMG SRC="prm_sign.png"	width="120" height="100" > </br>
<?php } ?>

<?php if($fid==23){ ?>

<IMG SRC="common_seal_sandar.jpeg"	width="120" height="100" > </br>
<?php } ?>


<?php if($fid==19 || $fid==21){ ?>

</br></br></br>
<?php } ?>
 (Common Seal)
 
</td>  </tr>
 </table>

 
 </td>
<td width="33%" > 

<table width="100%"  align="center"  id = "newtable2"  border="1" style="font-weight:bold">
<tr>  <td width="50%"> Total Amount After Tax              :  </td>  <td  width="50%" align="right">INR  <?php echo number_format(round($tbill,2),2) ;  ?> </td> </tr>
<tr>  <td colspan="2">   <?php if($fid==16 || $fid==19 || $fid==22 || $fid==23 ) {  ?>  <font size="1"> GST LUT Details : Application Reference Number (ARN) <?php if($fid==16){ ?>
AD2308190011791 dt 19/08/2019
<?php } ?>


<?php if($fid==22){ ?>
AD231219000157J  dt 03/12/2019
<?php } ?>

<?php if($fid==23){ ?>
AD231219000703K  dt 11/12/2019
<?php } ?>



<?php if($fid==19){ ?>
AD231019000172V  dt 08/10/2019
<?php } ?> </font>  <?php }  else {echo "</br></br>"; } ?>  </td> </tr>


<tr>  <td width="50%"> <font size="2"> GST Payable on Reverse Charge : </font> </td>  <td  width="50%" align="left"> INR 0.0</td> </tr>


<tr>  <td colspan="2" align="center"> <font size="1"> Certified that the particulars given above are true and correct. </font></br>

<?php if($fid==16 || $fid==20){ ?>

For, MRP AGRO PRIVATE LIMITED
<?php } ?>

<?php if($fid==19 || $fid==21){ ?>

For, MRP AGRO IMPEX
<?php } ?>

<?php if($fid==22){ ?>

For, PRM TRADE LINK
<?php } ?>

<?php if($fid==23){ ?>

For, SANDAAR AGRO PRIVATE LIMITED
<?php } ?>

</br>


<?php if($fid==16 || $fid==20){ ?>
<IMG SRC="mrpagro_sign.jpg"	width="150" height="80" >
<?php } ?>

<?php if($fid==22){ ?>
<IMG SRC="auth_sign_1.png"	width="150" height="80" >
<?php } ?>


<?php if($fid==23){ ?>
<IMG SRC="auth_sign_sandar.jpeg"	width="150" height="80" >
<?php } ?>




<?php if($fid==19 || $fid==21){ ?>
</br></br></br></br></br>
<?php } ?>


</br>
Authorised Signatory
  </td> </tr>


</table>


  </td>














</tr>

</table>






































  
  
  
  
  
	
	
	
</form>
</body>
</html>


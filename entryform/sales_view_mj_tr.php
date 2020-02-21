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

 




$query = "SELECT `fid`, `billno`, DATE_FORMAT(`date`,'%d/%m/%Y') as date_s , `paymentterms`, `truckno`, `billtyno`, `freighttotal`, `freightadv`, `freightpaid`, DATE_FORMAT(`billtydate`,'%d/%m/%Y') as billtydate, `bag1`, `grossweight2`, `mandigatepass1`, `billweight`, `rateoftax1`, `rateofgoods1`, `value1`, `vattax1`, `billvalue1`, `siid`, `supid`, `brkid`, `trid`, `brokerage_type`, `contractnumber`, `freight_type`, `freight_receivable`, `gst_0`, `gst_5`, `gst_12`, `gst_18`, `gst_28`, `billtype`, `placesupply`, `shippid`,drivername,destinationplace,delremarksss FROM `mandia6`  WHERE siid=?";

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



$result34 = mysql_query("SELECT `leg_name`,fac_addr,off_email,tinno  FROM `ledger_master` where  legid = $trkid111");
$row34 = mysql_fetch_array($result34);

$trans_name_ss = $row34['0'];

$trans_name_ss_adddr = $row34['1'];

$trans_name_ss_email = $row34['2'];
$trans_name_ss_pan = $row34['3'];


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

						
$result33_111 = mysql_query("SELECT `driversign_img_file` FROM `vehicle_master` WHERE `vehicl_num`='$truckno' limit 0,1 ");
$result33_111_22 = mysql_fetch_array($result33_111);
$driver_sign = $result33_111_22['0'];




		

//echo "Driver sign is =".$driver_sign;			

				

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
<title>Untitled Document</title>
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



<tr> <td colspan="5" align="center" style="font-weight:bold">
<font size="7"><b><?php echo $trans_name_ss; ?></b></font> </br>
<?php echo $trans_name_ss_adddr; ?> </br>
Email: <?php echo $trans_name_ss_email; ?> </br> 
PAN: <?php echo $trans_name_ss_pan; ?>

  </td> </tr>
  
  
<tr> <td colspan="7" align="center" style="font-weight:bold">
<font size="6"><b>TRANSPORT BILLTY / LR COPY </b> </font>
  </td> </tr>
  
  

<tr>
<th colspan="4" align="center">FLEET OWNERS & TRANSPORT CONTRACTOR  </th>


</tr>

  
<tr>  
<td colspan="1"  width="20%">LR/RR NO.  </td>
  <td colspan="1"  width="1%" >:</td> 
  <td colspan="1" width="30%"><b>000 000  00<?php echo $billno; ?> </b> </td>  
  <td colspan="1" width="50%" >Transpostation Mode &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp     : &nbsp&nbsp <b> By Road   </b>  &nbsp&nbsp&nbsp   </td> 
  </tr> 
  
  
  <tr>  
<td colspan="1">Date.  </td>
  <td colspan="1">:</td> 
  <td colspan="1"><b> <?php  echo  $row['date_s'] ?>  </b>  </td>  
  <td colspan="1" >Vehicle Number &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp     : &nbsp&nbsp <b> <?php  echo  strtoupper($truckno) ?>  </b>  &nbsp&nbsp&nbsp   </td> 
  </tr> 
  
  
    <tr>  
<td colspan="1">OWNER NAME.  </td>
  <td colspan="1">:</td> 
  <td colspan="1"><?php echo $trans_name_ss; ?>  </td>  
  <td colspan="1" >
  
  <table width="100%" border="0"> <tr> <td width="31%">Loading From  </td>   <td width="68%"> : &nbsp<?php  echo $plec_of_supply ?>  </td> </tr> </table>
  
  
  </td> 
  </tr> 
  
  
      <tr>  
<td colspan="1">Driver Name/OWNER NAME.  </td>
  <td colspan="1">:</td> 
  <td colspan="1"><?php echo $row['drivername']; ?>  </td>  
  <td colspan="1" >To Destination &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp     : &nbsp&nbsp <b> <?php echo $row['destinationplace']; ?>  </b>  &nbsp&nbsp&nbsp   </td> 
  </tr> 
  
  <tr> 

<th colspan="4"> <table  border="1" width="100%"> 
<tr> <td width="50%">  DETAILS OF Consignor   </td>
<td width="50%" > DETAILS OF Consignee/Importer/Shipped to:  </td>  </tr>

  </table>  </th>   </tr>



 <tr> 

<th colspan="4"> <table  border="1" width="100%"> 
<tr> <td width="50%">  <table border="1"  width="100%" ><tr><td  width="30%">Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :  </td>  <td width="70%" align="left" >  <?php if($fid==16){ ?> MRP AGRO PRIVATE LIMITED <?php } ?>  <?php if($fid==19){ ?> MRP AGRO IMPEX <?php } ?>  <?php if($fid==22){ ?> PRM TRADE LINK <?php } ?> <?php if($fid==23){ ?> SANDAAR AGRO PRIVATE LIMITED <?php } ?>   </td>  </tr> 
<tr><td width="30%" >Address &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :  </td>  <td  width="70%" align="left" >  <?php if($fid==16){ ?> Regd. Off- Hno. 23/100 Civil Line First flour Tikamgarh Madhya Pradesh   INDIA GSTN 23AALCM7698A1Z9 IEC AALCM7698A  <?php } ?> 
<?php if($fid==19){ ?> Regd. Off- R1 868, MRP AGRO IMPEX, ABDUL ABBASH KHAN SATTAR KHAN,SUDHASAGAR ROAD, TIKAMGARH State Madhya Pradesh   INDIA GSTN 23CBLPK1195E1ZS IEC CBLPK1195E  <?php } ?> 
<?php if($fid==22){ ?> Reg.Office :  868, R1, ABDUL ABBASH KHAN  SATTAR KHAN,SUDHASAGAR ROAD, City : Tikamgarh,Pin code - 472001 State Madhya Pradesh / Country INDIA GSTN 23AGWPA7073M2ZW IEC AGWPA7073M  <?php } ?>
<?php if($fid==23){ ?> Reg.Office : 20053, Civil Line Infront Of Harijan Thana City : Tikamgarh,Pin code - 472001 State Madhya Pradesh / Country INDIA GSTN 23ABCCS3959G1ZA IEC ABCCS3959G  <?php } ?>
 </td>  </tr>
<tr><td width="100%"  colspan="2" align="left">Remark Delivery &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo $row['delremarksss'] ?> </td>  </tr>


  </table>  </td>


<td width="50%" > <table border="1"  width="100%" ><tr><td  width="30%">Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :  </td>  <td width="70%" align="left"  > <?php  echo  strtoupper($p_name) ?>   </td>  </tr> 
<tr><td width="30%" >Address &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :  </td>  <td  width="70%" align="left" > <?php  echo  strtoupper($off_addr1) ?>  </td>  </tr>

<tr><td width="30%" >Destination Place &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :  </td>  <td  width="70%" align="left" > <?php echo $row['destinationplace'] ?>  </td>  </tr>
 </table>   </td>  </tr>
  </table>  </th>   </tr>


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
  
$result13_2 = mysql_query("SELECT stock_ref.stockid  as stockid, `bag`, `grswght`, `mandiwght`, `billwght`, `rot`, `rog`, `vale`, `vtou`, `bilvalue`, `remark`,stid ,w_per_bag,stock_ref.hsn as hsn
FROM `stock_ref`,stockitem WHERE stockitem.stockid=stock_ref.stid   and  formid=$siid and tempid='A6'  and stockitem.reportformanditax='FREIGHT' ");
 

while($row13 = mysql_fetch_array($result13_2))

  {   $i = $i + 1; ?>
  
  
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
  
    $t_wghttt33=$t_wghttt33+ $row13['billwght'] ;




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
<tr> <td> 3 IGST (Reverse Charge) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ZERO    </td>  </tr>
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


<td width="33%" valign="top" >  

<table> <tr> <td> Signatore of Consignor:</br>

<?php if($fid==16){ ?>
<IMG SRC="mrpagro_sign.jpg"	width="150" height="80" >
<?php } ?>

<?php if($fid==22){ ?>
<IMG SRC="auth_sign_1.png"	width="150" height="80" >
<?php } ?>

<?php if($fid==23){ ?>
<IMG SRC="auth_sign_sandar.jpeg"	width="150" height="80" >
<?php } ?>


<?php if($fid==19){ ?>
</br></br></br></br>
<?php } ?>




    
</br>  </td></tr>  <tr>
<td>Terms and Conditions: </br>
Goods Are Carried at owner's rish, Unless Specified Other Wise ubject to Tikamgarh MP India Jurisdication Other Condtion As over leaf.
   </td>  </tr> </table>
 

  </td>
<td width="33%" align="center" valign="top">  <table  width="100%"><tr> <td> Bill No.  </td>  <td>  <?php if($fid==23){ ?>SAN<?php }  else {  ?>  MRP <?php } ?>/2019-2020/00<?php echo $billno;  ?>   </td>  </tr>
                                                                    <tr> <td> Date.  </td>  <td>  <?php  echo  $row['date_s'] ?>   </td>  </tr>
                                                                           <tr> <td> Bill Value.  </td>  <td>  INR . <?php  echo  $row['billvalue1'] ?> </td>  </tr>																	</table> </td>
<td width="33%" > 

<table width="100%"  align="center"  id = "newtable2"  border="1" style="font-weight:bold">
<tr>  <td width="50%"> Total Amount After Tax              :  </td>  <td  width="50%" align="right">INR  <?php echo number_format(round($tbill,2),2) ;  ?> </td> </tr>
<tr>  <td colspan="2"> <font size="1"> GST LUT Details : Application Reference Number (ARN) 


<?php if($fid==16){ ?>
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
<?php } ?>



</font>  </td> </tr>


<tr>  <td width="50%"> <font size="2"> GST Payable on Reverse Charge : </font> </td>  <td  width="50%" align="left"> INR 0.0</td> </tr>


<tr>  <td colspan="2" align="center"> <font size="1"> Certified that the particulars given above are true and correct. </font></br>
<?php echo $trans_name_ss; ?></br>

<?php if($driver_sign=="NONE" || $driver_sign=="0" || $driver_sign=="" ) { ?>
</br></br></br>
<?php }  else { ?>


<img src="<?php echo "../basicform/".$driver_sign ?>"  width="150"  height="80" alt="Registration file" id="regfile"  ></br>

<?php }  ?>



Authorised Signatory
  </td> </tr>


</table>


  </td>














</tr>

</table>






































  
  
  
  
  
	
	
	
</form>
</body>
</html>


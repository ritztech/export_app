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


<tr>  <td align="center" colspan="3"> 

</br>
<b>PACKING LIST AND WEIGHT LIST </b> </br></br>


</tr>

</table>


<table width="100%"  align="center"  id = "newtable"  border="1">

<tr> 

<td valign="top" width="50%" >
<b>
Exporter: </br>SARAF TREXIM LTD.  4A, CAMAC STREET, LEVEL 8, UNIT B,  PS ARCADIA CENTRAL, KOLKATA-700017, INDIA. TEL: +91 033 2290 6800, Email - docs@saraftrexim.com GST NO. 19AAKCS7511D1ZB, PAN NO. AAKCS7511D, AUTHORIZED ECONOMIC OPERATOR-T1 CERTIFICATE (EXPORTER) NO: INAAKCS7511D1F196 

</b>



 </td>  




 <td width="50%" valign="top"> 
<table border="1" style="font-weight:bold;" width="100%">
<tr> <td> Invoice No. & Date:  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp    </td> </tr>

<tr> <td> Exporter’s Ref. &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp <?php  echo  $row['date_s'] ?> </td> </tr>



<tr> <td> Buyer’s Ref. No. & Date:   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp <?php  echo  strtoupper($truckno) ?> </td> </tr>



</table>


 </td> 


 </tr>



</table>


<table width="100%"  align="center"   id = "newtable"  border="1">

<tr> 

<td valign="top" width="50%" >
<b>
Consignee:  </br> AMBE STEELS PVT. LTD., AMBE COMPLEX 6TH FLOOR, TEKU ROAD, KATHMANDU, NEPAL. EXIM CODE: 3026009000103NP, TEL: 00977 14 258128/258129/255551 
</b>



 </td>  




 <td width="50%" valign="top"> 
<table border="1" width="100%"  style="font-weight:bold;" >
<tr> <td colspan="2"> Proforma Invoice No. </br> STL/PI/279/19-20 DT. 06.01.2020    </td> </tr>

<tr> <td> Country of Origin of goods: INDIA   </td>

 <td> Country of Final Destination:  NEPAL  </td> </tr>



</table>


 </td> 


 </tr>



</table>




<table width="100%"  align="center" style="font-weight:bold;"   id = "newtable"  border="1">

<tr> 

<td valign="top" width="70%" > <table width="100%"  border="1" >

<tr> <td> Pre-Carriage By:</td>  <td align="left"> :  ROAD </td>    </tr>
<tr> <td> Place of receipt by Pre-carrier: </td>  <td align="left"> : INDIA </td>    </tr>
<tr> <td></br> Vessel : </td>  <td align="left"> </br>: BY Truck </td>    </tr>
<tr> <td></br> Port of Loading: : </td>  <td align="left"> </br>: DURGAPUR, INDIA </td>    </tr>
<tr> <td></br> Port of Discharge: : </td>  <td align="left"> </br>: BHAIRAHAWA, NEPAL VIA CUSTOMS
ENTRY POINT IN NEPAL: BHAIRAHAWA CUSTOMS OFFICE,
BHAIRAHAWA, NEPAL</td>    </tr>

</table> 


 </td>  




 <td width="30%" valign="top"> 
</br>Terms of Delivery: </br></br></br>

EX-WORKS DURGAPUR



 </td> 


 </tr>



</table>




<table width="100%"  align="center" style="font-weight:bold;"   id = "newtable"  border="1">

<tr> <td colspan="3">
<table width="100%">   
<tr>  <td> Marks & Nos. /</br> Container No.  </td>  <td> No. & Kind </br> of Pkgs.   </td>  <td width="60%"  align = "center"> Description of Goods   </td>   </tr>

</table> </td>   <td align = "center" > Quantity  </td>  <td align = "center" >  REMARKS  </td>  <td  align = "center" >   </td>  </tr>

<tr> <td colspan="3"> <font  size="2">

WE DO HEREBY CERTIFY THAT THE MERCHANDISE ARE OF INDIAN ORIGIN.
WE ALSO CERTIFY THAT QUALITY, QUANTITY, RATE, SPECIFICATION OF THE
MERCHANDISE ARE STRICTLY IN ACCORDANCE WITH PROFORMA INVOICE.
INDIAN CUSTOMS CLEARANCE THROUGH DUTY DRAWBACK SCHEME (CUSTOMS
PORTION ONLY)
WE INTEND TO CLAIM REWARDS UNDER MEIS SCHEME.
MANUFACTURER: - RAIC INTEGRATED SPONGE & POWER PRIVATE LIMITED,
GSTIN - 19AACCB3462A1Z4, MANUFACTURER'S TAX INVOICE NO. R2550
TRUCK NO. JH02AS1074 - (162 PCS) - EXPORT STANDARD LOOSE.
TOTAL NET WEIGHT: 75.060 M.T., TOTAL GROSS WEIGHT: 75.060 M.T.
PACKING DETAILS: EXPORT STANDARD LOOSE.

</font>

 </td><td>  </td><td>  </td><td>  </td>  </tr>
 
 
 

</table>

<table width="100%"  align="center" style="font-weight:bold;"   id = "newtable"  border="1">

 <tr> <td  > 
 This is to certify that the merchandise are of Indian Origin.
 </br></br>
 
 Declaration:  </br></br> 
We declare that this packing list shows the actual quantity of the
goods described and that all particulars are true and correct.


 </td>  <td >  For SARAF TREXIM LIMITED  </br>

</br>
</br>

(Authorized Signatory) </td>    </tr>



</table>










































  
  
  
  
  
	
	
	
</form>
</body>
</html>


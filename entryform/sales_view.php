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

</br></br></br></br></br></br></br></br></br></br></br></br>

  <table width="102%"  align="center"  id = "ntable" >
    <tr>
<td  align = "center"> 
<input type="button"  id = "printtable" name="btnprint" value="Print" onClick="jumpto() "/>
*****************<input type="button" id = "printtable1" name="CloseMe" value="Close Me" onClick="closeMe()"/>
 
<INPUT class = "abcqq" Type="BUTTON" VALUE="EDIT BILL" ONCLICK="window.location.href='salesinvoice_front_e.php?id=<?php echo $_GET['siid'] ?>'">

 </td>
</tr>

<?php
if($fid ==16) {
?>

 <tr>
<td  align = "center"> 

<b> <font size = "2" > Licence under Food Safety and Standards Act ,2006 FSS Number - 10019026001396 (TYPE-CENTRAL) </font></b>
  </td>
</tr>




<?php  } ?>


 <tr>
<td  align = "center"> 

<b> BILL OF SUPPLY   </b>
  </td>
</tr>






    <tr>
      <td><table width="100%" border="1">
	  
	         <tr>
          <td   colspan = "3" ><b><?php if($gst_zz != "") {?> GSTIN: <?php } ?></b> <?php echo $gst_zz ?>  </td>  <td   colspan = "3" ><b><?php if($fssi_zz !="") { ?>FSSAI No.:<?php  }?> </b> <?php echo $fssi_zz ?>  </td>
         
         
          </tr>
		  
	  
        <tr>
          <td width="43%"><b>Bill no: </b> <?php echo $billno;  ?>    </td>
         
          <td colspan="3" align="left"><b>Date of supply: </b> <?php  echo  $row['date_s'] ?> 
            </td>
          </tr>
		  
		  <tr> <td colspan="1" > <b> CONSIGNNE DETAILS   </br> </td>  <td colspan="3" >  <b  > SHIPPING DETAILS  </b>    </td>  </tr>
		  <tr> <td colspan="1" > <?php  echo  strtoupper($p_name) ?> </br>
<font  size = "1"> <?php  echo  strtoupper($off_addr1) ?>.  </font></br>

<?php  if($billtype == "1") { ?> <b>GSTIN</b> :<?php  echo $party_gst ?>  <?php } ?>
<?php if($billtype == "2") { ?> <b>AADHAR</b> :<?php  echo $party_aadhar ?>  <?php } ?>

		  </td>  <td colspan="3" > 


  <?php  echo  strtoupper($p_name_ss) ?> </br>
<font  size = "1"> <?php  echo  strtoupper($off_addr1_ss)?>. </font> </br>
<?php if($billtype == 1) { ?> <b>GSTIN </b>:<?php  echo $gstin_ss ?>  <?php } ?>
<?php if($billtype == 2) { ?> <b>AADHAR :</b><?php  echo $ss_aadhar ?>  <?php } ?>   </td>  </tr>

<tr> <td colspan="1" > <b> PLACE OF SUPPLY: <?php  echo $plec_of_supply ?></b> </td>  

<td colspan="3" > ORDER NO.  AND DATE : <?php echo $contractnumber  ?>  </td>  </tr>

				  

				  
        <tr>
          <td colspan="3"><b>BROKER NAME:</b>  <?php  if($brok_name_ss != "None")  { ?> <?php  echo  strtoupper($brok_name_ss) ?>  <?php  } ?>
            </td>
         
          <td >
            </td>
          </tr>
		  
		    <?php 
			
			
		
$result13 = mysql_query("SELECT `stockid`, `bag`, `grswght`, `mandiwght`, `billwght`, `rot`, `rog`, `vale`, `vtou`, `bilvalue`, `remark`,stid ,w_per_bag,hsn
FROM `stock_ref` WHERE formid=$siid and tempid='A6'");

?>


      </table></td>
    </tr>
	
	

    <tr>
      <td><table width="100%" border="1"  align = "cemter">
        <tr align="center" style="background-color:#FFE1D2;">
          <th width="31%">ITEM Name </td>
		   <th width="7%">HSN CODE </td>
          <th width="7%">WEIGHT/BAG</td>
          <th width="9%">QUANTITY </td>
          <th width="14%">IN QTL </td>
          <th width="9%">RATE/BAG </td>
			<th  width="12%" align="center">TOTAL </td>
        </tr>
		
		
		
		  <?php

 $i = 1;
 $tbill = 0;
 $t_bags3 = 0;
 $t_qty33 = 0;

while($row13 = mysql_fetch_array($result13))

  {   $i = $i + 1; ?>

 <tr>

 
 
 <td  style="width:9%;"> <font  size = "1"><b> <?php  echo  $row13['stockid'] ?> </b>  </font> </td>      
  <td  style="width:9%;"> <?php  echo  $row13['hsn'] ?> </td>      
	     <td style="width:9%;"> <?php  echo  $row13['w_per_bag'] ?>  KG    </td> 
		 <td style="width:9%;"> <?php  echo  $row13['bag']  ?> Bags  </td> 
		    <td style="width:12%;"> <?php  echo number_format(round($row13['grswght'],2),2)   ?> </td> 
			   <td > <?php  echo   number_format(round($row13['rog'],2),2)    ?> </td> 
			      <td align = "right" > <?php  echo  number_format(round($row13['vale'],2),2)     ?> </td> 
 
 
</tr>

 <?php  
 $tbill = $tbill +  $row13['vale'];
  $t_bags3 =  $t_bags3 +  $row13['bag'];
  $t_qty33 = $t_qty33 + $row13['grswght'] ;


 }    ?>
 

    <?php 
   $count =$i;
   $roddd = 0;
   for($j=$count; $j<=8; $j++)
   {
	  $roddd = $roddd + 1; 
	  
   }
	  
	  
	    
   ?>
   

 
 <tr><td width="3%" > </td>  <td width="3%"> </td>  <td>   </td> <td>  </td>   <td>  </td> <td  align = "right">  </br> </td>


</tr>

<tr> <td>   </td> <td>   </td>    <td>  TOTAL   </td> <td> <?php echo   $t_bags3   ?>  Bags </td>    <td>   <?php echo  number_format(round($t_qty33,2),2)    ?>   </td>   <td>   </td>    <td  align = "right"> <?php  echo number_format(round($tbill,2),2)   ?>     </td>   </tr>


<tr>
<td colspan = "7"  align = "center"> 

<table  width = "100%" border = "1" style="font-weight:bold;"  >
<tr>   <td  colspan = "5" align = "center">  GST SUMMARY   </td> </tr>
<tr>  <td>  GST RATE </td>  <td>  SCGST  </td>  <td>  CGST  </td>   <td>  IGST  </td> <td>  Total GST </td> 



<?php   if($statetype == "1") {?>


<?php
 if($row['gst_5'] > 0) { ?>

<tr>  <td>  5% </td>  <td>  @2.5% -- <?php echo round($row['gst_5']/2,2)?>   </td>  <td>   @2.5% -- <?php echo round($row['gst_5']/2,2)?>  </td> <td>  @0% -- 0 </td>  <td> <?php echo $row['gst_5']?> </td>
<?php $all_t_tax = $all_t_tax + $row['gst_5'];  } ?>
<?php if($row['gst_12'] > 0) { ?>
<tr>  <td>  12% </td>  <td>  @6% -- <?php echo round($row['gst_12']/2,2)?>   </td>  <td>   @6% -- <?php echo round($row['gst_12']/2,2)?>  </td> <td>  @0% -- 0 </td>  <td> <?php echo $row['gst_12']?> </td>
<?php  $all_t_tax = $all_t_tax + $row['gst_12'];   } ?>
<?php if($row['gst_18'] > 0) { ?>
<tr>  <td>  18% </td>  <td>  @9% -- <?php echo round($row['gst_18']/2,2)?>   </td>  <td>   @9% -- <?php echo round($row['gst_18']/2,2)?>  </td> <td>  @0% -- 0 </td>  <td>  <?php echo $row['gst_18']?> </td>
<?php $all_t_tax = $all_t_tax + $row['gst_18'];  } ?>
<?php if($row['gst_28'] > 0) { ?>
<tr>  <td>  28% </td>  <td>  @14% -- <?php echo round($row['gst_28']/2,2)?>   </td>  <td>   @14% -- <?php echo round($row['gst_28']/2,2)?>  </td> <td>  @0% -- 0 </td>  <td>  <?php echo $row['gst_28']?> </td>
<?php $all_t_tax = $all_t_tax + $row['gst_28'];   } ?> 



<?php 
if($all_t_tax == 0) {

?>

<tr>  <td>  0% </td>  <td>  @0% -- <?php echo round($row['gst_0']/2,2)?>   </td>  <td>   @0% -- <?php echo round($row['gst_0']/2,2)?>  </td> <td>  @0% </td> <td>  0 </td>

<?php
}
?>
<?php  } ?>

<?php   if($statetype == "0") {?>


<?php
 if($row['gst_5'] > 0) { ?>

<tr>  <td>  5% </td>  <td>  @% -- 0   </td>  <td>   0% -- 0  </td> <td>  @5% <?php echo $row['gst_5']?> </td>  <td> <?php echo $row['gst_5']?> </td>
<?php $all_t_tax = $all_t_tax + $row['gst_5'];  } ?>
<?php if($row['gst_12'] > 0) { ?>
<tr>  <td>  12% </td>  <td>  0% -- 0 </td>  <td>   0% -- 0  </td> <td> @12%  <?php echo $row['gst_12']?> </td>  <td> <?php echo $row['gst_12']?> </td>
<?php  $all_t_tax = $all_t_tax + $row['gst_12'];   } ?>
<?php if($row['gst_18'] > 0) { ?>
<tr>  <td>  18% </td>  <td>  0% -- 0   </td>  <td>   0% -- 0  </td> <td> @18% <?php echo $row['gst_18']?> </td>  <td>  <?php echo $row['gst_18']?> </td>
<?php $all_t_tax = $all_t_tax + $row['gst_18'];  } ?>
<?php if($row['gst_28'] > 0) { ?>
<tr>  <td>  28% </td>  <td>  0% -- 0   </td>  <td>   0% -- 0  </td> <td> @28%  <?php echo $row['gst_28']?> </td>  <td>  <?php echo $row['gst_28']?> </td>
<?php $all_t_tax = $all_t_tax + $row['gst_28'];   } ?> 



<?php 
if($all_t_tax == 0) {

?>

<tr>  <td>  0% </td>  <td>  @0% -- <?php echo round($row['gst_0']/2,2)?>   </td>  <td>   @0% -- <?php echo round($row['gst_0']/2,2)?>  </td> <td>  @0% </td> <td>  0 </td>

<?php
}
?>
<?php  } ?>














</table>







  </td>
<tr> 

 <tr> <td align = "left" colspan = "3"  > <b><font size = "1"> NO EWAY BILL IS REQUIRED GOODS ARE EXEMPT AS PER RULE 138(14)  </font>  </b> </td> <td colspan = "4"  align = "right">  Total tax : <?php   echo $all_t_tax; ?>  </td>  </tr>




<tr>
<td colspan = "7"  align = "center"> 

<table  width = "100%" border = "1"  >

<tr>  <th> <font  size = "1">  TRANSPORT NAME  </font></th> <th> <font  size = "1"> GR NUMBER </font></th>  <th> <font  size = "1"> TRUCK  NUMBRE </font></th>  <th> <font  size = "1"> Freight Charge </font>  </th>  <th>  <font  size = "1"> Advance </font>   </th> <th> <font  size = "1"> FREIGHT TO PAY  </font> </th> 

<tr>  <td> <font  size = "1"> <?php    echo strtoupper($trans_name_ss) ?>  </font></td>  <td>  <?php    echo $billtyno ?></td>  <td>  <?php  echo  strtoupper($truckno) ?> </td>  <td>  <?php    echo $freighttotal ?> </td>  <td>   <?php    echo $freightadv ?>  </td> <td>  <?php    echo $freightpaid ?> </td> 




</table>


  </td>
<tr> 



 
 <tr>  <td  colspan = "6"  align = "right" > <?php echo $freight_valuee;

//echo  $tot_1;
 ?>:  </td>
 <td colspan = "1"  align = "right">   <?php echo  number_format(round($freight_receivable,2),2)    ?>  </td>    </tr>  

 
  <tr> <td  colspan = "2">  </td>  <td  colspan = "4"  align = "right">  NET TOTAL :  </td> <td colspan = "1"  align = "right">  
    <?php echo  number_format(round($tot_1,2),2)    ?>  </td>    </tr>  

 
 

<tr>  <td colspan = "11", align = "left"><b>Due Amount (in words):</b> <?php $abc=round($tot_1+$all_t_tax);
	
$cheque_amt = $abc ; 
try
    {
    echo convert_number($cheque_amt) ;
    }
catch(Exception $e)
    {
    echo $e->getMessage();
    }    

  
  ?>
   	
      
         	

  
  only . </td>    </tr> 

  
  

  </table>
  
  
  
  
  
  
	
	
	
</form>
</body>
</html>


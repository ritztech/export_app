<?php
session_start();
$fid=$_SESSION['fid'];
include('../conf.php');
$entrydate=date("d/m/Y");

?>


<?php


$salesiddd = trim(strip_tags(addslashes(strtoupper($_POST['salesiddd']))));


$result31_maxid_old = mysql_query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$mysql_database' AND TABLE_NAME = 'mandia6_bck' ");
$row31_maxid_o = mysql_fetch_array($result31_maxid_old);
$maxid_o = $row31_maxid_o['0'];


 


 

$qry1="INSERT INTO `stock_ref_bck`(`formid`, `stockid`, `bag`, `grswght`, `mandiwght`, `billwght`, `rot`, `rog`, `vale`, `vtou`, `bilvalue`, `remark`, `tempid`, `stid`, `party_date`, `fid`, `w_per_bag`, `hsn`) select * from stock_ref where formid = $salesiddd"; 

if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  $qry1="INSERT INTO `stock_ref_bck`(`formid`, `stockid`, `bag`, `grswght`, `mandiwght`, `billwght`, `rot`, `rog`, `vale`, `vtou`, `bilvalue`, `remark`, `tempid`, `stid`, `party_date`, `fid`, `w_per_bag`, `hsn`) SELECT $maxid_o, `stockid`, `bag`, `grswght`, `mandiwght`, `billwght`, `rot`, `rog`, `vale`, `vtou`, `bilvalue`, `remark`, `tempid`, `stid`, `party_date`, `fid`, `w_per_bag`, `hsn` FROM `stock_ref` WHERE `formid` = $salesiddd"; 

if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  
		
$qry1="DELETE FROM `stock_ref` WHERE `formid` = $salesiddd"; 

if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
   

$qry1="DELETE FROM `mandia6` WHERE `siid` = $salesiddd"; 

if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
   
				
	$contractnumber = trim(strip_tags(addslashes(strtoupper($_POST['contractnumber']))));
	$placesupply = trim(strip_tags(addslashes(strtoupper($_POST['placesupply']))));
	$freight_type = $_POST['freight_type'];
	$freight_receivable = $_POST['fr_amountttt'];
	$billno = trim(strip_tags(addslashes($_POST['billno'])));
    $saudadate = trim(strip_tags(addslashes($_POST['saudadate'])));
	$trid = trim(strip_tags(addslashes($_POST['transportname'])));
    $brkid = trim(strip_tags(addslashes($_POST['s2'])));
	$paymentterms = trim(strip_tags(addslashes($_POST['paymentterms'])));
    $truckno = trim(strip_tags(addslashes(strtoupper($_POST['truckno']))));
				
            $billtyno = trim(strip_tags(addslashes($_POST['billtyno'])));
			$billtydate = trim(strip_tags(addslashes($_POST['billtydate'])));
            $freighttotal = trim(strip_tags(addslashes($_POST['freighttotal'])));
            $freightadv = trim(strip_tags(addslashes($_POST['freightadv'])));
			$freightpaid = trim(strip_tags(addslashes($_POST['freightpaid'])));
			$brokerage_type = trim(strip_tags(addslashes($_POST['brokeragetype'])));
			$billtype = trim(strip_tags(addslashes($_POST['billtype'])));
			
			
			
			$drivernamee = trim(strip_tags(addslashes(strtoupper($_POST['drivernamee']))));
$delremarksss = trim(strip_tags(addslashes(strtoupper($_POST['delremarksss']))));
$destinationplace = trim(strip_tags(addslashes(strtoupper($_POST['destinationplace']))));
			
			
			
			$totbag = trim(strip_tags(addslashes($_POST['totbag'])));
			$totgrsweight = trim(strip_tags(addslashes($_POST['totgrsweight'])));
			$totmandi = trim(strip_tags(addslashes($_POST['totmandi'])));
			$totbilwght = trim(strip_tags(addslashes($_POST['totbilwght'])));
			$totrot = trim(strip_tags(addslashes($_POST['totrot'])));
			$totrog = trim(strip_tags(addslashes($_POST['totrog'])));
			$totvalue = trim(strip_tags(addslashes($_POST['totvalue'])));
			$totvto = trim(strip_tags(addslashes($_POST['totvto'])));
			
			$totbillv = trim(strip_tags(addslashes($_POST['totbillv'])));
					
			$supplierid = trim(strip_tags(addslashes($_POST['consigneeid'])));
			$shippartyidd = trim(strip_tags(addslashes($_POST['shippartyidd'])));
					
  

$j = $_POST['totalcnt'];


$gst_0=0;
$gst_5=0;
$gst_12=0;
$gst_18=0;
$gst_28=0;
 
for($i=2; $i <= $j; $i++) {

$tax_per = $_POST['rattax'.$i];
$vat_z_amt =  $_POST['valuetaxout'.$i];

if($tax_per == ""){$tax_per = 0;}
if($vat_z_amt == ""){$vat_z_amt = 0;}



if($tax_per == "0") {$gst_0 = $gst_0 + $vat_z_amt;}
if($tax_per == "5") {$gst_5 = $gst_5 + $vat_z_amt;}
if($tax_per == "12") {$gst_12 = $gst_12 + $vat_z_amt;}
if($tax_per == "18") {$gst_18 = $gst_18 + $vat_z_amt;}
if($tax_per == "28") {$gst_28 = $gst_28 + $vat_z_amt;}

} 
  
  
$result31_maxid = mysql_query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$mysql_database' AND TABLE_NAME = 'mandia6' ");
$row31_maxid = mysql_fetch_array($result31_maxid);
$maxid = $row31_maxid['0'];

  
 
$qry="INSERT INTO `mandia6`(`fid`, `billno`, `date`, `paymentterms`, `truckno`, `billtyno`,`freighttotal`, `freightadv`, `freightpaid`, `billtydate`, `bag1`, `grossweight2`,`mandigatepass1`, `billweight`, `rateoftax1`, `rateofgoods1`, `value1`, `vattax1`,`billvalue1`, `supid`, `brkid`, `trid`, `brokerage_type`, `contractnumber`,`freight_type`, `freight_receivable`, `gst_0`, `gst_5`, `gst_12`, `gst_18`, `gst_28`,`billtype`, `placesupply`, `shippid`,drivername,destinationplace,delremarksss) 
VALUES ('$fid','$billno',STR_TO_DATE('$saudadate','%d/%m/%Y'),'$paymentterms','$truckno','$billtyno','$freighttotal','$freightadv','$freightpaid',STR_TO_DATE('$billtydate','%d/%m/%Y'),'$totbag','$totgrsweight','$totmandi','$totbilwght','$totrot','$totrog','$totvalue','$totvto','$totbillv','$supplierid','$brkid','$trid','$brokerage_type','$contractnumber','$freight_type','$freight_receivable','$gst_0','$gst_5','$gst_12','$gst_18','$gst_28','$billtype','$placesupply','$shippartyidd','$drivernamee','$destinationplace','$delremarksss')";

$qry = str_replace("''", "'0'", $qry);

       if (!mysql_query($qry,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  
 
  
  
//header("Location: goodsreciept_view.php");

       	
$n_s_i_d = $maxid;

$j = $_POST['totalcnt'];



for($i=2; $i <= $j; $i++) {

$tax_per = $_POST['rattax'.$i];
$vat_z_amt =  $_POST['valuetaxout'.$i];

if($tax_per == ""){$tax_per = 0;}
if($vat_z_amt == ""){$vat_z_amt = 0;}



if($tax_per == "0") {$gst_0 = $gst_0 + $vat_z_amt;}
if($tax_per == "5") {$gst_5 = $gst_5 + $vat_z_amt;}
if($tax_per == "12") {$gst_12 = $gst_12 + $vat_z_amt;}
if($tax_per == "18") {$gst_18 = $gst_18 + $vat_z_amt;}
if($tax_per == "28") {$gst_28 = $gst_28 + $vat_z_amt;}



$item = trim(strip_tags(addslashes(strtoupper($_POST['stkname'.$i]))));
$hsncode = trim(strip_tags(addslashes(strtoupper($_POST['hsncode'.$i]))));
$i_detailsss = trim(strip_tags(addslashes(strtoupper($_POST['i_detailsss'.$i]))));
$stid1 = trim(strip_tags(addslashes(strtoupper($_POST['item'.$i]))));
$remark_1 = trim(strip_tags(addslashes(strtoupper($_POST['remark'.$i]))));


$qry1="INSERT INTO stock_ref(formid, stockid, bag, grswght, mandiwght, billwght, rot, rog, vale, vtou, bilvalue,remark,tempid,stid,party_date,fid,w_per_bag,hsn)
VALUES ('$maxid','$item','{$_POST['bagg'.$i]}','{$_POST['grsweight'.$i]}','{$_POST['mandiwght'.$i]}','{$_POST['billwght'.$i]}',
        '{$_POST['rattax'.$i]}','{$_POST['ratgoods'.$i]}','{$_POST['itvalue'.$i]}','{$_POST['valuetaxout'.$i]}',
		'{$_POST['billvalue'.$i]}','$remark_1','A6','$stid1',STR_TO_DATE('$saudadate','%d/%m/%Y'),'$fid','{$_POST['w_per_bag'.$i]}','$hsncode')";
		

$qry1 = str_replace("''", "'0'", $qry1);
		
		//	echo $qry1;


			if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  

	   
}




  
  

 echo "<script>alert('Data Successfully Inserted');location.href='sales_view.php?siid=$n_s_i_d'</script>";
 




?>


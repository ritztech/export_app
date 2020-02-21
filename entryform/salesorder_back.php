<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }
$fid=$_SESSION['fid'];
include('../conf.php');
$entrydate=date("d/m/Y");


?>
 


<?php
	if(isset($_POST['s']))
		{
			$suppliername = trim(strip_tags(addslashes($_POST['suppliername'])));
            $brkid = trim(strip_tags(addslashes($_POST['brokername'])));
			
			 $brokername = trim(strip_tags(addslashes($_POST['brk1'])));
			
			
			
			
			
            $moisture = trim(strip_tags(addslashes($_POST['moisture'])));
            $dust = trim(strip_tags(addslashes($_POST['dust'])));
            $smallseed = trim(strip_tags(addslashes($_POST['smallseed'])));
            $splitseed = trim(strip_tags(addslashes($_POST['splitseed'])));
            $oil = trim(strip_tags(addslashes($_POST['oil'])));
            $quantity = trim(strip_tags(addslashes($_POST['quantity'])));
            $bag = trim(strip_tags(addslashes($_POST['bag'])));
            $packingterms = trim(strip_tags(addslashes($_POST['packingterms'])));
            $bagquality = trim(strip_tags(addslashes($_POST['bagquality'])));
            $rate = trim(strip_tags(addslashes($_POST['rate'])));
            $deleveryduedate = trim(strip_tags(addslashes($_POST['deleveryduedate'])));
            $paymentterms = trim(strip_tags(addslashes($_POST['paymentterms'])));
            $cashdcond = trim(strip_tags(addslashes($_POST['cashdcond'])));
            $modeofsupply = trim(strip_tags(addslashes($_POST['modeofsupply'])));
            $saudadate = trim(strip_tags(addslashes($_POST['saudadate'])));
            $stfcondition = trim(strip_tags(addslashes($_POST['stfcondition'])));
            $mtfcondition = trim(strip_tags(addslashes($_POST['mtfcondition'])));
            $etfcondition = trim(strip_tags(addslashes($_POST['etfcondition'])));
			$saudashort = trim(strip_tags(addslashes($_POST['saudashort'])));
            $loadedfinal = trim(strip_tags(addslashes($_POST['loadedfinal'])));
			
			$totbag =  $_POST['totbag'];
              $totgrsweight =  $_POST['totgrsweight'];
              $totmandi =  $_POST['totmandi'];
              $totbilwght =  $_POST['totbilwght'];
              $totrot =  $_POST['totrot'];
              $totrog =  $_POST['totrog'];
              $totvalue =  $_POST['totvalue'];
              $totvto =  $_POST['totvto'];
              $totbillv =  $_POST['totbillv'];
			
			
			$result1 = mysql_query("SELECT 	leg_name from ledger_master  where legid = $suppliername");
$row1 = mysql_fetch_array($result1);

$p_name = $row1[0];


			
$qry="INSERT INTO mandia5 (supid,brokername,moisture,dust,smallseed,splitseed,oil,quantity,
bag,packingterms,bagquality,rate,deleveryduedate,paymentterms,cashdcond,modeofsupply,saudadate,
stfcondition,mtfcondition,etfcondition,fid,saudashort,loadedfinal,entrydate,suppliername,bag1,
 grossweight1, mandigatepass1, billweight, rateoftax1, rateofgoods1, value1, vattax1, billvalue1,brkid)
 VALUES ('$suppliername','$brokername','$moisture','$dust','$smallseed','$splitseed','$oil','$quantity',
'$bag','$packingterms','$bagquality','$rate',STR_TO_DATE('$deleveryduedate','%d/%m/%Y'),'$paymentterms','$cashdcond','$modeofsupply'
,STR_TO_DATE('$saudadate','%d/%m/%Y'),'$stfcondition','$mtfcondition','$etfcondition','$fid'
,'$saudashort','$loadedfinal',STR_TO_DATE('$entrydate','%d/%m/%Y'),'$p_name','$totbag','$totgrsweight','$totmandi',
'$totbilwght','$totrot','$totrog','$totvalue','$totvto','$totbillv',$brkid)";

       //	$qry = mysql_query();
	//echo $qry;
       if (!mysql_query($qry,$connection))
  {
  die('Error: ' . mysql_error());
  }
//header("Location: purchaseorder_front.php");

 echo "<script>alert('Data Sucessfully Inserted.');location.href='salesorder_front.php'</script>";



 $result1 = mysql_query("SELECT max(soid) from mandia5");

$row1 = mysql_fetch_array($result1);

//echo $row1[0]; 

$j = $_POST['totalcnt'];


for($i=2; $i <= $j; $i++) {

$item = trim(strip_tags(addslashes(strtoupper($_POST['stkname'.$i]))));
$stid1 = trim(strip_tags(addslashes(strtoupper($_POST['item'.$i]))));

    $qry1="INSERT INTO stock_ref(formid, stockid, bag, grswght, mandiwght, billwght, rot, rog, vale, vtou, bilvalue,remark,tempid,stid,party_name,party_date,fid,w_per_bag)
VALUES ($row1[0],'$item','{$_POST['bagg'.$i]}','{$_POST['grsweight'.$i]}','{$_POST['mandiwght'.$i]}','{$_POST['billwght'.$i]}',
        '{$_POST['rattax'.$i]}','{$_POST['ratgoods'.$i]}','{$_POST['itvalue'.$i]}','{$_POST['valuetaxout'.$i]}',
		'{$_POST['billvalue'.$i]}','{$_POST['remark'.$i]}','A5',$stid1,'$p_name',STR_TO_DATE('$saudadate','%d/%m/%Y'),$fid,'{$_POST['w_per_bag'.$i]}')";
		
	//echo $qry1;
			if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	  echo "<script>alert('Data Successfully Inserted');location.href='salesorder_front.php'</script>";
	  
	  
  }
}
}

?>

 
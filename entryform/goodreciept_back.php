<?php
session_start();
$fid=$_SESSION['fid'];
//echo $fid;
?>
<?php
	include('../conf.php');
	?>

<?php 
$entrydate=date("d/m/Y");
?>
<?php
	if(isset($_POST['s']))
		{
			$suppliername = trim(strip_tags(addslashes($_POST['suppliername'])));
            $brokername = trim(strip_tags(addslashes($_POST['brokername'])));
			
			$brkid = trim(strip_tags(addslashes($_POST['s2'])));
			
			
            $moisture = trim(strip_tags(addslashes($_POST['moisture'])));
            $dust = trim(strip_tags(addslashes($_POST['dust'])));
            $smallseed = trim(strip_tags(addslashes($_POST['smallseed'])));
            $splitseed = trim(strip_tags(addslashes($_POST['splitseed'])));
            $oil = trim(strip_tags(addslashes($_POST['oil'])));
            $quantity = trim(strip_tags(addslashes($_POST['quantity'])));
            $bag = trim(strip_tags(addslashes($_POST['bag'])));
            $bagquality = trim(strip_tags(addslashes($_POST['bagquality'])));
			$packingbag = trim(strip_tags(addslashes($_POST['packingbag'])));
            $recieptweight = trim(strip_tags(addslashes($_POST['recieptweight'])));
            $modeofsupply = trim(strip_tags(addslashes($_POST['modeofsupply'])));
            $vehiclenumber = trim(strip_tags(addslashes($_POST['vehiclenumber'])));
            $supervisiorname = trim(strip_tags(addslashes($_POST['supervisiorname'])));
            $billno = trim(strip_tags(addslashes($_POST['billno'])));
            $gatepassno = trim(strip_tags(addslashes($_POST['gatepassno'])));
            $form10 = trim(strip_tags(addslashes($_POST['form10'])));
            $billtyno = trim(strip_tags(addslashes($_POST['billtyno'])));
            $frieght = trim(strip_tags(addslashes($_POST['frieght'])));
            $remark = trim(strip_tags(addslashes($_POST['remark'])));
			$poid = trim(strip_tags(addslashes($_POST['poid'])));
			
			$transname = trim(strip_tags(addslashes($_POST['transportername'])));
						$transportername = trim(strip_tags(addslashes($_POST['transname'])));
			
			$dateofbillty = trim(strip_tags(addslashes($_POST['dateofbillty'])));
			$advance = trim(strip_tags(addslashes($_POST['advance'])));
			$payble = trim(strip_tags(addslashes($_POST['payble'])));
			$weightbridgename = trim(strip_tags(addslashes($_POST['weightbridgename'])));
			$weightdate = trim(strip_tags(addslashes($_POST['weightdate'])));
			$kantano = trim(strip_tags(addslashes($_POST['kantano'])));
			$unit = trim(strip_tags(addslashes($_POST['unit'])));
			$grossweight1 = trim(strip_tags(addslashes($_POST['grossweight1'])));
			$netweight1 = trim(strip_tags(addslashes($_POST['netweight1'])));
			$tareweight = trim(strip_tags(addslashes($_POST['tareweight'])));
			$totbag =  $_POST['totbag'];
              $totgrsweight =  $_POST['totgrsweight'];
              $totmandi =  $_POST['totmandi'];
              $totbilwght =  $_POST['totbilwght'];
              $totrot =  $_POST['totrot'];
              $totrog =  $_POST['totrog'];
              $totvalue =  $_POST['totvalue'];
              $totvto =  $_POST['totvto'];
              $totbillv =  $_POST['totbillv'];
			  $suppid =  $_POST['suppid'];
			  
			


$result1 = mysql_query("SELECT 	leg_name from ledger_master  where legid = $suppid");
$row1 = mysql_fetch_array($result1);

$p_name = $row1[0];
			
			  
			
$qry="INSERT INTO goodrecieptsnote (suppliername,brokername,moisture,dust,smallseed,splitseed,oil,quantity,
bag,packingbag,recieptweight,bagquality,modeofsupply,vehiclenumber,supervisiorname,billno,gatepassno,
form10,billtyno,frieght,remark,fid,entrydate,poid,transportername,dateofbillty,advance,payble,weightbridgename,weightdate,kantano,unit,grossweight1,netweight1,bag1,
 grossweight2, mandigatepass1, billweight, rateoftax1, rateofgoods1, value1, vattax1, billvalue1,suppid,brkid,transname)
 VALUES ('$p_name','$brokername','$moisture','$dust','$smallseed','$splitseed','$oil','$quantity',
'$bag','$packingbag','$recieptweight','$bagquality','$modeofsupply','$vehiclenumber','$supervisiorname','$billno','$gatepassno','$form10','$billtyno','$frieght','$remark','$fid',STR_TO_DATE('$entrydate','%d/%m/%Y'),'$poid','$transportername',
STR_TO_DATE('$dateofbillty','%d/%m/%Y'),'$advance','$payble','$weightbridgename',STR_TO_DATE('$weightdate','%d/%m/%Y'),'$kantano','$unit','$grossweight1',
'$netweight1',$totbag,$totgrsweight,$totmandi,$totbilwght,$totrot,$totrog,$totvalue,$totvto,$totbillv,$suppid,$brkid,$transname)";





       //	$qry = mysql_query();
	 //echo $qry;
       if (!mysql_query($qry,$connection))
  {
  die('Error: ' . mysql_error());
  }
//header("Location: goodsreciept_view.php");

echo "<script>alert('Data Sucessfully Inserted.');location.href='goodsreciept_front.php'</script>";

        }
		
		
 $result1 = mysql_query("SELECT max(grid) from goodrecieptsnote");

$row1 = mysql_fetch_array($result1);

//echo $row1[0]; 

$j = $_POST['totalcnt'];


for($i=2; $i <= $j; $i++) {
	
	$item = trim(strip_tags(addslashes(strtoupper($_POST['stkname'.$i]))));
$stid1 = trim(strip_tags(addslashes(strtoupper($_POST['item'.$i]))));

    $qry1="INSERT INTO stock_ref(formid, stockid, bag, grswght, mandiwght, billwght, rot, rog, vale, vtou, bilvalue,remark,tempid,stid,party_name,party_date,fid,w_per_bag)
VALUES ($row1[0],'$item',{$_POST['bagg'.$i]},{$_POST['grsweight'.$i]},{$_POST['mandiwght'.$i]},{$_POST['billwght'.$i]},
        {$_POST['rattax'.$i]},{$_POST['ratgoods'.$i]},{$_POST['itvalue'.$i]},{$_POST['valuetaxout'.$i]},{$_POST['billvalue'.$i]},
		'{$_POST['remark'.$i]}','A2',$stid1,'$p_name',STR_TO_DATE('$weightdate','%d/%m/%Y'),$fid,'{$_POST['w_per_bag'.$i]}')";
		
	//echo $qry1;
			if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	  echo "<script>alert('Data Successfully Inserted');location.href='goodsreciept_front.php'</script>";
	  
	  
  }

        
}


?>

 
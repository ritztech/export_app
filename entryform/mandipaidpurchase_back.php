<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}
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
			  
	
			$brokerage_type = trim(strip_tags(addslashes($_POST['brokeragetype']))); 
			
			$ledgername_n = trim(strip_tags(addslashes($_POST['ledgername_n'])));    
			$suppid = trim(strip_tags(addslashes($_POST['province'])));  
		//	$partyname = trim(strip_tags(addslashes($_POST['partyname'])));
            $billno = trim(strip_tags(addslashes($_POST['billno'])));
            $date = trim(strip_tags(addslashes($_POST['date'])));
            $bag = trim(strip_tags(addslashes($_POST['bag'])));
            $packing = trim(strip_tags(addslashes($_POST['packing'])));
            $grossweight = trim(strip_tags(addslashes($_POST['grossweight'])));
            $netweight = trim(strip_tags(addslashes($_POST['netweight'])));
            $salestaxform = trim(strip_tags(addslashes($_POST['salestaxform'])));
            $manditaxform = trim(strip_tags(addslashes($_POST['manditaxform'])));
            $entrytaxform = trim(strip_tags(addslashes($_POST['entrytaxform'])));
            $transportername = trim(strip_tags(addslashes($_POST['trkname'])));
			
			 $trkid = trim(strip_tags(addslashes($_POST['transportername'])));
			
			




            $crosingtname = trim(strip_tags(addslashes($_POST['crosingtname'])));
            $brokername = trim(strip_tags(addslashes($_POST['brokername'])));
            $paymentterms = trim(strip_tags(addslashes($_POST['paymentterms'])));
            $mandigatepass = trim(strip_tags(addslashes($_POST['mandigatepass'])));
            $mandisamiti = trim(strip_tags(addslashes($_POST['mandisamiti'])));
             $truckno = trim(strip_tags(addslashes($_POST['truckno'])));
            $otherdoc = trim(strip_tags(addslashes($_POST['otherdoc'])));
			 $poid = trim(strip_tags(addslashes($_POST['poid1'])));
			  $totbag =  $_POST['totbag'];
              $totgrsweight =  $_POST['totgrsweight'];
              $totmandi =  $_POST['totmandi'];
              $totbilwght =  $_POST['totbilwght'];
              $totrot =  $_POST['totrot'];
              $totrog =  $_POST['totrog'];
              $totvalue =  $_POST['totvalue'];
              $totvto =  $_POST['totvto'];
              $totbillv =  $_POST['totbillv'];
			 $transactiondate = trim(strip_tags(addslashes($_POST['transactiondate'])));
			 $duedate = trim(strip_tags(addslashes($_POST['duedate'])));
			 $billtydate = trim(strip_tags(addslashes($_POST['billtydate'])));
			 $billtyno = trim(strip_tags(addslashes($_POST['billtyno'])));
			 $totalfreight = trim(strip_tags(addslashes($_POST['totalfreight'])));
			 $advance = trim(strip_tags(addslashes($_POST['advance'])));
			 $payble = trim(strip_tags(addslashes($_POST['payble'])));
			 $add1 = trim(strip_tags(addslashes($_POST['add1'])));
			 $less1 = trim(strip_tags(addslashes($_POST['less1'])));
			 $remark1 = trim(strip_tags(addslashes($_POST['remark1'])));
			 $remarkless=trim(strip_tags(addslashes($_POST['remarkless'])));
			 $value2 = trim(strip_tags(addslashes($_POST['value2'])));
			  $ledgername = trim(strip_tags(addslashes($_POST['ledgername'])));
			   $brkid = trim(strip_tags(addslashes($_POST['s2'])));
			 
		}
		
		

$result1 = mysql_query("SELECT 	leg_name from ledger_master  where legid = $suppid");
$row1 = mysql_fetch_array($result1);

$p_name = $row1[0];
		
	
		
           
$qry="INSERT INTO mandia4(partyname,billno,date,bag,packing,grossweight,netweight,salestaxform,manditaxform,entrytaxform,transportername,
 crosingtname,brokername,paymentterms,mandigatepass,mandisamiti,truckno,otherdoc,fid,entrydate,poid,bag1,
 grossweight1,mandigatepass1,billweight,rateoftax1,rateofgoods1,value1,vattax1,billvalue1,transactiondate,duedate,billtydate,
 billtyno,totalfreight,advance,payble,add1,less1,remark1,value2,remarkless,ledgername,suppid,ledgername_n,brkid,trkid,brokerage_type) 
 VALUES('$p_name','$billno',STR_TO_DATE('$date','%d/%m/%Y'),'$bag','$packing','$grossweight','$netweight','$salestaxform',
 '$manditaxform','$entrytaxform','$transportername','$crosingtname','$brokername','$paymentterms','$mandigatepass','$mandisamiti', '$truckno','$otherdoc','$fid',STR_TO_DATE('$entrydate','%d/%m/%Y'),
 '$poid','$totbag','$totgrsweight','$totmandi','$totbilwght','$totrot','$totrog','$totvalue','$totvto','$totbillv',STR_TO_DATE('$transactiondate','%d/%m/%Y'), STR_TO_DATE('$duedate','%d/%m/%Y'),STR_TO_DATE('$billtydate','%d/%m/%Y'),
 '$billtyno','$totalfreight','$advance','$payble','$add1','$less1','$remark1','$value2','$remarkless','$ledgername_n','$suppid','$ledgername',$brkid,$trkid,'$brokerage_type')";

      
//echo $qry;


 // sudhir
 
 
 
	if (!mysql_query($qry,$connection))
  {
  die('Error: ' . mysql_error());
  }

  
  $qry="INSERT INTO `max_rec`(`bno`, `date`, `fid`) VALUES 
('$billno',STR_TO_DATE('$date','%d/%m/%Y'),$fid)";
 
	if (!mysql_query($qry,$connection))
  {
  die('Error: ' . mysql_error());
  }




 $result1 = mysql_query("SELECT max(a4id) from mandia4");

$row1 = mysql_fetch_array($result1);

//echo $row1[0]; 

$j = $_POST['totalcnt'];


for($i=2; $i <= $j; $i++) {


$item = trim(strip_tags(addslashes(strtoupper($_POST['stkname'.$i]))));
$stid1 = trim(strip_tags(addslashes(strtoupper($_POST['item'.$i]))));


    $qry1="INSERT INTO stock_ref(formid, stockid, bag, grswght, mandiwght, billwght, rot, rog, vale, vtou, bilvalue,remark,tempid,stid,party_name,party_date,fid,w_per_bag)
VALUES ('$row1[0]','$item','{$_POST['bagg'.$i]}','{$_POST['grsweight'.$i]}','{$_POST['mandiwght'.$i]}',
'{$_POST['billwght'.$i]}','{$_POST['rattax'.$i]}','{$_POST['ratgoods'.$i]}','{$_POST['itvalue'.$i]}',
'{$_POST['valuetaxout'.$i]}','{$_POST['billvalue'.$i]}','{$_POST['remark'.$i]}','A4',$stid1,'$p_name',STR_TO_DATE('$date','%d/%m/%Y'),$fid,'{$_POST['w_per_bag'.$i]}')";
		
	//echo $qry1;
			if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	  echo "<script>alert('Data Successfully Inserted');location.href='mandipaidpurchase_front.php'</script>";
	  
	  
  }

        
}



//sudhir
?>

 
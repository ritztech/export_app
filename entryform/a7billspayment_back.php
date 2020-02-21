<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }
$fid=$_SESSION['fid'];
?>
<?php
	include('../conf.php');
	$entrydate=date("d/m/Y");
?>
<?php
	if(isset($_POST['s']))
		{
			$province = trim(strip_tags(addslashes($_POST['province'])));
			$district= trim(strip_tags(addslashes($_POST['district'])));
			$suppliername = trim(strip_tags(addslashes($_POST['suppliername'])));
            $type = trim(strip_tags(addslashes($_POST['type'])));
            $tamount = trim(strip_tags(addslashes($_POST['tamount'])));
            $tbcharges = trim(strip_tags(addslashes($_POST['tbcharges'])));
            $tbtotal = trim(strip_tags(addslashes($_POST['tbtotal'])));
            
			$saudadate = trim(strip_tags(addslashes($_POST['saudadate'])));
			
			
	$result111 = mysql_query("SELECT 	leg_name from ledger_master  where legid = $province ");

      $row111 = mysql_fetch_array($result111);
	  
			
$qry="INSERT INTO mandia7 (supid,a4id,suppliername,type,amount,bankcharges,total,entrydate,fid,saudadate)
 VALUES ('$province','$district','$row111[0]','$type','$tamount','$tbcharges','$tbtotal'
 ,STR_TO_DATE('$entrydate','%d/%m/%Y'),'$fid',STR_TO_DATE('$saudadate','%d/%m/%Y'))";

       //	$qry = mysql_query();
	//echo $qry;
       if (!mysql_query($qry,$connection))
  {
  die('Error: ' . mysql_error());
  }


 $result1 = mysql_query("SELECT max(billid) from mandia7");

$row1 = mysql_fetch_array($result1);

//echo $row1[0]; 

$j = $_POST['totalcnt'];


for($i=2; $i <= $j; $i++) {
	
	
	 $result11 = mysql_query("SELECT 	leg_name from ledger_master  where legid = '{$_POST['bname'.$i]}'");

      $row11 = mysql_fetch_array($result11);
	
	
	
    $qry1="INSERT INTO mandia7_ref(bankname,formid,branch,chequeno,amount,bankcharges,total,modeofpay,remark,tempid,ledger_id)
VALUES ('$row11[0]','$row1[0]','{$_POST['bbranch'.$i]}','{$_POST['chkno'.$i]}','{$_POST['amount'.$i]}','{$_POST['bcharges'.$i]}','{$_POST['btotal'.$i]}','{$_POST['modepay'.$i]}','{$_POST['bremark'.$i]}','A7','{$_POST['bname'.$i]}')";

	
	//echo $qry1;
			if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	  echo "<script>alert('Data Successfully Inserted');location.href='a7billspayment_front.php'</script>";
	  
	  
  }

        
}



 

        }

?>

 
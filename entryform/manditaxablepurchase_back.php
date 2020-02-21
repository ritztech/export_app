<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }
$fid=$_SESSION['fid'];

?>

<?php 
$entrydate=date("d/m/Y");
?>
<?php
	include('../conf.php');
	if(isset($_POST['s']))
		{
			$ledgername_n = trim(strip_tags(addslashes($_POST['ledgername_n'])));
			$paymentno = trim(strip_tags(addslashes($_POST['paymentno'])));
            $paymentdate= trim(strip_tags(addslashes($_POST['paymentdate'])));
			$contact = trim(strip_tags(addslashes($_POST['contact'])));
            $farmername = trim(strip_tags(addslashes($_POST['farmername'])));
            $surname = trim(strip_tags(addslashes($_POST['surname'])));          
            $villagename = trim(strip_tags(addslashes($_POST['villagename'])));
            $stockitem = trim(strip_tags(addslashes($_POST['stkid'])));
            $estimateqty = trim(strip_tags(addslashes($_POST['estimateqty'])));
            $purchaseqtl = trim(strip_tags(addslashes($_POST['purchaseqtl'])));
            $rate = trim(strip_tags(addslashes($_POST['rate'])));
			$hammali= trim(strip_tags(addslashes($_POST['hammali'])));
			$hdenometer = trim(strip_tags(addslashes($_POST['hdenometer'])));
			$alock = trim(strip_tags(addslashes($_POST['alock'])));
			$ledgername = trim(strip_tags(addslashes($_POST['ledgername'])));
			
			$stkid = trim(strip_tags(addslashes($_POST['stockitem'])));
			
			
		}
		$qry="INSERT INTO manditaxablepurchase (paymentno,paymentdate,contact,
		farmername,surname,villagename,stockitem,estimateqty,purchaseqtl,rate,hammali,hdenometer,alock,entrydate,fid,ledgername,ledgername_n,stkid) 
		VALUES('$paymentno',STR_TO_DATE('$paymentdate','%d/%m/%Y'),'$contact','$farmername','$surname','$villagename','$stockitem','$estimateqty','$purchaseqtl','$rate','$hammali','$hdenometer','$alock',STR_TO_DATE('$entrydate','%d/%m/%Y'),'$fid','$ledgername_n','$ledgername',$stkid)";

    // echo $qry;
	
	


	if (!mysql_query($qry,$connection))
  {
 die('Error: ' . mysql_error());
  }

         $qry="INSERT INTO `max_rec`(`bno`, `date`, `fid`) VALUES 
('$paymentno',STR_TO_DATE('$paymentdate','%d/%m/%Y'),$fid)";
 
	if (!mysql_query($qry,$connection))
  {
  die('Error: ' . mysql_error());
  }




  

echo "<script>alert('Data Successfully Inserted');location.href='manditaxablepurchase_front.php'</script>";

?>

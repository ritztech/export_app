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
            $stockitem = trim(strip_tags(addslashes($_POST['stockitem'])));
            $bag = trim(strip_tags(addslashes($_POST['bag'])));
            $stockopening = trim(strip_tags(addslashes($_POST['stockopening'])));
            $stockgatepass = trim(strip_tags(addslashes($_POST['stockgatepass'])));
            $netqty = trim(strip_tags(addslashes($_POST['netqty'])));
            $grossqty = trim(strip_tags(addslashes($_POST['grossqty'])));
            $value = trim(strip_tags(addslashes($_POST['value'])));
            $transportername = trim(strip_tags(addslashes($_POST['transportername'])));
            $truckno = trim(strip_tags(addslashes($_POST['truckno'])));
            $drivername = trim(strip_tags(addslashes($_POST['drivername'])));
            $mtaxrecieptno = trim(strip_tags(addslashes($_POST['mtaxrecieptno'])));
            $declaration = trim(strip_tags(addslashes($_POST['declaration'])));
            $status = trim(strip_tags(addslashes($_POST['status'])));
			$applicationdate = trim(strip_tags(addslashes($_POST['applicationdate'])));
			$balance = trim(strip_tags(addslashes($_POST['balance'])));
			
			$ledgername_n = trim(strip_tags(addslashes($_POST['ledgername_n'])));
			
			
			
	$result1 = mysql_query("SELECT 	leg_name from ledger_master  where legid = $suppliername");
$row1 = mysql_fetch_array($result1);



			
			
$qry="INSERT INTO mandia11 (suppliername,stockitem,stockopening,stockgatepass,bag,netqty,grossqty,value,transportername,truckno,drivername,mtaxrecieptno,declaration,status,applicationdate,fid,entrydate,balance,ledgername_n)
 VALUES ( '$row1[0]','$stockitem','$stockopening','$stockgatepass','$bag','$netqty','$grossqty','$value'
,'$transportername','$truckno','$drivername','$mtaxrecieptno','$declaration','$status',STR_TO_DATE('$applicationdate','%d/%m/%Y'),'$fid',STR_TO_DATE('$entrydate','%d/%m/%Y'),'$balance','$suppliername')";

       //	$qry = mysql_query();
	// echo $qry;
       if (!mysql_query($qry,$connection))
  {
  die('Error: ' . mysql_error());
  }
//header("Location: goodsreciept_view.php");

// $result1 = mysql_query("SELECT max(mfid) from mandia11");

//$row1 = mysql_fetch_array($result1);
//$mfid=$row1[0];


$result1 = mysql_query("SELECT max(mfid) from mandia11");
$row1 = mysql_fetch_array($result1);


//echo $row1[0];



echo "<script>alert('Data Sucessfully Inserted.');location.href='a11report.php?mfid=$row1[0]'</script>";








        }

?>

 
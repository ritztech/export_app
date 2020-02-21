<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }
$fid=$_SESSION['fid'];
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
			$m1 = trim(strip_tags(addslashes($_POST['m1'])));
            $m2= trim(strip_tags(addslashes($_POST['m2'])));
          //  $m3 = trim(strip_tags(addslashes($_POST['m3'])));
            $m4 = trim(strip_tags(addslashes($_POST['m4'])));
            $m5 = trim(strip_tags(addslashes($_POST['m5'])));
            $m6 = trim(strip_tags(addslashes($_POST['m6'])));
            $m7 = trim(strip_tags(addslashes($_POST['m7'])));
            $m8 = trim(strip_tags(addslashes($_POST['m8'])));
             $n1 = trim(strip_tags(addslashes($_POST['n1'])));
            $n2 = trim(strip_tags(addslashes($_POST['n2'])));
            $n3 = trim(strip_tags(addslashes($_POST['n3'])));
            $n4 = trim(strip_tags(addslashes($_POST['n4'])));
            $n5 = trim(strip_tags(addslashes($_POST['n5'])));
            $n6 = trim(strip_tags(addslashes($_POST['n6'])));
            $n7 = trim(strip_tags(addslashes($_POST['n7'])));
           // $n8 = trim(strip_tags(addslashes($_POST['n8'])));
			$qtotal = trim(strip_tags(addslashes($_POST['qtotal'])));
            $amtotal = trim(strip_tags(addslashes($_POST['amtotal'])));
            $ratetotal = trim(strip_tags(addslashes($_POST['ratetotal'])));
			 $ledgername_m = trim(strip_tags(addslashes($_POST['ledgername_m'])));
			 $ledgername_n = trim(strip_tags(addslashes($_POST['ledgername_n'])));

		
$qry="INSERT INTO mandia12m (fid,entrydate,taxtype,srno,recieptdate, deposittax,paymentmode,chequeno,bankname,chequedate,qtotal,amtotal,ratetotal,ledgername_n)
 VALUES ($fid,STR_TO_DATE('$entrydate','%d/%m/%Y'),'$m1','$m2',STR_TO_DATE('$n3','%d/%m/%Y'),'$m4','$m5','$m6','$ledgername_m',STR_TO_DATE('$m8','%d/%m/%Y'),'$qtotal','$amtotal','$ratetotal','$m7')";
	 
	 
 if (!mysql_query($qry,$connection))
  {
  die('Error: ' . mysql_error());
  }

   
    $qry1="INSERT INTO mandia12n (fid,entrydate,taxtype,srno,recieptdate, deposittax,paymentmode,chequeno,bankname,chequedate,qtotal,amtotal,ratetotal,ledgername_n)
 VALUES ($fid,STR_TO_DATE('$entrydate','%d/%m/%Y'),'$n1','$n2',STR_TO_DATE('$n3','%d/%m/%Y'),'$n4','$n5','$n6','$ledgername_n',STR_TO_DATE('$m8','%d/%m/%Y'),'$qtotal','$amtotal','$ratetotal','$n7')";
		
	//echo $qry1;
			if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
 
 
$result2 = mysql_query("SELECT max(ntaxid) from mandia12n");

$row2 = mysql_fetch_array($result2);

$result1 = mysql_query("SELECT max(mtaxid) from mandia12m");

$row1 = mysql_fetch_array($result1);

$j = $_POST['totalcnt'];





for($i=2; $i <= $j; $i++) {
	
	$item = trim(strip_tags(addslashes(strtoupper($_POST['stkname'.$i]))));
$stid1 = trim(strip_tags(addslashes(strtoupper($_POST['item'.$i]))));



    $qry2="INSERT INTO mandia12_ref(formidm,stockitem,quantity,remark,amount,rate,tempid,formidn,stkid) VALUES 
	($row1[0],'$item',{$_POST['quantity'.$i]},'{$_POST['remark'.$i]}',{$_POST['amount'.$i]},{$_POST['rate'.$i]},'A12',
	$row2[0],$stid1)";
		//echo $qry2;
			if (!mysql_query($qry2,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	 echo "<script>alert('Data Successfully Inserted');location.href='a12mandinirastrittax_front.php'</script>";
	  
  }
		}
		}
?>

 
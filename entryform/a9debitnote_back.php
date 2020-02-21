<?php
include('../conf.php');
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }
$fid=$_SESSION['fid'];

?>
<?php 
$entrydate=date("d/m/Y");
?>
<?php
	if(isset($_POST['s']))
		{
			$province = trim(strip_tags(addslashes($_POST['province'])));
			$district = trim(strip_tags(addslashes($_POST['district'])));
			$suppliername = trim(strip_tags(addslashes($_POST['suppliername'])));
            $billno = trim(strip_tags(addslashes($_POST['billno'])));
            $billvalue = trim(strip_tags(addslashes($_POST['billvalue'])));
            $claims = trim(strip_tags(addslashes($_POST['moisture'])));
            $shortage = trim(strip_tags(addslashes($_POST['shortage'])));
            $moisture = trim(strip_tags(addslashes($_POST['moisture'])));
            $sand = trim(strip_tags(addslashes($_POST['sand'])));
            $oil = trim(strip_tags(addslashes($_POST['oil'])));
            $kirda = trim(strip_tags(addslashes($_POST['kirda'])));
            $labour = trim(strip_tags(addslashes($_POST['labour'])));
            $cashdcond = trim(strip_tags(addslashes($_POST['cashdcond'])));
            $brokerage = trim(strip_tags(addslashes($_POST['brokerage'])));
            $postage = trim(strip_tags(addslashes($_POST['postage'])));
            $bardanaclaims = trim(strip_tags(addslashes($_POST['bardanaclaims'])));
            $bankcharges = trim(strip_tags(addslashes($_POST['bankcharges'])));
            $other = trim(strip_tags(addslashes($_POST['other'])));
			$freight = trim(strip_tags(addslashes($_POST['freight'])));
            $gatepass = trim(strip_tags(addslashes($_POST['gatepass'])));
			$rated = trim(strip_tags(addslashes($_POST['rated'])));
            $bankc = trim(strip_tags(addslashes($_POST['bankc'])));
			$tclaim = trim(strip_tags(addslashes($_POST['tclaim'])));
            $tpaid = trim(strip_tags(addslashes($_POST['tpaid'])));
			$tdate= trim(strip_tags(addslashes($_POST['tdate'])));
			$credit= trim(strip_tags(addslashes($_POST['credit'])));
			$ledgername_n= trim(strip_tags(addslashes($_POST['ledgername_n'])));
			
			
			if($district == "Select Purchase Order")
			{
				$district = 0;
			}
			
			
			
            
$qry="INSERT INTO mandia9 (supid,a4id,suppliername,billno,billvalue,claims,shortage,moisture,sand,oil,kirda,labour,cashdcond,brokerage,postage,
bardanaclaims,bankcharges,other,fid,entrydate,freight,gatepass,rated,bankc,tclaim,tpaid,tdate,credit,ledgername_n)
 VALUES ('$province','$district','$suppliername','$billno','$billvalue','$claims','$shortage','$moisture','$sand','$oil','$kirda', '$labour',
 '$cashdcond','$brokerage','$postage','$bardanaclaims','$bankcharges','$other','$fid',STR_TO_DATE('$entrydate','%d/%m/%Y'),'$freight','$gatepass','$rated',
 '$bankc','$tclaim','$tpaid',STR_TO_DATE('$tdate','%d/%m/%Y'),'$ledgername_n','$credit')";
         

	//echo $qry;
 


 if(!mysql_query($qry,$connection))
  {      
  die('Error: ' . mysql_error());
  }      
        
 echo "<script>alert('Data Sucessfully Inserted.');location.href='a9debitnote_front.php'</script>";

 

 
 
		}
 
 
 
 
 ?>        
<?php
session_start();
$fid=$_SESSION['fid'];
?>
<?php
	include('../conf.php');
?>
<?php

//error_reporting(0); 

	if(isset($_POST['s']))
		{
			
									
$checktransporter = 0;
$checkbuyer = 0;
$checkbroker = 0;

if(isset($_POST['transporter']) ) 
{
   $checktransporter = trim(strip_tags(addslashes($_POST['transporter'])));
}

if(isset($_POST['buyer']) ) 
{
   $checkbuyer = trim(strip_tags(addslashes($_POST['buyer'])));
}


if(isset($_POST['broker']) ) 
{
   $checkbroker = trim(strip_tags(addslashes($_POST['broker'])));
}


             $gstin = trim(strip_tags(addslashes(strtoupper($_POST['gstin']))));
			 
			 $aadhar = trim(strip_tags(addslashes(strtoupper($_POST['aadhar']))));
			 
			 
			 
				$suppliername = trim(strip_tags(addslashes($_POST['suppliername'])));
            $factoryadd = trim(strip_tags(addslashes($_POST['factoryadd'])));
            $cityname = trim(strip_tags(addslashes($_POST['cityname'])));
            $state = trim(strip_tags(addslashes($_POST['state'])));
            $pin = trim(strip_tags(addslashes($_POST['pin'])));
            $contactperson = trim(strip_tags(addslashes($_POST['contactperson'])));
            $mobile = trim(strip_tags(addslashes($_POST['mobile'])));
            $email = trim(strip_tags(addslashes($_POST['email'])));
            $incometaxno = trim(strip_tags(addslashes($_POST['incometaxno'])));
            $servicetaxno = trim(strip_tags(addslashes($_POST['servicetaxno'])));
            $tinno = trim(strip_tags(addslashes($_POST['tinno'])));
            $bankaccname = trim(strip_tags(addslashes($_POST['bankaccname'])));
            $accountno = trim(strip_tags(addslashes($_POST['accountno'])));
			$officeadd = trim(strip_tags(addslashes($_POST['officeadd'])));
            $ocity = trim(strip_tags(addslashes($_POST['ocity'])));
            $ostate = trim(strip_tags(addslashes($_POST['ostate'])));
            $opin = trim(strip_tags(addslashes($_POST['opin'])));
			$centralenumber = trim(strip_tags(addslashes($_POST['centralenumber'])));
            $cstnumber = trim(strip_tags(addslashes($_POST['cstnumber'])));
			$acctype = trim(strip_tags(addslashes($_POST['acctype'])));
			$ifsccode = trim(strip_tags(addslashes($_POST['ifsccode'])));
            $olandline = trim(strip_tags(addslashes($_POST['olandline'])));
			$obalance = trim(strip_tags(addslashes($_POST['obalance'])));
            $tbalance = trim(strip_tags(addslashes($_POST['tbalance'])));
			$saudadate = trim(strip_tags(addslashes($_POST['saudadate'])));
			
			
			 $brokeragerate = trim(strip_tags(addslashes($_POST['brokeragerate'])));
			$brokerageqty = trim(strip_tags(addslashes($_POST['bQuantity'])));

			$acgroup = trim(strip_tags(addslashes($_POST['acgroup'])));
			$bankid = trim(strip_tags(addslashes($_POST['bankid'])));
			
			$statetype = trim(strip_tags(addslashes($_POST['statetype'])));
			
		//	echo $statetype;
			
			
			//=====================
			

			$bankaccname = trim(strip_tags(addslashes(strtoupper($_POST['bankaccname']))));
			$acctype = trim(strip_tags(addslashes(strtoupper($_POST['acctype']))));
			$accountno = trim(strip_tags(addslashes(strtoupper($_POST['accountno']))));
			$ifsccode = trim(strip_tags(addslashes(strtoupper($_POST['ifsccode']))));
			$brokeragerate = trim(strip_tags(addslashes(strtoupper($_POST['brokeragerate']))));
			$bQuantity = trim(strip_tags(addslashes(strtoupper($_POST['bQuantity']))));

			
	
	/*	$qry = "INSERT INTO `ledger_master`(`leg_name`, `fac_addr`, `off_addr`, `fact_city`, `off_city`, `fact_state`, `off_state`, 
`f_pin`, `o_pin`, `o_con`, `f_contact`, `off_email`, `inctaxnum`, `servicetaxno`, `tinno`, `centralno`, `cstno`, `o_date`,
 `o_bal`, `acc_grp`, `dr_cr`, `broker`, `transported`, `party`,fid,firmcontact,, `bankname`, `bank_type`, `bank_number`, `ifsc_code`, `brokerage`, `brok_qty`) VALUES 
  ('$suppliername','$factoryadd','$officeadd','$cityname','$ocity','$state','$ostate','$pin','$opin','$olandline','$mobile','$email','$incometaxno',
  '$servicetaxno','$tinno','$centralenumber','$cstnumber',STR_TO_DATE('$saudadate','%d/%m/%Y'),'$obalance','$acctype','$tbalance','$checkbroker',
  '$checktransporter','$checkbuyer',$fid,'$contactperson','$bankaccname','$acctype','$accountno','$ifsccode','$brokeragerate','$bQuantity'
  )";
  
  echo $qry;*/

	
			$qry = mysql_query("INSERT INTO `ledger_master`(`leg_name`, `fac_addr`, `off_addr`, `fact_city`, `off_city`, `fact_state`, `off_state`, 
`f_pin`, `o_pin`, `o_con`, `f_contact`, `off_email`, `inctaxnum`, `servicetaxno`, `tinno`, `centralno`, `cstno`, `o_date`,
 `o_bal`, `acc_grp`, `dr_cr`, `broker`, `transported`, `party`,fid,firmcontact,`bankname`, `bank_type`, `bank_number`, `ifsc_code`, `brokerage`, `brok_qty`,acc_name,acc_id,gstin,aadhar,statetype) VALUES 
  ('$suppliername','$factoryadd','$officeadd','$cityname','$ocity','$state','$ostate','$pin','$opin','$olandline','$mobile','$email','$incometaxno',
  '$servicetaxno','$tinno','$centralenumber','$cstnumber',STR_TO_DATE('$saudadate','%d/%m/%Y'),'$obalance','$acctype','$tbalance','$checkbroker',
  '$checktransporter','$checkbuyer',$fid,'$contactperson','$bankaccname','$acctype','$accountno','$ifsccode','$brokeragerate','$bQuantity','$bankid','$acgroup','$gstin','$aadhar','$statetype'
  )
");

			

			
			
		}

    echo "<script>alert('Data Sucessfully Inserted.');location.href='transportname_view.php'</script>";
?>
<html>
<head>

</head>

<body>

</body>
</html>
<?php
session_start();
$fid=$_SESSION['fid'];
//echo $fid;
?>

<?php
	include('../conf.php');
?>
<?php
	if(isset($_POST['s']))
		{
			$brokername = trim(strip_tags(addslashes($_POST['brokername'])));
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
            $brokeragerate = trim(strip_tags(addslashes($_POST['brokeragerate'])));
			$officeadd = trim(strip_tags(addslashes($_POST['officeadd'])));
            $ocity = trim(strip_tags(addslashes($_POST['ocity'])));
            $ostate = trim(strip_tags(addslashes($_POST['ostate'])));
            $opin = trim(strip_tags(addslashes($_POST['opin'])));
			$centralenumber = trim(strip_tags(addslashes($_POST['centralenumber'])));
            $cstnumber = trim(strip_tags(addslashes($_POST['cstnumber'])));
			$acctype = trim(strip_tags(addslashes($_POST['acctype'])));
			$ifsccode = trim(strip_tags(addslashes($_POST['ifsccode'])));
            $brokerageqty = trim(strip_tags(addslashes($_POST['brokerageqty'])));
			$olandline = trim(strip_tags(addslashes($_POST['olandline'])));
			$obalance = trim(strip_tags(addslashes($_POST['obalance'])));
            $tbalance = trim(strip_tags(addslashes($_POST['tbalance'])));
			$saudadate = trim(strip_tags(addslashes($_POST['saudadate'])));

           
			

			$qry = mysql_query("INSERT INTO broker (brokername,factoryadd,cityname,state,pin,contactperson,mobile,email,incometaxno,servicetaxno,tinno,bankaccname,accountno,brokeragerate,
			officeadd,ocity,ostate,opin,centralenumber,cstnumber,acctype,ifsccode,brokerageqty,olandline,fid,obalance,tbalance,saudadate) VALUES ('$brokername','$factoryadd','$cityname','$state','$pin','$contactperson','$mobile','$email','$incometaxno','$servicetaxno','$tinno',
'$bankaccname','$accountno','$brokeragerate','$officeadd','$ocity','$ostate','$opin','$centralenumber',
'$cstnumber','$acctype','$ifsccode','$brokerageqty','$olandline','$fid','$obalance','$tbalance',STR_TO_DATE('$saudadate','%d/%m/%Y'))");
		}

     echo "<script>alert('Data Sucessfully Inserted.');location.href='broker_front.php'</script>";
?>

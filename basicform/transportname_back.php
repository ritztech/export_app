<?php
session_start();
$fid=$_SESSION['fid'];
?>
<?php
	include('../conf.php');
?>
<?php
	if(isset($_POST['s']))
		{
			$transportname = trim(strip_tags(addslashes($_POST['transportname'])));
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
			$officeadd = trim(strip_tags(addslashes($_POST['officeadd'])));
            $ocity = trim(strip_tags(addslashes($_POST['ocity'])));
            $ostate = trim(strip_tags(addslashes($_POST['ostate'])));
            $opin = trim(strip_tags(addslashes($_POST['opin'])));
			$centralenumber = trim(strip_tags(addslashes($_POST['centralenumber'])));
            $cstnumber = trim(strip_tags(addslashes($_POST['cstnumber'])));
			$olandline = trim(strip_tags(addslashes($_POST['olandline'])));


			$qry = mysql_query("INSERT INTO transportname (transportname,factoryadd,cityname,state,pin,contactperson,mobile,email,incometaxno,servicetaxno,tinno,officeadd,ocity,ostate,opin,centralenumber,cstnumber,olandline,fid) VALUES ('$transportname','$factoryadd','$cityname','$state','$pin','$contactperson','$mobile','$email','$incometaxno','$servicetaxno','$tinno','$officeadd','$ocity','$ostate','$opin','$centralenumber','$cstnumber','$olandline','$fid')");
		}

     echo "<script>alert('Data Sucessfully Inserted.');location.href='transportname_front.php'</script>";
?>

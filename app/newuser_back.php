
<?php
	include('../conf.php');
?>
<?php
	if(isset($_POST['s']))
		{
			$firmname = trim(strip_tags(addslashes($_POST['firmname'])));
            $businessfirm = trim(strip_tags(addslashes($_POST['businessfirm'])));
            $officeadd = trim(strip_tags(addslashes($_POST['officeadd'])));
            $shopadd = trim(strip_tags(addslashes($_POST['shopadd'])));
            $phonno = trim(strip_tags(addslashes($_POST['phonno'])));
            $faxnumber = trim(strip_tags(addslashes($_POST['faxnumber'])));
            $mobile = trim(strip_tags(addslashes($_POST['mobile'])));
            $contactperson = trim(strip_tags(addslashes($_POST['contactperson'])));
            $firmtype = trim(strip_tags(addslashes($_POST['firmtype'])));
            $email = trim(strip_tags(addslashes($_POST['email'])));
            $mpvat = trim(strip_tags(addslashes($_POST['mpvat'])));
            $midate = trim(strip_tags(addslashes($_POST['midate'])));
            $mandilicenseno = trim(strip_tags(addslashes($_POST['mandilicenseno'])));
            $mandidate = trim(strip_tags(addslashes($_POST['mandidate'])));
            $cstno = trim(strip_tags(addslashes($_POST['cstno'])));
            $cstdate = trim(strip_tags(addslashes($_POST['cstdate'])));
            $tinno = trim(strip_tags(addslashes($_POST['tinno'])));
            $tindate = trim(strip_tags(addslashes($_POST['tindate'])));
            $fssaino = trim(strip_tags(addslashes($_POST['fssaino'])));
            $fdate = trim(strip_tags(addslashes($_POST['fdate'])));
            $otherdoc = trim(strip_tags(addslashes($_POST['otherdoc'])));
            $propname = trim(strip_tags(addslashes($_POST['propname'])));
            $place = trim(strip_tags(addslashes($_POST['place'])));
            $state = trim(strip_tags(addslashes($_POST['state'])));
			$contactperson1 = trim(strip_tags(addslashes($_POST['contactperson1'])));
			$email1 = trim(strip_tags(addslashes($_POST['email1'])));
			$itnumber = trim(strip_tags(addslashes($_POST['itnumber'])));
			$itndate = trim(strip_tags(addslashes($_POST['itndate'])));
			$otherdoc1 = trim(strip_tags(addslashes($_POST['otherdoc1'])));
			$pcontact = trim(strip_tags(addslashes($_POST['pcontact'])));
			$pstatus = trim(strip_tags(addslashes($_POST['pstatus'])));
			$bankname = trim(strip_tags(addslashes($_POST['bankname'])));
			$banktype = trim(strip_tags(addslashes($_POST['banktype'])));
			$bankaccnumber = trim(strip_tags(addslashes($_POST['bankaccnumber'])));
			$ifsccode = trim(strip_tags(addslashes($_POST['ifsccode'])));



$qry="INSERT INTO firmcreation (firmname,businessfirm,officeadd,shopadd,phonno,faxnumber,mobile,
contactperson,firmtype,email,mpvat,midate,mandilicenseno,mandidate,cstno,cstdate,tinno,
tindate,fssaino,fdate,otherdoc,propname,place,state,contactperson1,email1,itnumber,itndate,otherdoc1,pcontact,pstatus,bankname,banktype,bankaccnumber,ifsccode)
 VALUES ('$firmname','$businessfirm',
'$officeadd','$shopadd','$phonno','$faxnumber','$mobile','$contactperson','$firmtype','$email',
'$mpvat',STR_TO_DATE('$midate','%d/%m/%Y'),'$mandilicenseno',STR_TO_DATE('$mandidate','%d/%m/%Y'),
'$cstno',STR_TO_DATE('$cstdate','%d/%m/%Y'),'$tinno',STR_TO_DATE('$tindate','%d/%m/%Y'),'$fssaino',
STR_TO_DATE('$fdate','%d/%m/%Y'),'$otherdoc','$propname','$place','$state','$contactperson1','$email1','$itnumber',STR_TO_DATE('$itndate','%d/%m/%Y'),'$otherdoc1','$pcontact',
'$pstatus','$bankname','$banktype','$bankaccnumber','$ifsccode')";

       //	$qry = mysql_query();
	 //  echo $qry;
       if (!mysql_query($qry,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  
  
  $result1 = mysql_query("SELECT 	max(fid)   from firmcreation ");
$row1 = mysql_fetch_array($result1);

$max_fid = $row1[0];



$qry="INSERT INTO `m_autoid`(`journalid`, `sellid`, `fid`) VALUES (1,1,$max_fid)";

       //	$qry = mysql_query();
	  // echo $qry;
       if (!mysql_query($qry,$connection))
  {
  die('Error: ' . mysql_error());
  }


        }

echo "<script>alert('Data Sucessfully Inserted.');location.href='newuser_front.php'</script>";

?>

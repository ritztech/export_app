<?php
	include('../conf.php');
	if(isset($_POST['s']))
		{
			
			$uname = trim(strip_tags(addslashes($_POST['uname'])));
            $password = trim(strip_tags(addslashes($_POST['pwd'])));
			$password = md5(hash("sha512", $password)); 
            $pwd = substr($password, 0, 15);
            $username = trim(strip_tags(addslashes($_POST['username'])));
            $address = trim(strip_tags(addslashes($_POST['address'])));
            $mobile = trim(strip_tags(addslashes($_POST['mobile'])));          
            $securitylevel = trim(strip_tags(addslashes($_POST['securitylevel'])));
            $sdate = trim(strip_tags(addslashes($_POST['sdate'])));
            $enddate = trim(strip_tags(addslashes($_POST['enddate'])));
            $status = trim(strip_tags(addslashes($_POST['status'])));
            $newuser = trim(strip_tags(addslashes($_POST['newuser'])));
			$fname = trim(strip_tags(addslashes($_POST['fname'])));
			
		}
		

$qry="INSERT INTO appuser (uname,pwd,username,address,mobile,securitylevel,sdate,enddate,status,newuser,fid,fname)
 VALUES ('$uname','$pwd','$username','$address','$mobile','$securitylevel','$sdate' ,'$sdate' ,'INACTIVE','NEW',0,'$fname')";

    // echo $qry;
	
	
$result1 = mysql_query("SELECT uname from appuser    where uname = '$uname'");

$row1 = mysql_fetch_array($result1);

if ($row1['uname'] == $uname)
{

echo "<script>alert('This user  already available.');location.href='user_reg_front.php'</script>";
		
}

else
{
  if (!mysql_query($qry,$connection))
   {
  die('Error: ' . mysql_error());
   }
    echo "<script>alert('Thanx For Registration.');location.href='../basicform/welcome1.php'</script>";
	
}

	
	
	



?>

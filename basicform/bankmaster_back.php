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
			$bankname = trim(strip_tags(addslashes($_POST['bankname'])));

			$qry = mysql_query("INSERT INTO bank_master (bankname,fid) VALUES ('$bankname','$fid')");
		}

     echo "<script>alert('Data Sucessfully Inserted.');location.href='bankmaster_front.php'</script>";
?>

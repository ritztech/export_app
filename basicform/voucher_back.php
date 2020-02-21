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
			$description = trim(strip_tags(addslashes($_POST['description'])));

			$qry = mysql_query("INSERT INTO vouchertype (description,fid) VALUES ('$description','$fid')");
		}

     echo "<script>alert('Data Sucessfully Inserted.');location.href='voucher_front.php'</script>";
?>

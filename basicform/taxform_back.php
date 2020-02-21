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
			$salestaxform = trim(strip_tags(addslashes($_POST['salestaxform'])));
            $entrytaxform = trim(strip_tags(addslashes($_POST['entrytaxform'])));
            $manditaxform = trim(strip_tags(addslashes($_POST['manditaxform'])));

			$qry = mysql_query("INSERT INTO taxform (salestaxform,entrytaxform,manditaxform,fid) VALUES ('$salestaxform','$entrytaxform','$manditaxform','$fid')");
		}

    echo "<script>alert('Data Sucessfully Inserted.');location.href='taxform_front.php'</script>";
?>

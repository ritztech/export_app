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
			$villagename = trim(strip_tags(addslashes($_POST['villagename'])));
            $city = trim(strip_tags(addslashes($_POST['city'])));
			$tahseel = trim(strip_tags(addslashes($_POST['tahseel'])));
			$state = trim(strip_tags(addslashes($_POST['state'])));

			$qry = mysql_query("INSERT INTO villagename (villagename,city,tahseel,state,fid) VALUES ('$villagename','$city','$tahseel','$state','$fid')");
		}

     echo "<script>alert('Data Sucessfully Inserted.');location.href='villagename_front.php'</script>";
?>

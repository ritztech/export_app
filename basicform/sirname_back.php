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
			$sirname = trim(strip_tags(addslashes($_POST['sirname'])));

			$qry = mysql_query("INSERT INTO sirname (sirname,fid) VALUES ('$sirname','$fid')");
		}

     echo "<script>alert('Data Sucessfully Inserted.');location.href='sirname_front.php'</script>";
?>

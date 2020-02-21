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

			$qry = mysql_query("INSERT INTO stk_grp (name,fid) VALUES ('$sirname','$fid')");
		}

     echo "<script>location.href='stk_grp_view.php'</script>";
?>



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
            $gcontact = trim(strip_tags(addslashes($_POST['gcontact'])));
            $gaddress = trim(strip_tags(addslashes($_POST['gaddress'])));
			
			$gname = trim(strip_tags(addslashes(strtoupper($_POST['gname']))));
			
			$vehicl_id = trim(strip_tags(addslashes(strtoupper($_POST['vehicl_id']))));
			
			
			
if($vehicl_id>0)
{

	
		$sql="UPDATE `godown`  set `gname`='$gname',`gcontact`='$gcontact',`gaddress`='$gaddress'  WHERE gid='$vehicl_id'";
			
		
		$sql = str_replace("''", "'0'", $sql);
		

			$qry = mysql_query($sql);
			

	
}




		}

      echo "<script>location.href='godown_view.php'</script>";
?>



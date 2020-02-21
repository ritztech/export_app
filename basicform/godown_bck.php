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


			$qry = mysql_query("INSERT INTO `godown`(`gname`, `gcontact`, `gaddress`,fid) VALUES 
('$gname','$gcontact','$gaddress',$fid)");
		}

      echo "<script>location.href='godown_view.php'</script>";
?>



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
			
			
  
//  **** image upload end		
			 
				
				
				$bankname = trim(strip_tags(addslashes($_POST['bankname'])));
		
			
			$sql="INSERT INTO `oneline`(`mytext`) VALUES ('$bankname')";			
	
		
		$sql = str_replace("''", "'0'", $sql);
		
		//echo $sql;
		

			$qry = mysql_query($sql);

		
		}

  echo "<script>alert('Data Sucessfully Inserted.');location.href='one_line_master.php'</script>";
?>

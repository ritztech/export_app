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
			 
				
				
				$cond1 = trim(strip_tags(addslashes($_POST['cond1'])));
								$detail2 = trim(strip_tags(addslashes($_POST['detail2'])));
		
				
			
			$sql="INSERT INTO `condition_master`(`val1`, `val2`) VALUES ('$cond1','$detail2')";			
	
		
		$sql = str_replace("''", "'0'", $sql);
		
		//echo $sql;
		

			$qry = mysql_query($sql);

		
		}

  echo "<script>alert('Data Sucessfully Inserted.');location.href='condition_master_view.php'</script>";
?>

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
			
			$bankidd = trim(strip_tags(addslashes($_POST['bankidd'])));
			
			
			
			
		if($bankidd>=1)
		{			
			
	$sql="UPDATE `oneline` SET `mytext`='$bankname' WHERE id = $bankidd";			
	
	


	
		$sql = str_replace("''", "'0'", $sql);
		
		//echo $sql;
		

			$qry = mysql_query($sql);
			
			
		}

		
		}

  echo "<script>alert('Data Sucessfully updated.');location.href='one_line_master.php'</script>";
?>

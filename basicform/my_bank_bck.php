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
			$brchadrr = trim(strip_tags(addslashes($_POST['brchadrr'])));
			$accname = trim(strip_tags(addslashes($_POST['accname'])));
			$accnumm = trim(strip_tags(addslashes($_POST['accnumm'])));
			$ifsccode = trim(strip_tags(addslashes($_POST['ifsccode'])));	
			$swiftcode = trim(strip_tags(addslashes($_POST['swiftcode'])));
			
			
			
			$sql="INSERT INTO `mybanks`(`bnkname`, `branchaddr`, `accname`, `accnum`, `ifsc`, `swidt`) VALUES
      ('$bankname','$brchadrr','$accname','$accnumm','$ifsccode','$swiftcode')";			
	
		
		$sql = str_replace("''", "'0'", $sql);
		
		//echo $sql;
		

			$qry = mysql_query($sql);

		
		}

  echo "<script>alert('Data Sucessfully Inserted.');location.href='my_bank_view.php'</script>";
?>

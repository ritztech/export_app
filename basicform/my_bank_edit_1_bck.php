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
			
			$bankidd = trim(strip_tags(addslashes($_POST['bankidd'])));
			
			
			
			
		if($bankidd>=1)
		{			
			
	$sql="UPDATE `mybanks` SET
`bnkname`='$bankname',
`branchaddr`='$brchadrr',
`accname`='$accname',
`accnum`='$accnumm',
`ifsc`='$ifsccode',
`swidt`='$swiftcode' WHERE bank_id = $bankidd";			
	
	


	
		$sql = str_replace("''", "'0'", $sql);
		
		//echo $sql;
		

			$qry = mysql_query($sql);
			
			
		}

		
		}

  echo "<script>alert('Data Sucessfully Inserted.');location.href='my_bank_view.php'</script>";
?>

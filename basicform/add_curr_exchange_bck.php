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
			 
				
				
				$echange_type = trim(strip_tags(addslashes($_POST['echange_type'])));
				$currid = trim(strip_tags(addslashes($_POST['currid'])));
				$fromdate = trim(strip_tags(addslashes($_POST['fromdate'])));
			$todate = trim(strip_tags(addslashes($_POST['todate'])));
			$impexrate = trim(strip_tags(addslashes($_POST['impexrate'])));
			$expexrate = trim(strip_tags(addslashes($_POST['expexrate'])));
			$notenum = trim(strip_tags(addslashes($_POST['notenum'])));	
			$notedate = trim(strip_tags(addslashes($_POST['notedate'])));
			
			$remarksss = trim(strip_tags(addslashes($_POST['remarksss'])));
			
          $yearrr = trim(strip_tags(addslashes($_POST['yearrr'])));
			
			
			
			
			
				
			
			$sql="INSERT INTO `currency_exchangee`(`currencyid`, `startdate`, `enddate`, `import_ex_rate`, `export_ex_rate`, `notice_num`, `notice_date`, `remarks`, `year`, `curr_master_id`) VALUES 
			('$currid',STR_TO_DATE('$fromdate','%d/%m/%Y'),STR_TO_DATE('$todate','%d/%m/%Y'),'$impexrate','$expexrate','$notenum',STR_TO_DATE('$notedate','%d/%m/%Y'),'$remarksss','$yearrr','$echange_type')";			
	
		
		$sql = str_replace("''", "'0'", $sql);
		
		//echo $sql;
		

			$qry = mysql_query($sql);

		
		}

  echo "<script>alert('Data Sucessfully Inserted.');location.href='exchange_mastre_view.php'</script>";
?>

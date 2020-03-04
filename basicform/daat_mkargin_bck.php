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
			
			$tdate=trim(strip_tags($_POST['tdate']));
$qty=trim(strip_tags($_POST['qty']));
$salesrate=trim(strip_tags($_POST['salesrate']));
$purrates=trim(strip_tags($_POST['purrates']));
$usdinr=trim(strip_tags($_POST['usdinr']));
$brokerages=trim(strip_tags($_POST['brokerages']));
$dutydraww=trim(strip_tags($_POST['dutydraww']));
$meisss=trim(strip_tags($_POST['meisss']));
$otherexpp=trim(strip_tags($_POST['otherexpp']));


			
			$sql="INSERT INTO `margin_data`(`qty`, `sale_rate`, `buy_rate`, `rate_convert`, `brkage`, `duty`, `meis`, `othre_exp`, `t_date`) VALUES 
	('$qty','$salesrate','$purrates','$usdinr','$brokerages','$dutydraww','$meisss','$otherexpp',STR_TO_DATE('$tdate','%d/%m/%Y'))";			
			
		$sql = str_replace("''", "'0'", $sql);
		
		//echo $sql;
		

			$qry = mysql_query($sql);

		
		}

  echo "<script>alert('Data Sucessfully Inserted.');location.href='add_margin_entry_front.php'</script>";
?>

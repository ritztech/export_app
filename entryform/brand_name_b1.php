<?php
session_start();
$fid=$_SESSION['fid'];
?>
<?php
	include('../conf.php');
?>
<?php

			
			$stkname = trim(strip_tags(addslashes(strtoupper($_POST['stkname']))));
						$stkid = trim(strip_tags(addslashes(strtoupper($_POST['stk_m']))));
		
			
			$j = $_POST['totalcnt'];
			
		//	echo $j;
			
	
			
			for($i=1; $i <= $j; $i++) {
				
							$brandname = trim(strip_tags(addslashes(strtoupper($_POST['yieldname'.$i]))));
							$subid = trim(strip_tags(addslashes(strtoupper($_POST['item'.$i]))));
										$perct = trim(strip_tags(addslashes(strtoupper($_POST['perct'.$i]))));
					
$result1 = mysql_query("SELECT 	count(1)  from stk_d_mast  where sub_id  = $subid");
$row1 = mysql_fetch_array($result1);

$sub_st = $row1[0];
if($sub_st ==0)
{ 
		if($perct != "")
		{			

$sqlupd1="INSERT INTO `stk_d_mast`(`stkid`, `stkname`, `brand_name`, `fid`,perct,sub_id) VALUES  ($stkid,'$stkname','$brandname',$fid,'$perct',$subid)	";

//echo $sqlupd1;

mysql_query($sqlupd1,$connection);
} }
}
	
    echo "<script>alert('Data Sucessfully Inserted.');location.href='brand_view1.php'</script>";
?>
<html>
<head>

</head>

<body>

</body>
</html>
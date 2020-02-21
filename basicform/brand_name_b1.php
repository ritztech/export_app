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
			
			echo $j;
			
	
			
			for($i=1; $i <= $j; $i++) {
				
							$brandname = trim(strip_tags(addslashes(strtoupper($_POST['brandname'.$i]))));
										$perct = trim(strip_tags(addslashes(strtoupper($_POST['perct'.$i]))));
							
							

$sqlupd1="INSERT INTO `stk_d_mast`(`stkid`, `stkname`, `brand_name`, `fid`,perct) VALUES  ($stkid,'$stkname','$brandname',$fid,'$perct')	";

//echo $sqlupd1;

mysql_query($sqlupd1,$connection);
  
}
			
		

    echo "<script>alert('Data Sucessfully Inserted.');location.href='brand_view1.php'</script>";
?>
<html>
<head>

</head>

<body>

</body>
</html>
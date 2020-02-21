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

$sqlupd1="INSERT INTO `brand_name`(`stkid`, `stkname`, `brand_name`, `fid`) VALUES  ($stkid,'$stkname','$brandname',$fid)	";

//echo $sqlupd1;

mysql_query($sqlupd1,$connection);
  
}
			
		

    echo "<script>alert('Data Sucessfully Inserted.');location.href='brand_name_f.php'</script>";
?>
<html>
<head>

</head>

<body>

</body>
</html>
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
			
			$stockitem = trim(strip_tags(addslashes(strtoupper($_POST['stockitem']))));
			
						$idetails = trim(strip_tags(addslashes(strtoupper($_POST['idetails']))));
			
			
									 
									 
            $quantitytype = trim(strip_tags(addslashes($_POST['quantitytype'])));
            $reportformanditax = trim(strip_tags(addslashes($_POST['reportformanditax'])));
			$quantityop = trim(strip_tags(addslashes($_POST['quantityop'])));
			$sdate = trim(strip_tags(addslashes($_POST['sdate'])));
			$svalue = trim(strip_tags(addslashes($_POST['svalue'])));
		

            $godname = trim(strip_tags(addslashes($_POST['stkname'])));
	         $godid = trim(strip_tags(addslashes($_POST['p_category'])));
			 
			             $stkgrp = trim(strip_tags(addslashes($_POST['stkgrp'])));
						 
						 $hsnno = trim(strip_tags(addslashes(strtoupper($_POST['hsnno']))));
						 $gst = trim(strip_tags(addslashes($_POST['gst'])));
			 
			 
				
			
			
		

			$qry = mysql_query("INSERT INTO stockitem (stockitem,quantitytype,reportformanditax,quantityop,fid,sdate,svalue,`god_id`, `god_name`,stkgrp,hsn,gst,i_detail) VALUES 
			('$stockitem','$quantitytype','$reportformanditax','$quantityop','$fid',STR_TO_DATE('$sdate','%d/%m/%Y'),'$svalue','$godid','$godname','$stkgrp','$hsnno','$gst','$idetails')");
		
		
		$qry = str_replace("''", "'0'", $qry);
		
		
		
		}

      echo "<script>alert('Data Sucessfully Inserted.');location.href='stockitem_front.php'</script>";
?>

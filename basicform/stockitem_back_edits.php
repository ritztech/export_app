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
			
			
			
			$stkmastid = trim(strip_tags(addslashes(strtoupper($_POST['stkmastid']))));
			
			
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
			 
			 
				
			




	
	if($stkmastid>=1) {	

$qry = mysql_query("update  stockitem set 	stockitem='$stockitem',quantitytype='$quantitytype',reportformanditax='$reportformanditax',quantityop='$quantityop',
sdate=STR_TO_DATE('$sdate','%d/%m/%Y'),svalue='$svalue',`god_id`='$godid', `god_name`='$godname',stkgrp='$stkgrp',hsn='$hsnno',gst='$gst',i_detail='$idetails'  where stockid = $stkmastid
");


		$qry = str_replace("''", "'0'", $qry);
	
	}	

	}

      echo "<script>alert('Data Sucessfully Inserted.');location.href='stk_item_view.php'</script>";
?>

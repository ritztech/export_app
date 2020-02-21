<?php
session_start();
$fid=$_SESSION['fid'];
//echo $fid;
?>
<?php
	include('../conf.php');
?>

<?php
	if(isset($_POST['s']))
		{
			
			

  
			
			$depositdate = trim(strip_tags(addslashes($_POST['depositdate'])));
			$totbilwght =  $_POST['totbilwght'];
              $totrot =  $_POST['totrot'];
              $totrog =  $_POST['totrog'];
			  
			   $getpadde =  $_POST['getpadde'];
			  
			 			
				$qry1 = "delete  from  mandi13 WHERE gpid='$getpadde' ";
	
mysql_query($qry1,$connection);

	if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }   
  
			  
             
			$qry="UPDATE mandi13_ref SET	       
            depositdate =STR_TO_DATE('$depositdate','%d/%m/%Y'),           
			bagqty='$totbilwght',
			bagvalue='$totrot',
			goodsvalue='$totrog'			
            WHERE a13refid='$getpadde'";
			
			

			
       	//$qry = mysql_query();
//echo $qry;
    



	if (!mysql_query($qry,$connection))
  {
  die('Error: ' . mysql_error());
  }


  $j = $_POST['totalcnt'];
  
  for($i=2; $i <= $j; $i++) {
	   
	  
	  	 $result11 = mysql_query("SELECT leg_name from ledger_master  where legid = '{$_POST['suppliername'.$i]}'");
		 
      $row11 = mysql_fetch_array($result11);
	  
	 $item = trim(strip_tags(addslashes(strtoupper($_POST['stkname'.$i]))));
$stid1 = trim(strip_tags(addslashes(strtoupper($_POST['item'.$i])))); 
	  
	  
 $qry1="INSERT INTO mandi13(gpid,fid,suppliername,stockitem,msamiti,gatepassno,bagqty,valueqty,goodsvalue,inwarddate,remark,suppid,stkid)
VALUES ($getpadde,$fid,'$row11[0]',' $item','{$_POST['msamiti'.$i]}','{$_POST['gatepassno'.$i]}', '{$_POST['bagqty'.$i]}',
'{$_POST['valueqty'.$i]}','{$_POST['goodsvalue'.$i]}',STR_TO_DATE('{$_POST['inwarddate'.$i]}','%d/%m/%Y'),'{$_POST['remark'.$i]}','{$_POST['suppliername'.$i]}',$stid1)";
		
	//echo $qry1;
			if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }

        
}

$result12 = mysql_query("SELECT max(a13refid) from mandi13_ref");
$row12 = mysql_fetch_array($result12);


//echo $row12[0];



echo "<script>alert('Data Sucessfully Inserted.');location.href='a13gatepassdeposit_edit1.php?a13refid=$getpadde'</script>";

        }
		
?>

 
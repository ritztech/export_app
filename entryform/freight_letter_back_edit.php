<?php
session_start();
$fid=$_SESSION['fid'];
include('../conf.php');
$entrydate=date("d/m/Y");

?>

<?php
	if(isset($_POST['s']))
		{
			$sno = trim(strip_tags(addslashes($_POST['sno'])));
			$mesars = $_POST['suppid'];	
            $id = $_POST['id_2'];			
			$t_date = $_POST['t_date'];
			$p_date = $_POST['p_date'];
			$broker = $_POST['broker'];
            $jins = trim(strip_tags(addslashes($_POST['jins'])));
        

            $truckno = trim(strip_tags(addslashes($_POST['truckno'])));
            $qty = trim(strip_tags(addslashes($_POST['qty'])));
            $truck_fare = trim(strip_tags(addslashes($_POST['truck_fare'])));
			$advance = trim(strip_tags(addslashes($_POST['advance'])));
			
			$balance = trim(strip_tags(addslashes($_POST['balance'])));
			
			
            $billno = trim(strip_tags(addslashes($_POST['billno'])));
            $billtyno = trim(strip_tags(addslashes($_POST['billtyno'])));			
			$beema_dec = trim(strip_tags(addslashes($_POST['beema_dec'])));
			  
				 
			
$qry="UPDATE `freight_letter` SET `sno`='$sno',`mesars`='$mesars',`t_date`=STR_TO_DATE('$t_date','%d/%m/%Y'),`p_date`=STR_TO_DATE('$p_date','%d/%m/%Y'),
`broker`='$broker',`jins`='$jins',
`truckno`='$truckno',`qty`='$qty',`truck_fare`='$truck_fare',`advance`='$advance',
`balance`='$balance',`billno`='$billno',`billtyno`='$billtyno',`beema_dec`='$beema_dec' WHERE id=$id";

// echo $qry;
if (!mysql_query($qry,$connection))
  {
  die('Error: ' . mysql_error());
  }
      
   echo "<script>alert('Data Successfully Inserted');location.href='freight_letter_view.php'</script>";

  
	   
}


?>


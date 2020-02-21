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
			  
				 
			
$qry="INSERT INTO `freight_letter`(`sno`, `mesars`, `t_date`, `p_date`, `broker`, `jins`, `truckno`, `qty`, `truck_fare`, `advance`, 
`balance`, `billno`, `billtyno`, `beema_dec`) VALUES
 ('$sno','$mesars',STR_TO_DATE('$t_date','%d/%m/%Y'),STR_TO_DATE('$p_date','%d/%m/%Y') ,'$broker','$jins','$truckno','$qty','$truck_fare','$advance','$balance','$billno',
'$billtyno','$beema_dec')";

 //echo $qry;
if (!mysql_query($qry,$connection))
  {
  die('Error: ' . mysql_error());
  }
      
   echo "<script>alert('Data Successfully Inserted');location.href='freight_letter_view.php'</script>";

  
	   
}


?>


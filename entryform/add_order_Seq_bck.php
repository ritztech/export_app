<?php

include('config.php');



$billseq = $_POST['billseq'];




$sql="UPDATE `m_auto_id` SET sell_id = '$billseq' ";


if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	  echo "<script>alert('Data Updated Successfully');location.href='add_order_Seq.php'</script>";
	  
	  
  }
  


?>






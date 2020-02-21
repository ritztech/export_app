<?php
session_start();
$fid=$_SESSION['fid'];
//echo $fid;
?>
<?php
	include('../conf.php');
?>
<?php 
$entrydate=date("d/m/Y");
?>
<?php
	if(isset($_POST['s']))
		{
			$adminterate = trim(strip_tags(addslashes($_POST['adminterate'])));
            $subject = trim(strip_tags(addslashes($_POST['subject'])));
            $priroty = trim(strip_tags(addslashes($_POST['priroty'])));
            $querytype = trim(strip_tags(addslashes($_POST['querytype'])));
            $query = trim(strip_tags(addslashes($_POST['query'])));
            
			
$qry="INSERT INTO mandia16 (adminterate,subject,priroty,querytype,query,fid,entrydate) VALUES ('$adminterate','$subject','$priroty','$querytype','$query','$fid',STR_TO_DATE('$entrydate','%d/%m/%Y'))";

       //	$qry = mysql_query();
	// echo $qry;
       if (!mysql_query($qry,$connection))
  {
  die('Error: ' . mysql_error());
  }
//header("Location: goodsreciept_view.php");

echo "<script>alert('Data Sucessfully Inserted.');location.href='a16querymaster_front.php'</script>";

        }

?>

 
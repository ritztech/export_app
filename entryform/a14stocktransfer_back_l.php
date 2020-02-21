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
			$stockdate = trim(strip_tags(addslashes($_POST['stockdate'])));
            $stockitem = trim(strip_tags(addslashes($_POST['stockitem'])));
            $outqty = trim(strip_tags(addslashes($_POST['outqty'])));
            $outvalue = trim(strip_tags(addslashes($_POST['outvalue'])));
			
			 $shortvalue = trim(strip_tags(addslashes($_POST['shortvalue'])));
			  $shortaccess = trim(strip_tags(addslashes($_POST['shortaccess'])));
			
			
			
           
			
$qry="INSERT INTO mandi14 (stockdate,stockitem,outqty,outvalue,fid,aceevalue,accdesc) VALUES (STR_TO_DATE('$stockdate','%d/%m/%Y'),'$stockitem','$outqty','$outvalue','$fid',$shortvalue,'$shortaccess')";

//echo $qry;

       //	$qry = mysql_query();
	// echo $qry;
       if (!mysql_query($qry,$connection))
  {
  die('Error: ' . mysql_error());
  }
$result1 = mysql_query("SELECT max(a14id) from mandi14");

$row1 = mysql_fetch_array($result1);
//echo $row1[0]; 
$j = $_POST['totalcnt'];
//echo $j;
for($i=1; $i <= $j; $i++)
	{
 $qry1="INSERT INTO mandia14(formid,tempid,stockitem,inputqty,inputvalue)VALUES($row1[0],'A14','{$_POST['item'.$i]}','{$_POST['bagg'.$i]}','{$_POST['grsweight'.$i]}')";
	//echo $qry1;
			if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }

        


echo "<script>alert('Data Sucessfully Inserted.');location.href='a14stocktransfer_front.php'</script>";

		}
		}

?>

 
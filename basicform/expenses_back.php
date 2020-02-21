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
			$expenseshead = trim(strip_tags(addslashes($_POST['expenseshead'])));
			$acgroup = trim(strip_tags(addslashes($_POST['acgroup'])));
			$obalance = trim(strip_tags(addslashes($_POST['obalance'])));
            $tbalance = trim(strip_tags(addslashes($_POST['tbalance'])));
			$saudadate = trim(strip_tags(addslashes($_POST['saudadate'])));
			$bankid = trim(strip_tags(addslashes($_POST['bankid'])));
			
			
			
			

			$qry = mysql_query("INSERT INTO expensesregister (expenseshead,fid,acgroup,obalance,tbalance,saudadate,acgrpid) VALUES ('$expenseshead','$fid','$bankid','$obalance','$tbalance',STR_TO_DATE('$saudadate','%d/%m/%Y'),'$acgroup')");
		}

    echo "<script>alert('Data Sucessfully Inserted.');location.href='expenses_view.php'</script>";
?>

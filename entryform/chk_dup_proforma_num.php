<?phpinclude("../conf.php");session_start();$id=$_GET["q"];//echo $custname;$result12 = mysql_query("SELECT count(*) FROM `proformainv` WHERE concat(`proforma_inv`,'',`piv3`,'',`piv_2`) =  '$id' ");$row12 = mysql_fetch_array($result12);$v1= $row12['0'];echo $v1;?> 
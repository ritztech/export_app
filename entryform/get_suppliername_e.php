<?php
session_start();
$fid=$_SESSION['fid'];
?>
<html>
<head>
<style>

select{
	padding: 2px !important;
  	line-height: normal;
  	font-family: "Khmer Kampot", "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
  	font-size: 13px;
  	align-items: center;
	}
</style>
</head>

<?php 


//$province=intval($_GET['province']);

$province=$_GET["province"];

//echo $province;

$fid111 = explode(",",$province);

$fid111_1 = $fid111[0];
$suppid_111 = $fid111[1];


include("../conf.php");
//"SELECT `id`,upper(CONCAT(`desc`,'-', `capacity`,'-', `cmp_name`,'-', qty,'-',`storage`)) AS `desc` FROM `m_master_store`order by 2"

// echo "<script>alert('province');</script>";

$result1 = mysql_query("SELECT legid,concat(leg_name,'-',off_city,'-',fact_state) as suppliername  FROM ledger_master where legid = $suppid_111 ");
$row1 = mysql_fetch_array($result1);

$stak_id = $row1['0'];
$stak_name = $row1['1'];

 
$query="SELECT legid,concat(leg_name,'-',off_city,'-',fact_state) as suppliername  FROM ledger_master where fid=$fid111_1   and  legid != $suppid_111";
$result=mysql_query($query);

?>
<select class="form-control" name="suppliername" style="width:130px" >
<option value=<?php echo $stak_id?>><?php echo $stak_name?></option>
<?php while ($row=mysql_fetch_array($result)) { ?>

<option value='<?php echo $row['0']?>'><?php echo $row['1']?></option>
<?php } ?>
</select>

</html>
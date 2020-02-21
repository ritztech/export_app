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

<?php $province=intval($_GET['province']);

include("../conf.php");
//"SELECT `id`,upper(CONCAT(`desc`,'-', `capacity`,'-', `cmp_name`,'-', qty,'-',`storage`)) AS `desc` FROM `m_master_store`order by 2"

$query="SELECT a1.grid , upper(CONCAT(a1.brokername,'-',a1.suppliername,'-',a1.bag,'-',a1.supervisiorname,'-',a1.billno,'-',a1.gatepassno ))  as suppliername
FROM goodrecieptsnote a1 
where   a1.suppid = $province  ";

$result=mysql_query($query);

?>



 <select class="form-control" name="district" onChange="h1231(this.value)" style="width:170px">
<option>&larr; Select Purchase Order &rarr;</option>
<?php while ($row=mysql_fetch_array($result)) { ?>
<option value=<?php echo $row['0']?>><?php echo $row['1']?></option>
<?php } ?>
</select>

</html>
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

$query="SELECT  a1.poid,upper(CONCAT(a1.suppliername,'-',a1.fid,'-', a1.brokername,'-', a1.quantity,'-',a1.bag,'-', a1.modeofsupply,'-', a1.status)) AS suppliername
FROM purchase_order a1  WHERE  a1.status='OPEN'   and a1.suppid = $province  ";
$result=mysql_query($query);

?>
<select class="form-control" name="district" onChange="h123(this.value)">
<option>&larr; Select Purchase Order &rarr;</option>
<?php while ($row=mysql_fetch_array($result)) { ?>
<option value=<?php echo $row['0']?>><?php echo $row['1']?></option>
<?php } ?>
</select>

</html>
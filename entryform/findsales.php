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

$query=" select `soid` , upper(CONCAT(`suppliername`,'-',`brokername`,'-',`quantity`,'-',`bag` )) as saledetail  FROM mandia5    where supid  = $province  ";

$result=mysql_query($query);

?>


 <select class="form-control" name="district" onChange="h12311(this.value)" style="width:200px">
<option>SUPPLIERNAME-BROKERNAME-STOCKITEM-PACKINGTERMS-DELEVERYDUEDATE-MODEOFSUPPLY-SAUDADATE </option>
<option> ------------------------------------------------------------------------------------  </option>
<?php while ($row=mysql_fetch_array($result)) { ?>
<option value=<?php echo $row['0']?>><?php echo $row['1']?></option>
<?php } ?>
</select>

</html>
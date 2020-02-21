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

 echo "<script>alert('province');</script>";


 
$query="SELECT legid,concat(leg_name,'-',off_city,'-',fact_state) as suppliername  FROM ledger_master where fid=$province ";
$result=mysql_query($query);

?>
<select class="form-control" name="suppliername" style="width:130px" >
<option value = "0">Select Supplier Name </option>
<?php while ($row=mysql_fetch_array($result)) { ?>
<option value='<?php echo $row['0']?>'><?php echo $row['1']?></option>
<?php } ?>
</select>

</html>
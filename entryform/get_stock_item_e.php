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
$stkid_1 = $fid111[1];



include("../conf.php");
//"SELECT `id`,upper(CONCAT(`desc`,'-', `capacity`,'-', `cmp_name`,'-', qty,'-',`storage`)) AS `desc` FROM `m_master_store`order by 2"

// echo "<script>alert('province');</script>";

 $result1 = mysql_query("SELECT stockid, stockitem FROM stockitem WHERE stockid  = $stkid_1 ");
$row1 = mysql_fetch_array($result1);

$stak_id = $row1['0'];
$stak_name = $row1['1'];




$query="SELECT stockid, stockitem FROM stockitem WHERE fid = $fid111_1  ";
$result=mysql_query($query);

?>
<select class="form-control" name="item" >
<option value=<?php echo $stak_id?>><?php echo $stak_name?></option>
<?php while ($row=mysql_fetch_array($result)) { ?>
<option value="<?php echo $row['0']?>" ><?php echo $row['1']?></option>
<?php } ?>
</select>

</html>
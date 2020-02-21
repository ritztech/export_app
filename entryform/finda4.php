<?php
session_start();
$fid=$_SESSION['fid'];

$id1=$_GET["id"];

//echo $id1;


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

include("../conf.php");
//"SELECT `id`,upper(CONCAT(`desc`,'-', `capacity`,'-', `cmp_name`,'-', qty,'-',`storage`)) AS `desc` FROM `m_master_store`order by 2"

$query="SELECT a4.a4id,concat (a4.partyname,'-',a4.brokername,'-',a4.billno,'-', a4.date,'-', a4.bag,'-',a4.transportername) as a4details  FROM mandia4 a4 , purchase_order a1  
where a4.poid=a1.poid and a1.suppid = $id1 and a4.fid=$fid  ";  

//echo $query;




$result=mysql_query($query);
?>
<select class="form-control" name="district" onChange="h123(this.value)" style="width:190px"    >
<option>Select Purchase Order</option>
<?php while ($row=mysql_fetch_array($result)) { ?>
<option value=<?php echo $row['0']?>><?php echo $row['1']?></option>
<?php } ?>
</select>

</html>
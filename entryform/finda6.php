<?php
session_start();
//$fid=$_SESSION['fid'];

$fid=16;

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

$query="SELECT a6.siid,CONCAT('Billno-',a6.billno,'-',a6.partyname,'-',a6.billvalue1,'-', a6.billno,'-', DATE_FORMAT(a6.date,'%d/%m/%Y') ) as pdetails FROM mandia6 a6   
where  a6.supid = $id1 and a6.fid=$fid  ";  

//echo $query;




$result=mysql_query($query);

?>
<select class="form-control" name="district" onChange="h123(this.value)" style="width:190px">
<option>Select sales bill</option>
<?php while ($row=mysql_fetch_array($result)) { ?>
<option value=<?php echo $row['0']?>><?php echo $row['1']?></option>
<?php } ?>
</select>

</html>
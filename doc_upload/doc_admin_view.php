<?php

include('../conf.php');

session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

$fid=$_SESSION['fid'];


if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

if($_SESSION['securitylevel']!="ADMIN")

			{

				header('Location: ../doc_upload/doc_view_all.php');

				}			


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../entryform/jscode/printdiv.js"> </script>
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>

<style type="text/css">
<!--
.style1 {color: #0000FF}
.style2 {color: #FF3300}
.style3 {color: #FFFFFF}
.style4 {color: #990033}
-->
</style>



<script language="javascript">

function ValidateForm(){
	
	
		var dt=document.form1.firmname;
		var dt1=document.form1.category;
					
	    if (dt.value < 1 ){
		 alert('Please Select firm name');
		 dt.focus()
              return false  }
			  
			    if (dt1.value < 1){
		 alert('Please Select any category ');
		 dt.focus()
              return false  }
	  
	
		return true

	
}




</script>

<script language="javascript">

function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		} 	
		return xmlhttp;
    }
	

function deleterecord(deleteId) {
	
    if (confirm("Are you sure you want to delete this record  ?!") == true) {
	     	var strURL="doc_delete.php?id="+deleteId;
	var req = getXMLHTTP();
	if (req) {
				req.open("GET", strURL, true);
		req.send(null);
	}
		
	alert('Record deleted.');
	window.location='doc_admin_view.php';
	
	
	} else {
        x = "You pressed Cancel!";
    }

}


</script>




</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center">
  <h2 align="center"><span style="color:#F17327;"> FIRM DOCUMENTS DETAILS </span>
    <script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
</h2>
 
    <form name = "form1"  method="get" onSubmit="return ValidateForm()"  action="<?php echo $_SERVER['PHP_SELF']; ?>">

</br>


	
	<a href="index.php"> <h5>ADD NEW</h4></a>
	
    <table width="979" cellpadding="2" frame="box" rules="none">
	
<tr>
<td></td><td><div align="right"><span class="style4">SELECT CATEGORY</span></div></td>
<td colspan="2"><div align="left"></div></td>
</tr>


<tr>
  <td>&nbsp;</td>
  <td>SELECT FIRM NAME NAME </td>
  <td>SELECT CATEGORY </td>
  </tr>
<tr>
  <td height="41">&nbsp;</td>

<td><select name="firmname" style="width:170px">
                       <option> </option>
                       <?php               
				$query = mysql_query("SELECT fid,firmname from firmcreation  order by firmname ");
				while($row = mysql_fetch_array($query)){
					$fidd = $row['fid'];
					$firmname = $row['firmname'];
			?>
                       <option  value = <?php echo $fidd; ?> ><?php echo $firmname; ?></option>
                       <?php } ?>
                     
                     </select></td>
					 
	<td><select name="category" style="width:170px">
                       <option> </option>
                       <?php               
				$query = mysql_query("SELECT distinct fyear as fyear FROM upload ");
				while($row = mysql_fetch_array($query)){
							
					$fyear = $row['fyear'];
					
				
			
           echo"<option  >$fyear</option>"; 
                       } ?>
                     
                     </select></td>				 
					 
					 
					 
</tr>
<tr>
  <td>&nbsp;</td><td>&nbsp;</td>
<td><a href="javascript:NewCal('dstart','ddmmyyyy')">
  <input type="submit" name="submit" value="SHOW RECORDS" />
</a></td>
</tr>
</table>
</div>
</div>
</form>

<?php

include('../conf.php');

if(isset($_GET['submit']))
{


$fidd = $_GET['firmname'];
$category  = $_GET['category'];

$result1 = mysql_query("SELECT 	firmname from firmcreation  where fid = $fidd");
$row1 = mysql_fetch_array($result1);

$row1 = $row1['0'];


				   

?>
<form name = "form2"   ><div id="purchasecontainer">
 
  

 <div id = "griddiv">

 <h2>  <?php  echo $category; ?>   DETAILS FOR  : <?php  echo $row1; ?>  :   </h2>
<table>
  <?php
  $sno=1;
//ROBERT SORIANO 2015
	
	try {
	$query = "SELECT * FROM upload   where fid = $fidd  and fyear = '$category'  order by uid desc";
	$stmt = $dbc->prepare($query);
	$stmt->execute();
	echo "<table border='1' cellpadding='5'>";
	echo "<tr>";
	echo "<th>SNO</th>";
	echo "<th>DOC ID</th>";	
	echo "<th>FINANCILA YEAR</th>";
	echo "<th>DOCUMENT</th>";
	echo "<th>DESCRIPTION</th>";
	echo "<th>DOWNLOAD</th>";
	echo "<th>Delete</th>";
	echo "</tr>";
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
	echo "<tr>";
	echo "<td>{$sno}</td>";
	echo "<td>{$uid}</td>";
	echo "<td>{$fyear}</td>";
	echo "<td>{$fname}</td>";
	echo "<td>{$desc1}</td>";

	 echo "<td><a href='{$uppath}' download='{$fname}' >DOWNLOAD</a> </td>";

	 echo "<td> <input type='button' name='btnprint' value='Delete' onclick='deleterecord($uid)'/></td>";
  
	echo "</tr>";
	$sno=$sno+1;
	}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

?>
  </p>
 
    </table>
</div>
  



</div>






</div>
</div>
</div>
<script>
window.onload=happycode1234 ; 
</script>

</form>

<?php } ?>


</div>
</div>
</div>


  
</div>
</body>
</html>



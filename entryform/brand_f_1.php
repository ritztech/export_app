<?php




include("../conf.php");



?>
<?php
session_start();


if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }
$fid=$_SESSION['fid'];

$query_color1="SELECT `stockid`, `stockitem`  FROM `stockitem`  where fid = $fid";
$result_color1=mysql_query($query_color1);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="..//style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/yield.js">  </script>


<script language="javascript">

 function hledger112(thelist) {

	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
	
  

  document.form1.stkname.value = content;
  

  
		
}

function myFunction()
{
	
var p_val = document.form1.totalcnt.value;

if(p_val == "0")
{
	alert('Please  add brand name  .... ');
	return false;
	
}


	
document.getElementById("form1").submit();
	
}




</script>






</head>
<body>
<?php include('../include/header.php');?>
<?php include('../include/sidemenu.php');?>

<div align="center"><br>
  <h2 align="center"><span style="color: #F17327">JOURNAL VOUCHER</span></h2>
  <form id="form1" name="form1" method="post"  onSubmit="return ValidateForm()" action="brand_name_b1.php">
  


 <table border='1' cellpadding='1'    >
            <tr>
              <td width="208"><label for="textfield">Select Stock Item:</label></td>
                          <td>      <select name = "stk_m"  autofocus  tabindex = "1" onchange = "hledger112(this)" style="width:270px" >
      <option   value="" selected="selected"> </option>
      <?php 

	while($query_data = mysql_fetch_array($result_color1)){
	 
	 echo"<option  value = '{$query_data['0']}'>{$query_data['1']}  </option>"; 

	 }
	 ?> </select>  </td>
	 
            </tr>

			
		
 
 </table>
 
 </br>
 </br>
 
 

	
	<INPUT type="button"  tabindex = "2"  value="ADD Yield" onclick="addRow('dataTable',<?php echo $fid; ?>);" />

 

 <table  border='1' cellpadding='1'   id="dataTable"   >





<tr>

 



  <th>YIELD NAME</th> <th>PERCENTAGE</th>	

  </tr>
  

</table> 
</br>

<input type="button" tabindex = "4" style = "color:blue; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;"  onclick="myFunction()" value="SAVE"   />


<input  type = "hidden"  size = "5"   value =  "0" name = "totalcnt" id = "totalcnt"  /> 	
<input  type = "hidden"  size = "20" name = "stkname" id = "stkname"  /> 	

	
</form>
</div>

</body>
</html>

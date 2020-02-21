<?php
session_start();

$fid=$_SESSION['fid'];

if(!isset($_SESSION['uname'])) { header('Location: ../index.php'); }

include('../conf.php');


$query_color="SELECT `gid`,`gname`  FROM `godown`  order by 2 ";
$result_color=mysql_query($query_color);

$query_color1="SELECT `stockid`, `stockitem`  FROM `stockitem`  where fid = $fid";
$result_color1=mysql_query($query_color1);





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="../entryform/jscode/a4code_12.js"> </script>

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
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div>
<p>&nbsp;</p>
  <h2 align="center"><span style="color:#F17327;">CREATE YIELD MASTER</span></h2>
  
    
    <form id="form1" name="form1" method="post" action="brand_name_b1.php">
     
      <div align="center">
        <table width="517" border="1" rules="none" frame="box" cellpadding="8">
          <tbody>
            <tr>
              <td width="208"><label for="textfield">Select Stock Item:</label></td>
                          <td>      <select name = "stk_m"  autofocus  tabindex = "1" onchange = "hledger112(this)" style="width:170px" >
      <option   value="" selected="selected"> </option>
      <?php 

	while($query_data = mysql_fetch_array($result_color1)){
	 
	 echo"<option  value = '{$query_data['0']}'>{$query_data['1']}  </option>"; 

	 }
	 ?> </select>  </td>
	 
            </tr>



			
			
			
            <tr>
              <td>&nbsp;</td>
              <td> 
              <input type="button" tabindex = "4" style = "color:blue; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;"  onclick="myFunction()" value="SAVE"   /></td>
			  
			  
			  

 
			  
			  
			  
			  
            </tr>
          </tbody>
        </table>
		
		
	</br>
	
		
<INPUT type="button" tabindex = "2"  style = "color:red; font-weight:bold;height: 30px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;" value="ADD ITEM" onClick="addRow('dataTable',<?php echo $fid; ?>);" /> 

		</br>
		</br>
		
		<table  id="dataTable"  border='1' cellpadding='1' frame="box"    >


<tr> <th>BRAND NAMES </th>   <th> PERCENTAGE </th>  </tr> 

</table>

		
<input  type = "hidden"  size = "5"   value =  "0" name = "totalcnt" id = "totalcnt"  /> 	
<input  type = "hidden"  size = "20" name = "stkname" id = "stkname"  /> 		
		
		
      </div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>
        <label for="textfield2"><br />
        </label>
      </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </form>
    <p>&nbsp;</p>
  </blockquote>
</div>
<?php include('../include/footer.php');?>
</body>
</html>

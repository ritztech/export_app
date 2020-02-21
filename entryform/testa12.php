<?php

$fid = 47;

?>

<html>

<head>


<script language="javascript" type="text/javascript" src="jscode/bankgrid.js">  </script>


</head>

<body>

<form name = "form1" method="post" action="test2.php"  >

 <INPUT type="button" value="ADD ITEM" onclick="addRow('dataTable',<?php echo $fid; ?>);" />
 
 <table   id="dataTable" border='1' cellpadding='1'   >

<tr>
<th>  Grand </th> <th>  Total </th> <th>  ***** </th> 
    <th> <input  type = "text"  size = "3" name = "tamount" id = "totbag" /> </th>
   <th> <input  type = "text"  size = "5" name = "tbcharges" id = "totgrsweight" /> </th>
   <th> <input  type = "text"  size = "5" name = "tbtotal" id = "totmandi" />  </th> 

</tr>
<tr>
 

  <th>BANK NAME</th> <th>BRANCH</th><th>CHK NO/DD NO</th> <th> AMOUNT </th>  <th>  BANK CHARGES </th>  <th>  TOTAL </th> <th>  MODE OF PAY </th> <th>  REMARK </th>  </tr>
  
 
</table> 


<input  type = "text"  size = "5" name = "totalcnt" id = "totalcnt" /> 


<input type="submit" name="submit" style = "color:black; font-weight:bold;height: 25px; width: 100px; font:"Times New Roman", Times, serif; font-size:14px;"  value="SAVE"> 


</form>



</body>
</html> 
<?php

$fid = 47;

?>

<html>

<head>


<script language="javascript" type="text/javascript" src="jscode/a14code.js">  </script>


</head>

<body>

<form name = "form1" method="post" action="test2.php"  >



 
 
 

 <table width="954" border='1' cellpadding='1'   id="dataTable12"   >
 
 <tr>  <td> DATE  </td>  
 <td> DD/MM/YYYY </td> 
 </tr>
 <tr>  <td>  STOCK ITEM ISSUE</td>  <td>  WHEAT  </td> </tr>
 <tr>  <td> GOODS - OUT QTY. </td>  <td> 100 </td> </tr>
 <tr>  <td> GOODS - OUT VALUE.  </td>  <td> 200 </td> </tr>
 
 </table>
 
 </br>
 
 
  <INPUT type="button" value="ADD ITEM" onClick="addRow('dataTable',<?php echo $fid; ?>);" />
  
 
 <table   id="dataTable" border='1' cellpadding='1'   >

<tr>
 

  <th>STOCK ITEM</th> <th>GOODS - INPUT QTY.</th><th>GOODS - INPUT VALUE</th> 
  
  </tr>
  
 

</table> 


<input  type = "text"  size = "5" name = "totalcnt" id = "totalcnt" /> 


<input type="submit" name="submit" style = "color:black; font-weight:bold;height: 25px; width: 100px; font:"Times New Roman", Times, serif; font-size:14px;"  value="SAVE"> 


</form>



</body>
</html> 
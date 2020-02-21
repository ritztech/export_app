<?php

$fid = 47;

?>

<html>

<head>


<script language="javascript" type="text/javascript" src="jscode/a4code.js">  </script>


</head>

<body>

<form name = "form1" method="post" action="test2.php"  >


 <INPUT type="button" value="ADD ITEM" onclick="addRow('dataTable',<?php echo $fid; ?>);" />
 
 <table   id="dataTable" border='1' cellpadding='1'   >

  <tr>
   <th>TOTAL</th> 
   <th> <input  type = "text"  size = "3" name = "totbag" id = "totbag" /> </th>
   <th> <input  type = "text"  size = "5" name = "totgrsweight" id = "totgrsweight" /> </th>
   <th> <input  type = "text"  size = "5" name = "totmandi" id = "totmandi" />  </th> 
   <th> <input  type = "text"  size = "5" name = "totbilwght" id = "totbilwght" />     </th>
   <th> <input  type = "text"  size = "5" name = "totrot" id = "totrot" />  </th>	
   <th> <input  type = "text"  size = "5" name = "totrog" id = "totrog" />  </th>
   <th> <input  type = "text"  size = "5" name = "totvalue" id = "totvalue" />  </th> 
   <th> <input  type = "text"  size = "5" name = "totvto" id = "totvto" />  </th>
    <th> <input  type = "text"  size = "5" name = "totbillv" id = "totbillv" />  </th>
</tr>

<tr>
 

  <th>ITEM NAME</th> <th>BAG</th><th>GROSS WEIGHT</th> <th> MANDI GATE PASS WT </th> <th>  BILLING WEIGHT </th>	<th> RATE OF TAX(in %) </th>	<th> RATE OF GOODS </th>	<th>VALUE </th>	<th>VAT TAX - OUTPUT</th>	<th>BILL VALUE</th>
  
  </tr>
  
 

</table> 


<input  type = "text"  size = "5" name = "totalcnt" id = "totalcnt" /> 


<input type="submit" name="submit" style = "color:black; font-weight:bold;height: 25px; width: 100px; font:"Times New Roman", Times, serif; font-size:14px;"  value="SAVE"> 


</form>



</body>
</html> 
<?php

include ('sample1_head.php');
include("config.php");


$billinfo=mysql_query("SELECT ordno,sell_id FROM m_auto_id");

$bill_res = mysql_fetch_array($billinfo);

$ord_no = $bill_res['0'];
$bill_seq = $bill_res['1'];

//echo $ord_no;



?>
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/try.css" />
<script language="javascript" type="text/javascript" src="jscode/printdiv.js"> </script>
<script language="javascript">



function print_record(deleteId) {
	
   
PrintMe('griddiv');
	
}



</script>
<style>

input[type=text], textarea {
  -webkit-transition: all 0.30s ease-in-out;
  -moz-transition: all 0.30s ease-in-out;
  -ms-transition: all 0.30s ease-in-out;
  -o-transition: all 0.30s ease-in-out;
  outline: none;
  padding: 3px 0px 3px 3px;
  margin: 5px 1px 3px 0px;
  border: 1px solid #DDDDDD;
  width:250px;
}
 
input[type=text]:focus, textarea:focus {
  box-shadow: 0 0 5px rgba(81, 203, 238, 1);
  padding: 3px 0px 3px 3px;
  margin: 5px 1px 3px 0px;
  border: 1px solid rgba(81, 203, 238, 1);
}
</style>
</head>

<body>
 
<form  name = "form1" action = "add_order_Seq_bck.php"  method = "post" >

<h2 align="center"> ORDER SEQUENCE   </h2>


<table width="500" border="1" align="center" style="font-weight:bold;">
  <tbody>
    <tr>
      <td>ORDER NO.:</td>
      <td><input type = "text" size = "25" autofocus name = "clname"  value = "<?php   echo $ord_no ?>" required id = "clname"/></td>
    </tr>
	    <tr>
      <td>Bill NO.:</td>
      <td><input type = "text" size = "25"  name = "billseq"  value = "<?php   echo $bill_seq ?>" required id = "billseq"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td> <input type='submit' value='SAVE' /></td>
    </tr>
  </tbody>
</table>







</div>

</form>

</body>
</html> 
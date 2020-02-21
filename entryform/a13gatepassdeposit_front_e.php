<?php

include("../conf.php");
$a13refid=$_GET["a13refid"];

$query = "SELECT `a13refid`,DATE_FORMAT(depositdate,'%d/%m/%Y') as depositdate, `bagqty`, `bagvalue`, `goodsvalue`, `fid` FROM `mandi13_ref`  WHERE a13refid=";

$result11 = mysql_query("SELECT `a13refid`,DATE_FORMAT(depositdate,'%d/%m/%Y') as depositdate, `bagqty`, `bagvalue`, `goodsvalue`, `fid` 
FROM `mandi13_ref`  WHERE a13refid= $a13refid");
$row11 = mysql_fetch_array($result11);
	  

?>
<?php
session_start();
if(!isset($_SESSION['uname'])) { echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }
$fid=$_SESSION['fid'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="..//style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/a13code_e.js">  </script>




<script language="javascript" type="text/javascript" >

function ValidateForm(){



    var dt=document.form1.totalcnt

	    if (dt.value=="0"){
alert('Please add records ....');
	           dt.focus()

              return false

    }
	

	    var dt=document.form1.depositdate

	    if (isDate(dt.value)==false){

	           dt.focus()

              return false

    }
	
	

var tcnt = document.form1.totalcnt.value;


for (var init=2; init<=tcnt; init++)
  {
    
	var dt=document.form1[ "inwarddate" + init ]
	
	//alert(dt.value);
	    if (isDate(dt.value)==false){
			
	           dt.focus()
              return false
    }
	
	
	

		var dt=document.form1[ "suppliername" + init ].value
	  	
	    if (dt=="0"){
		 alert('Please Select party name');
		 document.form1[ "suppliername" + init ].focus();
              return false
        }
	
		var dt=document.form1[ "item" + init ].value
	  	
	    if (dt=="0"){
		 alert('Please Select stock item');
		 document.form1[ "item" + init ].focus();
              return false
        }
	

	
	
	
 }
 
 return true 
 
 
}

 
 
 

</script>



</head>
<body>
<?php include('../include/header.php');?>
<?php include('../include/sidemenu.php');?>

<div align="center"><br>
  <h2 align="center"><span style="color:#F17327;">mandi gate pass deposit form</span>    </h2>
  <form id="form1" name="form1" method="post"   onSubmit="return ValidateForm()"  action="a13gatepassdeposit_back_e.php">
  <table  border="1" cellpadding="6" frame="box" rules="none">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Gate Pass Details</h4></td>
        </tr>
        
        <tr>
          <td height="38" colspan="4">Deposite Date: 
            <input id="dstart"   name = "depositdate"  value = "<?php  echo $row11['depositdate'] ?>"  onchange = "isDate(this.value)"   type = "text"  size="17" required="required"   />  <a href="javascript:NewCal('dstart','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
        </tr>
        <tr>
          <td height="38" colspan="4"><INPUT type="button" value="ADD ITEM" onclick="addRow('dataTable',<?php echo $fid; ?>);" />
 
 <table width="982" border='1' cellpadding='1'   id="dataTable"   >

  <tr>
   <th>TOTAL</th> 
   <th>  </th>
   <th>  </th>
   <th>  </th> 
   <th> <input  type = "text"  size = "5" name = "totbilwght" id = "totbilwght" />     </th>
   <th> <input  type = "text"  size = "5" name = "totrot" id = "totrot" />  </th>	
   <th> <input  type = "text"  size = "5" name = "totrog" id = "totrog" />  </th>
<th>  </th>
<th>  </th>
    
</tr>

<tr>
 

  <th>SUPPLIER</th> <th>ITEM NAME</th> <th>SAMITI NAME</th><th>GATE PASS NO</th> <th> BAG QTY </th> <th>  BAG VALUE </th>	<th>VALUE OF GOODS </th>	<th>INWARD DATE</th>	<th>REMARK</th>	
  
  </tr>
  
 

</table> 


<input  type = "hidden"  size = "5" name = "totalcnt" id = "totalcnt"  value = "0" /> 

<input  type = "hidden"  size = "5" name = "getpadde" id = "getpadde"  value = "<?php echo $a13refid ?>" /> 

 &nbsp;</td>
        </tr>      
        <tr>
          <td width="197">&nbsp;</td>
          <td width="286">&nbsp;</td>
          <td width="100"><input type="submit" name="s" id="submit" value="Submit Record" /></td>
          <td width="351">&nbsp;</td>
        </tr>
      
    </table>
  <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
	
	
 <?php	
	
$result13 = mysql_query("SELECT `gpid`, `fid`, `suppliername`, `stockitem`, `msamiti`, `gatepassno`, `bagqty`, `valueqty`, `goodsvalue`,
 DATE_FORMAT(inwarddate,'%d/%m/%Y') as inwarddate, `remark`,suppid,stkid FROM `mandi13` WHERE gpid=$a13refid");

 
 
$i = 1;
while($row13 = mysql_fetch_array($result13))
  { ?>	
	
	<script>
	
addRow_u('dataTable',<?php echo $fid; ?>,"<?php echo $row13['stkid']  ?>","<?php echo $row13['suppid'] ?>","<?php echo $row13['msamiti'] ?>","<?php echo $row13['gatepassno'] ?>","<?php echo $row13['bagqty'] ?>","<?php echo $row13['valueqty'] ?>","<?php echo $row13['goodsvalue'] ?>","<?php echo $row13['inwarddate'] ?>","<?php echo $row13['remark'] ?>");
	
	
	</script>
	
	
  <?php } ?>
	
	
	
	
	
	
	
	
	
	
	
</form>&nbsp;
</div>

</body>
</html>

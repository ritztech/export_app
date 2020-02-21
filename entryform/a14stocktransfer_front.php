<?php
session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

$fid=$_SESSION['fid'];
?>
<?php

include("../conf.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="../style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="jscode/a14code_1.js">  </script>
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>


<script language="javascript">

function shortaccess1() {
	
var j = document.form1.totalcnt.value;

var outqty = document.form1.outqty.value;
	
var shortvalue = 0;
	
for (var i=1; i<=j; i++)
  {
	
  var bag = eval("document.form1.bagg"+i+".value");
  
  
  shortvalue = Number(shortvalue) + Number(bag);
 var a_val = shortvalue - outqty;
 
  document.form1.shortvalue.value = a_val.toFixed(2);
 
 

	
  }
  
  var shortdesc = document.form1.shortvalue.value;
  
if (shortdesc < 0) {
    shortdescval = "SHORT";
} else if (shortdesc > 0) {
	   shortdescval = "ACCESS";
} else {
   shortdescval = "MATCH";
}


document.form1.shortaccess.value = shortdescval; 
  
  	
	
}


function shortaccess1234(ivalue) {
	
//	alert('hi');
	
var j = document.form1.totalcnt.value;

	
for (var i=1; i<=j; i++)
  {
	
  var bag = eval("document.form1.perct"+i+".value");
  
  var calval = bag*ivalue/100;
  document.form1[ "bagg" + i ].value  = calval.toFixed(2);;
	
}

shortaccess1();
}




 function hledger111(thelist) {

	
	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
	
  
  document.form1.stkid.value = content;
  
 // document.form1[ "stkname" + icnt ].value  = content;
  
		
}


function ValidateForm(){
	    var dt=document.form1.stockdate
	    if (isDate(dt.value)==false){
	           dt.focus()
              return false
    }
	  	

		var dt=document.form1.stockitem;
					
	    if (dt.value < 1){
		 alert('Please Select stock item ...');
		 		 dt.focus()
              return false  }
	
	
		var dt=document.form1.totalcnt;
					
	    if (dt.value =="0"){
		 alert('Please add input items ... ');
		 dt.focus()
              return false  }
			  
			  
		var dt=document.form1.item1.value;
		//alert(dt);
			

	    if (dt=="0"){

		 alert('Please Select stock item');
		  document.form1.item1.focus();

              return false

    }
	
			  
			  
	return true
	}
	
	



</script>





</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center"><br>
  <h2 align="center"><span style="color:#F17327;">stock transfer</span></h2>
  
<form name = "form1" method="post"  onSubmit="return ValidateForm()"   action="a14stocktransfer_back.php"  >



 
 
 

 <table width="644" border='1' cellpadding='1'   id="dataTable12" frame="box" rules="none"  >
 
 <tr>  <td width="260"> DATE  </td>  
 <td width="434"><input id="saudadate"   autofocus  name = "stockdate" onchange = "isDate(this.value)"   type = "text"  size="17" required="required" />
        <a href="javascript:NewCal('saudadate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </td> 
 </tr>
 <tr>  <td>  STOCK ITEM ISSUE</td>  <td><label>
   
   <select name="stockitem"  onchange = "hledger111(this)" style="width:150px">
                       <option value = "0"> </option>
                       <?php               
				$query = mysql_query("SELECT * FROM stockitem where fid=$fid");
				while($row = mysql_fetch_array($query)){
					$stockid = $row['stockid'];
					$stockitem = $row['stockitem'];
			?>
                       <option value = "<?php  echo $stockid ?>" ><?php echo $stockitem; ?></option>
                       <?php } ?>
                     
          </select>
   
 </label></td> 
 </tr>
 <tr>  <td> GOODS - OUT QTY. </td>  <td><input type="text"  onkeyup = "shortaccess1234(this.value)" name="outqty" /></td> 
 </tr>
 <tr>  <td> GOODS - OUT VALUE.  </td>  <td><input type="text" name="outvalue" /></td> </tr>

 
 
 <tr>  <td colspan="2" bgcolor="#14C4B6"> <h4>Add Stock Items </h4></td> </tr>
 <tr>
 <td colspan="2">
  <INPUT type="button" value="ADD ITEM" onClick="addRow('dataTable',<?php echo $fid; ?>);" />
  
 
 <table   id="dataTable" border='1' cellpadding='1' width="635"   >

<tr>
 

  <th>STOCK ITEM</th> <th>GOODS - INPUT QTY.</th><th>GOODS - INPUT VALUE</th>  <th>Percentage</th> 
  
  </tr>
  
 

</table> 







 </td>
 </tr>
 
  <tr>  <td> SHORT/ACCESS VALUE  </td>  <td><input type="text" name="shortvalue" /></td> </tr>
 <tr>  <td> SHORT/ACCESS  </td>  <td><input type="text" name="shortaccess" /></td> </tr>
 
 </table>
 
 <input type="submit" name="s" style = "color:black; font-weight:bold;height: 25px; width: 100px; font:"Times New Roman", Times, serif; font-size:14px;"  value="SAVE"> 

 
 
 <input  type = "hidden"  size = "5" name = "totalcnt" id = "totalcnt"  value = "0" /> 
<input  type = "hidden"  size = "5" name = "stkid" id = "stkid" /> 

 
 
</form> 

</div>

</body>
</html>

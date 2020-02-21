<?php
include("../conf.php");
session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}
$fid=$_SESSION['fid'];
?>
<?php
$query_dispMake="SELECT legid,leg_name   FROM ledger_master where fid=$fid ";
$result_dispMake=mysql_query($query_dispMake);

?>
<?php 

if(isset($_POST['s'])) {
	
	
	
           $suppliername=$_POST['suppliername'];
           $type =$_POST['type'];
           $amount =$_POST['tamount'];
		   $bankcharges =$_POST['tbcharges'];
		   $total =$_POST['tbtotal'];
		   $saudadate=$_POST['saudadate'];
           $billid	=$_POST['billid'];
		   $district= trim(strip_tags(addslashes($_POST['district'])));
		   $newa4id= trim(strip_tags(addslashes($_POST['newa4id'])));
		   
		     $province= trim(strip_tags(addslashes($_POST['supid11'])));
		   
		   
		   
		   
		      
			   
	 if ($district == "Select Purchase Order")
       {   $district =  $newa4id;      }

   		   
	 if ($district == "Select Purchase Bill")
       {   $district =  $newa4id;      }
   
		   

	$query = "UPDATE mandia7 SET
	        suppliername='$suppliername',
            type ='$type',
            amount ='$amount',
			bankcharges ='$bankcharges',
			total ='$total',
			saudadate=STR_TO_DATE('$saudadate','%d/%m/%Y'),
			a4id =$district,
			supid = '$province'
            WHERE billid='$billid'";
	        mysql_query($query);
	 //echo $query;
	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
 
  
  //  sudhir


	 if (!mysql_query($query,$connection))
  {
  die('Error: ' . mysql_error());
  }
  

	$j = $_POST['totalcnt'];
	$k = $_POST['totalcnt1'];
	$l = $k+1;
	
	$qry1 = "DELETE FROM mandia7_ref WHERE tempid  = 'A7' and formid = $billid ";
	
mysql_query($qry1,$connection);

	if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }   
    

	
	for($i=2; $i <= $k; $i++) {
	

    $qry2="INSERT INTO mandia7_ref(bankname,formid,branch,chequeno,amount,bankcharges,total,modeofpay,remark,tempid,ledger_id)
VALUES ('{$_POST['bname'.$i]}','$billid','{$_POST['bbranch'.$i]}','{$_POST['chkno'.$i]}','{$_POST['amount'.$i]}','{$_POST['bcharges'.$i]}','{$_POST['btotal'.$i]}','{$_POST['modepay'.$i]}','{$_POST['bremark'.$i]}','A7','{$_POST['ledger'.$i]}')";
	
		
	
	if (!mysql_query($qry2,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
	  
	
}






	 if ($j > $k)
       { 
   
   	for($i=$l; $i <= $j; $i++) {
		
			 $result11 = mysql_query("SELECT leg_name   FROM ledger_master where legid =  '{$_POST['bname'.$i]}'");

      $row11 = mysql_fetch_array($result11);

    $qry2="INSERT INTO mandia7_ref(bankname,formid,branch,chequeno,amount,bankcharges,total,modeofpay,remark,tempid,ledger_id)
VALUES ('$row11[0]',$billid,'{$_POST['bbranch'.$i]}','{$_POST['chkno'.$i]}','{$_POST['amount'.$i]}','{$_POST['bcharges'.$i]}','{$_POST['btotal'.$i]}','{$_POST['modepay'.$i]}','{$_POST['bremark'.$i]}','A7','{$_POST['bname'.$i]}')";
	
			
	
	if (!mysql_query($qry2,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	  echo "<script>alert('Data updated successfully.');location.href='a7billspayment_edit.php?billid=$billid'</script>"; 
		  
  }    
  
       }

 }
 
  if ($j = $k)
       { 
   
   echo "<script>alert('Data updated successfully.');location.href='a7billspayment_edit.php?billid=$billid'</script>";
   
	   }
	   
	   
	   

}
?>
<?php

try {
$query = "SELECT `billid`, `supid`, `a4id`, `fid`, `suppliername`, `type`, `entrydate`,DATE_FORMAT(saudadate,'%d/%m/%Y') as saudadate, `amount`, 
`bankcharges`, `total`,supid FROM `mandia7` WHERE billid=?";
$stmt = $dbc->prepare($query);
$stmt->bindParam(1, $_GET['billid']);
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
            
			
			$suppliername =$row['suppliername'];
			
			$supid11 =$row['supid'];
			
            $type =$row['type'];
			$amount =$row['amount'];
			$bankcharges =$row['bankcharges'];
			$total =$row['total'];
			$saudadate =$row['saudadate'];
            $billid = $row['billid'];
			$newa4id =  $row['a4id'];
			
} catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sunrise Associates</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link href="..//style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>
<script language="javascript" type="text/javascript" src="jscode/bankgrid.js">  </script>


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
	

function getDistrict(provinceId) {		
	var strURL="finda4.php?id="+provinceId;
	var req = getXMLHTTP();
	if (req) {
		req.onreadystatechange = function() 
		{
			if (req.readyState == 4) {
			// only if "OK"
				if (req.status == 200) {						
					document.getElementById('districtdiv').innerHTML=req.responseText;
					document.getElementById('communediv').innerHTML=req.responseText;					
				} else {
					alert("Problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
	}	

document.form1.type.value = "ADVANCE";	
}



function h123(str)
{
	

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var fruits = xmlhttp.responseText;
	var arfruits = fruits.split(',');
	

document.form1.suppliername.value = arfruits[0];
document.form1.type.value = "AGAINST";




	
    }
  }
xmlhttp.open("GET","get_a4_details.php?q="+str,true);
xmlhttp.send();



}

function h456(thelist,l_value){

	var idx = thelist.selectedIndex;
	var content = thelist.options[idx].innerHTML;
  
  document.form1.suppliername.value = content;
  document.form1.supid11.value = l_value;
 

}




function ValidateForm(){



    var dt=document.form1.saudadate

	    if (isDate(dt.value)==false){

	           dt.focus()

              return false

    }

	
	return true 

 

}




function phappycode1(){
document.form1.type.value = document.form1.s1.value;
}


</script>


</head>
<body>
<?php include('../include/header.php'); ?>
<?php include('../include/sidemenu.php');?>

<div align="center"><br>
  <h2 align="center"><span style="color:#F17327;"> Edit Bill Payment Details</span>    </h2>
  <form id="form1" name="form1"  onSubmit="return ValidateForm()"  method="post" action="">
  <table width="749" border="1" rules="none" frame="box" cellpadding="6">
      <tbody>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Basic Details</h4></td>
        </tr>
        <tr>
          <td width="128"><label for="select">Party Name:</label></td>
          <td colspan="2"><select  onChange="getDistrict(this.value),h456(this,this.value)"  name="province" id="province" style="width:160px">
              <option   value="" selected="selected"> </option>
              <?php 

	while($query_data = mysql_fetch_array($result_dispMake)){
	 
	 echo"<option  value = {$query_data['legid']}>{$query_data['leg_name']}</option>"; 

	 }
	 ?> 
            </select></td>
          
          <td width="267">Transaction Date:
          <input id="saudadate"   name = "saudadate" onchange = "isDate(this.value)"   type = "text"  size="17" required="required" value="<?php echo $saudadate?>" />
          <a href="javascript:NewCal('saudadate','ddmmyyyy')"><img src="../img/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a> </td>
        </tr>
        <tr>
          <td height="40">Purchase Bills</td>
          <td colspan="2"><div id="districtdiv">
           	  <select name="district" class="form-control"   >
                        	<option>Select Purchase Bill</option>
           	  </select>
               	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;</div> </td>
          
		
		
          <td><label for="textfield">Payment Type:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" readonly  value="<?php echo $type?>"  name="type" size="15" />
          </label></td>
          
          <input  type = "hidden"  size = "5" name = "newa4id"  value="<?php echo $newa4id?>" />      </tr>
        <tr>
          <td colspan="4"  bgcolor="#14C4B6"><h4>Bank Details</h4></td>
        </tr>
        <tr>
          <td><label for="textfield">Party Name:</label></td>
          <td colspan="2"><input type="text" name="suppliername"  readonly  id = "suppliername" size="45" value="<?php echo $suppliername?>"/></td>
        
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="35" colspan="4"><INPUT type="button" value="ADD ITEM" onClick="addRow('dataTable',<?php echo $fid; ?>);" />
 
 <table   id="dataTable" border='1' cellpadding='1'   >

<tr>
<th>  Grand </th> <th>  Total </th> <th>  ***** </th> 
    <th> <input  type = "text"  size = "3" name = "tamount" id = "totbag"  value="<?php echo $amount; ?>"/> </th>
   <th> <input  type = "text"  size = "5" name = "tbcharges" id = "totgrsweight" value="<?php echo $bankcharges; ?>" /> </th>
   <th> <input  type = "text"  size = "5" name = "tbtotal" id = "totmandi"  value="<?php echo $total; ?>"/>  </th> 
</tr>
<tr>
 

  <th>ACCOUNTING LEDGER </th> 
  <th>BRANCH</th><th>CHK NO/DD NO</th> <th> AMOUNT </th>  <th>  BANK CHARGES </th>  <th>  TOTAL </th> <th>  MODE OF PAY </th> <th>  REMARK </th>  </tr>
  <?php 
$result13 = mysql_query("SELECT `bankname`, `formid`, `branch`, `chequeno`, `amount`, `bankcharges`, `total`, `modeofpay`, `remark`, `tempid` ,ledger_id FROM `mandia7_ref` WHERE formid=$billid
and tempid='A7'");
?>
  <?php
 
$i = 1;
while($row13 = mysql_fetch_array($result13))
  {   $i = $i + 1; ?>
 
 <tr>
   
   <td> <input type = "text" size="25" name = "bname<?=  $i ?>"   value = "<?= $row13['0'] ?>" />  </td>
   <td> <input type = "text" size="20" name = "bbranch<?=  $i ?>" value = "<?= $row13['2'] ?>" />  </td>
   <td> <input type = "text" size="8"  name = "chkno<?=  $i ?>" value = "<?= $row13['3'] ?>" />  </td>
   <td> <input type = "text" size="6" onkeyup = "itemcalc()"  name = "amount<?=  $i ?>" value = "<?= $row13['4'] ?>" />  </td>
   <td> <input type = "text" size="4" onkeyup = "itemcalc()"  name = "bcharges<?=  $i ?>" value = "<?= $row13['5'] ?>" />  </td>
   <td> <input type = "text" size="6" name = "btotal<?=  $i ?>" value = "<?= $row13['6'] ?>" />  </td>
   <td> <input type = "text" size="8"  name = "modepay<?=  $i ?>" value = "<?= $row13['7'] ?>" />  </td>
   <td> <input type = "text" size="20" name = "bremark<?=  $i ?>" value = "<?= $row13['8'] ?>" />  </td>
    <td> <input type = "hidden" size="20" name = "ledger<?=  $i ?>" value = "<?= $row13['10'] ?>" />  </td>
  
  
    
</tr>
 <?php  }    ?>
</table> 


<input  type = "hidden"  size = "5" name = "totalcnt1" id = "totalcnt1"  value = "<?= $i ?>"  /> 


<input  type = "hidden"  size = "5" name = "totalcnt" id = "totalcnt"  value = "<?= $i ?>"  /> 
<input  type = "hidden"  size = "5" name = "billid"  value="<?php echo $billid?>" /> 
&nbsp;</td>
        </tr>
        
      <tr>
          <td height="35"></td>
          <td></td>
          <td><input type="submit" name="s" id="submit" value="Submit" /></td>
          <td></td>
        </tr>
    </table>
  <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
	
	<input type="hidden" name="supid11" value="<?php echo $supid11; ?>" />
	
	
</form>&nbsp;
</div>
</body>
</html>

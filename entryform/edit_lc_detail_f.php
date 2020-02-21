<?php
session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }


$lcidd=$_GET['siid'];

require '../conf.php';

//$qry="SELECT `tab_auto_id`, `issue_branch`, DATE_FORMAT(date_of_issue,'%d/%m/%Y') as date_of_issue, DATE_FORMAT(lc_date,'%d/%m/%Y') as lc_date, `currency`, `amt_of_lc`, `form_of_lc`, `tolerance`, DATE_FORMAT(expdate,'%d/%m/%Y') as expdate, `exp_place`, `advise_bank`, `benefeitiary_details`, `othersss`, `proforma_id`, `lcnumber` FROM `proforma_lc_details` FROM `proforma_lc_details` WHERE tab_auto_id = $lcidd";
//echo $qry;

$result1_cur = mysql_query("SELECT `tab_auto_id`, `issue_branch`, DATE_FORMAT(date_of_issue,'%d/%m/%Y') as date_of_issue, DATE_FORMAT(lc_date,'%d/%m/%Y') as lc_date, `currency`, `amt_of_lc`, `form_of_lc`, `tolerance`, DATE_FORMAT(expdate,'%d/%m/%Y') as expdate, `exp_place`, `advise_bank`, `benefeitiary_details`, `othersss`, `proforma_id`, `lcnumber` FROM `proforma_lc_details`  WHERE tab_auto_id = $lcidd");
$row1_lcdeatils = mysql_fetch_array($result1_cur);

$curr_zz_id=$row1_lcdeatils['currency'];
$prodiddd_id=$row1_lcdeatils['proforma_id'];

?>


<html><head><meta content="text/html;charset=utf-8" http-equiv="Content-Type"><meta content="utf-8" http-equiv="encoding"> 
		<style>
			table { font-size:11px;border-collapse: collapse; }
			
			
			
		</style>
		
	
<script language="javascript" type="text/javascript" >	
		
		function jumpto(){

document.getElementById("toExcel").deleteRow(0);

window.history.back();
window.print();
			
	
}



function validform()
{
	
	



var dt=document.form1.dateofissue
   if (isDate(dt.value)==false){
           dt.focus()
             return false
    }
	
	var dt=document.form1.lcdates
   if (isDate(dt.value)==false){
           dt.focus()
             return false
    }
	
	
	var dt=document.form1.expdates
   if (isDate(dt.value)==false){
           dt.focus()
             return false
    }
	
	
	
	
	

	return true
}

</script>

<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>


<link href="..//style.css" rel="stylesheet" type="text/css" />
    <link href="js/jquery-ui.css" rel="stylesheet">
      <script src="js/jquery-1.10.2.js"></script>
      <script src="js/jquery-ui.js"></script>
	  
	  


		
		</head>
		
<?php  include('../include/sidemenu.php');?>

<form id="form1" name="form1" method="post"  onsubmit = "return validform();" action="add_lc_edit_bck.php">		
		
		
<table  align="center"    width="50%"  id="toExcel" border="2" style="border:1px solid #000;" cellpadding="4">
		
		<tr>
<td align = "center" colspan="8"> 
<input type="button" name="CloseMe" value="Close Me" onClick="window.history.back();"/>
  </td> </tr>



			<tr>
				<td colspan="8" style="border:1px solid #000;"><p style="font-size:14px;font-weight:bold;margin-bottom:5px;" align="center">EDIT LC DETAILS </b><br></p></td>
			</tr>
			
			
</table>
</br>
  </br>
  
  

<table  width="45%"  align="center"   style="font-weight:bold;font-size:15">

<tr> <td>  LC Number  </td>  <td>   <input type="text"   size="50"  name="lcnumber"  value="<?php echo $row1_lcdeatils['lcnumber'] ?>" /></td>  </tr>
<tr> <td>  Issueing Branch & Address  </td>  <td>   <input type="text" value="<?php echo $row1_lcdeatils['issue_branch'] ?>"  size="50"  name="issuebranch"  /></td>  </tr>
<tr> <td> Date of Issue </td>  <td>   <input type="text" size="50" value="<?php echo $row1_lcdeatils['date_of_issue'] ?>"  id="dateofissue" onchange = "isDate(this.value)"     name="dateofissue"  /></td>  </tr>
<tr> <td>  LC DATE  </td>  <td>   <input type="text"  size="50" value="<?php echo $row1_lcdeatils['lc_date'] ?>"  onchange = "isDate(this.value)"  name="lcdates"  /></td>  </tr>
<tr> <td>  Currency  </td>  <td>     <select name="currency" style="width:150px">
                                   <?php               
				$query = mysql_query("SELECT `tab_auto_id`, `curr_name` FROM `currency_master`");

				while($row = mysql_fetch_array($query)){

					$brid = $row['tab_auto_id'];

					$brokername = $row['curr_name'];

			?>

                       <option value = "<?php echo $brid; ?>"> <?php echo $brokername; ?></option>

                       <?php } ?>

          </select>
		      </td>  </tr>
<tr> <td>  Amount of LC </td>  <td>   <input type="text"  value="<?php echo $row1_lcdeatils['amt_of_lc'] ?>" required="required" size="50"  name="amountlccc"  /></td>  </tr>
<tr> <td>  Form of LC  </td>  <td>   <input type="text" value="<?php echo $row1_lcdeatils['form_of_lc'] ?>"  size="50"   name="formlccc"  /></td>  </tr>
<tr> <td>  Tolerance </td>  <td>   <input type="text"  value="<?php echo $row1_lcdeatils['tolerance'] ?>"  size="50"   name="tolerence"  /></td>  </tr>

<tr> <td>  Expiriry Date </td>  <td>   <input type="text" value="<?php echo $row1_lcdeatils['expdate'] ?>"  size="50" onchange = "isDate(this.value)"  name="expdates"  /></td>  </tr>
<tr> <td>  Expiriry Place </td>  <td>   <input type="text" value="<?php echo $row1_lcdeatils['exp_place'] ?>"   size="50"  name="expplacess"  /></td>  </tr>
<tr> <td>  Advising bank  </td>  <td>   <input type="text"  value="<?php echo $row1_lcdeatils['advise_bank'] ?>"  size="50"  name="advbanksss"  /></td>  </tr>
<tr> <td>  Beneficiary Details </td>  <td>   <input type="text" value="<?php echo $row1_lcdeatils['benefeitiary_details'] ?>"  required="required"  size="50"  name="benefedetailsss"  /></td>  </tr>
<tr> <td>  Other Details </td>  <td>   <input type="text"  size="50" value="<?php echo $row1_lcdeatils['othersss'] ?>"   name="otherdetailsss"  /></td>  </tr>



        <tr>

          <td>  </br>
  </br>
  
	
	<input type="hidden"   value="<?php echo $lcidd ?>" name="lcidddd"  />
		<input type="hidden"   value="<?php echo $prodiddd_id ?>" name="profrid"  />
	
	
	
	
	
	<input type="submit" style = "color:blue; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;"   name="s" id="submit" value="UPDATE" />
	
	
	</td>

          <td>&nbsp;</td>

        </tr>
		

</table>
	
	  <script>

document.form1.currency.value="<?php echo $curr_zz_id ?>"


  </script>

  
</form>			
			
			
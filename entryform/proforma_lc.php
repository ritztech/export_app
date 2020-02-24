<?php
session_start();
if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>"; }





require '../conf.php';


try {

 




$query = "SELECT `tab_auto_id`, `consigneeid`, `proforma_inv`, DATE_FORMAT(proforma_date,'%d/%m/%Y') as proforma_date, `export_ref`, `buyrefno_date`, `cntry_origin`, `cntry_final`, `pre_carr_by`, `place_of_rec_per`, `vessel`, `port_of_laod`, `port_of_dis`, `final_dest`, `del_terms`, `extra_notes`, `incoterm`, `curency`, `bankid`, `shippartyidd`, `fid`,piv_2,piv3 FROM `proformainv`  where `tab_auto_id`=?";

$stmt = $dbc->prepare($query);

$stmt->bindParam(1, $_GET['siid']);

$stmt->execute();

$row=$stmt->fetch(PDO::FETCH_ASSOC);


			$consignid =$row['consigneeid'];
			$shippid =$row['shippartyidd'];
			
			$curr_id =$row['curency'];
			
			
			$profidd =$row['tab_auto_id'];
			
	$result1_cur = mysql_query("SELECT `curr_name` FROM `currency_master` WHERE tab_auto_id = $curr_id ");
$row1_cur = mysql_fetch_array($result1_cur);

$curr_name = $row1_cur[0];
		


//  get consignee details   start			
		
$result1 = mysql_query("SELECT 	leg_name,fac_addr,gstin,statetype,aadhar from ledger_master  where legid = $consignid");
$row1 = mysql_fetch_array($result1);

$p_name = $row1[0];

//echo $p_name;

$off_addr1 = $row1[1];
$party_gst = $row1[2];
$party_aadhar = $row1['aadhar'];
$statetype =$row1['statetype'];

///  get consignee details 	   end




// shippid details start

$result32 = mysql_query("SELECT `leg_name`, `fac_addr`, `off_addr`, `fact_city`, `off_city`, `fact_state`, `off_state`, `f_pin`, `o_pin`, `o_con`, `f_contact`, `off_email`, `inctaxnum`, `servicetaxno`, `tinno`, `centralno`, `cstno`, `o_date`, `o_bal`, `acc_grp`, `dr_cr`, `broker`, `transported`, `party`, `legid`, `fid`, `firmcontact`, `bankname`, `bank_type`, `bank_number`, `ifsc_code`, `brokerage`, `brok_qty`, `acc_name`, `acc_id`, `gstin`, `aadhar`, `statetype` FROM `ledger_master` WHEre  legid = $shippid");
$row32 = mysql_fetch_array($result32);

$p_name_ss = $row32[0];
$off_addr1_ss = $row32[1];
$ss_aadhar = $row32['aadhar'];
$gstin_ss = $row32['gstin'];



// shippid details ends






















		
}


catch(PDOException $e) {

	echo "Error: " . $e->getMessage();

}



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


<link href="..//style.css" rel="stylesheet" type="text/css" />
    <link href="js/jquery-ui.css" rel="stylesheet">
      <script src="js/jquery-1.10.2.js"></script>
      <script src="js/jquery-ui.js"></script>
	  

<script language="javascript" type="text/javascript" src="../datetimepicker.js"> </script>



		
		</head>
		
<?php // include('../include/sidemenu.php');?>

<form id="form1" name="form1" method="post"  onsubmit = "return validform();" action="add_lc_bck.php">		
		
		
<table  align="center"    width="50%"  id="toExcel" border="2" style="border:1px solid #000;" cellpadding="4">
		
		<tr>
<td align = "center" colspan="8"> 
<input type="button" name="CloseMe" value="Close Me" onClick="window.history.back();"/>
  </td> </tr>



			<tr>
				<td colspan="8" style="border:1px solid #000;"><p style="font-size:14px;font-weight:bold;margin-bottom:5px;" align="center">ADD LC for Proforma Invoice No.</b><br>  <?php  echo $row['piv3'] ?>/<?php  echo $row['piv_2'] ?>/<?php  echo $row['proforma_inv'] ?>  </p></td>
			</tr>
			
			
</table>
</br>
  </br>
  
  

<table  width="45%"  align="center"   style="font-weight:bold;font-size:15">

<tr> <td>  LC Number  </td>  <td>   <input type="text"   autofocus required="required"   size="50"  name="lcnumber"  /></td>  </tr>
<tr> <td>  Issueing Branch & Address  </td>  <td>   <input type="text" required="required"   size="50"  name="issuebranch"  /></td>  </tr>
<tr> <td> Date of Issue </td>  <td>   <input type="text" size="50"  id="dateofissue" onchange = "isDate(this.value)"     name="dateofissue"  /></td>  </tr>
<tr> <td>  LC DATE  </td>  <td>   <input type="text"  size="50"  id="lcdates"  onchange = "isDate(this.value)"  name="lcdates"  /></td>  </tr>
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
<tr> <td>  Amount of LC </td>  <td>   <input type="text"  required="required" size="50"  name="amountlccc"  /></td>  </tr>
<tr> <td>  Form of LC  </td>  <td>   <input type="text" size="50"   name="formlccc"  /></td>  </tr>
<tr> <td>  Tolerance </td>  <td>   <input type="text" size="50"   name="tolerence"  /></td>  </tr>

<tr> <td>  Expiriry Date </td>  <td>   <input type="text" id="expdates"  size="50" onchange = "isDate(this.value)"  name="expdates"  /></td>  </tr>
<tr> <td>  Expiriry Place </td>  <td>   <input type="text"  size="50"  name="expplacess"  /></td>  </tr>
<tr> <td>  Advising bank  </td>  <td>   <input type="text"  size="50"  name="advbanksss"  /></td>  </tr>
<tr> <td>  Beneficiary Details </td>  <td>   <input type="text" required="required"  size="50"  name="benefedetailsss"  /></td>  </tr>
<tr> <td>  Other Details </td>  <td>   <input type="text"  size="50"  name="otherdetailsss"  /></td>  </tr>



        <tr>

          <td>  </br>
  </br>
  
	
	<input type="hidden"   value="<?php echo $profidd ?>" name="profrid"  />
	
	
	
	<input type="submit" style = "color:blue; font-weight:bold;height: 25px; width: 95px; font:"Times New Roman", Times, serif; font-size:14px;"   name="s" id="submit" value="SAVE" />
	
	
	</td>

          <td>&nbsp;</td>

        </tr>
		

</table>
	
	  <script>
  
     $( function() {
	$( "#dateofissue" ).datepicker();
	$( "#lcdates" ).datepicker();
	$( "#expdates" ).datepicker();
  } );
  
  
  </script>

  
</form>			
			
			
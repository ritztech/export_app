<?php

session_start();

if(!isset($_SESSION['uname'])) {echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";}

require '../conf.php';


try {

$query = "SELECT `tab_auto_id`, `consigneeid`, `proforma_inv`, DATE_FORMAT(proforma_date,'%d/%m/%Y') as proforma_date, `export_ref`, `buyrefno_date`, `cntry_origin`, `cntry_final`, `pre_carr_by`, `place_of_rec_per`, `vessel`, `port_of_laod`, `port_of_dis`, `final_dest`, `del_terms`, `extra_notes`, `incoterm`, `curency`, `bankid`, `shippartyidd`, `fid` ,piv_2,piv3 FROM `proformainv`  where `tab_auto_id`=?";

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

var elem = document.getElementById("mylcdiv");
  elem.parentNode.removeChild(elem);
  
  
window.print();
window.history.back();
			
	
}

</script>

		
		</head>
		<table id="toExcel" border="2" style="border:1px solid #000;" cellpadding="4">
		
		<tr>

		
		
<td align = "center" colspan="8">  

		<a href="salesinvoice_front_edit_e2.php?id= <?php echo  $profidd?> "> EDIT</a>
		
		
<input type="button" name="btnprint" value="Print" onclick="jumpto()"/>


<input type="button" name="CloseMe" value="Close Me" onClick="window.history.back();"/>

<a href="proforma_lc.php?siid= <?php echo $profidd ?> "> ADD LC DETAILS </a>


  </td> </tr>



			<tr>
				<td colspan="8" style="border:1px solid #000;"><p style="font-size:14px;font-weight:bold;margin-bottom:5px;" align="center">PROFORMA INVOICE </p></td>
			</tr>
			<tr>
				<td style="border:1px solid #000;text-align:left;" rowspan="3" colspan="3" width="50%" height="108"><b>Exporter :</b> <br><b><?php echo $_SESSION['myfirmnameeee'] ?></b><br>
				<?php echo $_SESSION['myfirmaddress'] ?>
				
				</td>
				<td style="border:1px solid #000;text-align:left;" colspan="3" width="25%"><b>Proforma Invoice No.</b><br><?php  echo $row['piv3'] ?>/<?php  echo $row['piv_2'] ?> /	<?php  echo $row['proforma_inv'] ?><br><b>DATE :</b><br><?php  echo $row['proforma_date'] ?></td>
				<td style="border:1px solid #000;text-align:left;" colspan="2" width="25%"><b>Exporter's Ref :  <?php  echo $row['export_ref'] ?> </b> <br></td>
			</tr>
			<tr>
				<td style="border:1px solid #000;text-align:left;" colspan="5"><b>Buyer's Ref.<br>No. & Date :</b> <br><?php  echo $row['buyrefno_date'] ?></td>
			</tr>
			<tr>
				<td style="border:1px solid #000;text-align:left;" colspan="5"><b>Other references(s) :</b> <br></td>
			</tr>
			<tr>
				<td style="border:1px solid #000;text-align:left;" colspan="3" width="50%" ><b>Consignee :</b> <br><b><?php echo $p_name ?></b><br><?php echo $off_addr1  ?><br>
</td>
				<td style="border:1px solid #000;text-align:left;" colspan="3" width="25%"><b>Country of<br>Origin of Goods :</b> <br><?php  echo $row['cntry_origin'] ?></td>
				<td style="border:1px solid #000;text-align:left;" colspan="2" width="25%"><b>Country of<br>Final Destination :</b> <br><?php  echo $row['cntry_final'] ?></td>
			</tr> 
			<tr>
				<td style="border:1px solid #000;text-align:left;" colspan="2"><b>Pre-Carriage by :</b> <br><?php if($row['pre_carr_by']!="0") { echo $row['pre_carr_by']; } ?></td>
				<td style="border:1px solid #000;text-align:left;"><b>Place of receipt<br>by pre-carrier:</b> <br>  <?php if($row['place_of_rec_per']!="0") { echo $row['place_of_rec_per']; } ?> </td>
				<td style="border:1px solid #000;text-align:left;" colspan="5" rowspan="3"><b>Delivery & Payment Terms:</b> <br><b>Term:</b> <?php  echo $row['del_terms'] ?> </td>
			</tr>
			<tr>
				<td style="border:1px solid #000;text-align:left;" colspan="2"><b>Vessel/Flight No.</b> <br> <?php if($row['vessel']!="0") { echo $row['vessel']; } ?> </td>
				<td style="border:1px solid #000;text-align:left;"><b>Port of Loading</b> <br>  <?php if($row['port_of_laod']!="0") { echo $row['port_of_laod']; } ?> </td>
			</tr>
			<tr>
				<td style="border:1px solid #000;" colspan="2"><b>Port of Discharge</b> <br>  <?php if($row['port_of_dis']!="0") { echo $row['port_of_dis']; } ?> </td>
				<td style="border:1px solid #000;"><b>Final Destination</b> <br>  <?php if($row['final_dest']!="0") { echo $row['final_dest']; } ?> </td>
			</tr>
		
		<tr style="font-weight:bold;text-align:center;">
			<th style="border:1px solid #000;" width="7%">Sr.<br>No.</th>
			<th style="border:1px solid #000;" colspan="2" width="43%">Description of Goods</th>
			<th style="border:1px solid #000;" width="10%">HS Code</th>
			<th style="border:1px solid #000;" width="5%">Unit</th>
			<th style="border:1px solid #000;" width="10%">Quantity</th>
			<th style="border:1px solid #000;" width="10%">Rate </th>
			<th style="border:1px solid #000;" width="15%">Amount</br><?php echo $curr_name ?> </th>
		</tr>
	
	
	<?php
	
$result13_2 = mysql_query("SELECT `tab_auto_id`, `proforma_id`, `item_id`, `goods_descr`, `hsncode`, `unit`, `qty`, `rate`, `amount`,item_details FROM `proforma_item` WHERE `proforma_id`=$profidd");

$i=0;
$net_amt=0;
while($row13 = mysql_fetch_array($result13_2))

  {   $i = $i + 1; 
  
  $hsn_val_fr=$row13['hsncode'];
  $unit=$row13['unit'];
  
    $goods_descr=$row13['goods_descr'];
	  $qty=$row13['qty'];
	    $rate=$row13['rate'];
		  $amount=$row13['amount'];
		  
		  $net_amt=$net_amt+$amount;
		  
  
  
  
	?>
	
				<tr>
					<td style="text-align:center;border:1px solid #000;vertical-align: middle;"><?php echo $i ?></td>
					<td colspan="2" style="border:1px solid #000;text-align:left;"> <?php echo $goods_descr ?> </br>   <?php echo $row13['item_details']  ?>  </td>
					<td style="text-align:center;border:1px solid #000;vertical-align: middle;"><?php echo $hsn_val_fr ?></td>
					<td style="text-align:center;border:1px solid #000;vertical-align: middle;"><?php echo $unit ?>  </td>
					<td style="text-align:center;border:1px solid #000;vertical-align: middle;"><?php echo $qty ?> </br> (+/-10%)</td>
					<td style="text-align:center;border:1px solid #000;vertical-align: middle;"><?php echo $rate ?></td>
					<td style="text-align:right;border:1px solid #000;vertical-align: middle;"><?php  echo $curr_name; ?> - <?php echo $amount ?></td>
				</tr>
				
  <?php }  ?>	
  
  
  <tr> <td colspan="8">  </td> </tr>


<tr>   <td colspan="3" >  

<b><u>Terms & Conditions :</u></b></br></br>

<?php 	


//echo "SELECT `auto_id`, `po_1`, `po_2`, `poid` FROM `po_conditions` WHERE poid=$profidd";

$result13_3 = mysql_query("SELECT `auto_id`, `po_1`, `po_2`, `poid` FROM `po_conditions` WHERE poid=$profidd");  

$k=0;

while($row19 = mysql_fetch_array($result13_3))
{$k=$k+1;

?>

<table  border="1" width="100%" >
<tr>  <td  width="30%" align="left" >  <?php echo $k ?> : <?php echo $row19['po_1'] ?>  :   </td>   <td width="70%" align="left">  <?php  echo $row19['po_2']?>   </td>     </tr>

</table>
		
<?php  }  ?>




</td> 

<td colspan="5"  align="right">   <b>Amount Chargeable (in words)</b><br> <?php  $cheque_amt = round($net_amt) ; try  {  echo convert_number($cheque_amt) ;
    }
catch(Exception $e)
    {
    echo $e->getMessage();
    }    ?>  <?php   echo $curr_name ?>   </td>


	
	

 </tr>
  
			
			<tr>
				<td colspan="3" rowspan="2" style="width:50%;border-top: none !important;border:1px solid #000;">  <br><b><u>Declaration:</u></b><br>We declare that this Proforma invoice shows<br>the actual price of the goods described and that all<br>particulars are true and correct.</td>
				<td colspan="3" style="text-align:right;margin-right:10px !important;border-top: none !important;border:1px solid #000;vertical-align: middle;"><b>Total</b> </td>
				<td colspan="2" style="text-align:right;margin-right:10px !important;border-top: none !important;border:1px solid #000;vertical-align: middle;"> <b> <?php  echo $curr_name; ?> - <?php echo $net_amt  ?>.00 </b> </td>
			</tr>
			
			<tr>
				<td colspan="3" style="text-align:right;margin-right:10px !important;border:1px solid #000;"></td>
				<td colspan="2" style="text-align:right;margin-right:10px !important;border:1px solid #000;vertical-align: middle;"></td>
			</tr>
			
			<tr>
				<td colspan="3" style="border:1px solid #000;"><b>For, SANDAAR AGRO PRIVATE LIMITED</b><br><br><br><br><b>Authorized Signatory</b></td>
				<td colspan="5" style="border:1px solid #000;"><b>For, <?php echo $p_name  ?></b><br><br><br><br><b>Authorized Signatory</b></td>
			</tr>


<?php $result13_33 = mysql_query("SELECT `tab_auto_id`, `issue_branch`, DATE_FORMAT(date_of_issue,'%d/%m/%Y') as date_of_issue, DATE_FORMAT(lc_date,'%d/%m/%Y') as lc_date, `currency`, `amt_of_lc`, `form_of_lc`, `tolerance`, DATE_FORMAT(expdate,'%d/%m/%Y') as expdate, `exp_place`, `advise_bank`, `benefeitiary_details`, `othersss`, `proforma_id`, `lcnumber` FROM `proforma_lc_details` WHERE  proforma_id=$profidd"); 
$i=0;
while($row17 = mysql_fetch_array($result13_33))

  {   $i = $i + 1; 
  
  $currid=$row17['currency'];
  $lciddd=$row17['tab_auto_id'];

$result1_cur = mysql_query("SELECT `curr_name` FROM `currency_master` WHERE tab_auto_id = $currid ");
$row1_cur = mysql_fetch_array($result1_cur);

$curr_name = $row1_cur[0];
  
	


?>

<tr>

<td colspan="8" >
</br>

<div id="mylcdiv">
<a href="edit_lc_detail_f.php?siid= <?php echo $lciddd ?> "> Edit  LC DETAILS </a>
  
</div>

*** LC Details ***
</br>

<table  width="100%"  border="1">
<tr>  <td> LC Number    </td>  <td> <?php  echo $row17['lcnumber']; ?>   </td>  <td> LC Amount    </td>  <td> <?php  echo $row17['amt_of_lc']; ?>   </td> <td> LC Date    </td>  <td> <?php  echo $row17['lc_date']; ?>   </td>  <td> Date of Issue    </td>  <td> <?php  echo $row17['date_of_issue']; ?>   </td>   </tr>
<tr>  <td> Issueing Branch & Address    </td>  <td> <?php  echo $row17['issue_branch']; ?>   </td>  <td> Currency   </td>  <td> <?php  echo $curr_name ?>   </td> <td> Form of LC    </td>  <td> <?php  echo $row17['form_of_lc']; ?>   </td>  <td> Tolerance   </td>  <td> <?php  echo $row17['tolerance']; ?>   </td>   </tr>
<tr>  <td> Expiriry Date and Place     </td>  <td> <?php  echo $row17['expdate']; ?> -- <?php  echo $row17['exp_place']; ?>   </td>   <td> Advising bank     </td>  <td> <?php  echo $row17['advise_bank']; ?>   </td>  <td> Beneficiary Details   </td>  <td> <?php  echo $row17['benefeitiary_details']; ?>   </td> <td> Other Details   </td>  <td> <?php  echo $row17['othersss']; ?>   </td>   </tr>

</table>

</br>

</td>

</tr>





  <?php }  ?>













	</table><!--<button onclick="exceller()">EXCEL</button>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	function exceller() {
		var uri = 'data:application/vnd.ms-excel;base64,',
		  template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
		  base64 = function(s) {
			return window.btoa(unescape(encodeURIComponent(s)))
		  },
		  format = function(s, c) {
			return s.replace(/{(\w+)}/g, function(m, p) {
			  return c[p];
			})
		  }
		var toExcel = document.getElementById("toExcel").innerHTML;

		/*alert(toExcel);
		return false;*/

		var ctx = {
		  worksheet: name || '',
		  table: toExcel
		};
		var link = document.createElement("a");
		var xls_name = "Proforma-Inovice(10-02-2020)";
		link.download = xls_name;
		link.href = uri + base64(format(template, ctx))
		link.click();
	}
	
	//$(document).ready(function() {
		//exceller();
	//}); 
</script>
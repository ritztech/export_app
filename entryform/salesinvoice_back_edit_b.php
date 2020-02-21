<?php
session_start();
$fid=$_SESSION['fid'];
include('../conf.php');
$entrydate=date("d/m/Y");

?>

<?php
			

$invp1 = trim(strip_tags(addslashes($_POST['invp1'])));
$invp2 = trim(strip_tags(addslashes($_POST['invp2'])));
			


$proformiddddd = trim(strip_tags(addslashes($_POST['proformiddddd'])));

	
$billno = trim(strip_tags(addslashes($_POST['billno'])));
$saudadate = $_POST['saudadate'];
$exportrefnum = trim(strip_tags(addslashes($_POST['exportrefnum'])));
$buyerrefnoanddate = trim(strip_tags(addslashes($_POST['buyerrefnoanddate'])));
$consigneeid = trim(strip_tags(addslashes($_POST['consigneeid'])));
$shippartyidd = trim(strip_tags(addslashes($_POST['shippartyidd'])));
$contryorigion = trim(strip_tags(addslashes($_POST['contryorigion'])));
$cntryfinaldest = trim(strip_tags(addslashes($_POST['cntryfinaldest'])));
$precarbyy = trim(strip_tags(addslashes($_POST['precarbyy'])));
$placeofrecprecarr = trim(strip_tags(addslashes($_POST['placeofrecprecarr'])));
$vesselflight = trim(strip_tags(addslashes($_POST['vesselflight'])));
$port_discjar = trim(strip_tags(addslashes($_POST['port_discjar'])));
$port_loadingggg = trim(strip_tags(addslashes($_POST['port_loadingggg'])));
$finaldest2 = trim(strip_tags(addslashes($_POST['finaldest2'])));
$deltermssssss = trim(strip_tags(addslashes($_POST['deltermssssss'])));
$Incoterm = trim(strip_tags(addslashes($_POST['Incoterm'])));
$bankdetaisl = trim(strip_tags(addslashes($_POST['bankdetaisl'])));
$currency = trim(strip_tags(addslashes($_POST['currency'])));
$extranotesssss = trim(strip_tags(addslashes($_POST['extranotesssss'])));

$nextbillseq = trim(strtoupper($_POST['nextbillseq']));

  




$maxid = $proformiddddd;

  
if($proformiddddd>=1)
{
  
  
$pro_item_bck_qry="INSERT INTO `proforma_item_bck`(`tab_auto_id`, `proforma_id`, `item_id`, `goods_descr`, `hsncode`, `unit`, `qty`, `rate`, `amount`, `item_details`, `gst`) SELECT `tab_auto_id`, `proforma_id`, `item_id`, `goods_descr`, `hsncode`, `unit`, `qty`, `rate`, `amount`, `item_details`, `gst` FROM `proforma_item` WHERE `proforma_id`=$proformiddddd";  
$pro_item_bck_qry = str_replace("''", "'0'", $pro_item_bck_qry);

dops($pro_item_bck_qry);

$del_p_qry="DELETE FROM `proforma_item` WHERE `proforma_id` = '$proformiddddd' ";
dops($del_p_qry);

$del_po_cond="delete from po_conditions";

dops($del_po_cond);



 
$qry="update proformainv set consigneeid ='$consigneeid',
 proforma_inv ='$billno',
 piv_2='$invp2',
 piv3='$invp1',
 proforma_date =STR_TO_DATE('$saudadate','%d/%m/%Y'),
 export_ref ='$exportrefnum',
 buyrefno_date ='$buyerrefnoanddate',
 cntry_origin ='$contryorigion',
 cntry_final ='$cntryfinaldest',
 pre_carr_by ='$precarbyy',
 place_of_rec_per ='$placeofrecprecarr',
 vessel ='$vesselflight',
 port_of_laod ='$port_loadingggg',
 port_of_dis ='$port_discjar',
 final_dest ='$finaldest2',
 del_terms ='$deltermssssss',
 extra_notes ='$extranotesssss',
 incoterm ='$Incoterm',
 curency ='$currency',
 bankid ='$bankdetaisl',
shippartyidd ='$shippartyidd',
last_bill_char='$nextbillseq'
where tab_auto_id=$proformiddddd";

$qry = str_replace("''", "'0'", $qry);

//echo $qry;

       if (!mysql_query($qry,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  
 
  
  
//header("Location: goodsreciept_view.php");

       	
$n_s_i_d = $maxid;

$j = $_POST['totalcnt'];


for($i=2; $i <= $j; $i++) {

$item = trim(strip_tags(addslashes(strtoupper($_POST['stkname'.$i]))));
$hsncode = trim(strip_tags(addslashes(strtoupper($_POST['hsncode'.$i]))));
$i_detailsss = trim(strip_tags(addslashes(strtoupper($_POST['i_detailsss'.$i]))));
$stid1 = trim(strip_tags(addslashes(strtoupper($_POST['item'.$i]))));
$remark_1 = trim(strip_tags(addslashes(strtoupper($_POST['remark'.$i]))));

$qty = trim(strip_tags(addslashes($_POST['billwght'.$i])));
$rate = trim(strip_tags(addslashes($_POST['ratgoods'.$i])));

$netamt = trim(strip_tags(addslashes($_POST['billvalue'.$i])));

$gst = trim(strip_tags(addslashes($_POST['rattax'.$i])));

$bagg = trim(strip_tags(addslashes($_POST['bagg'.$i])));





$qry1="INSERT INTO `proforma_item`(`proforma_id`, `item_id`, `goods_descr`, `hsncode`, `unit`, `qty`, `rate`, `amount`,item_details,gst,bags) VALUES 
('$maxid','$stid1','$item','$hsncode','MTS','$qty','$rate','$netamt','$i_detailsss','$gst','$bagg')";
		

$qry1 = str_replace("''", "'0'", $qry1);
		
		//	echo $qry1;


			if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  

	   
}


$j = $_POST['totalcnt_cnd'];


for($i=1; $i <= $j; $i++) {
	

$cond_a = trim(strip_tags(addslashes($_POST['cond_a'.$i])));
$cond_b = trim(strip_tags(addslashes($_POST['cond_b'.$i])));



$qry1="INSERT INTO `po_conditions`(`po_1`, `po_2`,poid) VALUES ('$cond_a','$cond_b','$maxid')";
	$qry1 = str_replace("''", "'0'", $qry1);	
	//echo $qry1;
			if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
  

}



  
}  

echo "<script>alert('Data Successfully Inserted');location.href='proforma.php?siid=$proformiddddd'</script>";
 




?>


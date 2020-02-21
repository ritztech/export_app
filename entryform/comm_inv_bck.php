<?php
session_start();
$fid=$_SESSION['fid'];
include('../conf.php');
$entrydate=date("d/m/Y");

?>

<?php
				

$truckno = trim(strip_tags(addslashes($_POST['truckno'])));


$masterconditin = trim($_POST['masterconditin']);





$last_charid = trim(strip_tags(addslashes($_POST['last_charid'])));

$ppname = trim(strip_tags(addslashes($_POST['ppname'])));
$ppiddd = trim(strip_tags(addslashes($_POST['ppiddd'])));
$ppgstn = trim(strip_tags(addslashes($_POST['ppgstn'])));
$ppbillno = trim(strip_tags(addslashes($_POST['ppbillno'])));
$ppbilldateee = trim(strip_tags(addslashes($_POST['ppbilldateee'])));
$ppqtyyy = trim(strip_tags(addslashes($_POST['ppqtyyy'])));


$proformiddddd = trim(strip_tags(addslashes($_POST['proformiddddd'])));
	
$comminvnum = trim(strip_tags(addslashes($_POST['comminvnum'])));
$comminvnum_p1 = trim(strip_tags(addslashes($_POST['comminvnum_p1'])));
$comminvnum_p2 = trim(strip_tags(addslashes($_POST['comminvnum_p2'])));
$comminvdate = dform($_POST['comminvdate']);
	
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

  


$upd_inv_cnt="UPDATE `m_autoid` SET `comm_inv`= ($comminvnum+1) where fid=$fid";
dops($upd_inv_cnt);

  
$result31_maxid = mysql_query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$mysql_database' AND TABLE_NAME = 'commercial_in_main' ");
$row31_maxid = mysql_fetch_array($result31_maxid);
$maxid = $row31_maxid['0'];

  

  
  
 
$qry="INSERT INTO `commercial_in_main`(`consigneeid`, `proforma_inv`, `proforma_date`, `export_ref`, `buyrefno_date`, `cntry_origin`, `cntry_final`, `pre_carr_by`, `place_of_rec_per`, `vessel`, `port_of_laod`, `port_of_dis`, `final_dest`, `del_terms`, `extra_notes`, `incoterm`, `curency`, `bankid`,shippartyidd,fid,`invoice_no`,`inv_date`,`com_inv_2`,`comm_inv_3`,proforma_id,truckno,`ppname`, `ppiddd`, `ppgstn`, `ppbillno`, `ppbilldateee`, `ppqtyyy`,master_conditions) VALUES
('$consigneeid','$billno',STR_TO_DATE('$saudadate','%d/%m/%Y'),'$exportrefnum','$buyerrefnoanddate','$contryorigion','$cntryfinaldest','$precarbyy','$placeofrecprecarr','$vesselflight','$port_loadingggg','$port_discjar','$finaldest2','$deltermssssss','$extranotesssss','$Incoterm','$currency','$bankdetaisl','$shippartyidd','$fid','$comminvnum_p2',$comminvdate,'$comminvnum_p1','$comminvnum','$proformiddddd','$truckno','$ppname','$ppiddd','$ppgstn','$ppbillno',STR_TO_DATE('$ppbilldateee','%d/%m/%Y'),'$ppqtyyy','$masterconditin')";

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





$qry1="INSERT INTO `comm_in_items`(`comm_inv_id`, `item_id`, `goods_descr`, `hsncode`, `unit`, `qty`, `rate`, `amount`,item_details,gst,bags) VALUES 
('$maxid','$stid1','$item','$hsncode','MTS','$qty','$rate','$netamt','$i_detailsss','$gst','$bagg')";
		

$qry1 = str_replace("''", "'0'", $qry1);
		
		//	echo $qry1;


			if (!mysql_query($qry1,$connection))
  {
  die('Error: ' . mysql_error());
  }
  

	   
}

$qry1="UPDATE `proformainv` SET `last_bill_char`='$last_charid' where `tab_auto_id`=$proformiddddd";

dops($qry1);

	$j = $_POST['totalcnt_cnd'];


	for($i=1; $i <= $j; $i++) {
		

	$cond_a = trim(strip_tags(addslashes($_POST['cond_a'.$i])));
	$cond_b = trim(strip_tags(addslashes($_POST['cond_b'.$i])));


if($cond_b!=""){
	$qry1="INSERT INTO `comm_inv_conditions`(`po_1`, `po_2`,poid) VALUES ('$cond_a','$cond_b','$n_s_i_d')";
		$qry1 = str_replace("''", "'0'", $qry1);	
		//echo $qry1;
				if (!mysql_query($qry1,$connection))
	  {
	  die('Error: ' . mysql_error());
	  }
	
}	
	  

	}




 

 echo "<script>alert('Data Successfully Inserted');location.href='comm_inv_show.php?siid=$n_s_i_d'</script>";
 




?>


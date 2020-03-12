<?php
require '../conf.php';
$id = $_GET['id'];


if($id>=1)
{

$qry="INSERT INTO `proforma_item_bck`(`tab_auto_id`, `proforma_id`, `item_id`, `goods_descr`, `hsncode`, `unit`, `qty`, `rate`, `amount`, `item_details`, `gst`)  SELECT `tab_auto_id`, `proforma_id`, `item_id`, `goods_descr`, `hsncode`, `unit`, `qty`, `rate`, `amount`, `item_details`, `gst` FROM `proforma_item` WHERE `proforma_id`=$id";
dops($qry);

$qry="INSERT INTO `proformainv_bck`(`tab_auto_id`, `consigneeid`, `proforma_inv`, `proforma_date`, `export_ref`, `buyrefno_date`, `cntry_origin`, `cntry_final`, `pre_carr_by`, `place_of_rec_per`, `vessel`, `port_of_laod`, `port_of_dis`, `final_dest`, `del_terms`, `extra_notes`, `incoterm`, `curency`, `bankid`, `shippartyidd`, `fid`, `piv_2`, `piv3`, `last_bill_char`)  SELECT `tab_auto_id`, `consigneeid`, `proforma_inv`, `proforma_date`, `export_ref`, `buyrefno_date`, `cntry_origin`, `cntry_final`, `pre_carr_by`, `place_of_rec_per`, `vessel`, `port_of_laod`, `port_of_dis`, `final_dest`, `del_terms`, `extra_notes`, `incoterm`, `curency`, `bankid`, `shippartyidd`, `fid`, `piv_2`, `piv3`, `last_bill_char` FROM `proformainv` WHERE `tab_auto_id`=$id";
dops($qry);


$qry="delete  FROM `proforma_item` WHERE `proforma_id`=$id";
dops($qry);

$qry="delete FROM `proformainv` WHERE `tab_auto_id`=$id";
dops($qry);


$qry="DELETE FROM `commercial_in_main` WHERE proforma_id=$id";
dops($qry);




}


?>




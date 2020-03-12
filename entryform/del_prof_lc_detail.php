<?php
require '../conf.php';
$id = $_GET['id'];


if($id>=1)
{

$qry="delete FROM `proforma_lc_details`  WHERE tab_auto_id =$id";
dops($qry);



}


?>




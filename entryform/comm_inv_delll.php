<?php
require '../conf.php';
$id = $_GET['id'];


if($id>=1)
{

$qry="DELETE FROM `commercial_in_main` WHERE `comm_id`=$id";
dops($qry);

$qry="DELETE FROM `comm_in_items` WHERE `comm_inv_id`=$id";
dops($qry);

}


?>



